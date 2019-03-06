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
@endsection
