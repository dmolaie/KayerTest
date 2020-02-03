<?php

namespace App\Domains\Roles\Enitites;

use App\Domains\Roles\Entities\Roles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permissions extends Model
{
    protected $table = "permissions";

    /**
     * @return BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Roles::class);
    }
}
