<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zone_type;
use Laracasts\Flash\Flash;

class Zone_typesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Zone_type::orderby('name','ASC')->paginate(10);
        return view('config.zoneTypes.index')->with('types',$types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('config.zoneTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = new Zone_type();
        $type->initials = $request->initials;
        $type->name = $request->name;
        $type->save();

        flash('Tipo de zona '.$type->name.' se creó exitosamente', 'success')->important();
        return redirect()->route('tipoZona.index');
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
        $type = Zone_type::find($id);
        return view('config.zoneTypes.edit')->with('type',$type);
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
        $type = Zone_type::find($id);
        $type->initials = $request->initials;
        $type->name = $request->name;
        $type->save();

        flash('Tipo de zona '.$type->name.' se modificó exitosamente', 'warning')->important();
        return redirect()->route('tipoZona.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Zone_type::find($id);
        $type->delete();

        flash('Tipo de zona '.$type->name.' se eliminó exitosamente', 'danger')->important();
        return redirect()->route('tipoZona.index'); 
    }
}
