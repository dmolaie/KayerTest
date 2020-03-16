<?php

namespace Domains\Role\Entities ;

use Domains\Role\Enitites\Permission;
use Domains\User\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    protected $table = 'roles';


    /**
     * @return BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'permission_role');
    }

    public function users(){
        return $this->belongsToMany(User::class, 'user_role', 'role_id', 'user_id');

    }

}
