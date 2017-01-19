<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
	protected $table = "customers";
    protected $fillable = ['identificaction','name','address','email','business_name','identification_type_id','zone_id'];

    public function zone(){
    	return $this->belongsTo('App\Zone');
    }

    public function identification_type(){
    	return $this->belongsTo('App\Identification_type');
    }

    public function users(){
    	return $this->hasMany('App\User');
    }

}
