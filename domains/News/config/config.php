<?php

return [
    'news_statuses'                => [
        'accept',
        'reject',
        'pending',
        'cancel',
        'recycle',
        'delete'
    ],
    'news_language'                => [
        'fa',
        'en'
    ],
    'news_accept_status'           => 'accept',
    'news_reject_status'           => 'reject',
    'news_pending_status'          => 'pending',
    'news_cancel_status'           => 'cancel',
    'news_recycle_status'          => 'recycle',
    'news_publish_status'          => 'published',
    'news_delete_status'          => 'delete',
    'news_ready_to_publish_status' => 'ready_to_publish',
    'news_list_status'             => [
        'published',
        'ready_to_publish',
        'pending',
        'recycle',
        'cancel',
        'reject',
        'delete'
    ],
    'news_convert_to_real_status'  =>
        [
            'published'        => 'accept',
            'ready_to_publish' => 'accept',
            'pending'          => 'pending',
            'reject'           => 'reject',
            'cancel'           => 'cancel',
            'recycle'          => 'recycle',
            'delete'          => 'delete',
        ],
    'news_paginate_count'          => 10,
];