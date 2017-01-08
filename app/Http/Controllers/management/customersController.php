<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\customer;
use App\Identification_type;
use App\phoneType;
use App\Zone;

class customersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $customers = customer::orderby('name','ASC')->get();

        return view('management.customers.index')
            ->with('customers',$customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idView = "tmp".rand(1, 1000000000);
        $identificationTypes = Identification_type::orderby('name','ASC')->pluck('name','id');
        $phoneTypes = phoneType::orderby('name','ASC')->pluck('name','id');
        $zones = DB::table('zones')
                    ->join('zone_types', 'zones.zone_type_id', '=', 'zone_types.id')
                    ->select('zones.name','zones.id')
                    ->where('zone_types.name','=','CIUDAD')
                        ->pluck('name','id');

        return view('management.customers.create')
            ->with('identificationTypes',$identificationTypes)
            ->with('zones',$zones)
            ->with('phoneTypes',$phoneTypes)
            ->with('idView',$idView);
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
