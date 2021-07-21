@extends('layouts/navBar')
@section('content')

@foreach($product as $key)

<div class="container">

    <div class="card border-0">
        <div class="row">
            <div class="col-sm-7">
                <div> <img src="{{ asset('images/product/')}}/{{$key->Product_Picture}}" alt="{{$key->Product_Name}}"
                        width="100%" height="400px" preserveAspectRatio="xMidYMid slice" focusable="false"
                        style="object-fit: contain ;">
                </div>
            </div>

            <div class="col-sm-3">
                <h3 class="title text-uppercase">{{$key->Product_Name}}</h3>
                <div class="title">Price : RM<span style="color: green;font-size: 25px;">{{$key->Product_Price}}</span></div>
                <div class="row  mt-5">
                    <div class="input-group spinner">
                        <div class="input-group-prepend">
                          <button class="btn text-monospace minus" type="button">-</button>
                        </div>
                        <input type="number" class="count form-control" min="0" max="10" step="1" value="1">
                        <div class="input-group-append">
                          <button class="btn text-monospace plus" type="button">+</button>
                        </div>
                      </div>
                </div>

                <div class="row mb-5 mt-5 ">
                    <button class="btn btn-lg btn-outline-secondary" type="button">Add To Cart</button>
                </div>
                <hr class="m-0 p-0">

            </div>
        </div>
    </div>
</div>

@endforeach
@endsection

<style>

.spinner * {
  text-align: center;
}
.spinner input::-webkit-outer-spin-button,
.spinner input::-webkit-inner-spin-button {
  margin: 0;
  -webkit-appearance: none;
}
.spinner input:disabled {
  background-color: white;
}

</style>
@push('scripts')
<script>
$(document).ready(function() {
  min = 0; // Minimum of 0
  max = 30; // Maximum of 10
  $('.count').prop('disabled', true);
  $(".minus").on("click", function() {
    if ($('.count').val() > min) {
      $('.count').val(parseInt($('.count').val()) - 1 );
      $('.counter').text(parseInt($('.counter').text()) - 1 );
    }
  });
  $(".plus").on("click", function() {
    if ($('.count').val() < max) {
      $('.count').val(parseInt($('.count').val()) + 1 );
      $('.counter').text(parseInt($('.counter').text()) + 1 );
    }
  });
 });
</script>
@endpush
