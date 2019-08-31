<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class drivers extends Model
{
    public function vehicle()
    {
       return $this->belongsToMany(vehicles::class,'driver_vehicles','vehicle_id','driver_id');
    }
}
