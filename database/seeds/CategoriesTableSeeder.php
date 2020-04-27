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
            [
                'name_en'  => 'Nafas Celebration',
                'name_fa'  => 'جشن نفس',
                'slug'     => 'image-nafas-celebration',
                'type'     => 'image',
                'children' => []
            ],
            [
                'name_en'  => 'Nafas Festival',
                'name_fa'  => 'جشنواره نفس',
                'slug'     => 'image-nafas-festival',
                'type'     => 'image',
                'children' => []
            ],
            [
                'name_en'  => 'Nafas Feast',
                'name_fa'  => 'ضیافت نفس',
                'slug'     => 'image-nafas-feast',
                'type'     => 'image',
                'children' => []
            ],
            [
                'name_en'  => 'Ehda Story',
                'name_fa'  => 'داستان اهدا',
                'slug'     => 'text-ehda-story',
                'type'     => 'text',
                'children' => []
            ],
            [
                'name_en'  => 'Ehda Poetry',
                'name_fa'  => 'شعر اهدا',
                'slug'     => 'text-ehda-poetry',
                'type'     => 'text',
                'children' => []
            ],
            [
                'name_en'  => 'Personal Note',
                'name_fa'  => 'دلنوشته',
                'slug'     => 'text-personal-note',
                'type'     => 'text',
                'children' => []
            ],
            [
                'name_en'  => 'Music',
                'name_fa'  => 'موسیقی',
                'slug'     => 'voice-music',
                'type'     => 'voice',
                'children' => []
            ],
            [
                'name_en'  => 'Radio Interview',
                'name_fa'  => 'مصاحبه رادیویی',
                'slug'     => 'voice-radio-interview',
                'type'     => 'voice',
                'children' => []
            ],
            [
                'name_en'  => 'Nafas Celebration',
                'name_fa'  => 'جشن نفس',
                'slug'     => 'video-nafas-celebration',
                'type'     => 'video',
                'children' => []
            ],
            [
                'name_en'  => 'Nafas Festival',
                'name_fa'  => 'جشنواره نفس',
                'slug'     => 'video-nafas-festival',
                'type'     => 'video',
                'children' => []
            ],
            [
                'name_en'  => 'Nafas Feast',
                'name_fa'  => 'ضیافت نفس',
                'slug'     => 'video-nafas-feast',
                'type'     => 'video',
                'children' => []
            ],
            [
                'name_en'  => 'Movie',
                'name_fa'  => 'فیلم',
                'slug'     => 'video-movie',
                'type'     => 'video',
                'children' => []
            ],
            [
                'name_en'  => 'Animation',
                'name_fa'  => 'انیمیشن',
                'slug'     => 'video-animation',
                'type'     => 'video',
                'children' => []
            ],
            [
                'name_en'  => 'Serial',
                'name_fa'  => 'سریال',
                'slug'     => 'video-serial',
                'type'     => 'video',
                'children' => []
            ],
            [
                'name_en'  => 'Interview',
                'name_fa'  => 'مصاحبه',
                'slug'     => 'video-interview',
                'type'     => 'video',
                'children' => []
            ],

            [
                'name_en'  => 'Short Film',
                'name_fa'  => 'کلیپ کوتاه',
                'slug'     => 'video-short-film',
                'type'     => 'video',
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
