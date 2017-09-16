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
                <div class="panel-heading col-md-10">Tenant</div>

                <div class="panel-body col-md-10" style="background-color: white">
                    <table class="table">
                            <thead>
                            <tr>
                                 <div class="panel" style="box-shadow: none">
                             <a href="{{ url('create_tenant')}}" class="btn btn-success">Add Tenant</a>
                             </div>
                            </tr>
                                <tr>
                                <th>Full Name</th>
                                    <th>Permanent Address</th>
                                    <th>Agreement Copy</th>
                                    <th>Police Verification</th>
                                    <th>Address Proof1</th>
                                    <th>Address Proof2</th>
                                    <th>Email Address</th>
                                    <th>Mobile Number</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($tenants as $tenant)
                            <tr>
                               <td>
                                    {{ $tenant->full_name }}
                                </td>

                                <td>
                                    {{ $tenant->permanent_address }}
                                </td>

                                <td>
                                    <img src="{{ $tenant->agreement_copy }}" class="avatar" alt="">
                                    
                                </td>

                                <td>
                                <img src="{{ $tenant->police_verification }}" class="avatar" alt="">   
                                </td>

                                <td>
                                <img src="{{ $tenant->address_proof1 }}" class="avatar" alt="">
                                </td>

                                <td>
                                <img src="{{ $tenant->address_proof2 }}" class="avatar" alt="">
                                </td>

                                <td>
                                    {{ $tenant->email_address }}
                                </td>
                                <td>
                                    {{ $tenant->mobile_number }}
                                </td>

                                <td>
                                    <a href="edit_tenant/{{$tenant->id}}" class="btn btn-success">Edit</a>
                                    <a href="delete_tenant/{{$tenant->id}}" class="btn btn-danger">Delete</a>
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
