<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Admin') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icon/fruits.png')}}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/image.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container" style="margin-top:3%;margin-bottom:3%">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-white">
                        <div class="row bg-white ">
                            <div class="col col-xs-6">Receipt</div>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach(session('cusdetail') as $id => $cus_details)
                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left" style="font-size: 30px">Customer Name :
                                <a style="color:green">{{ $cus_details['name'] }}</a></label>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left" style="font-size: 30px">Phone Number :
                                <a style="color:green">{{$cus_details['phone'] }}</a></label>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left" style="font-size: 30px">Adress :
                                <a style="color:green">{{$cus_details['address'] }}</a></label>
                        </div>
                        @endforeach
                        @foreach(session('orderdetail') as $id => $cus_order_details)
                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left" style="font-size: 30px">Order Id : <a
                                    style="color:green">{{ $cus_order_details['order_id'] }}</a></label>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left" style="font-size: 30px">Receive Day :
                                <a style="color:green">{{ $cus_order_details['receive_time'] }}</a></label>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left" style="font-size: 30px">Total Price :
                                <a style="color:green">RM {{ $cus_order_details['total_price'] }}</a></label>
                        </div>
                        @if($cus_order_details['message']!="")
                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left" style="font-size: 30px">Messages : <a
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

                        <div class="container">
                            <div style="text-align:center">
                            <a class="btn btn-primary" href="{{url('/leaveRecaipt')}}" >
                                leave
                            </a>
                        </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
