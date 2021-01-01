<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{ asset('css/reset.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md py-0 my-0">
            <div class="container py-1 my-0">

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @foreach (auth()->user()->roles as $role)
                                        <a class="dropdown-item text-muted text-center border-bottom mb-1" href="{{ route('admin.index') }}">{{ $role->name }}</a>
                                    @endforeach
                                    <a class="dropdown-item" href="{{ route('orders.index') }}">My purchases</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>


    <nav class="navbar navbar-expand-lg navbar-light justify-content-between" style="background: #ffcae2;">

        <div id="navcont" class="navbar navbar-expand-lg navbar-light justify-content-between">
            <a class="navbar-brand" href="{{ route('products.index') }}"><img src="{{ asset('img/Style-nanda.jpg') }}" alt="logo" width="150px" ,
                    height="150px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="		navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <form method="get" action="{{ route('products.index') }}" class="form-inline">
                        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart') }}"><img src="{{ asset('img/cart.png') }}" alt="cart" width="30px" ,
                                height="30px"></a>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset('img/menu.png') }}" alt="menu" width="40px" , height="40px">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"
                            style="background-color: #fbcbe3;">
                            <a class="dropdown-item" href="#" style="color: white;">SALE</a>
                            <a class="dropdown-item" href="#" style="color: white;">3CE BEST</a>
                            <a class="dropdown-item" href="#">Face</a>
                            <a class="dropdown-item" href="#">Eyes</a>
                            <a class="dropdown-item" href="#">Cheeks</a>
                            <a class="dropdown-item" href="#">Lips</a>
                            <a class="dropdown-item" href="#">Nail</a>
                            <a class="dropdown-item" href="#">Tool</a>
                            <a class="dropdown-item" href="#">Kit</a>

                        </div>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>


    <main class="container py-4 mb-5">
        <div class="container"style="width: 90%; margin-left: auto; margin-right: auto;">
            @yield('content')
        </div>
    </main>

    @yield('_cart')

    <footer class="page-footer font-small cyan darken-3 flex-md-column" style="background: #a0838f;">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-9 py-2" style="width: 70%; margin-left: auto; margin-right: auto;">
                    <div class="mb-7 flex-center">
                        <li class="float-left">
                            <h1 style="text-transform: uppercase; font-size: 15px;"> customer service</h1>
                            <p>Call toll - free</p><br>
                            <p>(1)877-708-3574</p><br>
                            <p>MON-FRI (GMT+9H)</p><br>
                            <p>9am - 6pm & 10pm - 7am</p><br>
                            <p>LUNCH (GMT+9H)</p><br>
                            <p>12:30am - 1:30pm & 2am - 3am</p><br>
                            <p>Closed on Sat, Sun & Holidays</p><br>
                        </li>
                        <li>
                            <a href=""> <img src="{{ asset('img/fb.png') }}" alt="fb"></a>
                            <a href=""> <img src="{{ asset('img/inst.png') }}" alt="inst"></a>
                            <a href=""> <img src="{{ asset('img/youtube.png') }}" alt="yt"></a>
                            <a href=""> <img src="{{ asset('img/v.png') }}" alt="v"></a>
                        </li>
                        <li class="float-right">
                            <h1 style="text-transform: uppercase; font-size: 15px;"> notice</h1>
                            <p><a href=""> About Us</a> </p><br>
                            <p><a href=""> Notice </a> </p><br>
                            <p><a href=""> Event </a> </p><br>
                            <p><a href=""> Email</a> </p><br>
                        </li>
                    </div>
                </div>

            </div>

        </div>
        <div class="footer-copyright text-center py-2">
            © 2017 NANDA ALL rights reserved
        </div>

    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>

    <!-- Popper.js для всплывающих подсказок -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

    <!-- Последний скомпилированный и минимизированный Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
