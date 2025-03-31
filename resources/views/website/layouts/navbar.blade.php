<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>SPA Center - Beauty & Spa HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset('img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container-fluid bg-light d-none d-lg-block">
        <div class="row py-2 px-lg-5">
            <div class="col-lg-6 text-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <small><i class="fa fa-phone-alt mr-2"></i>+012 345 6789</small>
                    <small class="px-3">|</small>
                    <small><i class="fa fa-envelope mr-2"></i>info@example.com</small>
                </div>
            </div>
            <div class="col-lg-6 text-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-primary px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-primary px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-primary px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-primary px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-primary pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            <a href="index.html" class="navbar-brand ml-lg-3">
                <h1 class="m-0 text-primary"><span class="text-dark">SPA</span> Center</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav m-auto py-0 d-flex align-items-center">
                    <a href="/" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                    <a href="/about" class="nav-item nav-link {{ request()->is('about') ? 'active' : '' }}">About</a>
                    <a href="/Services" class="nav-item nav-link {{ request()->is('Services') ? 'active' : '' }}">Services</a>
                    <a href="/Shopping" class="nav-item nav-link {{ request()->is('Shopping') ? 'active' : '' }}">Shopping</a>
                    <a href="/Pricing" class="nav-item nav-link {{ request()->is('Pricing') ? 'active' : '' }}">Pricing</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="/Appointment" class="dropdown-item">Appointment</a>
                            <a href="/Open_hours" class="dropdown-item">Open Hours</a>
                            <a href="/Our_team" class="dropdown-item">Our Team</a>
                            <a href="/Testimonial" class="dropdown-item">Testimonial</a>
                        </div>
                    </div>

                    <a href="/Contact" class="nav-item nav-link {{ request()->is('Contact') ? 'active' : '' }}">Contact</a>

                    @if (Route::has('login'))
                        @auth
                            <form id="logout-form" method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <a href="#" class="nav-item nav-link text-danger me-2" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fs-6"></i> Log Out
                                </a>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="nav-item nav-link me-2">
                                <i class="fas fa-sign-in-alt fs-6"></i> Login
                            </a>
                            <a href="{{ route('register') }}" class="nav-item nav-link me-2">
                                <i class="fas fa-user-plus fs-6"></i> Register
                            </a>
                        @endauth
                    @endif

                    <a href="/Cart" class="nav-item nav-link">
                        <i class="fas fa-shopping-cart fs-6" style="height: 40px"></i>
                    </a>
                </div>


                </div>

            </div>


            </div>
        </nav>

