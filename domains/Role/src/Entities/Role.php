<?php

namespace Domains\Role\Entities;

use Domains\Location\Entities\Province;
use Domains\Role\Enitites\Permission;
use Domains\User\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'label',
        'type',
        'province_id'
    ];

    /**
     * @return BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_role', 'role_id', 'user_id');

    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

}
