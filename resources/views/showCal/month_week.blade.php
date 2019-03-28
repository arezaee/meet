<div class="col-w @if($week==5) tail @php($dn=2) @endif">
    @if($day <= $month->month_day)
    <div class="card ">
    <div class="row">
    @for($i=1 ; $i<=$dn;$i++, $day++)
        @include("showCal.day",
            array(
                'day' => $day,
                'dw'=>$i
            ))
    @endfor
    @for( ; $i<=7;$i++)
        <div class="col d-lg-none"></div>
    @endfor
    </div>
    <div class="card-footer schedule p-1">
        @if($dn == 7 && $day-1<=$month->month_day)
            @include("showCal.week_schedule")
        @endif
    </div>
    </div>
    @endif
</div>
