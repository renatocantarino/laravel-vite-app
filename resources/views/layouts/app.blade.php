<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    
     <!-- Fonts locais -->
    <link href="{{ asset('assets/fonts/sb-bistro/sb-bistro.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/fonts/font-awesome/font-awesome.css') }}"  rel="stylesheet" type="text/css">

    <link href="{{ asset('css/vendor.css') }}" rel="stylesheet">
    
    <!-- Scripts -->    
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <div class="page-header">
            <!--=============== Navbar ===============-->
            <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-transparent" id="page-navigation">
                <div class="container">
                    <!-- Navbar Brand -->
                    <a href="{{ url('/') }}" class="navbar-brand">
                        <img src="{{asset('assets/img/logo/logo.png')}}" alt="">
                    </a>

                    <!-- Toggle Button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarcollapse">
                        <!-- Navbar Menu -->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="{{route('home')}}" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">                                    
                                 <a href="{{route('products.shop')}}" class="nav-link">Shop</a>
                            </li>
                            

                    @guest
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{route('register')}}" class="nav-link">Register</a>
                            </li>
                            @endif
                             @if (Route::has('login'))
                                <li class="nav-item">
                                <a href="{{route('login')}}" class="nav-link">login</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                                  
                                        {{ $userName }}

                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="transaction.html">Transactions History</a>
                                    <a class="dropdown-item" href="setting.html">Settings</a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                         {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                          <li class="nav-item">
                                    <a href="{{ route('cart.view') }}" class="nav-link">
                                        <span class="position-relative">
                                            <i class="fa fa-shopping-basket"></i>

                                            @if($countCartItems > 0)
                                                <span class="badge badge-danger position-absolute cart-badge" 
                                                    style="top: -8px; right: -10px;">
                                                    {{ $countCartItems }}
                                                </span>
                                            @endif

                                        </span>
                                    </a>
                          </li>
                            @endguest
                        </ul>
                    </div>

                </div>
            </nav>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h5>About</h5>
                        <p>Nisi esse dolor irure dolor eiusmod ex deserunt proident cillum eu qui enim occaecat sunt aliqua anim eiusmod qui ut voluptate.</p>
                    </div>
                    <div class="col-md-3">
                        <h5>Links</h5>
                        <ul>
                            <li>
                                <a href="about.html">About</a>
                            </li>
                            <li>
                                <a href="contact.html">Contact Us</a>
                            </li>
                            <li>
                                <a href="faq.html">FAQ</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">How it Works</a>
                            </li>
                            <li>
                                <a href="terms.html">Terms</a>
                            </li>
                            <li>
                                <a href="privacy.html">Privacy Policy</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5>Contact</h5>
                        <ul>
                            <li>
                                <a href="tel:+620892738334"><i class="fa fa-phone"></i> 08272367238</a>
                            </li>
                            <li>
                                <a href="mailto:hello@domain.com"><i class="fa fa-envelope"></i> hello@domain.com</a>
                            </li>
                        </ul>

                        <h5>Follow Us</h5>
                        <ul class="social">
                            <li>
                                <a href="javascript:void(0)" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" target="_blank"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" target="_blank"><i class="fab fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5>Get Our App</h5>
                        <ul class="mb-0">
                            <li class="download-app">
                                <a href="#"><img src="{{asset('assets/img/playstore.png')}}"></a>
                            </li>
                            <li style="height: 200px">
                                <div class="mockup">
                                    <img src="{{asset('assets/img/mockup.png')}}">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <p class="copyright">&copy; 2018 Freshcery | Groceries Organic Store. All rights reserved.</p>
        </footer>  
   
        <script src="{{ asset('js/vendor.js') }}"></script>
   
</body>
</html>
