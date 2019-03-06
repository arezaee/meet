<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meet;
use App\User;
use Keraken\Zaman\Facades\Zaman;

class MeetController extends Controller
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
        $this_year = 1398;
        $user = User::find(auth()->id());
        $meets = $user->meets;
        return view('meets.index', compact('meets','this_year'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meets.create');
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
        'show_name'=>'required',
        'id_name'=> 'required|unique:meets',
        'start_at' => 'required'
      ]);

      if($request->post('password')==null)
        $password="";
      else $password = $request->post('password');

      $meet = new Meet([
        'show_name' => $request->post('show_name'),
        'id_name' => $request->post('id_name'),
        'password'=> $password,
        'start_at'=> Zaman::jTog($request->post('start_at')),
      ]);

      $meet->save();

      $meet->users()->attach(auth()->id());
      return redirect(route("meets.index",$meet->id_name));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meet = Meet::whereId($id)->orWhere('id_name','=',$id)->first();
        return view('meets.edit', compact('meet'));
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
        'show_name'=>'required',
        'id_name'=> 'required|unique:meets,id_name,'.$id,
        'start_at' => 'required'
      ]);

      $meet = Meet::find($id);
      if($request->post('password')==null)
        $password="";
      else $password = $request->post('password');

      $meet->show_name = $request->post('show_name');
      $meet->id_name = $request->post('id_name');
      $meet->start_at = Zaman::jTog($request->post('start_at'));
      $meet->password = $password;

      $meet->save();
      return redirect(route("meets.show",$meet->id_name));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meet = Meet::whereId($id)->first();
        if(!$meet)
            $meet = Meet::whereIdName($id)->first();

        $meet->delete();

        return redirect(route("meets.index",$meet->id_name))->with('success', 'حذف شد');
    }
}
