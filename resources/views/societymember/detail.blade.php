@extends('layouts.app')

@section('content')
<div class="contain">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default" style="box-shadow: none;">
                <div class="col-md-2 nav-bg">
                    <ul class="list-group">
                           
                           <li class="list-group-item-custom">
                           {{Auth::user()->society_method->society_name}}
                           </li>
                            <li class="list-group-item"><a href="{{ url('show_societymember') }}">Society Members</a>
                             <li class="list-group-item"><a href="{{ url('show_societyboardmember') }}">Society Board Members</a>
                            </li>
                            <li class="list-group-item"><a href="{{ url('show_flats') }}">Flats</a></li>
                            <li class="list-group-item"><a href="{{ url('show_tenants') }}">Tenants</a></li>
                            <li class="list-group-item"><a href="{{ url('show_maintenances') }}">Maintenances</a></li>
                            <li class="list-group-item"><a href="{{ url('generate_maintenance_bill') }}">Generate Maintenance Bills</a></li>
                            <li class="list-group-item"><a href="{{ url('show_maintenance_bills') }}">Maintenance Bills</a></li>
                            <li class="list-group-item"><a href="{{ url('show_payments') }}">Payments</a></li>
                           
                    </ul>
                </div>
                <div class="panel-heading col-md-10">Society Member Detail</div>

                <div class="panel-body col-md-10">
                    <table class="table">
                         <thead>
                         @foreach($user_details as $user_detail)

                                <tr></tr>
                                <tr class="spaceUnder">
                                    <th>Name</th>
                                    <td>
                                    {{ $user_detail->full_name }}
                                    </td>
                                </tr>

                               
                                <tr class="spaceUnder">
                                    <th>Email Address</th>
                                    <td>
                                    {{ $user_detail->email_address }}
                                    </td>
                                </tr>

                                <tr class="spaceUnder">
                                    <th>Mobile No</th>
                                    <td>
                                    {{ $user_detail->mobile_number }}
                                    </td>
                                </tr>

                                <tr class="spaceUnder">
                                    <th>Flat No</th>
                                    <td>
                                    {{ $user_detail->flat_no }}
                                    </td>
                                </tr>

                                <tr class="spaceUnder">
                                    <th>Bill Number</th>
                                    <td>
                                    {{$user_detail->bill_number}}
                                    </td>
                                </tr>

                                <tr class="spaceUnder">
                                    <th>Extra Charges</th>
                                    <td>
                                    {{$user_detail->extra_charge}}
                                    </td>
                                </tr>
                                @if($user_detail->extra_charge == 'Yes')
                                <tr class="spaceUnder">
                                    <th>Charge Amount</th>
                                    <td>
                                    {{$user_detail->charge_amount}}
                                    </td>
                                </tr>
                                @endif

                                <tr class="spaceUnder">
                                    <th>Rented</th>
                                    <td>
                                    {{$user_detail->rented}}
                                    </td>
                                </tr>

                                <tr class="spaceUnder">
                                    <th>Maintenance Amount</th>
                                    <td>
                                    {{ $user_detail->amount }}
                                    </td>
                                </tr>
                            
                            @endforeach
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

