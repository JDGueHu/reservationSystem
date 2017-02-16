<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking_state extends Model
{
	protected $table = "booking_status";
    protected $fillable = ['initials','status'];
}
