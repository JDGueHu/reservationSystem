<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zone;
use App\Zone_type;

class ZonesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $zones = Zone::Search($request->search)->orderby('name','ASC')->paginate(10);
        return view('configuracion.zone.index')->with('zones',$zones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zones = ["" => ""];
        $zoneTypes = Zone_type::orderby('name','ASC')->pluck('name','id');

        return view('configuracion.zone.create')
            ->with('zones',$zones)
                ->with('zoneTypes',$zoneTypes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $zone = new Zone();
        $zone->initials = $request->initials;
        $zone->name = $request->name;
        $zone->zone_type_id = $request->zone_type_id;
        if($request->zone_id != null){ $zone->zone_id = $request->zone_id; }
        else{ $zone->zone_id = null; }
        $zone->save();

        flash('Zona '.$zone->name.' se creó exitosamente', 'success')->important();
        return redirect()->route('zona.index');
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
        $zone = Zone::find($id);
        $zoneTypes = Zone_type::orderby('name','ASC')->pluck('name','id');
        $zones = Zone::orderby('name','ASC')->pluck('name','id');
        return view('configuracion.zone.edit')
            ->with('zone',$zone)
                ->with('zoneTypes',$zoneTypes)
                    ->with('zones',$zones);
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
        $zone = Zone::find($id);
        $zone->initials = $request->initials;
        $zone->name = $request->name;
        $zone->zone_type_id = $request->zone_type_id;
        if($request->zone_id != null){ $zone->zone_id = $request->zone_id; }
        else{ $zone->zone_id = null; }
        $zone->save();

        flash('Zona '.$zone->name.' se modificó exitosamente', 'warning')->important();
        return redirect()->route('zona.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zone = Zone::find($id);
        $zone->delete();


        flash('Zona '.$zone->name.' se eliminó exitosamente', 'danger')->important();
        return redirect()->route('zona.index'); 
    }

    public function getTypeZones(Request $request,$zone_id,$zone_type_id){
        if($request->ajax()){
            $zone = Zone_type::find($zone_type_id);
            $zones = Zone::getTypeZones($zone_id,$zone->priority);
            return response()->json($zones);
        }
    }

}
