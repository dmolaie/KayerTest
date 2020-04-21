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

        "counter"      => [
            'admin'   => ['active', 'pending', 'inactive',],
            'manager' => ['active', 'pending', 'inactive',],
            'legate'  => ['active', 'pending', 'inactive', 'wait_for_documents', 'wait_for_exam'],
        ],
        "menu_manager" => [
            'admin' => ['active'],
        ],
        "event"        => [
            'admin'   => ['active'],
            'manager' => ['active'],
            'legate'  => ['active'],
        ],
        "news"         => [
            'admin'   => ['active'],
            'manager' => ['active'],
            'legate'  => ['active'],
        ],
        "article"      => [
            'admin' => ['active'],
        ],
        "ehda_card" => [
            'admin'   => ['active'],
        ],
        "user" => [
            'admin'   => ['active']
        ],
        "profile_setting" => [
            'admin'   => ['active', 'pending', 'inactive',],
            'manager' => ['active', 'pending', 'inactive',],
            'legate'  => ['active', 'pending', 'inactive', 'wait_for_documents', 'wait_for_exam'],
        ],
    ]
];