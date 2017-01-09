<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\customer;
use App\Identification_type;
use App\phoneType;
use App\phone;
use App\Zone;

class customersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $customers = customer::orderby('name','ASC')->get();

        return view('management.customers.index')
            ->with('customers',$customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idView = "tmp".rand(1, 1000000000);
        $identificationTypes = Identification_type::orderby('name','ASC')->pluck('name','id');
        $phoneTypes = phoneType::orderby('name','ASC')->pluck('name','id');
        $zones = DB::table('zones')
                    ->join('zone_types', 'zones.zone_type_id', '=', 'zone_types.id')
                    ->select('zones.name','zones.id')
                    ->where('zone_types.name','=','CIUDAD')
                        ->pluck('name','id');

        return view('management.customers.create')
            ->with('identificationTypes',$identificationTypes)
            ->with('zones',$zones)
            ->with('phoneTypes',$phoneTypes)
            ->with('idView',$idView);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new customer();
        $customer->identification_type_id = $request->identification_type_id;
        $customer->identification = $request->identification;
        $customer->name = $request->name;
        $customer->business_name = $request->business_name;
        $customer->zone_id = $request->zone_id;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->save();

        $phones = phone::where('owner_id','=',$request->idView)->update(['owner_id' => $customer->id,'add_tmp' => false]);

        DB::table('phones')->where('add_tmp', '=', true)->delete();

        flash('Cliente <b>'.$customer->name.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('cliente.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = customer::find($id);
        $identificationTypes = Identification_type::orderby('name','ASC')->pluck('name','id');
        $phones = phone::where('owner_id','=',$customer->id)
                    ->join('phone_types','phones.phone_type_id', '=', 'phone_types.id')
                    ->get();
        $zones = DB::table('zones')
            ->join('zone_types', 'zones.zone_type_id', '=', 'zone_types.id')
            ->select('zones.name','zones.id')
            ->where('zone_types.name','=','CIUDAD')
                ->pluck('name','id');

        return view('management.customers.show')
                ->with('customer',$customer)
                ->with('identificationTypes',$identificationTypes)
                ->with('zones',$zones)
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
        $customer = customer::find($id);
        $idView = "tmp".rand(1, 1000000000);
        $identificationTypes = Identification_type::orderby('name','ASC')->pluck('name','id');
        $phones = phone::where('owner_id','=',$customer->id)
                    ->join('phone_types','phones.phone_type_id', '=', 'phone_types.id')
                    ->select('phone_types.name','phones.phone','phones.id')
                    ->get();
        $phoneTypes = phoneType::orderby('name','ASC')->pluck('name','id');
        $zones = DB::table('zones')
            ->join('zone_types', 'zones.zone_type_id', '=', 'zone_types.id')
            ->select('zones.name','zones.id')
            ->where('zone_types.name','=','CIUDAD')
                ->pluck('name','id');

        return view('management.customers.edit')
                ->with('customer',$customer)
                ->with('identificationTypes',$identificationTypes)
                ->with('zones',$zones)
                ->with('phones',$phones)
                ->with('phoneTypes',$phoneTypes)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
