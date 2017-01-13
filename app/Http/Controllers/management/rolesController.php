<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\role;
use App\permission;

class rolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = role::orderby('name','ASC')->get();
        return view('management.roles.index')->with('roles',$roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('management.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = new role();
        $role->initials = $request->initials;
        $role->name = $request->name;
        $role->save();

        flash('Rol <b>'.$role->name.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('rol.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = role::find($id);
        return view('management.roles.show')->with('role',$role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = role::find($id);
        return view('management.roles.edit')->with('role',$role);
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
        $role = role::find($id);
        $role->initials = $request->initials;
        $role->name = $request->name;
        $role->save();

        flash('Rol <b>'.$role->name.'</b> se modificó exitosamente', 'warning')->important();
        return redirect()->route('rol.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = role::find($id);
        $role->delete();

        flash('Rol <b>'.$role->name.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('rol.index'); 
    }

    public function permissions($id)
    {
        $modules = DB::table('permissions')
            ->join('modules', 'permissions.module_id', '=', 'modules.id')
            ->select('modules.id', 'modules.name')
            ->distinct('modules.id','modules.name')
            ->get();

        $permissions = permission::orderby('name','ASC')->get();

        return view('management.roles.permissions')
            ->with('modules',$modules)
            ->with('permissions',$permissions); 
    }
}
