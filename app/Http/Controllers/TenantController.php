<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tenant;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class TenantController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create(){

    	return view('tenant.create');
    }

    public function store(Request $request){

        $this->validate($request,[

            'full_name' => 'required',
            'permanent_address'=> 'required',
            'agreement_copy'=> 'required',
            'police_verification'=> 'required',
            'mobile_number'=> 'required',
            ]);

        $tenants = new Tenant;
        $tenants->society_id = Auth::user()->society_id;
        $tenants->full_name = $request->input('full_name');
        $tenants->permanent_address = $request->input('permanent_address');

         if(Input::hasFile('agreement_copy')){
            $file= Input::file('agreement_copy');
            $file->move(public_path() . '/uploads/', 
            $file->getClientOriginalName());

            $url= URL::to("/").'/uploads/'. $file->getClientOriginalName();
    
            }
        $tenants->agreement_copy = $url;


         if(Input::hasFile('police_verification')){
            $file= Input::file('police_verification');
            $file->move(public_path() . '/uploads/', 
            $file->getClientOriginalName());

            $url= URL::to("/").'/uploads/'. $file->getClientOriginalName();
    
            }
        $tenants->police_verification = $url;

        if(Input::hasFile('address_proof1')){
            $file= Input::file('address_proof1');
            $file->move(public_path() . '/uploads/', 
            $file->getClientOriginalName());

            $url= URL::to("/").'/uploads/'. $file->getClientOriginalName();
    
            }
        $tenants->address_proof1 = $url;

         if(Input::hasFile('address_proof2')){
            $file= Input::file('address_proof2');
            $file->move(public_path() . '/uploads/', 
            $file->getClientOriginalName());

            $url= URL::to("/").'/uploads/'. $file->getClientOriginalName();
    
            }
        $tenants->address_proof2 = $url;

        $tenants->email_address = $request->input('email_address');
        $tenants->mobile_number = $request->input('mobile_number');

        $tenants->save();

        return redirect('/show_tenants');

        
    }


    public function edit($id){

        $tenants = Tenant::find($id);

    	return view('tenant.edit',compact('tenants'));
    }

    public function update(Request $request,$id){
            
            $this->validate($request,[
            'full_name' => 'required',
            'permanent_address'=> 'required',
            'agreement_copy'=> 'required',
            'police_verification'=> 'required',
            'mobile_number'=> 'required',
            ]);

        $tenants = Tenant::find($id);
        $tenants->society_id = Auth::user()->society_id;
        $tenants->full_name = $request->input('full_name');
        $tenants->permanent_address = $request->input('permanent_address');

         if(Input::hasFile('agreement_copy')){
            $file= Input::file('agreement_copy');
            $file->move(public_path() . '/uploads/', 
            $file->getClientOriginalName());

            $url_agc= URL::to("/").'/uploads/'. $file->getClientOriginalName();
    
            }
        $tenants->agreement_copy = $url_agc;
        


         if(Input::hasFile('police_verification')){
            $file= Input::file('police_verification');
            $file->move(public_path() . '/uploads/', 
            $file->getClientOriginalName());

            $url_pv= URL::to("/").'/uploads/'. $file->getClientOriginalName();
    
            }
        $tenants->police_verification = $url_pv;

        if(Input::hasFile('address_proof1')){
            $file= Input::file('address_proof1');
            $file->move(public_path() . '/uploads/', 
            $file->getClientOriginalName());

            $url_adp1= URL::to("/").'/uploads/'. $file->getClientOriginalName();
    
            }
        $tenants->address_proof1 = $url_adp1;

         if(Input::hasFile('address_proof2')){
            $file= Input::file('address_proof2');
            $file->move(public_path() . '/uploads/', 
            $file->getClientOriginalName());

            $url_adp2= URL::to("/").'/uploads/'. $file->getClientOriginalName();
    
            }
        $tenants->address_proof2 = $url_adp2;

        $tenants->email_address = $request->input('email_address');
        $tenants->mobile_number = $request->input('mobile_number');

        $tenants->save();

        return redirect('/show_tenants');

    }


    public function delete($id){

        $tenants = Tenant::find($id);
        $tenants->delete();

    	return redirect('/show_tenants');
    }


    public function show(){

        $tenants = Tenant::where('society_id',Auth::user()->society_id)->get();

    	return view('tenant.show',compact('tenants'));
    }
}
