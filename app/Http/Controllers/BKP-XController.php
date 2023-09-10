<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;


class XController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public static $e;

    public function __construct()
    {
        //$this->middleware(['auth', 'verified'])->except(['index','register_company']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //RANDOM ID GENERATOR
    public static function xhash($qtd){
        //Under the string $Caracteres you write all the characters you want to be used to randomly generate the code.
        $Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789';
        $QuantidadeCaracteres = strlen($Caracteres);
        $QuantidadeCaracteres--;
        
            $Hash=NULL;
                for($x=1; $x<=$qtd; $x++){
                    $Posicao = rand(0,$QuantidadeCaracteres);
                    $Hash .= substr($Caracteres,$Posicao,1);
                }
            
            return $Hash;
    }



    //IMAGE PROCESSING
    public static function xfile($request, $element_name, $allowed_mimes, $file_size, $storage_location, $required)
    { 
        $file_array = array();
        $pid_user = Auth::user()->pid_user;

        try {

                //check if image is required before validation
                if(($required == 'Y') || ($required == 'y'))
                {
                    //validate image
                    $validation = $request->validate([
                        $element_name => 'required|file|mimes:'.$allowed_mimes.'|max:'.$file_size,
                        ]);
                }else{ 
                        if(($required == 'N') || ($required == 'n'))
                        {
                            //validate image
                            $validation = $request->validate([
                                $element_name => 'file|mimes:'.$allowed_mimes.'|max:'.$file_size,
                                ]);
                        }else{ dd('TECHNICAL REPORT: Image required status not stated' ); }
                }

                    //check if image was uploaded befor
                    if (($request->$element_name == null) || ($request->$element_name == ''))
                        {
                            $file_array['name'] = null;
                            return $file_array;
                        }
                    else{
                        //generate new name for image
                        $file_name =  $pid_user.'_'.time().'.'.$request->$element_name->getClientOriginalExtension();

                        //move image to new location
                        //$request->user_image->move(public_path('profile_images'), $image_name);//stores image in home public folder
                        $request->$element_name->storeAs($storage_location, $file_name); //stores images in: "Storage/app/image"

                        $file_array['name'] = $file_name;
                        return $file_array;
                    }


        }
        catch (exception $e) {
            //code to handle the exception
            return back()->with('failed', 'File upload failed ::ERROR:: '.$e);exit;
        }

    }


    public static function sendsms($msisdn, $msg){

        //BULK SMS NIGERIA SEND SMS METHOD
        //$message ='Unicoop Test Message';
        $message = urlencode($msg);
        //$msisdn = '2347064407000';
        $token = 'orYL9n9YQiLdUZE5IUyuUEDqCiesm4Iu66dHlthLBAXpBSJC1QzGeAKj9BvE';
        $from = 'SPREADIT';

        $url = 'https://www.bulksmsnigeria.com/api/v1/sms/create?api_token='.$token.'&from='.$from.'&to='.$msisdn.'&body='.$message.'&dnd=2';


        //$url = 'https://www.bulksmsnigeria.com/api/v1/sms/create?api_token=orYL9n9YQiLdUZE5IUyuUEDqCiesm4Iu66dHlthLBAXpBSJC1QzGeAKj9BvE&from=BulkSMS.ng&to=2347064407000&body=Welcome&dnd=2';


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec ($ch);
        $err = curl_error($ch);  //if you need
        curl_close ($ch);
        //return $response;

        //$resp = json_decode($response);

        //$status = $resp->data->status;

        //if($status == "success"){dd('Message was successfully sent!');}
    
        //return $status;
        return null;
    }








////////////////////// END OF CONTROLLER ///////////////////////
}
