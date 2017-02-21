<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class availability_status extends Model
{
	protected $table = "availability_status";
    protected $fillable = ['initials','status'];

    public static function idStatus($statusName){

        $statusId = availability_status::where('status','=',$statusName)->get();

        return $statusId[0]->id;

    }

	public function availabilities()
    {
        return $this->hasMany('App\availability');
    }


}
