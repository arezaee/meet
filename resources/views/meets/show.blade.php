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
                    <span>مشخصات جلسه <i class="ion-ios-arrow-back"></i></span>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row border-top py-2 border-bottom h5 text-center">

            <div class="col">تاریخ تأسیس: {{ Zaman::gToj($meet->start_at, 'dd MMMM yyyy') }}</div>
            <div class="col"><a href="{{ route('meets.edit',$meet->id_name)}}" class="btn btn-primary">ویرایش</a></div>
            <div class="col">
                <form action="{{ route('meets.destroy', $meet->id_name)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">حذف</button>
                </form>
            </div>
        </div>

        <div class="row py-2 border-bottom h5 text-center">
            <div class="col"><a href="{{ route('people.index',$meet->id_name)}}" class="btn btn-primary">لیست اعضاء</a></div>
            <div class="col"><a href="{{ route('schedules.index',[$meet->id_name,$this_year])}}" class="btn btn-primary">زمانبندی</a></div>
            <div class="col"><a href="{{ route('meets.calendar',[$meet->id_name,$this_year])}}" class="btn btn-primary">مشاهده تقویم</a></div>
        </div>
    </div>
</section>

@endsection

@section('script')
 $(document).ready(function(){
    $("form").each(function () {
        var f = this;
        f.addEventListener("submit", function(e) {
             e.preventDefault();

             $.ajax({
                url: f.action,
                method: f.method,
                dataType: 'json',
                data: $(this).serializeArray(),
                success: function(data){
                    $('.alert').html(data.success).removeClass('d-none').delay(3000).queue(function(next){
                        $(this).addClass("d-none");
                        next();
                    });
                    if(data.callback =="insert")
                        insert(data);
                    else if(data.callback =="destroy")
                        destroy(data.meet.id);

                },
                error: function (data) {
                    $('.alert').html(data.responseText["message"]).removeClass('d-none').delay(3000).queue(function(next){
                        $(this).addClass("d-none");
                        next();
                    });

                    console.log('Error:', data.responseText);
                }
             });
        });
    });

   insert = function(data) {
        var x = $(".row:last").clone()
        var zz = x.find('div')
        zz[0].innerHTML = data.meet.id;
        zz[1].innerHTML = [data.meet.prefix , data.meet.first_name , data.meet.last_name].join(" ");
        zz[2].innerHTML = data.meet.phone;
        zz[3].innerHTML = data.meet.address;

        x.appendTo(".uper");
   }

    destroy = function(tagId){
        console.log("#meet_"+tagId);
        $("#meet_"+tagId).remove()
    }


 });
@endsection
