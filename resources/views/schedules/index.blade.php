@extends('layouts.spring')

@section('content')

<section class="hero-wrap hero-wrap-3 pt-5" style="background-image: url('/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container pt-5">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-2 bread">زمانبندی جلسه</h1>
                <p class="breadcrumbs">
                    <span class="mr-2">
                        <a href="{{ route('meets.index')}}">جلسات شما<i class="ion-ios-arrow-back"></i></a>
                    </span>
                    <span class="mr-2">
                        <a href="{{ route('meets.show',$meet->id_name)}}">{{$meet->show_name}}<i class="ion-ios-arrow-back"></i></a>
                    </span>
                    <span>زمانبندی جلسه <i class="ion-ios-arrow-back"></i></span>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container-fluid cal">
    <div class="alert alert-success d-none">
    </div>

    @include('showCal.year_title')
    @foreach($months_days as $month_days)
        @include('showCal.month', array(
                                    'month' => $month_days->month,
                                    'days' => $month_days->days,
                                    'editable'=>true
                                ))
    @endforeach

</div>
</section>
@endsection

@section('script')

submit = function(e,f,d) {
    e.preventDefault();
    $.ajax({
        url: f.action,
        method: f.method,
        dataType: 'json',
        data: d,
        success: function(data){
            $('.alert').html(data.success).removeClass('d-none').delay(3000).queue(function(next){
                    $(this).addClass("d-none");
                    next();
                });
            },
        error: function (data) {
            $('.alert').html(data.responseText["message"]).removeClass('d-none').delay(3000).queue(function(next){
                    $(this).addClass("d-none");
                    next();
                });
                console.log('Error:', data.responseText);
            }
    });
}

$(document).ready(function(){
    $("form :input").change(function(e) {
        var data = $($(this).closest('form')[0]).serializeArray()
        submit(e,$(this).closest('form')[0],data)
    });


});

@endsection
