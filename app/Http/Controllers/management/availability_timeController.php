<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\availability_time;

class availability_timeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $durations = availability_time::orderby('name','ASC')->get();
        return view('management.availability_time.index')->with('durations',$durations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('management.availability_time.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duration = new availability_time();
        $duration->initials = $request->initials;
        $duration->name = $request->name;
        $duration->save();

        flash('Duración <b>'.$duration->name.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('duracionDisponibilidad.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $duration = availability_time::find($id);
        return view('management.availability_time.show')->with('duration',$duration);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $duration = availability_time::find($id);
        return view('management.availability_time.edit')->with('duration',$duration);
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
        $duration = availability_time::find($id);
        $duration->initials = $request->initials;
        $duration->name = $request->name;
        $duration->save();

        flash('Duración <b>'.$duration->name.'</b> se modificó exitosamente', 'warning')->important();
        return redirect()->route('duracionDisponibilidad.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $duration = availability_time::find($id);
        $duration->delete();

        flash('Duración <b>'.$duration->name.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('duracionDisponibilidad.index'); 
    }
}
