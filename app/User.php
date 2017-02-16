<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";
    protected $fillable = [
        'name','last_name','email', 'password', 'role_id', 'customer_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
    	return $this->belongsTo('App\role');
    }

    public function customer(){
    	return $this->belongsTo('App\customer');
    }

    public function availabilities()
    {
        return $this->belongsToMany('App\availability','user_booking')->withTimestamps();
    }

}
