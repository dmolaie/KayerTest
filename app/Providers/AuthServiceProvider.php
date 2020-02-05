<?php

namespace App\Providers;

use App\Application\Admin\Policies\RolePolicy;
use App\Domains\Roles\Enitites\Permissions;
use App\Domains\Roles\Entities\Roles as RolesAdmin;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        RolesAdmin::class => RolePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        foreach ($this->getPermissions() as $permission) {
            Gate::define($permission->name, function ($user) use ($permission) {
                return $user->hasRole($permission->roles);
            });
        }

    }

    protected function getPermissions() {
        return Permissions::with('roles')->get();
    }

}
