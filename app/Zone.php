<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
	protected $table = "zones";
	protected $fillable = ['initials','name','zone_type_id','zone_id'];

    public function zone_type(){
    	return $this->belongsTo('App\Zone_type');
    }

    public function zones(){
    	return $this->hasMany('App\Zone');
    }

    public function zone(){
    	return $this->belongsTo('App\Zone');
    }




}
