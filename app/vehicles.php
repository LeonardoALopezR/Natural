<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicles extends Model
{
    public function group()
    {
       return $this->belongsToMany(groups::class,'routes','group_id','vehicle_id');
    }
    public function driver()
    {
       return $this->belongsToMany(drivers::class,'driver_vehicles','driver_id','vehicle_id');
    }
}
