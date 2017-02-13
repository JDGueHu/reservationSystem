<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\availability;
use App\customer;
use App\field;

class reservablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $customers = customer::orderby('business_name','ASC')->pluck('business_name','id');
        $fields = field::where('customer_id','=',$request->customer_id)->pluck('name','id');
       
        $availabilities = DB::table('availabilities')
            ->select('date','ini_hour','fin_hour','field_id','availability_status_id','enable')->get();

       //dd($request->date);
        return view('reservations.reservable.index')
            ->with('customers',$customers)
            ->with('fields',$fields)
            ->with('customerSelected',$request->customer_id)
            ->with('fieldSelected',$request->field_id)
            ->with('dateSelected',$request->date)
            ->with('availabilities',$availabilities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    public function showFields(Request $request){

        if($request->ajax()){

            $fields = field::where('customer_id','=',$request->customer_id)
                ->select('name','id')->get();
            return response()->json($fields);

        }

    }
}
