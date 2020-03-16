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
                "name" => 'tehran',
                "slug" => 'تهران',
            ],
            [
                "name" => 'Alborz',
                "slug" => 'البرز',
            ],
            [
                "name" => 'Ardabil',
                "slug" => 'اردبیل',
            ],
            [
                "name" => 'Azerbaijan East',
                "slug" => 'آذربایجان شرقی',
            ],
            [
                "name" => 'Azerbaijan West',
                "slug" => 'آذربایجان غربی',
            ],
            [
                "name" => 'Bushehr',
                "slug" => 'بوشهر',
            ],
            [
                "name" => 'Chahar Mahaal and Bakhtiari',
                "slug" => 'چهارمحال و بختیاری',
            ],
            [
                "name" => 'Fars',
                "slug" => 'فارس',
            ],
            [
                "name" => 'Gilan',
                "slug" => 'گیلان',
            ],
            [
                "name" => 'Golestan',
                "slug" => 'گلستان',
            ],
            [
                "name" => 'Hamadan',
                "slug" => 'همدان',
            ],
            [
                "name" => 'Hormozgan',
                "slug" => 'هرمزگان',
            ],
            [
                "name" => 'Ilam',
                "slug" => 'یزد',
            ],

        ]);
    }
}
