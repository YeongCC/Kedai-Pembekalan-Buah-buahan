@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="row bg-white ">
                        <div class="col col-xs-6">Receipt</div>
                        <div class="col col-xs-6 text-right"><a href="{{route('viewOrder')}}">Back</a></div>
                    </div>
                </div>
                <div class="card-body">

                    @foreach($order as $key)
                    <?php
                        $Customer_order_id=$key->id;
                        $Customer_Status=$key->Customer_Status;
                    ?>
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label text-md-left" style="font-size: 30px">Customer Name : <a
                                style="color:green">{{$key->Customer_Name}}</a></label>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label text-md-left" style="font-size: 30px">Order Id : <a
                                style="color:green">{{$Customer_order_id}}</a></label>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label text-md-left" style="font-size: 30px">Phone Number : <a
                                style="color:green">{{$key->Customer_Phone}}</a></label>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label text-md-left" style="font-size: 30px">Adress : <a
                                style="color:green">{{$key->Customer_Address}}</a></label>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label text-md-left" style="font-size: 30px">Receive Day : <a
                                style="color:green">{{$key->Customer_Receive_Day}}</a></label>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label text-md-left" style="font-size: 30px">Total Price : <a
                                style="color:green">RM {{$key->Customer_Total_Price}}</a></label>
                    </div>
                    @if($key->Customer_Messages!="")
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label text-md-left" style="font-size: 30px">Messages : <a
                                style="color:green">{{$key->Customer_Messages}}</a></label>
                    </div>
                    @endif
                    @endforeach
                    <hr>
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label text-md-left" style="font-size: 30px">Product</label>
                    </div>
                    <hr>
                    @foreach($order_detail as $key2)
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label text-md-left">Product : <a
                                style="color:green">{{$key2->Order_Product}}</a></label>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label text-md-left">Quantity : <a
                                style="color:green">{{$key2->Order_Quantity}}</a></label>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label text-md-left">Price : <a style="color:green">RM
                                {{$key2->Order_Price}}</a></label>
                    </div>
                    <hr>
                    @endforeach

                    <div class="form-group row">
                        @if($Customer_Status==1)
                        <label class="col-md-4 col-form-label text-md-left" style="font-size: 30px">Status : <a type="button" class="btn btn-sm btn-primary" style="font-size: 30px"
                            href="{{ route('doneOrder.check', ['Customer_order_id' => $Customer_order_id , 'Customer_Status' => $Customer_Status]) }}">Done</a></label>
                        @else
                        <label class="col-md-12 col-form-label text-md-left" style="font-size: 30px">Status : <a style="color:green">Done</label>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
