<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\permission;
use App\module;

class permissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = permission::orderby('name','ASC')->get();
        return view('management.permissions.index')->with('permissions',$permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = module::orderby("name",'ASC')->pluck('name','id');
        return view('management.permissions.create')->with('modules',$modules);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permission = new permission();
        $permission->initials = $request->initials;
        $permission->module_id = $request->module_id;
        $permission->name = $request->name;
        $permission->save();

        flash('Permiso <b>'.$permission->name.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('permiso.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = permission::find($id);
        $modules = module::orderby("name",'ASC')->pluck('name','id');
        return view('management.permissions.show')   
            ->with('permission',$permission)
            ->with('modules',$modules);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = permission::find($id);
        $modules = module::orderby("name",'ASC')->pluck('name','id');
        return view('management.permissions.edit')
            ->with('permission',$permission)
            ->with('modules',$modules);
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
        $permission = permission::find($id);
        $permission->initials = $request->initials;
        $permission->module_id = $request->module_id;
        $permission->name = $request->name;
        $permission->save();

        flash('Permiso <b>'.$permission->name.'</b> se modificó exitosamente', 'warning')->important();
        return redirect()->route('permiso.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = permission::find($id);
        $permission->delete();

        flash('Permiso <b>'.$permission->name.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('permiso.index'); 
    }
}
