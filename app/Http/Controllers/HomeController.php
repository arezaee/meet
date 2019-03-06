<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Month;
use App\Person;
use App\Schedule;
use App\Meet;
use App\Http\Controllers\Days\Day;
use App\Http\Controllers\Days\MonthWithDay;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function showCal($id,$year)
    {

        $meet = Meet::whereId($id)->orWhere('id_name','=',$id)->first();

        if($meet->getPermission(auth()->id())!="deny")
        {
            $months = Month::where('year','=',$year)->get();

            foreach($months as $ix => $month)
                $months_days[$ix] = new MonthWithDay($month);

            $people = $meet->people->getDictionary();
            $schedules = $meet->schedules->pluck('full_data','year_month_week');


            return view('showCal.index',compact('year','months_days','people','schedules','meet'));
        }
        else
            return redirect("/meets/{$meet->id_name}");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showMeet($id)
    {
        $this_year = 1398;
        $meet = Meet::whereId($id)->orWhere('id_name','=',$id)->first();
        switch($meet->getPermission(auth()->id()))
        {
            case "edit":
                return view('meets.show', compact('meet','this_year'));
            case "view":
                return redirect(route("meets.calendar",[$meet->id_name,$this_year]));
            default:
                return view('meets.password', compact('meet'));
        }
    }

    function meetPassword(Request $request,$id)
    {
        $meet = Meet::whereId($id)->orWhere('id_name','=',$id)->first();
        session(["password.{$meet->id_name}" => $request->password]);
        return redirect(url()->previous());
    }

}

