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
        $categories = [
            [
                'name_en'  => 'Iran News',
                'name_fa'  => 'اخبار ایران',
                'slug'     => 'iran-news',
                'type'     => 'news',
                'children' => [
                    [
                        'name_en'  => 'Provide and link',
                        'name_fa'  => 'فراهم آوری و پیوند',
                        'slug'     => 'iran-provide-and-link',
                        'type'     => 'news',
                        'children' => []
                    ],
                    [
                        'name_en'  => 'Internal Community',
                        'name_fa'  => 'داخلی انجمن',
                        'slug'     => 'iran-internal-community',
                        'type'     => 'news',
                        'children' => []
                    ],
                    [
                        'name_en'  => 'special news',
                        'name_fa'  => 'اخبار ویژه',
                        'slug'     => 'iran-special-news',
                        'type'     => 'news',
                        'children' => []
                    ],
                    [
                        'name_en'  => 'Public Broadcasting',
                        'name_fa'  => 'پخش همگانی',
                        'slug'     => 'iran-public-broadcasting',
                        'type'     => 'news',
                        'children' => []
                    ]
                ]
            ],
            [
                'name_en'  => 'World News',
                'name_fa'  => 'اخبار جهان',
                'slug'     => 'world-news',
                'type'     => 'news',
                'children' => [
                    [
                        'name_en'  => 'Provide and link',
                        'name_fa'  => 'فراهم آوری و پیوند',
                        'slug'     => 'world-provide-and-link',
                        'type'     => 'news',
                        'children' => []
                    ],
                    [
                        'name_en'  => 'Special news',
                        'name_fa'  => 'اخبار ویژه',
                        'slug'     => 'world-special-news',
                        'type'     => 'news',
                        'children' => []
                    ],
                ]
            ],
            [
                'name_en'  => 'Main Page',
                'name_fa'  => 'صفحه اصلی',
                'slug'     => 'main-page',
                'type'     => 'event',
                'children' => []
            ],
            [
                'name_en'  => 'Provide and link',
                'name_fa'  => 'رویداد های مهم',
                'slug'     => 'world-provide-and-link',
                'type'     => 'event',
                'children' => []
            ],
            [
                'name_en'  => 'Registrable',
                'name_fa'  => 'قابل ثبت نام',
                'slug'     => 'registrable',
                'type'     => 'event',
                'children' => []
            ],
            [
                'name_en'  => 'Main Page',
                'name_fa'  => 'صفحه اصلی',
                'slug'     => 'article-main-page',
                'type'     => 'article',
                'children' => []
            ],
            [
                'name_en'  => 'global persian',
                'name_fa'  => 'سراسری',
                'slug'     => 'global-fa',
                'type'     => 'news',
                'children' => []
            ],
        ];
        $this->registerCategories($categories);

    }

    private function registerCategories(array $categories, $parentId = null)
    {
        foreach ($categories as $categoryData){
            $category = new Category();
            $category->name_en = $categoryData['name_en'];
            $category->name_fa = $categoryData['name_fa'];
            $category->type = $categoryData['type'];
            $category->slug = $categoryData['slug'];
            $category->parent_id = $parentId;
            $category->is_active = true;
            $category->save();
            if($categoryData['children']){
                $this->registerCategories($categoryData['children'],$category->id);
            }

        }

    }
}
