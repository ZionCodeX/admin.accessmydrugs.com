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

class AdminActionsController extends Controller
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




    //REQUEST PENDING ACTION
    public function admin_action_request_pending_prox(Request $request)
    {

        //meta data
        $data = array();
        $pid_admin = Auth::user()->pid_admin;

        $pid_user = $request->pid_user;
        $pid_order = $request->pid_order;
        $status = 'order_request_pending';
        $new_status = 'order_request_processing';
        $data['user'] = XTR::single(['users'],['pid_user','=',$pid_user]);
        $first_name = $data['user']->first_name;

        //CORE DATA PARAMS
        $pid_message =  'MSG'.XController::xhash(5).time();
        $pid_notification =  'NTF'.XController::xhash(5).time();
        $pid_thread =  'MSGTRD'.XController::xhash(5).time();
        $pid_context = $request->pid_order;
        $pid_from = $pid_admin;
        $pid_to = $pid_user;
        $message = $request->message;

        //GET USER RECORDS
        $user_records = DB::table('users')
                            ->where('pid_user', $pid_user)
                            ->first();

        //check if lock request button was clicked
        if($request->buttonx == 'lock')
        {
            //UPDATE REQUEST STATUS
            DB::table('orders')
                    ->where('pid_order', '=', $request->pid_order)
                    ->update(['status' => 'order_request_processing','pid_admin' => $pid_admin,]);

            //new status
            $new_status = 'order_request_processing';

                    //check if message is empty
            if($message == '')
            {
                $message = 'Spreadit Procurement Team have begun processing your request. You will be contacted shortly.';
            }
        }

        //check if reject request button was clicked
        if($request->buttonx == 'reject')
        {
            //UPDATE REQUEST STATUS
            DB::table('orders')
                    ->where('pid_order', '=', $request->pid_order)
                    ->update(['status' => 'order_request_onhold','pid_admin' => $pid_admin,]);

            //new status
            $new_status = 'order_request_onhold';

                    //check if message is empty
            if($message == '')
            {
                $message = 'Spreadit Procurement Team have rejected this request and placed it on hold. You may contact the team via mail: admin@spreaditglobal.com';
            }
        }

            //UPDATE MESSAGES RECORDS
            DB::table('messages')->insert(
                [
                    'pid_message' => $pid_message,
                    'pid_context' => $pid_context,
                    'pid_thread' => $pid_thread,
                    'pid_from' => $pid_from,
                    'pid_to' => $pid_to,
                    'title' => "MESSAGE",
                    'message' => $message, 
                    'read' => "N", 
                    'role' => "ADMIN", 
                    'created_at' => now(), 
                    'updated_at' => now()
                ]
                );


                //UPDATE NOTIFICATION RECORDS
                DB::table('notifications')->insert(
                    [
                        'pid_notification' => $pid_notification,
                        'pid_user' => $pid_user,
                        'notification_type' => 'REQUEST_MESSAGE',
                        'notification_title' => 'Request Processing',
                        'notification_content' => $message,
                        'status' => 'UNREAD',
                        'created_at' => now(), 
                        'updated_at' => now(), 
                    ]
                    );


            //SEND EMAIL MESSAGE
            //email action starts



            //SEND SMS MESSAGE
                //BULK SMS NIGERIA SEND SMS METHOD
                //$otp = XIScode::xHashNumeric(6);
                //$first_name = $user_records->first_name;
                //$phone = $user_records->phone;
                //$msisdn = '234'.ltrim($phone, '0');
                //$msisdn = "2348081747779";
                //$msg = "Hi ".$first_name.", you have a notification on your Request. Please check your Email or App Dashboard as soon as possible. -From: SPREADIT TEAM.";
                
                //try {
                //send sms message
                //$status = XController::sendsms($msisdn, $msg);
                //}catch (Throwable $e) {
                    //report($e);
                    //return false;
                //}
                //if sms was successful, update the users ext1 record
                //if($status == "success"){
                //}else{}
 


            //MESSAGE META DATA
            //if locked / accepted
            if($request->buttonx == 'lock')
            {
            //message title
            $message_title = 'Request Processing';
            //message body
			  $message_body = "
							  Dear ".$first_name.",<br>
							  Your request with ID: <b>".$pid_order."</b> is currently being processed.<br><br>
							  Our Request Processing Team should get back to you any time soon.<br><br>
                              Please check your Email or Spreadit-Procurement Dashboard frequently.<br><br>
							  We may call or send an email if we need more information.<br><br>
                              <b>::ADMIN ADDITIONAL INFO::</b><br>"
                              .$message.
                              "<br><br>Thank you.<br>
							  Kind Regards,<br>
							  ";
            }

            //if rejected 
            if($request->buttonx == 'reject')
            {
            //message title
            $message_title = 'Request On-Hold';
            //message body
            $message_body = "
                            Dear ".$first_name.",<br>
                            Your request with ID: <b>".$pid_order."</b> has been placed On-Hold due to issues. <br><br>
                            Please review the Admin Additional Info to see the raised issues.<br><br>
                            If you are not satisfied you can respond to the issues raised right in your dashboard.<br><br>
                            Or you may contact the Admin via <b>admin@spreaditglobal.com</b>.<br><br>
                            <b>::ADMIN ADDITIONAL INFO::</b><br>"
                            .$message.
                            "<br><br>Thank you.<br>
                            Kind Regards,<br>
                            ";
            }
			////////////////// EMAIL SENDER STARTS //////////////////
				//mail body contents
				$xdata = array();
				$xdata['to'] = $data['user']->email;
				$xdata['email_title'] = 'REQUEST PROCESSING :: SPREADIT ORDER PROCESSING';
				$xdata['message_title'] = $message_title;
				$xdata['message_body'] = $message_body;
				//$xdata['message_designation'] = "<b>Tochukwu Nkwocha</b><br>Founder / CEO <br>";
				$xdata['from'] = 'admin@spreaditglobal.com';
				$xdata['message_designation'] = "<b>SPREADIT TEAM</b><br>Request / Order Processing Team<br>";
				$xdata['mail_template'] = 'emails.general_email';
				//send mail
				$send_status = MailController::mailsend($xdata); //$send_status == 'SUCCESS' OR 'FAILED'
            ////////////////// EMAIL SENDER STOPS //////////////////            


        //////////////////// REQUIRED CORE DATA ////////////////////
        $data['pid_admin'] = Auth::user()->pid_admin;
        //status
        $data['order_status'] = $new_status;
        //heavy loaders
        $data['orders'] = XLoad::records('orders');
        $data['counts'] = XLoad::records('counts');
        //light loaders
        $data['load_messages'] = XRecordsController::message('load_messages');
        $data['products'] = DB::table('products')->where('pid_order',$pid_order)->where('pid_user',$pid_user)->where('xstatus',1)->orderBy('id','DESC')->get();
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



        \Session::flash('success', 'Request Update was successfull! Request is now locked for you to process.');
    
        if($request->buttonx == 'lock')
        { return view('pages/order_view_index', $data);}

        if($request->buttonx == 'reject')
        { return view('pages/order_view_index', $data);}

    }







    //REQUEST PENDING ACTION
    public function admin_action_request_processing_prox(Request $request)
    {

        //meta data
        $data = array();
        $pid_admin = Auth::user()->pid_admin;

        $pid_user = $request->pid_user;
        $pid_order = $request->pid_order;
        $status = 'order_request_processing';
        $new_status = 'order_quote_processing';
        $data['user'] = XTR::single(['users'],['pid_user','=',$pid_user]);
        $first_name = $data['user']->first_name;

        //CORE DATA PARAMS
        $pid_message =  'MSG'.XController::xhash(5).time();
        $pid_notification =  'NTF'.XController::xhash(5).time();
        $pid_thread =  'MSGTRD'.XController::xhash(5).time();
        $pid_context = $request->pid_order;
        $pid_from = $pid_admin;
        $pid_to = $pid_user;
        $message = $request->message;

        //GET USER RECORDS
        $user_records = DB::table('users')
                            ->where('pid_user', $pid_user)
                            ->first();

        //check if lock request button was clicked
        if($request->buttonx == 'create_quote')
        { 
            //UPDATE REQUEST STATUS
            DB::table('orders')
                    ->where('pid_order', '=', $request->pid_order)
                    ->update(['status' => 'order_quote_processing','pid_admin' => $pid_admin,]);

            //new status
            $new_status = 'order_quote_processing';

                    //check if message is empty
            if($message == '')
            {
                $message = 'Spreadit Procurement Team have begun processing your request. You will be contacted shortly.';
            }
        }

        //check if reject request button was clicked
        if($request->buttonx == 'reject')
        {
            //UPDATE REQUEST STATUS
            DB::table('orders')
                    ->where('pid_order', '=', $request->pid_order)
                    ->update(['status' => 'order_request_onhold','pid_admin' => $pid_admin,]);

            //new status
            $new_status = 'order_request_onhold';

                    //check if message is empty
            if($message == '')
            {
                $message = 'Spreadit Procurement Team have rejected this request and placed it on hold. You may contact the team via mail: admin@spreaditglobal.com';
            }
        }

            //UPDATE MESSAGES RECORDS
            DB::table('messages')->insert(
                [
                    'pid_message' => $pid_message,
                    'pid_context' => $pid_context,
                    'pid_thread' => $pid_thread,
                    'pid_from' => $pid_from,
                    'pid_to' => $pid_to,
                    'title' => "MESSAGE",
                    'message' => $message, 
                    'read' => "N", 
                    'role' => "ADMIN", 
                    'created_at' => now(), 
                    'updated_at' => now()
                ]
                );


                //UPDATE NOTIFICATION RECORDS
                DB::table('notifications')->insert(
                    [
                        'pid_notification' => $pid_notification,
                        'pid_user' => $pid_user,
                        'notification_type' => 'REQUEST_MESSAGE',
                        'notification_title' => 'Request Processing',
                        'notification_content' => $message,
                        'status' => 'UNREAD',
                        'created_at' => now(), 
                        'updated_at' => now(), 
                    ]
                    );


            //SEND EMAIL MESSAGE
            //email action starts



            //SEND SMS MESSAGE
                //BULK SMS NIGERIA SEND SMS METHOD
                //$otp = XIScode::xHashNumeric(6);
                //$first_name = $user_records->first_name;
                //$phone = $user_records->phone;
                //$msisdn = '234'.ltrim($phone, '0');
                //$msisdn = "2348081747779";
                //$msg = "Hi ".$first_name.", you have a notification on your Request. Please check your Email or App Dashboard as soon as possible. -From: SPREADIT TEAM.";
                
                //try {
                //send sms message
                //$status = XController::sendsms($msisdn, $msg);
                //}catch (Throwable $e) {
                    //report($e);
                    //return false;
                //}
                //if sms was successful, update the users ext1 record
                //if($status == "success"){
                //}else{}
 


            //MESSAGE META DATA
            //if locked / accepted
            if($request->buttonx == 'create_quote')
            {
            //message title
            $message_title = 'Quote Processing';
            //message body
			  $message_body = "
							  Dear ".$first_name.",<br>
							  Your quote with ID: <b>".$pid_order."</b> is currently being processed.<br><br>
							  Our Quote Processing Team should get back to you any time soon.<br><br>
                              Please check your Email or Spreadit-Procurement Dashboard frequently.<br><br>
							  We may call or send an email if we need more information.<br><br>
                              <b>::ADMIN ADDITIONAL INFO::</b><br>"
                              .$message.
                              "<br><br>Thank you.<br>
							  Kind Regards,<br>
							  ";

            ////////////////// EMAIL SENDER STARTS //////////////////
				//mail body contents
				$xdata = array();
				$xdata['to'] = $data['user']->email;
				$xdata['email_title'] = 'QUOTE PROCESSING :: SPREADIT ORDER PROCESSING';
				$xdata['message_title'] = $message_title;
				$xdata['message_body'] = $message_body;
				//$xdata['message_designation'] = "<b>Tochukwu Nkwocha</b><br>Founder / CEO <br>";
				$xdata['from'] = 'admin@spreaditglobal.com';
				$xdata['message_designation'] = "<b>SPREADIT TEAM</b><br>Request / Order Processing Team<br>";
				$xdata['mail_template'] = 'emails.general_email';
				//send mail
				$send_status = MailController::mailsend($xdata); //$send_status == 'SUCCESS' OR 'FAILED'
            ////////////////// EMAIL SENDER STOPS //////////////////     
            }




            //if rejected 
            if($request->buttonx == 'reject')
            {
            //message title
            $message_title = 'Request On-Hold';
            //message body
            $message_body = "
                            Dear ".$first_name.",<br>
                            Your request with ID: <b>".$pid_order."</b> has been placed On-Hold due to issues. <br><br>
                            Please review the Admin Additional Info to see the raised issues.<br><br>
                            If you are not satisfied you can respond to the issues raised right in your dashboard.<br><br>
                            Or you may contact the Admin via <b>admin@spreaditglobal.com</b>.<br><br>
                            <b>::ADMIN ADDITIONAL INFO::</b><br>"
                            .$message.
                            "<br><br>Thank you.<br>
                            Kind Regards,<br>
                            ";

            ////////////////// EMAIL SENDER STARTS //////////////////
				//mail body contents
				$xdata = array();
				$xdata['to'] = $data['user']->email;
				$xdata['email_title'] = 'REQUEST ON-HOLD :: SPREADIT ORDER PROCESSING';
				$xdata['message_title'] = $message_title;
				$xdata['message_body'] = $message_body;
				//$xdata['message_designation'] = "<b>Tochukwu Nkwocha</b><br>Founder / CEO <br>";
				$xdata['from'] = 'admin@spreaditglobal.com';
				$xdata['message_designation'] = "<b>SPREADIT TEAM</b><br>Request / Order Processing Team<br>";
				$xdata['mail_template'] = 'emails.general_email';
				//send mail
				$send_status = MailController::mailsend($xdata); //$send_status == 'SUCCESS' OR 'FAILED'
            ////////////////// EMAIL SENDER STOPS //////////////////     
            }
       


        //////////////////// REQUIRED CORE DATA ////////////////////
        $data['pid_admin'] = Auth::user()->pid_admin;
        //status
        $data['order_status'] = $new_status;
        //heavy loaders
        $data['orders'] = XLoad::records('orders');
        $data['counts'] = XLoad::records('counts');
        //light loaders
        $data['load_messages'] = XRecordsController::message('load_messages');
        $data['products'] = DB::table('products')->where('pid_order',$pid_order)->where('pid_user',$pid_user)->where('xstatus',1)->orderBy('id','DESC')->get();
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



        \Session::flash('success', 'Request Update was successfull! Request is now available for Quote Generation.');
    
        if($request->buttonx == 'create_quote')
        { return view('pages/order_view_index', $data);}

        if($request->buttonx == 'reject')
        { return view('pages/order_view_index', $data);}

    }






        //############################# ORDER-ADMIN-CREATE #############################//
        public function order_admin_create_index(Request $request)
        { 

            $data = array();
            $pid_admin = Auth::user()->pid_admin;

            $pid_order = $request->pid_order;
            $pid_user = $request->pid_user;
            //////////////////// REQUIRED CORE DATA ////////////////////
            //status
            $data['order_status'] = $status;
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
            return view('pages/order_admin_create_index', $data);exit;

        }
    


        //############################# ORDERS-PROCESSING #############################//
        public function order_status_view_index($status)
        { 

            $data = array();
            $pid_admin = Auth::user()->pid_admin;
            //////////////////// REQUIRED CORE DATA ////////////////////
            //status
            $data['order_status'] = $status;
            //heavy loaders
            $data['orders'] = XLoad::records('orders');
            $data['counts'] = XLoad::records('counts');
            //light loaders
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
    





    //############################# INDEX READ TABLE/LIST :: REQUEST-QUOTES-ONHOLD #############################//
    public function request_onhold_view_index()
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

        return view('pages/request_onhold_view_index', $data);
    }    




    //############################# INDEX READ FORM/UPDATE :: REQUEST-QUOTES-UPDATE #############################//
    public function request_quotes_update_index($pid_order)
    {

            //////////////////// REQUIRED CORE DATA ////////////////////
            $data = array();
            $pid_user = Auth::user()->pid_user;
            //HEAVY LOADER
            $data['orders'] = XLoad::records('orders');
            $data['counts'] = XLoad::records('counts');
            //LIGHT LOADER
            $data['user'] = XRecordsController::records('user');
            $data['order_x'] = XRecordsController::order('load_order_x', $pid_order);
            //////////////////// REQUIRED CORE DATA ////////////////////

            
        return view('pages/request_quotes_update_index', $data);
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
    




    
    //QUOTE GENERATED ACTION
    public function admin_action_quote_generated_prox(Request $request)
    {

        //dd($request->all());
        $data = array();
        $pid_admin = Auth::user()->pid_admin;
        $pid_user = $request->pid_user;
        $pid_order = $request->pid_order;
        
        //count nos products
        $data['products_count'] = DB::table('products')->where('pid_order',$pid_order)->count();
        $input_count = $data['products_count'];


        //UPDATE PRODUCT RECORDS
        for ($x = 1; $x < ($input_count + 1); $x++)
        {
            $pid_product = 'pid_product'.$x;
            $pid_product = $request->input($pid_product);

            $product_unit_price = $request->input('P_'.$pid_product);
            $product_weight = $request->input('W_'.$pid_product);

            //echo 'Product Unit Price:'.$product_unit_price.'<br>';
            //echo 'Product Weight:'.$product_weight.'<br><hr>';

            DB::table('products')
                ->where('pid_product',$pid_product)
                ->where('pid_order',$pid_order)
                ->update(['product_unit_price'=>$product_unit_price,'product_weight'=>$product_weight,]);
        }

            //ORDER UPDATE
            DB::table('orders')
                ->where('pid_user',$pid_user)
                ->where('pid_order',$pid_order)
                ->update([
                    'pid_admin'=>$pid_admin,
                    'order_exchange_rate_a'=>$request->order_exchange_rate,
                    'order_additional_cost'=>$request->order_additonal_cost,
                    'order_additional_cost_title'=>$request->order_additonal_cost_title,
                    'order_currency_main'=>'USD',
                    //'order_currency_a'=>'NA',
                    //'order_exchange_rate_a'=>'NA',
                    'order_shipping_rate'=>$request->order_shipping_rate,
                    //'order_shipping_cost'=>'NA',
                    //'order_total_cost'=>'NA',
                    //'order_total_weight'=>'NA',
                    'order_vat'=>$request->order_vat,
                    'order_service_charge'=>$request->order_service_charge,
                    'status'=>'order_quote_generated',
                    'updated_at' => now()
                ]);



        $status = 'order_quote_generated';
        $new_status = 'order_quote_generated';
        $data['user'] = XTR::single(['users'],['pid_user','=',$pid_user]);

        //CORE DATA PARAMS
        $pid_message =  'MSG'.XController::xhash(5).time();
        $pid_notification =  'NTF'.XController::xhash(5).time();
        $pid_thread =  'MSGTRD'.XController::xhash(5).time();
        $pid_context = $request->pid_order;
        $pid_from = $pid_admin;
        $pid_to = $pid_user;
        $message = $request->message;

        //GET USER RECORDS
        $user_records = DB::table('users')
                            ->where('pid_user', $pid_user)
                            ->first();

        //check if lock request button was clicked
        if($request->buttonx == 'generate_quote')
        {
            //UPDATE REQUEST STATUS
            DB::table('orders')
                    ->where('pid_order', '=', $request->pid_order)
                    ->update(['status' => 'order_quote_generated','pid_admin' => $pid_admin,]);

            //new status
            $new_status = 'order_quote_generated';

                    //check if message is empty
            if($message == '')
            {
                $message == 'Spreadit Procurement Team have Generated your Quote request.';
            }
        }

        //check if reject request button was clicked
        if($request->buttonx == 'reject')
        {
            //UPDATE REQUEST STATUS
            DB::table('orders')
                    ->where('pid_order', '=', $request->pid_order)
                    ->update(['status' => 'order_request_onhold','pid_admin' => $pid_admin,]);

            //new status
            $new_status = 'order_request_onhold';

                    //check if message is empty
            if($message == '')
            {
                $message == 'Spreadit Procurement Team have rejected this request and placed it on hold. You may contact the team via mail: admin@spreaditglobal.com';
            }
        }

            //UPDATE MESSAGES RECORDS
            DB::table('messages')->insert(
                [
                    'pid_message' => $pid_message,
                    'pid_context' => $pid_context,
                    'pid_thread' => $pid_thread,
                    'pid_from' => $pid_from,
                    'pid_to' => $pid_to,
                    'title' => "MESSAGE",
                    'message' => $message, 
                    'read' => "N", 
                    'role' => "ADMIN", 
                    'created_at' => now(), 
                    'updated_at' => now()
                ]
                );


                //UPDATE NOTIFICATION RECORDS
                DB::table('notifications')->insert(
                    [
                        'pid_notification' => $pid_notification,
                        'pid_user' => $pid_user,
                        'notification_type' => 'QUOTE_GENERATED_MESSAGE',
                        'notification_title' => 'Quote Generated',
                        'notification_content' => $message,
                        'status' => 'UNREAD',
                        'created_at' => now(), 
                        'updated_at' => now(), 
                    ]
                    );


            //SEND EMAIL MESSAGE
            //email action starts



            //SEND SMS MESSAGE
                //BULK SMS NIGERIA SEND SMS METHOD
                //$otp = XIScode::xHashNumeric(6);
                //$first_name = $user_records->first_name;
                //$phone = $user_records->phone;
                //$msisdn = '234'.ltrim($phone, '0');
                //$msisdn = "2348081747779";
                //$msg = "Hi ".$first_name.", you have a notification on your Request. Please check your Email or App Dashboard as soon as possible. -From: SPREADIT TEAM.";
                
                //try {
                //send sms message
                //$status = XController::sendsms($msisdn, $msg);
                //}catch (Throwable $e) {
                    //report($e);
                    //return false;
                //}
                //if sms was successful, update the users ext1 record
                //if($status == "success"){
                //}else{}


            //MESSAGE META DATA
            //if locked / accepted
            if($request->buttonx == 'generate_quote')
            {
            //message title
            $message_title = 'Quote Generated';
            //message body
            $message_body = "
                            Dear ".$data['user']->first_name.",<br>
                            Your Quote has been Generated with ID: <b>".$pid_order."</b>. <br><br>
                            Please review this quote for your approval. After your approval, you will get an instant invoice for payment.<br><br><br>
                            Or you may contact the Admin via <b>admin@spreaditglobal.com</b>.<br><br>
                            <b>::ADMIN ADDITIONAL INFO::</b><br>"
                            .$message.
                            "<br><br>Thank you.<br>
                            Kind Regards,<br>
                            ";
            ////////////////// EMAIL SENDER STARTS //////////////////
				//mail body contents
				$xdata = array();
				$xdata['to'] = $data['user']->email;
				$xdata['email_title'] = 'QUOTE GENERATED :: SPREADIT ORDER PROCESSING';
				$xdata['message_title'] = $message_title;
				$xdata['message_body'] = $message_body;
				//$xdata['message_designation'] = "<b>Tochukwu Nkwocha</b><br>Founder / CEO <br>";
				$xdata['from'] = 'admin@spreaditglobal.com';
				$xdata['message_designation'] = "<b>SPREADIT TEAM</b><br>Request / Order Processing Team<br>";
				$xdata['mail_template'] = 'emails.general_email';
				//send mail
				$send_status = MailController::mailsend($xdata); //$send_status == 'SUCCESS' OR 'FAILED'
            ////////////////// EMAIL SENDER STOPS //////////////////  
            }

            //if rejected 
            if($request->buttonx == 'reject')
            {
            //message title
            $message_title = 'Request On-Hold';
            //message body
            $message_body = "
                            Dear ".$data['user']->first_name.",<br>
                            Your request with ID: <b>".$pid_order."</b> has been placed On-Hold due to issues. <br><br>
                            Please review the Admin Additional Info to see the raised issues.<br><br>
                            If you are not satisfied you can respond to the issues raised right in your dashboard.<br><br>
                            Or you may contact the Admin via <b>admin@spreaditglobal.com</b>.<br><br>
                            <b>::ADMIN ADDITIONAL INFO::</b><br>"
                            .$message.
                            "<br><br>Thank you.<br>
                            Kind Regards,<br>
                            ";

            ////////////////// EMAIL SENDER STARTS //////////////////
				//mail body contents
				$xdata = array();
				$xdata['to'] = $data['user']->email;
				$xdata['email_title'] = 'REQUEST PROCESSING :: SPREADIT ORDER PROCESSING';
				$xdata['message_title'] = $message_title;
				$xdata['message_body'] = $message_body;
				//$xdata['message_designation'] = "<b>Tochukwu Nkwocha</b><br>Founder / CEO <br>";
				$xdata['from'] = 'admin@spreaditglobal.com';
				$xdata['message_designation'] = "<b>SPREADIT TEAM</b><br>Request / Order Processing Team<br>";
				$xdata['mail_template'] = 'emails.general_email';
				//send mail
				$send_status = MailController::mailsend($xdata); //$send_status == 'SUCCESS' OR 'FAILED'
            ////////////////// EMAIL SENDER STOPS //////////////////  
            }
          


        //////////////////// REQUIRED CORE DATA ////////////////////
        $data['pid_admin'] = Auth::user()->pid_admin;
        //status
        $data['order_status'] = $new_status;
        //heavy loaders
        $data['orders'] = XLoad::records('orders');
        $data['counts'] = XLoad::records('counts');
        //light loaders
        $data['load_messages'] = XRecordsController::message('load_messages');
        //ORDER COMPUTATION
        $data['calc'] = OrdersCalculationController::calc($pid_order);
        $total = DB::table('products')->where('pid_order','=',$pid_order)->sum(DB::raw('product_price * product_quantity'));
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



        \Session::flash('success', 'Quote was Successfully Generated!');
    
        if($request->buttonx == 'generate_quote')
        { return view('pages/order_view_index', $data);}

        if($request->buttonx == 'reject')
        { return view('pages/order_view_index', $data);}

    }







////////////////////// END OF CONTROLLER ///////////////////////
}
