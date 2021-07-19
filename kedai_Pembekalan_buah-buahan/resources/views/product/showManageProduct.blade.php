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
            <div class="col col-xs-3">Product Detail</div>
            <div class="col col-xs-3 text-right"><a href="{{route('home')}}">Back</a></div>
        </div>
    </div>

    @include('product.assests.search')
    <div id="productCard">
        @include('product.assests.productCard')
    </div>

</div>
@push('scripts')
<script>
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function(event) {
          event.preventDefault();
          var page = $(this).attr('href').split('page=')[1];
          getMoreFruits(page);
        });

        $('#search').on('keyup', function() {
          $value = $(this).val();
          getMoreFruits(1);
        });
    });


    function getMoreFruits(page) {

      var search = $('#search').val();

      $.ajax({
        type: "GET",
        data: {
          'search_query':search,
        },
        url: "{{route('get-more-fruits')}}" + "?page=" + page,
        success:function(data) {
          $('#productCard').html(data);
        }
      });
    }
</script>
@endpush

@endsection
