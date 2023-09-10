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

class PostsController extends Controller
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


    

     
    //############################# POST CREATE INDEX #############################//
    public function post_create_form_index()
    {

        $data = array();
        $pid_admin = Auth::user()->pid_admin;

        //////////////////// REQUIRED CORE DATA ////////////////////
        //heavy loaders
        $data['orders'] = XLoad::records('orders');
        $data['counts'] = XLoad::records('counts');
        $data['pid_admin'] = $pid_admin;
        //////////////////// REQUIRED CORE DATA ////////////////////


        return view('pages/post_create_form_index', $data);exit;

    }




    //############################# POST CREATE PROX #############################//
    public function post_create_form_prox(Request $request)
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


        //:::::::::: SAVE IMAGE STARTS :::::::::://
        //stores files in defualt directory: "storage/app/image" 
        //get file name using $file_name = $filex['name']
        //XController::xfile(REQUEST-DATA, FILE-ELEMENT-NAME, FILE-TYPES-ALLOWED, FILE-SIZE, FILE-LOCATION-IN-STORAGE, REQUIRED(Y=Yes, N=No))
        $filex = XController::xfile($request, 'post_image', 'jpg,png,gif,svg,JPG,PNG,GIF,SVG', 2000, 'post_image', 'N');
        //:::::::::: SAVE IMAGE STOPS :::::::::://

        $pid_post =  'POST'.XController::xhash(5).time();//generate random post id

        $slug = \Str::slug($request->post_title);//convert title to slug

        //check if slug already exists, then regenerate new value to avoid duplicate records
        $slug_check = DB::table('posts')->where('pid_post', '=', $pid_post)->where('xstatus', '=', 1)->count();
        while($slug_check >= 1){
            $slug = $slug.'-'.XIScode::xHashNumeric(3);
            $slug_check = DB::table('posts')->where('xstatus', '=', 1)->count();
        }

        if((DB::table('posts')->latest('seq')->first('seq')) == null){$seq = 0;}else{
        $seq = (int)(DB::table('posts')->latest('seq')->first('seq')->seq) + 10;//record sequence update
        }
        $seq = (int)$seq;

            DB::table('posts')->insert(
				[
                    'seq' => $seq,
					'pid_post' => $pid_post,
					'pid_admin' => $pid_admin,
					'pid_author' => $pid_admin,
					'post_title' => $request->input('post_title'),
                    'post_slug' => $slug,
					'post_article' => $request->input('post_article'),
					'post_description' => $request->input('post_description'),
                    'post_tags' => $request->input('post_tags'),
                    'post_author_name' => $author_name,
					'post_category' => $request->input('post_category'),
                    'post_image' => $filex['name'],
					'first_publish_date' =>  now(),
					'status' => $request->input('publish_post'),
					'created_at' => now(),
					'updated_at' => now()
				]
			);


        $data['posts'] = DB::table('posts')->where('xstatus',1)->orderBy('seq','DESC')->get();//posts

        \Session::flash('success','Article has been Successfully Created!');
        return redirect()->route('post_view_table_index', $data);
        //return view('pages/post_view_table_index', $data);exit;

    }




    //############################# POST UPDATE INDEX #############################//
    public function post_update_form_index($pid_post)
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

        $data['post'] = DB::table('posts')->where('pid_post',$pid_post)->first();//load single record


        return view('pages/post_update_form_index', $data);exit;

    }



    //############################# POST UPDATE PROX #############################//
    public function post_update_form_prox(Request $request)
    {

        $data = array();
        $pid_admin = Auth::user()->pid_admin;

        $pid_post = $request->pid_post;
        $data['posts'] = DB::table('posts')->where('xstatus',1)->orderBy('seq','DESC')->get();//load all posts

        //heavy loaders
        $data['orders'] = XLoad::records('orders');
        $data['counts'] = XLoad::records('counts');

        //:::::::::: UPDATE IMAGE STARTS :::::::::://
        //stores files in defualt directory: "storage/app/image" 
        //get file name using $file_name = $filex['name']
        //XController::xfile(REQUEST-DATA, FILE-ELEMENT-NAME, FILE-TYPES-ALLOWED, FILE-SIZE, FILE-LOCATION-IN-STORAGE, REQUIRED(Y=Yes, N=No))
        $filex = XController::xfile($request, 'post_image', 'jpg,png,gif,svg,JPG,PNG,GIF,SVG', 2000, 'post_image', 'N');
		if ($filex['name'] != null){
            DB::table('posts')
                    ->where('pid_post', '=', $pid_post)
                    ->update(['post_image' => $filex['name'],]);}
        //:::::::::: UPDATE IMAGE STOPS :::::::::://
        
        $slug = \Str::slug($request->post_title);//convert title to slug


        $slug = $slug.'-'.XIScode::xHashNumeric(3);


        DB::table('posts')
                ->where('pid_post', $pid_post)
                ->where('xstatus', 1)
                ->update([
                        'seq' => $request->seq,
                        'pid_admin' => $pid_admin, 
                        'post_title' => $request->post_title,
                        'post_slug' => $slug,
                        'post_article' => $request->post_article,
                        'post_tags' => $request->post_tags,
                        'post_description' => $request->post_description,
                        'status' => $request->publish_post,
                        'updated_at' => now()
                    ]);


            \Session::flash('success','Article has been Successfully Updated!');
            return redirect()->route('post_view_table_index', $data);
            //return routes('post_view_table_index')->with($data);
            //return view('pages/post_view_table_index', $data);exit;

    }






     //############################# POST DELETE PROX #############################//
     public function post_delete_record_prox(Request $request)
     {
 
         $data = array();
         $pid_admin = Auth::user()->pid_admin;
 
         $pid_order = $request->pid_order;
         $pid_user = $request->pid_user;
         $pid_post = $request->pid_post;

        //heavy loaders
        $data['orders'] = XLoad::records('orders');
        $data['counts'] = XLoad::records('counts');
         //////////////////// REQUIRED CORE DATA ////////////////////
         //light loaders
         $data['post'] = DB::table('posts')->where('pid_post',$pid_post)->first();

         DB::table('posts')
                    ->where('pid_post', $pid_post)
                    ->delete();


         \Session::flash('success', 'Article has been successfully deleted!');
         //return redirect('order/order_request_pending/view/index');exit;
         return redirect()->route('post_view_table_index', $data);
         //return view('pages/post_view_table_index', $data);exit;
 
     }   




    //############################# POST VIEW TABLE INDEX #############################//
    public function post_view_table_index()
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
        $data['posts'] = DB::table('posts')->where('xstatus',1)->orderBy('seq','DESC')->get();
        //$data['posts'] = DB::table('posts')->where('status','published')->where('xstatus',1)->get();
        //////////////////// REQUIRED CORE DATA ////////////////////


        return view('pages/post_view_table_index', $data);exit;

    }


    //############################# POST VIEW TABLE INDEX #############################//
    public function post_view_list_index($post_slug)
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
        $data['post'] = DB::table('posts')->where('post_slug', $post_slug)->where('xstatus',1)->first();
        //////////////////// REQUIRED CORE DATA ////////////////////


        return view('pages/post_view_list_index', $data);exit;

    }



        





////////////////////// END OF CONTROLLER ///////////////////////
}
