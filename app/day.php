<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class day extends Model
{
	protected $table = "days";
    protected $fillable = ['initials','name'];

    public function availabilities_field()
    {
        return $this->belongsToMany('App\availability_field','availability_field_day')->withTimestamps();
    }


    public static function day_names($numberDayOfWeek){

        switch ($numberDayOfWeek) {
            case '1': return "Lunes"; break;
            case '2': return "Martes"; break;
            case '3': return "Miercoles"; break;
            case '4': return "Jueves"; break;
            case '5': return "Viernes"; break;
            case '6': return "Sabado"; break;
            case '0': return "Domingo"; break;
        }

    }

    public static function day_code($dayName){

        $day_code = day::where('name','=',$dayName)->get();

        return $day_code[0]->id;

    }
}
