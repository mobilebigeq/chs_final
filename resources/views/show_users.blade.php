@extends('layouts.app')
<style type="text/css">
    .contain{
        width: 100%;
    }
    .col-md-2{
        padding-left: 5px;
    }
</style>
@section('content')
<div class="contain">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Super Admin</div>
                
                <div class="panel-body col-md-10">
                    <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email Address</th>
                                    <th>Society</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>
                                    {{ $user->name }}
                                </td>

                                <td>
                                    {{ $user->email }}
                                </td>

                                <td>
                                @if($user->society_method != null)
                                    {{ $user->society_method->society_name }}
                                @else
                                <b>{{'Super Admin'}}</b>
                                @endif
                                </td>

                            </tr>
                                
                            
                            @endforeach
                            </tbody>
                        </table>
                </div>
                 <div class="panel-body col-md-2">
                    <a href="{{ url('register')}}" class="btn btn-success btn-large btn-block">Create User</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
