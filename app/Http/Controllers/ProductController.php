<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\XISCode;
use App\Http\Controllers\XController;
use App\Http\Controllers\XRecordsController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\XLoad;
use App\Http\Controllers\XTR;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OrdersCalculationController;


class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    */

    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['index','home']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */


    

     
    //############################# POST CREATE INDEX #############################//
    public function product_create_form_index()
    {

        $data = array();
        $pid_admin = Auth::user()->pid_admin;

        //////////////////// REQUIRED CORE DATA ////////////////////
        //heavy loaders
        //$data['orders'] = XLoad::records('orders');
        //$data['counts'] = XLoad::records('counts');
        $data['pid_admin'] = $pid_admin;
        //////////////////// REQUIRED CORE DATA ////////////////////

        //ORDERS COUNTER
        $data['count_orders_all'] = DB::table('orders')->where('xstatus', 1)->count();
        $data['count_orders_attempted'] = DB::table('orders')->where('status','=','attempted')->where('xstatus', 1)->count();
        $data['count_orders_processing'] = DB::table('orders')->where('status','=','processing')->where('xstatus', 1)->count();
        $data['count_orders_in_transit'] = DB::table('orders')->where('status','=','in_transit')->where('xstatus', 1)->count();
        $data['count_orders_arrived'] = DB::table('orders')->where('status','=','arrived')->where('xstatus', 1)->count();
        $data['count_orders_delivered'] = DB::table('orders')->where('status','=','delivered')->where('xstatus', 1)->count();
        $data['count_orders_cancelled'] = DB::table('orders')->where('status','=','cancelled')->where('xstatus', 1)->count();
            
        return view('pages/product_create_form_index', $data);exit;

    }




    //############################# POST CREATE PROX #############################//
    public function product_create_form_prox(Request $request)
    {
        
        //VALIDATE INPUT
            $validator = Validator::make($request->all(), [
            //'product_price' => 'numeric|min:2|max:5',
            'product_price' => 'numeric|nullable',
            'product_price_old' => 'numeric|nullable',
            'product_price_wholesale' => 'numeric|nullable',
            'shipping_cost' => 'numeric|nullable',
            'tax' => 'numeric|nullable',
                ]);
             
                if ($validator->fails()) {
                                            // For example:
                                            return redirect('pages/product_create_form_index')
                                                    ->withErrors($validator)
                                                    ->withInput();
                                     
                                            // Also handy: get the array with the errors
                                            $validator->errors();
                                     
                                            // or, for APIs:
                                            $validator->errors()->toJson();
                                            exit();
                                        }
   
        $data = array();
        $pid_admin = Auth::user()->pid_admin;
        //$admin_name = Auth::user()->first_name.' '.Auth::user()->last_name;

        //////////////////// REQUIRED CORE DATA ////////////////////
        $data['pid_admin'] = $pid_admin;
        //////////////////// REQUIRED CORE DATA ////////////////////


        //:::::::::: SAVE IMAGE STARTS :::::::::://
        //stores files in defualt directory: "storage/app/image" 
        //get file name using $file_name = $filex['name']
        //XController::xfile(REQUEST-DATA, FILE-ELEMENT-NAME, FILE-TYPES-ALLOWED, FILE-SIZE, FILE-LOCATION-IN-STORAGE, REQUIRED(Y=Yes, N=No))
        $filex = XController::xfile($request, 'product_image', 'jpg,png,gif,svg,JPG,PNG,GIF,SVG', 2000, 'public/images', 'N');
        //:::::::::: SAVE IMAGE STOPS :::::::::://

        $pid_product =  'PRD'.XController::xhash(5).time();//generate random post id

        $slug = \Str::slug($request->product_name);//convert title to slug

        //check if slug already exists, then regenerate new value to avoid duplicate records
        $slug_check = DB::table('products')->where('pid_product', '=', $pid_product)->where('xstatus', '=', 1)->count();
        while($slug_check >= 1){
            $slug = $slug.'-'.XController::xhash(5);
            $slug_check = DB::table('products')->where('xstatus', '=', 1)->count();
        }

        if((DB::table('products')->latest('seq')->first('seq')) == null){$seq = 0;}else{
        $seq = (int)(DB::table('products')->latest('seq')->first('seq')->seq) + 10;//record sequence update
        }
        $seq = (int)$seq;

            DB::table('products')->insert(
				[
                    'pid_product' => $pid_product,
					'seq' => $seq,
					'featured_timestamp' => '',
					'pid_admin' => $pid_admin,
					'product_name' => $request->input('product_name'),
					'product_price' => $request->input('product_price'),
					'product_price_old' => $request->input('product_price_old'),
					'product_price_wholesale' => $request->input('product_price_wholesale'),
                    'product_slug' => $slug,
					'product_category' => $request->input('product_category'),
					'product_description' => $request->input('product_description'),
                    'product_summary' => $request->input('product_summary'),
                    'product_tags' => $request->input('product_tags'),
                    'product_quantity' => $request->input('product_quantity'),
                    'procurement_cost' => $request->procurement_cost,
					'shipping_cost' => $request->input('shipping_cost'),
					'shipping_status' => $request->input('shipping_status'),
                    'tax' => $request->input('tax'),
                    'expiry_date' => $request->input('expiry_date'),
					'product_visibility' => $request->input('product_visibility'),
                    'product_image' => $filex['name'],
                    'product_status' => '',
                    'xstatus' => 1,
                    'ext1' => '',
                    'ext2' => '',
                    'ext3' => '',
					'created_at' => now(),
					'updated_at' => now()
				]
			);


        $data['products'] = DB::table('products')->where('xstatus',1)->orderBy('id','DESC')->get();//posts

        \Session::flash('success','Product has been Successfully Added!');
        return redirect()->route('product_view_table_index', $data);

    }




    //############################# POST UPDATE INDEX #############################//
    public function product_update_form_index($pid_product)
    {

        $data = array();
        $pid_admin = Auth::user()->pid_admin;

        //////////////////// REQUIRED CORE DATA ////////////////////
        $data['pid_admin'] = $pid_admin;

        //////////////////// REQUIRED CORE DATA ////////////////////

        $data['product'] = DB::table('products')->where('pid_product',$pid_product)->first();//load single record


            //ORDERS COUNTER
            $data['count_orders_all'] = DB::table('orders')->where('xstatus', 1)->count();
            $data['count_orders_attempted'] = DB::table('orders')->where('status','=','attempted')->where('xstatus', 1)->count();
            $data['count_orders_processing'] = DB::table('orders')->where('status','=','processing')->where('xstatus', 1)->count();
            $data['count_orders_in_transit'] = DB::table('orders')->where('status','=','in_transit')->where('xstatus', 1)->count();
            $data['count_orders_arrived'] = DB::table('orders')->where('status','=','arrived')->where('xstatus', 1)->count();
            $data['count_orders_delivered'] = DB::table('orders')->where('status','=','delivered')->where('xstatus', 1)->count();
            $data['count_orders_cancelled'] = DB::table('orders')->where('status','=','cancelled')->where('xstatus', 1)->count();
            
        return view('pages/product_update_form_index', $data);exit;

    }



    //############################# POST UPDATE PROX #############################//
    public function product_update_form_prox(Request $request)
    {
    
        $data = array();
        $pid_admin = Auth::user()->pid_admin;

        $pid_product = $request->pid_product;
        $data['products'] = DB::table('products')->where('xstatus',1)->orderBy('id','DESC')->get();//load all posts


        //:::::::::: UPDATE IMAGE STARTS :::::::::://
        //stores files in defualt directory: "storage/app/image" 
        //get file name using $file_name = $filex['name']
        //XController::xfile(REQUEST-DATA, FILE-ELEMENT-NAME, FILE-TYPES-ALLOWED, FILE-SIZE, FILE-LOCATION-IN-STORAGE, REQUIRED(Y=Yes, N=No))
        	if ($request->product_image == null){}else{
            $filex = XController::xfile($request, 'product_image', 'jpg,png,gif,svg,JPG,PNG,GIF,SVG', 2000, 'public/images', 'N');

            DB::table('products')
                    ->where('pid_product', '=', $pid_product)
                    ->update(['product_image' => $filex['name'],]);}
        //:::::::::: UPDATE IMAGE STOPS :::::::::://
        
        $slug = \Str::slug($request->product_name);//convert title to slug


            //RANDOM CODE GENERATOR
            $length = 5;
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            $xcode = $randomString;
            //RANDOM CODE GENERATOR
            
        $slug = $slug.'-'.$xcode;


        DB::table('products')
                ->where('pid_product', $pid_product)
                ->where('xstatus', 1)
                ->update([
					'pid_admin' => $pid_admin,
					'product_name' => $request->product_name,
					'product_price' => $request->product_price,
					'product_price_old' => $request->input('product_price_old'),
					'product_price_wholesale' => $request->input('product_price_wholesale'),					
                    'product_slug' => $slug,
					'product_category' => $request->product_category,
					'product_description' => $request->product_description,
                    'product_summary' => $request->product_summary,
                    'product_tags' => $request->product_tags,
                    'procurement_cost' => $request->procurement_cost,
					'shipping_cost' => $request->shipping_cost,
					'shipping_status' => $request->input('shipping_status'),
                    'tax' => $request->tax,
                    'expiry_date' => $request->input('expiry_date'),
					'product_visibility' => $request->product_visibility,
                    //'product_image' => $filex['name'],
                    'product_status' => '',
                    'updated_at' => now()
                    ]);


            \Session::flash('success','Product has been Successfully Updated!');
            return redirect()->route('product_view_table_index', $data);
            //return routes('post_view_table_index')->with($data);
            //return view('pages/post_view_table_index', $data);exit;

    }






     //############################# PRODUCT DELETE PROX #############################//
     public function product_delete_record_prox(Request $request)
     {
 
         $data = array();
         $pid_admin = Auth::user()->pid_admin;
 

         $pid_product = $request->pid_product;

         //////////////////// REQUIRED CORE DATA ////////////////////
         //light loaders
         $data['products'] = DB::table('products')->where('pid_product',$pid_product)->first();

         DB::table('products')
                    ->where('pid_product', $pid_product)
                    ->delete();

         \Session::flash('success', 'Product has been successfully deleted!');

         return redirect()->route('product_view_table_index', $data);
 
     }   




    //############################# PRODUCT VIEW TABLE INDEX #############################//
    public function product_view_table_index()
    {

        $data = array();
        $pid_admin = Auth::user()->pid_admin;

        //////////////////// REQUIRED CORE DATA ////////////////////
        $data['pid_admin'] = $pid_admin;

        //LIGHT LOADER
        //$data['user'] = XRecordsController::records('user');
        $data['products'] = DB::table('products')->where('xstatus',1)->orderBy('id','DESC')->get();
        //$data['posts'] = DB::table('posts')->where('status','published')->where('xstatus',1)->get();
        //////////////////// REQUIRED CORE DATA ////////////////////

            //ORDERS COUNTER
            $data['count_orders_all'] = DB::table('orders')->where('xstatus', 1)->count();
            $data['count_orders_attempted'] = DB::table('orders')->where('status','=','attempted')->where('xstatus', 1)->count();
            $data['count_orders_processing'] = DB::table('orders')->where('status','=','processing')->where('xstatus', 1)->count();
            $data['count_orders_in_transit'] = DB::table('orders')->where('status','=','in_transit')->where('xstatus', 1)->count();
            $data['count_orders_arrived'] = DB::table('orders')->where('status','=','arrived')->where('xstatus', 1)->count();
            $data['count_orders_delivered'] = DB::table('orders')->where('status','=','delivered')->where('xstatus', 1)->count();
            $data['count_orders_cancelled'] = DB::table('orders')->where('status','=','cancelled')->where('xstatus', 1)->count();

        return view('pages/product_view_table_index', $data);exit;

    }


    //############################# PRODUCT VIEW TABLE INDEX #############################//
    public function product_view_list_index($pid_product)
    {

        $data = array();
        $pid_admin = Auth::user()->pid_admin;

        //////////////////// REQUIRED CORE DATA ////////////////////
        $data['pid_admin'] = $pid_admin;

        //LIGHT LOADER
        $data['product'] = DB::table('products')->where('pid_product', $pid_product)->where('xstatus',1)->first();
        //////////////////// REQUIRED CORE DATA ////////////////////

            //ORDERS COUNTER
            $data['count_orders_all'] = DB::table('orders')->where('xstatus', 1)->count();
            $data['count_orders_attempted'] = DB::table('orders')->where('status','=','attempted')->where('xstatus', 1)->count();
            $data['count_orders_processing'] = DB::table('orders')->where('status','=','processing')->where('xstatus', 1)->count();
            $data['count_orders_in_transit'] = DB::table('orders')->where('status','=','in_transit')->where('xstatus', 1)->count();
            $data['count_orders_arrived'] = DB::table('orders')->where('status','=','arrived')->where('xstatus', 1)->count();
            $data['count_orders_delivered'] = DB::table('orders')->where('status','=','delivered')->where('xstatus', 1)->count();
            $data['count_orders_cancelled'] = DB::table('orders')->where('status','=','cancelled')->where('xstatus', 1)->count();
            
        return view('pages/product_view_list_index', $data);exit;

    }
    
    
    
    
    //############################# PRODUCT VIEW TABLE INDEX #############################//
    public function product_feature_record_prox(Request $request)
    {

        $data = array();
        $pid_admin = Auth::user()->pid_admin;

        //////////////////// REQUIRED CORE DATA ////////////////////
        $data['pid_admin'] = $pid_admin;
        
                DB::table('products')
                ->where('pid_product', $request->pid_product)
                ->where('xstatus', 1)
                ->update([
					    'featured_timestamp' => time(),
                        ]);


        //LIGHT LOADER
        $data['products'] = DB::table('products')->where('xstatus',1)->orderBy('id','DESC')->get();//load all posts
        //$data['products'] = DB::table('products')->where('pid_product', $pid_product)->where('xstatus',1)->first();
        //////////////////// REQUIRED CORE DATA ////////////////////


        \Session::flash('success','Product has been Successfully Featured!');
        return redirect()->route('product_view_table_index', $data);

    }




    //############################# PRODUCT VIEW TABLE INDEX #############################//
    public function product_visibility_prox($pid_product, $product_visibility)
    {

        $data = array();
        $pid_admin = Auth::user()->pid_admin;

        //////////////////// REQUIRED CORE DATA ////////////////////
        $data['pid_admin'] = $pid_admin;
        
        if($product_visibility == 'hide'){
        
                DB::table('products')
                ->where('pid_product', $pid_product)
                ->where('xstatus', 1)
                ->update([
					    'product_visibility' => 'show',
                        ]);
        }else{
                DB::table('products')
                ->where('pid_product', $pid_product)
                ->where('xstatus', 1)
                ->update([
					    'product_visibility' => 'hide',
                        ]);
        }


        //LIGHT LOADER
        $data['products'] = DB::table('products')->where('xstatus',1)->orderBy('id','DESC')->get();//load all posts
        //$data['products'] = DB::table('products')->where('pid_product', $pid_product)->where('xstatus',1)->first();
        //////////////////// REQUIRED CORE DATA ////////////////////

  
        \Session::flash('success','Product visibility state was successfully updated!');
        return redirect()->route('product_view_table_index', $data);

    }  

        





////////////////////// END OF CONTROLLER ///////////////////////
}
