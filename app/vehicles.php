<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicles extends Model
{
    public function group()
    {
       return $this->belongsToMany(groups::class,'routes')->withPivot('departureTime','arrivalTime')->withTimestamps();
    }
    public function driver()
    {
       return $this->belongsToMany(drivers::class,'driver_vehicles','driver_id','vehicle_id');
    }
}
