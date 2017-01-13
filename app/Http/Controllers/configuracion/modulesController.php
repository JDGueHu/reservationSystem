<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\module;

class modulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = module::orderby('name','ASC')->get();
        return view('configuracion.modules.index')->with('modules',$modules);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tables = DB::select('SHOW TABLES');
        return view('configuracion.modules.create')->with('tables',$tables);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $module = new module();
        $module->table = $request->table;
        $module->name = $request->name;
        $module->save();

        flash('Módulo <b>'.$module->name.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('modulo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $module = module::find($id);
        $tables = DB::select('SHOW TABLES');
        return view('configuracion.modules.show')
            ->with('module',$module)
            ->with('tables',$tables);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module = module::find($id);
        $tables = DB::select('SHOW TABLES');
        return view('configuracion.modules.edit')
            ->with('module',$module)
            ->with('tables',$tables);
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
        $module = module::find($id);
        $module->table = $request->table;
        $module->name = $request->name;
        $module->save();

        flash('Módulo <b>'.$module->name.'</b> se modificó exitosamente', 'warning')->important();
        return redirect()->route('modulo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = module::find($id);
        $module->delete();

        flash('Módulo <b>'.$module->name.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('modulo.index'); 
    }
}
