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
                <div class="panel-heading col-md-10">Edit Maintenance Bill</div>

                <div class="panel-body col-md-8">

                    <form class="form-horizontal" method="POST" action="{{url('/update_maintenance_bill',array($maintenanceBills->id)) }}">
                        {{ csrf_field() }}


                         <div class="form-group{{ $errors->has('flat_id') ? ' has-error' : '' }}">
                            <label for="flat_id" class="col-md-4 control-label">Flat No 
                            </label>

                            <div class="col-md-6">
                                <select id="flat_id" type="text" class="form-control" name="flat_id">

                                @foreach ($flats as $flat)
                                <option value="{{$flat->id}}"
                                @if($maintenanceBills->flat_id == $flat->id)
                                {{"selected"}}
                                @endif
                                >{{$flat->flat_no}}</option>
                                @endforeach
                                </select>
                                @if ($errors->has('flat_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('flat_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('bill_number') ? ' has-error' : '' }}">
                            <label for="bill_number" class="col-md-4 control-label">Bill Number
                            </label>

                            <div class="col-md-6">
                                <input id="bill_number" type="text" class="form-control" name="bill_number" value="{{ $maintenanceBills->bill_number }}" required autofocus>

                                @if ($errors->has('bill_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bill_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-4 control-label">Amount
                            </label>

                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control" name="amount" value="{{ $maintenanceBills->amount }}" required autofocus>

                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                         <div class="form-group{{ $errors->has('extra_charge') ? ' has-error' : '' }}">
                            <label for="extra_charge" class="col-md-4 control-label">Extra Charge 
                            </label>

                            <div class="col-md-6">
                                <select id="extra_charge" type="text" class="form-control" name="extra_charge" value="{{ old('extra_charge') }}">

                                    <option value="{{$maintenanceBills->extra_charge}}">{{$maintenanceBills->extra_charge}}</option>
                                    @if($maintenanceBills->extra_charge == 'Yes')
                                    <option value="No">No</option>
                                    @else
                                     <option value="Yes">Yes</option>
                                    @endif
                                </select>

                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div id="charge_name" class="form-group{{ $errors->has('charge_name') ? ' has-error' : '' }}" style="display: none;">
                            <label for="charge_name" class="col-md-4 control-label">Charge Name
                            </label>

                            <div class="col-md-6">
                                <input id="charge_name" type="text" class="form-control" name="charge_name" value="{{ $maintenanceBills->charge_name }}">

                                @if ($errors->has('charge_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('charge_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div id="charge_amount" class="form-group{{ $errors->has('charge_amount') ? ' has-error' : '' }}" style="display: none;">
                            <label for="charge_amount" class="col-md-4 control-label">Charge Amount
                            </label>

                            <div class="col-md-6">
                                <input id="charge_amount" type="text" class="form-control" name="charge_amount" value="{{$maintenanceBills->charge_amount }}">

                                @if ($errors->has('charge_amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('charge_amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-ticket"></i> Update
                                </button>

                                <a href="{{ url('show_maintenance_bills') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
</script>

<script type="text/javascript">
    
    $(document).ready(function() {

        if($('#extra_charge').val() == 'Yes'){
            $('#charge_name').show();
                $('#charge_amount').show();
        }

        $('#extra_charge').change(function() {

            if($('#extra_charge').val() == 'Yes'){

                $('#charge_name').show();
                $('#charge_amount').show();
            }
            else{

                 $('#charge_name').hide();
                 $('#charge_amount').hide();
            }
        })

    })
</script>

@endsection

