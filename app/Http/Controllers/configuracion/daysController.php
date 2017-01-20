<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\day;

class daysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $days = day::orderby('name','ASC')->get();
        return view('configuracion.days.index')->with('days',$days);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.days.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $day = new day();
        $day->initials = $request->initials;
        $day->name = $request->name;
        $day->save();

        flash('Día <b>'.$day->name.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('dia.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $day = day::find($id);
        return view('configuracion.days.show')->with('day',$day);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $day = day::find($id);
        return view('configuracion.days.edit')->with('day',$day);
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
        $day = day::find($id);
        $day->initials = $request->initials;
        $day->name = $request->name;
        $day->save();

        flash('Día <b>'.$day->name.'</b> se modificó exitosamente', 'warning')->important();
        return redirect()->route('dia.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $day = day::find($id);
        $day->delete();

        flash('Día <b>'.$day->name.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('dia.index');
    }
}
