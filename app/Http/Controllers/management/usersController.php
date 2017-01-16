<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\phone;
use App\phoneType;
use App\customer;
use App\role;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderby('name','ASC')->get();
        return view('management.users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idView = phone::randomToken();
        $phoneTypes = phoneType::orderby('name','ASC')->pluck('name','id');
        $roles = role::orderby('name','ASC')->pluck('name','id');
        $customers = customer::orderby('name','ASC')->pluck('name','id');

        return view('management.users.create')
            ->with('idView',$idView)
            ->with('phoneTypes',$phoneTypes)
            ->with('roles',$roles)
            ->with('customers',$customers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new user();
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->name);
        $user->role_id = $request->role_id;
        $user->customer_id = $request->customer_id;
        $user->save();

        $phones = phone::where('owner_id','=',$request->idView)->update(['owner_id' => $user->id,'add_tmp' => false]);

        flash('Usuario <b>'.$user->name.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('usuario.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $roles = role::orderby('name','ASC')->pluck('name','id');
        $customers = customer::orderby('name','ASC')->pluck('name','id');
        $phones = phone::where('owner','=',"user")
            ->where('owner_id','=',$user->id)            
            ->join('phone_types','phones.phone_type_id', '=', 'phone_types.id')
            ->select('phone_types.name','phones.phone','phones.id')
            ->get();

            return view('management.users.show')
                ->with('user',$user)
                ->with('roles',$roles)
                ->with('customers',$customers)
                ->with('phones',$phones);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $idView = phone::randomToken();
        $roles = role::orderby('name','ASC')->pluck('name','id');
        $customers = customer::orderby('name','ASC')->pluck('name','id');
        $phoneTypes = phoneType::orderby('name','ASC')->pluck('name','id');
        $phones = phone::where('owner','=',"user")
            ->where('owner_id','=',$user->id)
            ->join('phone_types','phones.phone_type_id', '=', 'phone_types.id')
            ->select('phone_types.name','phones.phone','phones.id')
            ->get();

        return view('management.users.edit')
            ->with('user',$user)
            ->with('roles',$roles)
            ->with('customers',$customers)
            ->with('phoneTypes',$phoneTypes)
            ->with('phones',$phones)
            ->with('idView',$idView);

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
        $user = User::find($id);
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->customer_id = $request->customer_id;
        $user->save();

        $phones = phone::where('owner_id','=',$request->idView)->update(['owner_id' => $user->id,'add_tmp' => false]);

        flash('Usuario <b>'.$user->name.'</b> se modificó exitosamente', 'warning')->important();
        return redirect()->route('usuario.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        DB::table('phones')->where('owner_id', '=', $id)->delete();

        flash('Usuario <b>'.$user->name.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('usuario.index'); 
    }
}
