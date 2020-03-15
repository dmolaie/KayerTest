<?php

use Domains\Role\Entities\Role;
use Illuminate\Database\Seeder;

class FakeAllDataMaker extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Role::first()) {
            $this->call(RoleTableSeeder::class);
        }
        $this->call(ProvinceTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(ArticleTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(MenusTableSeeder::class);

    }

}
