<div class="container " style="width: 100%;margin-top:3%">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table bg-white">
                    <thead>
                        <tr>
                            <th scope="col" style="width:10%"> </th>
                            <th scope="col" style="width:30%">User Name</th>
                            <th scope="col" style="width:30%">User Email</th>
                            <th style="width:15%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($user as $key)
                        @if($key->position=="2")
                        <tr>
                            <td  >
                                {{$i++}}
                            </td>
                            <td colspan="">
                                {{$key->name}}
                            </td>
                            <td >
                                {{$key->email}}
                            </td>
                            <td >
                                <a type="button" class="btn btn-sm btn-outline-success " style="float: left;"
                                href="{{ route('showEditUser', ['id' => $key->id]) }}">&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;</a>
                            <a type="button" class="btn btn-sm btn-outline-danger " style="float: right;"
                                href="{{ route('deleteUser.create', ['id' => $key->id]) }}"
                                onclick="return confirm('Are You Sure Want To Delete? Cannot Be Restore')">Delete</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-5">
            <div class="row">
                <div class="container">
                    <div style="float: right">
                        {{$user->links("pagination::bootstrap-4")}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
