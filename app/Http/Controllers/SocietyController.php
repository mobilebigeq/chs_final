<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Society;

class SocietyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }


    public function create(){

    	return view('society.create');
    }

    public function store(Request $request){

    	$this->validate($request, [

    		'society_name' => 'required',
    		'address' => 'required',
            'office_number'=>'required',
    		]);

    	$societies = new Society;
    	$societies->society_name = $request->input('society_name');
    	$societies->address = $request->input('address');
        $societies->office_number = $request->input('office_number');
    	$societies->registration_number = $request->input('registration_number');
    	$societies->establishment_date = $request->input('establishment_date');

    	$societies->save();

    	return redirect('/show_society');
    }

    public function show(){

    	$societies = Society::all();

    	return view('society.show',compact('societies'));
    }

     public function edit($id){

    	$societies = Society::find($id);

    	return view('society.edit',compact('societies'));
    }

    public function update(Request $request,$id){

        $this->validate($request, [

            'society_name' => 'required',
            'address' => 'required',
            'office_number'=>'required',
            ]);

        $societies =Society::find($id);
        $societies->society_name = $request->input('society_name');
        $societies->address = $request->input('address');
        $societies->office_number = $request->input('office_number');
        $societies->registration_number = $request->input('registration_number');
        $societies->establishment_date = $request->input('establishment_date');

        $societies->save();

        return redirect('/show_society');
    }

    
}
