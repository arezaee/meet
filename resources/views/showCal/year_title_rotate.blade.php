<div class="row year-row-title">
    <div class="col-mt">
        <div class="card year-title">
        {{$year}}
        </div>
    </div>
    @for($i=0;$i<5;$i++)
        @include('showCal.week_title')
    @endfor
</div>
