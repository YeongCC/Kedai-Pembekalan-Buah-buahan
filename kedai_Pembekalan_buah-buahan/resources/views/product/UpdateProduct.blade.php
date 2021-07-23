@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="row bg-white ">
                        <div class="col col-xs-6">Update Product</div>
                        <div class="col col-xs-6 text-right"><a href="{{route('viewProduct')}}">Cancel</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('updateProduct.store') }}" enctype="multipart/form-data">
                        @csrf
                        @foreach($product as $product)
                        <input type="text" name="id" id="id" value="{{$product->id}}" style="display : none;">
                        <div class="form-group row">
                            <label for="Product_Name" class="col-md-4 col-form-label text-md-right">Product Name</label>

                            <div class="col-md-6">
                                <input id="Product_Name" type="text" class="form-control" name="Product_Name"
                                    value="{{$product->Product_Name}}">
                                <span id="namefield" style="color:red;">{{$errors->first('Product_Name')}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product-image" class="col-md-4 col-form-label text-md-right">Product
                                Picture</label>
                            <div class="col-md-6">
                                <div class="drag-area">
                                    @if($product->Fruit_Picture==" ")
                                    <img id="profileDisplay" style="width: 270px;height:270px;object-fit: contain ;">
                                    @else
                                    <img id="profileDisplay" style="width: 270px;height:270px;object-fit: contain ;"
                                        src="{{ asset('images/product/')}}/{{$product->Product_Picture}}">
                                    @endif
                                    <div class="icon" onclick="triggerClick()"><i
                                            class="fas fa-cloud-upload-alt"></i>&nbsp;Upload</div>
                                    <input name="product_image" type="file" id="product-image"
                                        onchange="displayImage(this)" style="display: none;" accept="image/*">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Product_Price" class="col-md-4 col-form-label text-md-right">Product Price</label>

                            <div class="col-md-6">
                                <input id="Product_Price" type="text" class="form-control " name="Product_Price"
                                    value="{{$product->Product_Price}}">
                                <span id="pricefield" style="color:red;">{{$errors->first('Product_Price')}}</span>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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
