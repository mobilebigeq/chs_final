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
                <div class="panel-heading col-md-10">Society Board Member</div>
                <div class="panel-body col-md-10">
               
                    <table class="table">
                    
                         <thead>
                         <tr>
                              <div class="panel" style="box-shadow: none">
                                <a href="{{ url('create_societyboardmember')}}" class="btn btn-success">Add Board Member</a>
                             </div>
                         </tr>
                                <tr>
                                    <th>Society Board Member</th>
                                    <th>Designation</th>
                                    <th>From</th>
                                    <th>Till</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($societyboardmembers as $societymember)
                            <tr>
                                <td>
                                @if($societymember->society_member_method != null)
                                    {{ $societymember->society_member_method->full_name }}
                                    @endif
                                
                                </td>

                                <td>
                                    {{ $societymember->designation }}
                                </td>

                                <td>
                                    {{ $societymember->from_date }}
                                </td>
                                <td>
                                    {{ $societymember->to_date }}
                                </td>

                                <td>
                                    <a href="edit_societyboardmember/{{$societymember->id}}" class="btn btn-success">Edit</a>
                                    <a href="delete_societyboardmember/{{$societymember->id}}" class="btn btn-danger">Delete</a>
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
