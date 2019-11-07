<?php

namespace SoftEngin\Http\Controllers;

 
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use SoftEngin\Comments;
use SoftEngin\posts;
use SoftEngin\vote;
use SoftEngin\Settings;

use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\Mail;

use SoftEngin\Mail\ContactUsMail;

use Illuminate\Contracts\Mail\Mailable;
 
use Symfony\Component\Console\Command\ListCommand;
 


class PageCtrl extends Controller
{

 

    //

    public function __construct()
   {
      //  $this->middleware(['auth'=>'verified']);
 
     }

     
    public function index(){
    //    $_SERVER['REMOTE_ADDR']


 
    if(Schema::hasTable('settings'))  {
        $dat = $_SERVER['REMOTE_ADDR']  ;
        $set_code =  DB::table('settings')->where('set_name','visitors')->get() ;
    $c = $set_code->implode('set_code') + 1;
         DB::update('update settings set set_value = ?, set_code = ? where set_name = ?', [$dat ,$c ,'visitors']);
  
      }


         $visitors =Settings::where('set_name','visitor')->get();
        $visitorcount = count($visitors) + 1;

 // $v=DB::insert('insert into settings (set_name, set_value, set_code) values (?, ?, ?)', ['visitor', date("Y-m-d") , $visitorcount]);

  
       
        $posts=DB::table('posts')->paginate(20);
       // $cmnt=Comments::get()->take(5);
       $cate=DB::table('categories')->get();
        $vote=vote::all();

       
       
 
        return view('index',compact('posts','vote','cate','visitorcount'  ));
    }

 
   
    public function ContactUs(){
        
    
        return view('pages.ContactUs');

        
    }


      
    public function SendContactUs(Request $request ){

        $nameM = $request->name;
        $surnameM= $request->surname;
        $emailM = $request->email;
        $needM= $request->need;
        $messageM = $request->message;
 

        Mail::to('m.alhumada@gmail.com')
        ->send(new ContactUsMail($nameM, $surnameM, $emailM , $needM, $messageM));


        return redirect('ContactUs')->with('success','You Messege is sent thank you .');

        
    } 


    
}
