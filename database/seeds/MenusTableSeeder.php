<?php

use Carbon\Carbon;
use Domains\Category\Entities\Category;
use Domains\Menu\Repositories\MenusRepository;
use Domains\Menu\Services\Contracts\DTOs\MenusCreateDTO;
use Domains\User\Entities\User;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $main_menu = [
            [
                'name'     => 'about community',
                'title'    => 'درباره‌ی انجمن',
                'alias'    => 'about-community',
                'type'     => 'separator',
                'priority' => 1,
                'children' => [
                    [
                        'name'       => 'ngo history',
                        'title'      => 'تاریخچه انجمن',
                        'alias'      => 'ngo-history',
                        'type'       => 'article',
                        'article_id' => 1,
                        'priority'   => 1
                    ],
                    [
                        'name'       => 'interactions',
                        'title'      => 'تعاملات',
                        'alias'      => 'interactions',
                        'type'       => 'article',
                        'article_id' => 1,
                        'priority'   => 2
                    ],
                    [
                        'name'       => 'ngo foundations',
                        'title'      => 'ارکان انجمن',
                        'alias'      => 'ngo-foundations',
                        'type'       => 'article',
                        'article_id' => 1,
                        'priority'   => 3
                    ],
                    [
                        'name'     => 'mission and vision',
                        'title'    => 'ماموریت و چشم‌انداز',
                        'alias'    => 'mission-and-vision',
                        'type'     => 'link',
                        'priority' => 4
                    ],
                    [
                        'name'     => 'activities',
                        'title'    => 'فعالیت‌ها',
                        'alias'    => 'activities',
                        'type'     => 'link',
                        'priority' => 5
                    ],
                    [
                        'name'     => 'annual',
                        'title'    => 'گزارشات سالانه انجمن',
                        'alias'    => 'annual',
                        'type'     => 'link',
                        'priority' => 6
                    ],
                    [
                        'name'       => 'contact',
                        'title'      => 'تماس با ما',
                        'alias'      => 'contact',
                        'type'       => 'link',
                        'article_id' => 1,
                        'priority'   => 7
                    ],
                    [
                        'name'       => 'statute',
                        'title'      => 'اساسنامه',
                        'alias'      => 'statute',
                        'type'       => 'article',
                        'article_id' => 1,
                        'priority'   => 8
                    ],
                    [
                        'name'       => 'organizational chart',
                        'title'      => 'چارت سازمانی',
                        'alias'      => 'organizational-chart',
                        'type'       => 'article',
                        'article_id' => 1,
                        'priority'   => 9
                    ],
                ]
            ],
            [
                'name'     => 'knowledge',
                'title'    => 'دانستنی ها',
                'alias'    => 'knowledge',
                'type'     => 'separator',
                'priority' => 2,
                'children' => [
                    [
                        'name'     => 'general information',
                        'title'    => 'اطلاعات عمومی',
                        'alias'    => 'general-information',
                        'type'     => 'separator',
                        'priority' => 1,
                        'children' => [
                            [
                            'name'       => 'organ transplant history',
                            'title'      => 'تاریخچه پیوند',
                            'alias'      => 'organ-transplant-history',
                            'type'       => 'article',
                            'priority'   => 1,
                            'article_id' => 1
                        ],
                        [
                            'name'       => 'brain death',
                            'title'      => 'فرایند مرگ مغزی',
                            'alias'      => 'brain-death',
                            'type'       => 'article',
                            'priority'   => 2,
                            'article_id' => 1
                        ],
                        [
                            'name'       => 'organ donation overview',
                            'title'      => 'مروری بر اهدای عضو',
                            'alias'      => 'organ-donation-overview',
                            'type'       => 'article',
                            'priority'   => 3,
                            'article_id' => 1
                        ],
                        [
                            'name'       => 'allocation',
                            'title'      => 'تخصیص عضو',
                            'alias'      => 'allocation',
                            'type'       => 'article',
                            'priority'   => 4,
                            'article_id' => 1
                        ],
                        [
                            'name'       => 'organ transplant',
                            'title'      => 'پیوند اعضا',
                            'alias'      => 'organ-transplant',
                            'type'       => 'article',
                            'priority'   => 5,
                            'article_id' => 1
                        ],
                        [
                            'name'       => 'organ donation and religion',
                            'title'      => 'اهدای عضو و مذهب',
                            'alias'      => 'organ-donation-and-religion',
                            'type'       => 'article',
                            'priority'   => 6,
                            'article_id' => 1
                        ],
                        [
                            'name'       => 'organ donation in another country',
                            'title'      => 'اهدای عضو در کشورهای دیگر',
                            'alias'      => 'organ-donation-in-another-country',
                            'type'       => 'article',
                            'priority'   => 7,
                            'article_id' => 1
                        ],
                    ]],
                    [
                        'name'     => 'know more',
                        'title'    => 'بیشتر بدانیم',
                        'alias'    => 'know-more',
                        'type'     => 'separator',
                        'priority' => 1,
                        'children'=>[
                            [
                                'name'       => 'statistics',
                                'title'      => 'آمار',
                                'alias'      => 'statistics',
                                'type'       => 'article',
                                'priority'   => 1,
                                'article_id' => 1
                            ],
                            [
                                'name'       => 'frequent questions',
                                'title'      => 'سوالات متداول',
                                'alias'      => 'frequent questions',
                                'type'       => 'link',
                                'priority'   => 2
                            ],
                        ]
                    ],
                ]
            ],
            [
                'name'     => 'event and news',
                'title'    => 'اخبار و رویدادها',
                'alias'    => 'event-news',
                'type'     => 'separator',
                'priority' => 3,
                'children'=>[
                    [
                        'name'     => 'iran news',
                        'title'    => 'اخبار ایران',
                        'alias'    => 'iran_news',
                        'type'     => 'list_news',
                        'priority' => 1,
                        'article_id'=>Category::where('type','news')->first()->id
                    ],
                    [
                        'name'       => 'events',
                        'title'      => 'رویدادها',
                        'alias'      => 'events',
                        'type'       => 'list_event',
                        'priority'   => 2,
                        'article_id' => Category::where('type', 'event')->first()->id
                    ],
                    [
                        'name'       => 'world news',
                        'title'      => 'اخبار جهان',
                        'alias'      => 'world-news',
                        'type'       => 'list_news',
                        'priority'   => 1,
                        'article_id' => Category::where('type', 'news')->first()->id
                    ],
                ]

            ],
            [
                'name'     => 'ehda art',
                'title'    => 'هنر اهدا',
                'alias'    => 'ehda-art',
                'type'     => 'separator',
                'priority' => 4
            ],
            [
                'name'     => 'participation',
                'title'    => 'مشارکت',
                'alias'    => 'participation',
                'type'     => 'separator',
                'priority' => 5
            ],
            [
                'name'     => 'scientific services',
                'title'    => 'خدمات تخصصی علمی',
                'alias'    => 'scientific-services',
                'type'     => 'separator',
                'priority' => 6
            ],
            [
                'name'     => 'assistance',
                'title'    => 'مددکاری',
                'alias'    => 'assistance',
                'type'     => 'separator',
                'priority' => 7
            ],

        ];
        $this->makeMenu($main_menu);

    }

    private function makeMenu(array $main_menu, $parent_menu = null)
    {
        $repo = new MenusRepository();
        foreach ($main_menu as $menu) {
            $menusCreateDTO = new MenusCreateDTO();
            $menusCreateDTO->setName($menu['name'])
                ->setTitle($menu['title'])
                ->setAlias($menu['alias'])
                ->setType($menu['type'])
                ->setLink($menu['link'] ?? null)
                ->setPublisher(User::first())
                ->setLanguage('fa')
                ->setPublishDate(Carbon::now()->format('Y-m-d H:i:s'))
                ->setParentId($parent_menu ? $parent_menu->id : null)
                ->setManuableId($menu['article_id'] ?? null)
                ->setPriority($menu['priority']);
            $newMenu = $repo->createMenu($menusCreateDTO);
            if (isset($menu['children'])) {
                $this->makeMenu($menu['children'], $newMenu);
            }

        }

    }
}
