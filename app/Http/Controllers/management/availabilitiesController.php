<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\availability;
use App\customer;
use App\field;
use App\configuration;
use Carbon\Carbon;
 
class availabilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $availabilities = availability::orderby('date','ASC')->get();
        return view('management.availabilities.index')
            ->with('availabilities',$availabilities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = customer::orderby('business_name','ASC')->pluck('business_name','id');
        return view('management.availabilities.create')
            ->with('customers',$customers);
    }

    public function nameDays(){

        switch (date("N")) {
            case '1': return "Lunes";break;
            case '2': return "Martes";break;
            case '3': return "Miercoles";break;
            case '4': return "Jueves";break;
            case '5': return "Viernes";break;
            case '6': return "Sabado";break;
            case '7': return "Domingo";break;         
            default:break;
        }
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

            $today_name = $this->nameDays();

            //Obtener la cantidad de dias a los que se va a generar la reserva
            $booking_days = configuration::where('configuration','=','booking_days')
                            ->select('value')
                            ->get();                            
            //Casteo del resultado de string a int
            $booking_days = (integer) $booking_days[0]->value;

            for($i=0;$i<count($request->fields_checked);$i++){
                
                // Se obtiene la duracion de la reserva del escenario
                $availability_time = DB::table('fields')
                ->join('availability_time','fields.availability_time_id','=','availability_time.id')
                ->select('availability_time.duration')
                ->where('fields.id','=',$request->fields_checked[$i])->get();

                //Se obtienen las disponibilidades del escenario
                $availabilities = DB::table('availabilities_field')
                ->join('availability_field_day', 'availabilities_field.id', '=', 'availability_field_day.availability_field_id')
                ->join('days', 'availability_field_day.day_id', '=', 'days.id')
                ->join('prices', 'availability_field_day.price_id', '=', 'prices.id')
                ->select('availabilities_field.field_id','availabilities_field.ini_hour','availabilities_field.fin_hour','days.name as day','prices.price')
                ->where('availabilities_field.field_id','=',$request->fields_checked[$i])
                ->orderby('availabilities_field.ini_hour','ASC')->get();


            }

            return response()->json($availabilities);

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
    public function destroy($id)
    {
        //
    }


    public function showFields(Request $request)
    {
        if($request->ajax()){

            $fields = field::where('customer_id','=',$request->customer_id)->get();
            return response()->json($fields);
        }

    }

    public function showAvailabilities(Request $request)
    {
        if($request->ajax()){

            $availabilities = DB::table('availabilities_field')
                ->join('availability_field_day', 'availabilities_field.id', '=', 'availability_field_day.availability_field_id')
                ->join('days', 'availability_field_day.day_id', '=', 'days.id')
                ->join('prices', 'availability_field_day.price_id', '=', 'prices.id')
                ->select('availabilities_field.field_id','availabilities_field.ini_hour','availabilities_field.fin_hour','days.name','prices.price')
                ->where('availabilities_field.field_id','=',$request->field_id)
                ->orderby('availabilities_field.ini_hour','ASC')->get();


            return response()->json($availabilities);
        }

    }

}
