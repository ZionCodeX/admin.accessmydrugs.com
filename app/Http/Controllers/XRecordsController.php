<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\XISCode;
use App\Http\Controllers\XController;
//use App\Http\Controllers\XRecordsController;



class XRecordsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */





    ///////////////////*************** USERS RECORD ***************////////////////////
    public static function user($data_filter, $param = '')
    {
        //meta data
        $data = array();
        $pid_admin = Auth::user()->pid_admin;
        $record = "";
            //SINGLE USER RECORD
            if($data_filter == 'load_user_x')
            {
                $pid_user = $param;
                $record = DB::table('users')
                            ->where('pid_user', $pid_user)
                            ->where('xstatus', 1)
                            ->first();
            }

            // ALL USER RECORD
            if($data_filter == 'load_all')
            {
                $record = DB::table('users')
                            ->where('xstatus', 1)
                            ->get();
            }


            // UNACTIVATED USERS RECORD
            if($data_filter == 'load_activated')
            {
                $record = DB::table('users')
                            ->where('xstatus', 1)
                            ->get();
            }
        
        return $record;
    }





    ///////////////////*************** ORDER PRODUCTS ***************////////////////////
    public static function product($data_filter, $param = '')
    {

        //meta data
        $data = array();
        $pid_admin = Auth::user()->pid_admin;


        //SINGLE ORDER RECORD
        if($data_filter == 'load_order_product_x')
        {
            $pid_order = $param;
            $records = DB::table('products')
                    ->where('pid_order', '=', $pid_order)
                    ->get();
        }

        
        return $records;

    }

    



    ///////////////////*************** ORDERS ***************////////////////////
    public static function order($data_filter, $param = '')
    {

        //meta data
        $data = array();
        $pid_admin = Auth::user()->pid_admin;
        $records = '';

        //SINGLE ORDER RECORD
        if($data_filter == 'load_order_x')
        {
            $pid_order = $param;
            $records = DB::table('orders')
                    ->where('pid_order', '=', $pid_order)
                    ->where('xstatus', 1)
                    ->orderBy('id', 'DESC')
                    ->first();
        }


        //ALL ORDERS
        if($data_filter == '')
        {
            $records = DB::table('orders')
                    ->where('xstatus', 1)
                    ->orderBy('id', 'DESC')
                    ->get();
        }


        //ALL ORDERS
        if($data_filter == 'load_order_all')
        {
            $records = DB::table('orders')
                    ->where('xstatus', 1)
                    ->orderBy('id', 'DESC')
                    ->get();
        }



        //SAVED REQUEST
        if($data_filter == 'load_order_request_saved')
        {
            $records = DB::table('orders')
                        ->where('status', '=', "order_request_saved")
                        ->where('xstatus', 1)
                        ->orderBy('id', 'DESC')
                        ->get();

        }



        //PENDING_REQUEST
        if($data_filter == 'load_order_request_pending')
        {
            $records = DB::table('orders')
                        ->where('status', '=', "order_request_pending")
                        ->where('xstatus', 1)
                        ->orderBy('id', 'DESC')
                        ->get();

        }

       

        //PROCESSING_REQUEST
        if($data_filter == 'load_order_request_processing')
        {
            $records = DB::table('orders')        
                        ->where('status', '=', "order_request_processing")
                        ->where('xstatus', 1)
                        ->orderBy('id', 'DESC')
                        ->get();
        }



        //PROCESSING_QUOTE
        if($data_filter == 'load_order_quote_processing')
        {
            $records = DB::table('orders')        
                        ->where('status', '=', "order_quote_processing")
                        ->where('xstatus', 1)
                        ->orderBy('id', 'DESC')
                        ->get();
        }        


        //ONHOLD ORDER REQUEST
        if($data_filter == 'load_order_request_onhold')
        {
            $records = DB::table('orders')
                        ->where('status', '=', "order_request_onhold")
                        ->where('xstatus', 1)
                        ->orderBy('id', 'DESC')
                        ->get();
        }        


        //GENERATED QUOTE
        if($data_filter == 'load_order_quote_generated')
        {
            $records = DB::table('orders')          
                        ->where('status', '=', "order_quote_generated")
                        ->where('xstatus', 1)
                        ->orderBy('id', 'DESC')
                        ->get();
        }        

        //GENERATED INVOICE
        if($data_filter == 'load_order_invoice_generated')
        {
            $records = DB::table('orders')
                        ->where('status', '=', "order_invoice_generated")
                        ->where('xstatus', 1)
                        ->orderBy('id', 'DESC')
                        ->get();
        }



         //PENDING INVOICE
         if($data_filter == 'load_order_invoice_pending')
         {
             $records = DB::table('orders')
                         ->where('status', '=', "order_invoice_pending")
                         ->where('xstatus', 1)
                         ->orderBy('id', 'DESC')
                         ->get();
         }      
         
         

         //EXPIRED INVOICE
         if($data_filter == 'load_order_invoice_expired')
         {
             $records = DB::table('orders')
                         ->where('status', '=', "order_invoice_expired")
                         ->where('xstatus', 1)
                         ->orderBy('id', 'DESC')
                         ->get();
         }   



        //PENDING ORDER
        if($data_filter == 'load_order_pending')
        {
            $records = DB::table('orders')
                        ->where('status', '=', "order_pending")
                        ->where('xstatus', 1)
                        ->orderBy('id', 'DESC')
                        ->get();
        }


        //PROCESSING ORDER
        if($data_filter == 'load_order_processing')
        {
            $records = DB::table('orders')
                        ->where('status', '=', "order_processing")
                        ->where('xstatus', 1)
                        ->orderBy('id', 'DESC')
                        ->get();
        }


        //SHIPPED ORDER
        if($data_filter == 'load_order_shipped')
        {
            $records = DB::table('orders')
                        ->where('status', '=', "order_shipped")
                        ->where('xstatus', 1)
                        ->orderBy('id', 'DESC')
                        ->get();
        }

        
        //ARRIVED ORDER
        if($data_filter == 'load_order_arrived')
        {
            $records = DB::table('orders')
                        ->where('status', '=', "order_arrived")
                        ->where('xstatus', 1)
                        ->orderBy('id', 'DESC')
                        ->get();
        }


         //DELIVERED ORDER
        if($data_filter == 'load_order_delivered')
        {
            $records = DB::table('orders')
                        ->where('status', '=', "order_delivered")
                        ->where('xstatus', 1)
                        ->orderBy('id', 'DESC')
                        ->get();
        }
        
        
        //COMPLETED ORDER
        if($data_filter == 'load_order_completed')
        {
            $records = DB::table('orders')
                        ->where('status', '=', "order_completed")
                        ->where('xstatus', 1)
                        ->orderBy('id', 'DESC')
                        ->get();
        }   
        
        
        //ONHOLD ORDER
        if($data_filter == 'load_order_onhold')
        {
            $records = DB::table('orders')
                        ->where('status', '=', "order_onhold")
                        ->where('xstatus', 1)
                        ->orderBy('id', 'DESC')
                        ->get();
        }



        //CANCELLED REQUEST
        if($data_filter == 'load_order_request_cancelled')
        {
            $records = DB::table('orders')
                        ->where('status', '=', "order_request_cancelled")
                        ->where('xstatus', 1)
                        ->orderBy('id', 'DESC')
                        ->get();
        }




 /////////////////// ORDERS RECORD COUNT ////////////////

        //COUNT ALL ORDERS
        if($data_filter == '')
        {
            $records = DB::table('orders')
                    ->where('xstatus', 1)
                    ->count();
        }


        //COUNT ALL ORDERS
        if($data_filter == 'count_order_all')
        {
            $records = DB::table('orders')
                    ->where('xstatus', 1)
                    ->count();
        }



        //COUNT SAVED REQUEST
        if($data_filter == 'count_order_request_saved')
        {
            $records = DB::table('orders')
                        ->where('status', '=', "order_request_saved")
                        ->where('xstatus', 1)
                        ->count();
        }


        //COUNT PENDING_REQUEST
        if($data_filter == 'count_order_request_pending')
        {
            $records = DB::table('orders')
                        ->where('status', '=', "order_request_pending")
                        ->where('xstatus', 1)
                        ->count();
        }


        //COUNT PROCESSING_REQUEST
        if($data_filter == 'count_order_request_processing')
        {
            $records = DB::table('orders')        
                        ->where('status', '=', "order_request_processing")
                        ->where('xstatus', 1)
                        ->count();
        }


        //COUNT PROCESSING_QUOTE
        if($data_filter == 'count_order_quote_processing')
        {
            $records = DB::table('orders')        
                        ->where('status', '=', "order_quote_processing")
                        ->where('xstatus', 1)
                        ->count();
        }     


        //COUNT ONHOLD ORDER REQUEST
        if($data_filter == 'count_order_request_onhold')
        {
            $records = DB::table('orders')
                        ->where('status', '=', "order_request_onhold")
                        ->where('xstatus', 1)
                        ->count();
        }        


        //COUNT GENERATED QUOTE
        if($data_filter == 'count_order_quote_generated')
        {
            $records = DB::table('orders')          
                        ->where('status', '=', "order_quote_generated")
                        ->where('xstatus', 1)
                        ->count();
        }        


        //COUNT GENERATED INVOICE
        if($data_filter == 'count_order_invoice_generated')
        {
            $records = DB::table('orders')
                        ->where('status', '=', "order_invoice_generated")
                        ->where('xstatus', 1)
                        ->count();
        }



         //COUNT PENDING INVOICE
         if($data_filter == 'count_order_invoice_pending')
         {
             $records = DB::table('orders')
                         ->where('status', '=', "order_invoice_pending")
                         ->where('xstatus', 1)
                         ->count();
         }       



        //COUNT EXPIRED INVOICE
        if($data_filter == 'count_order_invoice_expired')
        {
            $records = DB::table('orders')
                        ->where('status', '=', "order_invoice_expired")
                        ->where('xstatus', 1)
                        ->count();
        }   



        //COUNT PROCESSING ORDER
        if($data_filter == 'count_order_processing')
        {
            $records = DB::table('orders')
                        ->where('status', '=', "order_processing")
                        ->where('xstatus', 1)
                        ->count();
        }


        //COUNT SHIPPED ORDER
        if($data_filter == 'count_order_shipped')
        {
            $records = DB::table('orders')
                        ->where('status', '=', "order_shipped")
                        ->where('xstatus', 1)
                        ->count();
        }

        
        //COUNT ARRIVED ORDER
        if($data_filter == 'count_order_arrived')
        {
            $records = DB::table('orders')
                        ->where('status', '=', "order_arrived")
                        ->where('xstatus', 1)
                        ->count();
        }


         //COUNT DELIVERED ORDER
        if($data_filter == 'count_order_delivered')
        {
            $records = DB::table('orders')
                        ->where('status', '=', "order_delivered")
                        ->where('xstatus', 1)
                        ->count();
        }
        
        
        //COUNT COMPLETED ORDER
        if($data_filter == 'count_order_completed')
        {
            $records = DB::table('orders')
                        ->where('status', '=', "order_completed")
                        ->where('xstatus', 1)
                        ->count();
        }   
        
        
        //COUNT ONHOLD ORDER
        if($data_filter == 'count_order_onhold')
        {
            $records = DB::table('orders')
                        ->where('status', '=', "order_onhold")
                        ->where('xstatus', 1)
                        ->count();
        }
        
 

        //COUNT CANCELLED REQUEST
        if($data_filter == 'count_order_request_cancelled')
        {
            $records = DB::table('orders')
                        ->where('status', '=', "order_request_cancelled")
                        ->where('xstatus', 1)
                        ->count();
        }




        return $records;
    }






   

    ///////////////////*************** MESSAGE RECORDS ***************////////////////////
    public static function message($data_filter, $param1 = '', $param2 = '')
    {

        //meta data
        $data = array();
        $pid_user = Auth::user()->pid_user;
        $records = '';

        //SINGLE ORDER RECORD
        if($data_filter == 'load_messages')
        {
            $pid_order = $param1;
            $pid_user = $param2;
            $records = DB::table('messages')
                    ->where('xstatus', 1)
                    ->limit(300)
                    ->orderBy('id', 'asc')
                    ->get();
        }

        
        return $records;

    }






    ///////////////////*************** CHAT RECORDS ***************////////////////////
    public static function chat($data_filter, $param1 = '', $param2 = '')
    {

        //meta data
        $data = array();
        $pid_user = Auth::user()->pid_user;
        $records = '';
        //SINGLE ORDER RECORD
        if($data_filter == 'load_chat_order')
        {
            $pid_order = $param1;
            $pid_user = $param2;
            $records = DB::table('chats')
                    ->where('pid_order', '=', $pid_order)
                    ->where('pid_user', '=', $pid_user)
                    ->get();
        }

        
        return $records;

    }





    ///////////////////*************** NOTIFICATION RECORDS ***************////////////////////
    public static function notification($data_filter, $param1 = '', $param2 = '')
    {

        //meta data
        $data = array();
        $pid_user = Auth::user()->pid_user;
        $records = '';
        //SINGLE ORDER RECORD
        if($data_filter == 'load_notification_order')
        {
            $pid_order = $param1;
            $pid_user = $param2;
            $records = DB::table('notifications')
                    ->where('pid_order', '=', $pid_order)
                    ->where('pid_user', '=', $pid_user)
                    ->get();
        }

        
        return $records;

    }
    
    
    
    
 
 
 
 
    ////////////********** USERS RECORDS **********/////////////
    public static function users($data_filter)
    {
        $limit = 10000;

        //meta data
        $data = array();
        $pid_admin = Auth::user()->pid_user;
        $records = '';


        //------- FILTER RECORDS -------//

        //ALL USERS
        if($data_filter == '')
        {
            $records = DB::table('users')
                        ->where('xstatus', 1)
                        ->limit($limit)
                        ->orderBy('id', 'DESC')
                        ->get();
        }


        //ALL USERS
        if($data_filter == 'SHOW_ALL')
        {
            $records = DB::table('users')
                        ->where('xstatus', 1)
                        ->limit($limit)
                        ->orderBy('id', 'DESC')
                        ->get();
        }


        //REGISTERED USRES
        if($data_filter == 'SHOW_ACTIVATED')
        {
            $records = DB::table('users')
                        ->where('email_verified_at', '<>', null)
                        ->where('xstatus', 1)
                        ->limit($limit)
                        ->orderBy('id', 'DESC')
                        ->get();
        }


        //UNREGISTERED USERS
        if($data_filter == 'SHOW_UNACTIVATED')
        {
            $records = DB::table('users')
                        ->where('email_verified_at', '=', null)
                        ->where('xstatus', 1)
                        ->limit($limit)
                        ->orderBy('id', 'DESC')
                        ->get();
        }


        //------- COUNT RECORDS -------//



        //COUNT ALL
        if($data_filter == '')
        {
            $records = DB::table('users')
                        ->where('xstatus', 1)
                        ->count();
        }
        
        
        //COUNT ALL
        if($data_filter == 'COUNT_ALL')
        {
            $records = DB::table('users')
                        ->where('xstatus', 1)
                        ->count();
        }


        //COUNT REGISTERED
        if($data_filter == 'COUNT_ACTIVATED')
        {
            $records = DB::table('users')
                        ->where('email_verified_at', '<>', null)
                        ->where('xstatus', 1)
                        ->count();
        }


        //COUNT UNACTIVATED
        if($data_filter == 'COUNT_UNACTIVATED')
        {
            $records = DB::table('users')
                        ->where('email_verified_at', '=', null)
                        ->where('xstatus', 1)
                        ->count();
        }


        //DATA FOR VIEW
        //$data['result'] = $records;

        return $records;
    }

    
    
    
    
    





////////////////////// END OF CONTROLLER ///////////////////////
}
