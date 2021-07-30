<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 ">
    @foreach($product as $key)
    @if($key->Product_Status=="1")
    <div class="col mb-3" style="margin-top:20px">
        <div class="card shadow-sm">
            <img src="{{ asset('images/product/')}}/{{$key->Product_Picture}}" alt="{{$key->Product_Name}}" width="100%"
                height="225" preserveAspectRatio="xMidYMid slice" focusable="false" style="object-fit: contain ;">
            <div class="card-body">
                <div class="container" style="width: 100%;height:200px">
                    <div class="mb-3">
                        <p class="card-text"><strong>Name : </strong><span class="text-uppercase">{{$key->Product_Name}}</span></p>
                        <p class="card-text"><strong>Price : </strong>RM&nbsp;{{$key->Product_Price}}</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center ">
                        <div class="btn-group">
                            <a type="button" class="btn btn-sm btn-outline-success"
                                href="{{ route('showEditProduct', ['id' => $key->id]) }}">Edit</a>

                            <a type="button" class="btn btn-sm btn-outline-secondary"
                                href="{{ route('hideProduct.store', ['id' => $key->id , 'status' => $key->Product_Status]) }}">Hide</a>

                            <a type="button" class="btn btn-sm btn-outline-danger"
                                href="{{ route('deleteProduct.store', ['id' => $key->id]) }}"
                                onclick="return confirm('Are You Sure Want To Delete?')">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="col mb-3" style="margin-top:20px">
        <div class="card shadow-sm">

            <div class="container">
                <img src="{{ asset('images/product/')}}/{{$key->Product_Picture}}" alt="{{$key->Product_Name}}"
                    width="100%" height="225" preserveAspectRatio="xMidYMid slice" focusable="false"
                    style="object-fit: contain ; opacity:0.2!important; position:relative;top:0;left:0">
            </div>

            <div class="card-body">
                <div class="container" style="width: 100%;height:200px">
                <div class="mb-3" style="position:relative;top:0;left:0">
                    <img src="{{ asset('images/icon/hide.png')}}" width="50px" height="50px"
                        style=" position:absolute;top:-20px;left:260px">
                    <div style="opacity:0.2!important">
                        <p class="card-text"><strong>Name :</strong>{{$key->Product_Name}}</p>
                        <p class="card-text"><strong>Price : </strong>RM&nbsp;{{$key->Product_Price}}</p>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a type="button" class="btn btn-sm btn-outline-success"
                            href="{{ route('showEditProduct', ['id' => $key->id]) }}">Edit</a>

                        <a type="button" class="btn btn-sm btn-secondary"
                            href="{{ route('hideProduct.store', ['id' => $key->id , 'status' => $key->Product_Status]) }}">Hide</a>

                        <a type="button" class="btn btn-sm btn-outline-danger"
                            href="{{ route('deleteProduct.store', ['id' => $key->id]) }}"
                            onclick="return confirm('Are You Sure Want To Delete? Cannot Be Restore')">Delete</a>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach

</div>
<div style="float: right">
    {{$product->links("pagination::bootstrap-4")}}
</div>
