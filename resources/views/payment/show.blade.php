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
                <div class="panel-heading col-md-10">Payment</div>

                <div class="panel-body col-md-10">
                    <table class="table">
                            <thead>
                             <tr>
                                 <div class="panel" style="box-shadow: none">
                                    <a href="{{ url('create_payment')}}" class="btn btn-success">Add Payment</a>
                                 </div>
                            </tr>
                                <tr>
                                    <th>Bill Number</th>
                                    <th>Amount</th>
                                    <th>Payment Date</th>
                                    <th>PG Status</th>
                                    <th>PG Response</th>
                                    <th>Payment Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($societies as $society)
                            <tr>
                                <td>
                                @if($society->maintenance_bill !=null )
                                    {{ $society->maintenance_bill->bill_number }}
                                @endif
                                </td>

                                <td>
                                    {{ $society->amount }}
                                </td>

                                <td>
                                    {{ $society->payment_date }}
                                </td>

                                <td>
                                    {{ $society->pg_status }}
                                </td>

                                <td>
                                    {{ $society->pg_response }}
                                </td>

                                <td>
                                    {{ $society->payment_status }}
                                </td>

                                <td>
                                    <a href="edit_payment/{{$society->id}}" class="btn btn-success">Edit</a>
                                    <a href="delete_payment/{{$society->id}}" class="btn btn-danger">Delete</a> 
                                </td>
                            </tr> 
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
