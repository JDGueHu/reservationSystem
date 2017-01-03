<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Identification_type extends Model
{
	protected $table = "identification_types";
    protected $fillable = ['initials','name'];

    public function scopeSearch($query,$data){

    return $query
        ->where('initials', 'LIKE', "%" . $data . "%")
        ->orWhere('name', 'LIKE', "%" . $data . "%");

    }
}
