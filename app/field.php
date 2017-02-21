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

    public function availability_time(){
    	return $this->belongsTo('App\availability_time');
    }

	public function availabilities()
    {
        return $this->hasMany('App\availability');
    }

}
