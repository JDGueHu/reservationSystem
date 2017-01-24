<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\field;
use App\sport;
use App\customer;
use App\availability_time;
use App\day;
use App\availability_field;
use App\availability_field_day;
use App\price;

class fieldsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields = field::orderby('name','ASC')->get();
        return view('management.fields.index')->with('fields',$fields);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sports = sport::orderby('name','ASC')->pluck('name','id');
        $customers = customer::orderby('name','ASC')->pluck('business_name','id');
        $durations = availability_time::orderby('duration','ASC')->pluck('initials','id');
        return view('management.fields.create')
                ->with('sports',$sports)
                ->with('customers',$customers)
                ->with('durations',$durations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $field = new field();
        $field->customer_id = $request->customer_id;
        $field->initials = $request->initials;
        $field->name = $request->name;
        $field->sport_id = $request->sport_id; 
        $field->availability_time_id = $request->availability_time_id; 
        $field->details = $request->details; 
        $field->save();

        flash('Escenario <b>'.$field->name.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('escenario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $field = field::find($id);
        $sports = sport::orderby('name','ASC')->pluck('name','id');
        $customers = customer::orderby('name','ASC')->pluck('business_name','id');
        $durations = availability_time::orderby('duration','ASC')->pluck('initials','id');
        return view('management.fields.show')
                ->with('field',$field)
                ->with('sports',$sports)
                ->with('customers',$customers)
                ->with('durations',$durations);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $field = field::find($id);
        $sports = sport::orderby('name','ASC')->pluck('name','id');
        $customers = customer::orderby('name','ASC')->pluck('business_name','id');
        $durations = availability_time::orderby('duration','ASC')->pluck('initials','id');
        return view('management.fields.edit')
                ->with('field',$field)
                ->with('sports',$sports)
                ->with('customers',$customers)
                ->with('durations',$durations);
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
        $field = field::find($id);
        $field->customer_id = $request->customer_id;
        $field->initials = $request->initials;
        $field->name = $request->name;
        $field->sport_id = $request->sport_id; 
        $field->availability_time_id = $request->availability_time_id; 
        $field->details = $request->details; 
        $field->save();

        flash('Escenario <b>'.$field->name.'</b> se modificó exitosamente', 'warning')->important();
        return redirect()->route('escenario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $field = field::find($id);
        $field->delete();

        flash('Escenario <b>'.$field->name.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('escenario.index'); 
    }

    public function disponibility($id)
    {
        $days = day::orderby('created_at','ASC')->get();
        $prices = price::orderby('created_at','ASC')->pluck('price','id');
        return view('management.fields.disponibility')
            ->with('days',$days)
            ->with('field_id',$id)
            ->with('prices',$prices);
    }

    public function disponibilityStore(Request $request)
    {
        if($request->ajax()){

        $availability_field = new availability_field();
        $availability_field->ini_hour = $request->ini_hour;
        $availability_field->fin_hour = $request->fin_hour;
        $availability_field->field_id = $request->field_id;
        $availability_field->save();        

        for($i=0;$i<count($request->days_checked);$i++){

            $availability_field_day = new availability_field_day();
            $availability_field_day->availability_field_id = $availability_field->id;
            $availability_field_day->day_id = $request->days_checked[$i];
            $availability_field_day->price_id = $request->prices[$i];
            $availability_field_day->save();

        }

        return response()->json(count($request->days_checked));

        }
    }


}
