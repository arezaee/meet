<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Meet;

class PersonController extends Controller
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
    public function index($meet_id)
    {
        $meet = Meet::whereId($meet_id)->orWhere('id_name','=',$meet_id)->first();
        return view('people.index', compact('meet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($meet_id)
    {
        $meet = Meet::whereId($meet_id)->orWhere('id_name','=',$meet_id)->first();
        return view('people.create', compact('people','meet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$meet_id)
    {
      $request->validate([
        'first_name'=>'required',
        'last_name'=> 'required',
        'phone' => 'required'
      ]);

      $person = new Person([
        'prefix' => $request->post('prefix'),
        'first_name' => $request->post('first_name'),
        'last_name'=> $request->post('last_name'),
        'phone'=> $request->post('phone'),
        'address'=> $request->post('address')
      ]);

      $person->save();

      $meet = Meet::whereId($meet_id)->orWhere('id_name','=',$meet_id)->first();
      $person->meets()->attach($meet->id);


      return response()->json(['success'=>'افزوده شد', 'person'=>$person,'callback'=>'insert']);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($meet_id,$id)
    {
        $meet = Meet::whereId($meet_id)->orWhere('id_name','=',$meet_id)->first();
        $person = Person::find($id);
        return view('people.edit', compact('person','meet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$meet_id, $id)
    {
      $request->validate([
        'first_name'=>'required',
        'last_name'=> 'required',
        'phone' => 'required'
      ]);

      $meet = Meet::whereId($meet_id)->orWhere('id_name','=',$meet_id)->first();

      $person = Person::find($id);
      $person->prefix = $request->post('prefix');
      $person->first_name = $request->post('first_name');
      $person->last_name = $request->post('last_name');
      $person->phone = $request->post('phone');
      $person->address = $request->post('address');

      $person->save();
      return redirect(route("people.index",$meet->id_name))->with('success', 'افزوده شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($meet_id,$id)
    {
        $person = Person::find($id);
        $person->delete();
        $meet = Meet::whereId($meet_id)->orWhere('id_name','=',$meet_id)->first();
        $person->meets()->detach($meet);
        //return redirect('/people')->with('success', 'حذف شد');
        return response()->json(['success'=>'حذف شد', 'person'=>$person, 'callback'=>'destroy']);
    }
}
