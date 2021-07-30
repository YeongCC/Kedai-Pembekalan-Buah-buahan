@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">
                    @foreach($order as $key)
                    <?php
                    $Customer_order_id=$key->id;
                    $Customer_Status=$key->Customer_Status;
                ?>

                    <div class="row bg-white ">
                        <div class="col col-xs-6" style="font-size: 25px">Receipt</div>
                        @if($Customer_Status==1)
                        <div class="col col-xs-6 text-right"><a href="{{route('viewOrder')}}">Back</a></div>
                        @else
                        <div class="col col-xs-6 text-right"><a href="{{route('viewDoneOrder')}}">Back</a></div>
                        @endif
                    </div>
                </div>

                <div class="card-body">


                        <div class="row bg-white ">
                            <div class="col-sm-12  col-md-6" style="font-size: 25px">Order Id : <a
                                style="color:green">{{ $key->Customer_order_id }}</a></div>
                            <div class="col-sm-12  col-md-6" style="font-size: 25px">Order Date : <a
                                style="color:green">{{ $key->Customer_Order_Day }}</a></div>
                        </div>

                    <div class="form-group row" style="margin-top: 3%">
                        <label class="col-md-12 col-form-label text-md-left" style="font-size: 25px">Customer Name : <a
                                style="color:green">{{$key->Customer_Name}}</a></label>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label text-md-left" style="font-size: 25px">Phone Number : <a
                                style="color:green">{{$key->Customer_Phone}}</a></label>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label text-md-left" style="font-size: 25px">Address : <a
                                style="color:green">{{$key->Customer_Address}}</a></label>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label text-md-left" style="font-size: 25px">Receive Day : <a
                                style="color:green">{{$key->Customer_Receive_Day}}</a></label>
                    </div>
                    <?php
                        $total_price=$key->Customer_Total_Price;
                        $i=1;
                    ?>
                    @if($key->Customer_Messages!="")
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label text-md-left" style="font-size: 30px">Messages : <a
                                style="color:green">{{$key->Customer_Messages}}</a></label>
                    </div>
                    @endif
                    @endforeach
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
                                            @foreach($order_detail as $key2)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$key2->Order_Product}}</td>
                                                <td>{{$key2->Order_Quantity}}</td>
                                                <td>RM {{$key2->Order_Price}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                        <label class="col-md-12 col-form-label text-md-left" style="font-size: 25px">Total Price : <a
                                style="color:green">RM {{$total_price}}</a></label>
                    </div>




                    <div class="form-group row">
                        @if($Customer_Status==1)
                        <label class="col-md-4 col-form-label text-md-left" style="font-size: 30px">Status : <a
                                type="button" class="btn btn-sm btn-primary" style="font-size: 30px"
                                href="{{ route('doneOrder.check', ['Customer_order_id' => $Customer_order_id , 'Customer_Status' => $Customer_Status]) }}">Done</a></label>
                        @else
                        <label class="col-md-12 col-form-label text-md-left" style="font-size: 30px">Status : <a
                                style="color:green">Done</label>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
