<?php

namespace Domains\Category\Policies;

use Domains\Role\Enitites\Permission;
use Domains\Role\Entities\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
       /* $roleActiveUser = $user->roles()->wherePivot('status', '=', config('user.user_role_active_status'))->pluck('name')->toArray();
        if (in_array(config('role.roles.admin.name'),$roleActiveUser)) {
            return true;
        }
        return false;*/
    }

    public function createCategory()
    {
        $roleActiveUser = auth()->user()->roles()->wherePivot('status', '=', config('user.user_role_active_status'))->pluck('roles.id')->toArray();
        dd(Permission::wherePivotIn('role_id','=',$roleActiveUser)->get());
        $permission = Role::whereIn('id',$roleActiveUser)->with('permissions')->get();

        dd($permission);


    /*    if (in_array(config('role.roles.manager.name'),$roleActiveUser)) {
            return true;
        }
        return false;*/
    }
}