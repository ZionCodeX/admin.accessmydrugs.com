<?php

namespace App\Http\Controllers;

use Image;
use App\User;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use App\PersonalDatasModel;

class DATAbox extends Controller
{
    //DATA BOX 1
    public static function data1($pid_user, $pid_order, $pid_product){

        //get records
        $card_products = DB::table('card_products')
                    ->where('pid_agent', $pid_user)
                    ->where('pid_order', $pid_order)
                    ->get();
                    

        //get records
        $order_name = DB::table('card_orders')
                    ->where('pid_agent', $pid_user)
                    ->where('pid_order', $pid_order)
                    ->get();
                    $order_name = $order_name[0]->order_name;

        //total quantity of cards
        $total_quantity = DB::table('card_products')
                    ->where('pid_agent', $pid_user)
                    ->where('pid_order', $pid_order)
                    ->sum('card_quantity');

        //total quantity of cards
        $total_quantity = DB::table('card_products')
                    ->where('pid_agent', $pid_user)
                    ->where('pid_order', $pid_order)
                    ->sum('card_quantity');

        //total cost
        $total_cost = DB::table('card_products')
                    ->select(DB::raw('SUM(card_quantity * card_value) AS total_cost'))
                    ->where('pid_agent', $pid_user)
                    ->where('pid_order', $pid_order)
                    ->first();
                    $total_cost = $total_cost->total_cost;


        //PAGE DATA
        $data = array();
        $data['pid_user'] = $pid_user;
        $data['pid_order'] = $pid_order;
        $data['order_name'] = $order_name;
        $data['card_products'] = $card_products;
        $data['total_quantity'] = $total_quantity;
        $data['total_cost'] = '₦'.number_format($total_cost, 2);
        
        return $data;
        }






    //DATA BOX active cards
    public static function data_active_cards(){

        $pid_user = $pid_user = Auth::user()->pid_user;

        //get records
        $cards = DB::table('cards')
                    ->where('pid_agent', $pid_user)
                    ->where('status', 'ACTIVE')
                    ->get();
                    

        //total quantity of cards
        $total_cost_cards = DB::table('cards')
                    ->where('pid_agent', $pid_user)
                    ->where('status', 'ACTIVE')
                    ->sum('card_value');


        //count records
        $total_quantity_cards = DB::table('cards')
                    ->where('pid_agent', $pid_user)
                    ->where('status', 'ACTIVE')
                    ->count();



        //PAGE DATA
        $data = array();
        $data['pid_user'] = $pid_user;
        $data['cards'] = $cards;
        $data['card_status'] = 'Active';
        $data['total_quantity_cards'] = $total_quantity_cards;
        $data['total_cost_cards'] = '₦'.number_format($total_cost_cards, 2);
        
        return $data;
        }






    //DATA BOX used cards
    public static function data_used_cards(){

        $pid_user = $pid_user = Auth::user()->pid_user;

        //get records
        $cards = DB::table('cards')
                    ->where('pid_agent', $pid_user)
                    ->where('status', 'USED')
                    ->get();
                    

        //total quantity of cards
        $total_cost_cards = DB::table('cards')
                    ->where('pid_agent', $pid_user)
                    ->where('status', 'USED')
                    ->sum('card_value');


        //count records
        $total_quantity_cards = DB::table('cards')
                    ->where('pid_agent', $pid_user)
                    ->where('status', 'USED')
                    ->count();



        //PAGE DATA
        $data = array();
        $data['pid_user'] = $pid_user;
        $data['cards'] = $cards;
        $data['card_status'] = 'Used';
        $data['total_quantity_cards'] = $total_quantity_cards;
        $data['total_cost_cards'] = '₦'.number_format($total_cost_cards, 2);
        
        return $data;
        }




//------------------------------// FINANCIAL CALCULATIONS //------------------------------//

    ////////////////// DATA BOX total credit all //////////////////
    public static function total_credit_all(){

        $pid_user = $pid_user = Auth::user()->pid_user;


        //total quantity of cards
        $total_amount = DB::table('transactions_records')
                    ->where('pid_user', $pid_user)
                    ->where('transaction_type', 'CREDIT')
                    ->sum('amount');


        //PAGE DATA
        $data = array();
        $data['info'] = 'Total Credit All';
        $data['total_amount'] = '₦'.number_format($total_amount, 2);
        
        return $data;
        }



    ////////////////// DATA BOX total debit all //////////////////
    public static function total_debit_all(){

        $pid_user = $pid_user = Auth::user()->pid_user;


        //total quantity of cards
        $total_amount = DB::table('transactions_records')
                    ->where('pid_user', $pid_user)
                    ->where('transaction_type', 'DEBIT')
                    ->sum('amount');


        //PAGE DATA
        $data = array();
        $data['info'] = 'Total Credit All';
        $data['total_amount'] = '₦'.number_format($total_amount, 2);
        
        return $data;
        }




        ////////////////// DATA BOX total debit all //////////////////
        public static function total_balance_all(){

            $pid_user = $pid_user = Auth::user()->pid_user;


            //total quantity of cards
            $total_amount_credit = DB::table('transactions_records')
                        ->where('pid_user', $pid_user)
                        ->where('transaction_type', 'CREDIT')
                        ->sum('amount');

            $total_amount_debit = DB::table('transactions_records')
                        ->where('pid_user', $pid_user)
                        ->where('transaction_type', 'DEBIT')
                        ->sum('amount');

            $total_balance_all = $total_amount_credit - $total_amount_debit;


            //PAGE DATA
            $data = array();
            $data['info'] = 'Total Balance All';
            $data['total_balance_all'] = '₦'.number_format($total_balance_all, 2);
            
            return $data;
            }




    //DATA BOX total credit
    public static function total_debit_allx(){

        $pid_user = $pid_user = Auth::user()->pid_user;


        //total quantity of cards
        $total_amount = DB::table('transactions_records')
                    ->where('pid_user', $pid_user)
                    ->where('account_type', 'SAVINGS')
                    ->where('transaction_type', 'CREDIT')
                    ->sum('amount');


        //PAGE DATA
        $data = array();
        $data['info'] = 'Total Credit All';
        $data['total_amount'] = '₦'.number_format($total_amount, 2);
        
        return $data;
        }

        


    //DATA BOX total debit
    public static function total_debit(){

        $pid_user = $pid_user = Auth::user()->pid_user;


        //total quantity of cards
        $total_amount = DB::table('transactions_records')
                    ->where('pid_user', $pid_user)
                    ->where('account_type', 'SAVINGS')
                    ->where('transaction_type', 'CREDIT')
                    ->sum('amount');


        //PAGE DATA
        $data = array();
        $data['info'] = 'Total Credit All';
        $data['total_amount'] = '₦'.number_format($total_amount, 2);
        
        return $data;
        }





    //DATA BOX total debit
    public static function total_debitx(){

        $pid_user = $pid_user = Auth::user()->pid_user;


        //total quantity of cards
        $total_amount = DB::table('transactions_records')
                    ->where('pid_user', $pid_user)
                    ->where('account_type', 'SAVINGS')
                    ->where('transaction_type', 'CREDIT')
                    ->sum('amount');


        //PAGE DATA
        $data = array();
        $data['info'] = 'Total Credit All';
        $data['total_amount'] = '₦'.number_format($total_amount, 2);
        
        return $data;
        }






    ///// END OF DATAbox CODE CLASS /////
}

