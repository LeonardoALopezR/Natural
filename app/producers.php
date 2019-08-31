<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producers extends Model
{
    public function delivery()
    {
       return $this->hasMany(deliveries::class,'producer_id');
    }
}
