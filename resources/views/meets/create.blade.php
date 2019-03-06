@extends('layouts.spring')
@section('content')
<section class="hero-wrap hero-wrap-3" style="background-image: url('/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-2 bread">ایجاد جلسه جدید</h1>
                <p class="breadcrumbs">
                    <span class="mr-2">
                        <a href="{{ route('meets.index')}}">جلسات شما<i class="ion-ios-arrow-back"></i></a>
                    </span>
                    <span>ایجاد جلسه جدید <i class="ion-ios-arrow-back"></i></span>
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
                {{ Form::open(['route' => 'meets.store']) }}
                    <div class="form-group">
                        @csrf
                        {{ Form::label('show_name', 'نام نمایشی:') }}
                        {{ Form::text('show_name',null, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('id_name', 'نام یکتا:') }}
                        {{ Form::text('id_name',null, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('password', 'گذرواژه:') }}
                        {{ Form::password('password', array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('start_at', 'تاریخ تاسیس:') }}
                        {{ Form::date('start_at',null, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group text-left">
                        {{ Form::submit('ایجاد',['class' => 'btn btn-primary ']) }}
                    </div>
                {{ Form::close() }}

            </div>
        </div>
    </div>
</section>
@endsection
