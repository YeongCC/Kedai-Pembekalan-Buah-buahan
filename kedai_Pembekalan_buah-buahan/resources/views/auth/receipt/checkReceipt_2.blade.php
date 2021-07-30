@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card-header bg-white">
        <div class="row bg-white ">
            <div class="col col-xs-3">Done Orders</div>
            <div class="col col-xs-3 text-right"><a href="{{route('home')}}">Back</a></div>
        </div>
    </div>

    <div class="row mt-3">
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

    <div id="receiptDoneCard">
        @include('auth/receipt/receiptCard_2')
    </div>

</div>
@push('scripts')
<script>
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function(event) {
          event.preventDefault();
          var page = $(this).attr('href').split('page=')[1];
          getMoreDoneOrders(page);
        });

        $('#search').on('keyup', function() {
          $value = $(this).val();
          getMoreDoneOrders(1);
        });
    });


    function getMoreDoneOrders(page) {

      var search = $('#search').val();
      var searchUpperCase=search.toUpperCase();
      $.ajax({
        type: "GET",
        data: {
          'search_query':searchUpperCase,
        },
        url: "{{route('get-more-done-orders')}}" + "?page=" + page,
        success:function(data) {
          $('#receiptDoneCard').html(data);
        }
      });
    }
</script>
@endpush

@endsection
