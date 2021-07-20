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
                        <div class="col col-xs-6 text-right"><a href="{{route('showUser')}}">Back</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('updateProduct.create') }}" enctype="multipart/form-data">

                        @csrf
                        <input type="text" name="id" id="id" value="{{$user->id}}" style="display : none;">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">User Name </label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"  value="{{$user->name}}">
                                <span id="name" style="color:red;">{{$errors->first('name')}}</span>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">User Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control " name="password"  value="">
                                <span id="password" style="color:red;">{{$errors->first('password')}}</span>
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
