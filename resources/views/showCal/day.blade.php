@if($day>0 && $day<=$month->month_day)
<div class="col">
    <div class="card day @if($dw==7 || $days[$day]->holiday) text-danger @endif ">
        <h6 class="row card-title">
            <div class="col">
            {{App\Http\Controllers\Tools\Persian::convertToPersianNumber($day)}}
            </div>
        </h6>
        <div class="row card-text">
            <div class="col">
                {{App\Http\Controllers\Tools\Persian::convertToPersianNumber($days[$day]->lunar)}}
            </div>
            <div class="col">
                {{$days[$day]->georgian}}
            </div>
        </div>
    </div>
</div>
@else
<div class="col day">

</div>
@php($valid_week=false)

@endif
