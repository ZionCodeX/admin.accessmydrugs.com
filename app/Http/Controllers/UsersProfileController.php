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

class UsersProfileController extends Controller
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

    public function users_profile_view_status_index($status)
    {
        $data = array();
        $pid_admin = Auth::user()->pid_admin;
        //////////////////// REQUIRED CORE DATA ////////////////////
        $data['pid_admin'] = $pid_admin;
        $data['orders'] = XLoad::records('orders');
        $data['counts'] = XLoad::records('counts');
		$data['user'] = XRecordsController::user('load_user_all');
        $data['count_users_registered'] = XTR::count(['users']);
        $data['count_users_activated'] = DB::table('users')->whereNotNull('email_verified_at')->where('xstatus', '=', 1)->count();
        $data['count_users_unactivated'] = DB::table('users')->whereNull('email_verified_at')->where('xstatus', '=', 1)->count();
        //$data['order_x'] = XRecordsController::order('load_order_x', $pid_order);
        //$data['user'] = XTR::single(['users',5000, 'id', 'DESC'],['pid_user','=','07064407000']);
        //$data['user'] = XTR::multiple(['users',5000, 'id', 'DESC'],['pid_user','=','07064407000']);
        //$data['user'] = XTR::join(['users','orders'],['pid_user','pid_user'],['country','=',$country]);
        //$data['user'] = XTR::count(['users','id','=',2]);
        //////////////////// REQUIRED CORE DATA ////////////////////

        
        //ORDERS COUNTER
        $data['count_orders_all'] = DB::table('orders')->where('xstatus', 1)->count();
        $data['count_orders_attempted'] = DB::table('orders')->where('status','=','attempted')->where('xstatus', 1)->count();
        $data['count_orders_paid'] = DB::table('orders')->where('status','=','paid')->where('xstatus', 1)->count();
        $data['count_orders_processing'] = DB::table('orders')->where('status','=','processing')->where('xstatus', 1)->count();
        $data['count_orders_in_transit'] = DB::table('orders')->where('status','=','in_transit')->where('xstatus', 1)->count();
        $data['count_orders_delivered'] = DB::table('orders')->where('status','=','delivered')->where('xstatus', 1)->count();
        $data['count_orders_cancelled'] = DB::table('orders')->where('status','=','cancelled')->where('xstatus', 1)->count();
        
        
        //USERS RECORDS
        if($status == ''){$data['users_x'] = XRecordsController::users('');}
        if($status == 'ALL'){$data['users_x'] = XRecordsController::users('SHOW_ALL');}
        if($status == 'ACTIVATED'){$data['users_x'] = XRecordsController::users('SHOW_ACTIVATED');}
        if($status == 'UNACTIVATED'){$data['users_x'] = XRecordsController::users('SHOW_UNACTIVATED');}
        
        //USERS RECORDS COUNT
        if($status == ''){$data['count_x'] = XRecordsController::users('');}
        if($status == 'ALL'){$data['count_x'] = XRecordsController::users('COUNT_ALL');}
        if($status == 'ACTIVATED'){$data['count_x'] = XRecordsController::users('COUNT_ACTIVATED');}
        if($status == 'UNACTIVATED'){$data['count_x'] = XRecordsController::users('COUNT_UNACTIVATED');}
        $data['status_type'] = $status;

        return view('pages/users_profile_view_status_index', $data);
    }



    
    
    
    
    
    




////////////////////// END OF CONTROLLER ///////////////////////
}    
    
    
    