<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking_rule extends Model
{
	protected $table = "booking_rules";
    protected $fillable = ['rule','priority'];
}
