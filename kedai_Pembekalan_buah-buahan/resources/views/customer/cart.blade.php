@extends('layouts/navBar')
@section('content')

@if(Session::has('success'))
<div class="alert alert-success" style="text-align: center;" role="stylesheet"> ​
    {{ Session::get('success') }}
</div>
@endif

@if(session('cart'))
<div class="container " style="width: 100%;margin-bottom:12%">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col"colspan="2">Product</th>
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
                            <td><img src="{{ asset('images/product/')}}/{{$details['photo']}}" width="50px"
                                    height="50px" preserveAspectRatio="xMidYMid slice" focusable="false"
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

                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong>RM ${{ $total }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col ">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <div style="float: right"><a class="btn btn-outline-secondary text-uppercase btn-block" href="{{url('/')}}">Continue Shopping</a></div>
                </div>
                <div class="col-sm-12 col-md-6 " >
                    <div style="float: right"><a class="btn btn-outline-secondary text-uppercase btn-block" href="{{url('/confirmCart')}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Checkout&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></div>

                </div>
            </div>
        </div>

    </div>
</div>
@else
<div class="container " style="width: 100%;margin-bottom:12%">
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
</script>
@endpush
