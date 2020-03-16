<?php

namespace Domains\Category\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
         $roleActiveUser = $user->roles()->wherePivot('status', '=', config('user.user_role_active_status'))->pluck('name')->toArray();
         if (in_array(config('role.roles.admin.name'),$roleActiveUser)) {
             return true;
         }
         return false;
    }


    public function createCategory()
    {
        return true;
       /* $userRolePermission = auth()->user()->roles()->with(['permissions' => function ($query) {
            $query->where('permissions.name', '=', 'createCategory')->select('name')->first();
        }])->get();
        $countPermiision = [];
        foreach ($userRolePermission as $item) {
            if (array_key_exists(0, $item->permissions->toArray())) {
                $countPermiision[] = $item->permissions->toArray()[0]['name'];
            }
        }
        if (count($countPermiision)) {
            return true;
        }
        return false;*/
    }
}