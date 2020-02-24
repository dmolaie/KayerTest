<?php

use Domains\Location\Entities\Province;
use Illuminate\Database\Seeder;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rand = rand(10,1000);
        Province::insert([
            [
                "name" => 'tehran test'.$rand,
                "slug" => '  تست تهران',
            ],

            [
                "name" => 'fars test'. $rand,
                "slug" => 'فارس تست',
            ],

        ]);
    }
}
