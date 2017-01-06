<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone_type extends Model
{
	protected $table = "zone_types";
    protected $fillable = ['initials','name','priority'];

    public function zones(){
    	return $this->hasMany('App\Zone');
    }
}
