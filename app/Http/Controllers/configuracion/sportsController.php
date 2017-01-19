<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sport;

class sportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sports = sport::orderby('name','ASC')->get();
        return view('configuracion.sports.index')->with('sports',$sports);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.sports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sport = new sport();
        $sport->initials = $request->initials;
        $sport->name = $request->name;
        $sport->save();

        flash('Deporte <b>'.$sport->name.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('deporte.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sport = sport::find($id);
        return view('configuracion.sports.show')->with('sport',$sport);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sport = sport::find($id);
        return view('configuracion.sports.edit')->with('sport',$sport);
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
        $sport = sport::find($id);
        $sport->initials = $request->initials;
        $sport->name = $request->name;
        $sport->save();

        flash('Deporte <b>'.$sport->name.'</b> se modificó exitosamente', 'warning')->important();
        return redirect()->route('sport.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $sport = sport::find($id);
       $sport->delete();

        flash('Deporte <b>'.$sport->name.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('deporte.index'); 
    }
}
