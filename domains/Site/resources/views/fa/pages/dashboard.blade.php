@extends('fa.template.master')
    @section('content')
        <div class="profile-p i-page">
            <div class="container">
                <h1 class="i-page__head flex items-center justify-center text-blue font-24 font-bold">
                    <span class="i-page__title text-center cursor-default">
                        پروفایل
                    </span>
                </h1>
                <div class="inner-box inner-box--white p-0">
                    <div class="p__container">
                        <p class="i-page__text text-bayoux font-base font-bold sm:font-sm">
                            همیار گرامی؛
                            <br>
                            مشخصات شما در سامانه کشوری اهدای عضو ثبت گردیده است و این مشخصات در صورت بروز حادثه در تمامی بیمارستان های کشور قابل دسترسی می باشد.
                            <br>
                            می توانید جهت همراه داشتن کارت اهدای عضو خود از طریق دکمه چاپ کارت اقدام نمائید، همچنین می توانید با استفاده از دکمه دریافت کارت، کارت اهدای عضو خود را برروی کامپیوتر شخصی خود ذخیره نمائید.
                        </p>
                        <div class="anchor w-full flex flex-wrap justify-center">
                            <a href=""
                               class="anchor__item text-white font-lg font-bold rounded-6 bg-blue-100 l:transition-background l:hover:bg-blue-200 text-center"
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
                        <button class="tab__item relative flex-1 text-blue-100 font-lg font-medium bg-transparent text-center tab__item--active"
                                role="tab" tabindex="0"
                        >
                            فقط رو
                        </button>
                        <button class="tab__item relative flex-1 text-blue-100 font-lg font-medium bg-transparent text-center"
                                role="tab" tabindex="1"
                        >
                            همراه
                        </button>
                        <button class="tab__item relative flex-1 text-blue-100 font-lg font-medium bg-transparent text-center"
                                role="tab" tabindex="2"
                        >
                            قابل اشتراک
                        </button>
                        <button class="tab__item relative flex-1 text-blue-100 font-lg font-medium bg-transparent text-center"
                                role="tab" tabindex="3"
                        >
                            قابل چاپ
                        </button>
                    </div>
                    <div class="content">
                        <div class="content__item content__item--active"
                             role="tabpanel" tabindex="0"
                        >
                            <div class="content__container content__container--0">
                                <div class="flex flex-start">
                                    <div class="w-1/2.5 xl:w-1/3 flex-shrink-0">
                                        <figure class="content__image w-full block border border-solid">
                                            <img src="{{ asset('/images/test/test-image.png') }}"
                                                 alt="بهاره حاجیان"
                                                 class="w-full block object-contain"
                                            />
                                        </figure>
                                    </div>
                                    <div class="flex-1 content__caption">
                                        <p class="text-bayoux font-sm cursor-default m-b-30">
                                            فقط روی کارت با وضوح تصویری قابل قبول برای چاپ در این نسخه مهیا است.
                                        </p>
                                        <div class="flex w-full items-center justify-space">
                                            <a  href="{{ asset('/images/test/test-image.png') }}"
                                                target="_blank" download
                                                class="content__button content__button--download text-bayoux flex-1 border-2 border-solid rounded-1/2 font-base text-center">
                                                دانلود
                                            </a>
                                            <button class="content__button content__button--print text-bayoux flex-1 border-2 border-solid rounded-1/2 font-base text-center print-tab">
                                                چاپ
                                            </button>
                                            <button class="content__button content__button--share text-bayoux flex-1 border-2 border-solid rounded-1/2 font-base text-center share-tab">
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
                                <div class="flex flex-start">
                                    <div class="w-1/2.5 xl:w-1/3 flex-shrink-0">
                                        <figure class="content__image w-full block border border-solid">
                                            <img src="{{ asset('/images/test/test-image-2.png') }}"
                                                 alt="بهاره حاجیان"
                                                 class="w-full block object-contain"
                                            />
                                        </figure>
                                    </div>
                                    <div class="flex-1 content__caption">
                                        <div class="text-bayoux font-base m-b-30 cursor-default">
                                            همیار گرامی؛
                                            <br>
                                            مشخصات شما در سامانه کشوری اهدای عضو ثبت گردیده است و این مشخصات در صورت بروز حادثه در تمامی بیمارستان های کشور قابل دسترسی می باشد.
                                            می توانید جهت همراه داشتن کارت اهدای عضو خود از طریق دکمه چاپ کارت اقدام نمائید، همچنین می توانید با استفاده از دکمه دریافت کارت، کارت اهدای عضو خود را برروی کامپیوتر شخصی خود ذخیره نمائید.
                                        </div>
                                        <div class="text-bayoux font-base font-light m-b-20 cursor-default">
                                            فقط روی کارت با وضوح تصویری قابل قبول برای چاپ در این نسخه مهیا است.
                                        </div>
                                        <div class="flex w-full items-center justify-space">
                                            <a  href="{{ asset('/images/test/test-image-2.png') }}"
                                                target="_blank" download
                                                class="content__button content__button--download text-bayoux flex-1 border-2 border-solid rounded-1/2 font-base text-center">
                                                دانلود
                                            </a>
                                            <button class="content__button content__button--print text-bayoux flex-1 border-2 border-solid rounded-1/2 font-base text-center print-tab">
                                                چاپ
                                            </button>
                                            <button class="content__button content__button--share text-bayoux flex-1 border-2 border-solid rounded-1/2 font-base text-center share-tab">
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
                                <div class="flex flex-start">
                                    <div class="w-1/2.5 xl:w-1/3 flex-shrink-0">
                                        <figure class="content__image w-full block border border-solid">
                                            <img src="{{ asset('/images/test/test-image-1.png') }}"
                                                 alt="بهاره حاجیان"
                                                 class="w-full block object-contain"
                                            />
                                        </figure>
                                    </div>
                                    <div class="flex-1 content__caption">
                                        <div class="text-bayoux font-base m-b-30 cursor-default">
                                            همیار گرامی؛
                                            <br>
                                            مشخصات شما در سامانه کشوری اهدای عضو ثبت گردیده است و این مشخصات در صورت بروز حادثه در تمامی بیمارستان های کشور قابل دسترسی می باشد.
                                            می توانید جهت همراه داشتن کارت اهدای عضو خود از طریق دکمه چاپ کارت اقدام نمائید، همچنین می توانید با استفاده از دکمه دریافت کارت، کارت اهدای عضو خود را برروی کامپیوتر شخصی خود ذخیره نمائید.
                                        </div>
                                        <div class="text-bayoux font-base font-light m-b-20 cursor-default">
                                            در این نسخه از کارت اهدای عضو اطلاعات محرمانه‌ی شما حذف شده و آماده‌ی هم‌رسانی در شبکه‌های اجتماعی است.
                                        </div>
                                        <div class="flex w-full items-center justify-space m-b-20">
                                            <a  href="{{ asset('/images/test/test-image-1.png') }}"
                                                target="_blank" download
                                                class="content__button content__button--download text-bayoux flex-1 border-2 border-solid rounded-1/2 font-base text-center">
                                                دانلود
                                            </a>
                                            <button class="content__button content__button--print text-bayoux flex-1 border-2 border-solid rounded-1/2 font-base text-center print-tab">
                                                چاپ
                                            </button>
                                            <button class="content__button content__button--share text-bayoux flex-1 border-2 border-solid rounded-1/2 font-base text-center"
                                                    id="share_button"
                                                    data-share="{{ asset('/images/test/test-image-1.png') }}"
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
                                <div class="flex flex-start">
                                    <div class="w-1/2.5 xl:w-1/3 flex-shrink-0">
                                        <figure class="content__image w-full block border border-solid">
                                            <img src="{{ asset('/images/test/test-image-3.png') }}"
                                                 alt="بهاره حاجیان"
                                                 class="w-full block object-contain"
                                            />
                                        </figure>
                                    </div>
                                    <div class="flex-1 content__caption">
                                        <div class="text-bayoux font-base m-b-30 cursor-default">
                                            همیار گرامی؛
                                            <br>
                                            مشخصات شما در سامانه کشوری اهدای عضو ثبت گردیده است و این مشخصات در صورت بروز حادثه در تمامی بیمارستان های کشور قابل دسترسی می باشد.
                                            می توانید جهت همراه داشتن کارت اهدای عضو خود از طریق دکمه چاپ کارت اقدام نمائید، همچنین می توانید با استفاده از دکمه دریافت کارت، کارت اهدای عضو خود را برروی کامپیوتر شخصی خود ذخیره نمائید.
                                        </div>
                                        <div class="text-bayoux font-base font-light m-b-20 cursor-default">
                                            این نسخه از کارت اهدای عضو، با وضوح تصویری بالا، بهترین گزینه برای چاپ با چاپ‌گرهای خانگی است.
                                        </div>
                                        <div class="flex w-full items-center justify-space">
                                            <a  href="{{ asset('/images/test/test-image-3.png') }}"
                                                target="_blank" download
                                                class="content__button content__button--download text-bayoux flex-1 border-2 border-solid rounded-1/2 font-base text-center">
                                                دانلود
                                            </a>
                                            <button class="content__button content__button--print text-bayoux flex-1 border-2 border-solid rounded-1/2 font-base text-center"
                                                    id="print-button"
                                                    data-url="{{ asset('/images/test/test-image-3.png') }}"
                                            >
                                                چاپ
                                            </button>
                                            <button class="content__button content__button--share text-bayoux flex-1 border-2 border-solid rounded-1/2 font-base text-center share-tab">
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
        </div>
    @endsection

    @section('scripts')
        <script src="{{asset('js/site/dashboard.js')}}" defer></script>
    @endsection