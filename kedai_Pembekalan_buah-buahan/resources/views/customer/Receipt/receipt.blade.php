<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    td {
        text-align: center;
    }
</style>
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

<div class="container" style="margin-top:3%;margin-bottom:3%">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <p style="font-size: 25px">SCA TRADING</p>
                <div class="card-header bg-white">
                    <div class="row bg-white ">
                        <div class="col-sm-12  col-md-6" style="font-size: 25px">
                            Order&nbsp;Id&nbsp;:&nbsp;{{ $cus_details_product_order_id }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Order&nbsp;Date&nbsp;:&nbsp;{{ $cus_details_order_time }}
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <br>

                    <div class="form-group row">
                        <label class="col-md-12 col-form-label text-md-left" style="font-size: 20px">Customer Name :
                            <a style="color:green">{{ $cus_details_name }}</a></label>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label text-md-left" style="font-size: 20px">Phone Number :
                            <a style="color:green">{{ $cus_details_phone }}</a></label>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label text-md-left" style="font-size: 20px">Address :
                            <a style="color:green">{{ $cus_details_address }}</a></label>
                    </div>
                    <br>
                    @if($cus_details_message!="")
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label text-md-left" style="font-size: 20px">Messages : <a
                                style="color:green">{{$cus_details_message}}</a></label>
                    </div>
                    <br>
                    @endif

                    <div class="form-group row">
                        <label class="col-md-12 col-form-label text-md-left" style="font-size: 20px">Receive Day :
                            <a style="color:green">{{ $cus_details_receive_time }}</a></label>
                    </div>
                    <br>
                    <hr>
                    <br>

                    <table class="table" width="100%" style="border-collapse: collapse; border: 0px;">
                        <thead>
                            <tr>
                                <th style="float: left">No</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
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
                    <br>
                    <hr>
                    <br>
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label text-md-left"
                            style="font-size: 25px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total&nbsp;Price&nbsp;:&nbsp;<a
                                style="color:green">{{ $cus_details_total_price }}</a></label>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label text-md-left" style="font-size: 20px"> Hotline:
                            07-2343143 | Whatsapp: <a
                                href="https://api.whatsapp.com/send/?phone=60127370802&text&app_absent=0"
                                style="text-decoration: none; color: black;">&nbsp;012-7370802</a></label>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
