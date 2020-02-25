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
        $rand = rand(10,1000);
        Category::insert([
                [
                    'name_en' => 'scientific test'. $rand,
                    'name_fa' => ' تست علمی'. $rand,
                ],
                [
                    'name_en' => 'sport test'. $rand,
                    'name_fa' => ' تست ورزشی'. $rand,
                ]
            ]
        );

        Category::insert([
            [
                'name_en'   => 'medical test'. $rand,
                'name_fa'   => 'پزشکی تست'. $rand,
                'parent_id' => Category::first()->id
            ]
        ]);
        Category::insert([
            [
                'name_en'   => 'Cardiovascular test'. $rand,
                'name_fa'   => 'قلب و عروق تست'. $rand,
                'parent_id' => Category::latest('id')->first()->id
            ]
        ]);
    }
}
