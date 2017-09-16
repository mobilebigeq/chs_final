<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Maintenance;

class MaintenanceController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){

    	return view('maintenance.create');
    }

    public function store(Request $request){

    	$this->validate($request,[

    		'amount' => 'required',
    		'type' => 'required',
    		'revision_date' => 'required',
            'due_date' => 'required',
    		]);

    	$maintenance = new Maintenance;
    	$maintenance->society_id = Auth::user()->society_id;
    	$maintenance->amount = $request->input('amount');
    	$maintenance->type = $request->input('type');
    	$maintenance->revision_date = $request->input('revision_date');
        $maintenance->due_date = $request->input('due_date');
    	$maintenance->save();

    	return redirect('/show_maintenances');

    }

    public function edit($id){

    	$maintenances = Maintenance::find($id);

    	$maintenance_selected = Maintenance::find($maintenances->due_date);

    	return view('maintenance.edit',compact('maintenances','maintenance_selected'));
    }

    public function update(Request $request, $id){

    	
    	$this->validate($request,[

    		'amount' => 'required',
    		'type' => 'required',
    		'revision_date' => 'required',
            'due_date' => 'required',
    		]);

    	$maintenance = Maintenance::find($id);
    	$maintenance->society_id = Auth::user()->society_id;
    	$maintenance->amount = $request->input('amount');
    	$maintenance->type = $request->input('type');
    	$maintenance->revision_date = $request->input('revision_date');
        $maintenance->due_date = $request->input('due_date');

    	$maintenance->save();

    	return redirect('/show_maintenances');
    }

    public function show(){

    	$maintenances = Maintenance::where('society_id',Auth::user()->society_id)->get();

    	return view('maintenance.show',compact('maintenances'));
    }
}
