<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\configuration;

class configurationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configurations = configuration::orderby('configuration','ASC')->get();
        return view('configuracion.configurations.index')->with('configurations',$configurations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.configurations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $configuration = new configuration();
        $configuration->configuration = $request->configuration;
        $configuration->value = $request->value;
        $configuration->description = $request->description;
        $configuration->save();

        flash('Parámetro <b>'.$configuration->configuration.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('configuracion.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $configuration = configuration::find($id);
        return view('configuracion.configurations.show')->with('configuration',$configuration);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $configuration = configuration::find($id);
        return view('configuracion.configurations.edit')->with('configuration',$configuration);
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
        $configuration = configuration::find($id);
        $configuration->configuration = $request->configuration;
        $configuration->value = $request->value;
        $configuration->description = $request->description;
        $configuration->save();

        flash('Parámetro <b>'.$configuration->configuration.'</b> se modificó exitosamente', 'warning')->important();
        return redirect()->route('configuracion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $configuration = configuration::find($id);
        $configuration->delete();

        flash('Parámetro <b>'.$configuration->configuration.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('configuracion.index'); 
    }
}
