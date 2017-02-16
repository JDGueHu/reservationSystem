<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\booking_state;

class booking_statusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking_status = booking_state::orderby('initials','ASC')->get();

        return view('configuracion.booking_status.index')->with('booking_status',$booking_status);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.booking_status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $booking_state = new booking_state();
        $booking_state->initials = $request->initials;
        $booking_state->status = $request->status;
        $booking_state->save();

        flash('Estado reserva <b>'.$booking_state->status.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('estadoReserva.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking_state = booking_state::find($id);

        return view('configuracion.booking_status.show')->with('booking_state',$booking_state);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking_state = booking_state::find($id);

        return view('configuracion.booking_status.edit')->with('booking_state',$booking_state);
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

        $booking_state = booking_state::find($id);
        $booking_state->initials = $request->initials;
        $booking_state->status = $request->status;
        $booking_state->save();

        flash('Estado reserva <b>'.$booking_state->status.'</b> se modificóa exitosamente', 'warning')->important();
        return redirect()->route('estadoReserva.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking_state = booking_state::find($id);
        $booking_state->delete();

       flash('Estado reserva <b>'.$booking_state->status.'</b> se eliminó exitosamente', 'warning')->important();
        return redirect()->route('estadoReserva.index'); 
    }
}
