@extends('layouts.spring')

@section('content')
<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-10 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                <h1 class="mb-0">تقویم جلسه مذهبی</h1>
                <h3 class="subheading mb-4 pb-1">بررسی کوازار</h3>
                <h3 class="subheading mb-4 pb-1">مشخصات اعضا و زمانبندی برگزاری جلسه هفتگی خود را ثبت و تقویم سالانه بسازید</h3>
                <p>
                    <a href="{{ route('index') }}#help" class="btn btn-primary py-3 px-4">اینجا چه خبره؟</a>
                    <a href="{{ route('meets.index') }}" class="btn btn-white py-3 px-4">
                        <span class="icon-play-circle"></span> شروع کن
                    </a></p>
                <div class="mouse">
                    <a href="{{ route('index') }}#verse" class="mouse-icon">
                        <div class="mouse-wheel"><span class="ion-ios-arrow-down"></span></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@include("home.verse")
@include("home.meets")
@include("home.help")
@include("home.about")
@include("home.contact")

@endsection
