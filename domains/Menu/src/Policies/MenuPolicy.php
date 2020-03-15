<?php

namespace Domains\Menu\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class MenuPolicy
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

    public function list()
    {
    }
}