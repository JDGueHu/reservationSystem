<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class day extends Model
{
	protected $table = "days";
    protected $fillable = ['initials','name'];

    public function availabilities_field()
    {
        return $this->belongsToMany('App\availability_field','availability_field_day')->withTimestamps();
    }
}
