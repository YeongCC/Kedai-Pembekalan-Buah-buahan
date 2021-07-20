<main role="main" class="container">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        @php($i=1)
        @foreach($user as $key)
        @if($key->position=="2")

        <div class="media text-muted pt-3">
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom ">
                <div class="d-flex justify-content-between align-items-center w-100">

                    <div style="float: left;"> <strong style="font-size: 20px;color:black">{{$i++}} )
                            {{$key->name}}</strong></div>
                    <div style="float: right"><a type="button" class="btn btn-sm btn-outline-success " style="float: right;"
                            href="{{ route('showEditUser', ['id' => $key->id]) }}">&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;</a>
                        <a type="button" class="btn btn-sm btn-outline-danger " style="float: right;"
                            href="{{ route('deleteUser.create', ['id' => $key->id]) }}"
                            onclick="return confirm('Are You Sure Want To Delete? Cannot Be Restore')">Delete</a></td>
                    </div>
                </div>
                <span class="d-block" style="font-size: 15px;color:black">{{$key->email}}</span>
            </div>

        </div>
        @endif
        @endforeach
        <small class="d-block text-right mt-3"  style="float: right">
                {{$user->links("pagination::bootstrap-4")}}
        </small>
    </div>
</main>
