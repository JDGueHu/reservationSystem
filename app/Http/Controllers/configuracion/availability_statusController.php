<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\availability_status;

class availability_statusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $availability_status = availability_status::orderby('initials','ASC')->get();
        return view('configuracion.availability_status.index')
            ->with('availability_status',$availability_status);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.availability_status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $availability_status = new availability_status();
        $availability_status->initials = $request->initials;
        $availability_status->status = $request->status;
        $availability_status->save();

        flash('Estado disponibilidad <b>'.$availability_status->status.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('estadoDisponibilidad.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $availability_status = availability_status::find($id);
        return view('configuracion.availability_status.show')->with('availability_status',$availability_status);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $availability_status = availability_status::find($id);
        return view('configuracion.availability_status.edit')->with('availability_status',$availability_status);
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
        $availability_status = availability_status::find($id);
        $availability_status->initials = $request->initials;
        $availability_status->status = $request->status;
        $availability_status->save();

        flash('Estado disponibilidad <b>'.$availability_status->status.'</b> se modificó exitosamente', 'warning')->important();
        return redirect()->route('estadoDisponibilidad.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $availability_status = availability_status::find($id);
        $availability_status->delete();

        flash('Estado disponibilidad <b>'.$availability_status->status.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('estadoDisponibilidad.index'); 
    }
}
