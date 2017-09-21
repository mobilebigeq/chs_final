<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\SocietyMember;
use App\SocietyBoardMember;

class SocietyBoardMemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){

    	$societymembers = SocietyMember::where('society_id',Auth::user()->society_id)->get();

    	return view('societyboardmember.create',compact('societymembers'));
    }

    public function store(Request $request){

    	$this->validate($request,[

    		'society_members_id'=> 'required',
            'designation'=> 'required',
            'from_date'=> 'required',
            'to_date'=> 'required',

    		]);

    	$societyboardmembers = new SocietyBoardMember;
    	$societyboardmembers->society_id = Auth::user()->society_id;
    	$societyboardmembers->society_members_id = $request->input('society_members_id');
    	$societyboardmembers->designation = $request->input('designation');
    	$societyboardmembers->from_date = $request->input('from_date');
    	$societyboardmembers->to_date = $request->input('to_date');

    	$societyboardmembers->save();

    	return redirect('/show_societyboardmember');

    }

     public function edit($id){

    	$societyboardmembers = SocietyBoardMember::find($id);

    	$societymembers = SocietyMember::where('society_id',Auth::user()->society_id)->get();
 	

    	return view('societyboardmember.edit',compact('societyboardmembers','societymembers'));
    }


    public function update(Request $request,$id){

    	$this->validate($request,[

    		'society_members_id'=> 'required',
            'designation'=> 'required',
            'from_date'=> 'required',
            'to_date'=> 'required',

    		]);
		$societyboardmembers = SocietyBoardMember::find($id);
    	$societyboardmembers->society_id = Auth::user()->society_id;
    	$societyboardmembers->society_members_id = $request->input('society_members_id');
    	$societyboardmembers->designation = $request->input('designation');
    	$societyboardmembers->from_date = $request->input('from_date');
    	$societyboardmembers->to_date = $request->input('to_date');

    	$societyboardmembers->save();

    	return redirect('/show_societyboardmember');
    }

    public function delete($id){

    	$societyboardmembers = SocietyBoardMember::find($id);

    	$societyboardmembers->delete();

    	return redirect('/show_societyboardmember');
    }

     public function show(){
    	
    	$societyboardmembers = SocietyBoardMember::with('society_member_method')->where('society_id',Auth::user()->society_id)->get();

    	return view('societyboardmember.show',compact('societyboardmembers'));
    }
}
