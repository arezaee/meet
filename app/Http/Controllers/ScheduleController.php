<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Month;
use App\Person;
use App\Meet;
use App\Http\Controllers\Days\Day;
use App\Http\Controllers\Days\MonthWithDay;

class ScheduleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($meet_id,$year)
    {
        $meet = Meet::whereId($meet_id)->orWhere('id_name','=',$meet_id)->first();
        $months = Month::where('year','=',$year)->get();

        foreach($months as $ix => $month)
            $months_days[$ix] = new MonthWithDay($month);

        $people = $meet->people->pluck('full_name','id')->prepend('نامشخص',0);//Person::has('meets','=',$meet->id)->get()->pluck('full_name','id')->prepend('نامشخص',0);
        $schedules = $meet->schedules->pluck('full_data','year_month_week');//::has('meets','=',$meet->id)->get()->pluck('full_data','year_month_week');

        return view('schedules.index',compact('year','months_days','people','schedules','meet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$meet_id,$year)
    {
      $meet = Meet::whereId($meet_id)->orWhere('id_name','=',$meet_id)->first();

      $unique = array(
        'year_month_week' => $request->post('year_month_week'),
        'meet_id' => $meet->id
      );

      $schedule = Schedule::firstOrNew($unique);
      $schedule->meet_id = $meet->id;
      $schedule->comment = $request->post('comment',"");
      $schedule->people_id = $request->post('people_id',null);
      if($schedule->people_id=='0')
        $schedule->people_id = null;

      $schedule->save();

      return response()->json(['success'=>'تغییر داده شد', 'callback'=>'insert']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
