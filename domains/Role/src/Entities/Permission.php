<?php

namespace Domains\Role\Enitites;

use Domains\Role\Entities\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model
{
    protected $table = "permissions";

    protected $fillable = [
        'name',
        'label',
        'model'
    ];

    /**
     * @return BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class,'permission_role')->withPivot('user_id');
    }
}
