<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
	protected $table = "user_booking";
    protected $fillable = ['identificaction','name','address','email','business_name','identification_type_id','zone_id'];
}
