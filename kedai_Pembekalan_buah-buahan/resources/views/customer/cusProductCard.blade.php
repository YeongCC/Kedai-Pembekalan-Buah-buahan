<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 ">
    @if($product)
    @foreach($product as $key)
    @if($key->Product_Status=="1")
    <div class="col">
        <div class="card shadow-sm">
            <img src="{{ asset('images/product/')}}/{{$key->Product_Picture}}" alt="{{$key->Product_Name}}" width="100%"
                height="200px" preserveAspectRatio="xMidYMid slice" focusable="false" style="object-fit: contain ;" href="{{ route('get-more-products-detail-cus2', ['id' => $key->id]) }}">
            <div class="card-body">
                <strong>
                    <p class="card-title text-uppercase" style=" font-size: 25px;">{{$key->Product_Name}}</p>
                </strong>
                <div class="d-flex justify-content-between align-items-center">
                    <p style="color:green">RM&nbsp;{{$key->Product_Price}}</p>
                    <div class="btn-group">
                        <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route('get-more-products-detail-cus2', ['id' => $key->id]) }}">View</a>
                        <button type="button" class="btn btn-sm btn-outline-secondary detailBtn" data-toggle="modal"
                            data-target="#myModal" data-id="{{ $key->id }}">Add to Cart</button>
                    </div>

                </div>
            </div>

        </div>
    </div>
    @endif
    @endforeach
    @endif
</div>
<div style="float: right;margin-top:10px">
    {{$product->links("pagination::bootstrap-4")}}
</div>


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal"
    aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="container">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float :right">
                    <span aria-hidden="true" style=" font-size: 30px;">&times;</span>
                </button>

                <div class="container">
                    <p style="margin-top:60px;margin-left:5px;font-size: 25px;text-align: center;">Added to cart
                        successfully!</p>
                </div>
                <div class="container">
                    <div style="text-align: center;"><img id="target"
                            style="width: 250px;height:150px;object-fit: contain ;text-align: center;" />

                        <div style="font-size: 20px;" id="Product_Name"></div>
                        <div style="font-size: 20px;color:green" id="Product_Price"></div>

                        <div class="container" style="margin-top:20px;margin-bottom:30px;text-align: center;">
                            <button type="button" class="btn btn-sm btn-outline-secondary" aria-label="Close"
                                data-dismiss="modal">Continue Shop</button>
                        </div>
                        <div class="container" style="margin-top:20px;margin-bottom:30px;text-align: center;">
                        <button type="button" class="btn btn-sm btn-outline-secondary">View Cart</button>
                    </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
<style>
    .close {
        background: #fff;
        opacity: 1;
        border: 0 none !important;
    }
</style>
<script>
    $(document).ready(function() {
      $('.detailBtn').click(function() {
        const id = $(this).attr('data-id');
        console.log(id);
        $.ajax({

          url: 'getProductDetails/'+id,
          type: 'GET',
          data: {
            "id": id
          },
          success:function(data) {
            read(data);

          }
        })
      });
    });

function read(data){
     $('#Product_Name').html(data.Product_Name);
     $('#Product_Price').html("RM "+data.Product_Price);
     $('#Product_Quantity').html(data.Product_Quantity);
     $('#Product_Weight').html(data.Product_Weight);
     $('#Product_Pack').html(data.Product_Pack);
     $('#Product_Brand').html(data.Product_Brand);
     $("#target").attr("src","images/product/" + data.Product_Picture);
}
</script>
