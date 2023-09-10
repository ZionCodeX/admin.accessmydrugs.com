<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\XISCode;
use App\Http\Controllers\XController;
use App\Http\Controllers\RecordsController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class ProductsController extends Controller
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

    //PROFILE UPDATE INDEX
    public function products_create_index($pid_order)
    {

        $data = array();
        $pid_admin = Auth::user()->pid_user;

        //USERS RECORDS
        $data['users_show_all'] = XRecordsController::users('SHOW_ALL');
        $data['users_count_all'] = XRecordsController::users('COUNT_ALL');
        $data['users_count_activated'] = XRecordsController::users('COUNT_ACTIVATED');
        $data['users_count_unactivated'] = XRecordsController::users('COUNT_UNACTIVATED');

        //REQUEST RECORDS
        //$data['request_show_single'] = XRecordsController::requests('SHOW_SINGLE',$pid_request);
        $data['request_show_all'] = XRecordsController::requests('SHOW_ALL');
        $data['request_count_all'] = XRecordsController::requests('COUNT_ALL');

        return view('pages/products_create_index', $data);
    }

     


    //UPDATE PROFILE ACCOUNT PROCESS
    public function products_create_prox(Request $request)
    { 

        //META
        //meta data
        $data = array();
        $pid_admin = Auth::user()->pid_admin;
        $pid_user = $request->pid_user;
        $pid_request = $request->pid_request;
        $pid_order = $request->pid_order;
        $pid_product = 'PRD'.XController::xhash(5).time();

        
        $data['pid_request'] = $pid_request;
        $data['pid_order'] = $pid_order;
        $data['pid_user'] = $pid_user;
        $data['pid_admin'] = $pid_admin;

        //INSERT RECORDS
        DB::table('products')->insert(
            [
                'pid_product' => $pid_product,
                'pid_order' => $request->pid_order,
                'pid_request' => $request->pid_request,
                'pid_user' => $request->pid_user,
                'pid_admin' => $request->pid_admin,
                'product_category' => $request->product_category,
                'product_name' => $request->product_name,
                'product_link' => $request->product_link,
                'product_quantity' => $request->product_quantity,
                'product_price' => $request->product_price,
                'product_weight' => $request->product_weight,
                'product_info' => $request->product_info,
                'created_at' => now(),
                'updated_at' => now()
            ]
          );

        //delay 1 second before uploading the second image
        sleep(1);

        //:::::::::: SAVE IMAGE STARTS :::::::::://
        //stores files in as defualt directory: "storage/app/image" 
        //get file name using $file_name = $filex['name']
        //XController::xfile(REQUEST-DATA, FILE-ELEMENT-NAME, FILE-TYPES-ALLOWED, FILE-SIZE, FILE-LOCATION-IN-STORAGE, REQUIRED(Y=Yes, N=No))
        $filex1 = XController::xfile($request, 'product_image', 'jpg,png,gif,svg,JPG,PNG,GIF,SVG', 2000, 'product_image', 'N');
        if ($filex1['name'] != null){
        DB::table('products')
                ->where('pid_request', '=', $request->pid_request)
                ->where('pid_order', '=', $request->pid_order)
                ->where('pid_user', '=', $request->pid_user)
                ->update(['product_image' => $filex1['name'],]);}
        //:::::::::: SAVE IMAGE STOPS :::::::::://


        //USERS RECORDS
        $data['users_show_all'] = XRecordsController::users('SHOW_ALL');
        $data['users_count_all'] = XRecordsController::users('COUNT_ALL');
        $data['users_count_activated'] = XRecordsController::users('COUNT_ACTIVATED');
        $data['users_count_unactivated'] = XRecordsController::users('COUNT_UNACTIVATED');

        //REQUEST RECORDS
        $data['request_show_single'] = XRecordsController::requests('SHOW_SINGLE',$pid_request);
        $data['request_show_all'] = XRecordsController::requests('SHOW_ALL');
        $data['request_count_all'] = XRecordsController::requests('COUNT_ALL');

        //REQUESTS COUNT
        $data['request_count_all'] = XRecordsController::requests('COUNT_ALL');
        $data['request_count_pending'] = XRecordsController::requests('COUNT_PENDING');
        $data['request_count_processing'] = XRecordsController::requests('COUNT_PROCESSING');

        //ORDER RECORDS
        $data['order_show_single'] = XRecordsController::orders('SHOW_SINGLE', $pid_order);
        $data['order_show_all'] = XRecordsController::orders('SHOW_ALL');
        $data['order_count_all'] = XRecordsController::orders('COUNT_ALL');

        \Session::flash('success', 'Product was successfully added');
        //return redirect('request_quotes_index');exit;
        return view('pages/order_products_view_index', $data);
    }




    
    //PROFILE UPDATE INDEX
    public function products_update_index($pid_request)
    {

        //meta data
        $data = array();
        $pid_admin = Auth::user()->pid_admin;

        //USERS RECORDS
        $data['users_show_all'] = XRecordsController::users('SHOW_ALL');
        $data['users_count_all'] = XRecordsController::users('COUNT_ALL');
        $data['users_count_activated'] = XRecordsController::users('COUNT_ACTIVATED');
        $data['users_count_unactivated'] = XRecordsController::users('COUNT_UNACTIVATED');

        //REQUEST RECORDS
        $data['request_show_single'] = XRecordsController::requests('SHOW_SINGLE',$pid_request);
        $data['request_show_all'] = XRecordsController::requests('SHOW_ALL');
        $data['request_count_all'] = XRecordsController::requests('COUNT_ALL');
        
        //dd($data);
        return view('pages/request_quotes_update_index', $data);
    }





        //UPDATE PROFILE ACCOUNT PROCESS
        public function products_update_prox(Request $request)
        { 
    
            //meta data
            $data = array();
            $pid_admin = Auth::user()->pid_admin;
            $pid_request = $request->pid_request;
    
            //UPDATE RECORDS
            DB::table('requests')
                  ->where('pid_request', $pid_request)
                  ->update([
                        'product_name' => $request->product_name,
                        'product_link' => $request->product_link,
                        'product_quantity' => $request->product_quantity,
                        'product_info' => $request->product_info, 
                        'updated_at' => now()
                      ]);
    
            
            //delay 2 seconds before updating images
            sleep(1);
    
            //:::::::::: SAVE IMAGE STARTS :::::::::://
            //stores files in as defualt directory: "storage/app/image" 
            //get file name using $file_name = $filex['name']
            //XController::xfile(REQUEST-DATA, FILE-ELEMENT-NAME, FILE-TYPES-ALLOWED, FILE-SIZE, FILE-LOCATION-IN-STORAGE, REQUIRED(Y=Yes, N=No))
            $filex1 = XController::xfile($request, 'product_image', 'jpg,png,gif,svg,JPG,PNG,GIF,SVG', 2000, 'product_image', 'N');
            if ($filex1['name'] != null){
            DB::table('requests')
                    ->where('pid_request', '=', $pid_request)
                    ->where('pid_user', '=', $pid_user)
                    ->update(['product_image' => $filex1['name'],]);}
            //:::::::::: SAVE IMAGE STOPS :::::::::://
    
            //delay 1 second before uploading the second image
            sleep(1);
    
            //:::::::::: SAVE IMAGE STARTS :::::::::://
            //stores files in as defualt directory: "storage/app/image" 
            //get file name using $file_name = $filex['name']
            //XController::xfile(REQUEST-DATA, FILE-ELEMENT-NAME, FILE-TYPES-ALLOWED, FILE-SIZE, FILE-LOCATION-IN-STORAGE, REQUIRED(Y=Yes, N=No))
            $filex2 = XController::xfile($request, 'brand_image', 'jpg,png,gif,svg,JPG,PNG,GIF,SVG', 2000, 'brand_image', 'N');
            if ($filex2['name'] != null){
            DB::table('requests')
                    ->where('pid_request', '=', $pid_request)
                    ->where('pid_user', '=', $pid_user)
                    ->update(['brand_image' => $filex2['name'],]);}
            //:::::::::: SAVE IMAGE STOPS :::::::::://
    

            //USERS RECORDS
            $data['users_show_all'] = XRecordsController::users('SHOW_ALL');
            $data['users_count_all'] = XRecordsController::users('COUNT_ALL');
            $data['users_count_activated'] = XRecordsController::users('COUNT_ACTIVATED');
            $data['users_count_unactivated'] = XRecordsController::users('COUNT_UNACTIVATED');

            //REQUEST RECORDS
            $data['request_show_single'] = XRecordsController::requests('SHOW_SINGLE',$pid_request);
            $data['request_show_all'] = XRecordsController::requests('SHOW_ALL');
            $data['request_count_all'] = XRecordsController::requests('COUNT_ALL');
        
            \Session::flash('success', 'Your Request was Successfully updated and placed again, it will be attended to shortly.');
            return redirect('request_quotes_index');exit;
            //return view('pages/update_profile_page', $data);
        }
    


        //############################# PROX DELETE :: REQUEST-QUOTES-DELETE #############################//
        public function product_delete_record_prox(Request $request)
        { 

            //META
            $data = array();
            $pid_admin = Auth::user()->pid_admin;
            $pid_order = $request->pid_order;
            $pid_product = $request->pid_product;

            //DELETE RECORD
            DB::table('products')
                    ->where('pid_product', $pid_product)
                    ->where('pid_user', $pid_user)
                    ->delete();


            \Session::flash('success', 'Product has been successfully deleted.');
            //return redirect('request_quotes_view_index');exit;
            return redirect('order/modify/view/'.$pid_order.'/table/index');exit;

        }






////////////////////// END OF CONTROLLER ///////////////////////
}
