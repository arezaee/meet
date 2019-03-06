@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div><br />
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <td>ID</td>
            <td>تقویم</td>
            <td>ماه</td>
            <td>روز</td>
            <td>تعطیل</td>
            <td colspan="2">توضیحات</td>
        </tr>
        </thead>
        <tbody>
        @foreach($occasions as $occasion)
        <tr>
            <td>{{$occasion->id}}</td>
            <td>{{$occasion->type}}</td>
            <td>{{$occasion->month}}</td>
            <td>{{$occasion->day}}</td>
            <td>{{$occasion->holiday}}</td>
            <td>{{$occasion->comment}}</td>
            <td><a href="{{ route('occasions.edit',$occasion->id)}}" class="btn btn-primary">ویرایش</a></td>
            <td>
                <form action="{{ route('occasions.destroy', $occasion->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">حذف</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ Form::open(['route' => 'occasions.store']) }}
    <table class="table table-striped">
        <tbody>
        @csrf
        <thead>
        <tr>
            <td>تقویم</td>
            <td>ماه</td>
            <td>روز</td>
            <td>تعطیل</td>
            <td colspan="2">توضیحات</td>
        </tr>
        </thead>
        <tr>
            <td>
                {{ Form::select('type', ['شمسی'=>'شمسی','قمری'=>'قمری','میلادی'=>'میلادی']) }}
            </td>
            <td>
                {{ Form::text('month',null, array('class' => 'form-control')) }}
            </td>
            <td>
                {{ Form::text('day',null, array('class' => 'form-control')) }}
            </td>
            <td>
                {{ Form::checkbox('holiday') }}
            </td>
            <td>
                {{ Form::text('comment',null, array('class' => 'form-control')) }}
            </td>
            <td>
                {{ Form::submit('افزودن',['class' => 'btn btn-info']) }}
            </td>
        </tr>
        </tbody>
    </table>
    {{ Form::close() }}

</div>
@endsection
