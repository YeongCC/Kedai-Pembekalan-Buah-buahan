@extends('layouts/navBar')
@section('content')

@if(Session::has('success'))
<div class="alert alert-success" style="text-align: center;" role="stylesheet"> ​
    {{ Session::get('success') }}
</div>
@endif
@if(Session::has('clear'))
<div class="alert alert-danger" style="text-align: center;" role="stylesheet"> ​
    {{ Session::get('clear') }}
</div>
@endif
@if(session('cart'))
<div class="container " style="width: 100%;">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col" colspan="2">Product</th>
                            <th scope="col" style="width:15%">Quantity</th>
                            <th scope="col" style="width:10%">Price</th>
                            <th style="width:15%"> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0 ?>

                        @foreach(session('cart') as $id => $details)

                        <?php $total += $details['price'] * $details['quantity'] ?>
                        <tr>
                            <td style="width:15%"><img src="{{ asset('images/product/')}}/{{$details['photo']}}"
                                    width="50px" height="50px" preserveAspectRatio="xMidYMid slice" focusable="false"
                                    style="object-fit: contain ;" /> </td>
                            <td>{{ $details['name'] }}</td>
                            <td>
                                <div class="input-group spinner">


                                    <input type="number" class="quantity" min="0" max="30"
                                        value="{{ $details['quantity'] }}"
                                        style="width:40px;border:none;background-color:none">
                                </div>
                            </td>
                            <td class="text-right">RM&nbsp;{{ $details['price'] }}</td>
                            <td class="text-right">
                                <div class="container">
                                    <div style="float: right">
                                        <button class="btn btn-sm btn-outline-success update-cart"
                                            data-id="{{ $id }}"><i class="fa fa-pencil"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger remove-from-cart"
                                            data-id="{{ $id }}"><i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col" style="margin-top:3%">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <div style="text-align: center;"><a class="btn btn-outline-secondary text-uppercase btn-block"
                            style="font-size:15px;margin-top:2%" href="{{url('/')}}">Continue Shopping</a></div>
                </div>
                <div class="col-sm-12 col-md-6 ">
                    <div style="text-align: center;"><a class="btn btn-outline-secondary text-uppercase btn-block clear"
                            style="font-size:15px;margin-top:2%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Clear
                            Cart&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('addOrderDetailList.order') }}">
        @csrf
        <input type="text" style="display : none;" name="total_price" value="{{ $total }}">
        <div class="col" style="margin-top:3%">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <div class="card" style="height: 500px;border:none">
                        <div class="container" style="float:left;margin-top:5%;">
                            <h5 style="float:left;margin-top:5%;font-size:20px">Attention Note</h5>
                        </div>
                        <div class="container">
                            <p style="float:left;margin-top:3%;font-size:15px">Secondary Phone Number / Message Card&
                                /Special Instruction</p>
                        </div>
                        @if(session('orderdetail'))
                        @foreach(session('orderdetail') as $id => $cus_details)
                        <div class="container">
                            <textarea name="message" style="height: 310px; width:100%;margin-top:3%;" placeholder="Secondary Phone Number / Message Card& / Special Instruction">{{ $cus_details['message'] }}</textarea>
                            <input type="text" style="display : none;" name="order_id"
                                value="{{ $cus_details['order_id'] }}">
                        </div>
                        @endforeach
                        @else
                        <div class="container">
                            <textarea name="message" style="height: 310px; width:100%;margin-top:3%;" >{{ old('message') }}</textarea>
                        </div>
                        @endif

                    </div>
                </div>

                <div class="col-sm-12 col-md-6 ">
                    <div class="card" style="height: 500px;">
                        <div class="container" style="float:left;margin-top:5%;">
                            <h5 style="float:left;margin-top:5%;font-size:20px">SUBTOTAL</h5>
                            <h5 style="float:right;margin-top:5%;font-size:20px">RM {{ $total }}</h5>
                        </div>

                        <div class="container" style="float:left;margin-top:10%;">
                            <label style="margin-right:2%;font-size:15px">Picak a Time : </label><input
                                style="font-size:15px" type="date" name="receive_time" value="">
                            <span id="receive_time" style="color:red;">{{$errors->first('receive_time')}}</span>
                        </div>
                        <div class="container" style="float:left;margin-top:5%;">
                            <button class="btn btn-outline-secondary text-uppercase btn-block" type="submit"
                                style="font-size:15px;float:right;margin-top:10%">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form>


</div>
@else
<div class="container " style="width: 100%;margin-bottom:20%">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col" style="width:15%">Quantity</th>
                            <th scope="col" style="width:10%">Price</th>
                            <th style="width:15%"> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center" colspan="5">
                                <h3>Oops! Your cart is empty</h3>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-5">
            <div class="row">
                <div class="container">
                    <div style="float: right">
                        <a class="btn btn-outline-secondary text-uppercase" href="{{url('/')}}">Go To Shop</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



@endif
@endsection

<style>
    .form-control {
        width: 30px;
    }

    .spinner * {
        text-align: center;
    }

    .spinner input:disabled {
        background-color: white;
    }
</style>
@push('scripts')
<script>
    $(".update-cart").click(function (e) {
           e.preventDefault();
           var ele = $(this);
            $.ajax({
               url: '{{ url('updateFromCart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('removeFromCart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();

                    }
                });
            }
        });

        $(".clear").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('clearAllCart') }}',
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
</script>
@endpush
