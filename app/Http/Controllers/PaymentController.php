<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MaintenanceBill;
use Auth;
use App\Payment;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create(){

    	$society_maintenances = MaintenanceBill::where('society_id',Auth::user()->society_id)->get();

    	return view('payment.create',compact('society_maintenances'));
    }


    public function store(Request $request){

    		$this->validate($request ,[
    		'pg_status' => 'required',
    		'pg_response' => 'required',
    		'maintenance_bill_id'=> 'required',
    		'amount'=> 'required',
    		'payment_status'=> 'required',
    		'payment_date'=> 'required',

    		]);

        	$society = new Payment;
        	$society->society_id = Auth::user()->society_id;
    		$society->pg_status = $request->input('pg_status');
    		$society->pg_response = $request->input('pg_response');
    		$society->maintenance_bill_id = $request->input('maintenance_bill_id');
    		$society->amount = $request->input('amount');
    		$society->payment_status = $request->input('payment_status');
    		$society->payment_date = $request->input('payment_date');
            

    	$society->save();

    	return redirect('/show_payments');
    }


     public function show(){

		$societies = Payment::with('maintenance_bill')->where('society_id',Auth::user()->society_id)->paginate(10);

    	return view('payment.show',compact('societies'));
    }


    public function edit($id){

    	$society = Payment::find($id);
        
        $society_maintenances = MaintenanceBill::where('society_id',Auth::user()->society_id)->get();


    	return view('payment.edit',compact('society','society_maintenances'));

    }

    public function update(Request $request, $id){

    	$this->validate($request ,[
    		'pg_status' => 'required',
    		'pg_response' => 'required',
    		'maintenance_bill_id'=> 'required',
    		'amount'=> 'required',
    		'payment_status'=> 'required',
    		'payment_date'=> 'required',

    		]);

        	$society = Payment::find($id);
        	$society->society_id = Auth::user()->society_id;
    		$society->pg_status = $request->input('pg_status');
    		$society->pg_response = $request->input('pg_response');
    		$society->maintenance_bill_id= $request->input('maintenance_bill_id');
    		$society->amount= $request->input('amount');
    		$society->payment_status= $request->input('payment_status');
    		$society->payment_date= $request->input('payment_date');
            

    	$society->save();

    	return redirect('/show_payments');
    }

    public function delete($id){

    	$society = Payment::find($id);

    	$society->delete();

    	return redirect('/show_payments');

    }
}
