<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kedai Pembekalan Buah-Buahan</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icon/fruits.png')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src='{{ asset('js/font.js') }}'></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
    </script>
    <link href="{{ asset('css/icon.css') }}" rel="stylesheet">
    <link href="{{ asset('css/search.css') }}" rel="stylesheet">
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function(){

		window.addEventListener('scroll', function() {

			if (window.scrollY > 50) {
				document.getElementById('navbar_top').classList.add('fixed-top');
				// add padding top to show content behind navbar
				navbar_height = document.querySelector('.navbar').offsetHeight;
				document.body.style.paddingTop = navbar_height + 'px';
			} else {
			 	document.getElementById('navbar_top').classList.remove('fixed-top');
				 // remove padding top from body
				document.body.style.paddingTop = '0';
			}
		});
	});

    $("a").click(function () {
     $(".session").visibility(2);
     });
    </script>
</head>

<body>

    <div class="py-3">
        <div class="container ">
            <div class="d-flex justify-content-center">
                <p style=" font-size: 13px;"> <i class="fa fa-phone" style="font-size:13px;color:black"></i> Hotline:
                    07-2343143 | Whatsapp: <a href="https://api.whatsapp.com/send/?phone=60127370802&text&app_absent=0"
                        style="text-decoration: none; color: black;">&nbsp;012-7370802</a></p>
            </div>
        </div>
    </div>

    <!-- ============= COMPONENT ============== -->
    <nav id="navbar_top" class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}" style=" font-size: 20px;">
                <h5>SCA TRADING</h5>
            </a>
            <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">

                <ul class="navbar-nav ms-auto">
                    @if(session('cart'))
                    <li class="nav-item">
                        <a class="nav-link social-icon" href="{{url('/cart')}}"> <i class="fa fa-cart-plus"
                                style="font-size:25px"></i>
                            <p>{{ count(session('cart')) }}</p>
                            <div class="tooltip">Cart</div>
                        </a></li>
                        <li class="nav-item">
                            <a class="nav-link social-icon-1" href="{{url('/checkReceipt')}}">
                                <i class="fas fa-receipt" style="font-size:25px"></i>
                                <p>&nbsp;</p>
                                <div class="tooltip-1">Check&nbsp;Receipt</div>
                            </a></li>
                    @else
                    <li class="nav-item">
                    <a class="nav-link social-icon" href="{{url('/cart')}}">
                        <i class="fa fa-cart-plus" style="font-size:36px"></i>
                        <div class="tooltip">Cart</div>
                    </a></li>
                    <li class="nav-item">
                        <a class="nav-link social-icon-1" href="{{url('/checkReceipt')}}">
                            <i class="fas fa-receipt" style="font-size:36px"></i>
                            <div class="tooltip-1">Check&nbsp;Receipt</div>
                        </a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>
    @stack('scripts')
</body>
@include('layouts/footer')

</html>

<style>
    .session {
        visibility: hidden;
    }
</style>
