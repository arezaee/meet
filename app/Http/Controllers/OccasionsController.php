<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Occasion;


class OccasionsController extends Controller
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
        $occasions = Occasion::all();
        return view('occasions.index', compact('occasions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('occasions.create');
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
        'month'=>'required|integer',
        'day'=> 'required|integer',
        'comment' => 'required'
      ]);


      if($request->post('holiday')== null )
        $holiday = false;
      else
        $holiday = $request->post('holiday');

      $occasion = new Occasion([
        'month' => $request->post('month'),
        'day'=> $request->post('day'),
        'comment'=> $request->post('comment'),
        'holiday'=> $holiday,
        'type'=> $request->post('type')
      ]);

      $occasion->save();
      return redirect('/occasions')->with('success', 'افزوده شد');
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
        $occasion = Occasion::find($id);
        return view('occasions.edit', compact('occasion'));
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
        'month'=>'required|integer',
        'day'=> 'required|integer',
        'comment' => 'required'
      ]);

      if($request->post('holiday')== null )
        $holiday = false;
      else
        $holiday = $request->post('holiday');

      $occasion = Occasion::find($id);
      $occasion->month = $request->post('month');
      $occasion->day = $request->post('day');
      $occasion->comment = $request->post('comment');
      $occasion->holiday = $holiday;
      $occasion->type = $request->post('type');

      $occasion->save();
      return redirect('/occasions')->with('success', 'ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $occasion = Occasion::find($id);
        $occasion->delete();

        return redirect('/occasions')->with('success', 'حذف شد');
    }
}
?>

