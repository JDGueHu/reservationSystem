<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
	protected $table = "roles";
    protected $fillable = ['initials','name'];

    public function permissions()
    {
        return $this->belongsToMany('App\permission','permission_role');
    }
}
