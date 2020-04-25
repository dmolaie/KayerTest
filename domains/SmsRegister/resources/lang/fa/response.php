<?php


return [
    'gender_male'        => 'آقای',
    'gender_female'      => 'خانم',
    'gender_other'       => '',
    'has_ehda_card'      => 'شما هم‌اکنون دارای کارت اهدا عضو هستید',
    'ehda_card_address'  => 'لینک کارت شما: ',
    'card_id'            => 'شماره عضویت: ',
    'send_birth_date'    => 'لطفا تاریخ تولد را بفرستید.',
    'send_national_code' => 'لطفا کدملی را بفرستید.',
    'validation'         => [
        'national_code_required'   => 'کدملی الزامی است.',
        'national_code_unique'     => 'کدملی قبلا ثبت است.',
        'userPhoneNumber_regex'    => 'فرمت شماره موبایل نادرست است.',
        'userPhoneNumber_required' => 'شماره موبایل الزامی است.',
        'birth_date_required'      => 'تاریخ تولد الزامی است.',
        'incorrect_data_format'    => 'جهت دریافت کارت اهدای عضو ابتدا کد ملی خود را به فرمت زیر ارسال کنید.'
            . PHP_EOL . ' مثال: 0740030000'
            . PHP_EOL . 'پس از دریافت پیام تایید، تاریخ تولد خود را به فرمت زیر ارسال کنید.'
            . PHP_EOL . 'مثال : 13630507',
        'birth_date_all'           => 'فرمت تاریخ تولد نادرست است.'
            . PHP_EOL . 'مثال : 13630507',
        'national_code_all'        => 'فرمت کدملی نادرست است.'
            . PHP_EOL . 'مثال: 0740030000'
    ],
];