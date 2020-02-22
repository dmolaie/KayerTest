<?php

use Domains\Location\Entities\City;
use Domains\Role\Entities\Role;
use Domains\User\Entities\User;
use Domains\User\Entities\UserRole;
use Illuminate\Database\Seeder;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::all();

        foreach ($roles as $role){
            $this->makeUserRole($role);
        }

    }

    private function makeUserRole(Role $role)
    {
        $users = User::all();
        $status = ['active', 'pending', 'inactive'];
        foreach ($users as $user) {
           $userRole = new UserRole();
           $userRole->role_id = $role->id;
           $userRole->user_id = $user->id;
           $userRole->status = $status[rand(0,2)];
           $userRole->save();
        }
    }
}
