<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class weighings extends Model
{
    public function delivery()
    {
        return $this->belongsTo(deliveries::class);
    }
}
