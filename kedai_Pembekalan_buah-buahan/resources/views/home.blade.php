@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-body">
                    You are logged in!
                </div>
                <a href="{{url('/insert')}}"> Insert Product</a>
            </div>
        </div>
    </div>
</div>
@endsection
