<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class field extends Model
{

	protected $table = "fields";
    protected $fillable = ['initials','name','details','sport_id','customer_id'];

    public function sport(){
    	return $this->belongsTo('App\sport');
    }
}
