<?php

return [
    'media_statuses'                => [
        'accept',
        'reject',
        'pending',
        'cancel',
        'recycle',
        'delete'
    ],
    'media_language'                => [
        'fa',
        'en'
    ],
    'media_type'                    => [
        'image',
        'video',
        'voice',
        'text',
    ],
    'media_type_image'              => 'image',
    'media_type_video'              => 'video',
    'media_type_voice'              => 'voice',
    'media_type_text'               => 'text',
    'media_accept_status'           => 'accept',
    'media_reject_status'           => 'reject',
    'media_pending_status'          => 'pending',
    'media_publish_status'          => 'published',
    'media_delete_status'           => 'delete',
    'media_recycle_status'          => 'recycle',
    'media_cancel_status'           => 'cancel',
    'media_ready_to_publish_status' => 'ready_to_publish',
    'media_list_status'             => [
        'published',
        'ready_to_publish',
        'pending',
        'recycle',
        'cancel',
        'reject',
        'delete'
    ],
    'media_convert_to_real_status'  =>
        [
            'published'        => 'accept',
            'ready_to_publish' => 'accept',
            'pending'          => 'pending',
            'reject'           => 'reject',
            'cancel'           => 'cancel',
            'recycle'          => 'recycle',
            'delete'           => 'delete',
        ],
    'media_paginate_count'          => 10,
    'media_default_path'            => 'Media',
];