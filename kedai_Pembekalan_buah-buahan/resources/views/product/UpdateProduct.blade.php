@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="row bg-white ">
                        <div class="col col-xs-6">Insert Product</div>
                        <div class="col col-xs-6 text-right"><a href="{{route('viewProduct')}}">Back</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('updateProduct.store') }}" enctype="multipart/form-data">
                        @csrf
                        @foreach($product as $product)
                        <input type="text" name="id" id="id" value="{{$product->id}}" style="display : none;">
                        <div class="form-group row">
                            <label for="Fruit_Name" class="col-md-4 col-form-label text-md-right">Product Name</label>

                            <div class="col-md-6">
                                <input id="Product_Name" type="text" class="form-control" name="Product_Name"
                                    value="{{$product->Fruit_Name}}">
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
                                        src="{{ asset('images/product/')}}/{{$product->Fruit_Picture}}">
                                    @endif
                                    <div class="icon" onclick="triggerClick()"><i
                                            class="fas fa-cloud-upload-alt"></i>&nbsp;Upload</div>
                                    <input name="product_image" type="file" id="product-image"
                                        onchange="displayImage(this)" style="display: none;" accept="image/*">
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="Fruit_Price" class="col-md-4 col-form-label text-md-right">Product Price</label>

                            <div class="col-md-6">
                                <input id="Fruit_Price" type="text" class="form-control " name="Fruit_Price"
                                    value="{{$product->Fruit_Price}}">
                                <span id="pricefield" style="color:red;">{{$errors->first('Fruit_Price')}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Fruit_Brand" class="col-md-4 col-form-label text-md-right">Product Brand</label>
                            <div class="col-md-6">
                                <input id="v" type="text" class="form-control " name="Fruit_Brand"
                                    value="{{$product->Fruit_Brand}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Fruit_Quantity" class="col-md-4 col-form-label text-md-right">Product
                                Quantity</label>
                            <div class="col-md-6">
                                <input id="Fruit_Quantity" type="number" class="form-control" name="Fruit_Quantity"
                                    value="{{$product->Fruit_Quantity}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Fruit_Weight" class="col-md-4 col-form-label text-md-right">Product
                                Weight</label>
                            <div class="col-md-6">
                                <input id="Fruit_Weight" type="text" class="form-control" name="Fruit_Weight"
                                    value="{{$product->Fruit_Weight}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Fruit_Pack" class="col-md-4 col-form-label text-md-right">Product Pack</label>
                            <div class="col-md-6">
                                <input id="Fruit_Pack" type="number" class="form-control" name="Fruit_Pack"
                                    value="{{$product->Fruit_Pack}}">
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
