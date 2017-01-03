<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone_type extends Model
{
	protected $table = "zone_types";
    protected $fillable = ['initials','name'];

    public function zones(){
    	return $this->hasMany('App\Zone');
    }

    public function scopeSearch($query,$data){

    return $query
        ->where('initials', 'LIKE', "%" . $data . "%")
        ->orWhere('name', 'LIKE', "%" . $data . "%")
        ->orWhere('priority', 'LIKE', "%" . $data . "%");

    }
}
