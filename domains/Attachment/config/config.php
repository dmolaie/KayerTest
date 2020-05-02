<?php
return [

    'base_path' => 'upload/images/',
    'base_path_storage' => 'uploads/',
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
