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

class XIScode extends Controller
{
    //RANDOM ID GENERATOR
    public static function xHash($qtd){
        //Under the string $Caracteres you write all the characters you want to be used to randomly generate the code.
        $Caracteres = 'ABCDEFGHJKLMPQRSTUVXWYZ0123456789';
        $QuantidadeCaracteres = strlen($Caracteres);
        $QuantidadeCaracteres--;
        
        $Hash=NULL;
            for($x=1; $x<=$qtd; $x++){
                $Posicao = rand(0,$QuantidadeCaracteres);
                $Hash .= substr($Caracteres,$Posicao,1);
            }
        
        return $Hash;
        }

        public static function xHashNumeric($qtd){
            //Under the string $Caracteres you write all the characters you want to be used to randomly generate the code.
            $Caracteres = '0123456789';
            $QuantidadeCaracteres = strlen($Caracteres);
            $QuantidadeCaracteres--;
            
            $Hash=NULL;
                for($x=1; $x<=$qtd; $x++){
                    $Posicao = rand(0,$QuantidadeCaracteres);
                    $Hash .= substr($Caracteres,$Posicao,1);
                }
            
            return $Hash;
            }




        public static function sendsms($msisdn, $msg){

                //BULK SMS NIGERIA SEND SMS METHOD
                //$message ='Unicoop Test Message';
                $message = urlencode($msg);
                //$msisdn = '2347064407000';
                $token = 'orYL9n9YQiLdUZE5IUyuUEDqCiesm4Iu66dHlthLBAXpBSJC1QzGeAKj9BvE';
                $from = 'BulkSMS.ng';

                $url = 'https://www.bulksmsnigeria.com/api/v1/sms/create?api_token='.$token.'&from='.$from.'&to='.$msisdn.'&body='.$message.'&dnd=2';

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                $response = curl_exec ($ch);
                $err = curl_error($ch);  //if you need
                curl_close ($ch);
                //return $response;

                $resp = json_decode($response);

                $status = $resp->data->status;

                //if($status == "success"){dd('Message was successfully sent!');}
            
                return $status;
            }





    ///// END OF XIS CODE CLASS /////
}

