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
<div class="card uper">
    <div class="card-header">
    </div>
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
        <form method="post" action="{{ route('occasions.update', $occasion->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                {{ Form::label('month', 'ماه:') }}
                {{ Form::text('month',$occasion->month, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('day', 'روز:') }}
                {{ Form::text('day',$occasion->day, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('comment', 'توضیحات:') }}
                {{ Form::text('comment',$occasion->comment, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('holiday', 'تعطیل') }}
                {{ Form::checkbox('holiday',1,$occasion->holiday==1) }}
            </div>
            <div class="form-group">
                {{ Form::label('type', 'تقویم') }}
                {{ Form::select('type', ['شمسی'=>'شمسی','قمری'=>'قمری','میلادی'=>'میلادی'],[$occasion->type]) }}
            </div>
            {{ Form::submit('ویرایش',['class' => 'btn btn-info']) }}
        </form>
    </div>
</div>
    </div>
</section>
@endsection
