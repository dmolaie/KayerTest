<?php

use Domains\Location\Entities\Province;
use Domains\Role\Entities\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            [
                'id'         => 1,
                'name'       => 'admin',
                'label'      => 'ادمین',
                'type'       => 'admin',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id'         => 2,
                'name'       => 'manager',
                'type'       => 'manager',
                'label'      => 'مدیر',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],

            [
                'id'   => 4,
                'name' => 'client',
                'type' => 'client',
                'label'      => 'کاربر عادی',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        ]);

        foreach (Province::all() as $province){

            Role::insert([
                'name'       => 'legate_' . $province->slug,
                'type'       => 'legate',
                'label'      => 'سفیر '. $province->name,
                'province_id'=> $province->id,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
        }
    }
}
