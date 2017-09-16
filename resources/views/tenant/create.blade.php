@extends('layouts.app')

@section('title', 'Open Ticket')

@section('content')
<div class="contain">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="col-md-2 nav-bg">
                    <ul class="list-group">
                           
                           <li class="list-group-item-custom">
                           {{Auth::user()->society_method->society_name}}
                           </li>
                            <li class="list-group-item"><a href="{{ url('show_societymember') }}">Society Members</a>
                            <li class="list-group-item"><a href="{{ url('show_societyboardmember') }}">Society Board Members</a>
                            <li class="list-group-item"><a href="{{ url('show_flats') }}">Flats</a></li>
                            <li class="list-group-item"><a href="{{ url('show_tenants') }}">Tenants</a></li>
                            <li class="list-group-item"><a href="{{ url('show_maintenances') }}">Maintenances</a></li>
                            <li class="list-group-item"><a href="{{ url('generate_maintenance_bill') }}">Generate Maintenance Bills</a></li>
                            <li class="list-group-item"><a href="{{ url('show_maintenance_bills') }}">Maintenance Bills</a></li>
                            <li class="list-group-item"><a href="{{ url('show_payments') }}">Payments</a></li>
                            
                    </ul>
                </div>
                <div class="panel-heading col-md-10">New Tenant</div>

                <div class="panel-body col-md-8">

                    <form class="form-horizontal" method="POST" action="{{url('/store_tenant') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('full_name') ? ' has-error' : '' }}">
                            <label for="full_name" class="col-md-4 control-label">Full Name 
                            </label>

                            <div class="col-md-6">
                                <input id="full_name" type="text" class="form-control" name="full_name" value="{{ old('full_name') }}" required autofocus>

                                @if ($errors->has('full_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('full_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('permanent_address') ? ' has-error' : '' }}">
                            <label for="permanent_address" class="col-md-4 control-label">Permanent Address 
                            </label>

                            <div class="col-md-6">
                                <textarea id="permanent_address" type="text" class="form-control" name="permanent_address" value="{{ old('permanent_address') }}" required autofocus></textarea>

                                @if ($errors->has('permanent_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('permanent_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('agreement_copy') ? ' has-error' : '' }}">
                            <label for="agreement_copy" class="col-md-4 control-label">Agreement Copy
                            </label>

                            <div class="col-md-6">
                                <input id="agreement_copy" type="file" class="form-control" name="agreement_copy" value="{{ old('agreement_copy') }}" required autofocus>

                                @if ($errors->has('agreement_copy'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('agreement_copy') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('police_verification') ? ' has-error' : '' }}">
                            <label for="police_verification" class="col-md-4 control-label">Police Verification
                            </label>

                            <div class="col-md-6">
                                <input id="police_verification" type="file" class="form-control" name="police_verification" value="{{ old('police_verification') }}" required autofocus>

                                @if ($errors->has('police_verification'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('police_verification') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address_proof1') ? ' has-error' : '' }}">
                            <label for="address_proof1" class="col-md-4 control-label">Address Proof1
                            </label>

                            <div class="col-md-6">
                                <input id="address_proof1" type="file" class="form-control" name="address_proof1" value="{{ old('address_proof1') }}">

                                @if ($errors->has('address_proof1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_proof1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address_proof2') ? ' has-error' : '' }}">
                            <label for="address_proof2" class="col-md-4 control-label">Address_proof2
                            </label>

                            <div class="col-md-6">
                                <input id="address_proof2" type="file" class="form-control" name="address_proof2" value="{{ old('address_proof2') }}">

                                @if ($errors->has('address_proof2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_proof2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                         <div class="form-group{{ $errors->has('email_address') ? ' has-error' : '' }}">
                            <label for="email_address" class="col-md-4 control-label">Email Address 
                            </label>

                            <div class="col-md-6">
                                <input id="email_address" type="text" class="form-control" name="email_address" value="{{ old('email_address') }}">

                                @if ($errors->has('email_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mobile_number') ? ' has-error' : '' }}">
                            <label for="mobile_number" class="col-md-4 control-label">Mobile Number 
                            </label>

                            <div class="col-md-6">
                                <input id="mobile_number" type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number') }}" required autofocus>

                                @if ($errors->has('mobile_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-ticket"></i> SAVE
                                </button>
                            </div>
                        </div>
    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

