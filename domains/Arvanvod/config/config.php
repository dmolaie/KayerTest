<?php

return [
    'event_statuses'                => [
        'accept',
        'reject',
        'pending',
        'cancel',
        'recycle',
        'delete'
    ],
    'event_language'                => [
        'fa',
        'en'
    ],
    'event_accept_status'           => 'accept',
    'event_reject_status'           => 'reject',
    'event_pending_status'          => 'pending',
    'event_cancel_status'           => 'cancel',
    'event_recycle_status'          => 'recycle',
    'event_publish_status'          => 'published',
    'event_delete_status'           => 'delete',
    'event_ready_to_publish_status' => 'ready_to_publish',
    'event_list_status'             => [
        'published',
        'ready_to_publish',
        'pending',
        'recycle',
        'cancel',
        'reject',
        'delete'
    ],
    'event_convert_to_real_status'  =>
        [
            'published'        => 'accept',
            'ready_to_publish' => 'accept',
            'pending'          => 'pending',
            'reject'           => 'reject',
            'cancel'           => 'cancel',
            'recycle'          => 'recycle',
            'delete'           => 'delete',
        ],
    'event_paginate_count'          => 10,
];