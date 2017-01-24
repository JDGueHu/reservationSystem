<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class availability_field_day extends Model
{
	protected $table = "availability_field_day";
    protected $fillable = ['availability_field_id','day_id','price_id'];
}
