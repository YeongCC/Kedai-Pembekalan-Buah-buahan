<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kedai Pembekalan Buah-Buahan</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icon/fruits.png')}}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
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
@foreach(session('cusdetail') as $id => $cus_details)
<?php
$i=1;
$cus_details_name=$cus_details['name'];
$cus_details_phone=$cus_details['phone'] ;
$cus_details_address=$cus_details['address'];
$cus_details_order_time=$cus_details['order_time'];
$cus_details_receive_time=$cus_details['receive_time'];
$cus_details_message=$cus_details['message'];
$cus_details_total_price=$cus_details['total_price'];
$cus_details_product_order_id=$cus_details['product_order_id'];
?>
@endforeach


<body>
    <div class="container" style="margin-top:3%;margin-bottom:3%">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header bg-white">
                        <div class="row bg-white ">
                            <div class="col-sm-12  col-md-6">Order Id : {{ $cus_details_product_order_id }}</div>
                            <div class="col-sm-12  col-md-6">Order Date : {{ $cus_details_order_time }}</div>
                        </div>
                    </div>
                    <div class="card-body">


                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left" style="font-size: 20px">Customer Name :
                                <a style="color:green">{{ $cus_details_name }}</a></label>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left" style="font-size: 20px">Phone Number :
                                <a style="color:green">{{ $cus_details_phone }}</a></label>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left" style="font-size: 20px">Address :
                                <a style="color:green">{{ $cus_details_address }}</a></label>
                        </div>

                        @if($cus_details_message!="")
                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left" style="font-size: 20px">Messages : <a
                                    style="color:green">{{$cus_details_message}}</a></label>
                        </div>
                        @endif

                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left" style="font-size: 20px">Receive Day :
                                <a style="color:green">{{ $cus_details_receive_time }}</a></label>
                        </div>

                        <hr>
                        <div class="container " style="width: 100%;">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th style="width:10%">No</th>
                                                    <th scope="col" style="width:50%">Product</th>
                                                    <th scope="col" style="width:20%">Quantity</th>
                                                    <th scope="col" style="width:20%">Price</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach(session('cusproductdetail') as $Order_Product_id =>
                                                $cus_order_details)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$cus_order_details['product_name']}}</td>
                                                    <td>{{$cus_order_details['product_quantity']}}</td>
                                                    <td>{{$cus_order_details['product_price']}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="container">
                            <div style="float: right">
                                <label style="font-size: 20px">Total Price :
                                    <a style="color:green">{{ $cus_details_total_price }}</a></label>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="container">
                            <div style="text-align:center">
                                <a class="btn btn-primary" href="{{url('/leaveRecaipt')}}" style="margin-top: 3%">
                                    Leave
                                </a>
                                <a class="btn btn-primary" href="{{url('/downloadRecaipt')}}" style="margin-top: 3%">
                                    Download Receipt
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
