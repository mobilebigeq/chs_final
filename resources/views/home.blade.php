@extends('layouts.app')
<style type="text/css">
    .nav-bg{
        background-color: #222d32;
        height: 100%;
    }
    .heading{
        font-size: 60px;
        font-weight:100;
        color: #636b6f;
        text-align: center;
        margin-top: 150px;
    }
    .custom-container{
        width: 100%;
        text-align: center;
        margin-top: 0;
    }
    .wrapper{
        font-size: 50px;
       display: flex;
     align-items: center;
    justify-content: center;
    }
    .custom-button{
        font-size: 20px;
        background-color: #57549C;
        border-color: #2a88bd;
        color: white;
        border-radius:4px;
        display:inline-block;
        cursor:pointer;
        line-height:1.6;
        padding:6px 32px;
        border:1px solid transparent;
    }
    a:hover{
        background-color: #7673BD:
        color:none; 
    }
    .panel-body{
        height: 500px;
    }
</style>
@section('content')
<div class="custom-container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" style="border:none;box-shadow: none;">
                
                <div class="panel-body col-md-12">
                   @if(Auth::user()->society_id)

                   <div class="panel-heading heading">Welcome to {{Auth::user()->society_method->society_name}}</div>
                   <div class="wrapper">
                       <a href="{{ url('show_societymember')}}" class="custom-button"> Get Started!!</a>
                   </div>
                     
                     
                     @else
                     <div class="panel-heading heading">Welcome {{Auth::user()->name}}</div>
                     <div class="wrapper">
                      <a href="{{ url('users')}}" class="custom-button">Create Admin</a>
                      </div>
                   @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
