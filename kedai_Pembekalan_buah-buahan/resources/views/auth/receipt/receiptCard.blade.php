<div class="container " style="width: 100%;margin-top:3%">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table bg-white">
                    <thead>
                        <tr>
                            <th scope="col" style="width:10%"> </th>
                            <th scope="col" style="width:40%">Customer</th>
                            <th scope="col" style="width:35%">Order Id</th>
                            <th style="width:15%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($order as $key)
                        <tr>
                            <td  >
                                {{$i++}}
                            </td>
                            <td colspan="">
                                {{$key->Customer_Name}}
                            </td>
                            <td >
                                {{$key->Customer_order_id}}
                            </td>
                            <td >
                                <a type="button" class="btn btn-sm btn-warning " style="float: left;"
                                href="{{ route('checkOrderDetails', ['Customer_order_id' => $key->Customer_order_id]) }}">Check</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-5">
            <div class="row">
                <div class="container">
                    <div style="float: right">
                        {{$order->links("pagination::bootstrap-4")}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
