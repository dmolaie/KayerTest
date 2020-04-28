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
    "digits_between"        => ":attribute باید بین :min و :max رقم باشد.",
    "email"                 => "فرمت :attribute معتبر نیست.",
    "exists"                => ":attribute انتخاب شده، معتبر نیست.",
    "image"                 => ":attribute باید تصویر باشد.",
    "in"                    => ":attribute انتخاب شده، معتبر نیست.",
    "integer"               => ":attribute باید نوع داده ای عددی (integer) باشد.",
    "ip"                    => ":attribute باید IP آدرس معتبر باشد.",
    "max"                   => array(
        "numeric" => ":attribute نباید بزرگتر از :max باشد.",
        "file"    => ":attribute نباید بزرگتر از :max کیلوبایت باشد.",
        "string"  => ":attribute نباید بیشتر از :max کاراکتر باشد.",
        "array"   => ":attribute نباید بیشتر از :max آیتم باشد.",
    ),
    "mimes"                 => ":attribute باید یکی از فرمت های :values باشد.",
    "mimetypes"             => ":attribute باید یکی از فرمت های :values باشد.",
    "min"                   => array(
        "numeric" => ":attribute نباید کوچکتر از :min باشد.",
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
        "numeric" => ":attribute باید برابر با :size باشد.",
        "file"    => ":attribute باید برابر با :size کیلوبایت باشد.",
        "string"  => ":attribute باید برابر با :size کاراکتر باشد.",
        "array"   => ":attribute باسد شامل :size آیتم باشد.",
    ),
    "timezone"              => "The :attribute must be a valid zone.",
    "unique"                => ":attribute قبلا انتخاب شده است.",
    "url"                   => "فرمت آدرس :attribute اشتباه است.",
    "exists_code"           => "کد ارسالی در سیستم وجود ندارد",
    "expire_code"           => "اعتبار کد ارسالی به پایان رسیده است",
    "used"                  => "این کد قبلا مورد استفاده قرار گرفته است",
    "exists_phone"          => "چنین شماره ای در سیستم ثبت نشده است",
    "recaptcha"             => "کپچا اعتبار لازم را ندارد",
    'uploaded'              => 'فیلد :attribute بیش از 2 مگابایت میباشد.',
    'national_code'         => " :attribute وارد شده نامعتر میباشد",
    'chracter_in_not_valid' => "کاراکتر های وارد شده معتبر نمیباشد.",
    'error_code_national'   => 'کد وارد شده صحیح نیست',

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
    'attributes'            => [
        "category_id"        => "نوع دسته‌بندی",
        "media_id"           => "شماره فایل",
        "first_title"        => "عنوان اول",
        "second_title"       => "عنوان دوم",
        "third_title"        => "عنوان سوم",
        "abstract"           => "چکیده",
        "description"        => "توضیحات",
        "publish_date"       => "تاریخ انتشار",
        "source_link"        => "منبع",
        "province_id"        => "دامنه",
        "language"           => "زبان",
        "parent_id"          => "صفحه مرتبط",
        "status"             => "وضعیت صفحه",
        "editor_id"          => "مالک صفحه",
        "publish_date_end"   => "تاریخ شروع ایجاد صفحه",
        "publish_date_start" => "تاریخ پایان ایجاد صفحه",
        "content"            => "محتوا",
        "content.*"          => "محتوا",
    ],
);