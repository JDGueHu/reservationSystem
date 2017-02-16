<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class availability extends Model
{
	protected $table = "availabilities";
    protected $fillable = ['id','date','ini_hour','fin_hour','field_id','generate_availability_id','availability_status_id'];

    public function users()
    {
        return $this->belongsToMany('App\users','user_booking')->withTimestamps();
    }
}
