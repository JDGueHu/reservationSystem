<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class module extends Model
{
	protected $table = "modules";
    protected $fillable = ['table','name'];

    public function permissions(){
    	return $this->hasMany('App\permission');
    }
}
