<?php

namespace Domains\User\Entities;

use Domains\Role\Entities\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserRole extends Model
{

    protected $table='user_role';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'user_id',
        'status',
    ];

    /**
     * @return BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
