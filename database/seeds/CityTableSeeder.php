<?php

use Domains\Location\Entities\City;
use Domains\Location\Entities\Province;
use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::insert([
            [
                "slug"        => 'tehran',
                "name"        => 'تهران',
                "province_id" => Province::first()->id
            ],

            [
                "slug"        => 'varamin',
                "name"        => 'ورامین',
                "province_id" => Province::first()->id
            ],
            [
                "slug"        => 'shiraz test',
                "name"        => 'شیراز',
                "province_id" => Province::latest('id')->first()->id
            ],

        ]);
    }
}
