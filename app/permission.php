<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
	protected $table = "permissions";
    protected $fillable = ['initials','module_id','name'];

    public function module(){
    	return $this->belongsTo('App\module');
    }

    public function roles()
    {
        return $this->belongsToMany('App\role');
    }
}
