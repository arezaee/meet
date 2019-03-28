<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '') }}</title>


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

    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/persianDatepicker-default.css') }}">
</head>
<body>

<a name="top"></a>
<nav class="navbar navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container d-flex align-items-stretch">
        <div class="col-3 d-flex align-items-center">
            <a class="navbar-brand" href="{{ route('index').'#top' }}">تقویم<span>جلسه مذهبی</span></a>
        </div>
        <div class="col-9 d-flex">
            <ul class="ftco-social mt-2 mr-3">
                <li class="ftco-animate"><a href="https://www.linkedin.com/in/a-rezaee/"><span class="icon-linkedin"></span></a></li>
                <li class="ftco-animate"><a href="https://github.com/arezaee/meet"><span class="icon-github"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-payment"></span></a></li>

                @auth
                <li class="ftco-animate"><a href="{{ route('logout') }}"><span class="icon-sign-out"></span></a></li>
                @else
                <li class="ftco-animate"><a href="{{ route('login') }}"><span class="icon-sign-in"></span></a></li>
                @endauth

            </ul>

            <button class="navbar-toggler d-flex align-items-center" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="pt-1 mr-1"></span> <span class="oi oi-menu"></span>
            </button>
        </div>



        <div class="collapse navbar-collapse text-left" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                @auth
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link pt-0">صفحه شخصی</a></li>
                @endauth
                <li class="nav-item"><a href="{{ route('index') }}#top" class="nav-link pt-0">صفحه اصلی</a></li>
                <li class="nav-item"><a href="{{ route('index') }}#verse" class="nav-link pt-0">کلام نورانی</a></li>
                <li class="nav-item"><a href="{{ route('index') }}#meets" class="nav-link pt-0">جلسه ها</a></li>
                <li class="nav-item"><a href="{{ route('index') }}#help" class="nav-link pt-0">راهنما</a></li>
                <li class="nav-item"><a href="{{ route('index') }}#about" class="nav-link pt-0">درباره</a></li>
                <li class="nav-item"><a href="{{ route('index') }}#contact" class="nav-link pt-0">تماس</a></li>
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
                    <h2 class="ftco-heading-2">تقویم جلسه مذهبی</h2>
                    <p>هزینه این تقویم یک صلوات با نیت سلامتی و تعجیل در امر فرج مولایمان حضرت صاحب الزمان است. </p>

                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="https://www.linkedin.com/in/a-rezaee/"><span class="icon-linkedin"></span></a></li>
                        <li class="ftco-animate"><a href="https://github.com/arezaee/meet"><span class="icon-github"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-payment"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">دسترسی سریع</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('index').'#help' }}" class="py-1 d-block"><span class="ion-ios-arrow-back ml-3"></span>راهنمای ایجاد جلسه</a></li>
                        <li><a href="{{ route('meets.create') }}" class="py-1 d-block"><span class="ion-ios-arrow-back ml-3"></span>ایجاد جلسه جدید</a></li>
                        <li><a href="{{ route('meets.index') }}" class="py-1 d-block"><span class="ion-ios-arrow-back ml-3"></span>جلسه های شما</a></li>
                        <li><a href="{{ route('index').'#top' }}" class="py-1 d-block"><span class="ion-ios-arrow-back ml-3"></span>صفحه اصلی</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">لینک های مفید</h2>
                    <ul class="list-unstyled">
                        <li><a href="https://cafebazaar.ir/app/god.to.bethink.bethinktopray/" class="py-1 d-block"><span class="ion-ios-arrow-back ml-3"></span>یاد نماز</a></li>
                        <li><a href="https://cafebazaar.ir/app/god.to.bethink.hopelight/" class="py-1 d-block"><span class="ion-ios-arrow-back ml-3"></span>نور امید</a></li>
                        <li><a href="https://hadisgraph.com/" class="py-1 d-block"><span class="ion-ios-arrow-back ml-3"></span>حدیث گراف</a></li>
                        <li><a href="https://alkafeel.net/?lang=pr" class="py-1 d-block"><span class="ion-ios-arrow-back ml-3"></span>شبکه جهانی الکفیل</a></li>
                    </ul>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>
                    &copy;{{ Zaman::gToj('now','YYYY') }} این نرم افزار بصورت متن باز و رایگان می باشد و کلیه حقوق آن محفوظ است.
                </p>
                <i style="font-size:0.6em">قالب سایت با تغییرات برگرفته شده از <a href="https://colorlib.com" target="_blank">ColorLib</a></i>
            </div>
        </div>
    </div>
</footer>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<!-- Scripts -->
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>

<script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>

<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/scrollax.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/persianDatepicker.min.js') }}"></script>


<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/my.js') }}"></script>

<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    @yield('script')
</script>
</body>
</html>
