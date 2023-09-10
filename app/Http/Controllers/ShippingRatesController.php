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

class ShippingRatesController extends Controller
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


    

     
    //############################# SHIPPING RATE CREATE INDEX #############################//
    public function shipping_rate_create_form_index()
    {
      
        $data = array();
        $pid_admin = Auth::user()->pid_admin;

        //////////////////// REQUIRED CORE DATA ////////////////////
        //heavy loaders
        $data['orders'] = XLoad::records('orders');
        $data['counts'] = XLoad::records('counts');
        $data['pid_admin'] = $pid_admin;
        //////////////////// REQUIRED CORE DATA ////////////////////

        $data['exchange_rates'] = DB::table('exchange_rates')->where('xstatus',1)->orderBy('id','DESC')->get();//posts

        return view('pages/shipping_rate_create_form_index', $data);exit;

    }




    //############################# SHIPPING RATE CREATE PROX #############################//
    public function shipping_rate_create_form_prox(Request $request)
    {
   
        $data = array();
        $pid_admin = Auth::user()->pid_admin;
        $author_name = Auth::user()->first_name.' '.Auth::user()->last_name;

        //////////////////// REQUIRED CORE DATA ////////////////////
        $data['pid_admin'] = $pid_admin;
        //heavy loaders
        $data['orders'] = XLoad::records('orders');
        $data['counts'] = XLoad::records('counts');
        //$data['post'] = DB::table('posts')->where('pid_post',$pid_post)->first();
        //////////////////// REQUIRED CORE DATA ////////////////////


        $pid_shipping_rate = 'SHIPR'.XController::xhash(5).time();//generate random post id

        $country_source_slug = \Str::slug($request->country_source_name);//convert to slug
        $country_destination_slug = \Str::slug($request->country_destination_name);//convert to slug


            DB::table('shipping_rates')->insert(
				[
                    'pid_shipping_rate' => $pid_shipping_rate,
                    'pid_admin' => $pid_admin,
					'country_source_slug' => $country_source_slug,
					'country_source_name' => $request->input('country_source_name'),
                    'country_source_currency' => $request->input('country_source_currency'),
                    'country_destination_currency' => $request->input('country_destination_currency'),
					'country_destination_slug' => $country_destination_slug,
					'country_destination_name' => $request->input('country_destination_name'),
                    'shipping_rate_kg' => $request->input('shipping_rate_kg'),
					'shipping_rate_cbm' => $request->input('shipping_rate_cbm'),
                    'shipping_duration' => $request->input('shipping_duration'),
                    'shipping_info' => $request->input('shipping_info'),
					'status' => $request->input('active_status'),
					'created_at' => now(),
					'updated_at' => now()
				]
			);


        $data['shipping_rates'] = DB::table('shipping_rates')->where('xstatus',1)->orderBy('id','DESC')->get();//posts

        \Session::flash('success','Shipping Rate has been Successfully Added!');
        return redirect()->route('shipping_rate_view_table_index', $data);
        //return view('pages/post_view_table_index', $data);exit;

    }




    //############################# SHIPPING RATE UPDATE INDEX #############################//
    public function shipping_rate_update_form_index($pid_shipping_rate)
    {

        $data = array();
        $pid_admin = Auth::user()->pid_admin;
        $author_name = Auth::user()->first_name.' '.Auth::user()->last_name;

        //////////////////// REQUIRED CORE DATA ////////////////////
        $data['pid_admin'] = $pid_admin;
        //heavy loaders
        $data['orders'] = XLoad::records('orders');
        $data['counts'] = XLoad::records('counts');
        //$data['post'] = DB::table('posts')->where('pid_post',$pid_post)->first();
        //////////////////// REQUIRED CORE DATA ////////////////////

        $data['shipping_rate'] = DB::table('shipping_rates')->where('pid_shipping_rate',$pid_shipping_rate)->first();//load single record

        $data['exchange_rates'] = DB::table('exchange_rates')->where('xstatus',1)->orderBy('id','DESC')->get();//posts


        return view('pages/shipping_rate_update_form_index', $data);exit;

    }



    //############################# POST UPDATE PROX #############################//
    public function shipping_rate_update_form_prox(Request $request)
    {

        $data = array();
        $pid_admin = Auth::user()->pid_admin;

        $pid_shipping_rate = $request->pid_shipping_rate;
        $data['shipping_rates'] = DB::table('shipping_rates')->where('xstatus',1)->orderBy('id','DESC')->get();//load all posts

        //heavy loaders
        $data['orders'] = XLoad::records('orders');
        $data['counts'] = XLoad::records('counts');


        $country_source_slug = \Str::slug($request->country_source_name);//convert to slug
        $country_destination_slug = \Str::slug($request->country_destination_name);//convert to slug


        DB::table('shipping_rates')
                ->where('pid_shipping_rate', $pid_shipping_rate)
                ->where('xstatus', 1)
                ->update([
                    'pid_admin' => $pid_admin,
					'country_source_slug' => $country_source_slug,
					'country_source_name' => $request->input('country_source_name'),
					'country_destination_slug' => $country_destination_slug,
					'country_destination_name' => $request->input('country_destination_name'),
                    'country_source_currency' => $request->input('country_source_currency'),
                    'country_destination_currency' => $request->input('country_destination_currency'),
                    'shipping_rate_kg' => $request->input('shipping_rate_kg'),
					'shipping_rate_cbm' => $request->input('shipping_rate_cbm'),
                    'shipping_duration' => $request->input('shipping_duration'),
                    'shipping_info' => $request->input('shipping_info'),
					'status' => $request->input('active_status'),
					'updated_at' => now()
                    ]);


            \Session::flash('success','Shipping Rate has been Successfully Updated!');
            return redirect()->route('shipping_rate_view_table_index', $data);
            //return routes('post_view_table_index')->with($data);
            //return view('pages/post_view_table_index', $data);exit;

    }






     //############################# POST DELETE PROX #############################//
     public function shipping_rate_delete_record_prox(Request $request)
     {
 
         $data = array();
         $pid_admin = Auth::user()->pid_admin;
 
         //$pid_order = $request->pid_order;
         //$pid_user = $request->pid_user;
         $pid_shipping_rate = $request->pid_shipping_rate;

        //heavy loaders
        $data['orders'] = XLoad::records('orders');
        $data['counts'] = XLoad::records('counts');
         //////////////////// REQUIRED CORE DATA ////////////////////
         //light loaders
         $data['shipping_rates'] = DB::table('shipping_rates')->where('pid_shipping_rate',$pid_shipping_rate)->first();

         DB::table('shipping_rates')
                    ->where('pid_shipping_rate', $pid_shipping_rate)
                    ->delete();


         \Session::flash('success', 'Shipping Rate has been successfully deleted!');
         //return redirect('order/order_request_pending/view/index');exit;
         return redirect()->route('shipping_rate_view_table_index', $data);
         //return view('pages/post_view_table_index', $data);exit;
 
     }   




    //############################# SHIPPING RATE VIEW TABLE INDEX #############################//
    public function shipping_rate_view_table_index()
    {

        $data = array();
        $pid_admin = Auth::user()->pid_admin;

        //////////////////// REQUIRED CORE DATA ////////////////////
        $data['pid_admin'] = $pid_admin;
        //heavy loaders
        $data['orders'] = XLoad::records('orders');
        $data['counts'] = XLoad::records('counts');
        //LIGHT LOADER
        //$data['user'] = XRecordsController::records('user');
        $data['shipping_rates'] = DB::table('shipping_rates')->where('xstatus',1)->orderBy('id','DESC')->get();
        //$data['posts'] = DB::table('posts')->where('status','published')->where('xstatus',1)->get();
        //////////////////// REQUIRED CORE DATA ////////////////////


        return view('pages/shipping_rate_view_table_index', $data);exit;

    }


    //############################# POST VIEW TABLE INDEX #############################//
    public function shipping_rate_view_list_index($pid_shipping_rate)
    {

        $data = array();
        $pid_admin = Auth::user()->pid_admin;

        //////////////////// REQUIRED CORE DATA ////////////////////
        $data['pid_admin'] = $pid_admin;
        //heavy loaders
        $data['orders'] = XLoad::records('orders');
        $data['counts'] = XLoad::records('counts');
        //LIGHT LOADER
        //$data['user'] = XRecordsController::records('user');
        $data['shipping_rate'] = DB::table('shipping_rates')->where('pid_shipping_rate', $pid_shipping_rate)->where('xstatus',1)->first();
        //////////////////// REQUIRED CORE DATA ////////////////////


        return view('pages/shipping_rate_view_list_index', $data);exit;

    }



        





////////////////////// END OF CONTROLLER ///////////////////////
}
