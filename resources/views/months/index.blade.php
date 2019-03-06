@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
    <div class="alert alert-success d-none">
    </div><br />
        <div class="row row-striped h5 text-center">
            <div class="col-1">سال</div>
            <div class="col-1">ماه</div>
            <div class="col-1">روز اول هفته</div>
            <div class="col-1">تعداد رور ماه</div>
            <div class="col-1">ماه اول قمری</div>
            <div class="col-1">روز اول ماه قمری</div>
            <div class="col-1">روز آخر ماه قمری</div>
            <div class="col-1">ماه اول میلادی</div>
            <div class="col-1">روز اول ماه میلادی</div>
            <div class="col-1">روز آخر ماه میلادی</div>
            <div class="col-1"></div>
        </div>

        {{ Form::open(['route' => 'months.store','class'=>'row row-striped row-bordered text-center insert' ]) }}
        @csrf
                {{ Form::hidden('_token', csrf_token(), array('id'=>'token_new')) }}
            <div class="col-1">
                {{ Form::text('year',null, array('class' => 'form-control','id'=>'year_new')) }}
            </div>
            <div class="col-1">
                {{ Form::text('month',null, array('class' => 'form-control','id'=>'month_new')) }}
            </div>
            <div class="col-1">
                {{ Form::text('first_day_week',null, array('class' => 'form-control','id'=>'first_day_week_new')) }}
            </div>
            <div class="col-1">
                {{ Form::text('month_day',null, array('class' => 'form-control','id'=>'month_day_new')) }}
            </div>
            <div class="col-1">
                {{ Form::text('first_lunar_month',null, array('class' => 'form-control','id'=>'first_lunar_month_new')) }}
            </div>
            <div class="col-1">
                {{ Form::text('first_lunar_day',null, array('class' => 'form-control','id'=>'first_lunar_day_new')) }}
            </div>
            <div class="col-1">
                {{ Form::text('last_lunar_day',null, array('class' => 'form-control','id'=>'last_lunar_day_new')) }}
            </div>
            <div class="col-1">
                {{ Form::text('first_georgian_month',null, array('class' => 'form-control','id'=>'first_georgian_month_new')) }}
            </div>
            <div class="col-1">
                {{ Form::text('first_georgian_day',null, array('class' => 'form-control','id'=>'first_georgian_day_new')) }}
            </div>
            <div class="col-1">
                {{ Form::text('last_georgian_day',null, array('class' => 'form-control','id'=>'last_georgian_day_new')) }}
            </div>
            <div class="col-1">
                {{ Form::submit('افزودن',['class' => 'btn btn-info','id'=>'ajax_submit_new']) }}
            </div>
            <div class="col-1">
            </div>
        {{ Form::close() }}
        @foreach($months as $month)
        <div class="row row-striped text-center  align-middle" id="month_{{$month->id}}">
            <div class="col-1">{{$month->year}}</div>
            <div class="col-1">{{Config::get('constants.solar_months_name')[$month->month]}}</div>
            <div class="col-1">{{Config::get('constants.days_of_week')[$month->first_day_week]}}</div>
            <div class="col-1">{{$month->month_day}}</div>
            <div class="col-1">{{Config::get('constants.lunar_months_name')[$month->first_lunar_month]}}</div>
            <div class="col-1">{{$month->first_lunar_day}}</div>
            <div class="col-1">{{$month->last_lunar_day}}</div>
            <div class="col-1">{{Config::get('constants.georgian_months_name')[$month->first_georgian_month]}}</div>
            <div class="col-1">{{$month->first_georgian_day}}</div>
            <div class="col-1">{{$month->last_georgian_day}}</div>
            <div class="col-1"><a href="{{ route('months.edit',$month->id)}}" class="btn btn-primary">ویرایش</a></div>
            <div class="col-1">
                <form action="{{ route('months.destroy', $month->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">حذف</button>
                </form>
            </div>
        </div>
        @endforeach

</div>
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
                        destroy(data.month.id);

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
        zz[0].innerHTML = data.month.year;
        zz[1].innerHTML = data.month.month;
        zz[2].innerHTML = data.month.first_day_week;
        zz[3].innerHTML = data.month.month_day;
        zz[4].innerHTML = data.month.first_lunar_month;
        zz[5].innerHTML = data.month.first_lunar_day;
        zz[6].innerHTML = data.month.last_lunar_day;
        zz[7].innerHTML = data.month.first_georgian_month;
        zz[8].innerHTML = data.month.first_georgian_day;
        zz[9].innerHTML = data.month.last_georgian_day;

        x.appendTo(".uper");
   }

    destroy = function(tagId){
        console.log("#month_"+tagId);
        $("#month_"+tagId).remove()
    }


 });

@endsection
