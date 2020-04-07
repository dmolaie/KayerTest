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
                "name" => 'ایلام',
            ],
            [
                "slug" => 'Isfahan',
                "name" => 'اصفهان',
            ],
            [
                "slug" => 'Kerman',
                "name" => 'کرمان',
            ],
            [
                "slug" => 'Kermanshah',
                "name" => 'کرمانشاه',
            ],
            [
                "slug" => 'Khorasan North',
                "name" => 'خراسان شمالی',
            ],
            [
                "slug" => 'Khorasan Razavi',
                "name" => 'خراسان رضوی',
            ],
            [
                "slug" => 'Khorasan South',
                "name" => 'خراسان شمالی',
            ],
            [
                "slug" => 'Khuzestan',
                "name" => 'خوزستان',
            ],
            [
                "slug" => 'Kohgiluyeh and Boyer-Ahmad',
                "name" => 'کهگیلویه و بویراحمد',
            ],
            [
                "slug" => 'Kurdistan',
                "name" => 'کردستان',
            ],
            [
                "slug" => 'Lorestan',
                "name" => 'لرستان',
            ],
            [
                "slug" => 'Markazi',
                "name" => 'مرکزی',
            ],
            [
                "slug" => 'Mazandaran',
                "name" => 'مازندران',
            ],
            [
                "slug" => 'Qazvin',
                "name" => 'قزوین',
            ],
            [
                "slug" => 'Qom',
                "name" => 'قم',
            ],
            [
                "slug" => 'Semnan',
                "name" => 'سمنان',
            ],
            [
                "slug" => 'Sistan and Baluchestan',
                "name" => 'سیستان و بلوچستان',
            ],
            [
                "slug" => 'Zanjan',
                "name" => 'زنجان',
            ],
            [
                "slug" => 'yazd',
                "name" => 'یزد',
            ],

        ]);
    }
}
