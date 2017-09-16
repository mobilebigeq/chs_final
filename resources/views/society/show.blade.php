@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Super Admin</div>
                
                <div class="panel-body col-md-10">
                    <table class="table">
                            <thead>
                                <tr>
                                    <th>Society Name</th>
                                    <th>Address</th>
                                    <th>Office Number</th>
                                    <th>Registration Number</th>
                                    <th>Establishment Date</th>
                                    <th style="text-align:center" colspan="2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($societies as $society)
                            <tr>
                                <td>
                                    {{ $society->society_name }}
                                </td>

                                <td>
                                    {{ $society->address }}
                                </td>

                                <td>
                                    {{ $society->office_number }}
                                </td>

                                <td>
                                    {{ $society->registration_number }}
                                </td>

                                <td>
                                    {{ $society->establishment_date }}
                                </td>
                                <td>
                                    <a href="edit_society/{{$society->id}}" class="btn btn-success">Edit</a>
                                    <a href="delete_society/{{$society->id}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                                
                            
                            @endforeach
                            </tbody>
                        </table>
                </div>
                 <div class="panel-body col-md-2">
                    <a href="{{ url('create_society')}}" class="btn btn-success btn-large btn-block">Create Society</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
