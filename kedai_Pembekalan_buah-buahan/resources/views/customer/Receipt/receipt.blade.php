
    <div class="container" style="margin-top:3%;margin-bottom:3%">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-white">
                        <div class="row bg-white ">
                            <div class="col col-xs-6" style="font-size: 30px">Your Orders</div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                        @foreach(session('cusdetail') as $id => $cus_details)
                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left" style="font-size: 30px">Customer Name :
                                <a style="color:green">{{ $cus_details['name'] }}</a></label>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left" style="font-size: 30px">Phone Number  :
                                <a style="color:green">{{$cus_details['phone'] }}</a></label>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left" style="font-size: 30px">Address    :
                                <a style="color:green">{{$cus_details['address'] }}</a></label>
                        </div>
                        @endforeach
                        @foreach(session('orderdetail') as $id => $cus_order_details)
                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left" style="font-size: 30px">Order Id   : <a
                                    style="color:green">{{ $cus_order_details['order_id'] }}</a></label>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left" style="font-size: 30px">Receive Day    :
                                <a style="color:green">{{ $cus_order_details['receive_time'] }}</a></label>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left" style="font-size: 30px">Total Price    :
                                <a style="color:green">RM {{ $cus_order_details['total_price'] }}</a></label>
                        </div>
                        @if($cus_order_details['message']!="")
                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left" style="font-size: 30px">Messages    : <a
                                    style="color:green">{{ $cus_order_details['message'] }}</a></label>
                        </div>
                        @endif
                        @endforeach
                        <hr>
                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left" style="font-size: 30px">Product</label>
                        </div>
                        <hr>

                        @foreach(session('cart') as $id => $details)
                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left">Product : <a style="color:green">
                                    {{ $details['name'] }}</a></label>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left">Quantity : <a
                                    style="color:green">{{ $details['quantity'] }}</a></label>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left">Price : <a style="color:green">RM
                                    {{ $details['price'] }}</a></label>
                        </div>
                        <hr>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>


