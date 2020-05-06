<?php
return [

    'image_base_path_storage' => 'public/upload-image/images/',
    'image_path_storage' => 'storage/upload-image/images/',

    'base_path_storage' => 'public/uploads/',
    'path_storage' => 'storage/uploads/',

    'type' => [
        'image-attachment' => 'image-attachment',
        'image-media' => 'image-media',
        'video-media' => 'video-media',
        'voice-media' => 'voice-media',
        'text-media'   => 'text-media'
    ],

    'image_sizes' => [
        'Slider' => [
            'normal_size' => [
                'width' => 1400,
                'height' => 887,
                'size' => 400
            ]
        ],
        'default' => [
            'normal_size' => [
                'width' => 200,
                'height' => 200,
                'size' => 200
            ]
        ],
    ]

];
