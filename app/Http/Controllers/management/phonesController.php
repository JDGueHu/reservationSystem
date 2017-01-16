<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\phone;

class phonesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){

            $phone = new phone();
            $phone->phone = $request->phone;
            $phone->owner = $request->owner;
            $phone->owner_id = $request->idView;
            $phone->phone_type_id = $request->phone_type_id;
            $phone->add_tmp = true;
            $phone->save();

            $phones = phone::where('owner_id','=',$request->idView)
                        ->orWhere('owner_id','=',$request->registerId)
                        ->join('phone_types','phones.phone_type_id', '=', 'phone_types.id')
                        ->select('phones.id','phone_types.name','phones.phone')
                        ->get();

            return response()->json($phones);
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        if($request->ajax()){

            $phone = phone::find($request->phoneId);
            $phone->delete();

            if($request->operation == "edit"){

            //retorna los registros de telefonos que tengan el mismo id de vista o el mismo id de cliente
            $phones = phone::where('owner_id','=',$request->idView)
                ->orWhere('owner_id','=',$request->registerId)
                ->join('phone_types','phones.phone_type_id', '=', 'phone_types.id')
                ->select('phones.id','phone_types.name','phones.phone')
                ->get();         

            }
            else{

            $phones = phone::where('owner_id','=',$request->idView)
                ->join('phone_types','phones.phone_type_id', '=', 'phone_types.id')
                ->get();

            }

            return response()->json($phones);
        }
    }
}
