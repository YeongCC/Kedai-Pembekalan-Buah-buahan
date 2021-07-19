<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="htmlcss bootstrap menu, fixed, after scrolling page, navbar, menu CSS examples" />
    <meta name="description" content="Bootstrap 5 fixed navbar on scroll page examples, Bootstrap 5" />

    <title>Kedai Pembekalan Buah-Buahan</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icon/fruits.png')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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
            <a class="navbar-brand" href="#" style=" font-size: 20px;">
                <h5>SCA TRADING</h5>
            </a>
            <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link social-icon" href="#"> <i class="fa fa-cart-plus"
                                style="font-size:36px"></i>
                            <div class="tooltip">Cart</div>
                        </a></li>
                    <li class="nav-item"><a class="nav-link social-icon-1" href="#"><i class="fas fa-receipt"
                                style="font-size:36px"></i>
                            <div class="tooltip-1">Check&nbsp;Receipt</div>
                        </a></li>

                </ul>
            </div> <!-- navbar-collapse.// -->
        </div> <!-- container-fluid.// -->
    </nav>

    {{-- search --}}
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div id="custom-search-input">
                                <div class="input-group">
                                    <input type="text" class="search-query form-control" placeholder="Search"
                                        id="search" />
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
    </section>

    <!-- ============= COMPONENT END// ============== -->
    <div class="album py-5 ">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($product as $product)
                @if($product->Fruit_Status=="1")
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="{{ asset('images/product/')}}/{{$product->Fruit_Picture}}"
                            alt="{{$product->Fruit_Name}}" width="100%" height="225"
                            preserveAspectRatio="xMidYMid slice" focusable="false" style="object-fit: contain ;">
                        <div class="card-body">
                            <p class="card-title">{{$product->Fruit_Name}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Order</button>
                                </div>
                                <small class="text-muted">RM&nbsp;{{$product->Fruit_Price}}</small>
                            </div>
                        </div>

                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>

    <footer class="text-muted py-5">
        <div class="container">
            <p class="mb-0 border">
                <h5>Location</h5>
            </p>
            <p class="mb-0">SCA TRADING </p>
            <p class="mb-0">No. 6, Jlan Indah 5/2, Taman Bukit Indah, 81200 Johor Bahru</p>
        </div>
    </footer>
</body>

</html>
