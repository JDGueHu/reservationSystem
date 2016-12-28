<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone_type extends Model
{
	protected $table = "zone_types";
    protected $fillable = ['initials','name','zone_type_id','zone_id'];

    public function zones(){
    	return $this->hasMany('App\Zone');
    }
}
