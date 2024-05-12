<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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

class OrderController extends Controller
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






        //############################# ORDERS / PRODUCTS-VIEW #############################//
        public function order($status)
        { 

            $data = array();
            $pid_admin = Auth::user()->pid_admin;

            //ORDER COMPUTATION
            //$data['calc'] = OrdersCalculationController::calc($pid_order);
            
            
            //////////////////// REQUIRED CORE DATA ////////////////////
            $data['pid_admin'] = $pid_admin;
            //status
            //$data['order_status'] = $status;
            //heavy loaders
            //$data['orders'] = XLoad::records('orders');
            //$data['counts'] = XLoad::records('counts');
            //light loaders
            //$data['order'] = XTR::single(['orders'],['pid_order','=',$pid_order]);
            //$data['product'] = XTR::multiple(['products',10000, 'id', 'DESC'],['pid_order','=',$pid_order]);
            
            //$total = DB::table('products')->where('status','=',$status)->sum(DB::raw('product_price * product_quantity'));
            $data['order_status'] = $status;
            $data['orders'] = DB::table('orders')->where('status','=',$status)->where('xstatus', 1)->get();
            //$data['products'] = DB::table('products_ordered')->where('xstatus', 1)->get();
            $data['counts'] = DB::table('orders')->where('status','=',$status)->where('xstatus', 1)->count();
            
            //ORDERS COUNTER
            $data['count_orders_x'] = DB::table('orders')->where('status','=',$status)->where('xstatus', 1)->count();
            $data['count_orders_all'] = DB::table('orders')->where('xstatus', 1)->count();
            $data['count_orders_attempted'] = DB::table('orders')->where('status','=','attempted')->where('xstatus', 1)->count();
            $data['count_orders_processing'] = DB::table('orders')->where('status','=','processing')->where('xstatus', 1)->count();
            $data['count_orders_in_transit'] = DB::table('orders')->where('status','=','in_transit')->where('xstatus', 1)->count();
            $data['count_orders_arrived'] = DB::table('orders')->where('status','=','arrived')->where('xstatus', 1)->count();
            $data['count_orders_delivered'] = DB::table('orders')->where('status','=','delivered')->where('xstatus', 1)->count();
            $data['count_orders_cancelled'] = DB::table('orders')->where('status','=','cancelled')->where('xstatus', 1)->count();
            
            $data['products'] = DB::table('products_ordered')
                    ->leftJoin('products', 'products.pid_product', '=', 'products_ordered.pid_product')
                    //->select('*','products_ordered.status as product_status')
                    //->where('xstatus', 1)
                    //->orderBy('id', 'DESC')
                    ->get();
            
            //$data['count_attempted'] = DB::table('orders')->where('status','=',$status)->where('xstatus', 1)->count();
            //////////////////// REQUIRED CORE DATA ////////////////////
            

            return view('pages/orders_view_status_index', $data);exit;

        }





    //############################# ORDER ADMIN CREATE INDEX #############################//
    public function order_switch_message(Request $request)
    {

        $data = array();
        $pid_admin = Auth::user()->pid_admin;

        $pid_order = $request->pid_order;
        $pid_user = $request->pid_user;
        $status = $request->status;
        $admin_message = $request->message;
        //////////////////// REQUIRED CORE DATA ////////////////////
        
        if($status == "attempted"){$old_status = $status; $new_status = 'attempted';}
        if($status == "processing"){$old_status = $status; $new_status = 'in_transit';}
        if($status == "in_transit"){$old_status = $status; $new_status = 'arrived';}
        if($status == "arrived"){$old_status = $status; $new_status = 'delivered';}
        if($status == "cancelled"){$old_status = $status; $new_status = 'cancelled';}
        

        
        //update order records
        DB::table('orders')
                ->where('pid_order', '=', $pid_order)
                ->where('pid_user', '=', $pid_user)
                ->update([
                    'order_pid_admin_updator' => $pid_admin,
                    'status' => $new_status,
                    'updated_at' => now()
                ]);
                
                
        //////////////////// MESSAGING SYSTEM ////////////////////
        
        //ATTEMPTED MESSAGE
        if($status == "attempted"){  
                    $email_title = 'SPREADIT-SHOP :: ORDER STILL WAITING';
                    $message_title = 'Your Order is still available';
            
                    $message_body = "
                    Dear ".$request->first_name.",<br>
                    We noticed you tried placing an order with order ID <b>".$pid_order."</b>, but didn’t succeed.
                    <br><br>
                    Are you facing any difficulties with payment? <br>
                    Kindly reply this email or chat with us at <b>+234 806 458 3664</b> for assistance.<br>
                    ".$admin_message."
                    <br><br>
                    Thank you.<br>
                    Kind Regards,<br>
                    ";
                }        
        
        
        
        
        //IN-TRANIST MESSAGE
        if($status == "processing"){  
                    $email_title = 'SPREADIT-SHOP :: ORDER IN-TRANSIT';
                    $message_title = 'Your Order is now in Transit';
            
                    $message_body = "
                    Dear ".$request->first_name.",<br>
                    Your order with order ID <b>".$pid_order."</b> is now in-transit.
                    ".$admin_message."
                    <br><br>
                    Thank you for your patronage. 
                    <br><br>
                    Kind Regards,<br>
                    ";
                }
                
                
                
        //ARRIVED MESSAGE
        if($status == "in_transit"){  
                    $email_title = 'SPREADIT-SHOP :: ORDER ARRIVED';
                    $message_title = 'Your Order has Arrived';
            
                    $message_body = "
                    Dear ".$request->first_name.",<br>
                    Your order with order ID <b>".$pid_order."</b> has arrived and will be sent out to you by courier within 1 business day.<br>
                    ".$admin_message."
                    <br><br>
                    Thank you for your patronage. 
                    <br><br>
                    Kind Regards,<br>
                    ";
                }
                
                
                
        //DELIVERED MESSAGE
        if($status == "arrived"){  
                    $email_title = 'SPREADIT-SHOP :: ORDER DELIVERED';
                    $message_title = 'Your Order has been Delivered';
            
                    $message_body = "
                    Dear ".$request->first_name.",<br>
                    Your order with order ID <b>".$pid_order."</b> has been successfully delivered to you.<br>
                    ".$admin_message."
                    <br><br>
                    Thank you for your patronage. 
                    <br><br>
                    Kind Regards,<br>
                    ";
                }
                
                
                
                
        //CANCELLED MESSAGE
        if($status == "cancelled"){  
                    $email_title = 'SPREADIT-SHOP :: ORDER IS CANCELLED';
                    $message_title = 'Your Order has been Cancelled';
            
                    $message_body = "
                    Dear ".$request->first_name.",<br>
                    Your order with order ID <b>".$pid_order."</b> has been cancelled and your refund will be processed within 7 business days.<br>
                    ".$admin_message."
                    <br><br>
                    Thank you. 
                    <br><br>
                    Kind Regards,<br>
                    ";
                }
                
                

                
            ////////////////// EMAIL SENDER STARTS //////////////////
                //mail body contents
                $xdata = array();
                $xdata['to'] = $request->email;
                $xdata['email_title'] = $email_title;
                $xdata['message_title'] = $message_title;
                $xdata['message_body'] = $message_body;
                //$xdata['message_designation'] = "<b>Nkwocha Tochukwu</b><br>Founder / CEO <br>";
                $xdata['from'] = 'admin@spreaditglobal.com';
                $xdata['message_designation'] = "<b>PROCESSING TEAM</b><br> Spreadit Order Processing Team<br>";
                $xdata['mail_template'] = 'emails.general_email';
                //send mail
                $send_status = MailController::mailsend($xdata); //$send_status == 'SUCCESS' OR 'FAILED'
            ////////////////// EMAIL SENDER STOPS //////////////////
                
           


        \Session::flash('success', 'Order Status was Successfully Switched to '.$new_status);

        return redirect('order/'.$status.'/index');exit;
        
        //return view('pages/order_admin_create_index', $data);exit;

    }


    

     
    //############################# ORDER ADMIN CREATE INDEX #############################//
    public function order_admin_create_index(Request $request)
    {

        $data = array();
        $pid_admin = Auth::user()->pid_admin;

        $pid_order = $request->pid_order;
        $pid_user = $request->pid_user;
        //////////////////// REQUIRED CORE DATA ////////////////////
        //status
        //$data['order_status'] = $status;
        //heavy loaders
        $data['orders'] = XLoad::records('orders');
        $data['counts'] = XLoad::records('counts');
        //light loaders
        $data['order'] = DB::table('orders')->where('pid_order',$pid_order)->first();
        $country = DB::table('orders')->where('pid_order',$pid_order)->first();
        $procurement_country = $country->request_procurement_country;

        $data['financial_settings'] = DB::table('financial_settings')->where('xstatus',1)->first();
        $data['country_shipping_rate'] = DB::table('country_shipping_rate')->where('status', 'ACTIVE')->get();
        
        $data['sh_rate_kg'] = DB::table('country_shipping_rate')->where('country_slug', $procurement_country)->where('status', 'ACTIVE')->first();
        $data['sh_rate_cbm'] = DB::table('country_shipping_rate')->where('country_slug', $procurement_country)->where('status', 'ACTIVE')->first();
        //$data['user'] = XRecordsController::user('load_user_all');
        //$data['count_users_registered'] = XTR::count(['users']);
        //$data['count_users_activated'] = DB::table('users')->whereNotNull('email_verified_at')->where('xstatus', '=', 1)->count();
        //$data['count_users_unactivated'] = DB::table('users')->whereNull('email_verified_at')->where('xstatus', '=', 1)->count();
        //$data['order_x'] = XRecordsController::order('load_order_x', $pid_order);
        //$data['user'] = XTR::single(['users',5000, 'id', 'DESC'],['pid_user','=','07064407000']);
        //$data['user'] = XTR::multiple(['users',5000, 'id', 'DESC'],['pid_user','=','07064407000']);
        //$data['user'] = XTR::join(['users','orders'],['pid_user','pid_user'],['country','=',$country]);
        //$data['user'] = XTR::count(['users','id','=',2]);
        //////////////////// REQUIRED CORE DATA ////////////////////



        return view('pages/order_admin_create_index', $data);exit;

    }



    
    //############################# ORDER ADMIN ADD PRODUCTS INDEX #############################//
    public function order_admin_create_prox(Request $request)
    {

        $data = array();
        $pid_admin = Auth::user()->pid_admin;

        $pid_order = $request->pid_order;
        $pid_user = $request->pid_user;

        //update order records
        DB::table('orders')
                ->where('pid_order', '=', $pid_order)
                ->where('pid_user', '=', $pid_user)
                ->update([
                    'pid_admin' => $pid_admin,
                    'order_name' => $request->order_name,
                    'order_currency_main' => $request->order_currency_main,
                    'request_procurement_country' => $request->request_procurement_country,
                    'request_shipping_plan' => $request->request_shipping_plan,
                    'request_destination_country' => $request->request_destination_country,
                    'request_destination_address' => $request->request_destination_address,
                    'order_vat' => $request->order_vat,
                    'order_service_charge' => $request->order_service_charge,
                    'order_info' => $request->order_info,
                    'order_pid_admin_updator' => $pid_admin,
                    'order_pid_admin_creator' => $pid_admin,
                    'order_date_created' => now(),
                    'order_date_updated' => now(),
                    'status' => 'order_quote_processing',
                    'updated_at' => now()
                ]);


        //////////////////// REQUIRED CORE DATA ////////////////////
        //status
        //$data['order_status'] = $status;
        //heavy loaders
        $data['orders'] = XLoad::records('orders');
        $data['counts'] = XLoad::records('counts');
        //light loaders
        $data['order'] = XTR::single(['orders'],['pid_order','=',$pid_order]);
        //$data['user'] = XRecordsController::user('load_user_all');
        //$data['count_users_registered'] = XTR::count(['users']);
        //$data['count_users_activated'] = DB::table('users')->whereNotNull('email_verified_at')->where('xstatus', '=', 1)->count();
        //$data['count_users_unactivated'] = DB::table('users')->whereNull('email_verified_at')->where('xstatus', '=', 1)->count();
        //$data['order_x'] = XRecordsController::order('load_order_x', $pid_order);
        //$data['user'] = XTR::single(['users',5000, 'id', 'DESC'],['pid_user','=','07064407000']);
        //$data['user'] = XTR::multiple(['users',5000, 'id', 'DESC'],['pid_user','=','07064407000']);
        //$data['user'] = XTR::join(['users','orders'],['pid_user','pid_user'],['country','=',$country]);
        //$data['user'] = XTR::count(['users','id','=',2]);
        //////////////////// REQUIRED CORE DATA ////////////////////

        \Session::flash('success', 'Your Customer\'s Quote Request has been successfully created! You can now add Products to this Quote');

        return view('pages/order_admin_add_product_index', $data);exit;

    }



    //############################# ORDER ADMIN ADD PRODUCTS INDEX #############################//
    public function order_admin_add_product_index(Request $request)
    {

        $data = array();
        $pid_admin = Auth::user()->pid_admin;

        $pid_order = $request->pid_order;
        $pid_user = $request->pid_user;

        //////////////////// REQUIRED CORE DATA ////////////////////
        //status
        //$data['order_status'] = $status;
        //heavy loaders
        $data['orders'] = XLoad::records('orders');
        $data['counts'] = XLoad::records('counts');
        //light loaders
        $data['order'] = XTR::single(['orders'],['pid_order','=',$pid_order]);
        //$data['user'] = XRecordsController::user('load_user_all');
        //$data['count_users_registered'] = XTR::count(['users']);
        //$data['count_users_activated'] = DB::table('users')->whereNotNull('email_verified_at')->where('xstatus', '=', 1)->count();
        //$data['count_users_unactivated'] = DB::table('users')->whereNull('email_verified_at')->where('xstatus', '=', 1)->count();
        //$data['order_x'] = XRecordsController::order('load_order_x', $pid_order);
        //$data['user'] = XTR::single(['users',5000, 'id', 'DESC'],['pid_user','=','07064407000']);
        //$data['user'] = XTR::multiple(['users',5000, 'id', 'DESC'],['pid_user','=','07064407000']);
        //$data['user'] = XTR::join(['users','orders'],['pid_user','pid_user'],['country','=',$country]);
        //$data['user'] = XTR::count(['users','id','=',2]);
        //////////////////// REQUIRED CORE DATA ////////////////////

        //\Session::flash('success', 'Your Customer\'s Quote Request has been successfully created! You can now add Products to this Quote');

        return view('pages/order_admin_add_product_index', $data);exit;

    }





    //############################# ORDER ADMIN ADD PRODUCTS PROX #############################//
    public function order_admin_add_product_prox(Request $request)
    {

        $data = array();
        $pid_admin = Auth::user()->pid_admin;

        $pid_order = $request->pid_order;
        $pid_user = $request->pid_user;

        $pid_product = 'PRD'.XController::xhash(5).time();

        //INSERT RECORDS
        DB::table('products')->insert(
            [
                'pid_product' => $pid_product,
                'pid_order' => $pid_order,
                'pid_request' => 'NA',
                'pid_user' => $pid_user,
                'pid_admin' => $pid_admin,
                'product_name' => $request->product_name,
                'product_category' => $request->product_category,
                'product_link' => $request->product_link,
                'product_price' => $request->product_price,
                'product_quantity' => $request->product_quantity,
                'product_weight' => $request->product_weight,
                'product_info' => $request->product_info,
                'created_at' => now(),
                'updated_at' => now()
            ]
          );


        //////////////////// REQUIRED CORE DATA ////////////////////
        //status
        //$data['order_status'] = $status;
        //heavy loaders
        $data['orders'] = XLoad::records('orders');
        $data['counts'] = XLoad::records('counts');
        //light loaders
        $data['order'] = XTR::single(['orders'],['pid_order','=',$pid_order]);
        //$data['user'] = XRecordsController::user('load_user_all');
        //$data['count_users_registered'] = XTR::count(['users']);
        //$data['count_users_activated'] = DB::table('users')->whereNotNull('email_verified_at')->where('xstatus', '=', 1)->count();
        //$data['count_users_unactivated'] = DB::table('users')->whereNull('email_verified_at')->where('xstatus', '=', 1)->count();
        //$data['order_x'] = XRecordsController::order('load_order_x', $pid_order);
        //$data['user'] = XTR::single(['users',5000, 'id', 'DESC'],['pid_user','=','07064407000']);
        //$data['user'] = XTR::multiple(['users',5000, 'id', 'DESC'],['pid_user','=','07064407000']);
        //$data['user'] = XTR::join(['users','orders'],['pid_user','pid_user'],['country','=',$country]);
        //$data['user'] = XTR::count(['users','id','=',2]);
        //////////////////// REQUIRED CORE DATA ////////////////////

        \Session::flash('success', 'Product was Successfully added to Quote');

        return redirect('order/admin/product/view/'.$pid_order.'/index');exit;
        //return view('pages/order_admin_view_product_index', $data);exit;

    }






        //############################# PRODUCTS-VIEW #############################//
        public function order_admin_product_view_index($pid_order)
        { 

            $data = array();
            $pid_admin = Auth::user()->pid_admin;

            //ORDER COMPUTATION
            $data['calc'] = OrdersCalculationController::calc($pid_order);

            //////////////////// REQUIRED CORE DATA ////////////////////
            $data['pid_admin'] = $pid_admin;
            //status
            //$data['order_status'] = $status;
            //heavy loaders
            $data['orders'] = XLoad::records('orders');
            $data['counts'] = XLoad::records('counts');
            //light loaders
            $data['order'] = XTR::single(['orders'],['pid_order','=',$pid_order]);
            $data['product'] = XTR::multiple(['products',10000, 'id', 'DESC'],['pid_order','=',$pid_order]);
            $data['load_messages'] = XRecordsController::message('load_messages');

            $total = DB::table('products')->where('pid_order','=',$pid_order)->sum(DB::raw('product_price * product_quantity'));
            //dd($total);
            //$data['user'] = XRecordsController::user('load_user_all');
            //$data['count_users_registered'] = XTR::count(['users']);
            //$data['count_users_activated'] = DB::table('users')->whereNotNull('email_verified_at')->where('xstatus', '=', 1)->count();
            //$data['count_users_unactivated'] = DB::table('users')->whereNull('email_verified_at')->where('xstatus', '=', 1)->count();
            //$data['order_x'] = XRecordsController::order('load_order_x', $pid_order);
            //$data['user'] = XTR::single(['users',5000, 'id', 'DESC'],['pid_user','=','07064407000']);
            //$data['user'] = XTR::multiple(['users',5000, 'id', 'DESC'],['pid_user','=','07064407000']);
            //$data['user'] = XTR::join(['users','orders'],['pid_user','pid_user'],['country','=',$country]);
            //$data['user'] = XTR::count(['users','id','=',2]);
            //////////////////// REQUIRED CORE DATA ////////////////////

            return view('pages/order_admin_product_view_index', $data);exit;

        }

    


        //############################# ORDERS-PROCESSING #############################//
        public function order_status_view_index($status)
        { 

            $data = array();
            $pid_admin = Auth::user()->pid_admin;
            //////////////////// REQUIRED CORE DATA ////////////////////
            $data['pid_admin'] = $pid_admin;
            
            //status
            $data['order_status'] = $status;

            //heavy loaders
            $data['orders'] = XLoad::records('orders');
            $data['counts'] = XLoad::records('counts');

            //light loaders
            $data['load_messages'] = XRecordsController::message('load_messages');
            $data['products'] = DB::table('products')->where('xstatus',1)->orderBy('id','DESC')->get();
            $data['financial_settings'] = DB::table('financial_settings')->where('xstatus',1)->first();
            $data['exchange_rates'] = DB::table('exchange_rates')->where('status','ACTIVE')->where('xstatus',1)->get();
            $data['shipping_rates'] = DB::table('shipping_rates')->where('status','ACTIVE')->where('xstatus',1)->get();

            //$data['calc'] = OrdersCalculationController::calc($pid_order);
            //$total = DB::table('products')->where('pid_order','=',$pid_order)->sum(DB::raw('product_price * product_quantity'));
            //$data['user'] = XTR::join(['users','orders'],['pid_user','pid_user'],['country','=',$country]);

            //$data['orders'] = DB::table('orders')->where('pid_user',$pid_user)->get();
            //$data['user'] = XRecordsController::user('load_user_all');
            //$data['count_users_registered'] = XTR::count(['users']);
            //$data['count_users_activated'] = DB::table('users')->whereNotNull('email_verified_at')->where('xstatus', '=', 1)->count();
            //$data['count_users_unactivated'] = DB::table('users')->whereNull('email_verified_at')->where('xstatus', '=', 1)->count();
            //$data['order_x'] = XRecordsController::order('load_order_x', $pid_order);
            //$data['user'] = XTR::single(['users',5000, 'id', 'DESC'],['pid_user','=','07064407000']);
            //$data['user'] = XTR::multiple(['users',5000, 'id', 'DESC'],['pid_user','=','07064407000']);
            //$data['user'] = XTR::join(['users','orders'],['pid_user','pid_user'],['country','=',$country]);
            //$data['user'] = XTR::count(['users','id','=',2]);
            //////////////////// REQUIRED CORE DATA ////////////////////

            return view('pages/order_view_index', $data);exit;

        }




    //############################# INDEX READ TABLE/LIST :: REQUEST-QUOTES-PROCESSING #############################//
    public function request_processing_view_index()
    {
            //////////////////// REQUIRED CORE DATA ////////////////////
            $data = array();
            $pid_user = Auth::user()->pid_user;
            //HEAVY LOADER
            $data['orders'] = XLoad::records('orders');
            $data['counts'] = XLoad::records('counts');
            //LIGHT LOADER
            $data['user'] = XRecordsController::records('user');
            //////////////////// REQUIRED CORE DATA ////////////////////

        return view('pages/request_processing_view_index', $data);
    }
    





    //############################# PROX CREATE :: REQUEST-QUOTES-CREATE #############################//
    public function request_quotes_create_prox(Request $request)
    { 

        //////////////////// REQUIRED CORE DATA ////////////////////
        $data = array();
        $pid_user = Auth::user()->pid_user;
        //HEAVY LOADER
        $data['orders'] = XLoad::records('orders');
        $data['counts'] = XLoad::records('counts');
        //LIGHT LOADER
        $data['user'] = XRecordsController::records('user');
        //////////////////// REQUIRED CORE DATA ////////////////////

        //check if more than two records have been created.
        $order_count = DB::table('orders')
            ->where('pid_user', '=', $pid_user)
            ->where('status', '=', 'order_request_pending')
            ->where('xstatus', '=', 1)
            ->count();

        if($order_count >= 2){
                \Session::flash('failed', 'You are not allowed to create more than two(2) pending requests, until existing requests have been processed by the Request Processing Team');
                return redirect('request_quotes_create_index');exit;
        }


        $pid_order = 'QRD'.XController::xhash(5).time();

        //INSERT RECORDS
        DB::table('orders')->insert(
            [
                'pid_order' => $pid_order,
                'pid_user' => Auth::user()->pid_user,
                'request_product_name' => $request->request_product_name,
                'request_product_link' => $request->request_product_link,
                'request_product_quantity' => $request->request_product_quantity,
                'request_product_info' => $request->request_product_info,
                'request_destination_country' => $request->request_destination_country,
                'request_destination_address' => $request->request_destination_address,
                'request_procurement_country' => $request->request_procurement_country,
                'request_shipping_plan' => $request->request_shipping_plan, 
                'request_add_my_brand_image' => $request->request_add_my_brand_image, 
                'request_date_created' => now(),
                'request_date_updated' => now(),
                'status' => 'order_request_pending',
                'created_at' => now(),
                'updated_at' => now()
            ]
          );


        //delay 2 seconds before updating images
        sleep(2);

        //:::::::::: SAVE IMAGE STARTS :::::::::://
        //stores files in as defualt directory: "storage/app/image" 
        //get file name using $file_name = $filex['name']
        //XController::xfile(REQUEST-DATA, FILE-ELEMENT-NAME, FILE-TYPES-ALLOWED, FILE-SIZE, FILE-LOCATION-IN-STORAGE, REQUIRED(Y=Yes, N=No))
        $filex1 = XController::xfile($request, 'request_product_image', 'jpg,png,gif,svg,JPG,PNG,GIF,SVG', 2000, 'request_product_image', 'N');
        if ($filex1['name'] != null){
        DB::table('orders')
                ->where('pid_order', '=', $pid_order)
                ->where('pid_user', '=', $pid_user)
                ->update(['request_product_image' => $filex1['name'],]);}
        //:::::::::: SAVE IMAGE STOPS :::::::::://

        //delay 1 second before uploading the second image
        sleep(1);

        //:::::::::: SAVE IMAGE STARTS :::::::::://
        //stores files in as defualt directory: "storage/app/image" 
        //get file name using $file_name = $filex['name']
        //XController::xfile(REQUEST-DATA, FILE-ELEMENT-NAME, FILE-TYPES-ALLOWED, FILE-SIZE, FILE-LOCATION-IN-STORAGE, REQUIRED(Y=Yes, N=No))
        $filex2 = XController::xfile($request, 'request_brand_image', 'jpg,png,gif,svg,JPG,PNG,GIF,SVG', 2000, 'request_brand_image', 'N');
        if ($filex2['name'] != null){
        DB::table('orders')
                ->where('pid_order', '=', $pid_order)
                ->where('pid_user', '=', $pid_user)
                ->update(['request_brand_image' => $filex2['name'],]);}
        //:::::::::: SAVE IMAGE STOPS :::::::::://

            //////////////////// REQUIRED CORE DATA ////////////////////
            $data = array();
            $pid_user = Auth::user()->pid_user;
            //HEAVY LOADER
            $data['orders'] = XLoad::records('orders');
            $data['counts'] = XLoad::records('counts');
            //LIGHT LOADER
            $data['user'] = XRecordsController::records('user');
            //////////////////// REQUIRED CORE DATA ////////////////////

        \Session::flash('success', 'Your Request was Successfully placed, and will be attended to shortly.');
        return redirect('order/order_request_pending/view/index');exit;
        //return view('pages/update_profile_page', $data);
    }






        //REQUEST QUOTES UPDATE
        public function request_quotes_update_prox(Request $request)
        { 
  
            //META
            $data = array();
            $pid_user = Auth::user()->pid_user;
            $pid_order = $request->pid_order;
      
            //UPDATE RECORDS
            DB::table('orders')
                  ->where('pid_order', $pid_order)
                  ->where('pid_user', $pid_user)
                  ->update([
                        'request_product_name' => $request->request_product_name,
                        'request_product_link' => $request->request_product_link,
                        'request_product_quantity' => $request->request_product_quantity,
                        'request_product_info' => $request->request_product_info,
                        'request_destination_country' => $request->request_destination_country,
                        'request_destination_address' => $request->request_destination_address,
                        'request_procurement_country' => $request->request_procurement_country,
                        'request_shipping_plan' => $request->request_shipping_plan, 
                        'request_add_my_brand_image' => $request->request_add_my_brand_image, 
                        'request_date_created' => now(),
                        'request_date_updated' => now(), 
                        'updated_at' => now()
                      ]);
    
            
            //delay 2 seconds before updating images
            sleep(1);
    
            //:::::::::: SAVE IMAGE STARTS :::::::::://
            //stores files in as defualt directory: "storage/app/image" 
            //get file name using $file_name = $filex['name']
            //XController::xfile(REQUEST-DATA, FILE-ELEMENT-NAME, FILE-TYPES-ALLOWED, FILE-SIZE, FILE-LOCATION-IN-STORAGE, REQUIRED(Y=Yes, N=No))
            $filex1 = XController::xfile($request, 'request_product_image', 'jpg,png,gif,svg,JPG,PNG,GIF,SVG', 2000, 'request_product_image', 'N');
            if ($filex1['name'] != null){
            DB::table('orders')
                    ->where('pid_order', '=', $pid_order)
                    ->where('pid_user', '=', $pid_user)
                    ->update(['request_product_image' => $filex1['name'],]);}
            //:::::::::: SAVE IMAGE STOPS :::::::::://

            //delay 1 second before uploading the second image
            sleep(1);
    
            //:::::::::: SAVE IMAGE STARTS :::::::::://
            //stores files in as defualt directory: "storage/app/image" 
            //get file name using $file_name = $filex['name']
            //XController::xfile(REQUEST-DATA, FILE-ELEMENT-NAME, FILE-TYPES-ALLOWED, FILE-SIZE, FILE-LOCATION-IN-STORAGE, REQUIRED(Y=Yes, N=No))
            $filex2 = XController::xfile($request, 'request_brand_image', 'jpg,png,gif,svg,JPG,PNG,GIF,SVG', 2000, 'request_brand_image', 'N');
            if ($filex2['name'] != null){
            DB::table('orders')
                    ->where('pid_order', '=', $pid_order)
                    ->where('pid_user', '=', $pid_user)
                    ->update(['request_brand_image' => $filex2['name'],]);}
            //:::::::::: SAVE IMAGE STOPS :::::::::://
    

            //////////////////// REQUIRED CORE DATA ////////////////////
            $data = array();
            $pid_user = Auth::user()->pid_user;
            //HEAVY LOADER
            $data['orders'] = XLoad::records('orders');
            $data['counts'] = XLoad::records('counts');
            //LIGHT LOADER
            $data['user'] = XRecordsController::records('user');
            //$data['order_x'] = XRecordsController::order('load_order_x', $pid_order);
            //////////////////// REQUIRED CORE DATA ////////////////////
    

            \Session::flash('success', 'Your Request was Successfully updated and placed again, it will be attended to shortly.');
            return redirect('order/order_request_pending/view/index');exit;
            //return view('pages/update_profile_page', $data);
        }
    




        //############################# PROX DELETE :: REQUEST-QUOTES-DELETE #############################//
        public function request_quotes_delete_prox(Request $request)
        { 

            //META
            $data = array();
            $pid_user = Auth::user()->pid_user;
            $pid_order = $request->pid_order;

            DB::table('orders')
                    ->where('pid_order', '=', $pid_order)
                    ->where('pid_user', '=', $pid_user)
                    ->update(['xstatus' => 0,]);


            \Session::flash('success', 'Record has been successfully deleted.');
            return redirect('request_quotes_view_index');exit;

        }








        





////////////////////// END OF CONTROLLER ///////////////////////
}
