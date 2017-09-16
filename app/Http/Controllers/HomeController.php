<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mail;
use App\Mail\BillsMail;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $society = User::with('society_method')->get();

        return view('home',compact('society'));
    }


        public function show()
    {   
         if(Auth::user()->society_id == null){
            $users = User::with('society_method')->get();

        return view('show_users',compact('users'));
         }
         else{
            return redirect('/home');
         }
        
    }


     

}
