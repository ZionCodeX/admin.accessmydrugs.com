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

class OrdersCalculationController extends Controller
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


    

     
    //############################# ORDER CALCULATION CORE #############################//
    public static function calc($pid_order)
    {

        $data = array();
        $pid_admin = Auth::user()->pid_admin;

        //tw = TOTAL WEIGHT
        //tt_cost = TOTAL COST
        //sc_cost = SERVICE CHARGE COST
        //vc_cost = VAT CHARGE COST

        //sc_rate = SERVICE CHARGE RATE
        //vt_rate = VAT RATE
        //sh_rate = SHIPING RATE
        //elc_cost = ESTIMATED LANDING COST

        //GET ORDER
        $order = DB::table('orders')->where('pid_order',$pid_order)->first();

        //FINANCIAL SETTINGS
        $financial_settings = DB::table('financial_settings')->where('xstatus',1)->first();

        //SHIPPINIG RATES
        $shipping_rates = DB::table('shipping_rates')->where('country_source_slug',$order->order_procurement_country)->where('country_destination_slug',$order->order_destination_country)->first();

        //EXCHANGE RATES
        $exchange_rates = DB::table('exchange_rates')->where('xstatus',1)->where('currency2',$shipping_rates->country_destination_currency)->first();

        //USER PROFILE
        $user = DB::table('users')->where('pid_user',$order->pid_user)->where('xstatus',1)->first();

        //SOURCE COUNTRY
        $source_country = $shipping_rates->country_source_name;
        
        //DESTINATION COUNTRY
        $destination_country = $shipping_rates->country_destination_name;

        //DESTINATION ADDRESS
        $destination_address = $order->order_destination_address;

        //SHIPPING DURATION
        $shipping_duration = $shipping_rates->shipping_duration;

        //SHIPPING INFO
        $shipping_info = $shipping_rates->shipping_info;

        //CUSTOMER FULL NAME
        $customer_full_name = $user->last_name.' '.$user->first_name.' '.$user->other_name;

        //SHIPPING RATE
        if($order->order_shipping_plan == 'AIR_SHIPPING'){$sh_rate = $order->order_shipping_rate; $measurement_type = 'Kg'; $shipping_plan = 'Air Shipping';}
        if($order->order_shipping_plan == 'SEA_SHIPPING'){$sh_rate = $order->order_shipping_rate; $measurement_type = 'Cbm'; $shipping_plan = 'Sea Shipping';}

        //EXCHANGE RATE AND CURRENCY CODE
        if(!empty($exchange_rates)){
            $alternate_currency_code = $exchange_rates->currency2;
            $alternate_currency_rate = $exchange_rates->exchange_rate;
        }else{
            $alternate_currency_code = 'USD';
            $alternate_currency_rate = 1;
        }

        //CALCULATION VARIABLES
        $order_vat_rate = floatval($order->order_vat);
        $order_service_charge_rate = floatval($financial_settings->service_charge);
        $order_shipping_rate = floatval( $sh_rate );
        $order_total_cost = floatval( DB::table('products')->where('pid_order','=',$pid_order)->sum(DB::raw('product_unit_price * product_quantity')));
        $order_total_weight = floatval( DB::table('products')->where('pid_order','=',$pid_order)->sum(DB::raw('product_weight * product_quantity')));
        $additional_cost = $order->order_additional_cost;
        $additional_cost_title = $order->order_additional_cost_title;
        
        //SHORTENED VARIABLE
        $vc_rate = $order_vat_rate;
        $sc_rate = $order_service_charge_rate;
        $sh_rate = $order_shipping_rate;
        $tt_weight = $order_total_weight;

        //CALCULATION CORE
        $tt_cost = $order_total_cost;
        $sc_cost = (($sc_rate / 100) * $tt_cost);
        $vc_cost = (($vc_rate / 100) * $sc_cost);
        $sh_cost = ($sh_rate * $tt_weight);
        $ad_cost = $additional_cost;
        
        $elc_cost = $tt_cost + $sc_cost + $vc_cost + $sh_cost + $ad_cost;

        $data['vat_rate'] = $vc_rate;
        $data['measurement_type'] = $measurement_type;
        $data['shipping_plan'] = $shipping_plan;
        $data['service_charge_rate'] = $sc_rate;
        $data['shipping_rate'] = $sh_rate;
        $data['total_weight'] = $tt_weight;
        $data['total_cost'] = $tt_cost;
        $data['service_charge_cost'] = $sc_cost;
        $data['vat_cost'] = $vc_cost;
        $data['shipping_cost'] = $sh_cost;
        $data['additional_cost'] = $ad_cost;
        $data['additional_cost_title'] = $additional_cost_title;
        $data['shipping_duration'] = $shipping_duration;
        $data['shipping_info'] = $shipping_info;
        $data['source_country'] = $source_country;
        $data['destination_country'] = $destination_country;
        $data['destination_address'] = $destination_address;
        $data['alternate_currency_code'] = $alternate_currency_code;
        $data['alternate_currency_rate'] = $alternate_currency_rate;
        $data['customer_full_name'] = $customer_full_name;
        $data['estimated_landing_cost'] = $elc_cost;

        return $data;
    }





////////////////////// END OF CONTROLLER ///////////////////////
}
