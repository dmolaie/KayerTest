<?php

namespace Domains\Location\Entities;


use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'province_id'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}