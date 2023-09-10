<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\XISCode;
use App\Http\Controllers\XController;
use App\Http\Controllers\XRecordsController;



class XLoad extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['index','register_company']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */





    ///////////////////*************** ALL ORDER RECORDS ***************////////////////////
    public static function records($data_filter, $param = '')
    {
        //meta data
        $data = array();
        $pid_user = Auth::user()->pid_user;



        ///////////////////*** USER RECORDS ***//////////////////
        if($data_filter == 'user')
            {
                $record = DB::table('users')
                            ->where('pid_user', $pid_user)
                            ->where('xstatus', 1)
                            ->first();
                            return $record;
            }
    


        ///////////////////*** ALL ORDER RECORDS ***//////////////////
        if($data_filter == 'orders'){
            //LOAD ORDER RECORDS 
            $data['load_order_all'] = XRecordsController::order('load_order_all');
            $data['load_order_request_saved'] = XRecordsController::order('load_order_request_saved');
            $data['load_order_request_pending'] = XRecordsController::order('load_order_request_pending');
            $data['load_order_request_processing'] = XRecordsController::order('load_order_request_processing');
            $data['load_order_quote_processing'] = XRecordsController::order('load_order_quote_processing');
            $data['load_order_request_onhold'] = XRecordsController::order('load_order_request_onhold');
            $data['load_order_quote_generated'] = XRecordsController::order('load_order_quote_generated');
            $data['load_order_invoice_generated'] = XRecordsController::order('load_order_invoice_generated');
            $data['load_order_invoice_pending'] = XRecordsController::order('load_order_invoice_pending');
            $data['load_order_invoice_expired'] = XRecordsController::order('load_order_invoice_expired');
            $data['load_order_pending'] = XRecordsController::order('load_order_pending');
            $data['load_order_processing'] = XRecordsController::order('load_order_processing');
            $data['load_order_shipped'] = XRecordsController::order('load_order_shipped');
            $data['load_order_arrived'] = XRecordsController::order('load_order_arrived');
            $data['load_order_delivered'] = XRecordsController::order('load_order_delivered');
            $data['load_order_completed'] = XRecordsController::order('load_order_completed');
            $data['load_order_onhold'] = XRecordsController::order('load_order_onhold');
            $data['load_order_request_cancelled'] = XRecordsController::order('load_order_request_cancelled');
            return $data;
        }

        ///////////////////*** ALL ORDER RECORDS ***//////////////////
        if($data_filter == 'counts'){
            //COUNT ORDER RECORDS
            $data['count_order_all'] = XRecordsController::order('count_order_all');
            $data['count_order_request_saved'] = XRecordsController::order('count_order_request_saved');
            $data['count_order_request_pending'] = XRecordsController::order('count_order_request_pending');
            $data['count_order_request_processing'] = XRecordsController::order('count_order_request_processing');
            $data['count_order_quote_processing'] = XRecordsController::order('count_order_quote_processing');
            $data['count_order_request_onhold'] = XRecordsController::order('count_order_request_onhold');
            $data['count_order_quote_generated'] = XRecordsController::order('count_order_quote_generated');
            $data['count_order_invoice_generated'] = XRecordsController::order('count_order_invoice_generated');
            $data['count_order_invoice_pending'] = XRecordsController::order('count_order_invoice_pending');
            $data['count_order_invoice_expired'] = XRecordsController::order('count_order_invoice_expired');
            $data['count_order_processing'] = XRecordsController::order('count_order_processing');
            $data['count_order_shipped'] = XRecordsController::order('count_order_shipped');
            $data['count_order_arrived'] = XRecordsController::order('count_order_arrived');
            $data['count_order_delivered'] = XRecordsController::order('count_order_delivered');
            $data['count_order_completed'] = XRecordsController::order('count_order_completed');
            $data['count_order_onhold'] = XRecordsController::order('count_order_onhold');
            $data['count_order_request_cancelled'] = XRecordsController::order('count_order_request_cancelled');
            return $data;
        }

        //LOAD ORDER PRODUCT RECORDS
        //$data["load_order_product"] = XRecordsController::product('load_order_product', $pid_order);


        ///////////////////*** MESSAGES, CHATS & NOTIFICATION RECORDS ***//////////////////
        if($data_filter == 'mcn'){
        //LOAD MESSAGE RECORDS
        $data["load_message_all"] = XRecordsController::message('load_message_all', $pid_user);
        //$data["load_message_order"] = XRecordsController::message('load_message_order', $pid_order, $pid_user);

        //LOAD CHAT RECORDS
        $data["load_chat_all"] = XRecordsController::chat('load_chat_all', $pid_user);
        //$data["load_chat_order"] = XRecordsController::chat('load_chat_order', $pid_order, $pid_user);

        //LOAD NOTIFICATION RECORDS
        $data["load_notification_all"] = XRecordsController::notification('load_notification_all', $pid_user);
        //$data["load_notification_order"] = XRecordsController::notification('load_notification_order', $pid_order, $pid_user);
        return $data;
        }
        
        

    }




////////////////////// END OF CONTROLLER ///////////////////////
}
