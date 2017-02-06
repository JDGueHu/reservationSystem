<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class availability_field_day_duration extends Model
{
	protected $table = "availabilty_field_day_per_duration";
    protected $fillable = ['ini_hour','fin_hour','field_id','availability_field_id','day_id','	price_id'];
}
