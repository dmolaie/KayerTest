<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Jenssegers\Mongodb\Relations\HasMany;

class Stock extends Model
{
    protected $table = "stocks";

    protected $fillable = [
        'product_id',
        'count_product'
    ];

    /**
     * @return HasMany
     */
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
