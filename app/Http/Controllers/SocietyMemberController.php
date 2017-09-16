<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SocietyMember;
use App\Society;
use App\Payment;
use App\Flat;
use App\MaintenanceBill;
use Illuminate\Support\Facades\DB;
use Auth;
use Mail;
use PDF;

class SocietyMemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('admin');
    }
    
    public function create(){

    	return view('societymember.create');
    }

    public function store(Request $request){

    	$this->validate($request,[

    		'full_name'=> 'required',
            'email_address'=> 'required',
            'mobile_number'=> 'required',

    		]);

    	$societymembers = new SocietyMember;
    	$societymembers->society_id = Auth::user()->society_id;
    	$societymembers->full_name = $request->input('full_name');
    	$societymembers->email_address = $request->input('email_address');
    	$societymembers->mobile_number = $request->input('mobile_number');
    	$societymembers->save();

    	return redirect('/show_societymember');

    }

    public function edit($id){

    	$societymembers = SocietyMember::find($id);

    	return view('societymember.edit',compact('societymembers'));
    }

    public function update(Request $request,$id){

    	$this->validate($request,[

    		'full_name'=> 'required',
            'email_address'=> 'required',
            'mobile_number'=> 'required',

    		]);

    	$societymembers = SocietyMember::find($id);
    	$societymembers->society_id = Auth::user()->society_id;
    	$societymembers->full_name = $request->input('full_name');
    	$societymembers->email_address = $request->input('email_address');
    	$societymembers->mobile_number = $request->input('mobile_number');
    	$societymembers->save();

    	return redirect('/show_societymember');
    }

    public function delete($id){

    	$societymembers = SocietyMember::find($id);

    	$societymembers->delete();

    	return redirect('/show_societymember');
    }

    public function search(Request $request){

        $keyword = $request->input('search');

        $societymembers = SocietyMember::where('full_name','LIKE','%' .
                                                $keyword. '%')
                            ->where('society_id',Auth::user()->society_id)
                            ->get();

        return view('societymember.show', compact('societymembers'));
    }

    public function show(){
    	
    	$societymembers = SocietyMember::where('society_id',Auth::user()->society_id)->get();

    	return view('societymember.show',compact('societymembers'));
    }

    public function detail($id){

        $societymembers = SocietyMember::where('id',$id)->first();

        $user_details = DB::table('society_members')->join('flats','society_members.id','=','flats.society_members_id')->join('maintenance_bills','maintenance_bills.flat_id','=','flats.id')->select('maintenance_bills.*','flats.*','society_members.*')->where('society_members.id',$id)->get();

        
        return view('societymember.detail',compact('societymembers','user_details'));

    }


    public function send(){

        Mail::send(['text'=>'mail'],['name','Kashif'],function($message){
            $message->to('kashifshaikh440@gmail.com','To Kashif')
                    ->subject('Test Email')
                    ->from('kashifshaikh440@gmail.com','Kashif');

        });
    }

}
