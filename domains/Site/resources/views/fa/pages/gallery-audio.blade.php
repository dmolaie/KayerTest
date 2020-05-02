@extends('fa.template.master')
    @section('content')
        <div class="gau-page gao-page i-page">
            <div class="container sm:p-0">
                <div class="gao-page__inner-box inner-box flex items-stretch p-0 sm:flex-col">
                    <div class="flex-1">
                        <div class="inner-box inner-box--white p-0 m-t-0 text-right overflow-hidden">
                            <div class="w-full rounded-inherit rounded-br-none rounded-bl-none">
                                <div class="gau-page__player relative rounded-inherit">
                                    <img src="{{ asset('/images/slider/image_slider--1.jpg') }}"
                                         alt=""
                                         class="w-full block rounded-inherit"
                                    />
                                    <div class="gau-page__audio absolute w-full">
                                        <audio id="music_player"
                                               controls class="w-0 h-0 opacity-0 visibility-hidden overflow-hidden"
                                        >
                                            <source src="{{ asset('images/music/01_Bitab.mp3') }}" type="audio/mpeg">
                                            متاسفانه مرورگر شما از این قابلیت پشتیبانی نمی‌کند.
                                        </audio>
                                    </div>
                                </div>
                            </div>
                            <div class="gau-page__box flex items-center justify-between">
                                <h3 class="i-page__sub-title text-blue font-24 font-bold cursor-default m-b-26 sm:font-sm">
                                    تو رسیدی - مهدی یغمایی
                                </h3>
                                <a href="" target="_blank" download=""
                                   class="gau-page__download flex items-center text-blue-800 font-lg font-medium border border-solid rounded l:transition-background"
                                >
                                    ۷.۶۳ مگابایت
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 480 480">
                                        <g fill="#03b6f9">
                                            <path d="M378.528,214.688l-21.088-24c-5.824-6.624-15.904-7.264-22.56-1.472L272,244.32V16c0-8.832-7.168-16-16-16h-32
                                                     c-8.832,0-16,7.168-16,16v228.32l-62.88-55.104c-6.624-5.792-16.704-5.152-22.56,1.472l-21.088,23.968
                                                     c-5.856,6.656-5.184,16.8,1.472,22.624l126.528,110.752c6.048,5.28,15.04,5.28,21.088,0L377.056,237.28
                                                     C383.712,231.456,384.384,221.312,378.528,214.688z"/>
                                            <path d="M416,416H64c-8.832,0-16,7.168-16,16v32c0,8.832,7.168,16,16,16h352c8.832,0,16-7.168,16-16v-32C432,423.168,424.832,416,416,416z"/>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="gao-page__aside xxl:w-1/5 xl:w-1/4 w-1/3 sm:w-full sm:m-0">
                        <div class="relative inner-box inner-box--white h-full p-0 m-t-0 overflow-auto">
                            <div class="episodes absolute w-full">
                                <div class="episode episode--active relative flex items-center cursor-pointer bg-white l:transition-background"
                                     data-url="{{ asset('images/music/01_Bitab.mp3') }}"
                                >
                                    <figure class="episode__cover relative flex-shrink-0 rounded-1/2 has-skeleton pointer-event-none">
                                        <img src=""
                                             data-src="{{ asset('/images/img_default.jpg') }}"
                                             alt="درد بی مغزی"
                                             class="episode__image block absolute w-full h-full rounded-inherit object-cover"
                                        >
                                    </figure>
                                    <span class="episode__caption text-blue-800 text-blue-800 font-sm font-medium pointer-event-none">
                                        هدیه - حسین اعظمی
                                    </span>
                                </div>
                                <div class="episode relative flex items-center cursor-pointer bg-white l:transition-background"
                                     data-url="{{ asset('images/music/tik-tok.mp3') }}"
                                >
                                    <figure class="episode__cover relative flex-shrink-0 rounded-1/2 has-skeleton pointer-event-none">
                                        <img src=""
                                             data-src="{{ asset('/images/img_default.jpg') }}"
                                             alt="درد بی مغزی"
                                             class="episode__image block absolute w-full h-full rounded-inherit object-cover"
                                        >
                                    </figure>
                                    <span class="episode__caption text-blue-800 text-blue-800 font-sm font-medium pointer-event-none">
                                        دلخوشی - امیرعباس گلاب
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h2 class="gau-page__sTitle i-page__head flex items-center justify-center text-blue font-24 font-bold sm:font-lg">
                    <span class="i-page__title text-center cursor-default">
                        از دست ندهید
                    </span>
                </h2>
                <div class="block w-full relative-gallery">
                    <div class="inner-box inner-box--white">
                        <div class="max-w-full overflow-x-hidden">
                            <div class="carousel__container">
                                <div class="swiper-wrapper">
                                    <!-- audio & video type -->
                                    <div class="swiper-slide">
                                        <a href=""
                                           class="ga-page__card relative w-full block font-xs font-bold bg-white border border-solid rounded-10 has-shadow">
                                            <figure class="ga-page__card_image relative w-full block rounded-inherit rounded-bl-none rounded-br-none has-skeleton">
                                                <span class="ga-page__card_play absolute bg-white rounded-50"></span>
                                                <img src=""
                                                     data-src="{{ asset('/images/img_default.jpg') }}"
                                                     alt=""
                                                     class="block w-full h-full rounded-inherit object-cover"
                                                >
                                            </figure>
                                            <div class="ga-page__card_body">
                                                <p class="ga-page__card_iTitle text-right text-blue-800">
                                                    مصاحبه هنرمندان و مسئولین در ضیافت نفس
                                                </p>
                                                <time class="ga-page__card_release has_notebook--gray w-full block text-gray-200 font-1xs text-left text-left">
                                                    24 فروردین 1399
                                                </time>
                                            </div>
                                            <p class="ga-page__card_link text-center">
                                                + ادامه
                                            </p>
                                        </a>
                                    </div>
                                    <!-- image type -->
                                    <div class="swiper-slide">
                                        <a href=""
                                           class="ga-page__card relative w-full block font-xs font-bold bg-white border border-solid rounded-10 has-shadow">
                                            <figure class="ga-page__card_image relative w-full block rounded-inherit rounded-bl-none rounded-br-none has-skeleton">
                                                <span class="ga-page__card_camera absolute"></span>
                                                <img src=""
                                                     data-src="{{ asset('/images/img_default.jpg') }}"
                                                     alt=""
                                                     class="block w-full h-full rounded-inherit object-cover"
                                                >
                                            </figure>
                                            <div class="ga-page__card_body">
                                                <p class="ga-page__card_iTitle text-right text-blue-800">
                                                    مصاحبه هنرمندان و مسئولین در ضیافت نفس
                                                </p>
                                                <time class="ga-page__card_release has_notebook--gray w-full block text-gray-200 font-1xs text-left text-left">
                                                    24 فروردین 1399
                                                </time>
                                            </div>
                                            <p class="ga-page__card_link text-center">
                                                + ادامه
                                            </p>
                                        </a>
                                    </div>
                                    <!-- text type -->
                                    <div class="swiper-slide">
                                        <a href=""
                                           class="ga-page__card relative w-full block font-xs font-bold bg-white border border-solid rounded-10 has-shadow">
                                            <figure class="ga-page__card_image relative w-full block rounded-inherit rounded-bl-none rounded-br-none has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('/images/img_default.jpg') }}"
                                                     alt=""
                                                     class="block w-full h-full rounded-inherit object-cover"
                                                >
                                            </figure>
                                            <div class="ga-page__card_body">
                                                <p class="ga-page__card_iTitle text-right text-blue-800">
                                                    مصاحبه هنرمندان و مسئولین در ضیافت نفس
                                                </p>
                                                <time class="ga-page__card_release has_notebook--gray w-full block text-gray-200 font-1xs text-left text-left">
                                                    24 فروردین 1399
                                                </time>
                                            </div>
                                            <p class="ga-page__card_link text-center">
                                                + ادامه
                                            </p>
                                        </a>
                                    </div>

                                    <!-- audio & video type -->
                                    <div class="swiper-slide">
                                        <a href=""
                                           class="ga-page__card relative w-full block font-xs font-bold bg-white border border-solid rounded-10 has-shadow">
                                            <figure class="ga-page__card_image relative w-full block rounded-inherit rounded-bl-none rounded-br-none has-skeleton">
                                                <span class="ga-page__card_play absolute bg-white rounded-50"></span>
                                                <img src=""
                                                     data-src="{{ asset('/images/img_default.jpg') }}"
                                                     alt=""
                                                     class="block w-full h-full rounded-inherit object-cover"
                                                >
                                            </figure>
                                            <div class="ga-page__card_body">
                                                <p class="ga-page__card_iTitle text-right text-blue-800">
                                                    مصاحبه هنرمندان و مسئولین در ضیافت نفس
                                                </p>
                                                <time class="ga-page__card_release has_notebook--gray w-full block text-gray-200 font-1xs text-left text-left">
                                                    24 فروردین 1399
                                                </time>
                                            </div>
                                            <p class="ga-page__card_link text-center">
                                                + ادامه
                                            </p>
                                        </a>
                                    </div>
                                    <!-- image type -->
                                    <div class="swiper-slide">
                                        <a href=""
                                           class="ga-page__card relative w-full block font-xs font-bold bg-white border border-solid rounded-10 has-shadow">
                                            <figure class="ga-page__card_image relative w-full block rounded-inherit rounded-bl-none rounded-br-none has-skeleton">
                                                <span class="ga-page__card_camera absolute"></span>
                                                <img src=""
                                                     data-src="{{ asset('/images/img_default.jpg') }}"
                                                     alt=""
                                                     class="block w-full h-full rounded-inherit object-cover"
                                                >
                                            </figure>
                                            <div class="ga-page__card_body">
                                                <p class="ga-page__card_iTitle text-right text-blue-800">
                                                    مصاحبه هنرمندان و مسئولین در ضیافت نفس
                                                </p>
                                                <time class="ga-page__card_release has_notebook--gray w-full block text-gray-200 font-1xs text-left text-left">
                                                    24 فروردین 1399
                                                </time>
                                            </div>
                                            <p class="ga-page__card_link text-center">
                                                + ادامه
                                            </p>
                                        </a>
                                    </div>
                                    <!-- text type -->
                                    <div class="swiper-slide">
                                        <a href=""
                                           class="ga-page__card relative w-full block font-xs font-bold bg-white border border-solid rounded-10 has-shadow">
                                            <figure class="ga-page__card_image relative w-full block rounded-inherit rounded-bl-none rounded-br-none has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('/images/img_default.jpg') }}"
                                                     alt=""
                                                     class="block w-full h-full rounded-inherit object-cover"
                                                >
                                            </figure>
                                            <div class="ga-page__card_body">
                                                <p class="ga-page__card_iTitle text-right text-blue-800">
                                                    مصاحبه هنرمندان و مسئولین در ضیافت نفس
                                                </p>
                                                <time class="ga-page__card_release has_notebook--gray w-full block text-gray-200 font-1xs text-left text-left">
                                                    24 فروردین 1399
                                                </time>
                                            </div>
                                            <p class="ga-page__card_link text-center">
                                                + ادامه
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel__pagination carousel__pagination--white none sm:flex justify-center"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script src="{{asset('js/site/vendors~gallery-audio~gallery-images~home~news_list~news_show.js')}}" defer></script>
        <script src="{{asset('js/site/vendors~gallery-audio.js')}}" defer></script>
        <script src="{{asset('js/site/gallery-audio.js')}}" defer></script>
    @endsection