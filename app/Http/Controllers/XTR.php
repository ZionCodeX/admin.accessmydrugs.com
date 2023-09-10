<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\XISCode;
use App\Http\Controllers\XController;
use App\Http\Controllers\XRecordsController;



class XTR extends Controller
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



    ///////////////////*************** SINGLE RECORDS CALL ***************////////////////////
    public static function single($xdata, $factors1 = [], $factors2 = [], $factors3= [])
    { 

        $table_name = $xdata[0];
        if(empty($xdata[1])){$xdata[1] = 5000;}
        $limit = $xdata[1];
        if(empty($xdata[2])){$xdata[2] = 'id';}
        $order_field = $xdata[2];
        if(empty($xdata[3])){$xdata[3] = 'DESC';}
        $order = $xdata[3];

        //$key1 = $factors1[0];
        //$comp1 = $factors1[1];
        //$value1 = $factors1[2];

        //$key2 = $factors2[0];
        //$comp2 = $factors2[1];
        //$value2 = $factors2[2];

        //$key3 = $factors3[0];
        //$comp3 = $factors3[1];
        //$value3 = $factors3[2];



        //factor 0
        if( (empty($factors1)) && (empty($factors2)) && (empty($factors3)) )
        {
                $record = DB::table($table_name)
                            ->where('xstatus', 1)
                            ->limit($limit) 
                            ->orderBy($order_field, $order)
                            ->first();
                            return $record;exit;
        }

        //factor 1
        if( (!empty($factors1)) && (empty($factors2)) && (empty($factors3)) )
        {
                $record = DB::table($table_name)
                            ->where($factors1[0], $factors1[1], $factors1[2])
                            ->where('xstatus', 1)
                            ->limit($limit) 
                            ->orderBy($order_field, $order)
                            ->first();
                            return $record;exit;
        }

        //factor 2
        if( (!empty($factors1)) && (!empty($factors2)) && (empty($factors3)) )
        {
                $record = DB::table($table_name)
                            ->where($factors1[0], $factors1[1], $factors1[2])
                            ->where($factors2[0], $factors2[1], $factors2[2])
                            ->where('xstatus', 1)
                            ->limit($limit) 
                            ->orderBy($order_field, $order)
                            ->first();
                            return $record;exit;
        }


        //factor 3
        if( (!empty($factors1)) && (!empty($factors2)) && (!empty($factors3)) )
        {
                $record = DB::table($table_name)
                            ->where($factors1[0], $factors1[1], $factors1[2])
                            ->where($factors2[0], $factors2[1], $factors2[2])
                            ->where($factors3[0], $factors3[1], $factors3[2])
                            ->where('xstatus', 1)
                            ->limit($limit) 
                            ->orderBy($order_field, $order)
                            ->first();
                            return $record;exit;
        }

  
        //call any single record (See how below)
        //([TABLE,LIMIT,ORDER_FIELD,ORDER],[FIELD,COMPATOR,VALUE]) 
        //$data['user'] = XTR::single(['users',5000, 'id', 'DESC'],['phone','=','07064407000']);

    }




    



    ///////////////////*************** MULTIPLE RECORDS CALL ***************////////////////////
    public static function multiple($xdata, $factors1 = [], $factors2 = [], $factors3= [])
    { 

        $table_name = $xdata[0];
        if(empty($xdata[1])){$xdata[1] = 5000;}
        $limit = $xdata[1];
        if(empty($xdata[2])){$xdata[2] = 'id';}
        $order_field = $xdata[2];
        if(empty($xdata[3])){$xdata[3] = 'DESC';}
        $order = $xdata[3];

        //$key1 = $factors1[0];
        //$comp1 = $factors1[1];
        //$value1 = $factors1[2];

        //$key2 = $factors2[0];
        //$comp2 = $factors2[1];
        //$value2 = $factors2[2];

        //$key3 = $factors3[0];
        //$comp3 = $factors3[1];
        //$value3 = $factors3[2];



        //factor 0
        if( (empty($factors1)) && (empty($factors2)) && (empty($factors3)) )
        {
                $record = DB::table($table_name)
                            ->where('xstatus', 1)
                            ->limit($limit) 
                            ->orderBy($order_field, $order)
                            ->get();
                            return $record;exit;
        }

        //factor 1
        if( (!empty($factors1)) && (empty($factors2)) && (empty($factors3)) )
        {
                $record = DB::table($table_name)
                            ->where($factors1[0], $factors1[1], $factors1[2])
                            ->where('xstatus', 1)
                            ->limit($limit) 
                            ->orderBy($order_field, $order)
                            ->get();
                            return $record;exit;
        }

        //factor 2
        if( (!empty($factors1)) && (!empty($factors2)) && (empty($factors3)) )
        {
                $record = DB::table($table_name)
                            ->where($factors1[0], $factors1[1], $factors1[2])
                            ->where($factors2[0], $factors2[1], $factors2[2])
                            ->where('xstatus', 1)
                            ->limit($limit) 
                            ->orderBy($order_field, $order)
                            ->get();
                            return $record;exit;
        }


        //factor 3
        if( (!empty($factors1)) && (!empty($factors2)) && (!empty($factors3)) )
        {
                $record = DB::table($table_name)
                            ->where($factors1[0], $factors1[1], $factors1[2])
                            ->where($factors2[0], $factors2[1], $factors2[2])
                            ->where($factors3[0], $factors3[1], $factors3[2])
                            ->where('xstatus', 1)
                            ->limit($limit) 
                            ->orderBy($order_field, $order)
                            ->get();
                            return $record;exit;
        }

  
        //call any multiple record (See how below)
        //([TABLE,LIMIT,ORDER_FIELD,ORDER],[FIELD,COMPATOR,VALUE]) 
        //$data['user'] = XTR::multiple(['users',5000, 'id', 'DESC'],['phone','=','07064407000']);

    }





   ///////////////////*************** MULTIPLE RECORDS CALL ***************////////////////////
   public static function count($xdata, $factors1 = [], $factors2 = [], $factors3= [])
   { 

    $table_name = $xdata[0];
    if(empty($xdata[1])){$xdata[1] = 5000;}
    $limit = $xdata[1];
    if(empty($xdata[2])){$xdata[2] = 'id';}
    $order_field = $xdata[2];
    if(empty($xdata[3])){$xdata[3] = 'DESC';}
    $order = $xdata[3];

       //$key1 = $factors1[0];
       //$comp1 = $factors1[1];
       //$value1 = $factors1[2];

       //$key2 = $factors2[0];
       //$comp2 = $factors2[1];
       //$value2 = $factors2[2];

       //$key3 = $factors3[0];
       //$comp3 = $factors3[1];
       //$value3 = $factors3[2];



       //factor 0
       if( (empty($factors1)) && (empty($factors2)) && (empty($factors3)) )
       {
               $record = DB::table($table_name)
                           ->where('xstatus', 1)
                           ->limit($limit) 
                           ->orderBy($order_field, $order)
                           ->count();
                           return $record;exit;
       }

       //factor 1
       if( (!empty($factors1)) && (empty($factors2)) && (empty($factors3)) )
       {
               $record = DB::table($table_name)
                           ->where($factors1[0], $factors1[1], $factors1[2])
                           ->where('xstatus', 1)
                           ->limit($limit) 
                           ->orderBy($order_field, $order)
                           ->count();
                           return $record;exit;
       }

       //factor 2
       if( (!empty($factors1)) && (!empty($factors2)) && (empty($factors3)) )
       {
               $record = DB::table($table_name)
                           ->where($factors1[0], $factors1[1], $factors1[2])
                           ->where($factors2[0], $factors2[1], $factors2[2])
                           ->where('xstatus', 1)
                           ->limit($limit) 
                           ->orderBy($order_field, $order)
                           ->count();
                           return $record;exit;
       }


       //factor 3
       if( (!empty($factors1)) && (!empty($factors2)) && (!empty($factors3)) )
       {
               $record = DB::table($table_name)
                           ->where($factors1[0], $factors1[1], $factors1[2])
                           ->where($factors2[0], $factors2[1], $factors2[2])
                           ->where($factors3[0], $factors3[1], $factors3[2])
                           ->where('xstatus', 1)
                           ->limit($limit) 
                           ->orderBy($order_field, $order)
                           ->count();
                           return $record;exit;
       }

 
       //call any single record
       //$data['user'] = XTR::single(['users',5000, 'id', 'DESC'],['phone','=','07064407000']);

   }







    public static function join($tablesx, $fieldsx, $factors1=[], $factors2=[])
    {

                ///////////////////*** JOIN TABLE RECORDS ***//////////////////

                //FOR TABLE WITH TWO JOINS
                if(count($tablesx) == 2){
                        //get cooperative members data
                        $table_name = $tablesx[0];
                        $table_name1 = $tablesx[1];

                        $field = $fieldsx[0];
                        $field1 = $fieldsx[1];

                        if(count($factors1) != 0){
                            $key = $factors1[0];
                            $comp = $factors1[1];
                            $value = $factors1[2];
                        }
                        if(count($factors2) != 0){
                            $key1 = $factors1[0];
                            $comp1 = $factors1[1];
                            $value1 = $factors1[2];
                        }
                        
                            if((count($factors1) == 0) && (count($factors2) == 0)){
                                $record = DB::table($table_name)
                                    ->leftJoin($table_name1, $table_name1.'.'.$field1, '=', $table_name.'.'.$field)
                                    ->select('*')
                                    ->where($table_name.'.xstatus', 1)
                                    ->orderBy($table_name.'.id', 'DESC')
                                    ->get();
                            }

                            if((count($factors1) >= 1) && (count($factors2) == 0)){
                                $record = DB::table($table_name)
                                    ->leftJoin($table_name1, $table_name1.'.'.$field1, '=', $table_name.'.'.$field)
                                    ->select('*')
                                    ->where($key, $comp, $value)
                                    ->where($table_name.'.xstatus', 1)
                                    ->orderBy($table_name.'.id', 'DESC')
                                    ->get();
                            }

                            if((count($factors1) >= 1) && (count($factors2) >= 1)){
                                $record = DB::table($table_name)
                                    ->leftJoin($table_name1, $table_name1.'.'.$field1, '=', $table_name.'.'.$field)
                                    ->select('*')
                                    ->where($key, $comp, $value)
                                    ->where($key1, $comp1, $value1)
                                    ->where($table_name.'.xstatus', 1)
                                    ->orderBy($table_name.'.id', 'DESC')
                                    ->get();
                            }

                            return $record;exit;
                        }


                        //FOR TABLE WITH THREE JOINS
                        if(count($tablesx) == 3){
                            //get cooperative members data
                            $table_name = $tablesx[0];
                            $table_name1 = $tablesx[1];
                            $table_name2 = $tablesx[2];
    
                            $field = $fieldsx[0];
                            $field1 = $fieldsx[1];
                            $field2 = $fieldsx[2];

                            if(count($factors1) != 0){
                                $key = $factors1[0];
                                $comp = $factors1[1];
                                $value = $factors1[2];
                            }
                            if(count($factors2) != 0){
                                $key1 = $factors1[0];
                                $comp1 = $factors1[1];
                                $value1 = $factors1[2];
                            }


                                if((count($factors1) == 0) && (count($factors2) == 0)){
                                    $record = DB::table($table_name)
                                        ->leftJoin($table_name1, $table_name1.'.'.$field1, '=', $table_name.'.'.$field)
                                        ->select('*')
                                        ->where($table_name.'.xstatus', 1)
                                        ->orderBy($table_name.'.id', 'DESC')
                                        ->get();
                                }
    
                                if((count($factors1) >= 1) && (count($factors2) == 0)){
                                    $record = DB::table($table_name)
                                        ->leftJoin($table_name1, $table_name1.'.'.$field1, '=', $table_name.'.'.$field)
                                        ->select('*')
                                        ->where($key, $comp, $value)
                                        ->where($table_name.'.xstatus', 1)
                                        ->orderBy($table_name.'.id', 'DESC')
                                        ->get();
                                }
    
                                if((count($factors1) >= 1) && (count($factors2) >= 1)){
                                    $record = DB::table($table_name)
                                        ->leftJoin($table_name1, $table_name1.'.'.$field1, '=', $table_name.'.'.$field)
                                        ->leftJoin($table_name2, $table_name2.'.'.$field2, '=', $table_name.'.'.$field)
                                        ->select('*')
                                        ->where($key, $comp, $value)
                                        ->where($key1, $comp1, $value1)
                                        ->where($table_name.'.xstatus', 1)
                                        ->orderBy($table_name.'.id', 'DESC')
                                        ->get();
                                }
    
                                return $record;exit;
                            }

                /*
                $coop_members = DB::table('cooperative_members')
                    ->leftJoin('cooperative_accounts', 'cooperative_accounts.pid_coop_account', '=', 'cooperative_members.pid_coop_account')
                    ->leftJoin('users', 'users.pid_user', '=', 'cooperative_members.pid_user')
                    ->select('*','cooperative_members.status as member_status')
                    ->where('xstatus', 1)
                    ->orderBy('id', 'DESC')
                    ->get();
                */

                
        //$data['user'] = XTR::single('users','id','=',2,'phone','=','07064407000');
        //$data['user'] = XTR::multiple('users','id','=',2);
        //$data['user'] = XTR::table_join(['users','orders'],['pid_user','pid_user'],['country','=',$country]);
    }




////////////////////// END OF CONTROLLER ///////////////////////
}
