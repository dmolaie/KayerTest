<?php

use Domains\Location\Entities\City;
use Domains\Role\Entities\Role;
use Domains\User\Entities\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
            $this->makeUser($role);
        }

    }

    private function makeUser(Role $role)
    {
        $identityNumber = rand(1111111111, 9999999999);
        $city = City::first();

        $user = new User();
        $user->name = 'ehda_'.$role->name;
        $user->email = 'ehda.'. $role->name.'.test.'.rand(0,1000).'.@gmail.com';
        $user->password = bcrypt('111111');
        $user->role_id = $role->id;
        $user->job_title = $role->name;
        $user->marital_status = 'single';
        $user->identity_number = $identityNumber;
        $user->city_of_birth = $city->id;
        $user->province_of_birth = $city->province->id;
        $user->city_of_work = $city->id;
        $user->province_of_work = $city->province->id;
        $user->phone = '02168477850';
        $user->current_city_id = $city->id;
        $user->current_province_id = $city->province->id;
        $user->mobile = '09168477850';
        $user->date_of_birth = '2020-02-16';
        $user->gender = 'male';
        $user->last_name = 'plus';
        $user->national_code = $identityNumber;
        $user->save();
    }
}
