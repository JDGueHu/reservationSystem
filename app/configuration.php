<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class configuration extends Model
{
	protected $table = "configurations";
    protected $fillable = ['configuration','value','description'];

}
