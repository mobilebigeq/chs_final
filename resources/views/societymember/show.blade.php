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
                <div class="panel-heading col-md-10">Society Member</div>
                 <div class="col-md-10">
              <form method="POST" action="{{ url("/search_society_member") }}">
                  {{csrf_field()}}
                  <div class="input-group">
                  <input type="text" name="search" class="form-control" placeholder="Search by Name...">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                      Go!
                    </button>
                  </span>
                    
                  </div>
                    
                  </form>
            </div>

                <div class="panel-body col-md-10">
               
                    <table class="table">
                    
                         <thead>
                         <tr>
                             <div class="panel">
                             <a href="{{ url('create_societymember')}}" class="btn btn-success">Add Society Member</a>
                             </div>
                         </tr>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Email Address</th>
                                    <th>Mobile Number</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($societymembers as $societymember)
                            <tr>
                                <td>
                                <a href="{{url('/detail/'.$societymember->id)}}">
                                    {{ $societymember->full_name }}
                                </a>
                                </td>

                                <td>
                                    {{ $societymember->email_address }}
                                </td>

                                <td>
                                    {{ $societymember->mobile_number }}
                                </td>

                                <td>
                                    <a href="edit_societymember/{{$societymember->id}}" class="btn btn-success">Edit</a>
                                    <a href="delete_societymember/{{$societymember->id}}" class="btn btn-danger">Delete</a>
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
