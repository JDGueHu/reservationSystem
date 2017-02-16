<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_booking extends Model
{
	protected $table = "user_booking";
    protected $fillable = ['user_id','availability_id','booking_id','booking_state_id'];

}
