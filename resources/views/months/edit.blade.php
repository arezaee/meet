@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
    <div class="card-header">
        Edit Share
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
        <form method="post" action="{{ route('months.update', $month->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                {{ Form::label('prefix', 'پیشوند:') }}
                {{ Form::text('prefix',$month->prefix, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('first_name', 'نام:') }}
                {{ Form::text('first_name',$month->first_name, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('last_name', 'نام خانوادگی:') }}
                {{ Form::text('last_name',$month->last_name, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('address', 'آدرس:') }}
                {{ Form::text('address',$month->address, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('phone', 'تلفن:') }}
                {{ Form::text('phone',$month->phone, array('class' => 'form-control')) }}
            </div>
            {{ Form::submit('ویرایش',['class' => 'btn btn-info']) }}
        </form>
    </div>
</div>
@endsection
