@extends('layouts.spring')
@section('content')
<section class="hero-wrap hero-wrap-3 pt-5" style="background-image: url('/images/{{$meet->pic}}.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container pt-5">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-2 bread">{{$meet->show_name}}</h1>
                <p class="breadcrumbs">
                    <span class="mr-2">
                        <a href="{{ route('meets.index')}}">جلسات شما<i class="ion-ios-arrow-back"></i></a>
                    </span>
                    <span class="mr-2">
                        <a href="{{ route('meets.show',$meet->id_name)}}">{{$meet->show_name}}<i class="ion-ios-arrow-back"></i></a>
                    </span>
                    <span>ویرایش جلسه <i class="ion-ios-arrow-back"></i></span>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">

        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
                @endif
                <form method="post" action="{{ route('meets.update', $meet->id) }}">
                <div class="form-group">
                    @method('PATCH')
                    @csrf
                    {{ Form::label('show_name', 'نام نمایشی:') }}
                    {{ Form::text('show_name',$meet->show_name, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('id_name', 'نام یکتا:') }}
                    {{ Form::text('id_name',$meet->id_name, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password', 'گذرواژه:') }}
                    {{ Form::text('password',$meet->password, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('start_at', 'تاریخ تاسیس:') }}
                    {{ Form::text('start_at', Zaman::gToj($meet->start_at, 'yyyy/MM/dd'), array('class' => 'form-control')) }}
                </div>
                <div class="form-group text-left">
                    {{ Form::submit('ویرایش',['class' => 'btn btn-primary ']) }}
                </div>
                </form>

            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
$(function() {
    $("#start_at").persianDatepicker();
});
@endsection

