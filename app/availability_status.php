<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class availability_status extends Model
{
	protected $table = "availability_status";
    protected $fillable = ['initials','status'];
}
