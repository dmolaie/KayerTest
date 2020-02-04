<?php

use App\Domains\Roles\Entities\Roles;
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
        Roles::insert([
            [
                'id' => 1,
                'name' => 'admin',
                'label' => 'ادمین',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'id' => 2,
                'name' => 'manager',
                'label' => 'مدیر',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'id' => 3,
                'name' => 'legate',
                'label' => 'سفیر',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'id' => 4,
                'name' => 'client',
                'label' => 'کاربر عادی',
                'created_at' => \Carbon\Carbon::now()
            ]
        ]);
    }
}
