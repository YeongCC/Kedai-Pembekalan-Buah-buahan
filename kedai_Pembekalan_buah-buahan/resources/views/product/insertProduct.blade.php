@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="row bg-white ">
                        <div class="col col-xs-6">Insert Product</div>
                        <div class="col col-xs-6 text-right"><a href="{{route('home')}}">Back</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('insertProduct.store') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group row">
                            <label for="Fruit_Name" class="col-md-4 col-form-label text-md-right">Product Name</label>

                            <div class="col-md-6">
                                <input id="Product_Name" type="text" class="form-control" name="Product_Name">
                                <span id="namefield" style="color:red;">{{$errors->first('Product_Name')}}</span>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="product-image" class="col-md-4 col-form-label text-md-right">Product
                                Picture</label>
                            <div class="col-md-6">
                                <div class="drag-area">
                                    <img id="profileDisplay" style="width: 270px;height:270px;object-fit: contain ;">
                                    <div class="icon" onclick="triggerClick()"><i
                                            class="fas fa-cloud-upload-alt"></i>&nbsp;Upload</div>
                                    <input name="product_image" type="file" id="product-image"
                                        onchange="displayImage(this)" style="display: none;" accept="image/*">
                                    <span id="picturefield" style="color:red;">{{$errors->first('product_image')}}</span>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="Fruit_Price" class="col-md-4 col-form-label text-md-right">Product Price</label>

                            <div class="col-md-6">
                                <input id="Fruit_Price" type="text" class="form-control " name="Fruit_Price">
                                <span id="pricefield" style="color:red;">{{$errors->first('Fruit_Price')}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Fruit_Brand" class="col-md-4 col-form-label text-md-right">Product Brand</label>
                            <div class="col-md-6">
                                <input id="Fruit_Brand" type="text" class="form-control " name="Fruit_Brand">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Fruit_Quantity" class="col-md-4 col-form-label text-md-right">Product
                                Quantity</label>
                            <div class="col-md-6">
                                <input id="Fruit_Quantity" type="number" class="form-control" name="Fruit_Quantity">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Fruit_Weight" class="col-md-4 col-form-label text-md-right">Product
                                Weight</label>
                            <div class="col-md-6">
                                <input id="Fruit_Weight" type="text" class="form-control" name="Fruit_Weight">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Fruit_Pack" class="col-md-4 col-form-label text-md-right">Product Pack</label>
                            <div class="col-md-6">
                                <input id="Fruit_Pack" type="number" class="form-control" name="Fruit_Pack">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button  class="btn btn-primary" id="insert"  type="submit">
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
