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




    //############################# BULK PRODUCT UPLOAD PROCESSOR #############################//
    public function bulk_product_upload_REMOVE_ME()
    {

        //$id = $request->id;
        $datax = DB::table('products_export_1609_22')->get();
        $countx = 1;

        foreach ($datax as $record) {

            $countx = $countx + 1;
            $pid_product =  'PRD'.XController::xhash(10).time();//generate random post id
            

            //GET ALL FIELDS FROM NEW DATA TABLE
            $title = $record->COL1;
            $content = $record->COL2;
            $excerpt = $record->COL3;
            $categories = $record->COL4;
            $image_url = $record->COL5;
            $image_file = $record->COL6;
            $price = (float)$record->COL7;

            //$image_url = "https://pharmabay.ng/wp-content/uploads/2023/08/XakY2xOuxSB2RdlL254sc3MQV67vwO7g6tz9dPBs.jpeg||https://pharmabay.ng/wp-content/uploads/2023/08/R.png||https://pharmabay.ng/wp-content/uploads/2023/08/SDSDSGSFDSDFSDF.jpeg";
            //$image_url = "https://pharmabay.ng/wp-content/uploads/2023/08/XakY2xOuxSB2RdlL254sc3MQV67vwO7g6tz9dPBs.jpeg";
        /////////////////// TRIM URL ////////////////////


        //CLEAN UP THE URL WITH || SEPARATOR SYMBOLS LEAVING ONLY ONE URL
        $url = $image_url;
        $character = "||";
        $positionx = strpos($url, $character);
        if (($positionx !== false) || ($positionx >= 1)){
            $trimmedUrl = substr($url, 0, $positionx);
            $urlx = $trimmedUrl;
        }else{$urlx = $url;}
        $image_url = $urlx;


            //VALIDATE URL
            if (filter_var($image_url, FILTER_VALIDATE_URL) === FALSE) {
                //die('Not a valid URL');
                $image_url = "https://admin.accessmydrugs.com/public/assets/media/logos/amd-default.jpg";
            }

            //URL PROCESSING 
            $URL = urldecode($image_url);
            $image_name = (stristr($URL,'?',true))?stristr($URL,'?',true):$URL;
            $pos = strrpos($image_name,'/');
            $image_name = substr($image_name,$pos+1);
            $extension = stristr($image_name,'.');

            //PROCESS SLUG TO PREVENT DUPLICATES
            $slug = \Str::slug($title);//convert title to slug
            $slug_check = DB::table('products_category')->where('category_slug', '=', $slug)->where('xstatus', '=', 1)->count();
            while($slug_check >= 1){
                $slug = $slug.'-'.XController::xhash(5);
                $slug_check = DB::table('products_category')->where('category_slug', '=', $slug)->where('xstatus', '=', 1)->count();
            }

            //SPLIT CATEGORIES
            $split_category_array = array();
            $split_category_array = explode('>', $categories);

            if(!empty($split_category_array[0])){
                $category_name = $split_category_array[0];
                $category_slug = \Str::slug($category_name);

                $pid_category =  'CAT'.XController::xhash(10).time();//generate random post id
                $slug_check = DB::table('products_category')->where('category_slug', '=', $category_slug)->where('xstatus', '=', 1)->count();
                if($slug_check >= 1){}else{
                    DB::table('products_category')->insert(
                        [
                            'pid_admin' => "ADMIN-AUTO-BULK-UPLOADER-001",
                            'pid_category' => $pid_category,
                            'category_name' => $category_name,
                            'category_slug' => $category_slug,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]
                        );
                    }
            }else{$category_name = "General"; $category_slug = null;}



            if(!empty($split_category_array[1])){
                $sub_category1_name = $split_category_array[1];
                $sub_category1_slug = \Str::slug($sub_category1_name);

                $pid_category =  'CAT'.XController::xhash(10).time();//generate random post id
                $slug_check = DB::table('products_category')->where('category_slug', '=', $category_slug)->where('xstatus', '=', 1)->count();
                if($slug_check >= 1){}else{
                    DB::table('products_category')->insert(
                        [
                            'pid_admin' => "ADMIN-AUTO-BULK-UPLOADER-001",
                            'pid_category' => $pid_category,
                            'category_name' => $sub_category1_name,
                            'category_slug' => $sub_category1_slug,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]
                        );
                    }
            }else{$sub_category1_name = null; $sub_category1_slug = null;}



            if(!empty($split_category_array[2])){
                $sub_category2_name = $split_category_array[2];
                $sub_category2_slug = \Str::slug($sub_category2_name);

                $pid_category =  'CAT'.XController::xhash(10).time();//generate random post id
                $slug_check = DB::table('products_category')->where('category_slug', '=', $category_slug)->where('xstatus', '=', 1)->count();
                if($slug_check >= 1){}else{
                    DB::table('products_category')->insert(
                        [
                            'pid_admin' => "ADMIN-AUTO-BULK-UPLOADER-001",
                            'pid_category' => $pid_category,
                            'category_name' => $sub_category2_name,
                            'category_slug' => $sub_category2_slug,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]
                        );
                    }
            }else{$sub_category2_name = null; $sub_category2_slug = null;}


            //PROCESS PRODUCT DATA FOR UPLOAD
            $product_name = $title;
            $product_description = $content;
            $product_summary = $excerpt;
            $product_slug = $slug;
            $product_category_name = $category_name;
            $product_sub_category1_name = $sub_category1_name;
            $product_sub_category2_name = $sub_category2_name;
            $product_category_slug = $category_slug;
            $product_sub_category1_slug = $sub_category1_slug;
            $product_sub_category2_slug = $sub_category2_slug;
            $product_price = $price;
            $product_image = $slug.$extension;
            

            //PROCESS IMAGE FOR UPLOAD
            $imageContent = file_get_contents($image_url);
            \Illuminate\Support\Facades\Storage::disk('public')->put($product_image, $imageContent);

            //UPLOAD BULK PRODUCTS
            DB::table('products')->insert(
				[
                    'pid_product' => $pid_product,
					'seq' => 100,
					'featured_timestamp' => '',
					'pid_admin' => "ADMIN-AUTO-BULK-UPLOADER-001",
					'product_name' => $product_name,
					'product_price' => (float)$product_price,
					'product_price_old' => (float)$product_price,
					'product_price_wholesale' => (float)$product_price,
                    'product_slug' => $product_slug,
                    'product_category_name' => $product_category_name,
                    'product_sub_category1_name' => $product_sub_category1_name,
                    'product_sub_category2_name' => $product_sub_category2_name,
					'product_category' => $product_category_slug,
                    'product_sub_category1' => $product_sub_category1_slug,
                    'product_sub_category2' => $product_sub_category2_slug,
					'product_description' => $product_description,
                    'product_summary' => $product_summary,
                    'product_tags' => $product_name,
                    'product_quantity' => 100,
                    'procurement_cost' => 0,
					'shipping_cost' => 0,
					'shipping_status' => null,
                    'tax' => 7,
                    'expiry_date' => null,
					'product_visibility' => null,
                    'product_image' => $product_image,
                    'product_status' => '',
                    'xstatus' => 1,
                    'ext1' => '',
                    'ext2' => '',
                    'ext3' => '',
					'created_at' => now(),
					'updated_at' => now()
				]
			);

        }

        echo "<h3><b>".$countx."</b> of 1,609</h3><br>";

        dd(" PRODUCTS AND IMAGES UPLOADED SUCCESSFULLY!!!");


    }


    public function deletx()
    {


    }






    //############################# PRODUCT CATEGORY CREATE INDEX #############################//
    public function product_category_create_form_index()
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
            
        return view('pages/product_category_create_form_index', $data);exit;

    }

    

     
    //############################# PRODUCT CREATE INDEX #############################//
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

        $data['product_categories'] = DB::table('products_category')->where('xstatus',1)->orderBy('category_name','ASC')->get();

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


    

        //############################# PRODUCT CREATE INDEX #############################//
        public function product_category_update_form_index(Request $request)
        {
    
            $data = array();
            $pid_admin = Auth::user()->pid_admin;
            $pid_category = $request->pid_category;
            //////////////////// REQUIRED CORE DATA ////////////////////
            //heavy loaders
            //$data['orders'] = XLoad::records('orders');
            //$data['counts'] = XLoad::records('counts');
            $data['pid_admin'] = $pid_admin;
            //////////////////// REQUIRED CORE DATA ////////////////////
            $data['products_category'] = DB::table('products_category')->where('pid_category',$pid_category)->first();
    
            //ORDERS COUNTER
            $data['count_orders_all'] = DB::table('orders')->where('xstatus', 1)->count();
            $data['count_orders_attempted'] = DB::table('orders')->where('status','=','attempted')->where('xstatus', 1)->count();
            $data['count_orders_processing'] = DB::table('orders')->where('status','=','processing')->where('xstatus', 1)->count();
            $data['count_orders_in_transit'] = DB::table('orders')->where('status','=','in_transit')->where('xstatus', 1)->count();
            $data['count_orders_arrived'] = DB::table('orders')->where('status','=','arrived')->where('xstatus', 1)->count();
            $data['count_orders_delivered'] = DB::table('orders')->where('status','=','delivered')->where('xstatus', 1)->count();
            $data['count_orders_cancelled'] = DB::table('orders')->where('status','=','cancelled')->where('xstatus', 1)->count();
                
            return view('pages/product_category_update_form_index', $data);exit;
    
        }



        //############################# CATEGORY CREATE PROX #############################//
        public function product_category_create_form_prox(Request $request)
        {
            
            //VALIDATE INPUT
                $validator = Validator::make($request->all(), [
                //'product_price' => 'numeric|min:2|max:5',
                'category_name' => 'string|min:1|max:255',
                    ]);
                 
                    if ($validator->fails()) {
                                                // For example:
                                                return redirect('pages/product_category_create_form_index')
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
    
            $pid_category =  'CAT'.XController::xhash(5).time();//generate random post id
            $category_name = $request->category_name;           
            $slug = \Str::slug($category_name);//convert title to slug
    

            //check if slug already exists, then regenerate new value to avoid duplicate records
            $category_check = DB::table('products_category')->where('category_name', '=', $category_name)->count();
            while($category_check >= 1){
                \Session::flash('failed','Product Category already exists!');
                return redirect()->route('product_category_create_form_index', $data);
                exit;
            } 

            //check if slug already exists, then regenerate new value to avoid duplicate records
            $slug_check = DB::table('products_category')->where('category_slug', '=', $slug)->count();
            while($slug_check >= 1){
                $slug = $slug.'-'.XController::xhash(5);
                $slug_check = DB::table('products_category')->where('category_slug', '=', $slug)->count();
            }
    
    
                DB::table('products_category')->insert(
                    [
                        'pid_admin' => $pid_admin,
                        'pid_category' => $pid_category,
                        'category_name' => $category_name,
                        'category_slug' => $slug,
                        'status' => null,
                        'xstatus' => 1,
                        'ext1' => '',
                        'ext2' => '',
                        'ext3' => '',
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                );
    
    
            $data['product_categories'] = DB::table('products_category')->where('xstatus',1)->orderBy('id','DESC')->get();//posts
    
            \Session::flash('success','Product Category has been Successfully Added!');
            return redirect()->route('product_category_view_table_index', $data);
    
        }


        //############################# CATEGORY UPDATE PROX #############################//
        public function product_category_update_form_prox(Request $request)
        {
            
            //VALIDATE INPUT
                $validator = Validator::make($request->all(), [
                //'product_price' => 'numeric|min:2|max:5',
                'category_name' => 'string|min:1|max:255',
                    ]);
                 
                    if ($validator->fails()) {
                                                // For example:
                                                return redirect('pages/product_category_create_form_index')
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
    
            $pid_category =  $request->pid_category;//generate random post id
            $category_slug = $request->category_slug;
            $category_name = $request->category_name;           
            $slug = \Str::slug($category_name);//convert title to slug
    

            //check if slug already exists, then regenerate new value to avoid duplicate records
            $category_check1 = 0; $category_check2 = 0; $category_check3 = 0; 
            $category_check1 = DB::table('products')->where('product_category', '=', $category_slug)->count();
            $category_check2 = DB::table('products')->where('product_sub_category1', '=', $category_slug)->count();
            $category_check3 = DB::table('products')->where('product_sub_category2', '=', $category_slug)->count();
            $category_checkx = $category_check1 + $category_check2 + $category_check3;

            //if slug already exists, then use the same original slug name instead of the slug name created from the category name.
            if($category_checkx >= 1){
                    $slug = $category_slug;
            }else{}


    
            DB::table('products_category')
                ->where('pid_category', '=', $pid_category)
                ->update([
                    'pid_admin' => $pid_admin,
                    'category_name' => $category_name,
                    'category_slug' => $slug,
                    'updated_at' => now()
            ]);

    
    
            $data['product_categories'] = DB::table('products_category')->where('xstatus',1)->orderBy('id','DESC')->get();//posts
    
            \Session::flash('success','Product Category has been Successfully Updated!');
            return redirect()->route('product_category_view_table_index', $data);
    
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

        //GET CATEGORY NAMES FROM CATEGORY RECORDS
        $data['product_category_name'] = DB::table('products_category')->where('category_slug',$request->product_category)->first("category_name")->category_name;
        $data['product_sub_category1_name'] = DB::table('products_category')->where('category_slug',$request->product_sub_category1)->first("category_name")->category_name;
        $data['product_sub_category2_name'] = DB::table('products_category')->where('category_slug',$request->product_sub_category2)->first("category_name")->category_name;
        

        //INSERT RECORDS TO PRODUCTS TABLE
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
                    'product_category_name' => $data['product_category_name'],
                    'product_sub_category1_name' => $data['product_sub_category1_name'],
                    'product_sub_category2_name' => $data['product_sub_category2_name'],
					'product_category' => $request->input('product_category'),
                    'product_sub_category1' => $request->input('product_sub_category1'),
                    'product_sub_category2' => $request->input('product_sub_category2'),
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
        $data['product_categories'] = DB::table('products_category')->where('xstatus',1)->orderBy('id','DESC')->get();


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


        //GET CATEGORY NAMES FROM CATEGORY RECORDS
        $data['product_category_name'] = DB::table('products_category')->where('category_slug',$request->product_category)->first("category_name")->category_name;
        $data['product_sub_category1_name'] = DB::table('products_category')->where('category_slug',$request->product_sub_category1)->first("category_name")->category_name;
        $data['product_sub_category2_name'] = DB::table('products_category')->where('category_slug',$request->product_sub_category2)->first("category_name")->category_name;
        


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
                    'product_category_name' => $data['product_category_name'],
                    'product_sub_category1_name' => $data['product_sub_category1_name'],
                    'product_sub_category2_name' => $data['product_sub_category2_name'],
					'product_category' => $request->product_category,
                    'product_sub_category1' => $request->product_sub_category1,
                    'product_sub_category2' => $request->product_sub_category2,
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



          //############################# PRODUCT DELETE PROX #############################//
          public function product_category_delete_record_prox(Request $request)
          {
      
              $data = array();
              $pid_admin = Auth::user()->pid_admin;
      
     
              $pid_category = $request->pid_category;
              $category_slug = $request->category_slug;
     
              //////////////////// REQUIRED CORE DATA ////////////////////
              //light loaders
              $data['products_category'] = DB::table('products_category')->where('pid_category',$pid_category)->first();
     
                          //check if slug already exists, then regenerate new value to avoid duplicate records
            $category_check1 = 0; $category_check2 = 0; $category_check3 = 0; 
            $category_check1 = DB::table('products')->where('product_category', '=', $category_slug)->count();
            $category_check2 = DB::table('products')->where('product_sub_category1', '=', $category_slug)->count();
            $category_check3 = DB::table('products')->where('product_sub_category2', '=', $category_slug)->count();
            $category_checkx = $category_check1 + $category_check2 + $category_check3;

            while($category_checkx >= 1){
                \Session::flash('failed','Product Category already in use, cannot delete category. You have to delete the associated product first.');
                return redirect()->route('product_category_view_table_index', $data);
                exit;
            } 

              DB::table('products_category')
                         ->where('pid_category', $pid_category)
                         ->delete();
     
              \Session::flash('success', 'Product Category has been successfully deleted!');
     
              return redirect()->route('product_category_view_table_index', $data);
      
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
        //$data['products'] = DB::table('products')->where('xstatus',1)->orderBy('id','DESC')->limit(10)->get();

        $data['products'] = DB::table('products')->paginate(10);

        //$data['pagination_links'] = DB::table('products')->paginate(10);
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
        public function product_category_view_table_index()
        {
    
            $data = array();
            $pid_admin = Auth::user()->pid_admin;
    
            //////////////////// REQUIRED CORE DATA ////////////////////
            $data['pid_admin'] = $pid_admin;
    
            //LIGHT LOADER
            //$data['user'] = XRecordsController::records('user');
            $data['product_categories'] = DB::table('products_category')->where('xstatus',1)->orderBy('id','DESC')->get();
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
    
            return view('pages/product_category_view_table_index', $data);exit;
    
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
