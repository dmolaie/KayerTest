<?php

namespace App\Domaines\Roles\Entities ;

use App\Domains\Roles\Enitites\Permissions;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Roles extends Model
{
    protected $table = 'roles';

    /**
     * @return HasMany
     */
    public function user()
    {
        return $this->hasMany(User::class);
    }

    /**
     * @return BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permissions::class);
    }

}
