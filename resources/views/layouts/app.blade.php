<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Discover Algeria</title>

    <base href="{{ URL::asset('/') }}" target="_top">
     <!-- Favicon icon -->
     <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('logo/logo.png') }}" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arizonia&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/checkout.css">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/place/style.css">
    <script src="js/sweetalert.min.js"></script>


    <!-- Scripts -->
   

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light scrolled awake sleep border-bottom border-dark"
        id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="/">Discover Algeria<span>Travel Agency</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="{{url('/')}}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{url('/destination')}}" class="nav-link">Destination</a></li>
                    <li class="nav-item"><a href="{{ url('/tours') }}" class="nav-link">Tours</a></li>
                    @guest




                        @if (Route::has('login'))
                            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">login</a></li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link mdi mdi-account me-1 ms-1" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="false" aria-expanded="false" v-pre>

                                <img src="storage/{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}"
                                    class="rounded-circle" width="31" />
                            </a>



                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">


                                @if (Auth::user()->isAdmin == 1 || Auth::user()->isSuperAdmin == 1)
                                    <a class="dropdown-item" href="{{ url('dashboard') }}" style="color:rgb(0, 0, 0);">

                                        {{ __('Dashboard') }}
                                    </a>
                                @endif

                                <a class="dropdown-item" href="{{ url('user/profile') }}" style="color:rgb(0, 0, 0);">

                                    {{ __('My Profile') }}
                                </a>
                                <a class="dropdown-item" href="{{ url('requests/'. Auth::user()->id) }}" style="color:rgb(0, 0, 0);">

                                    {{ __('My Requests') }}
                                </a>

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




                    @endguest



                    <!-- Settings Dropdown -->

            </div>
            </ul>
        </div>
        </div>
    </nav>
    <!-- END nav -->

    <br><br><br><br><br>

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
    <br><br><br>
    <footer class="ftco-footer bg-bottom ftco-no-pt" style="background-image: url(images/bg_3.jpg);">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md pt-5">
                    <div class="ftco-footer-widget pt-md-5 mb-4">
                        <h2 class="ftco-heading-2">About</h2>
                        <p>Discover Algeria is a premier travel agency that specializes in curating exceptional journeys throughout Algeria</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft">
                            <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md pt-5 border-left">
                    <div class="ftco-footer-widget pt-md-5 mb-4">
                        <h2 class="ftco-heading-2">Useful Links</h2>
                        <ul class="list-unstyled">
                            <li><a href="{{ url('/') }}" class="py-2 d-block">Home</a></li>
                            <li><a href="{{ url('destination') }}" class="py-2 d-block">Destination</a></li>
                            <li><a href="{{ url('tours') }}" class="py-2 d-block">Tours</a></li>
                            <li><a href="{{ url('user/profile') }}" class="py-2 d-block">My Profile</a></li>


                        </ul>
                    </div>
                </div>
                <div class="col-md pt-5 border-left">
                    <div class="ftco-footer-widget pt-md-5 mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon fa fa-map-marker"></span><span class="text">UFAS Setif ,
                                        ALGERIA</span></li>
                                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+213
                                            0554278963</span></a></li>
                                <li><a href="#"><span class="icon fa fa-paper-plane"></span><span
                                            class="text">info@discoveralgeria.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="js/main.js"></script>

    </div>

    @stack('modals')

    @livewireScripts
  

</body>

</html>
