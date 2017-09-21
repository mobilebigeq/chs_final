@extends('layouts.app')

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
                <div class="panel-heading col-md-10">Generate Maintenance Bill</div>


                <div class="panel-body col-md-8">
                    
                    @if($maintenanceBills !== null)
                        <div id="bill_button_click" class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-danger btn-large btn-block">
                                    <i class="fa fa-btn fa-ticket"></i>Bill Already Generated for {{$month}}
                                </button>
                            </div>

                        </div>
                        
                        <div id="generated_label" class="form-group" style="display: none;">
                            <div class="col-md-6 col-md-offset-4">
                                <label>Bill has been generated for this month. Are you sure you want to proceed?</label>
                            </div>

                            
                            <div class="col-md-6 col-md-offset-4">
                                 <form class="form-horizontal" method="POST" action="{{url('/store_maintenance_bill') }}">
                                 {{ csrf_field() }}

                          <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success btn-large btn-block">
                                Proceed
                                </button>
                            </div>
                        </div>
    
                    </form>

                            <div>
                            <a href="{{ url('show_maintenance_bills') }}" class="btn btn-danger btn-large btn-block">
                            Cancel</a>
                            </div> 
                                
                            </div>
                        </div>
                        
                        @else
                         <form class="form-horizontal" method="POST" action="{{url('/store_maintenance_bill') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success btn-large btn-block">
                                    <i class="fa fa-btn fa-ticket"></i>Generate Bill
                                </button>
                            </div>
                        </div>
    
                    </form>
                    
                    @endif
                   
                </div>
            </div>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
</script>

<script type="text/javascript">
    $(document).ready(function() {

        $('#bill_button_click').click(function() {

            $('#generated_label').show();
            $('#bill_button_click').hide();
        })

    })
</script>
@endsection

