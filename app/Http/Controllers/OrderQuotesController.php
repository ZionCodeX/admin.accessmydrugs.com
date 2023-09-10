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


class OrderQuotesController extends Controller
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
    public function order_quotes_create_index($pid_request, $pid_user)
    {

        //meta data
        $data = array();
        $pid_admin = Auth::user()->pid_admin;

        //USERS RECORDS
        $data['pid_user'] = $pid_user;
        $data['pid_request'] = $pid_request;
        $data['users_show_all'] = XRecordsController::users('SHOW_ALL');

        $data['users_count_all'] = XRecordsController::users('COUNT_ALL');
        $data['users_count_activated'] = XRecordsController::users('COUNT_ACTIVATED');
        $data['users_count_unactivated'] = XRecordsController::users('COUNT_UNACTIVATED');

        //REQUEST RECORDS
        $data['request_show_single'] = XRecordsController::requests('SHOW_SINGLE', $pid_request);
        $data['request_show_all'] = XRecordsController::requests('SHOW_ALL');
        $data['request_count_all'] = XRecordsController::requests('COUNT_ALL');

        //USERS RECORDS
        $data['users_show_all'] = XRecordsController::users('SHOW_ALL');
        $data['users_count_all'] = XRecordsController::users('COUNT_ALL');
        $data['users_count_activated'] = XRecordsController::users('COUNT_ACTIVATED');
        $data['users_count_unactivated'] = XRecordsController::users('COUNT_UNACTIVATED');

        //REQUEST RECORDS
        //$data['request_show_single'] = XRecordsController::requests('SHOW_SINGLE',$pid_request);
        $data['request_show_all'] = XRecordsController::requests('SHOW_ALL');
        $data['request_show_pending'] = XRecordsController::requests('SHOW_PENDING');

        $data['request_count_all'] = XRecordsController::requests('COUNT_ALL');
        $data['request_count_pending'] = XRecordsController::requests('COUNT_PENDING');
        $data['request_count_processing'] = XRecordsController::requests('COUNT_PROCESSING');

        //dd($data['request_count_processing']);
        //ORDER RECORDS
        //$data['order_show_single'] = XRecordsController::orders('SHOW_SINGLE', $pid_order);
        $data['order_show_all'] = XRecordsController::orders('SHOW_ALL');
        $data['order_count_all'] = XRecordsController::orders('COUNT_ALL');


        return view('pages/order_quotes_create_index', $data);
    }

     




    //PROFILE UPDATE INDEX
    public function order_quotes_create_prox(Request $request)
    {

        //meta data
        $data = array();
        $pid_admin = Auth::user()->pid_admin;

        $pid_request = $request->pid_request;
        $pid_user = $request->pid_user;

        $pid_order =  'DER'.XController::xhash(5).time();

        $data['pid_order'] = $pid_order;
        $data['pid_request'] = $pid_request;
        $data['pid_user'] = $pid_user;
        $data['pid_admin'] = $pid_admin;

        //INSERT RECORDS
        DB::table('orders')->insert(
            [
                'pid_order' => $pid_order,
                'pid_request' => $pid_request,
                'pid_admin' => $pid_admin,
                'pid_user' => $pid_user,
                'order_name' => $request->order_name,
                'order_type' => $request->order_type,
                'shipping_plan' => $request->shipping_plan,
                'currency_main' => $request->currency_main,
                'currency_a' => "",
                'currency_b' => "",
                'exchange_rate_a' => "",
                'status' => 'PENDING',
                'created_at' => now(),
                'updated_at' => now()
            ]
          );

          //UPDATE THE REQUEST STATUS TO PROCESSING, SINCE AN ORDER HAS BEEN CREATED FOR IT
          DB::table('requests')
                ->where('pid_request', '=', $pid_request)
                ->where('pid_user', '=', $pid_user)
                ->update(['status' => 'PROCESSING_QUOTE']);

        //USERS RECORDS
        $data['users_show_all'] = XRecordsController::users('SHOW_ALL');
        $data['users_count_all'] = XRecordsController::users('COUNT_ALL');
        $data['users_count_activated'] = XRecordsController::users('COUNT_ACTIVATED');
        $data['users_count_unactivated'] = XRecordsController::users('COUNT_UNACTIVATED');

        //REQUEST RECORDS
        $data['request_show_single'] = XRecordsController::requests('SHOW_SINGLE',$pid_request);

        //ORDER RECORDS
        $data['order_show_single'] = XRecordsController::orders('SHOW_SINGLE', $pid_order);
        $data['order_show_all'] = XRecordsController::orders('SHOW_ALL');
        $data['order_count_all'] = XRecordsController::orders('COUNT_ALL');

        $data['request_count_all'] = XRecordsController::requests('COUNT_ALL');
        $data['request_count_pending'] = XRecordsController::requests('COUNT_PENDING');
        $data['request_count_processing'] = XRecordsController::requests('COUNT_PROCESSING');

        //dd($data['request_count_processing']);
        //ORDER RECORDS
        //$data['order_show_single'] = XRecordsController::orders('SHOW_SINGLE', $pid_order);
        $data['order_show_all'] = XRecordsController::orders('SHOW_ALL');
        $data['order_count_all'] = XRecordsController::orders('COUNT_ALL');

        \Session::flash('success', 'Order was successfully created!');
        //return redirect('request_quotes_create_index');exit;

        return view('pages/products_create_index', $data);
    }







        //PROFILE UPDATE INDEX
        public function quotes_view_index()
        {
            //meta data
            $data = array();
            $pid_admin = Auth::user()->pid_admin;
    
            $data['pid_admin'] = $pid_admin;
    
            //USERS RECORDS
            $data['users_show_all'] = XRecordsController::users('SHOW_ALL');
            $data['users_count_all'] = XRecordsController::users('COUNT_ALL');
            $data['users_count_activated'] = XRecordsController::users('COUNT_ACTIVATED');
            $data['users_count_unactivated'] = XRecordsController::users('COUNT_UNACTIVATED');
    
            //REQUEST RECORDS
            //$data['request_show_single'] = XRecordsController::requests('SHOW_SINGLE',$pid_request);
            $data['request_show_all'] = XRecordsController::requests('SHOW_ALL');
            $data['request_show_pending'] = XRecordsController::requests('SHOW_PENDING');
    
            $data['request_count_all'] = XRecordsController::requests('COUNT_ALL');
            $data['request_count_pending'] = XRecordsController::requests('COUNT_PENDING');
            $data['request_count_processing'] = XRecordsController::requests('COUNT_PROCESSING');
    
            //dd($data['request_count_processing']);
            //ORDER RECORDS
            //$data['order_show_single'] = XRecordsController::orders('SHOW_SINGLE', $pid_order);
            $data['order_show_all'] = XRecordsController::orders('SHOW_ALL');
            $data['order_count_all'] = XRecordsController::orders('COUNT_ALL');
    
            return view('pages/quotes_view_index', $data);
        }
    
        
    
        //PROFILE UPDATE INDEX
        public function orders_processing_view_index()
        {
            //meta data
            $data = array();
            $pid_admin = Auth::user()->pid_admin;
    
            $data['pid_admin'] = $pid_admin;
    
            //USERS RECORDS
            $data['users_show_all'] = XRecordsController::users('SHOW_ALL');
            $data['users_count_all'] = XRecordsController::users('COUNT_ALL');
            $data['users_count_activated'] = XRecordsController::users('COUNT_ACTIVATED');
            $data['users_count_unactivated'] = XRecordsController::users('COUNT_UNACTIVATED');
    
            //REQUEST RECORDS
            //$data['request_show_single'] = XRecordsController::requests('SHOW_SINGLE',$pid_request);
            $data['request_show_all'] = XRecordsController::requests('SHOW_ALL');
            $data['request_show_processing'] = XRecordsController::requests('SHOW_PROCESSING');
            //REQUEST COUNTS
            $data['request_count_all'] = XRecordsController::requests('COUNT_ALL');
            $data['request_count_pending'] = XRecordsController::requests('COUNT_PENDING');
            $data['request_count_processing'] = XRecordsController::requests('COUNT_PROCESSING');


            //ORDER RECORDS
            //$data['request_show_single'] = XRecordsController::requests('SHOW_SINGLE',$pid_request);
            $data['order_show_all'] = XRecordsController::requests('SHOW_ALL');
            $data['order_show_pending'] = XRecordsController::requests('SHOW_PENDING');
            $data['order_show_processing'] = XRecordsController::requests('SHOW_PROCESSING');

            //ORDER COUNTS
            $data['order_count_all'] = XRecordsController::requests('COUNT_ALL');
            $data['order_count_pending'] = XRecordsController::requests('COUNT_PENDING');
            $data['order_count_processing'] = XRecordsController::requests('COUNT_PROCESSING');
    
            //ORDER RECORDS
            //$data['order_show_single'] = XRecordsController::orders('SHOW_SINGLE', $pid_order);
            $data['order_show_all'] = XRecordsController::orders('SHOW_ALL');
            $data['order_count_all'] = XRecordsController::orders('COUNT_ALL');
    
            return view('pages/orders_processing_view_index', $data);
        }






////////////////////// END OF CONTROLLER ///////////////////////
}
