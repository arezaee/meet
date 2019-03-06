<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '') }}</title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,400i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('css/my.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/persianDatepicker-default.css') }}">
</head>
<body>

<nav class="navbar navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container d-flex align-items-stretch">
        <div class="col-3 d-flex align-items-center">
            <a class="navbar-brand" href="{{ url('/') }}">تقویم<span>جلسه مذهبی</span></a>
        </div>
        <div class="col-9 d-flex align-items-center text-left">
            <ul class="ftco-social mt-2 mr-3">
                <li class="ftco-animate"><a href="#"><span class="icon-linkedin"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-github"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-cloud"></span></a></li>

            @if (Route::has('login'))
                @auth
                <li class="ftco-animate"><a href="{{ url('/home') }}"><span class="icon-home"></span></a></li>
                <li class="ftco-animate"><a href="{{ route('logout') }}"><span class="icon-sign-out"></span></a></li>
                @else
                <li class="ftco-animate"><a href="{{ route('login') }}"><span class="icon-sign-in"></span></a></li>
                @endauth
            @endif

            </ul>

            <button class="navbar-toggler d-flex align-items-center" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="pt-1 mr-1"></span> <span class="oi oi-menu"></span>
            </button>
        </div>



        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                <li class="nav-item"><a href="ministry.html" class="nav-link">Ministries</a></li>
                <li class="nav-item"><a href="sermons.html" class="nav-link">Sermons</a></li>
                <li class="nav-item"><a href="events.html" class="nav-link">Upcoming Events</a></li>
                <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->

    @yield('content')

<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Spring Church</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="#"><span class="icon-linkedin"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-github"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-cloud"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">About</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>Staff</a></li>
                        <li><a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>Beliefs</a></li>
                        <li><a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>History</a></li>
                        <li><a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>Mission</a></li>
                        <li><a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>Wedding &amp; Funerals</a></li>
                        <li><a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>Jobs &amp; Internship</a></li>
                        <li><a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>Fellowships</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Connect</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>Home Groups</a></li>
                        <li><a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>Recovery Groups</a></li>
                        <li><a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>Memberships</a></li>
                        <li><a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>Children &amp; Students</a></li>
                        <li><a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>Volunteer</a></li>
                        <li><a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>Counseling</a></li>
                        <li><a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>Assistance</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Service Hours</h2>
                    <div class="opening-hours">
                        <h4>Services Hours</h4>
                        <p class="pl-3">
                            <span class="mb-3">Saturday Prayer Meeting &mdash; 10:00 am to 11:30 am</span>
                            <span>Sunday Service &mdash; 8:30 am to 11:30 am</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</footer>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<!-- Scripts -->
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>

<script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/jquery.timepicker.min.js') }}"></script>
<script src="{{ asset('js/scrollax.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{ asset('js/google-map.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/persianDatepicker.min.js') }}"></script>

<script>
    @yield('script')
</script>
</body>
</html>
