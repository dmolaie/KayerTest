@extends('fa.template.master')
    @section('title')
        {{ ' | پروفایل '.auth()->user()->name .' '. auth()->user()->last_name }}
    @endsection
    @section('content')
        <div class="profile-p i-page">
            <div class="container sm:p-0">
                <h1 class="i-page__head flex items-center justify-center text-blue font-24 font-bold">
                    <span class="i-page__title text-center cursor-default">
                        پروفایل
                    </span>
                </h1>
                <div class="inner-box inner-box--white p-0">
                    <div class="p__container">
                        <p class="i-page__text text-bayoux font-base font-bold text-justify sm:font-base sm:font-medium">
                            همیار گرامی؛
                            <br>
                            مشخصات شما در سامانه کشوری اهدای عضو ثبت گردیده است و این مشخصات در صورت بروز حادثه در تمامی بیمارستان های کشور قابل دسترسی می باشد.
                            <br>
                            می توانید جهت همراه داشتن کارت اهدای عضو خود از طریق دکمه چاپ کارت اقدام نمائید، همچنین می توانید با استفاده از دکمه دریافت کارت، کارت اهدای عضو خود را برروی کامپیوتر شخصی خود ذخیره نمائید.
                        </p>
                        <div class="anchor w-full flex justify-center sm:flex-wrap">
                            <a href="{{route('page.edit.client.profile',config('app.locale'))}}"
                               class="anchor__item text-white font-lg font-bold rounded-6 bg-blue-100 l:transition-background l:hover:bg-blue-200 text-center sm:m-b-25"
                            >
                                ویرایش پروفایل
                            </a>
                            <a href="{{route('page.volunteers',config('app.locale'))}}"
                               class="anchor__item text-white font-lg font-bold rounded-6 bg-green l:transition-background l:hover:bg-green-200 text-center"
                            >
                                سفیران اهدای عضو
                            </a>
                        </div>
                    </div>
                    <div class="tab w-full flex">
                        <button class="tab__item relative flex-1 text-blue-100 font-lg font-medium bg-transparent text-center sm:font-base sm:font-bold tab__item--active"
                                role="tab" tabindex="0"
                        >
                            فقط رو
                        </button>
                        <button class="tab__item relative flex-1 text-blue-100 font-lg font-medium bg-transparent text-center sm:font-base sm:font-bold"
                                role="tab" tabindex="1"
                        >
                            همراه
                        </button>
                        <button class="tab__item relative flex-1 text-blue-100 font-lg font-medium bg-transparent text-center sm:font-base sm:font-bold"
                                role="tab" tabindex="2"
                        >
                            قابل اشتراک
                        </button>
                        <button class="tab__item relative flex-1 text-blue-100 font-lg font-medium bg-transparent text-center sm:font-base sm:font-bold"
                                role="tab" tabindex="3"
                        >
                            قابل چاپ
                        </button>
                    </div>
                    <div class="content sm:p-0">
                        <div class="content__item content__item--active"
                             role="tabpanel" tabindex="0"
                        >
                            <div class="content__container content__container--0">
                                <div class="flex flex-start md:flex-col">
                                    <div class="w-1/2.5 xl:w-1/3 flex-shrink-0 md:w-full">
                                        <figure class="image_loading content__image w-full block border border-solid">
                                            <img src="{{ secure_asset('/images/cards/single_overlay.jpg') }}"
                                                 alt="{{ auth()->user()->name .'-'. auth()->user()->last_name }}"
                                                 class="single_cart w-full block object-contain"
                                            />
                                        </figure>
                                    </div>
                                    <div class="flex-1 content__caption md:w-full md:p-0 md:m-0">
                                        <p class="text-bayoux font-sm cursor-default m-b-30 sm:font-base md:m-t-40">
                                            فقط روی کارت با وضوح تصویری قابل قبول برای چاپ در این نسخه مهیا است.
                                        </p>
                                        <div class="flex w-full items-center justify-space sm:flex-col">
                                            <a  href="" target="_blank" download="کارت-اهدا-عضو-{{ auth()->user()->name .'-'. auth()->user()->last_name }}.png"
                                                class="d-single_cart content__button content__button--download text-bayoux flex-1 border-2 border-solid rounded-1/2 font-base text-center sm:w-1/2">
                                                دانلود
                                            </a>
                                            <button class="content__button content__button--print text-bayoux flex-1 border-2 border-solid rounded-1/2 font-base text-center print-tab sm:w-1/2">
                                                چاپ
                                            </button>
                                            <button class="content__button content__button--share text-bayoux flex-1 border-2 border-solid rounded-1/2 font-base text-center share-tab sm:w-1/2">
                                                اشتراک
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content__item"
                             role="tabpanel" tabindex="1"
                        >
                            <div class="content__container content__container--1">
                                <div class="flex flex-start md:flex-col">
                                    <div class="w-1/2.5 xl:w-1/3 flex-shrink-0 md:w-3/4 md:m-0-auto">
                                        <figure class="image_loading content__image w-full block border border-solid">
                                            <img src="{{ secure_asset('/images/cards/mini_overlay.jpg') }}"
                                                 alt="{{ auth()->user()->name .'-'. auth()->user()->last_name }}"
                                                 class="mini_cart w-full block object-contain"
                                            />
                                        </figure>
                                    </div>
                                    <div class="flex-1 content__caption md:p-0 md:m-0">
                                        <div class="text-bayoux font-base m-b-30 cursor-default text-justify sm:font-base md:m-t-40">
                                            همیار گرامی؛
                                            <br>
                                            مشخصات شما در سامانه کشوری اهدای عضو ثبت گردیده است و این مشخصات در صورت بروز حادثه در تمامی بیمارستان های کشور قابل دسترسی می باشد.
                                            می توانید جهت همراه داشتن کارت اهدای عضو خود از طریق دکمه چاپ کارت اقدام نمائید، همچنین می توانید با استفاده از دکمه دریافت کارت، کارت اهدای عضو خود را برروی کامپیوتر شخصی خود ذخیره نمائید.
                                        </div>
                                        <div class="text-bayoux font-base font-light m-b-20 cursor-default text-justify sm:font-base">
                                            فقط روی کارت با وضوح تصویری قابل قبول برای چاپ در این نسخه مهیا است.
                                        </div>
                                        <div class="flex w-full items-center justify-space sm:flex-col">
                                            <a  href="" target="_blank" download="کارت-اهدا-عضو-{{ auth()->user()->name .'-'. auth()->user()->last_name }}.png"
                                                class="d-mini_cart content__button content__button--download text-bayoux flex-1 border-2 border-solid rounded-1/2 font-base text-center sm:w-1/2">
                                                دانلود
                                            </a>
                                            <button class="content__button content__button--print text-bayoux flex-1 border-2 border-solid rounded-1/2 font-base text-center print-tab sm:w-1/2">
                                                چاپ
                                            </button>
                                            <button class="content__button content__button--share text-bayoux flex-1 border-2 border-solid rounded-1/2 font-base text-center share-tab sm:w-1/2">
                                                اشتراک
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content__item"
                             role="tabpanel" tabindex="2"
                        >
                            <div class="content__container content__container--2">
                                <div class="flex flex-start md:flex-col">
                                    <div class="w-1/2.5 xl:w-1/3 flex-shrink-0 md:w-3/4 md:m-0-auto">
                                        <figure class="image_loading content__image w-full block border border-solid">
                                            <img src="{{ secure_asset('/images/cards/social_overlay.jpg') }}"
                                                 alt="{{ auth()->user()->name .'-'. auth()->user()->last_name }}"
                                                 class="social_cart w-full block object-contain"
                                            />
                                        </figure>
                                    </div>
                                    <div class="flex-1 content__caption md:m-0 md:p-0">
                                        <div class="text-bayoux font-base m-b-30 cursor-default text-justify sm:font-base md:m-t-40">
                                            همیار گرامی؛
                                            <br>
                                            مشخصات شما در سامانه کشوری اهدای عضو ثبت گردیده است و این مشخصات در صورت بروز حادثه در تمامی بیمارستان های کشور قابل دسترسی می باشد.
                                            می توانید جهت همراه داشتن کارت اهدای عضو خود از طریق دکمه چاپ کارت اقدام نمائید، همچنین می توانید با استفاده از دکمه دریافت کارت، کارت اهدای عضو خود را برروی کامپیوتر شخصی خود ذخیره نمائید.
                                        </div>
                                        <div class="text-bayoux font-base font-light m-b-20 cursor-default text-justify sm:font-base">
                                            در این نسخه از کارت اهدای عضو اطلاعات محرمانه‌ی شما حذف شده و آماده‌ی هم‌رسانی در شبکه‌های اجتماعی است.
                                        </div>
                                        <div class="flex w-full items-center justify-space m-b-20 sm:flex-col">
                                            <a  href="" target="_blank" download="کارت-اهدا-عضو-{{ auth()->user()->name .'-'. auth()->user()->last_name }}.png"
                                                class="d-social_cart content__button content__button--download text-bayoux flex-1 border-2 border-solid rounded-1/2 font-base text-center sm:w-1/2">
                                                دانلود
                                            </a>
                                            <button class="content__button content__button--print text-bayoux flex-1 border-2 border-solid rounded-1/2 font-base text-center print-tab sm:w-1/2">
                                                چاپ
                                            </button>
                                            <button class="content__button content__button--share text-bayoux flex-1 border-2 border-solid rounded-1/2 font-base text-center sm:w-1/2"
                                                    id="share_button"
                                                    data-share="{{ route('social-url-first', [auth()->user()->uuid]) }}"
                                            >
                                                اشتراک
                                            </button>
                                        </div>
                                        <div class="share-box flex justify-end h-0 overflow-hidden transition-height">
                                            <div class="inline-flex items-center border border-solid i-page__box rounded-1/2 user-select-none"
                                                 id="share-section"
                                            > </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content__item"
                             role="tabpanel" tabindex="3"
                        >
                            <div class="content__container content__container--3">
                                <div class="flex flex-start md:flex-col">
                                    <div class="w-1/2.5 xl:w-1/3 flex-shrink-0 md:w-3/4 md:m-0-auto">
                                        <figure class="image_loading content__image w-full block border border-solid">
                                            <img src="{{ secure_asset('/images/cards/print_overlay.jpg') }}"
                                                 alt="{{ auth()->user()->name .'-'. auth()->user()->last_name }}"
                                                 class="print_card w-full block object-contain"
                                            />
                                        </figure>
                                    </div>
                                    <div class="flex-1 content__caption md:p-0 md:m-0">
                                        <div class="text-bayoux font-base m-b-30 cursor-default text-justify sm:font-base md:m-t-40">
                                            همیار گرامی؛
                                            <br>
                                            مشخصات شما در سامانه کشوری اهدای عضو ثبت گردیده است و این مشخصات در صورت بروز حادثه در تمامی بیمارستان های کشور قابل دسترسی می باشد.
                                            می توانید جهت همراه داشتن کارت اهدای عضو خود از طریق دکمه چاپ کارت اقدام نمائید، همچنین می توانید با استفاده از دکمه دریافت کارت، کارت اهدای عضو خود را برروی کامپیوتر شخصی خود ذخیره نمائید.
                                        </div>
                                        <div class="text-bayoux font-base font-light m-b-20 cursor-default sm:font-base">
                                            این نسخه از کارت اهدای عضو، با وضوح تصویری بالا، بهترین گزینه برای چاپ با چاپ‌گرهای خانگی است.
                                        </div>
                                        <div class="flex w-full items-center justify-space sm:flex-col">
                                            <a  href=""
                                                target="_blank" download="کارت-اهدا-عضو-{{ auth()->user()->name .'-'. auth()->user()->last_name }}.png"
                                                class="d-print_card content__button content__button--download text-bayoux flex-1 border-2 border-solid rounded-1/2 font-base text-center sm:w-1/2">
                                                دانلود
                                            </a>
                                            <a href="{{ route('print-cart', [ auth()->user()->uuid ]) }}" target="_blank"
                                               class="content__button content__button--print text-bayoux flex-1 border-2 border-solid rounded-1/2 font-base text-center sm:w-1/2"
                                            >
                                                چاپ
                                            </a>
                                            <button class="content__button content__button--share text-bayoux flex-1 border-2 border-solid rounded-1/2 font-base text-center share-tab sm:w-1/2">
                                                اشتراک
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="h-0 overflow-hidden"
                 id="card_info"
            >
                <span class="font-zar">
                    {{ auth()->user()->name .' '. auth()->user()->last_name.' - '. auth()->user()->card_id }}
                </span>
                <p class="font-zar">
                    {{ auth()->user()->name .' '. auth()->user()->last_name.' - '. auth()->user()->card_id }}${{auth()->user()->mobile ?? ''}}${{auth()->user()->email ?? ''}}
                </p>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script src="{{secure_asset('js/site/card-mini~card-print~card-single~card-social~dashboard.js')}}" defer></script>
        <script src="{{secure_asset('js/site/dashboard.js')}}" defer></script>
    @endsection