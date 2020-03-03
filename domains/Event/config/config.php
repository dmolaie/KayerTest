<?php

return [
    'event_statuses'                 => [
        'accept',
        'reject',
        'pending',
    ],
    'event_language'               => [
        'fa',
        'en'
    ],
    'event_accept_status'          => 'accept',
    'event_reject_status'          => 'reject',
    'event_pending_status'         => 'pending',
    'event_publish_status'         => 'published',
    'event_ready_to_publish_status'=> 'ready_to_publish',
    'event_list_status'            => [
        'published',
        'ready_to_publish',
        'pending'
    ],
    'event_convert_to_real_status' =>
        [
            'published'        => 'accept',
            'ready_to_publish' => 'accept',
            'pending'          => 'pending',
            'reject'           => 'reject'
        ],
    'event_paginate_count' => 10,
];