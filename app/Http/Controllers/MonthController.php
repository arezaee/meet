<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Month;


class MonthController extends Controller
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
    public function index()
    {
        $months = Month::all();
        return view('months.index', compact('months'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('months.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'year'=>'required|integer',
        'month'=> 'required|integer',
        'first_day_week' => 'required|integer',
        'month_day' => 'required|integer',
        'first_lunar_month' => 'required|integer',
        'first_lunar_day' => 'required|integer',
        'last_lunar_day' => 'required|integer',
        'first_georgian_month' => 'required|integer',
        'first_georgian_day' => 'required|integer',
        'last_georgian_day' => 'required|integer'
      ]);

      $month = new Month([
        'year' => $request->post('year'),
        'month' => $request->post('month'),
        'first_day_week'=> $request->post('first_day_week'),
        'month_day'=> $request->post('month_day'),
        'first_lunar_month'=> $request->post('first_lunar_month'),
        'first_lunar_day'=> $request->post('first_lunar_day'),
        'last_lunar_day'=> $request->post('last_lunar_day'),
        'first_georgian_month'=> $request->post('first_georgian_month'),
        'first_georgian_day'=> $request->post('first_georgian_day'),
        'last_georgian_day'=> $request->post('last_georgian_day')
      ]);

      $month->save();
      return response()->json(['success'=>'افزوده شد', 'month'=>$month,'callback'=>'insert']);
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
        $month = Month::find($id);
        return view('months.edit', compact('month'));
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
      $request->validate([
        'first_name'=>'required',
        'last_name'=> 'required',
        'phone' => 'required'
      ]);

      $month = Month::find($id);
      $month->prefix = $request->post('prefix');
      $month->first_name = $request->post('first_name');
      $month->last_name = $request->post('last_name');
      $month->phone = $request->post('phone');
      $month->address = $request->post('address');

      $month->save();
      return redirect('/months')->with('success', 'افزوده شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $month = Month::find($id);
        $month->delete();

        //return redirect('/months')->with('success', 'حذف شد');
        return response()->json(['success'=>'حذف شد', 'month'=>$month, 'callback'=>'destroy']);
    }
}
