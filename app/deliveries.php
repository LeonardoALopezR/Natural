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
        return $this->hasOne(deliveries::class,'collect_id');
    }
    public function delivery()
    {
        return $this->belongsTo(deliveries::class,'collect_id');
    }
    public function weighing()
    {
       return $this->hasMany(weighings::class,'collection_id');
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
