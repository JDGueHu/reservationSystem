<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\generate_availability;
use App\availability;
use App\customer;
use App\field;
use App\day;
use App\configuration;
use App\availability_field_day_duration;
use Carbon\Carbon;
 
class generate_availabilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $availabilities = generate_availability::orderby('id','ASC')->get();
        return view('management.generate_availabilities.index')
            ->with('generarDisponibilidad',$availabilities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = customer::orderby('business_name','ASC')->pluck('business_name','id');
        return view('management.generate_availabilities.create')
            ->with('customers',$customers);
    }

    public function field_availabilities($field_id){

       //Buscar disponibilidad de cada escenario
       $availabilities = DB::table('availabilty_field_day_per_duration')
        ->where('availabilty_field_day_per_duration.field_id','=',$field_id)->get();    

        return $availabilities;
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

            //Se guarda registro de generacion de disponibilidades
            // $generate_availability = new generate_availability();
            // $generate_availability->customer_id = $request->customer_id;
            // $generate_availability->save();

            //Se consulta configuracion para obtener cantidad de dias reservables
            $reservable_day = configuration::where('configuration','=','booking_days')->get();
            $reservable_day = (Integer)$reservable_day[0]->value;

$date = Carbon::now();


            //Ciclar sobre los escenarios seleccionados para le generacion de reservas
            for($i=0;$i<count($request->fields_checked);$i++){

                //Disponibilidades de escenario
                $field_availabilities = $this->field_availabilities($request->fields_checked[$i]);

                
                $array[] = $date->addDay();
                

                //Ciclo sobre los dias reservables
                //for($k=0;$k<=$reservable_day;$k++){

                    //$code_day = day::day_code(day::day_names($date->dayOfWeek));

                    
                    //$date->addDays(1);

                    // //Disponibilidades por duracion de reserva para cada escenario
                    // $availabilities = availability_field_day_duration::where('field_id','=',$fields_checked[$i])->where('day_id','=',$code_day)->get();

                    // //Ciclo sobre disponibilidades por duracion de reserva para cada escenario
                    // foreach($availabilities as $availability){

                    //     $reservable = new availability(); 
                    //     $reservable->date =  $date->toDateString();
                    //     $reservable->ini_hour =  $availability->ini_hour;
                    //     $reservable->fin_hour =  $availability->fin_hour;
                    //     $reservable->field_id =  $request->fields_checked[$i];
                    //     $reservable->save();

               // }

                //}

            }

        return response()->json($array);

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
