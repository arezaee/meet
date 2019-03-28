<div class="card month-title">
    <h5 class="card-title">
        {{Config::get('constants.solar_months_name')[$month->month]}}
    </h5>
    <div class="row">
    <div class="col card-text">
        {{Config::get('constants.lunar_months_name')[$month->first_lunar_month]}}<br>
        {{Config::get('constants.lunar_months_name')[($month->first_lunar_month)%12+1]}}
    </div>
    <div class="col card-text">
        {{Config::get('constants.georgian_months_name')[$month->first_georgian_month]}}<br>
        {{Config::get('constants.georgian_months_name')[($month->first_georgian_month)%12+1]}}
    </div>
    </div>
</div>
<div class="row d-lg-none">
    @for($no=1; $no<=7; $no++  )
        @include('showCal.day_of_week', array(
                                            'no' => $no ,
                                            'day_of_week' => config('constants.days_of_week_letter')[$no]
                                        ))
    @endfor
</div>
