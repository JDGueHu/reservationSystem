<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\availability_field;
use App\day;
use App\price;

class availabilities_fieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($field_id)
    {
        $availabilities_field = availability_field::orderby('ini_hour','ASC')->get();

        return view('management.availabilities_field.index')
            ->with('availabilities_field',$availabilities_field)
            ->with('field_id',$field_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($field_id)
    {
        $days = day::orderby('created_at','ASC')->get();
        $prices = price::orderby('created_at','ASC')->pluck('price','id');
        return view('management.availabilities_field.create')
        ->with('days',$days)
        ->with('prices',$prices)
        ->with('field_id',$field_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
