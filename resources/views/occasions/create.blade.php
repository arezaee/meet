@extends('layouts.app')
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
    <div class="card-header">
        افزودن مناسبت
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
        {{ Form::open(['route' => 'occasions.store']) }}
            <div class="form-group">
                @csrf
                {{ Form::label('month', 'ماه:') }}
                {{ Form::text('month',null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('day', 'روز:') }}
                {{ Form::text('day',null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('comment', 'توضیحات:') }}
                {{ Form::text('comment',null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('holiday', 'تعطیل') }}
                {{ Form::checkbox('holiday') }}
            </div>
            <div class="form-group">
                {{ Form::label('type', 'تقویم') }}
                {{ Form::select('type', ['شمسی'=>'شمسی','قمری'=>'قمری','میلادی'=>'میلادی']) }}
            </div>

        {{ Form::submit('افزودن',['class' => 'btn btn-info']) }}
        {{ Form::close() }}

    </div>
</div>
@endsection
