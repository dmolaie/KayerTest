<?php

namespace Domains\Location\Entities;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}