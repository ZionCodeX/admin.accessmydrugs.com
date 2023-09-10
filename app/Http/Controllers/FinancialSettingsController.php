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

class FinancialSettingsController extends Controller
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


    




    //############################# SHIPPING RATE UPDATE INDEX #############################//
    public function financial_settings_update_form_index()
    {

        $data = array();
        $pid_admin = Auth::user()->pid_admin;
        //$author_name = Auth::user()->first_name.' '.Auth::user()->last_name;

        //////////////////// REQUIRED CORE DATA ////////////////////
        $data['pid_admin'] = $pid_admin;
        //heavy loaders
        $data['orders'] = XLoad::records('orders');
        $data['counts'] = XLoad::records('counts');
        //$data['post'] = DB::table('posts')->where('pid_post',$pid_post)->first();
        //////////////////// REQUIRED CORE DATA ////////////////////

        //$data['shipping_rate'] = DB::table('shipping_rates')->where('pid_shipping_rate',$pid_shipping_rate)->first();//load single record

        $data['financial_settings'] = DB::table('financial_settings')->where('id',1)->where('xstatus',1)->first();//posts


        return view('pages/financial_settings_update_form_index', $data);exit;

    }



    //############################# POST UPDATE PROX #############################//
    public function financial_settings_update_form_prox(Request $request)
    {

        $data = array();
        $pid_admin = Auth::user()->pid_admin;

        $id = $request->id;

        //heavy loaders
        $data['orders'] = XLoad::records('orders');
        $data['counts'] = XLoad::records('counts');

        DB::table('financial_settings')
                ->where('id', $id)
                ->where('xstatus', 1)
                ->update([
                    'pid_admin' => $pid_admin,
					'vat' => $request->input('vat'),
					'service_charge' => $request->input('service_charge'),
					'status' => $request->input('active_status'),
					'updated_at' => now()
                    ]);


            \Session::flash('success','Financial Settings has been Successfully Updated!');
            return redirect()->route('financial_settings_view_list_index', $data);
            //return routes('post_view_table_index')->with($data);
            //return view('pages/post_view_table_index', $data);exit;

    }



    //############################# SHIPPING RATE UPDATE INDEX #############################//
    public function financial_settings_view_list_index()
    {

        $data = array();
        $pid_admin = Auth::user()->pid_admin;
        //$author_name = Auth::user()->first_name.' '.Auth::user()->last_name;

        //////////////////// REQUIRED CORE DATA ////////////////////
        $data['pid_admin'] = $pid_admin;
        //heavy loaders
        $data['orders'] = XLoad::records('orders');
        $data['counts'] = XLoad::records('counts');
        //$data['post'] = DB::table('posts')->where('pid_post',$pid_post)->first();
        //////////////////// REQUIRED CORE DATA ////////////////////

        //$data['shipping_rate'] = DB::table('shipping_rates')->where('pid_shipping_rate',$pid_shipping_rate)->first();//load single record

        $data['financial_settings'] = DB::table('financial_settings')->where('id',1)->where('xstatus',1)->first();//posts


        return view('pages/financial_settings_view_list_index', $data);exit;

    }









////////////////////// END OF CONTROLLER ///////////////////////
}
