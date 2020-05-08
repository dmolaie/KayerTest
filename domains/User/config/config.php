<?php

return [
    'user_genders'                 => [
        0 => 'male',
        1 => 'female',
        2 => 'other'
    ],
    'user_marital_statuses'        => [
        0 => 'single',
        1 => 'married'
    ],
    'client_role_type'             => 'client',
    'legate_role_type'             => 'legate',
    'admin_role_id'                => 1,
    'user_role_status'             => [
        'active',
        'pending',
        'inactive',
        'deleted',
        'wait_for_documents',
        'wait_for_exam',
    ],
    'user_role_active_status'      => 'active',
    'user_role_pending_status'     => 'pending',
    'user_role_wait_for_documents' => 'wait_for_documents',
    'user_role_wait_for_exam'      => 'wait_for_exam',
    'user_admin_role_id'           => '1',
    'education_degree'             => trans('user::baseLang.education_degree'),
    'field_of_activities'          => trans('user::baseLang.field_of_activities'),
    'know_community_by'            => trans('user::baseLang.know_community_by'),
    'month'                        => trans('user::baseLang.month'),
    'user_paginate_count'          => 10,
    'user_role_inactive_status'    => 'inactive',
    'user_register_type'           =>
        [
            'by_user'  => 'user',
            'by_admin' => 'admin',
            'by_sms'   => 'sms',
            'by_ussd'  => 'ussd',
            'old_site' => 'old_site',
        ]
];