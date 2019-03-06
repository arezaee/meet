@extends('layouts.spring')

@section('content')
<section class="hero-wrap hero-wrap-3 pt-5" style="background-image: url('/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container pt-5">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-2 bread">ویرایش فرد</h1>
                <p class="breadcrumbs">
                    <span class="mr-2">
                        <a href="{{ route('meets.index')}}">جلسات شما<i class="ion-ios-arrow-back"></i></a>
                    </span>
                    <span class="mr-2">
                        <a href="{{ route('meets.show',$meet->id_name)}}">{{$meet->show_name}}<i class="ion-ios-arrow-back"></i></a>
                    </span>
                    <span>ویرایش فرد <i class="ion-ios-arrow-back"></i></span>
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
        <form method="post" action="{{ route('people.update', [$meet->id_name,$person->id]) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                {{ Form::label('prefix', 'پیشوند:') }}
                {{ Form::text('prefix',$person->prefix, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('first_name', 'نام:') }}
                {{ Form::text('first_name',$person->first_name, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('last_name', 'نام خانوادگی:') }}
                {{ Form::text('last_name',$person->last_name, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('address', 'آدرس:') }}
                {{ Form::text('address',$person->address, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('phone', 'تلفن:') }}
                {{ Form::text('phone',$person->phone, array('class' => 'form-control')) }}
            </div>
            {{ Form::submit('ویرایش',['class' => 'btn btn-info']) }}
        </form>
    </div>
</div>
    </div>
</section>
@endsection
