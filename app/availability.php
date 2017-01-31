<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class availability extends Model
{
	protected $table = "availabilities";
    protected $fillable = ['date','ini_hour','fin_hour','field_id','availability_status_id'];
}
