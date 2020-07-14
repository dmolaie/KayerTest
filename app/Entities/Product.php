<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Jenssegers\Mongodb\Relations\HasOne;

class Product extends Model
{
    protected $table = "products";

    protected $fillable = [
        'name',
        'title',
        'description',
        'is_active',
        'image',
        'price',
        'group_id'
    ];

    /**
     * @return BelongsToMany
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'product_group');
    }

    /**
     * @return HasOne
     */
    public function stock()
    {
        return $this->hasOne(Stock::class);
    }

    /**
     * @return BelongsToMany
     */
    public function cart()
    {
        return $this->belongsToMany(Cart::class);
    }
}
