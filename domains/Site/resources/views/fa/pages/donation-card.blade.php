@extends('fa.template.master')
    @section('content')
        <div class="dnt-page i-page">
            <div class="container">
                <h1 class="flex text-blue font-24 md:font-22 text-center">
                    <span class="flower_line flower_line--blue--200 relative flex items-end justify-end flex-1 reverse-item m-0"></span>
                    <span class="i-page__title">
                         کارت اهدای عضو
                    </span>
                    <span class="flower_line flower_line--blue--200 relative flex items-end justify-end flex-1 m-0"></span>
                </h1>
                <div class="p-t-35 w-full flex items-start">
                    <aside class="w-1/3 xl:w-1/4 flex-shrink-0 m-end-30">
                        <div class="dnt-page__panel border border-solid rounded-2">
                            <div class="dnt-page__panel_header bg-blue-100 font-lg font-bold text-white rounded-inherit rounded-bl-none rounded-br-none text-center cursor-default">
                                اطلاعات فردی
                            </div>

                            <form method="post" action=""
                                  class="dnt-page__from dnt-page__panel_body bg-white rounded-inherit rounded-tr-none rounded-tl-none" >
                                <p class="text-blue font-base font-bold m-b-4 cursor-default">
                                    اطلاعات فردی
                                </p>
                                <div class="dnt-page__input w-full block">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold">
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
                                <div class="dnt-page__input w-full block">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold">
                                        نام خانوادگی
                                    </span>
                                    <label class="dnt-page__full-name w-full block">
                                        <input type="text"
                                               placeholder="حروف فارسی"
                                               class="input input--blue block w-full border border-solid rounded"
                                               name="full_name" autocomplete="off" required="required"
                                        />
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </label>
                                </div>
                                <label class="dnt-page__input w-full block">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold">
                                        کد ملی
                                    </span>
                                    <label class="dnt-page__national-code w-full block">
                                        <input type="text"
                                               placeholder="۱۰ رقم بدون خط تیره"
                                               class="input input--blue block w-full border border-solid rounded direction-ltr"
                                               name="national_code" autocomplete="off" required="required"
                                        />
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </label>
                                </label>
                                <div class="dnt-page__from_step-two w-full h-0 overflow-hidden">
                                    <div class="w-full">
                                        <div class="dnt-page__input w-full block">
                                            <span class="dnt-page__label block w-full text-bayoux font-sm-bold">
                                                شماره شناسنامه
                                            </span>
                                            <label class="dnt-page__certificate w-full block">
                                                <input type="text"
                                                       placeholder="فقط عدد"
                                                       class="input input--blue block w-full border border-solid rounded direction-ltr"
                                                       name="birth_certificate" autocomplete="off" disabled="disabled"
                                                />
                                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                            </label>
                                        </div>
                                        <div class="dnt-page__input w-full block">
                                            <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                                جنسیت
                                            </span>
                                            <div class="dnt-page__gender w-full flex items-stretch text-center user-select-none">
                                                <label class="w-1/3 input input--blue p-0 border border-solid rounded rounded-tl-none rounded-bl-none cursor-pointer">
                                                    <input type="radio"
                                                           class="dnt-page__radio none"
                                                           name="gender" disabled="disabled"
                                                           value="{{$data['gender'][0]}}"
                                                    />
                                                    <span class="dnt-page__radio_label w-full h-full block text-bayoux font-normal">
                                                        خانم
                                                    </span>
                                                </label>
                                                <label class="w-1/3 input input--blue p-0 border border-r-0 border-l-0 border-solid cursor-pointer">
                                                    <input type="radio"
                                                           class="dnt-page__radio none"
                                                           name="gender" disabled="disabled"
                                                           value="{{$data['gender'][1]}}"
                                                    />
                                                    <span class="dnt-page__radio_label w-full h-full block text-bayoux font-normal">
                                                        آقا
                                                    </span>
                                                </label>
                                                <label class="w-1/3 input input--blue p-0 border border-solid rounded rounded-tr-none rounded-br-none cursor-pointer">
                                                    <input type="radio"
                                                           class="dnt-page__radio none"
                                                           name="gender" disabled="disabled"
                                                           value="{{$data['gender'][2]}}"
                                                    />
                                                    <span class="dnt-page__radio_label w-full h-full block text-bayoux font-normal">
                                                        سایر
                                                    </span>
                                                </label>
                                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                            </div>
                                        </div>
                                        <div class="dnt-page__input w-full block">
                                            <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold">
                                                نام پدر
                                            </span>
                                            <label class="dnt-page__parent-name w-full block">
                                                <input type="text"
                                                       placeholder="حروف فارسی"
                                                       class="input input--blue block w-full border border-solid rounded"
                                                       name="parent_name" autocomplete="off" required="required" disabled="disabled"

                                                />
                                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                            </label>
                                        </div>
                                        <div class="dnt-page__input w-full block">
                                            <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                                تاریخ تولد
                                            </span>
                                            <div class="dnt-page__date_birth w-full flex items-stretch text-center user-select-none">
                                                <div class="w-1/3 input input--blue p-0 border border-solid rounded rounded-tl-none rounded-bl-none cursor-pointer">
                                                    <select class="dnt-page__select dnt-page__select--day"
                                                            name="birth_day" disabled="disabled"
                                                    >
                                                        <option value="">
                                                            روز
                                                        </option>
                                                        @foreach($data['day'] as $day)
                                                        <option value="{{$day}}">
                                                            {{$day}}
                                                        </option>
                                                        @endforeach
                                                        <option value="2">
                                                    </select>
                                                </div>
                                                <div class="w-1/3 input input--blue p-0 border border-r-0 border-l-0 border-solid cursor-pointer">
                                                    <select class="dnt-page__select dnt-page__select--month"
                                                            name="birth_month" disabled="disabled"
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
                                                    <select class="dnt-page__select dnt-page__select--year"
                                                            name="birth_year" disabled="disabled"
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
                                        <div class="dnt-page__input w-full block">
                                            <span class="dnt-page__label block w-full text-bayoux font-sm-bold cursor-default">
                                                استان محل تولد
                                            </span>
                                            <select class="dnt-page__select dnt-page__select--birth"
                                                    name="birth_province"
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
                                        <div class="dnt-page__input w-full block">
                                            <span class="dnt-page__label block w-full text-bayoux font-sm-bold cursor-default">
                                                شهر محل تولد
                                            </span>
                                            <select class="dnt-page__select dnt-page__select--birth-city"
                                                    name="birth_city"
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
                                        <p class="text-blue font-base font-bold m-b-4 cursor-default">
                                            اطلاعات تماس
                                        </p>
                                        <div class="dnt-page__input w-full block">
                                            <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold">
                                                تلفن همراه
                                            </span>
                                            <label class="dnt-page__phone w-full block">
                                                <input type="text"
                                                       placeholder="تلفن همراه ۱۱ رقمی خود را وارد نمایید"
                                                       class="input input--blue block w-full border border-solid rounded direction-ltr"
                                                       name="phone" autocomplete="off" required="required" disabled="disabled"
                                                />
                                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                            </label>
                                        </div>
                                        <div class="dnt-page__input w-full block">
                                            <span class="dnt-page__label block w-full text-bayoux font-sm-bold">
                                                ایمیل
                                            </span>
                                            <label class="dnt-page__email w-full block">
                                                <input type="text"
                                                       placeholder="حروف انگلیسی"
                                                       class="input input--blue block w-full border border-solid rounded direction-ltr"
                                                       autocomplete="off" disabled="disabled"
                                                       name="email"
                                                />
                                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                            </label>
                                        </div>
                                        <p class="text-blue font-base font-bold m-b-4 cursor-default">
                                            اطلاعات محل سکونت
                                        </p>
                                        <div class="dnt-page__input w-full block">
                                            <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                                استان محل سکونت
                                            </span>
                                            <div class="relative dnt-page__home-province w-full">
                                                <select class="dnt-page__select dnt-page__select--province"
                                                        name="home_province" disabled="disabled"
                                                >
                                                    <option value="">
                                                        محل سکونت را انتخاب نمایید
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
                                        <div class="dnt-page__input w-full block">
                                            <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                                شهر محل سکونت
                                            </span>
                                            <div class="relative dnt-page__home-city w-full">
                                                <select class="dnt-page__select dnt-page__select--home-city"
                                                        name="home_city" disabled="disabled"
                                                >
                                                    <option value="">
                                                        محل سکونت را انتخاب نمایید
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
                                        <div class="dnt-page__input w-full block">
                                            <span class="dnt-page__label block w-full text-bayoux font-sm-bold">
                                                آدرس محل سکونت
                                            </span>
                                            <label class="dnt-page__phone w-full block">
                                                <input type="text"
                                                       placeholder="حروف فارسی"
                                                       class="input input--blue block w-full border border-solid rounded"
                                                       name="home_address" autocomplete="off" disabled="disabled"
                                                />
                                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                            </label>
                                        </div>
                                        <div class="dnt-page__input w-full block">
                                            <span class="dnt-page__label block w-full text-bayoux font-sm-bold">
                                                تلفن منزل
                                            </span>
                                            <div class="dnt-page__tel w-full-block">
                                                <input type="text"
                                                       placeholder="تلفن منزل ۱۱ رقمی خود را وارد نمایید"
                                                       class="input input--blue block w-full border border-solid rounded direction-ltr"
                                                       name="tel" autocomplete="off" disabled="disabled"
                                                />
                                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                            </div>
                                        </div>
                                        <div class="dnt-page__input w-full block">
                                            <span class="dnt-page__label block w-full text-bayoux font-sm-bold">
                                                کدپستی منزل
                                            </span>
                                            <div class="dnt-page__postal_code w-full-block">
                                                <input type="text"
                                                       placeholder="کدپستی ۱۰ رقمی خود را وارد نمایید"
                                                       class="input input--blue block w-full border border-solid rounded direction-ltr"
                                                       name="home_postal_code" autocomplete="off" disabled="disabled"
                                                />
                                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                            </div>
                                        </div>
                                        <p class="text-blue font-base font-bold m-b-4 cursor-default">
                                            اطلاعات تحصیلی
                                        </p>
                                        <div class="dnt-page__input w-full block">
                                            <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold cursor-default">
                                                میزان تحصیلات
                                            </span>
                                            <div class="dnt-page__edu-level w-full">
                                                <select class="dnt-page__select dnt-page__select_edu-level"
                                                        name="edu_level"
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
                                        <div class="dnt-page__input w-full block">
                                            <span class="dnt-page__label block w-full text-bayoux font-sm-bold cursor-default">
                                                رشته تحصیلی
                                            </span>
                                            <label class="dnt-page__job w-full block">
                                                <input type="text"
                                                       placeholder="حروف فارسی"
                                                       class="input input--blue block w-full border border-solid rounded"
                                                       name="edu_field" autocomplete="off" disabled="disabled"
                                                />
                                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                            </label>
                                        </div>
                                        <div class="dnt-page__input w-full block">
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
                                                    @foreach($data['state'] as $state)
                                                        <option value="{{$state['id']}}">
                                                            {{$state['name']}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                            </div>
                                        </div>
                                        <div class="dnt-page__input w-full block">
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
                                                    @foreach($data['city'] as $city)
                                                        <option value="{{$city['id']}}">
                                                            {{$city['name']}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                            </div>
                                        </div>
                                        <p class="text-blue font-base font-bold m-b-4 cursor-default">
                                            اطلاعات شغل
                                        </p>
                                        <div class="dnt-page__input w-full block">
                                            <span class="dnt-page__label block w-full text-bayoux font-sm-bold cursor-default">
                                                شغل
                                            </span>
                                            <label class="dnt-page__job w-full block">
                                                <input type="text"
                                                       placeholder="حروف فارسی"
                                                       class="input input--blue block w-full border border-solid rounded"
                                                       name="job" autocomplete="off" disabled="disabled"
                                                />
                                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                            </label>
                                        </div>
                                        <p class="text-blue font-base font-bold m-b-4 cursor-default">
                                            اطلاعات ورود به سامانه
                                        </p>
                                        <div class="dnt-page__input w-full block">
                                            <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold">
                                                گذرواژه
                                            </span>
                                            <label class="dnt-page__password w-full block">
                                                <input type="password"
                                                       placeholder="گذرواژه را حداقل هشت کاراکتر وارد نمایید"
                                                       class="input input--blue block w-full border border-solid rounded direction-ltr"
                                                       autocomplete="off" required disabled="disabled"
                                                       name="password"
                                                />
                                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                            </label>
                                        </div>
                                        <div class="dnt-page__input w-full block">
                                            <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold">
                                                تکرار گذرواژه
                                            </span>
                                            <label class="dnt-page__rpt-password w-full block">
                                                <input type="password"
                                                       placeholder="تکرار گذرواژه"
                                                       class="input input--blue block w-full border border-solid rounded direction-ltr"
                                                       autocomplete="off" required disabled="disabled"
                                                       name="repeat_password"
                                                />
                                                <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <p class="form__msg none text-red font-sm font-bold cursor-default m-t-8"></p>
                                <button class="dnt-page__btn dnt-page__btn--submit block w-full text-white font-lg font-bold bg-green border-green-200-2 rounded l:transition-bg l:hover:bg-green-200">
                                    ارسال اطلاعات
                                </button>
                                <button class="dnt-page__btn dnt-page__btn--cancel none w-full text-green spinner-loading font-lg font-bold bg-white border-green-2 rounded l:transition-bg l:hover:text-white l:hover:bg-green">
                                    انصراف
                                </button>
                            </form>
                        </div>
                    </aside>
                    <div class="flex-1">
                        <div class="dnt-page__box inner-box inner-box--white">
                            <h1 class="text-blue-800 font-24 font-bold cursor-default m-b-20">
                                تاریخچه و اهمیت کارت اهدای عضو
                            </h1>
                            <div class="dnt-page__caption text-bayoux cursor-default font-base">
                                <p>
                                    کارت اهدای عضو یکی از بزرگترین نمادهای فرهنگی در زمینه ارتقای فرهنگ اهدای عضو می باشد.
                                </p>
                                <p>
                                    از زمان راه اندازی واحدهای فراهم آوری اعضای پیوندی در کشورمان، مراکز مختلفی شروع به ثبت نام و صدور کارت اهدای عضو نمودند. در روزها و ماه‌های اول تعداد ثبت نام به بیش از 100 نفر در ماه نمیرسید، اما با شروع تبلیغات فرهنگی و برگزاری جشن نفس، تعداد بیشتری از مردم نیک اندیش سرزمینمان با این امر مقدس آشنا شدند و تعداد افراد متقاضی کارت اهدای عضو به بیش از 500 نفر در روز رسید...
                                </p>
                                <p class="dnt-page__text--flower w-full relative">
                                    <span class="i-page__flower_line i-page__flower_line--left flower_line flower_line--blue--200 absolute flex items-end justify-end pointer-event-none m-0"></span>
                                    تقاضای دریافت کارت اهدای عضو روز به روز بیشتر شد، به اندازه ای که مدت زمان دریافت کارت اهدای عضو برای هر فرد به بیش از 5ماه رسید. باتوجه به اینکه کارت اهدای عضو صرفاً نشان دهنده رضایت قلبی هر شخص برای اهدای عضو در زمان مرگ میباشد و جنبه‌‌ی قانونی ندارد؛ لذا بر آن شدیم تا سامانه ای راه اندازی کنیم که مدت زمان دریافت کارت را به طرز چشمگیری کاهش دهد تا انتظار رسیدن این کارت، مردم ایثارگر میهن عزیزمان را آزرده خاطر نسازد.
                                    با توجه به مسائل فوق و همچنین پیرو تاکید مقام محترم وزارت بهداشت، درمان و آموزش پزشکی، ابداع روشی برای ثبت نام و صدور آنی کارت اهدای عضو در دستور کار این وزارت قرار گرفت و نتیجه تمامی بررسی ها، سامانه ای است که پیش روی شما می باشد. در این سامانه کد ملی هر فرد به صورت آنلاین کنترل شده و در صورتیکه اطلاعات مطابق کارت ملی وارد شده باشد، کارت اهدای عضو صادر شده و متقاضی میتواند همان لحظه کارت خود را ذخیره و چاپ نماید.
                                </p>
                                <p>
                                    اطلاعات داوطلبین دریافت کارت بلافاصله وارد سامانه کشوری کارت اهدای عضو شده و در آن ذخیره می گردد. لازم به ذکر است این سامانه از طریق کلیه بیمارستانهای کشور قابل دسترسی بوده و امکان جستجوی نام افراد مرگ مغزی بستری در این بیمارستانها وجود دارد.
                                    امید است با راه اندازی این سامانه قدمی هرچند کوچک برای ارتقای فرهنگ مقدس اهدی عضو و نجات جان بیماران نیازمند به پیوند اعضا برداریم...
                                </p>
                                <p class="dnt-page__text--flower-reverse relative font-bold">
                                    <span class="i-page__flower_line i-page__flower_line--right flower_line flower_line--blue--200 absolute flex items-end justify-end reverse-item pointer-event-none m-0"></span>
                                    لطفا به نکات زیر توجه داشته باشید:
                                </p>
                                <p>
                                    1. عزیزانی که برای دریافت کارت اهدای عضو از طریق سامانه ehda.ir  یا سامانه های مشابه ثبت نام کرده اند، توجه داشته باشند که جهت پیگیری کارت خود لازم است به همان سامانه مراجعه کنند.
                                    <br>
                                    2. داوطلبانی که در سامانه های دیگر ثبت نام نموده و از طریق این سامانه ها و یا از طریق مراجعه به هر یک از  واحدهای فراهم آوری کشور یا ارگانهای دیگر کارت دریافت نموده اند همچنین می توانند برای ثبت اطلاعات خود در سامانه www.ehda.center نیز اقدام نمایند تا اطلاعات آنها در سامانه مرکزی نیز ثبت شده و از تمام کشور قابل دسترسی باشد.
                                    <br>
                                    3. در صورتیکه علاوه بر ثبت اطلاعات تان در سامانه مرکزی اهدای عضو تمایل دارید کارت اهدای عضو را نیز دریافت نمائید، می توانید کارت خود را بلافاصله پس از تکمیل اطلاعات پرینت گرفته و کارت پرینت شده را پرس کرده و استفاده نمایید.
                                </p>
                                <p>
                                    <br>
                                    درصورتی که قبلاً در این سامانه ثبت نام کرده اید، جهت ویرایش اطلاعات شخصی و یا چاپ مجدد کارت خود برروی دکمه ورود به سامانه کلیک نمائید، در غیر اینصورت جهت ثبت نام و دریافت کارت اهدای عضو خود برروی دکمه ثبت نام کارت اهدای عضو کلیک کنید.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script src="{{asset('js/site/vendors~donation-card.js')}}" defer></script>
        <script src="{{asset('js/site/donation-card.js')}}" defer></script>
    @endsection

