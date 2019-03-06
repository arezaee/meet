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
