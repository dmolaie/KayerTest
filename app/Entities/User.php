<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Jenssegers\Mongodb\Relations\HasMany;

class User extends Model
{
    protected $table = "users";

    protected $fillable = [
        'name',
        'last_name'
    ];

    /**
     * @return HasMany
     */
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }


    /**
     * @return HasMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
