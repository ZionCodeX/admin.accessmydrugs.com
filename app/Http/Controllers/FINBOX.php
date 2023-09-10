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

class FINBOX extends Controller
{


//------------------------------// UNICOOP FINANCIAL BOX CALCULATIONS //------------------------------//

    ////////////////// CREDIT //////////////////
    public static function credit($account_type, $pid_account){

        $pid_user = Auth::user()->pid_user;

        if($pid_account == "NA"){
        //total credit
        if(($account_type == 'ALL') || ($account_type == ''))
        {
            //total amount
            $total_amount = DB::table('transactions_records')
                        ->where('pid_user', $pid_user)
                        ->where('transaction_type', 'CREDIT')
                        ->sum('amount');
        }


        //savings & investment credit
        if(($account_type == 'SAVINGS') || ($account_type == 'INVESTMENT') || ($account_type == 'GROUP-SAVINGS') || ($account_type == 'GROUP-LOANS'))
        {
            //total amount
            $total_amount = DB::table('transactions_records')
                        ->where('pid_user', $pid_user)
                        ->where('account_type', $account_type)
                        ->where('transaction_type', 'CREDIT')
                        ->sum('amount');
        }
    }else{
        //total credit
        if(($account_type == 'ALL') || ($account_type == ''))
        {
            //total amount
            $total_amount = DB::table('transactions_records')
                        ->where('pid_user', $pid_user)
                        ->where('pid_account', $pid_account)
                        ->where('transaction_type', 'CREDIT')
                        ->sum('amount');
        }


        //savings & investment credit
        if(($account_type == 'SAVINGS') || ($account_type == 'INVESTMENT') || ($account_type == 'GROUP-SAVINGS') || ($account_type == 'GROUP-LOANS'))
        {
            //total amount
            $total_amount = DB::table('transactions_records')
                        ->where('pid_user', $pid_user)
                        ->where('pid_account', $pid_account)
                        ->where('account_type', $account_type)
                        ->where('transaction_type', 'CREDIT')
                        ->sum('amount');
        }

    }



            return $total_amount;
        }








    ////////////////// DEBIT //////////////////
    public static function debit($account_type, $pid_account){

            $pid_user = Auth::user()->pid_user;

            if($pid_account == "NA"){
            //total debit
            if(($account_type == 'ALL') || ($account_type == ''))
            {
                //total amount
                $total_amount = DB::table('transactions_records')
                            ->where('pid_user', $pid_user)
                            ->where('transaction_type', 'DEBIT')
                            ->sum('amount');
            }


            //savings investment debit
            if(($account_type == 'SAVINGS') || ($account_type == 'INVESTMENT') || ($account_type == 'GROUP-SAVINGS') || ($account_type == 'GROUP-LOANS'))
            {
                //total amount
                $total_amount = DB::table('transactions_records')
                            ->where('pid_user', $pid_user)
                            ->where('account_type', $account_type)
                            ->where('transaction_type', 'DEBIT')
                            ->sum('amount');
            }

        }else{
                    //total debit
                    if(($account_type == 'ALL') || ($account_type == ''))
                    {
                        //total amount
                        $total_amount = DB::table('transactions_records')
                                    ->where('pid_user', $pid_user)
                                    ->where('pid_account', $pid_account)
                                    ->where('transaction_type', 'DEBIT')
                                    ->sum('amount');
                    }
        
        
                    //savings investment debit
                    if(($account_type == 'SAVINGS') || ($account_type == 'INVESTMENT') || ($account_type == 'GROUP-SAVINGS') || ($account_type == 'GROUP-LOANS'))
                    {
                        //total amount
                        $total_amount = DB::table('transactions_records')
                                    ->where('pid_user', $pid_user)
                                    ->where('pid_account', $pid_account)
                                    ->where('account_type', $account_type)
                                    ->where('transaction_type', 'DEBIT')
                                    ->sum('amount');
                    }
        }
            
            return $total_amount;

        }







        
     ////////////////// BALANCE //////////////////
     public static function balance($account_type = "ALL", $pid_account){

        $pid_user = Auth::user()->pid_user;

        if($pid_account == "NA"){
            //total balance
            if(($account_type == 'ALL') || ($account_type == ''))
            {
                //total amount
                $total_credit = DB::table('transactions_records')
                            ->where('pid_user', $pid_user)
                            ->where('transaction_type', 'CREDIT')
                            ->sum('amount');

                $total_debit = DB::table('transactions_records')
                            ->where('pid_user', $pid_user)
                            ->where('transaction_type', 'DEBIT')
                            ->sum('amount');

                $total_amount = $total_credit - $total_debit;
            }


        //savings & investment balance
        if(($account_type == 'SAVINGS') || ($account_type == 'INVESTMENT') || ($account_type == 'GROUP-SAVINGS') || ($account_type == 'GROUP-LOANS'))
        {
            //total amount
            $total_credit = DB::table('transactions_records')
                        ->where('pid_user', $pid_user)
                        ->where('account_type', $account_type)
                        ->where('transaction_type', 'CREDIT')
                        ->sum('amount');

            $total_debit = DB::table('transactions_records')
                        ->where('pid_user', $pid_user)
                        ->where('account_type', $account_type)
                        ->where('transaction_type', 'DEBIT')
                        ->sum('amount');

            $total_amount = $total_credit - $total_debit;
        }
    }else{
                //total balance
                if(($account_type == 'ALL') || ($account_type == ''))
                {
                    //total amount
                    $total_credit = DB::table('transactions_records')
                                ->where('pid_user', $pid_user)
                                ->where('pid_account', $pid_account)
                                ->where('transaction_type', 'CREDIT')
                                ->sum('amount');
        
                    $total_debit = DB::table('transactions_records')
                                ->where('pid_user', $pid_user)
                                ->where('pid_account', $pid_account)
                                ->where('transaction_type', 'DEBIT')
                                ->sum('amount');
        
                    $total_amount = $total_credit - $total_debit;
                }
        
        
                //savings & investment balance
                if(($account_type == 'SAVINGS') || ($account_type == 'INVESTMENT') || ($account_type == 'GROUP-SAVINGS') || ($account_type == 'GROUP-LOANS'))
                {
                    //total amount
                    $total_credit = DB::table('transactions_records')
                                ->where('pid_user', $pid_user)
                                ->where('pid_account', $pid_account)
                                ->where('account_type', $account_type)
                                ->where('transaction_type', 'CREDIT')
                                ->sum('amount');
        
                    $total_debit = DB::table('transactions_records')
                                ->where('pid_user', $pid_user)
                                ->where('pid_account', $pid_account)
                                ->where('account_type', $account_type)
                                ->where('transaction_type', 'DEBIT')
                                ->sum('amount');
        
                    $total_amount = $total_credit - $total_debit;
                }
    }
    

            return $total_amount;
        }       


     ////////////////// COOP SAVINGS BALANCE //////////////////
     public static function group_savings_balance(){

            //COOPERATIVE GROUP SAVINGS AND LOANS CALCULATIONS
            $total_credit = DB::table('transactions_records')
                        ->where('pid_account', '7712345678')
                        ->where('account_type', 'GROUP-SAVINGS')
                        ->where('transaction_type', 'CREDIT')
                        ->sum('amount');

            $total_debit = DB::table('transactions_records')
                        ->where('pid_account', '7712345678')
                        ->where('account_type', 'GROUP-SAVINGS')
                        ->where('transaction_type', 'DEBIT')
                        ->sum('amount');

            $total_balance = $total_credit - $total_debit;
            return $total_balance;
            
     }


    ////////////////// COOP SAVINGS BALANCE //////////////////
    public static function group_loans_balance(){

            //COOPERATIVE GROUP SAVINGS AND LOANS CALCULATIONS
            $total_credit = DB::table('transactions_records')
                        ->where('pid_account', '8812345678')
                        ->where('account_type', 'GROUP-LOANS')
                        ->where('transaction_type', 'CREDIT')
                        ->sum('amount');

            $total_debit = DB::table('transactions_records')
                        ->where('pid_account', '8812345678')
                        ->where('account_type', 'GROUP-LOANS')
                        ->where('transaction_type', 'DEBIT')
                        ->sum('amount');

            $total_balance = $total_credit - $total_debit;
            return $total_balance;
    }



     ////////////////// TRANSACTIONS BOX //////////////////
     public static function transactions($pid_account = "NA"){

        $data = array();

        $data['total_credit'] = self::credit("ALL", $pid_account);
        $data['total_debit'] = self::debit("ALL", $pid_account);
        $data['total_balance'] = self::balance("ALL", $pid_account);

        $data['savings_credit'] = self::credit("SAVINGS", $pid_account);
        $data['savings_debit'] = self::debit("SAVINGS", $pid_account);
        $data['savings_balance'] = self::balance("SAVINGS", $pid_account);

        $data['investment_credit'] = self::credit("INVESTMENT", $pid_account);
        $data['investment_debit'] = self::debit("INVESTMENT", $pid_account);
        $data['investment_balance'] = self::balance("INVESTMENT", $pid_account);

        $data['group_savings_credit'] = self::credit("GROUP-SAVINGS", '7712345678');
        $data['group_savings_debit'] = self::debit("GROUP-SAVINGS", '7712345678');
        $data['group_savings_balance'] = self::balance("GROUP-SAVINGS", '7712345678');

        $data['group_loans_credit'] = self::credit("GROUP-LOANS", $pid_account);
        $data['group_loans_debit'] = self::debit("GROUP-LOANS", $pid_account);
        $data['group_loans_balance'] = self::balance("GROUP-LOANS", $pid_account);

        $data['group_savings_balance_all'] = self::group_savings_balance();
        $data['group_loans_balance_all'] = self::group_loans_balance();

        return $data;

     }






          ////////////////// LOAD TABLE RECORDS //////////////////
          public static function tablex($account_type, $pid_account){

            $pid_user = Auth::user()->pid_user;
    

            ///////////////////////// TABLE RECORDS WITHOUT ACCOUNT ID ////////////////////////
            //ALL table records
            if(($account_type == 'ALL') && ($pid_account == 'NA'))
            {
                //total amount
                $recordsx = DB::table('transactions_records')
                                ->where('pid_user', $pid_user)
                                ->orderBy('id','DESC')
                                ->get();
            }


            if(($account_type == 'SAVINGS') && ($pid_account == 'NA'))
            {
                //total amount
                $recordsx = DB::table('transactions_records')
                                ->where('pid_user', $pid_user)
                                ->where('account_type', $account_type)
                                ->get();
            }


            if(($account_type == 'INVESTMENT') && ($pid_account == 'NA'))
            {
                //total amount
                $recordsx = DB::table('transactions_records')
                                ->where('pid_user', $pid_user)
                                ->where('account_type', $account_type)
                                ->get();
            }


            //CREDIT table records 
            if(($account_type == 'ALL-CREDIT') && ($pid_account == 'NA'))
            {
                //total amount
                $recordsx = DB::table('transactions_records')
                                ->where('pid_user', $pid_user)
                                ->where('transaction_type', 'CREDIT')
                                ->get();
            }


            if(($account_type == 'SAVINGS-CREDIT') && ($pid_account == 'NA'))
            {
                //total amount
                $recordsx = DB::table('transactions_records')
                                ->where('pid_user', $pid_user)
                                ->where('account_type', 'SAVINGS')
                                ->where('transaction_type', 'CREDIT')
                                ->get();
            }


            if(($account_type == 'INVESTMENT-CREDIT') && ($pid_account == 'NA'))
            {
                //total amount
                $recordsx = DB::table('transactions_records')
                                ->where('pid_user', $pid_user)
                                ->where('account_type', 'INVESTMENT')
                                ->where('transaction_type', 'CREDIT')
                                ->get();
            }


            //DEBIT table records 
            if(($account_type == 'ALL-DEBIT') && ($pid_account == 'NA'))
            {
                //total amount
                $recordsx = DB::table('transactions_records')
                                ->where('pid_user', $pid_user)
                                ->where('transaction_type', 'DEBIT')
                                ->get();
            }


            if(($account_type == 'SAVINGS-DEBIT') && ($pid_account == 'NA'))
            {
                //total amount
                $recordsx = DB::table('transactions_records')
                                ->where('pid_user', $pid_user)
                                ->where('account_type', 'SAVINGS')
                                ->where('transaction_type', 'DEBIT')
                                ->get();
            }


            if(($account_type == 'INVESTMENT-DEBIT') && ($pid_account == 'NA'))
            {
                //total amount
                $recordsx = DB::table('transactions_records')
                                ->where('pid_user', $pid_user)
                                ->where('account_type', 'INVESTMENT')
                                ->where('transaction_type', 'DEBIT')
                                ->get();
            }




            /////////////////////////// TABLE RECORDS WITH ACCOUNT ID ///////////////////////////
            //ALL table records
            if(($account_type == 'ALL') && ($pid_account != 'NA'))
            {
                //total amount
                $recordsx = DB::table('transactions_records')
                                ->where('pid_user', $pid_user)
                                ->where('pid_account', $pid_account)
                                ->get();
            }


            if(($account_type == 'SAVINGS') && ($pid_account != 'NA'))
            {
                //total amount
                $recordsx = DB::table('transactions_records')
                                ->where('pid_user', $pid_user)
                                ->where('pid_account', $pid_account)
                                ->where('account_type', $account_type)
                                ->get();
            }


            if(($account_type == 'INVESTMENT') && ($pid_account != 'NA'))
            {
                //total amount
                $recordsx = DB::table('transactions_records')
                                ->where('pid_user', $pid_user)
                                ->where('pid_account', $pid_account)
                                ->where('account_type', $account_type)
                                ->get();
            }


            //CREDIT table records 
            if(($account_type == 'ALL-CREDIT') && ($pid_account != 'NA'))
            {
                //total amount
                $recordsx = DB::table('transactions_records')
                                ->where('pid_user', $pid_user)
                                ->where('pid_account', $pid_account)
                                ->where('transaction_type', 'CREDIT')
                                ->get();
            }


            if(($account_type == 'SAVINGS-CREDIT') && ($pid_account != 'NA'))
            {
                //total amount
                $recordsx = DB::table('transactions_records')
                                ->where('pid_user', $pid_user)
                                ->where('pid_account', $pid_account)
                                ->where('account_type', 'SAVINGS')
                                ->where('transaction_type', 'CREDIT')
                                ->get();
            }


            if(($account_type == 'INVESTMENT-CREDIT') && ($pid_account != 'NA'))
            {
                //total amount
                $recordsx = DB::table('transactions_records')
                                ->where('pid_user', $pid_user)
                                ->where('pid_account', $pid_account)
                                ->where('account_type', 'INVESTMENT')
                                ->where('transaction_type', 'CREDIT')
                                ->get();
            }


            //DEBIT table records 
            if(($account_type == 'ALL-DEBIT') && ($pid_account != 'NA'))
            {
                //total amount
                $recordsx = DB::table('transactions_records')
                                ->where('pid_user', $pid_user)
                                ->where('pid_account', $pid_account)
                                ->where('transaction_type', 'DEBIT')
                                ->get();
            }


            if(($account_type == 'SAVINGS-DEBIT') && ($pid_account != 'NA'))
            {
                //total amount
                $recordsx = DB::table('transactions_records')
                                ->where('pid_user', $pid_user)
                                ->where('pid_account', $pid_account)
                                ->where('account_type', 'SAVINGS')
                                ->where('transaction_type', 'DEBIT')
                                ->get();
            }


            if(($account_type == 'INVESTMENT-DEBIT') && ($pid_account != 'NA'))
            {
                //total amount
                $recordsx = DB::table('transactions_records')
                                ->where('pid_user', $pid_user)
                                ->where('pid_account', $pid_account)
                                ->where('account_type', 'INVESTMENT')
                                ->where('transaction_type', 'DEBIT')
                                ->get();
            }


    
    
    
                return $recordsx;
            }   



        ////////////////// TRANSACTIONS TABLE BOX //////////////////
        public static function transactions_table($account_type='ALL',$pid_account='NA'){

        $data = array();

        if($account_type == 'ALL'){$data['trx'] = self::tablex("ALL", $pid_account);}

        if($account_type == 'SAVINGS'){$data['trx'] = self::tablex("SAVINGS", $pid_account);}

        if($account_type == 'INVESTMENT'){$data['trx'] = self::tablex("INVESTMENT", $pid_account);}

        if($account_type == 'ALL-CREDIT'){$data['trx'] = self::tablex("ALL-CREDIT", $pid_account);}

        if($account_type == 'SAVINGS-CREDIT'){$data['trx'] = self::tablex("SAVINGS-CREDIT", $pid_account);}

        if($account_type == 'INVESTMENT-CREDIT'){$data['trx'] = self::tablex("INVESTMENT-CREDIT", $pid_account);}

        if($account_type == 'ALL-DEBIT'){$data['trx'] = self::tablex("ALL-DEBIT", $pid_account);}

        if($account_type == 'SAVINGS-DEBIT'){$data['trx'] = self::tablex("SAVINGS-DEBIT", $pid_account);}

        if($account_type == 'INVESTMENT-DEBIT'){$data['trx'] = self::tablex("INVESTMENT-DEBIT", $pid_account);}


        return $data;

        }

    








    ///// END OF DATAbox CODE CLASS /////
}

