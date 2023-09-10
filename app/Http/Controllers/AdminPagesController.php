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


class AdminPagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['index','login_admin_index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //DASHBOARD
    public function login_admin_index()
    {
        return view('admin_pages/login_admin_index');
    }


    //DASHBOARD
    public function dashboard()
    {
        $data = array();
        $data = RecordsController::profile();
        $data = RecordsController::request();
        //$data['request_count'] = $data['request_count'];
        //dd($data);

        return view('pages/dashboard', $data);
    }



    //ORDERS
    public function orders($status)
    {
        //meta data
        $data = array();
        //$pid_user = Auth::user()->pid_user;
        $val1 = $status;
        $val2 = 2;
        $val3 = 3;

        //nos of connectors
        //$sap_connectors_count = DB::table('sap_connectors')
                //->where('pid_user', $pid_user)
                //->count();

        //DATA FOR VIEW
        $data['val1'] = $val1;
        $data['val2'] = $val2;
        $data['val3'] = $val3;

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
        $data = RecordsController::profile();
        $data = RecordsController::request();
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
    public function register_company()
    {
        return view('pages/register_company');
    }


    public function not_available()
    {
        $data = array();
        $data = RecordsController::profile();
        $data = RecordsController::request();
        //$data['request_count'] = $data['request_count'];
        //dd($data);

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
