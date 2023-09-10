<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class XRecordsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public static $records;

    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['index','register_company']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    ////////////********** USERS RECORDS **********/////////////
    public static function users($data_filter)
    {
        //meta data
        $data = array();
        $pid_admin = Auth::user()->pid_user;

        //------- FILTER RECORDS -------//

        //ALL USERS
        if($data_filter == '')
        {
            $records = DB::table('users')
                        ->where('superuser', '=', "NO")
                        ->where('xstatus', 1)
                        ->orderBy('id', 'DESC')
                        ->get();
        }


        //ALL USERS
        if($data_filter == 'SHOW_ALL')
        {
            $records = DB::table('users')
                        ->where('superuser', '=', "NO")
                        ->where('xstatus', 1)
                        ->orderBy('id', 'DESC')
                        ->get();
        }


        //REGISTERED USRES
        if($data_filter == 'SHOW_ACTIVATED')
        {
            $records = DB::table('users')
                        ->where('superuser', '=', "NO")
                        ->where('email_verified_at', '<>', null)
                        ->where('xstatus', 1)
                        ->orderBy('id', 'DESC')
                        ->get();
        }


        //UNREGISTERED USERS
        if($data_filter == 'SHOW_UNACTIVATED')
        {
            $records = DB::table('users')
                        ->where('superuser', '=', "NO")
                        ->where('email_verified_at', '=', null)
                        ->where('xstatus', 1)
                        ->orderBy('id', 'DESC')
                        ->get();
        }


        //------- COUNT RECORDS -------//

        //COUNT ALL
        if($data_filter == 'COUNT_ALL')
        {
            $records = DB::table('users')
                        ->where('superuser', '=', "NO")
                        ->where('xstatus', 1)
                        ->count();
        }


        //COUNT REGISTERED
        if($data_filter == 'COUNT_ACTIVATED')
        {
            $records = DB::table('users')
                        ->where('superuser', '=', "NO")
                        ->where('email_verified_at', '<>', null)
                        ->where('xstatus', 1)
                        ->count();
        }


        //COUNT UNACTIVATED
        if($data_filter == 'COUNT_UNACTIVATED')
        {
            $records = DB::table('users')
                        ->where('superuser', '=', "NO")
                        ->where('email_verified_at', '=', null)
                        ->where('xstatus', 1)
                        ->count();
        }


        //DATA FOR VIEW
        //$data['result'] = $records;

        return $records;
    }






        ////////////********** ORDERS RECORDS **********/////////////
        public static function orders($data_filter, $param = '')
        {
            //meta datad
            $data = array();
            $pid_admin = Auth::user()->pid_user;
    
    
            //------- FILTER RECORDS -------//

            //ALL ORDERS
            if($data_filter == '')
            {
                $records = DB::table('orders')
                            ->where('xstatus', 1)
                            ->orderBy('id', 'DESC')
                            ->get();
            }
    
    
            //ALL ORDERS
            if($data_filter == 'SHOW_ALL')
            {
                $records = DB::table('orders')
                            ->where('xstatus', 1)
                            ->where('xstatus', 1)
                            ->orderBy('id', 'DESC')
                            ->get();
            }
    
    
            //APPROVED ORDERS
            if($data_filter == 'SHOW_APPROVED')
            {
                $records = DB::table('orders')
                            ->where('status', '=', "APPROVED")
                            ->where('xstatus', 1)
                            ->orderBy('id', 'DESC')
                            ->get();
            }
    
    
            //PENDING ORDERS
            if($data_filter == 'SHOW_PENDING')
            {
                $records = DB::table('orders')
                            ->where('status', '=', "PENDING")
                            ->where('xstatus', 1)
                            ->orderBy('id', 'DESC')
                            ->get();
            }


            //ARRIVED ORDERS
            if($data_filter == 'SHOW_ARRIVED')
            {
                $records = DB::table('orders')
                            ->where('status', '=', "ARRIVED")
                            ->where('xstatus', 1)
                            ->orderBy('id', 'DESC')
                            ->get();
            }


            //PROCESSING ORDERS
            if($data_filter == 'SHOW_SHIPPED')
            {
                $records = DB::table('orders')
                            ->where('status', '=', "SHIPPED")
                            ->where('xstatus', 1)
                            ->orderBy('id', 'DESC')
                            ->get();
            }


            //PROCESSING ORDERS
            if($data_filter == 'SHOW_PROCESSING')
            {
                $records = DB::table('orders')
                            ->where('status', '=', "PROCESSING")
                            ->where('xstatus', 1)
                            ->orderBy('id', 'DESC')
                            ->get();
            }


            //DELIVERED ORDERS
            if($data_filter == 'SHOW_DELIVERED')
            {
                $records = DB::table('orders')
                            ->where('status', '=', "DELIVERED")
                            ->where('xstatus', 1)
                            ->orderBy('id', 'DESC')
                            ->get();
            }
    
    
            //ON_HOLD ORDERS
            if($data_filter == 'SHOW_ONHOLD')
            {
                $records = DB::table('orders')
                            ->where('status', '=', "ONHOLD")
                            ->where('xstatus', 1)
                            ->orderBy('id', 'DESC')
                            ->get();
            }
    
    
            //CANCELLED ORDERS
            if($data_filter == 'SHOW_CANCELLED')
            {
                $records = DB::table('orders')
                            ->where('status', '=', "CANCELLED")
                            ->where('xstatus', 1)
                            ->orderBy('id', 'DESC')
                            ->get();
            }


            //SINGLE REQUEST
            if($data_filter == 'SHOW_SINGLE')
            {
                $pid_order = $param;
                $records = DB::table('orders')
                        ->where('pid_order', '=', $pid_order)
                        ->first();
            }



    
            //------- COUNT RECORDS -------//

            //COUNT ALL
            if($data_filter == 'COUNT_ALL')
            {
                $records = DB::table('orders')
                            ->where('xstatus', 1)
                            ->get();
            }
    
    
            //COUNT ALL
            if($data_filter == 'COUNT_PENDING')
            {
                $records = DB::table('orders')
                            ->where('status', '=', "PENDING")            
                            ->where('xstatus', 1)
                            ->get();
            }
    
    
    
            //DATA FOR VIEW
            //$data['result'] = $records;
    
            return $records;
        }
    
    







 



////////////////////// END OF CONTROLLER ///////////////////////
}
