@extends('layouts/navBar')
@section('content')
@push('scripts')
<script type="text/javascript">
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

      $.ajax({
        type: "GET",
        data: {
          'search_query':search,
        },
        url: "{{route('get-more-products-cus')}}" + "?page=" + page,
        success:function(data) {
          $('#productCard').html(data);
        }
      });
    }

</script>
@endpush

{{-- search --}}
<div class="py-5 text-center container"
    style=" background-image: url('{{asset('images/background/1.jpg')}}');background-size: cover;">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div id="custom-search-input">
                            <div class="input-group">
                                <input type="text" class="search-query form-control" placeholder="Search" id="search" />
                                <span class="input-group-btn">
                                    <button type="button" disabled>
                                        <span class="fa fa-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ============= COMPONENT END// ============== -->

<div class="album py-5 ">
    <div class="container">
        <div id="productCard">
            @include('customer/cusProductCard')
        </div>
    </div>
</div>

@endsection

