<?php

return [
    'user_genders' => [
        0 => 'male',
        1 => 'female',
        2 => 'other'
    ],
    'user_marital_statuses' => [
        0 => 'single',
        1 => 'married'
    ],
    'client_role_id' => 4,
    'legate_role_id' => 3,
    'admin_role_id' => 1,
    'user_role_status' => ['active', 'pending', 'inactive'],
    'user_role_active_status' => 'active',
    'user_role_pending_status' => 'pending',
    'user_admin_role_id' => '1',
    'education_degree' => trans('user::baseLang.education_degree'),
    'field_of_activities' => trans('user::baseLang.field_of_activities'),
    'know_community_by' => trans('user::baseLang.know_community_by'),
    'month' => trans('user::baseLang.month'),
    'user_paginate_count' => 10,
];