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
                <div class="panel-heading col-md-10">Edit Payment</div>

                <div class="panel-body col-md-8">

                    <form class="form-horizontal" method="POST" action="{{url('/update_payment',array($society->id)) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('maintenance_bill_id') ? ' has-error' : '' }}">
                            <label for="maintenance_bill_id" class="col-md-4 control-label">Maintenance Bill 
                            </label>

                            <div class="col-md-6">
                                <select id="maintenance_bill_id" type="text" class="form-control" name="maintenance_bill_id" value="{{ old('maintenance_bill_id') }}" required autofocus>
                                    <option value="{{$society_maintenance_selected->id}}">{{$society_maintenance_selected->bill_number}}</option>
                                    @foreach($society_maintenances as $society_maintenance)
                                    <option value="{{$society_maintenance->id}}">{{$society_maintenance->bill_number}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('maintenance_bill_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('maintenance_bill_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-4 control-label">Amount 
                            </label>

                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control" name="amount" value="{{ $society->amount }}" required autofocus>

                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('payment_date') ? ' has-error' : '' }}">
                            <label for="payment_date" class="col-md-4 control-label">Payment Date 
                            </label>

                            <div class="col-md-6">
                                <input id="payment_date" type="date" class="form-control" name="payment_date" value="{{ $society->payment_date }}" required autofocus>

                                @if ($errors->has('payment_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('payment_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('pg_status') ? ' has-error' : '' }}">
                            <label for="pg_status" class="col-md-4 control-label">Pg Status 
                            </label>

                            <div class="col-md-6">
                                <input id="pg_status" type="text" class="form-control" name="pg_status" value="{{ $society->pg_status }}" required autofocus>

                                @if ($errors->has('pg_status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pg_status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('pg_response') ? ' has-error' : '' }}">
                            <label for="pg_response" class="col-md-4 control-label">Pg Response 
                            </label>

                            <div class="col-md-6">
                                <input id="pg_response" type="text" class="form-control" name="pg_response" value="{{ $society->pg_response }}" required autofocus>

                                @if ($errors->has('pg_response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pg_response') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('payment_status') ? ' has-error' : '' }}">
                            <label for="payment_status" class="col-md-4 control-label">Payment Status 
                            </label>

                            <div class="col-md-6">
                                <input id="payment_status" type="text" class="form-control" name="payment_status" value="{{ $society->payment_status }}" required autofocus>

                                @if ($errors->has('payment_status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('payment_status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-ticket"></i> Update
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

