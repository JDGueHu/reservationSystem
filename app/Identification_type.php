<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Identification_type extends Model
{
	protected $table = "identification_types";
    protected $fillable = ['initials','name'];

    public function customers(){
    	return $this->hasMany('App\customer');
    }

}
