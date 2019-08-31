<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class groups extends Model
{
    public function delivery()
    {
       return $this->hasMany(deliveries::class,'group_id');
    }
    public function vehicle()
    {
       return $this->belongsToMany(vehicles::class,'routes','vehicle_id','group_id');
    }
}
