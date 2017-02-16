<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\booking_rule;

class booking_rulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking_rules = booking_rule::orderby('priority','ASC')->get();

        return view('management.booking_rules.index')
            ->with('booking_rules',$booking_rules);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $booking_rules_max_priority = DB::table('booking_rules')->count('priority');

        if($booking_rules_max_priority == null)$booking_rules_max_priority = 1;
        else{$booking_rules_max_priority = $booking_rules_max_priority + 1;}

        return view('management.booking_rules.create')
            ->with('booking_rules_max_priority',$booking_rules_max_priority);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $booking_rule = new booking_rule();
        $booking_rule->rule = $request->rule;
        $booking_rule->priority = $request->priority;
        $booking_rule->save();

        flash('La política de reserva se creó exitosamente', 'success')->important();
        return redirect()->route('politicasReserva.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking_rule = booking_rule::find($id);

        return view('management.booking_rules.show')->with('booking_rule',$booking_rule);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking_rule = booking_rule::find($id);

        return view('management.booking_rules.edit')->with('booking_rule',$booking_rule);
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
        DB::table('booking_rules')->increment('priority');

        $booking_rule = booking_rule::find($id);
        $booking_rule->rule = $request->rule;
        $booking_rule->priority = $request->priority;
        $booking_rule->save();

        flash('La política de reserva se modificó exitosamente', 'warning')->important();
        return redirect()->route('politicasReserva.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking_rule = booking_rule::find($id);
        $booking_rule->delete();

        flash('La política de reserva se eliminó exitosamente', 'danger')->important();
        return redirect()->route('politicasReserva.index');
    }
}
