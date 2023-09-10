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

class AdminStagesController extends Controller
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





///////////////////////////////////// ADMIN STAGES PROCESSING ///////////////////////////////////////


   //-------------------- ORDER PROCESSING --------------------//
   public function admin_action_order_processing_prox(Request $request)
   {

       //meta data
       $data = array();
       $pid_admin = Auth::user()->pid_admin;

       $pid_user = $request->pid_user;
       $pid_order = $request->pid_order;
       $old_status = $request->old_status;
       $new_status = 'order_processing';
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

           //UPDATE REQUEST STATUS
           DB::table('orders')
                   ->where('pid_order', '=', $request->pid_order)
                   ->update(['status' => 'order_processing','pid_admin' => $pid_admin,]);

           //check if message is empty
           if($message == '')
           {
               $message = 'Spreadit Procurement Team have begun processing your request. You will be contacted shortly.';
           }

           
            $bank_payment = DB::table('bank_payment')->where('pid_order',$pid_order)->where('pid_user',$pid_user)->first();
            $pid_payment = 'PAY'.XController::xhash(5).time();
            $tx_code = 'TX'.XController::xhash(5).time();




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


             //MESSAGE META DATA
             $message_title = 'Order Processing';

             //message body
             $message_body = "
                             Dear ".$first_name.",<br>
                             Your Order with ID: <b>".$pid_order."</b> is currently being processed.<br><br>
                             You may track your Order Progress on your dashboard.<br><br>
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
               $xdata['email_title'] = 'ORDER PROCESSING STARTS :: SPREADIT ORDER PROCESSING';
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
            //////////////////// REQUIRED CORE DATA ////////////////////

                \Session::flash('success', 'Order was Successfully moved to Processing Stage.');
                //return view('pages/order_view_index', $data);
                return redirect()->route('order_status_view_index', ['status' => $new_status]);
    

   }






   //-------------------- ORDER SHIPPED --------------------//
   public function admin_action_order_shipped_prox(Request $request)
   {

       //meta data
       $data = array();
       $pid_admin = Auth::user()->pid_admin;

       $pid_user = $request->pid_user;
       $pid_order = $request->pid_order;
       $old_status = $request->old_status;
       $new_status = 'order_shipped';
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

           //UPDATE REQUEST STATUS
           DB::table('orders')
                   ->where('pid_order', '=', $request->pid_order)
                   ->update(['status' => 'order_shipped','pid_admin' => $pid_admin,]);

           //check if message is empty
           if($message == '')
           {
               $message = 'Your procured Order has been processed, and is currently being shipped, to destination country.';
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


             //MESSAGE META DATA
             $message_title = 'Order Shipped';

             //message body
             $message_body = "
                             Dear ".$first_name.",<br>
                             Your Order with ID: <b>".$pid_order."</b> has been shipped to the destination country you chose. <br><br>
                             You may track your Order Progress from your dashboard.<br><br>
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
               $xdata['email_title'] = 'ORDER SHIPPED :: SPREADIT ORDER PROCESSING';
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
            //////////////////// REQUIRED CORE DATA ////////////////////

                \Session::flash('success', 'Order was Successfully moved to Shipped Stage.');
                //return view('pages/order_view_index', $data);
                return redirect()->route('order_status_view_index', ['status' => $new_status]);
    

   }







      //-------------------- ORDER ARRIVED --------------------//
      public function admin_action_order_arrived_prox(Request $request)
      {
   
          //meta data
          $data = array();
          $pid_admin = Auth::user()->pid_admin;
   
          $pid_user = $request->pid_user;
          $pid_order = $request->pid_order;
          $old_status = $request->old_status;
          $new_status = 'order_arrived';
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
   
              //UPDATE REQUEST STATUS
              DB::table('orders')
                      ->where('pid_order', '=', $request->pid_order)
                      ->update(['status' => 'order_arrived',
                                'pid_admin' => $pid_admin,
                                'order_additional_cost2' => $request->order_additional_cost2,
                                'order_additional_cost_title2' => $request->order_additional_cost_title2,
                                ]);
   
   
              //check if message is empty
              if($message == '')
              {
                  $message = 'Your Order has arrived in destination country';
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
                          'notification_title' => 'Order Arrived',
                          'notification_content' => $message,
                          'status' => 'UNREAD',
                          'created_at' => now(), 
                          'updated_at' => now(), 
                      ]
                      );
   
   
                //MESSAGE META DATA
                $message_title = 'Order Arrived';
   
                
                if($request->order_additional_cost2 > 0){
                //message body
                $message_body = "
                                Dear ".$first_name.",<br>
                                Your Order with ID: <b>".$pid_order."</b> has arrived in destination country.<br>
                                The Product(s) will be delivered to you soonest.<br><br><br>
                                You have additional charges to be made on this order.<br>
                                Please log into your dashbord to process this update.<br><br>
                                We may call or send an email if we need more information.<br><br>
                                <b>::ADMIN ADDITIONAL INFO::</b><br>"
                                .$message.
                                "<br><br>Thank you.<br>
                                Kind Regards,<br>
                                ";
                }else{
                                    //message body
                $message_body = "
                                Dear ".$first_name.",<br>
                                Your Order with ID: <b>".$pid_order."</b> has arrived in destination country.<br><br>
                                The Product(s) will be delivered to you soonest.<br><br>
                                We may call or send an email if we need more information.<br><br>
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
                  $xdata['email_title'] = 'ORDER ARRIVED :: SPREADIT ORDER PROCESSING';
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
               //////////////////// REQUIRED CORE DATA ////////////////////
   
                   \Session::flash('success', 'Order was Successfully moved to Arrived Stage.');
                   //return view('pages/order_view_index', $data);
                   return redirect()->route('order_status_view_index', ['status' => $new_status]);
       
   
      }








      //-------------------- ORDER DELIVERED --------------------//
      public function admin_action_order_delivered_prox(Request $request)
      {
   
          //meta data
          $data = array();
          $pid_admin = Auth::user()->pid_admin;
   
          $pid_user = $request->pid_user;
          $pid_order = $request->pid_order;
          $old_status = $request->old_status;
          $new_status = 'order_delivered';
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
   
              //UPDATE REQUEST STATUS
              DB::table('orders')
                      ->where('pid_order', '=', $request->pid_order)
                      ->update(['status' => 'order_delivered','pid_admin' => $pid_admin,]);
   
   
              //check if message is empty
              if($message == '')
              {
                  $message = 'Your Order has been delivered to destination address.';
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
                          'notification_title' => 'Order Delivered',
                          'notification_content' => $message,
                          'status' => 'UNREAD',
                          'created_at' => now(), 
                          'updated_at' => now(), 
                      ]
                      );
   
   
                //MESSAGE META DATA
                $message_title = 'Order Delivered';
   
                //message body
                $message_body = "
                                Dear ".$first_name.",<br>
                                Your Order with ID: <b>".$pid_order."</b> has been delivered to the destination address.<br><br>
                                If you have not received your product, please contact the Procurement Team immediately.<br><br>
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
                  $xdata['email_title'] = 'ORDER DELIVERED :: SPREADIT ORDER PROCESSING';
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
               //////////////////// REQUIRED CORE DATA ////////////////////
   
                   \Session::flash('success', 'Order was Successfully moved to Delivered Stage.');
                   //return view('pages/order_view_index', $data);
                   return redirect()->route('order_status_view_index', ['status' => $new_status]);
       
   
      }










      //-------------------- ORDER COMPLETED --------------------//
      public function admin_action_order_completed_prox(Request $request)
      {
   
          //meta data
          $data = array();
          $pid_admin = Auth::user()->pid_admin;
   
          $pid_user = $request->pid_user;
          $pid_order = $request->pid_order;
          $old_status = $request->old_status;
          $new_status = 'order_completed';
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
   
              //UPDATE REQUEST STATUS
              DB::table('orders')
                      ->where('pid_order', '=', $request->pid_order)
                      ->update(['status' => 'order_completed','pid_admin' => $pid_admin,]);
   
   
              //check if message is empty
              if($message == '')
              {
                  $message = 'Your Order procurement process has been completed and closed.';
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
                          'notification_title' => 'Order Delivered',
                          'notification_content' => $message,
                          'status' => 'UNREAD',
                          'created_at' => now(), 
                          'updated_at' => now(), 
                      ]
                      );
   
   
                //MESSAGE META DATA
                $message_title = 'Order Delivered';
   
                //message body
                $message_body = "
                                Dear ".$first_name.",<br>
                                Your Order with ID: <b>".$pid_order."</b> has been Completed and closed.<br><br>
                                If you are having any issues with this procurement, please contact the Procurement Team immediately.<br><br>
                                We will like to see more of you.<br><br>
                                Thank you for your business.<br><br>
                                <b>::ADMIN ADDITIONAL INFO::</b><br>"
                                .$message.
                                "<br><br>Thank you.<br>
                                Kind Regards,<br>
                                ";
   
              ////////////////// EMAIL SENDER STARTS //////////////////
                  //mail body contents
                  $xdata = array();
                  $xdata['to'] = $data['user']->email;
                  $xdata['email_title'] = 'ORDER PROCUREMENT IS COMPLETED :: SPREADIT ORDER PROCESSING';
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
               //////////////////// REQUIRED CORE DATA ////////////////////
   
                   \Session::flash('success', 'Order was Successfully moved to Completed Stage and closed.');
                   //return view('pages/order_view_index', $data);
                   return redirect()->route('order_status_view_index', ['status' => $new_status]);
       
   
      }









////////////////////// END OF CONTROLLER ///////////////////////
}
