<div class="row no-gutter row-month">
    <div class="col-1 ">
        @include("showCal.month_title")
    </div>
    <div class="col-11">
        <div class="card-group">
            @for($week=0;$week<6;$week++)
                @include("showCal.month_week",
                    array(
                        'week' => $week,
                        'day'=>$week*7-$month->first_day_week+2,
                        'dn'=>7
                    ))

            @endfor
        </div>
        <div class="row occasion">
            @foreach($days as $day)
                @if($day->comment!="")
                <span @if($day->holiday) class="text-danger" @endif >
                    {{ App\Http\Controllers\Tools\Persian::convertToPersianNumber($day->solar)}} {{ $day->comment }}
                </span>
                @endif
            @endforeach
        </div>
    </div>
</div>
