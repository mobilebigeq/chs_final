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
                <div class="panel-heading col-md-10">Edit Society Board Member</div>

                <div class="panel-body col-md-8">

                    <form class="form-horizontal" method="POST" action="{{ url('/update_societyboardmember',array($societyboardmembers->id)) }}">
                        {{ csrf_field() }}

                       <div class="form-group{{ $errors->has('society_members_id') ? ' has-error' : '' }}">
                            <label for="society_members_id" class="col-md-4 control-label">Society Member
                            </label>

                            <div class="col-md-6">
                                <select id="society_members_id" type="text" class="form-control" name="society_members_id" value="{{ old('society_members_id') }}" required autofocus>
                                <option value="{{$societymembers_selected->id}}">{{$societymembers_selected->full_name}}</option>
                                @foreach($societymembers as $societymember)
                                <option value="{{$societymember->id}}">{{$societymember->full_name}}</option>
                                @endforeach
                                </select>

                                @if ($errors->has('society_members_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('society_members_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
                            <label for="designation" class="col-md-4 control-label">Designation 
                            </label>

                            <div class="col-md-6">
                                <input id="designation" type="text" class="form-control" name="designation" value="{{ $societyboardmembers->designation }}" required autofocus>

                                @if ($errors->has('designation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('designation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('from_date') ? ' has-error' : '' }}">
                            <label for="from_date" class="col-md-4 control-label">From Date 
                            </label>

                            <div class="col-md-6">
                                <input id="from_date" type="date" class="form-control" name="from_date" value="{{ $societyboardmembers->from_date }}" required autofocus>

                                @if ($errors->has('from_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('from_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('to_date') ? ' has-error' : '' }}">
                            <label for="to_date" class="col-md-4 control-label">To Date 
                            </label>

                            <div class="col-md-6">
                                <input id="to_date" type="date" class="form-control" name="to_date" value="{{ $societyboardmembers->to_date }}" required autofocus>

                                @if ($errors->has('to_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('to_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-success"></i> Update
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

