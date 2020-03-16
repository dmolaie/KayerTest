<?php

use Domains\Category\Entities\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rand = rand(10, 1000);
        Category::insert([
            [
                'name_en' => 'scientific',
                'name_fa' => 'علمی',
            ],
            [
                'name_en' => 'sport',
                'name_fa' => 'ورزشی',
            ],
        ]);
        Category::insert([
                [
                    'name_en' => 'article',
                    'name_fa' => 'مطلب',
                    'type'    => 'article',
                ],
                [
                    'name_en' => 'event',
                    'name_fa' => 'رویداد',
                    'type'    => 'event',
                ]
            ]
        );

        Category::insert([
            [
                'name_en'   => 'medical',
                'name_fa'   => 'پزشکی',
                'parent_id' => Category::first()->id
            ]
        ]);
        Category::insert([
            [
                'name_en'   => 'Cardiovascular',
                'name_fa'   => 'قلب و عروق',
                'parent_id' => Category::latest('id')->first()->id
            ]
        ]);
    }
}
