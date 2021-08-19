@extends('layouts.app')

@section('content')
@if(Session::has('insert'))
<div class="alert alert-success" style="  text-align: center;" role="stylesheet"> ​
    {{ Session::get('insert') }}
</div> ​
@endif
@if(Session::has('create'))
<div class="alert alert-success" style="  text-align: center;" role="stylesheet"> ​
    {{ Session::get('create') }}
</div> ​
@endif
@if(Session::has('updateOwn'))
<div class="alert alert-success" style="  text-align: center;" role="stylesheet"> ​
    {{ Session::get('updateOwn') }}
</div> ​
@endif
<div class="container">
    <p style="font-size: 30px">Order Details</p>
    <hr>
    <div class="row">
        <div class="col-sm-6 mb-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="material-icons" style="font-size:36px">receipt</i></h5>
                    <a href="{{url('/viewOrder')}}"> Order</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 mb-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title" style="margin-top:5px"><i class="fa fa-check" style="font-size:36px"></i>
                    </h5>
                    <a href="{{url('/viewDoneOrder')}}">Order Done</a>
                </div>
            </div>
        </div>
    </div>

    <p style="font-size: 30px">Product Settings</p>
    <hr>
    <div class="row">
        <div class="col-sm-6 mb-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title" style="margin-top:5px"><i class="fa fa-plus" style="font-size:36px"></i></h5>
                    <a href="{{url('/insertProduct')}}">Insert Product</a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 mb-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="material-icons" style="font-size:36px">sync</i></h5>
                    <a href="{{url('/viewProduct')}}">Manage Product</a>
                </div>
            </div>
        </div>
    </div>

    <p style="font-size: 30px">Account Details</p>
    <hr>
    @if(Auth::user()->position==1)
    <div class="row">
        <div class="col-sm-6 mb-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title" style="margin-top:5px"><i class="fa fa-user-plus" style="font-size:36px"></i>
                    </h5>
                    <a href="{{url('/createUser')}}">Add New User</a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 mb-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="material-icons" style="font-size:36px">supervisor_account</i></h5>
                    <a href="{{url('/showUser')}}">Manage User Account</a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 mb-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="material-icons" style="font-size:36px">account_circle</i></h5>
                    <a href="{{ route('showown.update', ['id' => Auth::user()->id]) }}">Manage Own Account</a>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-sm-6 mb-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="material-icons" style="font-size:36px">account_circle</i></h5>
                    <a href="{{ route('showown.update', ['id' => Auth::user()->id]) }}">Manage Own Account</a>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
