@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="row bg-white ">
                        @foreach($user as $user)
                        <div class="col col-xs-6">{{$user->email}}</div>
                        <div class="col col-xs-6 text-right"><a href="{{route('home')}}">Back</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('own.update') }}" enctype="multipart/form-data">

                        @csrf
                        <input type="text" name="position" id="position" value="{{$user->position}}" style="display : none;">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name </label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"  value="{{$user->name}}">
                                <span id="name" style="color:red;">{{$errors->first('name')}}</span>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="oldpassword" class="col-md-4 col-form-label text-md-right">Old Password</label>
                            <div class="col-md-6">
                                <input id="oldpassword" type="password" class="form-control " name="oldpassword"  value="">
                                <span id="oldpassword" style="color:red;">{{$errors->first('oldpassword')}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="newpassword" class="col-md-4 col-form-label text-md-right">New Password</label>
                            <div class="col-md-6">
                                <input id="newpassword" type="password" class="form-control " name="newpassword"  value="">
                                <span id="newpassword" style="color:red;">{{$errors->first('newpassword')}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="repeatpassword" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="repeatpassword" type="password" class="form-control " name="repeatpassword"  value="">
                                <span id="repeatpassword" style="color:red;">{{$errors->first('repeatpassword')}}</span>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button  class="btn btn-primary" id="insert"  type="submit">
                                    Update
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
