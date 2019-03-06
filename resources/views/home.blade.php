@extends('layouts.spring')

@section('content')
<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-10 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                <h1 class="mb-0">تقویم جلسه مذهبی</h1>
                <h3 class="subheading mb-4 pb-1">مشخصات اعضا و زمانبندی برگزاری جلسه هفتگی خود را ثبت و تقویم سالانه بسازید</h3>
                <p>
                    <a href="#" class="btn btn-primary py-3 px-4">تازه واردی!</a>
                    <a href="{{ url('meets/') }}" class="btn btn-white py-3 px-4">
                        <span class="icon-play-circle"></span> شروع کن
                    </a></p>
                <div class="mouse">
                    <a href="#" class="mouse-icon">
                        <div class="mouse-wheel"><span class="ion-ios-arrow-down"></span></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="ftco-intro py-5" style="background-image: url(images/bg_4.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-6 ftco-animate">
                <h2 class="subheading"><span class="icon-calendar"></span> Upcoming Events</h2>
                <h2><a href="#">"The Law Demands, but Grace Supplies" &mdash; Pastor John Doe </a></h2>
            </div>
            <div class="col-md-6 pl-md-5 ftco-animate">
                <div id="timer" class="d-flex mb-3">
                    <div class="time" id="days"></div>
                    <div class="time pl-4" id="hours"></div>
                    <div class="time pl-4" id="minutes"></div>
                    <div class="time pl-4" id="seconds"></div>
                </div>
                <p><a href="#" class="btn btn-primary px-4 py-2">Join our event</a></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-daily-verse bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 daily-verse text-center p-5">
                <span class="flaticon-bible"></span>
                <h3 class="ftco-animate">"16 For God so loved the world, that he gave his only begotten Son, that whosoever believeth in him should not perish, but have everlasting life."</h3>
                <h4 class="h5 mt-4 font-weight-bold ftco-animate">&mdash; John 3:16 KJV</h4>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
