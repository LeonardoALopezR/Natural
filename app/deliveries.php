<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class deliveries extends Model
{
    public function producer()
    {
        return $this->belongsTo(producers::class);
    }
    public function collect()
    {
        return $this->hasOne(deliveries::class);
    }
    public function delivery()
    {
        return $this->belongsTo(deliveries::class);
    }
    public function weighing()
    {
       return $this->hasMany(weighings::class);
    }
    public function group()
    {
        return $this->belongsTo(groups::class);
    }
    public function note()
    {
       return $this->hasOne(notes::class);
    }
}
