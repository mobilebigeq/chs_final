<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\MaintenanceBill;
use App\Maintenance;
use App\Flat;
use App\Society;
use App\SocietyMember;
use Mail;
use App\Mail\BillsMail;
use PDF;

class MaintenanceBillController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function generate(){
        $maintenanceBills = MaintenanceBill::where('society_id',Auth::user()->society_id)->first();

        $month = $maintenanceBills->created_at->format('F Y');

        
        return view('maintenanceBill.generate_bill',compact('maintenanceBills','month'));
    }
    public function create(){

    	$flats = Flat::where('society_id',Auth::user()->society_id)->get();

    	return view('maintenanceBill.create',compact('flats'));
    }

    public function send(){

        $users_details = DB::table('maintenance_bills')
                    ->join('flats','maintenance_bills.flat_id','=','flats.id')
                    ->join('society_members','flats.society_members_id','=','society_members.id')
                    ->join('maintenances','society_members.society_id','=','maintenances.society_id')
                    ->select('society_members.email_address','society_members.full_name','maintenances.due_date','maintenance_bills.amount')->where('maintenance_bills.society_id',Auth::user()->society_id)
                    ->get();

        foreach($users_details as $users_detail)
        {

        Mail::to($users_detail->email_address)->send(new BillsMail($users_detail));
        }
        return redirect('/show_maintenance_bills');

    }


    public function store(Request $request){

         $society = Society::where('id',Auth::user()->society_id)->pluck('society_name')->first();


        $maintenanceAmount = Maintenance::where('society_id',Auth::user()->society_id)->first();


        $amount = $maintenanceAmount->amount;
        $flats = Flat::where('society_id',Auth::user()->society_id)->get();

        foreach ($flats as $flat) {
            $total_bill =  $maintenanceAmount->amount * $flat->carpet_area;

            $bill_number = substr($society,0,3).'_'.date("m-Y").'_' .$flat->flat_no ;


        $maintenanceBills = new MaintenanceBill;
        $maintenanceBills->society_id = Auth::user()->society_id;
        $maintenanceBills->flat_id = $flat->id;
        $maintenanceBills->amount = $total_bill;
        $maintenanceBills->bill_number = $bill_number;
        $maintenanceBills->extra_charge;
        $maintenanceBills->charge_name;
        $maintenanceBills->charge_amount;

        $maintenanceBills->save();

        }
        
        return redirect('/show_maintenance_bills');
    }

    public function edit($id){

        $maintenanceBills = MaintenanceBill::find($id);

        $flats = Flat::where('society_id',Auth::user()->society_id)->get();

        $flats_selected = Flat::find($maintenanceBills->flat_id);

        return view('maintenanceBill.edit',compact('maintenanceBills','flats','flats_selected'));
    }

    public function update(Request $request, $id){

        $this->validate($request,[

            'flat_id' => 'required',
            'bill_number' => 'required',
            'amount' => 'required',
            ]);

        $maintenanceBills = MaintenanceBill::find($id);
        $maintenanceBills->society_id = Auth::user()->society_id;
        $maintenanceBills->flat_id = $request->input('flat_id');
        
        $maintenanceBills->extra_charge = $request->input('extra_charge');
        
        if($request->input('extra_charge') == 'Yes'){

            $maintenanceAmount = MaintenanceBill::where('society_id',Auth::user()->society_id)->first();

             $maintenanceBills->charge_name = $request->input('charge_name');
            $maintenanceBills->charge_amount = $request->input('charge_amount');

            $total_bill =  $maintenanceBills->amount + $maintenanceBills            ->charge_amount;

            
             $maintenanceBills->amount = $total_bill;
        }
        else{

            $maintenanceBills->amount = $request->input('amount');
            $maintenanceBills->charge_name = 'NULL';
            $maintenanceBills->charge_amount = 'NULL';
        }
        
        $maintenanceBills->bill_number = $request->input('bill_number');
        

        $maintenanceBills->save();

         

        return redirect('/show_maintenance_bills');
    }


    public function delete($id){

        $maintenanceBills = MaintenanceBill::find($id);
        $maintenanceBills->delete();
        return redirect('/show_maintenance_bills');
    }

    public function show(){

    	$maintenanceBills = MaintenanceBill::with('flats_method')
                            ->where('society_id',Auth::user()->society_id)
                            ->get();

    	return view('maintenanceBill.show',compact('maintenanceBills'));
    }	


     public function download($id){

        $maintenanceBills = MaintenanceBill::find($id);

        $pdf = PDF::loadView('maintenanceBill.download',compact('maintenanceBills'));

        return $pdf->download('invoice.pdf');
    }


}

