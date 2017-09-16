@extends('layouts.app')

@section('content')
<div class="contain">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">    
                 <div class="col-md-2 nav-bg" >
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
                <div class="panel-heading col-md-10">Flats</div>
                
                <div class="col-md-10">
                <form method="POST" action="{{ url("/search_flats") }}">
                  {{csrf_field()}}
                  <div class="input-group">
                  <input type="text" name="search" class="form-control" placeholder="Search Flats...">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                      Go!
                    </button>
                  </span>
                    
                  </div>
                    
                  </form>
            </div>

                <div class="panel-body col-md-10" style="background-color: white">
                    <table class="table">
                            <thead>
                            <tr>
                                 <div class="panel" style="box-shadow: none">
                            <a href="{{ url('create_flat')}}" class="btn btn-success">Add Flat</a>
                             </div>
                            </tr>
                                <tr>
                                    <th>Flat No</th>
                                    <th>Carpet Area</th>
                                    <th>Floor</th>
                                    <th>Building</th>
                                    <th>Society Member</th>
                                    <th>Rented</th>
                                    <th style="text-align:center" colspan="2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($flats as $flat)
                            <tr>
                                <td>
                                    {{ $flat->flat_no }}
                                </td>

                                <td>
                                    {{ $flat->carpet_area }}
                                </td>

                                <td>
                                    {{ $flat->floor }}
                                </td>

                                <td>
                                    {{ $flat->building }}
                                </td>

                                <td>
                                @if($flat->society_members != null)
                                    {{ $flat->society_members->full_name }}
                                @endif
                                </td>

                                <td>
                                    {{ $flat->rented }}
                                </td>

                                <td>
                                    <a href="edit_flat/{{$flat->id}} " class="btn btn-success">Edit</a>
                                    <a href="delete_flat/{{$flat->id}} " class="btn btn-danger">Delete</a>
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
