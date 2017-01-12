<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phone extends Model
{
	protected $table = "phones";
    protected $fillable = ['phone','owner','owner_id','phone_type_id','add_tmp'];

    public function phoneType(){
    	return $this->belongsTo('App\phoneType');
    }

    public static function randomToken(){

        $cadena = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $token = "";

        for($i=0;$i<5;$i++){
            $token .= $cadena[rand(0,strlen($cadena)-1)];
        }

        return $token.rand(1, 1000000000);
    }

}
