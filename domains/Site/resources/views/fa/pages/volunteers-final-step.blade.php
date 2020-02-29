@extends('fa.template.master')
    @section('content')
        <div class="vnt-page dnt-page i-page">
            <div class="container">
                <h1 class="flex text-blue font-24 md:font-22 text-center">
                    <span class="flower_line flower_line--blue--200 relative flex items-end justify-end flex-1 reverse-item m-0"></span>
                    <span class="i-page__title">
                        ثبت نام سفیر
                    </span>
                    <span class="flower_line flower_line--blue--200 relative flex items-end justify-end flex-1 m-0"></span>
                </h1>
                <div class="p-t-35 w-full">
                    <div class="vnt-page__box inner-box inner-box--white">
                        <form method="post"
                              class="vnt-page__form block w-full"
                        >
                            <p class="text-blue font-base font-bold m-b-10 cursor-default p-0-10">
                                اطلاعات فردی
                            </p>
                            <div class="flex flex-wrap">
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                        نام
                                    </span>
                                    <label class="field__name w-full block">
                                        <input type="text"
                                               placeholder="حروف فارسی"
                                               class="input input--blue block w-full border border-solid rounded"
                                               name="name" autocomplete="off" required="required" readonly="readonly"
                                               value="محمد"
                                        />
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </label>
                                </div>
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                        نام خانوادگی
                                    </span>
                                    <label class="field__full-name w-full block">
                                        <input type="text"
                                               placeholder="حروف فارسی"
                                               class="input input--blue block w-full border border-solid rounded"
                                               name="full_name" autocomplete="off" required="required" readonly="readonly"
                                               value="سلیمانیان"
                                        />
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </label>
                                </div>
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                        جنسیت
                                    </span>
                                    <div class="field__gender w-full flex items-stretch text-center user-select-none">
                                        <label class="w-1/3 input input--blue p-0 border border-solid rounded rounded-tl-none rounded-bl-none cursor-pointer">
                                            <input type="radio"
                                                   class="dnt-page__radio none"
                                                   name="gender" required="required" autocomplete="off"
                                            />
                                            <span class="dnt-page__radio_label w-full h-full block text-bayoux font-normal">
                                                خانم
                                            </span>
                                        </label>
                                        <label class="w-1/3 input input--blue p-0 border border-r-0 border-l-0 border-solid cursor-pointer">
                                            <input type="radio"
                                                   class="dnt-page__radio none"
                                                   name="gender" required="required" autocomplete="off"
                                            />
                                            <span class="dnt-page__radio_label w-full h-full block text-bayoux font-normal">
                                                آقا
                                            </span>
                                        </label>
                                        <label class="w-1/3 input input--blue p-0 border border-solid rounded rounded-tr-none rounded-br-none cursor-pointer">
                                            <input type="radio"
                                                   class="dnt-page__radio none"
                                                   name="gender" required="required" autocomplete="off"
                                            />
                                            <span class="dnt-page__radio_label w-full h-full block text-bayoux font-normal">
                                                سایر
                                            </span>
                                        </label>
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </div>
                                </div>
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                        نام پدر
                                    </span>
                                    <label class="field__father-name w-full block">
                                        <input type="text"
                                               placeholder="حروف فارسی"
                                               class="input input--blue block w-full border border-solid rounded"
                                               name="father_name" autocomplete="off" required="required"
                                        />
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </label>
                                </div>
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux font-sm-bold cursor-default">
                                        شماره شناسنامه
                                    </span>
                                    <label class="field__cert w-full block">
                                        <input type="text"
                                               placeholder="فقط عدد"
                                               class="input input--blue block w-full border border-solid rounded direction-ltr"
                                               name="birth_certificate" autocomplete="off"
                                        />
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </label>
                                </div>
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                        کد ملی
                                    </span>
                                    <label class="field__national-code w-full block">
                                        <input type="text"
                                               placeholder="۱۰ رقم بدون خط تیره"
                                               class="input input--blue block w-full border border-solid rounded direction-ltr"
                                               name="national_code" autocomplete="off" required="required" readonly="readonly"
                                               value="۰۵۲۱۱۴۱۹۶۶"
                                        />
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </label>
                                </div>
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                        تاریخ تولد
                                    </span>
                                    <div class="field__date_birth w-full flex items-stretch text-center user-select-none">
                                        <div class="w-1/3 input input--blue p-0 border border-solid rounded rounded-tl-none rounded-bl-none cursor-pointer">
                                            <select class="vnt-page__select vnt-page__select--day"
                                                    name="birth_day"
                                            >
                                                <option value="">
                                                    روز
                                                </option>
                                                <option value="1">
                                                    1
                                                </option>
                                                <option value="2">
                                                    2
                                                </option>
                                                <option value="3">
                                                    3
                                                </option>
                                                <option value="4">
                                                    4
                                                </option>
                                            </select>
                                        </div>
                                        <div class="w-1/3 input input--blue p-0 border border-r-0 border-l-0 border-solid cursor-pointer">
                                            <select class="vnt-page__select vnt-page__select--month"
                                                    name="birth_month"
                                            >
                                                <option value="">
                                                    ماه
                                                </option>
                                                <option value="1">
                                                    فروردین
                                                </option>
                                                <option value="2">
                                                    اردیبهشت
                                                </option>
                                                <option value="3">
                                                    خرداد
                                                </option>
                                                <option value="4">
                                                    تیر
                                                </option>
                                                <option value="5">
                                                    مرداد
                                                </option>
                                                <option value="6">
                                                    شهریور
                                                </option>
                                                <option value="7">
                                                    مهر
                                                </option>
                                                <option value="8">
                                                    آبان
                                                </option>
                                                <option value="9">
                                                    آذر
                                                </option>
                                                <option value="10">
                                                    دی
                                                </option>
                                                <option value="11">
                                                    بهمن
                                                </option>
                                                <option value="12">
                                                    اسفند
                                                </option>
                                            </select>
                                        </div>
                                        <div class="w-1/3 input input--blue p-0 border border-solid rounded rounded-tr-none rounded-br-none cursor-pointer">
                                            <select class="vnt-page__select vnt-page__select--year"
                                                    name="birth_year"
                                            >
                                                <option value="">
                                                    سال
                                                </option>
                                                <option value="1397">
                                                    1397
                                                </option>
                                                <option value="1396">
                                                    1396
                                                </option>
                                                <option value="1395">
                                                    1395
                                                </option>
                                                <option value="1394">
                                                    1394
                                                </option>
                                                <option value="1393">
                                                    1393
                                                </option>
                                                <option value="1392">
                                                    1392
                                                </option>
                                                <option value="1391">
                                                    1391
                                                </option>
                                                <option value="1390">
                                                    1390
                                                </option>
                                            </select>
                                        </div>
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </div>
                                </div>
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                        استان محل تولد
                                    </span>
                                    <div class="field__birth_province w-full">
                                        <select class="vnt-page__select vnt-page__select--birth-province"
                                            name="birth_province"
                                    >
                                        <option value="">
                                            انتخاب کنید...
                                        </option>
                                        <option value="1">
                                            تهران
                                        </option>
                                        <option value="2">
                                            فناپ
                                        </option>
                                        <option value="3">
                                            خارجه
                                        </option>
                                    </select>
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </div>
                                </div>
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                        شهر محل تولد
                                    </span>
                                    <div class="field__birth_city w-full">
                                        <select class="vnt-page__select vnt-page__select--birth-city"
                                                name="birth_city"
                                        >
                                            <option value="">
                                                انتخاب کنید...
                                            </option>
                                            <option value="1">
                                                تهران
                                            </option>
                                            <option value="2">
                                                فناپ
                                            </option>
                                            <option value="3">
                                                خارجه
                                            </option>
                                        </select>
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </div>
                                </div>
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                        وضعیت تاهل
                                    </span>
                                    <div class="field__marital w-full flex items-stretch text-center user-select-none">
                                        <label class="w-1/2 input input--blue p-0 border border-solid rounded rounded-tl-none rounded-bl-none cursor-pointer">
                                            <input type="radio"
                                                   class="dnt-page__radio none"
                                                   name="marital" required="required" autocomplete="off"
                                            />
                                            <span class="dnt-page__radio_label w-full h-full block text-bayoux font-normal">
                                                مجرد
                                            </span>
                                        </label>
                                        <label class="w-1/2 input input--blue p-0 border border-r-0 border-solid rounded rounded-tr-none rounded-br-none cursor-pointer">
                                            <input type="radio"
                                                   class="dnt-page__radio none"
                                                   name="marital" required="required" autocomplete="off"
                                            />
                                            <span class="dnt-page__radio_label w-full h-full block text-bayoux font-normal">
                                                متاهل
                                            </span>
                                        </label>
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </div>
                                </div>
                            </div>

                            <p class="text-blue font-base font-bold m-b-10 cursor-default p-0-10 m-t-8">
                                اطلاعات تحصیلی
                            </p>
                            <div class="flex flex-wrap">
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                        میزان تحصیلات
                                    </span>
                                    <div class="field__edu-level w-full">
                                        <select class="vnt-page__select vnt-page__select--edu-level"
                                                name="edu_level"
                                        >
                                            <option value="">
                                                انتخاب کنید...
                                            </option>
                                            <option value="1">
                                                بی سواد
                                            </option>
                                            <option value="2">
                                                کمتر از دیپلم
                                            </option>
                                            <option value="3">
                                                دیپلم
                                            </option>
                                            <option value="4">
                                                کاردانی
                                            </option>
                                            <option value="5">
                                                کارشناسی
                                            </option>
                                        </select>
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </div>
                                </div>
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                        رشته‌ی تحصیلی
                                    </span>
                                    <label class="field__edu-field w-full block">
                                        <input type="text"
                                               placeholder="حروف فارسی"
                                               class="input input--blue block w-full border border-solid rounded"
                                               name="edu_field" autocomplete="off" required="required"
                                        />
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </label>
                                </div>
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                        استان محل تحصیل
                                    </span>
                                    <div class="field__edu-province w-full">
                                        <select class="vnt-page__select vnt-page__select--edu-province"
                                                name="edu_province"
                                        >
                                            <option value="">
                                                انتخاب کنید...
                                            </option>
                                            <option value="1">
                                                تهران
                                            </option>
                                            <option value="2">
                                                فناپ
                                            </option>
                                            <option value="3">
                                                خارجه
                                            </option>
                                        </select>
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </div>
                                </div>
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                        شهر محل تحصیل
                                    </span>
                                    <div class="field__edu-city w-full">
                                        <select class="vnt-page__select vnt-page__select--edu-city"
                                                name="edu_city"
                                        >
                                            <option value="">
                                                انتخاب کنید...
                                            </option>
                                            <option value="1">
                                                تهران
                                            </option>
                                            <option value="2">
                                                فناپ
                                            </option>
                                            <option value="3">
                                                خارجه
                                            </option>
                                        </select>
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </div>
                                </div>
                            </div>

                            <p class="text-blue font-base font-bold m-b-10 cursor-default p-0-10 m-t-8">
                                اطلاعات تماس
                            </p>
                            <div class="flex flex-wrap">
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                        ایمیل
                                    </span>
                                    <label class="field__email w-full block">
                                        <input type="text"
                                               placeholder="حروف انگلیسی"
                                               class="input input--blue block w-full border border-solid rounded direction-ltr"
                                               name="email" autocomplete="off" required="required" readonly="readonly"
                                               value="m_soleimanian@yahoo.com"
                                        />
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </label>
                                </div>
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                        تلفن همراه
                                    </span>
                                    <label class="field__phone w-full block">
                                        <input type="text"
                                               placeholder="تلفن همراه ۱۱ رقمی خود را وارد نمایید"
                                               class="input input--blue block w-full border border-solid rounded direction-ltr"
                                               name="phone" autocomplete="off" required="required" readonly="readonly"
                                               value="09013040663"
                                        />
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </label>
                                </div>
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                        تلفن اضطراری
                                    </span>
                                    <label class="field__tel-emergency w-full block">
                                        <input type="text"
                                               placeholder="تلفن اضطراری ۱۱ رقمی خود را وارد نمایید"
                                               class="input input--blue block w-full border border-solid rounded direction-ltr"
                                               name="tel_emergency" autocomplete="off" required="required"
                                        />
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </label>
                                </div>
                            </div>

                            <p class="text-blue font-base font-bold m-b-10 cursor-default p-0-10 m-t-8">
                                اطلاعات محل سکونت
                            </p>
                            <div class="flex flex-wrap">
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                        استان محل سکونت
                                    </span>
                                    <div class="field__home-province w-full">
                                        <select class="vnt-page__select vnt-page__select--home-province"
                                                name="home_province"
                                        >
                                            <option value="">
                                                انتخاب کنید...
                                            </option>
                                            <option value="1">
                                                تهران
                                            </option>
                                            <option value="2">
                                                فناپ
                                            </option>
                                            <option value="3">
                                                خارجه
                                            </option>
                                        </select>
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </div>
                                </div>
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                        شهر محل سکونت
                                    </span>
                                    <div class="field__home-city w-full">
                                        <select class="vnt-page__select vnt-page__select--home-city"
                                                name="home_city"
                                        >
                                            <option value="">
                                                انتخاب کنید...
                                            </option>
                                            <option value="1">
                                                تهران
                                            </option>
                                            <option value="2">
                                                فناپ
                                            </option>
                                            <option value="3">
                                                خارجه
                                            </option>
                                        </select>
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </div>
                                </div>
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                        نشانی منزل
                                    </span>
                                    <label class="field__home-address w-full block">
                                        <input type="text"
                                               placeholder="حروف فارسی"
                                               class="input input--blue block w-full border border-solid rounded"
                                               name="home_address" autocomplete="off" required="required"
                                        />
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </label>
                                </div>
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                        تلفن منزل
                                    </span>
                                    <label class="field__home-tel w-full block">
                                        <input type="text"
                                               placeholder="تلفن منزل ۱۱ رقمی خود را وارد نمایید"
                                               class="input input--blue block w-full border border-solid rounded direction-ltr"
                                               name="home_tel" autocomplete="off" required="required"
                                        />
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </label>
                                </div>
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux font-sm-bold cursor-default">
                                        کدپستی منزل
                                    </span>
                                    <label class="field__home-postal w-full block">
                                        <input type="text"
                                               placeholder="کد پستی ۱۰ رقمی خود را بدون خط تیره وارد نمایید"
                                               class="input input--blue block w-full border border-solid rounded direction-ltr"
                                               name="home_postal_code" autocomplete="off"
                                        />
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </label>
                                </div>
                            </div>

                            <p class="text-blue font-base font-bold m-b-10 cursor-default p-0-10 m-t-8">
                                اطلاعات شغل
                            </p>
                            <div class="flex flex-wrap">
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                        شغل
                                    </span>
                                    <label class="field__job w-full block">
                                        <input type="text"
                                               placeholder="حروف فارسی"
                                               class="input input--blue block w-full border border-solid rounded"
                                               name="job" autocomplete="off" required="required"
                                        />
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </label>
                                </div>
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux font-sm-bold cursor-default">
                                        استان محل کار
                                    </span>
                                    <select class="vnt-page__select vnt-page__select--job-province"
                                            name="job_province"
                                    >
                                        <option value="">
                                            انتخاب کنید...
                                        </option>
                                        <option value="1">
                                            تهران
                                        </option>
                                        <option value="2">
                                            فناپ
                                        </option>
                                        <option value="3">
                                            خارجه
                                        </option>
                                    </select>
                                </div>
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux font-sm-bold cursor-default">
                                        شهر محل کار
                                    </span>
                                    <select class="vnt-page__select vnt-page__select--job-city"
                                            name="job_city"
                                    >
                                        <option value="">
                                            انتخاب کنید...
                                        </option>
                                        <option value="1">
                                            تهران
                                        </option>
                                        <option value="2">
                                            فناپ
                                        </option>
                                        <option value="3">
                                            خارجه
                                        </option>
                                    </select>
                                </div>
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux font-sm-bold cursor-default">
                                        نشانی محل کار
                                    </span>
                                    <label class="field__job-address w-full block">
                                        <input type="text"
                                               placeholder="حروف فارسی"
                                               class="input input--blue block w-full border border-solid rounded"
                                               name="job_address" autocomplete="off"
                                        />
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </label>
                                </div>
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux font-sm-bold cursor-default">
                                        تلفن محل کار
                                    </span>
                                    <label class="field__job-tel w-full block">
                                        <input type="text"
                                               placeholder="تلفن محل کار ۱۱ رقمی خود را وارد نمایید"
                                               class="input input--blue block w-full border border-solid rounded direction-ltr"
                                               name="job_tel" autocomplete="off"
                                        />
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </label>
                                </div>
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux font-sm-bold cursor-default">
                                        کد پستی محل کار
                                    </span>
                                    <label class="field__job-postal w-full block">
                                        <input type="text"
                                               placeholder="کد پستی ۱۰ رقمی خود را بدون خط تیره وارد نمایید"
                                               class="input input--blue block w-full border border-solid rounded direction-ltr"
                                               name="job_postal_code" autocomplete="off"
                                        />
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </label>
                                </div>
                            </div>

                            <p class="text-blue font-base font-bold m-b-10 cursor-default p-0-10 m-t-8">
                                اطلاعات تکمیلی
                            </p>
                            <div class="flex flex-wrap">
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                        نحوه آشنایی
                                    </span>
                                    <div class="field__familiarization w-full">
                                        <select class="vnt-page__select vnt-page__select--familiarization"
                                                name="familiarization"
                                        >
                                            <option value="">
                                                انتخاب کنید...
                                            </option>
                                            <option value="1">
                                                نامشخص
                                            </option>
                                            <option value="2">
                                                دوست‌ها و آشنایان
                                            </option>
                                            <option value="3">
                                                رسانه‌ها
                                            </option>
                                            <option value="4">
                                                سایت
                                            </option>
                                            <option value="5">
                                                سایر
                                            </option>
                                        </select>
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </div>
                                </div>
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                        انگیزه‌ی همکاری
                                    </span>
                                    <label class="field__motivation w-full block">
                                        <input type="text"
                                               placeholder="حروف فارسی"
                                               class="input input--blue block w-full border border-solid rounded"
                                               name="motivation" autocomplete="off" required="required"
                                        />
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </label>
                                </div>
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                        فرصت همکاری
                                    </span>
                                    <label class="field__alloc-time w-full block">
                                        <input type="text"
                                               placeholder="تعداد روز در ماه"
                                               class="input input--blue block w-full border border-solid rounded direction-ltr"
                                               name="alloc_time" autocomplete="off" required="required"
                                        />
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </label>
                                </div>
                            </div>

                            <p class="text-blue font-base font-bold m-b-10 cursor-default p-0-10 m-t-8">
                                اطلاعات ورود به سامانه
                            </p>
                            <div class="flex flex-wrap">
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                        گذرواژه
                                    </span>
                                    <label class="field__password w-full block">
                                        <input type="password"
                                               placeholder="گذرواژه را حداقل هشت کاراکتر وارد نمایید"
                                               class="input input--blue block w-full border border-solid rounded direction-ltr"
                                               name="password" autocomplete="off" required="required"
                                        />
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </label>
                                </div>
                                <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                        تکرار گذرواژه
                                    </span>
                                    <label class="field__rpt-password w-full block">
                                        <input type="password"
                                               placeholder="تکرار گذرواژه"
                                               class="input input--blue block w-full border border-solid rounded direction-ltr"
                                               name="repeat_password" autocomplete="off" required="required"
                                        />
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </label>
                                </div>
                            </div>

                            <p class="text-blue font-base font-bold m-b-10 cursor-default p-0-10 m-t-8">
                                درچه زمینه ای می توانید فعالیت کنید؟
                            </p>
                            <div class="field__activity w-full">
                                <span class="error-message w-full text-red font-sm-bold pointer-event-none"></span>
                                <label class="checkbox-square relative flex items-center w-full cursor-pointer font-xs-bold">
                                    <input type="checkbox"
                                           class="checkbox-square__input"
                                           name="activity"
                                    />
                                    <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"></span>
                                    <span class="checkbox-square__label rounded user-select-none">
                                         برپایی غرفه‌های اهدای عضو
                                    </span>
                                </label>
                                <label class="checkbox-square relative flex items-center w-full cursor-pointer font-xs-bold">
                                    <input type="checkbox"
                                           class="checkbox-square__input"
                                           name="activity"
                                    />
                                    <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"></span>
                                    <span class="checkbox-square__label rounded user-select-none">
                                        برگزاری همایش‌ها، نمایشگاه‌ها و مراسم
                                    </span>
                                </label>
                                <label class="checkbox-square relative flex items-center w-full cursor-pointer font-xs-bold">
                                    <input type="checkbox"
                                           class="checkbox-square__input"
                                           name="activity"
                                    />
                                    <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"></span>
                                    <span class="checkbox-square__label rounded user-select-none">
                                        هنرهای نمایشی (سینما، تئاتر، انیمیشن، موسیقی، ساخت تیزر، نماهنگ، مستند، فیلم کوتاه، فیلم بلند و...)
                                    </span>
                                </label>
                                <label class="checkbox-square relative flex items-center w-full cursor-pointer font-xs-bold">
                                    <input type="checkbox"
                                           class="checkbox-square__input"
                                           name="activity"
                                    />
                                    <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"></span>
                                    <span class="checkbox-square__label rounded user-select-none">
                                        هنرهای تجسمی (نقاشی، گرافیک، مجسمه‌سازی، تصویرسازی، کاریکاتور، خوشنویسی، عکس و...)
                                    </span>
                                </label>
                                <label class="checkbox-square relative flex items-center w-full cursor-pointer font-xs-bold">
                                    <input type="checkbox"
                                           class="checkbox-square__input"
                                           name="activity"
                                    />
                                    <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"></span>
                                    <span class="checkbox-square__label rounded user-select-none">
                                        سمعی و بصری و روابط عمومی
                                    </span>
                                </label>
                                <label class="checkbox-square relative flex items-center w-full cursor-pointer font-xs-bold">
                                    <input type="checkbox"
                                           class="checkbox-square__input"
                                           name="activity"
                                    />
                                    <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"></span>
                                    <span class="checkbox-square__label rounded user-select-none">
                                        ایراد سخنرانی در مجامع عمومی
                                    </span>
                                </label>
                                <label class="checkbox-square relative flex items-center w-full cursor-pointer font-xs-bold">
                                    <input type="checkbox"
                                           class="checkbox-square__input"
                                           name="activity"
                                    />
                                    <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"></span>
                                    <span class="checkbox-square__label rounded user-select-none">
                                        فعالیت‌های مرتبط با آموزش
                                    </span>
                                </label>
                                <label class="checkbox-square relative flex items-center w-full cursor-pointer font-xs-bold">
                                    <input type="checkbox"
                                           class="checkbox-square__input"
                                           name="activity"
                                    />
                                    <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"></span>
                                    <span class="checkbox-square__label rounded user-select-none">
                                        فعالیت‌های مرتبط با پژوهش و آمار
                                    </span>
                                </label>
                                <label class="checkbox-square relative flex items-center w-full cursor-pointer font-xs-bold">
                                    <input type="checkbox"
                                           class="checkbox-square__input"
                                           name="activity"
                                    />
                                    <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"></span>
                                    <span class="checkbox-square__label rounded user-select-none">
                                        فعالیت های ادبی (شعر، داستان، جمله کوتاه و...)
                                    </span>
                                </label>
                                <label class="checkbox-square relative flex items-center w-full cursor-pointer font-xs-bold">
                                    <input type="checkbox"
                                           class="checkbox-square__input"
                                           name="activity"
                                    />
                                    <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"></span>
                                    <span class="checkbox-square__label rounded user-select-none">
                                        فعالیت‌های مرتبط با زبان انگلیسی (ترجمه، ترجمه‌ی هم‌زمان، زبان‌شناسی و...)
                                    </span>
                                </label>
                                <label class="checkbox-square relative flex items-center w-full cursor-pointer font-xs-bold">
                                    <input type="checkbox"
                                           class="checkbox-square__input"
                                           name="activity"
                                    />
                                    <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"></span>
                                    <span class="checkbox-square__label rounded user-select-none">
                                        فعالیت‌های مرتبط با انفورماتیک و رایانه
                                    </span>
                                </label>
                                <label class="checkbox-square relative flex items-center w-full cursor-pointer font-xs-bold">
                                    <input type="checkbox"
                                           class="checkbox-square__input"
                                           name="activity"
                                    />
                                    <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"></span>
                                    <span class="checkbox-square__label rounded user-select-none">
                                        فعالیت‌های اجرایی (برگزاری همایش‌ها، کنگره‌ها و...)
                                    </span>
                                </label>
                                <label class="checkbox-square relative flex items-center w-full cursor-pointer font-xs-bold">
                                    <input type="checkbox"
                                           class="checkbox-square__input"
                                           name="activity"
                                    />
                                    <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"></span>
                                    <span class="checkbox-square__label rounded user-select-none">
                                        امور بین‌الملل (برگزاری همایش‌ها، کنگره‌ها و... در سایر کشورها، تعاملات فرهنگی، آموزشی، پژوهشی و...)
                                    </span>
                                </label>
                            </div>

                            <button class="vnt-page__btn vnt-page__btn--submit block m-0-auto text-white font-lg font-bold bg-green border-green-200-2 rounded text-center l:transition-bg l:hover:bg-green-200">
                                ارسال اطلاعات
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script src="{{asset('js/site/volunteers-final.js')}}" defer></script>
    @endsection