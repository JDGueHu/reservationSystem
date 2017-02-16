<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\availability;
use App\customer;
use App\field;
use App\user;
use App\sport;
use App\booking_rule;

class reservablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $customers = customer::orderby('business_name','ASC')->pluck('business_name','id');

        //Si todos los campos del filtro están vacios
        if(($request->customer_id == "" || $request->customer_id == null) && ($request->date == "" || $request->date == null)){
            
            $availabilities = DB::table('availabilities')
            ->join('fields', 'availabilities.field_id', '=', 'fields.id')
            ->where('fields.customer_id','=','X')
            ->select('availabilities.id','date','ini_hour','fin_hour','field_id','availability_status_id','enable')->get();

        }else{

            //Si está seleccionado el cliente
            if(($request->customer_id != "" || $request->customer_id != null) && ($request->date == "" || $request->date == null)){

                $availabilities = DB::table('availabilities')
                ->join('fields', 'availabilities.field_id', '=', 'fields.id')
                ->where('fields.customer_id','=',$request->customer_id)
                ->select('availabilities.id','date','ini_hour','fin_hour','field_id','availability_status_id','enable')->get();

            }else{

                //Si está seleccionado el cliente y el Escenario
                if(($request->customer_id != "" || $request->customer_id != null) && ($request->date != "" || $request->date != null)){

                    $availabilities = DB::table('availabilities')
                    ->join('fields', 'availabilities.field_id', '=', 'fields.id')
                    ->where('fields.customer_id','=',$request->customer_id)
                    ->where('availabilities.date','=',$request->date)
                    ->select('availabilities.id','date','ini_hour','fin_hour','field_id','availability_status_id','enable')->get();
                    
                }else{

                    $availabilities = DB::table('availabilities')
                    ->join('fields', 'availabilities.field_id', '=', 'fields.id')
                    ->where('availabilities.date','=',$request->date)
                    ->select('availabilities.id','date','ini_hour','fin_hour','field_id','availability_status_id','enable')->get();

                }
            }

        }

        return view('reservations.reservable.index')
            ->with('customers',$customers)
            ->with('customerSelected',$request->customer_id)
            ->with('dateSelected',$request->date)
            ->with('availabilities',$availabilities);
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
        //
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
    public function destroy($id)
    {
        //
    }

    public function enable_disable(Request $request){

        if($request->ajax()){

            $availability = availability::find($request->availability_id);
            $availability->enable = !$availability->enable;
            $availability->save();

            return response()->json($request->availability_id);

        }
        
    }


    public function reserva(Request $request,$availability_id){

        $users = user::orderby('last_name','ASC')->pluck('email','id');
        $availability = availability::find($availability_id);
        $field = field::find($availability->field_id);
        $sport = sport::find($field->sport_id);
        $rules = booking_rule::orderby('priority','ASC')->get();


        return view('reservations.reservable.reserva')
            ->with('availability',$availability)
            ->with('field',$field)
            ->with('sport',$sport)
            ->with('rules',$rules)
            ->with('users',$users);

    }

    public function reservaStore(Request $request){



    }



}
