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
                "slug" => 'alborz',
                "name" => 'البرز',
            ],
            [
                "slug" => 'ardabil',
                "name" => 'اردبیل',
            ],
            [
                "slug" => 'eastAzerbaijan',
                "name" => 'آذربایجان شرقی',
            ],
            [
                "slug" => 'westAzerbaijan',
                "name" => 'آذربایجان غربی',
            ],
            [
                "slug" => 'bushehr',
                "name" => 'بوشهر',
            ],
            [
                "slug" => 'chaharmahalBakhtiari',
                "name" => 'چهارمحال و بختیاری',
            ],
            [
                "slug" => 'fars',
                "name" => 'فارس',
            ],
            [
                "slug" => 'gilan',
                "name" => 'گیلان',
            ],
            [
                "slug" => 'golestan',
                "name" => 'گلستان',
            ],
            [
                "slug" => 'hamadan',
                "name" => 'همدان',
            ],
            [
                "slug" => 'hormozgan',
                "name" => 'هرمزگان',
            ],
            [
                "slug" => 'ilam',
                "name" => 'ایلام',
            ],
            [
                "slug" => 'isfahan',
                "name" => 'اصفهان',
            ],
            [
                "slug" => 'kerman',
                "name" => 'کرمان',
            ],
            [
                "slug" => 'kermanshah',
                "name" => 'کرمانشاه',
            ],
            [
                "slug" => 'northKhorasan',
                "name" => 'خراسان شمالی',
            ],
            [
                "slug" => 'southKhorasan',
                "name" => 'خراسان جنوبی',
            ],
            [
                "slug" => 'razaviKhorasan ',
                "name" => 'خراسان رضوی',
            ],
            [
                "slug" => 'khuzestan',
                "name" => 'خوزستان',
            ],
            [
                "slug" => 'kohgiluyeh',
                "name" => 'کهگیلویه و بویراحمد',
            ],
            [
                "slug" => 'kurdistan',
                "name" => 'کردستان',
            ],
            [
                "slug" => 'lorestan',
                "name" => 'لرستان',
            ],
            [
                "slug" => 'markazi',
                "name" => 'مرکزی',
            ],
            [
                "slug" => 'mazandaran',
                "name" => 'مازندران',
            ],
            [
                "slug" => 'qazvin',
                "name" => 'قزوین',
            ],
            [
                "slug" => 'qom',
                "name" => 'قم',
            ],
            [
                "slug" => 'semnan',
                "name" => 'سمنان',
            ],
            [
                "slug" => 'sistanBaluchestan',
                "name" => 'سیستان و بلوچستان',
            ],
            [
                "slug" => 'zanjan',
                "name" => 'زنجان',
            ],
            [
                "slug" => 'yazd',
                "name" => 'یزد',
            ],
            [
                "slug" => 'global-fa',
                "name" => 'سراسری',
            ]
        ]);
    }
}
