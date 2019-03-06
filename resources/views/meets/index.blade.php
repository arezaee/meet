@extends('layouts.spring')

@section('content')

<section class="hero-wrap hero-wrap-3 pt-5" style="background-image: url('/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container pt-5">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-2 bread">جلسات شما</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row border-top py-2 border-bottom h5 text-center">
            <div class="col-6">نام نمایشی</div>
            <div class="col-4">تاریخ تأسیس</div>
            <div class="col-2"><a href="{{ route('meets.create')}}" class="btn btn-primary">جلسه جدید</a></div>
        </div>
        @foreach($meets as $meet)
        <div class="row border-bottom py-2 text-center align-middle" id="meet_{{$meet->id}}">
            <div class="col-5"><a class="text-info" href="{{ route('meets.show',$meet->id_name)}}">{{$meet->show_name}}</a></div>
            <div class="col-2">{{ Zaman::gToj($meet->start_at, 'dd MMMM yyyy')}}</div>
            <div class="col-1"><a href="{{ route('people.index',$meet->id_name)}}" class="btn btn-primary">اعضاء</a></div>
            <div class="col-1"><a href="{{ route('schedules.index',[$meet->id_name,$this_year])}}" class="btn btn-primary">زمانبندی</a></div>
            <div class="col-1"><a href="{{ route('meets.calendar',[$meet->id_name,$this_year])}}" class="btn btn-primary">تقویم</a></div>
            <div class="col-1"><a href="{{ route('meets.edit',$meet->id_name)}}" class="btn btn-primary">ویرایش</a></div>
            <div class="col-1">
                <form action="{{ route('meets.destroy', $meet->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">حذف</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection
