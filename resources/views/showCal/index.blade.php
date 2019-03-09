@extends('layouts.spring')

@section('content')

<section class="hero-wrap hero-wrap-2 pt-5" style="background-image: url('/images/{{$meet->pic}}.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container pt-5">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-2 bread">{{$meet->show_name}}</h1>
                <h2 class="mb-2 bread text-light">سال
                    {{App\Http\Controllers\Tools\Persian::convertToPersianNumber($year)}}
                    هجری خورشیدی
                </h2>
                <p class="breadcrumbs">
                    <span class="mr-2">
                        <a href="{{ route('meets.index')}}">جلسات شما<i class="ion-ios-arrow-back"></i></a>
                    </span>
                    <span class="mr-2">
                        <a href="{{ route('meets.show',$meet->id_name)}}">{{$meet->show_name}} <i class="ion-ios-arrow-back"></i></a>
                    </span>
                    <span>تقویم <i class="ion-ios-arrow-back"></i></span>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light pt-3 pb-3">
<div class="container-fluid cal">
    @include('showCal.year_title')
    @foreach($months_days as $month_days)
        @include('showCal.month', array(
                                    'month' => $month_days->month,
                                    'days' => $month_days->days,
                                    'editable'=>false
                                ))
    @endforeach

</div>
</section>
@endsection
