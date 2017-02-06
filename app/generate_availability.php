<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class generate_availability extends Model
{
	protected $table = "generate_availabilities";
    protected $fillable = ['customer_id'];
}
