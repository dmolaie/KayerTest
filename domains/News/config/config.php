<?php

return [
    'news_statue'                 => [
        'accept',
        'reject',
        'pending',
    ],
    'news_language'               => [
        'fa',
        'en'
    ],
    'news_accept_status'          => 'accept',
    'news_reject_status'          => 'reject',
    'news_pending_status'         => 'pending',
    'news_publish_status'         => 'published',
    'news_ready_to_publish_status'=> 'ready_to_publish',
    'news_list_status'            => [
        'published',
        'ready_to_publish',
        'pending'
    ],
    'news_convert_to_real_status' =>
        [
            'published'        => 'accept',
            'ready_to_publish' => 'accept',
            'pending'          => 'pending',
            'reject'           => 'reject'
        ],
    'news_paginate_count' => 10,
];