<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
	protected $table = "zones";
	protected $fillable = ['initials','name','zone_type_id','zone_id'];

    public function zone_type(){
    	return $this->belongsTo('App\Zone_type');
    }

    public function zones(){
    	return $this->hasMany('App\Zone');
    }

    public function zone(){
    	return $this->belongsTo('App\Zone');
    }

    public function customers(){
        return $this->hasMany('App\customer');
    }

    public static function getTypeZones($zone_id,$priority){
        return DB::table('zones')
            ->join('zone_types','zones.zone_type_id','=','zone_types.id')
            ->select('zones.id','zones.name')
            ->where('zone_types.priority','=',$priority -1)
            ->where('zones.id','!=',$zone_id)
            ->get();
    }

}
