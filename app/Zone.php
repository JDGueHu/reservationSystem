<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
	protected $table = "zones";
    protected $fillable = ['initials','name'];

    public function zone_type(){
    	return $this->belongsTo('App\Zone_type');
    }
}
