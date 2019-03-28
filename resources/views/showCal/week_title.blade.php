@php($dn=7)
<div class="col-w d-none d-lg-block @if($week==5) tail @php($dn=2) @endif">
    <div class="row">
    @for($no=1; $no<=$dn; $no++  )
        @include('showCal.day_of_week', array(
                                            'no' => $no ,
                                            'day_of_week' => config('constants.days_of_week_letter')[$no]
                                        ))
    @endfor
    </div>

</div>
