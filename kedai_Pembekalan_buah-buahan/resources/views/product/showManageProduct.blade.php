@extends('layouts.app')
@section('content')
@if(Session::has('update'))
<div class="alert alert-success" style="  text-align: center;" role="stylesheet"> ​
    {{ Session::get('update') }}
</div> ​
@endif
@if(Session::has('delete'))
<div class="alert alert-danger" style="  text-align: center;" role="stylesheet"> ​
    {{ Session::get('delete') }}
</div> ​
@endif
<div class="container">
    <div class="card-header bg-white">
        <div class="row bg-white ">
            <div class="col col-xs-3">Products Details</div>
            <div class="col col-xs-3 text-right"><a href="{{route('home')}}">Back</a></div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-6 col-md-8 mx-auto">
            <div class="row">
                <div class="col-12">
                    <div class="input-group d-flex justify-content-between align-items-center">
                        <input type="text" class="form-control" aria-label="Small"
                            aria-describedby="inputGroup-sizing-sm" placeholder="Search"
                            style="height: 35px;width:20px;" id="search" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="productCard" style="margin-top:30px">
        @include('product/assests/productCard')
    </div>

</div>
@push('scripts')
<script>
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function(event) {
          event.preventDefault();
          var page = $(this).attr('href').split('page=')[1];
          getMoreProducts(page);
        });

        $('#search').on('keyup', function() {
          $value = $(this).val();
          getMoreProducts(1);
        });
    });


    function getMoreProducts(page) {
    var search = $('#search').val();
    var searchUpperCase=search.toUpperCase();
      $.ajax({
        type: "GET",
        data: {
          'search_query':searchUpperCase,
        },
        url: "{{route('get-more-products')}}" + "?page=" + page,
        success:function(data) {
          $('#productCard').html(data);
        }
      });
    }
</script>
@endpush

@endsection
