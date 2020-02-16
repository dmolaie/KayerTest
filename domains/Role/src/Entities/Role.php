<?php

namespace Domains\Role\Entities ;

use App\Domains\Role\Enitites\Permission;
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
        return $this->belongsToMany(Permission::class,'permission_role','role_id','permission_id');
    }

}
