
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 ">
    @foreach($product as $key)
    @if($key->Product_Status=="1")
    <div class="col">
        <div class="card shadow-sm">
            <img src="{{ asset('images/product/')}}/{{$key->Product_Picture}}"
                alt="{{$key->Product_Name}}" width="100%" height="225"
                preserveAspectRatio="xMidYMid slice" focusable="false" style="object-fit: contain ;">
            <div class="card-body">
                <p class="card-title">{{$key->Product_Name}}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target=".bd-example-modal-lg">View</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Order</button>
                    </div>
                    <small class="text-muted">RM&nbsp;{{$key->Product_Price}}</small>
                </div>
            </div>

        </div>
    </div>
  @endif
    @endforeach
</div>
<div style="float: right;margin-top:10px">
    {{$product->links("pagination::bootstrap-4")}}
</div>


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
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


