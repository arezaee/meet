@if($editable)
{{ Form::open(['route' => ['schedules.store',$meet->id_name,$year],'class'=>'row row-striped row-bordered text-center insert' ]) }}
    @csrf
    {{ Form::hidden('year_month_week',$year.$month->month.$week) }}
    {{ Form::select('people_id', $people, $schedules[$year.$month->month.$week]['people_id'] ?? null) }}
    {{ Form::text('comment',$schedules[$year.$month->month.$week]['comment'] ?? "") }}

{{ Form::close() }}

@else


    @if($schedules[$year.$month->month.$week]['people_id'] ?? null != null)
    <div class="row">
    <div class="col name">
        {{ $people[$schedules[$year.$month->month.$week]['people_id']]->full_name }}
    </div>
    </div>
    <div class="row ">
        <div class="address">
            {{ App\Http\Controllers\Tools\Persian::convertToPersianNumber( $people[$schedules[$year.$month->month.$week]['people_id']]->address ) }}،
        </div>
        <div class="phone">
            {{ App\Http\Controllers\Tools\Persian::convertToPersianNumber( $people[$schedules[$year.$month->month.$week]['people_id']]->phone ) }}
        </div>
    </div>
    @else
    <div class="row comment">
        <div class="col text-center">
        {{ $schedules[$year.$month->month.$week]['comment'] ?? " " }}
        </div>
    </div>
    @endif
@endif
