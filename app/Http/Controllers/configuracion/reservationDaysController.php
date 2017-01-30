<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\reservationDay;

class reservationDaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservationDay = reservationDay::orderby('days','ASC')->get();
        return view('configuracion.reservationDays.index')->with('reservationDays',$reservationDay);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.reservationDays.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservationDay = new reservationDay();
        $reservationDay->initials = $request->initials;
        $reservationDay->days = $request->days;
        $reservationDay->save();

        flash('Días reservables <b>'.$reservationDay->initials.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('diaReservable.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservationDay = reservationDay::find($id);
        return view('configuracion.reservationDays.show')->with('reservationDay',$reservationDay);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservationDay = reservationDay::find($id);
        return view('configuracion.reservationDays.edit')->with('reservationDay',$reservationDay);
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
        $reservationDay = reservationDay::find($id);
        $reservationDay->initials = $request->initials;
        $reservationDay->days = $request->days;
        $reservationDay->save();

        flash('Días reservables <b>'.$reservationDay->initials.'</b> se modificó exitosamente', 'success')->important();
        return redirect()->route('diaReservable.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservationDay = reservationDay::find($id);
        $reservationDay->delete();

        flash('Días reservables <b>'.$reservationDay->initials.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('diaReservable.index'); 
    }
}
