<?php

namespace Domains\Location\Entities;


use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}