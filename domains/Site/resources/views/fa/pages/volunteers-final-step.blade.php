@extends('fa.template.master')
@section('content')
    <div class="vnt-page dnt-page i-page">
        <div class="container">
            <h1 class="i-page__head flex items-center justify-center text-blue font-24 font-bold">
                <span class="i-page__title text-center cursor-default">
                    ثبت نام سفیر
                </span>
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
                                           value="{{$data['dataSessionUser']->get('name')}}"
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
                                           name="last_name" autocomplete="off" required="required" readonly="readonly"
                                           value="{{$data['dataSessionUser']->get('last_name')}}"
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
                                               value="0"
                                        />
                                        <span class="dnt-page__radio_label w-full h-full block text-bayoux font-normal">
                                                خانم
                                            </span>
                                    </label>
                                    <label class="w-1/3 input input--blue p-0 border border-r-0 border-l-0 border-solid cursor-pointer">
                                        <input type="radio"
                                               class="dnt-page__radio none"
                                               name="gender" required="required" autocomplete="off"
                                               value="1"
                                        />
                                        <span class="dnt-page__radio_label w-full h-full block text-bayoux font-normal">
                                                آقا
                                            </span>
                                    </label>
                                    <label class="w-1/3 input input--blue p-0 border border-solid rounded rounded-tr-none rounded-br-none cursor-pointer">
                                        <input type="radio"
                                               class="dnt-page__radio none"
                                               name="gender" required="required" autocomplete="off"
                                               value="3"
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
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                        شماره شناسنامه
                                    </span>
                                <label class="field__cert w-full block">
                                    <input type="text"
                                           placeholder="فقط عدد"
                                           class="input input--blue block w-full border border-solid rounded direction-ltr"
                                           name="identity_number" autocomplete="off"
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
                                           name="national_code" autocomplete="off" required="required"
                                           readonly="readonly"
                                           value="{{$data['dataSessionUser']->get('national_code')}}"
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
                                            @foreach($data['day'] as $day)
                                                <option value="{{$day}}">
                                                    {{$day}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="w-1/3 input input--blue p-0 border border-r-0 border-l-0 border-solid cursor-pointer">
                                        <select class="vnt-page__select vnt-page__select--month"
                                                name="birth_month"
                                        >
                                            <option value="">
                                                ماه
                                            </option>
                                            @foreach($data['month'] as $key => $month)
                                                <option value="{{$key}}">
                                                    {{$month}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="w-1/3 input input--blue p-0 border border-solid rounded rounded-tr-none rounded-br-none cursor-pointer">
                                        <select class="vnt-page__select vnt-page__select--year"
                                                name="birth_year"
                                        >
                                            <option value="">
                                                سال
                                            </option>
                                            @foreach($data['year'] as $year)
                                                <option value="{{$year}}">
                                                    {{$year}}
                                                </option>
                                            @endforeach
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
                                            name="province_of_birth"
                                    >
                                        <option value="">
                                            انتخاب کنید...
                                        </option>
                                        @foreach($data['state'] as $state)
                                            <option value="{{$state['id']}}">
                                                {{$state['name']}}
                                            </option>
                                        @endforeach
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
                                            name="city_of_birth"
                                    >
                                        <option value="">
                                            انتخاب کنید...
                                        </option>
                                        @foreach($data['city'] as $city)
                                            <option value="{{$city['id']}}">
                                                {{$city['name']}}
                                            </option>
                                        @endforeach
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
                                               name="marital_status" required="required" autocomplete="off"
                                               value="0"
                                        />
                                        <span class="dnt-page__radio_label w-full h-full block text-bayoux font-normal">
                                                مجرد
                                            </span>
                                    </label>
                                    <label class="w-1/2 input input--blue p-0 border border-r-0 border-solid rounded rounded-tr-none rounded-br-none cursor-pointer">
                                        <input type="radio"
                                               class="dnt-page__radio none"
                                               name="marital_status" required="required" autocomplete="off"
                                               value="1"
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
                                            name="last_education_degree"
                                    >
                                        <option value="">
                                            انتخاب کنید...
                                        </option>
                                        @foreach($data['education_degree'] as $key => $education_degree)
                                            <option value="{{$key}}">
                                                {{$education_degree}}
                                            </option>
                                        @endforeach
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
                                           name="education_field" autocomplete="off" required="required"
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
                                            name="education_province_id"
                                    >
                                        <option value="">
                                            انتخاب کنید...
                                        </option>
                                        @foreach($data['state'] as $state)
                                            <option value="{{$state['id']}}">
                                                {{$state['name']}}
                                            </option>
                                        @endforeach
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
                                            name="education_city_id"
                                    >
                                        <option value="">
                                            انتخاب کنید...
                                        </option>
                                        @foreach($data['city'] as $city)
                                            <option value="{{$city['id']}}">
                                                {{$city['name']}}
                                            </option>
                                        @endforeach
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
                                           value="{{$data['dataSessionUser']->get('email')}}"
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
                                           name="mobile" autocomplete="off" required="required" readonly="readonly"
                                           value="{{$data['dataSessionUser']->get('mobile')}}"
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
                                           name="essential_mobile" autocomplete="off" required="required"
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
                                            name="current_province_id"
                                    >
                                        <option value="">
                                            انتخاب کنید...
                                        </option>
                                        @foreach($data['state'] as $state)
                                            <option value="{{$state['id']}}">
                                                {{$state['name']}}
                                            </option>
                                        @endforeach
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
                                            name="current_city_id"
                                    >
                                        <option value="">
                                            انتخاب کنید...
                                        </option>
                                        @foreach($data['city'] as $city)
                                            <option value="{{$city['id']}}">
                                                {{$city['name']}}
                                            </option>
                                        @endforeach
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
                                           name="current_address" autocomplete="off" required="required"
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
                                           name="phone" autocomplete="off" required="required"
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
                                           name="job_title" autocomplete="off" required="required"
                                    />
                                    <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                </label>
                            </div>
                            <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux font-sm-bold cursor-default">
                                        استان محل کار
                                    </span>
                                <select class="vnt-page__select vnt-page__select--job-province"
                                        name="province_of_work"
                                >
                                    <option value="">
                                        انتخاب کنید...
                                    </option>
                                    @foreach($data['state'] as $state)
                                        <option value="{{$state['id']}}">
                                            {{$state['name']}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-1/3 xl:w-1/4 md:w-1/2 sm:w-full p-0-10 m-0-15">
                                    <span class="dnt-page__label block w-full text-bayoux font-sm-bold cursor-default">
                                        شهر محل کار
                                    </span>
                                <select class="vnt-page__select vnt-page__select--job-city"
                                        name="city_of_work"
                                >
                                    <option value="">
                                        انتخاب کنید...
                                    </option>
                                    @foreach($data['city'] as $city)
                                        <option value="{{$city['id']}}">
                                            {{$city['name']}}
                                        </option>
                                    @endforeach
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
                                           name="address_of_work" autocomplete="off"
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
                                           name="work_phone" autocomplete="off"
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
                                           name="work_postal_code" autocomplete="off"
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
                                            name="know_community_by"
                                    >
                                        <option value="">
                                            انتخاب کنید...
                                        </option>
                                        @foreach($data['know_community_by'] as $key => $know_community_by)
                                            <option value="{{$key}}">
                                                {{$know_community_by}}
                                            </option>
                                        @endforeach
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
                                           name="motivation_for_cooperation" autocomplete="off" required="required"
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
                                           name="day_of_cooperation" autocomplete="off" required="required"
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
                                           name="password_confirmation" autocomplete="off" required="required"
                                    />
                                    <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                </label>
                            </div>
                        </div>

                        <p class="text-blue font-base font-bold m-b-10 cursor-default p-0-10 m-t-8">
                            درچه زمینه ای می توانید فعالیت کنید؟
                        </p>
                        <div class="field__activity w-full">
                            @foreach($data['field_of_activities'] as $key => $field_of_activities)
                                <span class="error-message w-full text-red font-sm-bold pointer-event-none"></span>
                                <label class="checkbox-square relative flex items-center w-full cursor-pointer font-xs-bold">
                                    <input type="checkbox"
                                           class="checkbox-square__input"
                                           name="field_of_activities"
                                           value="{{$key}}"
                                    />
                                    <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"></span>
                                    <span class="checkbox-square__label rounded user-select-none">
                                         {{$field_of_activities}}
                                    </span>
                                </label>
                            @endforeach
                        </div>
                        <p class="vol-page__res none text-red flex flex-wrap font-sm font-bold cursor-default m-t-8 m-b-0 text-center justify-center"
                        ></p>
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
    <script src="{{asset('js/site/vendors~donation-card~volunteers~volunteers-final.js')}}" defer></script>
    <script src="{{asset('js/site/donation-card~volunteers-final.js')}}" defer></script>
    <script src="{{asset('js/site/volunteers-final.js')}}" defer></script>
@endsection
