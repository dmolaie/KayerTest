<?php

namespace Domains\Menu\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class MenuPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        $roleActiveUser = $user->roles()->wherePivot('status', '=', config('user.user_role_active_status'))->pluck('type')->toArray();
        if (in_array(config('role.roles.admin.name'),$roleActiveUser)) {
            return true;
        }
        return $this->deny(trans('user::response.authenticate.user_cant_access'),403);
    }

    public function list()
    {
    }
}