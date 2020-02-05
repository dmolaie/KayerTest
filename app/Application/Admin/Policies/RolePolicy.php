<?php

namespace App\Application\Admin\Policies;

use App\Domains\Roles\Entities\Roles;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    public function before($user){
        if($user->isSuperAdmin()){
            return true;
        }
    }

    /**
     * Determine whether the user can view any roles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the roles.
     *
     * @param  \App\User  $user
     * @param  \App\Domains\Roles\Entities\Roles  $roles
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->role_id == config('roles.super_admin.id') ? true : false ;
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the roles.
     *
     * @param  \App\User  $user
     * @param  \App\Domains\Roles\Entities\Roles  $roles
     * @return mixed
     */
    public function update(User $user, Roles $roles)
    {
        //
    }

    /**
     * Determine whether the user can delete the roles.
     *
     * @param  \App\User  $user
     * @param  \App\Roles  $roles
     * @return mixed
     */
    public function delete(User $user, Roles $roles)
    {
        //
    }

    /**
     * Determine whether the user can restore the roles.
     *
     * @param  \App\User  $user
     * @param  \App\Roles  $roles
     * @return mixed
     */
    public function restore(User $user, Roles $roles)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the roles.
     *
     * @param  \App\User  $user
     * @param  \App\Roles  $roles
     * @return mixed
     */
    public function forceDelete(User $user, Roles $roles)
    {
        //
    }
}
