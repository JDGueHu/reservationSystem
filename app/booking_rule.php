<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking_rule extends Model
{
	protected $table = "booking_rules";
    protected $fillable = ['availability_id','user_id','booking_id','booking_state_id'];
}
