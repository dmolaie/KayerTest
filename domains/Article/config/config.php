<?php

return [
    'article_statuses'                 => [
        'accept',
        'reject',
        'pending',
        'cancel',
        'recycle',
        'delete'
    ],
    'article_language'               => [
        'fa',
        'en'
    ],
    'article_accept_status'          => 'accept',
    'article_reject_status'          => 'reject',
    'article_pending_status'         => 'pending',
    'article_publish_status'         => 'published',
    'article_ready_to_publish_status'=> 'ready_to_publish',
    'article_list_status'            => [
        'published',
        'ready_to_publish',
        'pending',
        'reject'
    ],
    'article_convert_to_real_status' =>
        [
            'published'        => 'accept',
            'ready_to_publish' => 'accept',
            'pending'          => 'pending',
            'reject'           => 'reject'
        ],
    'article_paginate_count' => 10,
];