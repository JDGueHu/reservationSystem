<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\phoneType;

class phoneTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $types = phoneType::orderby('name','ASC')->get();
       return view('configuracion.phoneTypes.index')
            ->with('types',$types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.phoneTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = new phoneType;
        $type->initials = $request->initials;
        $type->name = $request->name;
        $type->save();

        flash('Tipo de teléfono <b>'.$type->name.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('tipoTelefono.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = phoneType::find($id);
        return view('configuracion.phoneTypes.show')
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
        $type = phoneType::find($id);
        return view('configuracion.phoneTypes.edit')
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
        $type = phoneType::find($id);
        $type->initials = $request->initials;
        $type->name = $request->name;
        $type->save();

        flash('Tipo de teléfono <b>'.$type->name.'</b> se modificó exitosamente', 'warning')->important();
        return redirect()->route('tipoTelefono.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = phoneType::find($id);
        $type->delete();

        flash('Tipo de teléfono <b>'.$type->name.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('tipoTelefono.index'); 
    }
}
