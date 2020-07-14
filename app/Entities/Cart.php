<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Jenssegers\Mongodb\Relations\HasMany;

class Cart extends Model
{
    protected $table = "cart";

    protected $fillable = [
        'user_id',
        'price',
        'description',
    ];

    /**
     * @return HasMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }


    /**
     * @return BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
