<?php

namespace App\Domains\Roles\Entities ;

use App\Domains\Roles\Enitites\Permissions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Roles extends Model
{
    protected $table = 'roles';


    /**
     * @return BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permissions::class,'permission_role','role_id','permission_id');
    }

}
