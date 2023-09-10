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


class RequestController extends Controller
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

    //DASHBOARD
    public function index()
    {
        return view('welcome');
    }


    //DASHBOARD
    public function pending_request()
    {
        $data = array();
        //USERS RECORDS
        $data['users_show_all'] = XRecordsController::users('SHOW_ALL');
        $data['users_count_all'] = XRecordsController::users('COUNT_ALL');
        $data['users_count_activated'] = XRecordsController::users('COUNT_ACTIVATED');
        $data['users_count_unactivated'] = XRecordsController::users('COUNT_UNACTIVATED');

        //REQUEST RECORDS
        $data['request_show_all'] = XRecordsController::requests('SHOW_ALL');
        $data['request_show_pending'] = XRecordsController::requests('SHOW_PENDING');
        $data['request_count_all'] = XRecordsController::requests('COUNT_ALL');
        $data['request_count_pending'] = XRecordsController::requests('COUNT_PENDING');

        return view('pages/dashboard', $data);
    }



    //ORDERS
    public function orders($status)
    {
        //meta data
        $data = array();
        //$pid_user = Auth::user()->pid_user;
        //USERS RECORDS
        $data['users_show_all'] = XRecordsController::users('SHOW_ALL');
        $data['users_count_all'] = XRecordsController::users('COUNT_ALL');
        $data['users_count_registered'] = XRecordsController::users('COUNT_REGISTERED');
        $data['users_count_unregistered'] = XRecordsController::users('COUNT_UNREGISTERED');

        //REQUEST RECORDS
        $data['request_show_all'] = XRecordsController::request('SHOW_ALL');
        $data['request_count_all'] = XRecordsController::request('COUNT_ALL');

        return view('pages/orders', $data);
    }


    //QUOTES ON-HOLD
    public function quotes_onhold()
    {
        return view('pages/quotes_onhold');
    }



    //PROFILE UPDATE
    public function password_reset()
    {
        $data = array();
        //USERS RECORDS
        $data['users_show_all'] = XRecordsController::users('SHOW_ALL');
        $data['users_count_all'] = XRecordsController::users('COUNT_ALL');
        $data['users_count_registered'] = XRecordsController::users('COUNT_REGISTERED');
        $data['users_count_unregistered'] = XRecordsController::users('COUNT_UNREGISTERED');

        //REQUEST RECORDS
        $data['request_show_all'] = XRecordsController::request('SHOW_ALL');
        $data['request_count_all'] = XRecordsController::request('COUNT_ALL');
        return view('pages/password_reset', $data);
    }


    //BANK PAYMENT
    public function bank_payment()
    {
        return view('pages/bank_payment');
    }


    //PAYMENT STATUS
    public function payment_status()
    {
        return view('pages/payment_status');
    }


    //REGISTER COMPANY
    public function users_record()
    {
        //meta data
        $data = array();
        //$pid_user = Auth::user()->pid_user;
        //USERS RECORDS
        $data['users_show_all'] = XRecordsController::users('SHOW_ALL');
        $data['users_count_all'] = XRecordsController::users('COUNT_ALL');
        $data['users_count_registered'] = XRecordsController::users('COUNT_ACTIVATED');
        $data['users_count_unregistered'] = XRecordsController::users('COUNT_UNACTIVATED');

        //REQUEST RECORDS
        $data['request_show_all'] = XRecordsController::requests('SHOW_ALL');
        $data['request_count_all'] = XRecordsController::requests('COUNT_ALL');

        return view('pages/users_record', $data);
    }


    public function not_available()
    {
        $data = array();
        //USERS RECORDS
        $data['users_show_all'] = XRecordsController::users('SHOW_ALL');
        $data['users_count_all'] = XRecordsController::users('COUNT_ALL');
        $data['users_count_registered'] = XRecordsController::users('COUNT_REGISTERED');
        $data['users_count_unregistered'] = XRecordsController::users('COUNT_UNREGISTERED');

        //REQUEST RECORDS
        $data['request_show_all'] = XRecordsController::requests('SHOW_ALL');
        $data['request_count_all'] = XRecordsController::requests('COUNT_ALL');

        \Session::flash('failed', 'No Records Available');
 
        return view('pages/dashboard', $data);
        //return redirect('dashboard');exit;
    }






    //LOGOUT
    public function logout(Request $request) 
    {
        Auth::logout();
        return redirect('/login');
    }



////////////////////// END OF CONTROLLER ///////////////////////
}
