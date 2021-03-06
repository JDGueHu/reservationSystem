<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Identification_type;
use Laracasts\Flash\Flash;

class Identification_typesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $types = Identification_type::orderby('name','ASC')->get();
        return view('configuracion.identificationTypes.index')->with('types',$types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.identificationTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $type = new Identification_type();
        $type->initials = $request->initials;
        $type->name = $request->name;
        $type->save();

        flash('Tipo de documento <b>'.$type->name.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('tipoIdentificacion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = Identification_type::find($id);
        return view('configuracion.identificationTypes.show')->with('type',$type);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Identification_type::find($id);
        return view('configuracion.identificationTypes.edit')->with('type',$type);
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
        $type = Identification_type::find($id);
        $type->initials = $request->initials;
        $type->name = $request->name;
        $type->save();

        flash('Tipo de documento <b>'.$type->name.'</b> se modificó exitosamente', 'warning')->important();
        return redirect()->route('tipoIdentificacion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Identification_type::find($id);
        $type->delete();

        flash('Tipo de documento <b>'.$type->name.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('tipoIdentificacion.index'); 
    }
}
