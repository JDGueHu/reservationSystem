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
    public function index(Request $request)
    {
        $types = Zone_type::orderby('priority','ASC')->get();;
        return view('configuracion.zoneTypes.index')->with('types',$types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $priority_ini = 1;
        $priority_fin = Zone_type::orderby('priority','ASC')->pluck('priority')->last();
        
        return view('configuracion.zoneTypes.create')
            ->with('priority_ini',$priority_ini)
            ->with('priority_fin',$priority_fin+1);
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
        $type->priority = $request->priority;
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
        $type = Zone_type::find($id);
        $priority_ini = 1;
        $priority_fin = Zone_type::orderby('priority','ASC')->pluck('priority')->last();
        return view('configuracion.zoneTypes.show')
            ->with('priority_ini',$priority_ini)
            ->with('priority_fin',$priority_fin+1)
            ->with('type',$type);
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
        $priority_ini = 1;
        $priority_fin = Zone_type::orderby('priority','ASC')->pluck('priority')->last();
        return view('configuracion.zoneTypes.edit')
            ->with('priority_ini',$priority_ini)
            ->with('priority_fin',$priority_fin+1)
            ->with('type',$type);
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
        $type->priority = $request->priority;
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
