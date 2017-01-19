<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sport extends Model
{
	protected $table = "sports";
    protected $fillable = ['initials','name'];

    public function fields(){
    	return $this->hasMany('App\field');
    }
}
