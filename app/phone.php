<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phone extends Model
{
	protected $table = "phones";
    protected $fillable = ['phone','owner','owner_id','phone_type_id','add_tmp'];

    public function phoneType(){
    	return $this->belongsTo('App\phoneType');
    }

}
