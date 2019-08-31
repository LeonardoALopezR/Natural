<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicles extends Model
{
    public function group()
    {
       return $this->belongsToMany(groups::class);
    }
    public function driver()
    {
       return $this->belongsToMany(drivers::class);
    }
}
