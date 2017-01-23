<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\field;
use App\sport;
use App\customer;
use App\availability_time;

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
}
