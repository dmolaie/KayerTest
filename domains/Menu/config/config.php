<?php

return [
    'menus_type'    => [
        'article_type'      => 'article',
        'link_type'         => 'link',
        'separator_type'    => 'separator',
        'list_news_type'    => 'list_news',
        'list_event_type'   => 'list_event',
        'list_article_type' => 'list_article'
    ],
    'menu_language' => [
        'fa',
        'en'
    ],
    'admin_menu'    => [

        "dashboard"      => [
            'roles'=>[
                'admin'   => ['active', 'pending', 'inactive',],
                'manager' => ['active', 'pending', 'inactive',],
                'legate'  => ['active', 'pending', 'inactive', 'wait_for_documents', 'wait_for_exam'],
                ],
            'children'=>[]

        ],
        "menu_manager" => [
            'roles'    => [
                'admin' => ['active'],
            ],
            'children' => []

        ],
        "event"        => [
            'roles'    => [
                'admin'   => ['active'],
                'manager' => ['active'],
                'legate'  => ['active'],
            ],
            'children' => []
        ],
        "news"         => [
            'roles'    => [
                'admin'   => ['active'],
                'manager' => ['active'],
                'legate'  => ['active'],
            ],
            'children' => []

        ],
        "article"      => [
            'roles'    => [
                'admin' => ['active'],
            ],
            'children' => []
        ],
        "ehda_card" => [
            'roles'    => [
                'admin' => ['active'],
            ],
            'children' => []
        ],
        "user" => [
            'roles'    => [
                'admin' => ['active'],
            ],
            'children' => []
        ],
        "report" => [
            'roles'    => [
                'admin' => ['active'],
            ],
            'children' => []
        ],
        "category" => [
            'roles'    => [
                'admin' => ['active'],
            ],
            'children' => []
        ],
        "gallery" => [
            'roles'=>[
                'admin'   => ['active'],
                'manager' => ['active'],
                'legate'  => ['active'],
                ],
            'children'=>[
                "image_gallery" => [
                    'roles'    => [
                        'admin'   => ['active'],
                        'manager' => ['active'],
                        'legate'  => ['active'],
                    ],
                    'children' => []

                ],
                "text_gallery"  => [
                    'roles'    => [
                        'admin'   => ['active'],
                        'manager' => ['active'],
                        'legate'  => ['active'],
                    ],
                    'children' => []

                ],
                "video_gallery" => [
                    'roles'    => [
                        'admin'   => ['active'],
                        'manager' => ['active'],
                        'legate'  => ['active'],
                    ],
                    'children' => []

                ],
                "voice_gallery" => [
                    'roles'    => [
                        'admin'   => ['active'],
                        'manager' => ['active'],
                        'legate'  => ['active'],
                    ],
                    'children' => []

                ],
            ]


        ],
        "profile_setting" => [
            'roles'    => [
                'admin'   => ['active', 'pending', 'inactive',],
                'manager' => ['active', 'pending', 'inactive',],
                'legate'  => ['active', 'pending', 'inactive', 'wait_for_documents', 'wait_for_exam'],
            ],
            'children' => []

        ],
    ]
];