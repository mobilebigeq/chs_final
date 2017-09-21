<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flat;
use App\SocietyMember;
use App\Tenant;
use Auth;

class FlatController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){

    	$societymembers = SocietyMember::where('society_id',Auth::user()->society_id)->get();

        $tenants = Tenant::where('society_id',Auth::user()->society_id)->get();

    	return view('flat.create',compact('societymembers','tenants'));
    }

    public function store(Request $request){

    	$this->validate($request, [
    		 'flat_no' => 'required',
            'carpet_area' => 'required',
            'floor' => 'required',
            'rented'=> 'required',
            
    		]);

    	$flats = new Flat;
    	$flats->society_id = Auth::user()->society_id;
    	$flats->flat_no = $request->input('flat_no');
    	$flats->carpet_area = $request->input('carpet_area');
    	$flats->floor = $request->input('floor');
    	$flats->building = $request->input('building');
    	$flats->society_members_id = $request->input('society_members_id');
    	$flats->rented = $request->input('rented');
    	$flats->tenants_id = $request->input('tenants_id');
    	$flats->save();

    	return redirect('/show_flats');
    }

    public function edit($id){

    	$flats = Flat::find($id);

    	$societymembers = SocietyMember::where('society_id',Auth::user()->society_id)->get();


        $tenants = Tenant::where('society_id',Auth::user()->society_id)
                    ->get();
        

    	return view('flat.edit',compact('flats','societymembers','tenants'));
    }

    public function update(Request $request, $id){

        $this->validate($request, [
             'flat_no' => 'required',
            'carpet_area' => 'required',
            'floor' => 'required',
            'rented'=> 'required',
            
            ]);

        $flats = Flat::find($id);
        $flats->society_id = Auth::user()->society_id;
        $flats->flat_no = $request->input('flat_no');
        $flats->carpet_area = $request->input('carpet_area');
        $flats->floor = $request->input('floor');
        $flats->building = $request->input('building');
        $flats->society_members_id = $request->input('society_members_id');
        $flats->rented = $request->input('rented');
        $flats->tenants_id = $request->input('tenants_id');
        $flats->save();

        return redirect('/show_flats');
    }

	public function show(){

		$flats = Flat::with('society_members')->where('society_id',Auth::user()->society_id)->get();

    	return view('flat.show',compact('flats'));
    }

    public function search(Request $request){

        $keyword =  $request->input('search');

        $flats = Flat::where('flat_no','LIKE','%'.$keyword.'%')
                ->where('society_id',Auth::user()->society_id)
                ->get();

        return view('flat.show',compact('flats'));
    }

    public function delete($id){

        $flats = Flat::find($id);

        $flats->delete();

        return redirect('/show_flats');
    }


}
