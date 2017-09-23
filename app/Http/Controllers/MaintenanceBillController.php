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
use NumberToWords\NumberToWords;


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
        $maintenanceBills->month_year = date("M-Y");
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

        return view('maintenanceBill.edit',compact('maintenanceBills','flats'));
    }

    public function update(Request $request, $id){

        $this->validate($request,[

            'flat_id' => 'required',
            'bill_number' => 'required',
            'amount' => 'required',
            'month_year' => 'required',
            ]);

        $maintenanceBills = MaintenanceBill::find($id);
        $maintenanceBills->society_id = Auth::user()->society_id;
        $maintenanceBills->flat_id = $request->input('flat_id');
        $maintenanceBills->month_year = $request->input('month_year');
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

        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('en');


        $maintenanceBills = DB::table('maintenance_bills')
                    ->join('flats','maintenance_bills.flat_id','=','flats.id')
                    ->join('society_members','flats.society_members_id','=','society_members.id')
                    ->join('maintenances','society_members.society_id','=','maintenances.society_id')
                    ->join('societies','maintenance_bills.society_id','=','societies.id')
                    ->select('society_members.*','maintenances.*','maintenance_bills.*','flats.*','societies.*')->where('maintenance_bills.id',$id)
                    ->get();


        $pdf = PDF::loadView('maintenanceBill.download',compact('maintenanceBills','numberTransformer'));

        return $pdf->download($maintenanceBills[0]->flat_no.$maintenanceBills[0]->due_date.'invoice.pdf');
    }


}

