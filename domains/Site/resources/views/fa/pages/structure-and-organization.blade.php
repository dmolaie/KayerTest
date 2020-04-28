@extends('fa.template.master')
@section('content')
    <div class="org-page i-page">
        <div class="container sm:p-0">
            <h1 class="i-page__head flex items-center justify-center text-blue font-24 font-bold sm:font-lg">
                <span class="i-page__title text-center cursor-default">
                    ساختار و تشکیلات
                </span>
            </h1>
            <div class="inner-box inner-box--white">
                <h2 class="i-page__sub-title font-lg-bold md:font-base text-blue-800 text-right cursor-default l:m-b-30 md:m-b-20 sm:font-sm">
                    کمیته علمی مددکاری اجتماعی :
                </h2>
                <p class="i-page__text md:font-sm text-bayoux font-base text-right m-b-20 sm:font-base text-justify">
                    کمیته علمی مددکاری اجتماعی با هدف برنامه‌ریزی، سازماندهی و هدایت فعالیت‌های مرتبط با حوزه مددکاری اجتماعی زیر نظر واحد مددکاری انجمن اهدای عضو ایرانیان از مورخ ۱۲ شهریور ۹۶ با حضور افراد مشروحه زیر شروع به فعالیت نموده است.
                </p>
                <ul class="i-page__list w-full m-b-60 md:m-0">
                    <li class="i-page__list_item i-page__text md:font-sm flex items-center text-bayoux font-base-bold text-right sm:font-base ">
                        دکتر معصومه معارف‌وند - سرپرست علمی
                    </li>
                    <li class="i-page__list_item i-page__text md:font-sm flex items-center text-bayoux font-base-bold text-right sm:font-base ">
                        دکتر مریم ذبیحی‌پور سعادتی - عضو اصلی
                    </li>
                    <li class="i-page__list_item i-page__text md:font-sm flex items-center text-bayoux font-base-bold text-right sm:font-base ">
                        دکتر زهراالسادات ترابی* - عضو اصلی
                    </li>
                    <li class="i-page__list_item i-page__text md:font-sm flex items-center text-bayoux font-base-bold text-right sm:font-base ">
                        محبوبه زیارتی - عضو اصلی و دبیر
                    </li>
                    <li class="i-page__list_item i-page__text md:font-sm flex items-center text-bayoux font-base-bold text-right sm:font-base ">
                        نسرین ایزدیار - عضو اصلی
                    </li>
                </ul>
                <div class="relative flex items-stretch m-b-50 l:k3bvEft8 md:flex-col md:m-t-40">
                    <div class="flex-1">
                        <p class="i-page__text text-bayoux font-base text-justify">
                            دکتر زهرا السادات ترابی متولد 19 مرداد 1367 شهرستان خمین از استان مرکزی، دانش‌آموخته رشته مددکاری اجتماعی دانشگاه علوم بهزیستی و توانبخشی، عضو کمیته علمی مددکاری اجتماعی انجمن اهدای عضو ایرانیان از سال 1396 بودند. ایشان یکی از طراحان دستورالعمل خدمات تخصصی روانی اجتماعی به خانواده‌های اهداکننده عضو می بودند. همچنین سال‌ها به عنوان مددکار اجتماعی در بیمارستان روانپزشکی رازی خدمت نموده و عضو تیم طراحی دستورالعمل‌های پایه‌ای مددکاری اجتماعی در مراکز بهداشتی درمانی، مدرس دانشگاه و... بودند که متاسفانه در صانحه رانندگی در 27 مرداد 98 جان به جان آفرین تسلیم نموده و به لقاءالله پیوستند.
                            <br><br>
                            نام و یاد این سفیر گرانقدر اهدای عضو به عنوان انسانی والا همیشه دریادها خواهد ماند.
                        </p>
                    </div>
                    <div class="l:w-260">
                        <figure class="org-page__cover block w-full h-full l:m-r-28 rounded has-skeleton">
                            <img src=""
                                 data-src="{{ secure_asset('images/1570868165_GXXG8eFBc1SHej421ztX3mYP0QGA92_original.jpg') }}"
                                 alt=""
                                 class="org-page__image block w-full h-full rounded-3 object-cover"
                            />
                        </figure>
                    </div>
                </div>
                <div class="relative w-full m-b-30">
                    <p class="i-page__text md:font-sm text-bayoux font-sm font-light text-right m-b-30 sm:font-base">
                        در طی فعالیت این کمیته اقدامات زیر صورت پذیرفته است:
                    </p>
                    <ul class="i-page__list w-full">
                        <li class="i-page__list_item i-page__text md:font-sm flex items-center text-bayoux font-base-bold sm:font-base text-right">
                            تهیه چارت سازمانی و تشکیلات سازمانی اداره مددکاری اجتماعی انجمن
                        </li>
                        <li class="i-page__list_item i-page__text md:font-sm flex items-center text-bayoux font-base-bold sm:font-base text-right">
                            تهیه دستورالعمل راهنمای مداخلات تخصصی مددکاری اجتماعی در فرایند اهدای عضو
                        </li>
                        <li class="i-page__list_item i-page__text md:font-sm flex items-center text-bayoux font-base-bold sm:font-base text-right">
                            اقدام به ثبت ملی و جهانی دستورالعمل ارائه خدمات تخصصی روانی اجتماعی به خانواده‌های اهدا کننده عضو
                        </li>
                    </ul>
                </div>
                <figure class="m-b-20 l:w-750 md:max-w-100 m-0-auto rounded has-skeleton">
                    <img src=""
                         data-src="{{ secure_asset('images/1539008345_u2bb1jl2PnkeE86StqGg7veLthFSRo_original.jpg') }}"
                         alt=""
                         class="w-full h-full block rounded object-cover"
                    />
                </figure>
                <div class="i-page__footer relative">
                    <div class="flex items-center md:flex-col">
                        <p class="text-bayoux font-sm-bold cursor-default md:m-b-20">
                            انتشار: ۱۱:۲۹ / ۱۸ فروردین ۱۳۹۷
                        </p>
                        <div class="i-page__short inline-flex items-center l:m-r-auto md:m-b-20 sm:flex-col">
                            <span class="text-bayoux font-sm-bold cursor-default">
                                لینک کوتاه:
                            </span>
                            <div class="clipboard relative cursor-pointer text-blue-800 font-sm border border-solid i-page__box rounded-1/2 m-r-10">
                                <span class="clipboard__message absolute w-full h-full flex items-center font-xs-bold opacity-0 transition-opacity pointer-event-none user-select-none">
                                    کپی شد
                                </span>
                                https://ehda.center/PNWVzX
                            </div>
                        </div>
                        <div class="flex items-center border border-solid i-page__box rounded-1/2 l:m-r-20 user-select-none">
                            <a href=""
                               target="_blank"
                               class="i-page__social ic--gmail transition-opacity opacity-80 l:hover:opacity-1"></a>
                            <a href=""
                               target="_blank"
                               class="i-page__social ic--facebook transition-opacity opacity-80 l:hover:opacity-1"></a>
                            <a href=""
                               target="_blank"
                               class="i-page__social ic--telegram transition-opacity opacity-80 l:hover:opacity-1"></a>
                            <a href=""
                               target="_blank"
                               class="i-page__social ic--twitter transition-opacity opacity-80 l:hover:opacity-1"></a>
                            <a href=""
                               target="_blank"
                               class="i-page__social ic--pinterest transition-opacity opacity-80 l:hover:opacity-1"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection