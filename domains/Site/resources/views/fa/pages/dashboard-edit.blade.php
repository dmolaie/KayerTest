@extends('fa.template.master')
    @section('content')
        <div class="p-edit dnt-page i-page">
            <div class="container">
                <h1 class="i-page__head flex items-center justify-center text-blue font-24 font-bold">
                    <span class="i-page__title text-center cursor-default">
                        پروفایل
                    </span>
                </h1>
                <form method="POST"
                      class="p-edit__box inner-box w-full block"
                >
                    <div class="p-edit__row flex flex-wrap w-full bg-white border border-solid rounded-1/2">
                        <div class="dnt-page__input block md:w-full">
                            <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                نام
                            </span>
                            <label class="dnt-page__name w-full block">
                                <input type="text"
                                       placeholder="حروف فارسی"
                                       class="input input--blue block w-full border border-solid rounded"
                                       name="name" autocomplete="off" required="required"
                                />
                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                            </label>
                        </div>
                        <div class="dnt-page__input block md:w-full">
                            <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                نام خانوادگی
                            </span>
                            <label class="dnt-page__full-name w-full block">
                                <input type="text"
                                       placeholder="حروف فارسی"
                                       class="input input--blue block w-full border border-solid rounded"
                                       name="last_name" autocomplete="off" required="required"
                                />
                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                            </label>
                        </div>
                        <div class="dnt-page__input block md:w-full">
                            <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                کد ملی
                            </span>
                            <label class="dnt-page__national-code w-full block">
                                <input type="text"
                                       placeholder="۱۰ رقم بدون خط تیره"
                                       class="input input--blue block w-full border border-solid rounded direction-ltr"
                                       name="national_code" autocomplete="off" required="required"
                                       disabled="disabled"
                                />
                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                            </label>
                        </div>
                        <div class="dnt-page__input block md:w-full">
                            <span class="dnt-page__label block w-full text-bayoux font-sm-bold cursor-default">
                                شماره شناسنامه
                            </span>
                            <label class="dnt-page__certificate w-full block">
                                <input type="text"
                                       placeholder="فقط عدد"
                                       class="input input--blue block w-full border border-solid rounded direction-ltr"
                                       name="identity_number" autocomplete="off"
                                />
                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                            </label>
                        </div>
                        <div class="dnt-page__input block md:w-full">
                            <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                جنسیت
                            </span>
                            <div class="dnt-page__gender w-full flex items-stretch text-center user-select-none">
                                <label class="w-1/3 input input--blue p-0 border border-solid rounded rounded-tl-none rounded-bl-none cursor-pointer">
                                    <input type="radio"
                                           class="dnt-page__radio none"
                                           name="gender" value="0"
                                    />
                                    <span class="dnt-page__radio_label w-full h-full block text-bayoux font-normal">
                                        خانم
                                    </span>
                                </label>
                                <label class="w-1/3 input input--blue p-0 border border-r-0 border-l-0 border-solid cursor-pointer">
                                    <input type="radio"
                                           class="dnt-page__radio none"
                                           name="gender" value="1"
                                    />
                                    <span class="dnt-page__radio_label w-full h-full block text-bayoux font-normal">
                                        آقا
                                    </span>
                                </label>
                                <label class="w-1/3 input input--blue p-0 border border-solid rounded rounded-tr-none rounded-br-none cursor-pointer">
                                    <input type="radio"
                                           class="dnt-page__radio none"
                                           name="gender" value="2"
                                    />
{{--                                    value="{{$data['gender'][2]}}"--}}
                                    <span class="dnt-page__radio_label w-full h-full block text-bayoux font-normal">
                                        سایر
                                    </span>
                                </label>
                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                            </div>
                        </div>
                        <div class="dnt-page__input block md:w-full">
                            <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                نام پدر
                            </span>
                            <label class="dnt-page__parent-name w-full block">
                                <input type="text"
                                       placeholder="حروف فارسی"
                                       class="input input--blue block w-full border border-solid rounded"
                                       name="father_name" autocomplete="off" required="required"

                                />
                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                            </label>
                        </div>
                        <div class="dnt-page__input block md:w-full">
                            <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                تاریخ تولد
                            </span>
                            <div class="dnt-page__date_birth w-full flex items-stretch text-center user-select-none">
                                <div class="w-1/3 input input--blue p-0 border border-solid rounded rounded-tl-none rounded-bl-none cursor-pointer">
                                    <select class="dnt-page__select dnt-page__select--day"
                                    >
                                        <option value="">
                                            روز
                                        </option>
                                    </select>
                                </div>
                                <div class="w-1/3 input input--blue p-0 border border-r-0 border-l-0 border-solid cursor-pointer">
                                    <select class="dnt-page__select dnt-page__select--month"
                                            name="birth_month"
                                    >
                                        <option value="">
                                            ماه
                                        </option>
                                    </select>
                                </div>
                                <div class="w-1/3 input input--blue p-0 border border-solid rounded rounded-tr-none rounded-br-none cursor-pointer">
                                    <select class="dnt-page__select dnt-page__select--year"
                                            name="birth_year"
                                    >
                                        <option value="">
                                            سال
                                        </option>
                                    </select>
                                </div>
                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                            </div>
                        </div>
                        <div class="dnt-page__input block md:w-full">
                            <span class="dnt-page__label block w-full text-bayoux font-sm-bold cursor-default">
                                استان محل تولد
                            </span>
                            <select class="dnt-page__select dnt-page__select--birth"
                                    name="birth_province"
                            >
                                <option value="">
                                    انتخاب کنید...
                                </option>
                            </select>
                        </div>
                        <div class="dnt-page__input block md:w-full">
                            <span class="dnt-page__label block w-full text-bayoux font-sm-bold cursor-default">
                                شهر محل تولد
                            </span>
                            <select class="dnt-page__select dnt-page__select--birth-city"
                                    name="birth_city"
                            >
                                <option value="">
                                    انتخاب کنید...
                                </option>
                            </select>
                        </div>
                        <div class="dnt-page__input block md:w-full">
                            <span class="dnt-page__label block w-full text-bayoux font-sm-bold cursor-default">
                                شغل
                            </span>
                            <label class="dnt-page__job_title w-full block">
                                <input type="text"
                                       placeholder="حروف فارسی"
                                       class="input input--blue block w-full border border-solid rounded"
                                       name="job_title" autocomplete="off"
                                />
                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                            </label>
                        </div>
                    </div>

                    <div class="p-edit__row flex flex-wrap w-full bg-white border border-solid rounded-1/2">
                        <div class="dnt-page__input block md:w-full">
                            <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                تلفن همراه
                            </span>
                            <label class="dnt-page__phone w-full block">
                                <input type="text"
                                       placeholder="تلفن همراه ۱۱ رقمی خود را وارد نمایید"
                                       class="input input--blue block w-full border border-solid rounded direction-ltr"
                                       name="mobile" autocomplete="off" required="required"
                                />
                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                            </label>
                        </div>
                        <div class="dnt-page__input block md:w-full">
                            <span class="dnt-page__label block w-full text-bayoux font-sm-bold cursor-default">
                                ایمیل
                            </span>
                            <label class="dnt-page__email w-full block">
                                <input type="text"
                                       placeholder="حروف انگلیسی"
                                       class="input input--blue block w-full border border-solid rounded direction-ltr"
                                       name="email" autocomplete="off"
                                />
                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                            </label>
                        </div>
                    </div>

                    <div class="p-edit__row flex flex-wrap w-full bg-white border border-solid rounded-1/2">
                        <div class="dnt-page__input block md:w-full">
                            <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                استان محل سکونت
                            </span>
                            <div class="relative dnt-page__home-province w-full">
                                <select class="dnt-page__select dnt-page__select--province"
                                        name="current_province_id"
                                >
                                    <option value="">
                                        محل سکونت را انتخاب نمایید
                                    </option>
                                </select>
                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                            </div>
                        </div>
                        <div class="dnt-page__input block md:w-full">
                            <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                شهر محل سکونت
                            </span>
                            <div class="relative dnt-page__home-city w-full">
                                <select class="dnt-page__select dnt-page__select--home-city"
                                        name="current_city_id"
                                >
                                    <option value="">
                                        محل سکونت را انتخاب نمایید
                                    </option>
                                </select>
                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                            </div>
                        </div>
                        <div class="dnt-page__input block md:w-full">
                            <span class="dnt-page__label block w-full text-bayoux font-sm-bold cursor-default">
                                آدرس محل سکونت
                            </span>
                            <label class="dnt-page__current_address w-full block">
                                <input type="text"
                                       placeholder="حروف فارسی"
                                       class="input input--blue block w-full border border-solid rounded"
                                       name="current_address" autocomplete="off"
                                />
                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                            </label>
                        </div>
                        <div class="dnt-page__input block md:w-full">
                            <span class="dnt-page__label block w-full text-bayoux font-sm-bold cursor-default">
                                تلفن منزل
                            </span>
                            <div class="dnt-page__tel w-full-block">
                                <input type="text"
                                       placeholder="تلفن منزل ۱۱ رقمی خود را وارد نمایید"
                                       class="input input--blue block w-full border border-solid rounded direction-ltr"
                                       name="phone" autocomplete="off"
                                />
                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                            </div>
                        </div>
                        <div class="dnt-page__input block md:w-full">
                            <span class="dnt-page__label block w-full text-bayoux font-sm-bold cursor-default">
                                کدپستی منزل
                            </span>
                            <div class="dnt-page__postal_code w-full-block">
                                <input type="text"
                                       placeholder="کدپستی ۱۰ رقمی خود را وارد نمایید"
                                       class="input input--blue block w-full border border-solid rounded direction-ltr"
                                       name="home_postal_code" autocomplete="off"
                                />
                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                            </div>
                        </div>
                    </div>

                    <div class="p-edit__row flex flex-wrap w-full bg-white border border-solid rounded-1/2">
                        <div class="dnt-page__input block md:w-full">
                            <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                میزان تحصیلات
                            </span>
                            <div class="dnt-page__edu-level w-full">
                                <select class="dnt-page__select dnt-page__select_edu-level"
                                        name="last_education_degree"
                                >
                                    <option value="">
                                        انتخاب کنید...
                                    </option>
                                </select>
                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                            </div>
                        </div>
                        <div class="dnt-page__input block md:w-full">
                            <span class="dnt-page__label block w-full text-bayoux font-sm-bold cursor-default">
                                رشته تحصیلی
                            </span>
                            <label class="dnt-page__education_field w-full block">
                                <input type="text"
                                       placeholder="حروف فارسی"
                                       class="input input--blue block w-full border border-solid rounded"
                                       name="education_field" autocomplete="off"
                                />
                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                            </label>
                        </div>
                        <div class="dnt-page__input block md:w-full">
                            <span class="dnt-page__label block w-full text-bayoux font-sm-bold cursor-default">
                                استان محل تحصیل
                            </span>
                            <div class="dnt-page__select--province w-full">
                                <select class="dnt-page__select dnt-page__select--edu_province"
                                        name="edu_province"
                                >
                                    <option value="">
                                        محل سکونت را انتخاب نمایید
                                    </option>
                                </select>
                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                            </div>
                        </div>
                        <div class="dnt-page__input block md:w-full">
                            <span class="dnt-page__label block w-full text-bayoux font-sm-bold cursor-default">
                                شهر محل تحصیل
                            </span>
                            <div class="dnt-page__select--province w-full">
                                <select class="dnt-page__select dnt-page__select--edu_city"
                                        name="edu_city"
                                >
                                    <option value="">
                                        محل سکونت را انتخاب نمایید
                                    </option>
                                </select>
                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                            </div>
                        </div>
                    </div>

                    <div class="p-edit__row flex flex-wrap w-full bg-white border border-solid rounded-1/2">
                        <div class="dnt-page__input block md:w-full">
                            <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                گذرواژه‌ی جدید
                            </span>
                            <label class="dnt-page__password w-full block">
                                <input type="password"
                                       placeholder="گذرواژه را حداقل هشت کاراکتر وارد نمایید"
                                       class="input input--blue block w-full border border-solid rounded direction-ltr"
                                       name="password" autocomplete="off"
                                />
                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                            </label>
                        </div>
                        <div class="dnt-page__input block md:w-full">
                            <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold">
                                تکرار گذرواژه‌ی جدید
                            </span>
                            <label class="dnt-page__rpt-password w-full block">
                                <input type="password"
                                       placeholder="تکرار گذرواژه"
                                       class="input input--blue block w-full border border-solid rounded direction-ltr"
                                       name="password_confirmation" autocomplete="off"
                                />
                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                            </label>
                        </div>
                    </div>

                    <div class="flex flex-wrap w-full">
                        <button class="p-edit__submit p-edit__submit--green text-white block font-24 font-bold md:w-full border border-solid rounded-10 text-center spinner-loading">
                            ذخیره
                        </button>
                        <a href=""
                            class="p-edit__submit p-edit__submit--white bg-white block font-24 font-bold md:w-full border border-solid rounded-10 text-center"
                        >
                            انصراف
                        </a>
                    </div>
                </form>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script src="{{asset('js/site/vendors~donation-card~edit-profile~volunteers~volunteers-final.js')}}" defer></script>
        <script src="{{asset('js/site/donation-card~edit-profile~volunteers-final.js')}}" defer></script>
        <script src="{{asset('js/site/edit-profile.js')}}" defer></script>
    @endsection