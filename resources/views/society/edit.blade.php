@extends('layouts.app')

@section('title', 'Open Ticket')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Society</div>
                <div class="panel-body">

                    <form class="form-horizontal" method="POST" action="{{url('/update_society',array($societies->id)) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('society_name') ? ' has-error' : '' }}">
                            <label for="society_name" class="col-md-4 control-label">Society Name 
                            </label>

                            <div class="col-md-6">
                                <input id="society_name" type="text" class="form-control" name="society_name" value="{{$societies->society_name }}" required autofocus>

                                @if ($errors->has('society_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('society_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address 
                            </label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{$societies->address}}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('office_number') ? ' has-error' : '' }}">
                            <label for="office_number" class="col-md-4 control-label">Office Number 
                            </label>

                            <div class="col-md-6">
                                <input id="office_number" type="text" class="form-control" name="office_number" value="{{ $societies->office_number }}" required autofocus>

                                @if ($errors->has('office_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('office_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('registration_number') ? ' has-error' : '' }}">
                            <label for="registration_number" class="col-md-4 control-label">Registration Number 
                            </label>

                            <div class="col-md-6">
                                <input id="registration_number" type="text" class="form-control" name="registration_number" value="{{$societies->registration_number }}" required autofocus>

                                @if ($errors->has('registration_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('registration_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('establishment_date') ? ' has-error' : '' }}">
                            <label for="establishment_date" class="col-md-4 control-label">Establishment Date 
                            </label>

                            <div class="col-md-6">
                                <input id="establishment_date" type="date" class="form-control" name="establishment_date" value="{{ $societies->establishment_date }}" required autofocus>

                                @if ($errors->has('establishment_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('establishment_date') }}</strong>
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

