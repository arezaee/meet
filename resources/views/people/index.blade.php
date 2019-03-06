@extends('layouts.spring')

@section('content')

<section class="hero-wrap hero-wrap-3 pt-5" style="background-image: url('/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container pt-5">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-2 bread">اعضاء جلسه</h1>
                <p class="breadcrumbs">
                    <span class="mr-2">
                        <a href="{{ route('meets.index')}}">جلسات شما<i class="ion-ios-arrow-back"></i></a>
                    </span>
                    <span class="mr-2">
                        <a href="{{ route('meets.show',$meet->id_name)}}">{{$meet->show_name}}<i class="ion-ios-arrow-back"></i></a>
                    </span>
                    <span>اعضاء جلسه <i class="ion-ios-arrow-back"></i></span>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container" id="main">
        <div class="alert alert-success d-none">
        </div>
        <div class="row border-top py-2 border-bottom h5 text-center">
            <div class="col-3">نام</div>
            <div class="col-2">تلفن</div>
            <div class="col-5">آدرس</div>
            <div class="col-2"></div>
        </div>
        {{ Form::open(['route' => ['people.store',$meet->id_name],'class'=>'row border-bottom py-2 text-center insert' ]) }}
            @csrf
            {{ Form::hidden('_token', csrf_token(), array('id'=>'token_new')) }}
            <div class="col-1">
                {{ Form::text('prefix',null, array('class' => 'form-control','id'=>'prefix_new')) }}
            </div>
            <div class="col-1">
                {{ Form::text('first_name',null, array('class' => 'form-control','id'=>'first_name_new')) }}
            </div>
            <div class="col-1">
                {{ Form::text('last_name',null, array('class' => 'form-control','id'=>'last_name_new')) }}
            </div>
            <div class="col-2">
                {{ Form::text('phone',null, array('class' => 'form-control','id'=>'phone_new')) }}
            </div>
            <div class="col-5">
                {{ Form::text('address',null, array('class' => 'form-control','id'=>'address_new')) }}
            </div>
            <div class="col-1">
                {{ Form::submit('افزودن',['class' => 'btn btn-info','id'=>'ajax_submit_new']) }}
            </div>
            <div class="col-1">
            </div>
        {{ Form::close() }}

        @foreach($meet->people as $person)
        <div class="row text-center border-bottom py-2 align-middle" id="person_{{$person->id}}">
            <div class="col-3">{{$person->prefix}} {{$person->first_name}} {{$person->last_name}}</div>
            <div class="col-2">{{$person->phone}}</div>
            <div class="col-5">{{$person->address}}</div>
            <div class="col-1"><a href="{{ route('people.edit',[$meet->id_name,$person->id])}}" class="btn btn-primary">ویرایش</a></div>
            <div class="col-1">
                <form action="{{ route('people.destroy', [$meet->id_name,$person->id])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">حذف</button>
                </form>
            </div>
        </div>
        @endforeach

</div>
</section>
<div class="row text-center border-bottom py-2 align-middle d-none" id="temp_row">
    <div class="col-3"></div>
    <div class="col-2"></div>
    <div class="col-5"></div>
    <div class="col-1"><a href="{{ route('people.show',[$meet->id_name,''])}}" class="btn btn-primary">ویرایش</a></div>
    <div class="col-1">
        <form action="{{ route('people.destroy', [$meet->id_name,''])}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">حذف</button>
        </form>
    </div>
</div>

@endsection

@section('script')

insert = function(data) {
    var x = $("#temp_row").clone()
    x.attr("id" , "person_"+data.person.id);
    x.removeClass("d-none");
    var zz = x.find('div')
    zz[0].innerHTML = [data.person.prefix , data.person.first_name , data.person.last_name].join(" ");
    zz[1].innerHTML = data.person.phone;
    zz[2].innerHTML = data.person.address;

    var a = $(x.find('a')[0]);
    a.attr("href",a.attr("href")+"/"+data.person.id+"/edit");
    a = x.find('form')[0];
    $(a).attr("action",$(a).attr("action")+"/"+data.person.id);
    a.addEventListener("submit", (e)=>submit(e,a));

    x.appendTo("#main");
}

destroy = function(tagId){
    console.log("#person_"+tagId);
    $("#person_"+tagId).remove()
}

submit = function(e,f) {
        e.preventDefault();
        $.ajax({
            url: f.action,
            method: f.method,
            dataType: 'json',
            data: $(f).serializeArray(),
            success: function(data){
                $('.alert').html(data.success).removeClass('d-none').delay(3000).queue(function(next){
                    $(this).addClass("d-none");
                    next();
                });
                if(data.callback =="insert")
                    insert(data);
                else if(data.callback =="destroy")
                    destroy(data.person.id);
            },
            error: function (data) {
                $('.alert').html(data.responseText.message).removeClass('d-none').delay(3000).queue(function(next){
                    $(this).addClass("d-none");
                    next();
                });
                console.log('Error:', data.responseText);
            }
        });
}

$(document).ready(function(){
   $("form").each(function(){
        this.addEventListener("submit", (e)=>submit(e,this));
   });
});

@endsection
