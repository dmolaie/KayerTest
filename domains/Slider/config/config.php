<?php

return [
    'slider_statuses'                => [
        'accept',
        'reject',
        'pending',
        'cancel',
        'recycle',
        'delete'
    ],
    'slider_language'                => [
        'fa',
        'en'
    ],
    'slider_accept_status'           => 'accept',
    'slider_reject_status'           => 'reject',
    'slider_pending_status'          => 'pending',
    'slider_cancel_status'           => 'cancel',
    'slider_recycle_status'          => 'recycle',
    'slider_publish_status'          => 'published',
    'slider_delete_status'          => 'delete',
    'slider_ready_to_publish_status' => 'ready_to_publish',
    'slider_list_status'             => [
        'published',
        'ready_to_publish',
        'pending',
        'recycle',
        'cancel',
        'reject',
        'delete'
    ],
    'slider_convert_to_real_status'  =>
        [
            'published'        => 'accept',
            'ready_to_publish' => 'accept',
            'pending'          => 'pending',
            'reject'           => 'reject',
            'cancel'           => 'cancel',
            'recycle'          => 'recycle',
            'delete'          => 'delete',
        ],
    'slider_paginate_count'          => 10,
];