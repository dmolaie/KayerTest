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
                'priority'   => '1',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id'         => 2,
                'name'       => 'manager',
                'type'       => 'manager',
                'label'      => 'مدیر',
                'priority'   => '2',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],

            [
                'id'         => 4,
                'name'       => 'client',
                'type'       => 'client',
                'label'      => 'کاربر عادی',
                'priority'   => '5',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id'         => 3,
                'name'       => 'support',
                'type'       => 'support',
                'label'      => 'پشتیبان',
                'priority'   => '4',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        ]);

        foreach (Province::all() as $province) {

            Role::insert([
                'name'        => 'legate_' . $province->slug,
                'type'        => 'legate',
                'label'       => 'سفیر ' . $province->name,
                'priority'    => '3',
                'province_id' => $province->id,
                'created_at'  => \Carbon\Carbon::now(),
                'updated_at'  => \Carbon\Carbon::now()
            ]);
        }
    }
}
