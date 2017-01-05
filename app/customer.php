<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
	protected $table = "customers";
    protected $fillable = ['identificaction','name','address','email','business_name','identification_type_id','zone_id'];
}
