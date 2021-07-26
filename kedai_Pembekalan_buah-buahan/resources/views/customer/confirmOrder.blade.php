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
    <script src="{{ asset('js/image.js') }}" ></script>
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
<div class="container" style="margin-top:10%">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="row bg-white ">
                        <div class="container">
                            <div style="float: left">Fill Up Your Detail</div>
                            <div style="float: right"><a href="{{url('/cart')}}">Cancel</a></div>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('confirmDetail.confirm') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="Customer_Name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="Customer_Name" type="text" class="form-control" name="Customer_Name">
                                <span id="Customer_Name" style="color:red;">{{$errors->first('Customer_Name')}}</span>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="Customer_Address" class="col-md-4 col-form-label text-md-right">Adress</label>

                            <div class="col-md-6">
                                <input id="Customer_Address" type="text" class="form-control " name="Customer_Address">
                                <span id="Customer_Address" style="color:red;">{{$errors->first('Customer_Address')}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Customer_Phone" class="col-md-4 col-form-label text-md-right">Phone Number</label>

                            <div class="col-md-6">
                                <input id="Customer_Phone" type="text" class="form-control " name="Customer_Phone">
                                <span id="Customer_Phone" style="color:red;">{{$errors->first('Customer_Phone')}}</span>
                            </div>
                        </div>

                        @foreach(session('orderdetail') as $id => $cus_details)
                        <input type="text" style="display: none;" name="Customer_order_id" value="{{ $cus_details['order_id'] }}">
                        <input type="text" style="display: none;" name="Customer_Receive_Day" value="{{ $cus_details['receive_time'] }}">
                        <input type="text" style="display: none;" name="Customer_Messages" value="{{ $cus_details['message'] }}">
                        <input type="text" style="display: none;" name="Customer_Total_Price" value=" {{ $cus_details['total_price'] }}">
                        <input type="text" style="display: none;" name="Order_id" value="{{ $cus_details['order_id'] }}">
                        @endforeach
                        @foreach(session('cart') as $id => $details)
                        <input type="text" style="display: none;" name="Order_Product[]" value="{{ $details['name'] }}">
                        <input type="text" style="display: none;" name="Order_Quantity[]" value="{{ $details['quantity'] }}">
                        <input type="text" style="display: none;" name="Order_Price[]" value="{{ $details['price'] }}">
                        @endforeach

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

</body>

</html>
