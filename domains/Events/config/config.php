<?php

return [
    'events_statuses'                 => [
        'accept',
        'reject',
        'pending',
    ],
    'event_language'               => [
        'fa',
        'en'
    ],
    'events_accept_status'          => 'accept',
    'events_reject_status'          => 'reject',
    'events_pending_status'         => 'pending',
    'events_publish_status'         => 'published',
    'events_ready_to_publish_status'=> 'ready_to_publish',
    'events_list_status'            => [
        'published',
        'ready_to_publish',
        'pending'
    ],
    'events_convert_to_real_status' =>
        [
            'published'        => 'accept',
            'ready_to_publish' => 'accept',
            'pending'          => 'pending',
            'reject'           => 'reject'
        ],
    'events_paginate_count' => 10,
];