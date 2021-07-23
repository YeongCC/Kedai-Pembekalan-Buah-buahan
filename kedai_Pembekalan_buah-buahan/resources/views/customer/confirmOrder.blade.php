@extends('layouts/navBar')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="row bg-white ">
                        <div class="container">
                            <div style="float: left">Fill Up Your Detail</div>
                            <div style="float: right"><a href="{{url('/')}}">Cancel</a></div>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group row">
                            <label for="Product_Name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="Product_Name" type="text" class="form-control" name="Product_Name">
                                <span id="namefield" style="color:red;">{{$errors->first('Product_Name')}}</span>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="Product_Price" class="col-md-4 col-form-label text-md-right">Adress</label>

                            <div class="col-md-6">
                                <input id="Product_Price" type="text" class="form-control " name="Product_Price">
                                <span id="pricefield" style="color:red;">{{$errors->first('Product_Price')}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Product_Price" class="col-md-4 col-form-label text-md-right">Phone Number</label>

                            <div class="col-md-6">
                                <input id="Product_Price" type="text" class="form-control " name="Product_Price">
                                <span id="pricefield" style="color:red;">{{$errors->first('Product_Price')}}</span>
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button class="btn btn-primary" id="insert" type="submit">
                                    Insert
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
