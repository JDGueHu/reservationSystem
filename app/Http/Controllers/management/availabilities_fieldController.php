<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\availability_field;
use App\availability_field_day;
use App\day;
use App\price;
use App\field;
use App\availability_field_day_duration;

class availabilities_fieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($field_id)
    {
        $availabilities_field = availability_field::where('field_id','=',$field_id)->orderby('ini_hour','ASC')->get();

        return view('management.availabilities_field.index')
            ->with('availabilities_field',$availabilities_field)
            ->with('field_id',$field_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($field_id)
    {
        $days = day::orderby('created_at','ASC')->get();
        $prices = price::orderby('created_at','ASC')->pluck('initials','id');
        return view('management.availabilities_field.create')
        ->with('days',$days)
        ->with('prices',$prices)
        ->with('field_id',$field_id);
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

            $availability_field = new availability_field();
            $availability_field->ini_hour = $request->ini_hour;
            $availability_field->fin_hour = $request->fin_hour;
            $availability_field->field_id = $request->field_id;
            $availability_field->save();  

            // Se obtiene la duracion de reserva del escenario
            $availability_time = DB::table('fields')
            ->join('availability_time','fields.availability_time_id','=','availability_time.id')
            ->select('availability_time.duration')
            ->where('fields.id','=',$request->field_id)->get();      

            for($i=0;$i<count($request->days_checked);$i++){

                $availability_field_day = new availability_field_day();
                $availability_field_day->availability_field_id = $availability_field->id;
                $availability_field_day->day_id = $request->days_checked[$i];
                $availability_field_day->price_id = $request->prices[$i];
                $availability_field_day->save();

                //Variable para controlar el rango horario de cada disponibilidad
                //Se convierte el date en numero para procesarlo
                $time = date("H:i:s", ($request->ini_hour + 0)*60*60);


                for($j=0;$j <(($request->fin_hour - $request->ini_hour)*$availability_time[0]->duration);$j=$j+$availability_time[0]->duration){

                //     $availability_per_duration = new availability_field_day_duration();
                //     $availability_per_duration->ini_hour = $time;
                //     $availability_per_duration->fin_hour = date("H:i", ($time + ($availability_time[0]->duration/60))*60*60) ;
                //     $availability_per_duration->availability_field_id = $availability_field->id;
                //     $availability_per_duration->day_id = $request->days_checked[$i];
                //     $availability_per_duration->price_id = $request->prices[$i];
                //     $availability_per_duration->save();
                    
                    $times[] = (($time + 0)*60*60 + ($availability_time[0]->duration/60)*60*60);
                    $time = date("H:i:s" , (($time + 0)*60*60 + ($availability_time[0]->duration/60)*60*60));

                }

            }

            return response()->json(date("H:i:s", 30600));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($field_id,$availability_field_id)
    {
        $availability_field = availability_field::find($availability_field_id);
        $days = day::orderby('created_at','ASC')->get();
        $prices = price::orderby('created_at','ASC')->pluck('initials','id');

        $days_availabilities_per_field =  availability_field::find($availability_field_id)->days()->pluck('days.id');

        $prices_availabilities_per_field =  availability_field_day::where('availability_field_id','=',$availability_field_id)->pluck('price_id');

        return view('management.availabilities_field.show')
            ->with('availability_field',$availability_field)
            ->with('days',$days)
            ->with('prices',$prices)
            ->with('field_id',$field_id)
            ->with('prices_availabilities_per_field',$prices_availabilities_per_field)
            ->with('days_availabilities_per_field',$days_availabilities_per_field);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($field_id,$availability_field_id)
    {
        $availability_field = availability_field::find($availability_field_id);
        $days = day::orderby('created_at','ASC')->get();
        $prices = price::orderby('created_at','ASC')->pluck('initials','id');

        $days_availabilities_per_field =  availability_field::find($availability_field_id)->days()->pluck('days.id');

        $prices_availabilities_per_field =  availability_field_day::where('availability_field_id','=',$availability_field_id)->pluck('price_id');

        return view('management.availabilities_field.edit')
            ->with('availability_field',$availability_field)
            ->with('days',$days)
            ->with('prices',$prices)
            ->with('field_id',$field_id)
            ->with('prices_availabilities_per_field',$prices_availabilities_per_field)
            ->with('days_availabilities_per_field',$days_availabilities_per_field);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->ajax()){

            $availability_field_day = availability_field_day::where('availability_field_id','=',$request->availability_field_id)->delete();

            $availability_field = availability_field::find($request->availability_field_id);
            $availability_field->ini_hour = $request->ini_hour;
            $availability_field->fin_hour = $request->fin_hour;
            $availability_field->save();  

            for($i=0;$i<count($request->days_checked);$i++){

                $availability_field_day = new availability_field_day();
                $availability_field_day->availability_field_id = $request->availability_field_id;
                $availability_field_day->day_id = $request->days_checked[$i];
                $availability_field_day->price_id = $request->prices[$i];
                $availability_field_day->save();

            }

            return response()->json($request->availability_field_id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($field_id,$availability_field_id)
    {
        //Eliminar dias de la disponibilidad
        $availability_field_day = availability_field_day::where('availability_field_id','=',$availability_field_id)->delete();

        //Eliminar duraciones de las disponibilidades
        $availability_field_day_duration = availability_field_day_duration::where('availability_field_id','=',$availability_field_id)->delete();

        $availability_field = availability_field::find($availability_field_id);
        $availability_field->delete();

        flash('La disponibilidad del escenario se eliminó exitosamente', 'danger')->important();
        return redirect()->route('disponibilidadEscenario.index',$field_id); 
    }
}
