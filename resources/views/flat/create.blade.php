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
                <div class="panel-heading col-md-10">New Flat</div>

                <div class="panel-body col-md-8">

                    <form class="form-horizontal" method="POST" action="{{url('/store_flat') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('flat_no') ? ' has-error' : '' }}">
                            <label for="flat_no" class="col-md-4 control-label">Flat No 
                            </label>

                            <div class="col-md-6">
                                <input id="flat_no" type="text" class="form-control" name="flat_no" value="{{ old('flat_no') }}" required autofocus>

                                @if ($errors->has('flat_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('flat_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('carpet_area') ? ' has-error' : '' }}">
                            <label for="carpet_area" class="col-md-4 control-label">Carpet Area 
                            </label>

                            <div class="col-md-6">
                                <input id="carpet_area" type="text" class="form-control" name="carpet_area" value="{{ old('carpet_area') }}" required autofocus>

                                @if ($errors->has('carpet_area'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('carpet_area') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('floor') ? ' has-error' : '' }}">
                            <label for="floor" class="col-md-4 control-label">Floor 
                            </label>

                            <div class="col-md-6">
                                <input id="floor" type="text" class="form-control" name="floor" value="{{ old('floor') }}" required autofocus>

                                @if ($errors->has('floor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('floor') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('building') ? ' has-error' : '' }}">
                            <label for="building" class="col-md-4 control-label">Building 
                            </label>

                            <div class="col-md-6">
                                <input id="building" type="text" class="form-control" name="building" value="{{ old('building') }}">

                                @if ($errors->has('building'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('building') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('society_members_id') ? ' has-error' : '' }}">
                            <label for="society_members_id" class="col-md-4 control-label">Society Members 
                            </label>

                            <div class="col-md-6">
                                <select id="society_members_id" type="text" class="form-control" name="society_members_id" value="{{ old('society_members_id') }}">
                                    <option value="">Select Society Member</option>
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

                        <div class="form-group{{ $errors->has('rented') ? ' has-error' : '' }}">
                            <label for="rented" class="col-md-4 control-label">Is Rented? 
                            </label>

                            <div class="col-md-6">
                                <select id="rented" type="text" class="form-control" name="rented" value="{{ old('rented') }}" required autofocus>
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                </select>

                                @if ($errors->has('rented'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rented') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div id="tenants_id" class="form-group{{ $errors->has('tenants_id') ? ' has-error' : '' }}" style="display: none">
                            <label for="tenants_id" class="col-md-4 control-label">Tenant 
                            </label>

                            <div class="col-md-6">
                                <select id="tenants_id" type="text" class="form-control" name="tenants_id" value="{{ old('tenants_id') }}">
                                    <option value="">Select Tenant</option>
                                    @foreach($tenants as $tenant)
                                    <option value="{{$tenant->id}}">{{$tenant->full_name}}</option>
                                    @endforeach
                                </select>
                                
                                </select> 

                                @if ($errors->has('tenants_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tenants_id') }}</strong>
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


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
    
</script>

<script type="text/javascript">
    
    $(document).ready(function() {

        $('#rented').change(function() {

            if($('#rented').val() == 'yes'){

                $('#tenants_id').show();
            }
            else{

                $('#tenants_id').hide();
            }
        })
    })

</script>
@endsection

