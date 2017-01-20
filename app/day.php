<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class day extends Model
{
	protected $table = "days";
    protected $fillable = ['initials','name'];
}
