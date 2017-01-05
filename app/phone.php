<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phone extends Model
{
	protected $table = "phones";
    protected $fillable = ['phone','phone_type_id'];

    public function phone_type(){
    	return $this->belongsTo('App\phone_type');
    }
}
