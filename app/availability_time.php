<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class availability_time extends Model
{
	protected $table = "availability_time";
    protected $fillable = ['name','initials'];
}
