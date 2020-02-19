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
                "name"        => 'tehran',
                "slug"        => 'تهران',
                "province_id" => Province::first()->id
            ],

            [
                "name"        => 'varamin',
                "slug"        => 'ورامین',
                "province_id" => Province::first()->id
            ],
            [
                "name"        => 'shiraz test',
                "slug"        => 'شیراز',
                "province_id" => Province::latest('id')->first()->id
            ],

        ]);
    }
}
