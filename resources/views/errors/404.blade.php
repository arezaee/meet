@extends('layouts.spring')

@section('content')
<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-10 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                <h1 class="mb-0">متأسفانه، این صفحه وجود ندارد</h1>
                <p>
                    <a href="{{ route('index') }}" class="btn btn-primary py-3 px-4">برو به صفحه اصلی</a>
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
