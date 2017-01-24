<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class availability_field extends Model
{
	protected $table = "availabilities_field";
    protected $fillable = ['ini_hour','fin_hour','field_id'];
}
