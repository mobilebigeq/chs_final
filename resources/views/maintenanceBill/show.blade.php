@extends('layouts.app')

@section('content')
<div class="contain">
    <div class="row">
        <div class="col-md-12">
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
                <div class="panel-heading col-md-6">Maintenance Bill</div>
                
                <div class="col-md-2" style="margin-top: 5px">
                     <form class="form-horizontal" method="POST" action="{{url('/send') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-info">
                                    <i class="fa fa-btn fa-ticket"></i>Send Maintenance via Email
                                </button>
                            </div>
                        </div>
    
                    </form>
                </div>
                <div class="col-md-2" style="margin-top: 5px">
                     <a href="{{ url('create_maintenance_bill')}}" class="btn btn-success btn-large btn-block">Add Maintenance Bill</a>
                </div>


                <div class="panel-body col-md-10">
                    <table class="table">
                            <thead>
                                <tr>
                                    <th>Flat No</th>
                                    <th>Bill Number</th>
                                    <th>Amount</th>
                                    <th>Extra Charge</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($maintenanceBills as $maintenanceBill)
                            <tr>
                                <td>
                                @if($maintenanceBill->flats_method !=null)
                                {{ $maintenanceBill->flats_method->flat_no }}
                                @endif
                                </td>

                                <td>
                                    {{ $maintenanceBill->bill_number }}
                                </td>
                                <td>
                                    {{ $maintenanceBill->amount }}
                                </td>

                                <td>
                                    {{ $maintenanceBill->extra_charge }}
                                </td>

                                <td>
                                    <a href="edit_maintenance_bill/{{$maintenanceBill->id}}" class="btn btn-success">Edit</a> 
                                    <a href="delete_maintenance_bill/{{$maintenanceBill->id}}" class="btn btn-danger">Delete</a> 
                                    <a href="downloadPDF/{{$maintenanceBill->id}}" class="btn btn-info">Download PDF</a>
                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                                
                            
                            @endforeach
                            </tbody>
                        </table>
                </div>
<!-- 
                <div class="panel-body col-md-2">

                     <form class="form-horizontal" method="POST" action="{{url('/send') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-info">
                                    <i class="fa fa-btn fa-ticket"></i>Send Maintenance via Email
                                </button>
                            </div>
                        </div>
    
                    </form>
                    &nbsp;
                    <a href="{{ url('create_maintenance_bill')}}" class="btn btn-success btn-large btn-block">Add Maintenance Bill</a>

                </div> -->
            </div>
        </div>
    </div>
</div>
@endsection
