<?php


return array(

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    "accepted"              => ":attribute باید پذیرفته شده باشد.",
    "active_url"            => "آدرس :attribute معتبر نیست",
    "after"                 => ":attribute باید تاریخی بعد از :date باشد.",
    "alpha"                 => ":attribute باید شامل حروف الفبا باشد.",
    "alpha_dash"            => ":attribute باید شامل حروف الفبا و عدد و خظ تیره(-) باشد.",
    "alpha_num"             => ":attribute باید شامل حروف الفبا و عدد باشد.",
    "array"                 => ":attribute باید شامل آرایه باشد.",
    "before"                => ":attribute باید تاریخی قبل از :date باشد.",
    "between"               => array(
        "numeric" => ":attribute باید بین :min و :max باشد.",
        "file"    => ":attribute باید بین :min و :max کیلوبایت باشد.",
        "string"  => ":attribute باید بین :min و :max کاراکتر باشد.",
        "array"   => ":attribute باید بین :min و :max آیتم باشد.",
    ),
    "boolean"               => "The :attribute field must be true or false",
    "confirmed"             => ":attribute با تاییدیه مطابقت ندارد.",
    "date"                  => ":attribute یک تاریخ معتبر نیست.",
    "date_format"           => ":attribute با الگوی :format مطاقبت ندارد.",
    "different"             => ":attribute و :other باید متفاوت باشند.",
    "digits"                => ":attribute باید :digits رقم باشد.",
    "digits_between"        => ":attribute باید طول بین :min و :max رقم باشد.",
    "email"                 => "فرمت :attribute معتبر نیست.",
    "exists"                => ":attribute انتخاب شده، معتبر نیست.",
    "image"                 => ":attribute باید تصویر باشد.",
    "in"                    => ":attribute انتخاب شده، معتبر نیست.",
    "integer"               => ":attribute باید نوع داده ای عددی (integer) باشد.",
    "ip"                    => ":attribute باید IP آدرس معتبر باشد.",
    "max"                   => array(
        "numeric" => ":attribute نباید طول بزرگتر از :max باشد.",
        "file"    => ":attribute نباید بزرگتر از :max کیلوبایت باشد.",
        "string"  => ":attribute نباید بیشتر از :max کاراکتر باشد.",
        "array"   => ":attribute نباید بیشتر از :max آیتم باشد.",
    ),
    "mimes"                 => ":attribute باید یکی از فرمت های :values باشد.",
    "min"                   => array(
        "numeric" => ":attribute نباید طول کوچکتر از :min باشد.",
        "file"    => ":attribute نباید کوچکتر از :min کیلوبایت باشد.",
        "string"  => ":attribute نباید کمتر از :min کاراکتر باشد.",
        "array"   => ":attribute نباید کمتر از :min آیتم باشد.",
    ),
    "not_in"                => ":attribute انتخاب شده، معتبر نیست.",
    "numeric"               => ":attribute باید شامل عدد باشد.",
    "regex"                 => ":attribute یک فرمت معتبر نیست",
    "required"              => "فیلد :attribute الزامی است",
    "required_if"           => "فیلد :attribute هنگامی که :other برابر با :value است، الزامیست.",
    "required_with"         => ":attribute الزامی است زمانی که :values موجود است.",
    "required_with_all"     => ":attribute الزامی است زمانی که :values موجود است.",
    "required_without"      => ":attribute الزامی است زمانی که :values موجود نیست.",
    "required_without_all"  => ":attribute الزامی است زمانی که :values موجود نیست.",
    "same"                  => ":attribute و :other باید مانند هم باشند.",
    "size"                  => array(
        "numeric" => ":attribute باید تعداد اعداد برابر با :size باشد.",
        "file"    => ":attribute باید برابر با :size کیلوبایت باشد.",
        "string"  => ":attribute باید برابر با :size کاراکتر باشد.",
        "array"   => ":attribute باسد شامل :size آیتم باشد.",
    ),
    "timezone"              => "The :attribute must be a valid zone.",
    "unique"                => ":attribute قبلا انتخاب شده است.",
    "distinct"              => "شامل مقدار تکراری است.",
    "url"                   => "فرمت آدرس :attribute اشتباه است.",
    "exists_code"           => "کد ارسالی در سیستم وجود ندارد",
    "expire_code"           => "اعتبار کد ارسالی به پایان رسیده است",
    "used"                  => "این کد قبلا مورد استفاده قرار گرفته است",
    "exists_phone"          => "چنین شماره ای در سیستم ثبت نشده است",
    "recaptcha"             => "کپچا اعتبار لازم را ندارد",
    'uploaded'              => 'فیلد :attribute بیش از 2 مگابایت میباشد.',
    'national_code'         => " :attribute وارد شده نامعتر میباشد",
    'chracter_in_not_valid' => "کاراکتر های وارد شده معتبر نمیباشد.",
    'error_code_national'   => 'کد ملی وارد شده صحیح نیست',


    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom'     => [
        'national_code' => [
            'national_code_unique' => 'کد ملی وارد شده صحیح نمیباشد.کدملی 10رقمی و در عین حال ثبت شده در سیستم ثبت احوال باشد. '
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */
    'attributes' => array(
        "user_id"                     => "شماره کاربر",
        "name"                        => "نام",
        "username"                    => "نام کاربری",
        "email"                       => "پست الکترونیکی",
        "first_name"                  => "نام",
        "last_name"                   => "نام خانوادگی",
        "current_password"            => "رمز عبور فعلی",
        "password"                    => "رمز عبور",
        "password_confirmation"       => "تاییدیه ی رمز عبور",
        "current_province_id"         => "استان محل سکونت",
        "current_city_id"             => "شهر محل سکونت",
        "current_address"             => "نشانی محل سکونت",
        "phone"                       => "تلفن ثابت محل سکونت",
        "mobile"                      => "تلفن همراه",
        "gender"                      => "جنسیت",
        "date_of_birth"               => "تاریخ تولد",
        "province_of_work"            => "استان محل کار",
        "city_of_work"                => "شهر محل کار",
        "essential_mobile"            => "تلفن همراه ضروری",
        "province_of_birth"           => "استان محل تولد",
        "city_of_birth"               => "شهر محل تولد",
        "identity_number"             => "شماره شناسنامه",
        "marital_status"              => "وضعیت تاهل",
        "job_title"                   => "شغل فعلی",
        "education_field"             => "رشته و گرایش تحصیلی",
        "last_education_degree"       => "آخرین مدرک تحصیلی",
        "address_of_obtaining_degree" => "محل اخذ مدرک",
        "national_code"               => "کد ملی",
        "field_of_activities"         => "زمینه‌های فعالیت",
        "field_of_activities.*"       => "زمینه‌ی فعالیت",
        "motivation_for_cooperation"  => "انگیزه همکاری",
        "know_community_by"           => "نحوه آشنایی با انجمن",
        "day_of_cooperation"          => "روزهای همکاری",
        "last_education_degree"       => "آخرین مدرک تحصیلی",
        "work_phone"                  => "تلفن ثابت محل کار",
        'id'                          => 'شناسه',
        'role_id'                     => 'نوع نقش کاربری',
        'role_status'                 => 'وضعیت نقش کاربری',
        'father_name'                 => 'نام پدر',
        'home_postal_code'            => 'کد پستی',
        'work_postal_code'            => 'کد پستی محل کار',
        'education_province_id'       => 'استان محل تحصیل',
        'education_city_id'           => 'شهر محل تحصیل',
        'event_id'                    => 'رویداد',
        'receive_email'               => 'خبرنامه',
        'password_change'             => 'گذرواژه',
        'register_from_client'        => 'تاریخ شروع ثبت نام کاربر',
        'register_end_client'         => 'تاریخ پایان ثبت نام کاربر',
        'status_client'               => 'وضعیت کاربران',
        'register_from_legate'        => 'تاریخ شروع ثبت نام سفیر',
        'register_end_legate'         => 'تاریخ شروع ثبت نام سفیر',
        'status_legate'               => 'وضعیت کاربران',
        'year'                        => 'سال وفات',
    ),
);