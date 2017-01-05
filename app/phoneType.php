<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phoneType extends Model
{
	protected $table = "phone_types";
    protected $fillable = ['initials','name'];

    public function phones(){
    	return $this->hasMany('App\phone');
    }
}
