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
        Province::insert([
            [
                "slug" => 'tehran',
                "name" => 'تهران',
            ],
            [
                "slug" => 'Alborz',
                "name" => 'البرز',
            ],
            [
                "slug" => 'Ardabil',
                "name" => 'اردبیل',
            ],
            [
                "slug" => 'Azerbaijan East',
                "name" => 'آذربایجان شرقی',
            ],
            [
                "slug" => 'Azerbaijan West',
                "name" => 'آذربایجان غربی',
            ],
            [
                "slug" => 'Bushehr',
                "name" => 'بوشهر',
            ],
            [
                "slug" => 'Chahar Mahaal and Bakhtiari',
                "name" => 'چهارمحال و بختیاری',
            ],
            [
                "slug" => 'Fars',
                "name" => 'فارس',
            ],
            [
                "slug" => 'Gilan',
                "name" => 'گیلان',
            ],
            [
                "slug" => 'Golestan',
                "name" => 'گلستان',
            ],
            [
                "slug" => 'Hamadan',
                "name" => 'همدان',
            ],
            [
                "slug" => 'Hormozgan',
                "name" => 'هرمزگان',
            ],
            [
                "slug" => 'Ilam',
                "name" => 'یزد',
            ],

        ]);
    }
}
