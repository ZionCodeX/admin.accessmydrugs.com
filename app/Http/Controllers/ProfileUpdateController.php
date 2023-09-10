<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\XISCode;
use App\Http\Controllers\XController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class ProfileUpdateController extends Controller
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


     
    //PROFILE UPDATE INDEX
    public function profile_update_index()
    {
        //meta data
        $data = array();
        $pid_user = Auth::user()->pid_user;

        //DATA FOR VIEW
        //$data['valx'] = "Hello";
        $data = RecordsController::profile();
        $data = RecordsController::request();

        return view('pages/profile_update_index', $data);
    }



    //UPDATE PROFILE ACCOUNT PROCESS
    public function profile_update_prox(Request $request)
    { 
        //META
        $data = array();
        $pid_user = Auth::user()->pid_user;

        //:::::::::: SAVE IMAGE STARTS :::::::::://
        //stores files in as defualt directory: "storage/app/image" 
        //get file name using $file_name = $filex['name']
        //XController::xfile(REQUEST-DATA, FILE-ELEMENT-NAME, FILE-TYPES-ALLOWED, FILE-SIZE, FILE-LOCATION-IN-STORAGE, REQUIRED(Y=Yes, N=No))
        $filex = XController::xfile($request, 'user_image', 'jpg,png,gif,svg,JPG,PNG,GIF,SVG', 2000, 'profile_image', 'N');
        if ($filex['name'] != null){
        DB::table('users')->where('pid_user', '=', $pid_user)->update(['profile_image' => $filex['name'],]);}
        //:::::::::: SAVE IMAGE STOPS :::::::::://


        //UPDATE
        DB::table('users')
            ->where('pid_user', '=', $pid_user)
            ->update([
                'country' => $request->country,
                'company_name' => $request->company_name,
                'phone' => $request->phone,
                'company_website' => $request->company_website,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'role' => $request->role,
                'industry' => $request->industry,
                'company_address' => $request->company_address,
                'call_best_time' => $request->call_best_time,
                'updated_at' => now()
                ]);

        //DATA FOR VIEW
        //$data['val1'] = 'Hello';

        $data = RecordsController::profile();
        $data = RecordsController::request();

        \Session::flash('success', 'Profile was Successfully updated');
        return redirect('profile_update_index');exit;
        //return view('pages/update_profile_page', $data);
    }




////////////////////// END OF CONTROLLER ///////////////////////
}
