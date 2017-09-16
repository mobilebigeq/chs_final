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
                <div class="panel-heading col-md-10">Edit Maintenance</div>

                <div class="panel-body col-md-8">

                    <form class="form-horizontal" method="POST" action="{{url('/update_maintenance',array($maintenances->id)) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-4 control-label">Amount
                            </label>

                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control" name="amount" value="{{ $maintenances->amount }}" required autofocus>

                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="type" class="col-md-4 control-label">Type 
                            </label>

                            <div class="col-md-6">
                                <select id="type" type="text" class="form-control" name="type" value="{{ old('type') }}" required autofocus>
                                
                                    <option value="{{$maintenances->type}}">{{$maintenances->type}}</option>
                                    @if($maintenances->type == 'Fixed')
                                    <option value="Per Sq Feet">Per Sq Feet</option>
                                    @else
                                    <option value="Fixed">Fixed</option>
                                    @endif
                                
                            
                                </select>

                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('revision_date') ? ' has-error' : '' }}">
                            <label for="revision_date" class="col-md-4 control-label">Revision Date
                            </label>

                            <div class="col-md-6">
                                <input id="revision_date" type="date" class="form-control" name="revision_date" value="{{ $maintenances->revision_date }}" required autofocus>

                                @if ($errors->has('revision_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('revision_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('due_date') ? ' has-error' : '' }}">
                            <label for="due_date" class="col-md-4 control-label">Due Date
                            </label>

                            <div class="col-md-6">
                                <select id="due_date" type="text" class="form-control" name="due_date" value="{{ old('due_date') }}" required autofocus>
                                <option value="{{$maintenances->due_date}}">{{$maintenances->due_date}}</option>
                                @for($i=0;$i < 31;$i++)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                                </select>
                                @if ($errors->has('due_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('due_date') }}</strong>
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

