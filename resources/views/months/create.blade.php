@extends('layouts.app')
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
    <div class="card-header">
        افزودن افراد
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
        {{ Form::open(['route' => 'months.store']) }}
            <div class="form-group">
                @csrf
                {{ Form::label('prefix', 'پیشوند:') }}
                {{ Form::text('prefix',null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('first_name', 'نام:') }}
                {{ Form::text('first_name',null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('last_name', 'نام خانوادگی:') }}
                {{ Form::text('last_name',null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('address', 'آدرس:') }}
                {{ Form::text('address',null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('phone', 'تلفن:') }}
                {{ Form::text('phone',null, array('class' => 'form-control')) }}
            </div>

        {{ Form::submit('افزودن',['class' => 'btn btn-info']) }}
        {{ Form::close() }}

    </div>
</div>
@endsection
