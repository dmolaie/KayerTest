@extends('fa.template.master')
@section('content')
    <div class="p-home">
        <section class="slider__section relative">
            <div class="slider__container relative overflow-hidden">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="slider__item w-full h-full has-skeleton">
                            <img src=""
                                 data-src="https://images.unsplash.com/photo-1580750704927-85f625192654?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                                 alt=""
                                 class="block w-full h-full object-cover"
                            />
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slider__item w-full h-full has-skeleton">
                            <img src=""
                                 data-src="https://images.unsplash.com/photo-1580628646350-4f8bd2868e1c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                                 alt=""
                                 class="block w-full h-full object-cover"
                            />
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slider__item w-full h-full has-skeleton">
                            <img src=""
                                 data-src="https://images.unsplash.com/photo-1580639006552-b8d337e9ab10?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=752&q=80"
                                 alt=""
                                 class="block w-full h-full object-cover"
                            />
                        </div>
                    </div>
                </div>
                <div class="slider__pagination absolute z-2"></div>
            </div>
        </section>
        <section class="relative heartbeat__section overflow-hidden">
            <h1 class="relative font-22 text-center user-select-none z-2">
                    <span class="text-blue">
                        در حال حاضر حدود ۲۶۰۰۰ نفر در انتظار پیوند هستند.
                    </span>
            </h1>
            <canvas class="heartbeat__canvas absolute"></canvas>
        </section>
        <section class="s-news__section bg--sky-blue">
            <div class="container">
                <div class="section__title flex items-center">
                    <h4 class="font-24 text-blue-800 text-nowrap line-height-1">
                        اخبار ویژه
                    </h4>
                    <span class="flower_line flower_line--white relative flex items-end justify-end block w-full"></span>
                    <button class="carousel-btn carousel-btn--left flex-shrink-0"></button>
                    <button class="carousel-btn carousel-btn--right flex-shrink-0 m-r-30"></button>
                </div>
                <div class="max-w-full overflow-x-hidden">
                    <div class="carousel__container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a href=""
                                   class="v-cart relative flex flex-col rounded-3 border border-solid bg-white w-full has-shadow">
                                    <figure class="v-cart__cover w-full has-skeleton rounded">
                                        <img src=""
                                             data-src="https://images.unsplash.com/photo-1580408745615-1f0592484c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                             alt=""
                                             class="v-cart__cover_img w-full h-full rounded object-cover"
                                        />
                                    </figure>
                                    <p class="v-cart__title w-full text-blue-800 font-xs-medium">
                                        سومین جشنواره فیلم ۱۸۰ ثانیه‌ای بانک پاسارگاد برگزار شد
                                    </p>
                                    <time class="v-cart__release w-full has_notebook--gray text-gray-200 font-1xs text-left m-t-auto">
                                        ۱۷ آذر ۹۸
                                    </time>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href=""
                                   class="v-cart relative flex flex-col rounded-3 border border-solid bg-white w-full has-shadow">
                                    <figure class="v-cart__cover w-full has-skeleton rounded">
                                        <img src=""
                                             data-src="https://images.unsplash.com/photo-1580356885468-fb9a86a110a4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                             alt=""
                                             class="v-cart__cover_img w-full h-full rounded object-cover"
                                        />
                                    </figure>
                                    <p class="v-cart__title w-full text-blue-800 font-xs-medium">
                                        اعطای جایزه MBE به یک پرستار به دلیل تشویق اقلیت‌ها به اهدای اعضا
                                    </p>
                                    <time class="v-cart__release w-full has_notebook--gray text-gray-200 font-1xs text-left m-t-auto">
                                        ۱۶ آذر ۹۸
                                    </time>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href=""
                                   class="v-cart relative flex flex-col rounded-3 border border-solid bg-white w-full has-shadow">
                                    <figure class="v-cart__cover w-full has-skeleton rounded">
                                        <img src=""
                                             data-src="https://images.unsplash.com/photo-1578622459746-dba815ced9e4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                             alt=""
                                             class="v-cart__cover_img w-full h-full rounded object-cover"
                                        />
                                    </figure>
                                    <p class="v-cart__title w-full text-blue-800 font-xs-medium">
                                        چاپگرهای سه بعدی و دورنمای بازآفرینی قلب
                                    </p>
                                    <time class="v-cart__release w-full has_notebook--gray text-gray-200 font-1xs text-left m-t-auto">
                                        ۱۶ آذر ۹۸
                                    </time>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href=""
                                   class="v-cart relative flex flex-col rounded-3 border border-solid bg-white w-full has-shadow">
                                    <figure class="v-cart__cover w-full has-skeleton rounded">
                                        <img src=""
                                             data-src="https://images.unsplash.com/photo-1580401226724-be91c0cbe68e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                             alt=""
                                             class="v-cart__cover_img w-full h-full rounded object-cover rounded object-cover"
                                        />
                                    </figure>
                                    <p class="v-cart__title w-full text-blue-800 font-xs-medium">
                                        نوری رئیس کمیته ورزش انجمن اهدای عضو ایران شد
                                    </p>
                                    <time class="v-cart__release w-full has_notebook--gray text-gray-200 font-1xs text-left m-t-auto">
                                        ۱۲ آذر ۹۸
                                    </time>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href=""
                                   class="v-cart relative flex flex-col rounded-3 border border-solid bg-white w-full has-shadow">
                                    <figure class="v-cart__cover w-full has-skeleton rounded">
                                        <img src=""
                                             data-src="https://images.unsplash.com/photo-1580408745615-1f0592484c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                             alt=""
                                             class="v-cart__cover_img w-full h-full rounded object-cover"
                                        />
                                    </figure>
                                    <p class="v-cart__title w-full text-blue-800 font-xs-medium">
                                        سومین جشنواره فیلم ۱۸۰ ثانیه‌ای بانک پاسارگاد برگزار شد
                                    </p>
                                    <time class="v-cart__release w-full has_notebook--gray text-gray-200 font-1xs text-left m-t-auto">
                                        ۱۷ آذر ۹۸
                                    </time>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href=""
                                   class="v-cart relative flex flex-col rounded-3 border border-solid bg-white w-full has-shadow">
                                    <figure class="v-cart__cover w-full has-skeleton rounded">
                                        <img src=""
                                             data-src="https://images.unsplash.com/photo-1580356885468-fb9a86a110a4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                             alt=""
                                             class="v-cart__cover_img w-full h-full rounded object-cover"
                                        />
                                    </figure>
                                    <p class="v-cart__title w-full text-blue-800 font-xs-medium">
                                        اعطای جایزه MBE به یک پرستار به دلیل تشویق اقلیت‌ها به اهدای اعضا
                                    </p>
                                    <time class="v-cart__release w-full has_notebook--gray text-gray-200 font-1xs text-left m-t-auto">
                                        ۱۶ آذر ۹۸
                                    </time>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href=""
                                   class="v-cart relative flex flex-col rounded-3 border border-solid bg-white w-full has-shadow">
                                    <figure class="v-cart__cover w-full has-skeleton rounded">
                                        <img src=""
                                             data-src="https://images.unsplash.com/photo-1578622459746-dba815ced9e4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                             alt=""
                                             class="v-cart__cover_img w-full h-full rounded object-cover"
                                        />
                                    </figure>
                                    <p class="v-cart__title w-full text-blue-800 font-xs-medium">
                                        چاپگرهای سه بعدی و دورنمای بازآفرینی قلب
                                    </p>
                                    <time class="v-cart__release w-full has_notebook--gray text-gray-200 font-1xs text-left m-t-auto">
                                        ۱۶ آذر ۹۸
                                    </time>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href=""
                                   class="v-cart relative flex flex-col rounded-3 border border-solid bg-white w-full has-shadow">
                                    <figure class="v-cart__cover w-full has-skeleton rounded">
                                        <img src=""
                                             data-src="https://images.unsplash.com/photo-1580401226724-be91c0cbe68e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                             alt=""
                                             class="v-cart__cover_img w-full h-full rounded object-cover rounded object-cover"
                                        />
                                    </figure>
                                    <p class="v-cart__title w-full text-blue-800 font-xs-medium">
                                        نوری رئیس کمیته ورزش انجمن اهدای عضو ایران شد
                                    </p>
                                    <time class="v-cart__release w-full has_notebook--gray text-gray-200 font-1xs text-left m-t-auto">
                                        ۱۲ آذر ۹۸
                                    </time>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block text-left m-t-20">
                    <a href=""
                       class="router-link relative inline-block font-xs-bold">
                        بیشتر
                    </a>
                </div>
            </div>
        </section>
        <section class="r-events__section">
            <div class="container">
                <div class="section__title flex items-center">
                    <h4 class="font-24 text-blue-800 text-nowrap line-height-1">
                        رویدادهای اخیر
                    </h4>
                    <span class="flower_line flower_line--blue relative flex items-end justify-end block w-full"></span>
                    <button class="carousel-btn carousel-btn--up flex-shrink-0"></button>
                    <button class="carousel-btn carousel-btn--down flex-shrink-0 m-r-30"></button>
                </div>
                <div class="r-events__container flex">
                    <div class="r-events__item_container relative">
                        <div class="r-events__item_wrapper r-events__thumbs h-full overflow-hidden">
                            <div class="carousel__container">
                                <div class="swiper-wrapper h-full">
                                    <div class="swiper-slide">
                                        <div class="r-events__item w-full h-full relative flex items-center cursor-pointer border border-solid rounded user-select-none">
                                            <span class="r-events__item_checkbox relative border border-solid rounded-50"></span>
                                            <p class="r-events__item_title font-sm-medium text-blue-800 text-nowrap m-l-auto overflow-hidden">
                                                تولد اولین کودک از رحم پیوندی در ایالات‌ متحده آمریکا
                                                تولد اولین کودک از رحم پیوندی در ایالات‌ متحده آمریکا
                                            </p>
                                            <time class="r-events__item_release font-xs text-gray-200 has_notebook--gray">
                                                ۱۸ آذر ۹۸
                                            </time>
                                            <a href=""
                                               class="r-events__item_link text-blue font-xs">
                                                ادامه مطلب
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="r-events__item w-full h-full relative flex items-center cursor-pointer border border-solid rounded user-select-none">
                                            <span class="r-events__item_checkbox relative border border-solid rounded-50"></span>
                                            <p class="r-events__item_title font-sm-medium text-blue-800 text-nowrap m-l-auto overflow-hidden">
                                                برپایی غرفه صدور آنی کارت اهدای عضو در حاشیه اختتامیه پویش ۳۰ - ۶۰
                                            </p>
                                            <time class="r-events__item_release font-xs text-gray-200 has_notebook--gray">
                                                ۱۸ آذر ۹۸
                                            </time>
                                            <a href=""
                                               class="r-events__item_link text-blue font-xs">
                                                ادامه مطلب
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="r-events__item w-full h-full relative flex items-center cursor-pointer border border-solid rounded user-select-none">
                                            <span class="r-events__item_checkbox relative border border-solid rounded-50"></span>
                                            <p class="r-events__item_title font-sm-medium text-blue-800 text-nowrap m-l-auto overflow-hidden">
                                                پنجمین نشست ادبی کانون نفس
                                            </p>
                                            <time class="r-events__item_release font-xs text-gray-200 has_notebook--gray">
                                                ۴ دی ۹۸
                                            </time>
                                            <a href=""
                                               class="r-events__item_link text-blue font-xs">
                                                ادامه مطلب
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="r-events__item w-full h-full relative flex items-center cursor-pointer border border-solid rounded user-select-none">
                                            <span class="r-events__item_checkbox relative border border-solid rounded-50"></span>
                                            <p class="r-events__item_title font-sm-medium text-blue-800 text-nowrap m-l-auto overflow-hidden">
                                                سومین جشنواره فیلم ۱۸۰ ثانیه‌ای بانک پاسارگاد برگزار شد
                                            </p>
                                            <time class="r-events__item_release font-xs text-gray-200 has_notebook--gray">
                                                ۲۸ مهر ۹۸
                                            </time>
                                            <a href=""
                                               class="r-events__item_link text-blue font-xs">
                                                ادامه مطلب
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="r-events__item w-full h-full relative flex items-center cursor-pointer border border-solid rounded user-select-none">
                                            <span class="r-events__item_checkbox relative border border-solid rounded-50"></span>
                                            <p class="r-events__item_title font-sm-medium text-blue-800 text-nowrap m-l-auto overflow-hidden">
                                                تولد اولین کودک از رحم پیوندی در ایالات‌ متحده آمریکا
                                            </p>
                                            <time class="r-events__item_release font-xs text-gray-200 has_notebook--gray">
                                                ۱۸ آذر ۹۸
                                            </time>
                                            <a href=""
                                               class="r-events__item_link text-blue font-xs">
                                                ادامه مطلب
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="r-events__item w-full h-full relative flex items-center cursor-pointer border border-solid rounded  user-select-none">
                                            <span class="r-events__item_checkbox relative border border-solid rounded-50"></span>
                                            <p class="r-events__item_title font-sm-medium text-blue-800 text-nowrap m-l-auto overflow-hidden">
                                                برپایی غرفه صدور آنی کارت اهدای عضو در حاشیه اختتامیه پویش ۳۰ - ۶۰
                                            </p>
                                            <time class="r-events__item_release font-xs text-gray-200 has_notebook--gray">
                                                ۱۸ آذر ۹۸
                                            </time>
                                            <a href=""
                                               class="r-events__item_link text-blue font-xs">
                                                ادامه مطلب
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="r-events__item w-full h-full relative flex items-center cursor-pointer border border-solid rounded user-select-none">
                                            <span class="r-events__item_checkbox relative border border-solid rounded-50"></span>
                                            <p class="r-events__item_title font-sm-medium text-blue-800 text-nowrap m-l-auto overflow-hidden">
                                                پنجمین نشست ادبی کانون نفس
                                            </p>
                                            <time class="r-events__item_release font-xs text-gray-200 has_notebook--gray">
                                                ۴ دی ۹۸
                                            </time>
                                            <a href=""
                                               class="r-events__item_link text-blue font-xs">
                                                ادامه مطلب
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="r-events__item w-full h-full relative flex items-center cursor-pointer border border-solid rounded user-select-none">
                                            <span class="r-events__item_checkbox relative border border-solid rounded-50"></span>
                                            <p class="r-events__item_title font-sm-medium text-blue-800 text-nowrap m-l-auto overflow-hidden">
                                                سومین جشنواره فیلم ۱۸۰ ثانیه‌ای بانک پاسارگاد برگزار شد
                                            </p>
                                            <time class="r-events__item_release font-xs text-gray-200 has_notebook--gray">
                                                ۲۸ مهر ۹۸
                                            </time>
                                            <a href=""
                                               class="r-events__item_link text-blue font-xs">
                                                ادامه مطلب
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="r-events__image_container">
                        <div class="r-events__image_wrapper h-full rounded overflow-hidden">
                            <div class="carousel__container">
                                <div class="swiper-wrapper h-full">
                                    <div class="swiper-slide">
                                        <div class="r-events__image_item h-full has-skeleton">
                                            <img src=""
                                                 data-src="https://images.unsplash.com/photo-1580489094474-c5a590a8f9d3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                                 alt=""
                                                 class="r-events__image_item h-full_img w-full h-full block object-cover"
                                            />
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="r-events__image_item h-full has-skeleton">
                                            <img src=""
                                                 data-src="https://images.unsplash.com/photo-1580569536780-850bb1202563?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                                 alt=""
                                                 class="r-events__image_item h-full_img w-full h-full block object-cover"
                                            />
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="r-events__image_item h-full has-skeleton">
                                            <img src=""
                                                 data-src="https://images.unsplash.com/photo-1580541631951-d8e59038f6d9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                                 alt=""
                                                 class="r-events__image_item h-full_img w-full h-full block object-cover"
                                            />
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="r-events__image_item h-full has-skeleton">
                                            <img src=""
                                                 data-src="https://images.unsplash.com/photo-1580582782692-4d012956d6fd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                                 alt=""
                                                 class="r-events__image_item h-full_img w-full h-full block object-cover"
                                            />
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="r-events__image_item h-full has-skeleton">
                                            <img src=""
                                                 data-src="https://images.unsplash.com/photo-1580518425037-39f2c1e41113?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                                 alt=""
                                                 class="r-events__image_item h-full_img w-full h-full block object-cover"
                                            />
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="r-events__image_item h-full has-skeleton">
                                            <img src=""
                                                 data-src="https://images.unsplash.com/photo-1580541631951-d8e59038f6d9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                                 alt=""
                                                 class="r-events__image_item h-full_img w-full h-full block object-cover"
                                            />
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="r-events__image_item h-full has-skeleton">
                                            <img src=""
                                                 data-src="https://images.unsplash.com/photo-1580582782692-4d012956d6fd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                                 alt=""
                                                 class="r-events__image_item h-full_img w-full h-full block object-cover"
                                            />
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="r-events__image_item h-full has-skeleton">
                                            <img src=""
                                                 data-src="https://images.unsplash.com/photo-1580518425037-39f2c1e41113?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                                 alt=""
                                                 class="r-events__image_item h-full_img w-full h-full block object-cover"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block text-left m-t-30">
                    <a href=""
                       class="router-link relative inline-block font-xs-bold">
                        بیشتر
                    </a>
                </div>
            </div>
        </section>
        <section class="static__section">
            <div class="container text-center">
                <h4 class="section__title font-lg text-blue-800">
                    برای نجات
                    <span class="font-22 text-blue">
                            زندگی
                        </span>
                    لحظه‌ها مهم است…
                </h4>
                <figure class="section__image flex items-center justify-center">
                    <img src="/images/ic_person--blue.svg"
                         alt="/"
                         class="ic_person"
                    />
                    <span class="blue_symbol text-blue">
                            =
                        </span>
                    <img src="/images/ic_person--gray.svg"
                         alt="/"
                         class="ic_person"
                    />
                    <img src="/images/ic_person--gray.svg"
                         alt="/"
                         class="ic_person"
                    />
                    <img src="/images/ic_person--gray.svg"
                         alt="/"
                         class="ic_person"
                    />
                    <img src="/images/ic_person--gray.svg"
                         alt="/"
                         class="ic_person"
                    />
                    <img src="/images/ic_person--gray.svg"
                         alt="/"
                         class="ic_person"
                    />
                    <img src="/images/ic_person--gray.svg"
                         alt="/"
                         class="ic_person"
                    />
                    <img src="/images/ic_person--gray.svg"
                         alt="/"
                         class="ic_person"
                    />
                    <img src="/images/ic_person--gray.svg"
                         alt="/"
                         class="ic_person"
                    />
                </figure>
                <p class="text-green-300 font-base-bold">
                    هر فرد مرگ مغزی می‌تواند جان
                    <span class="font-24">
                            ۸ نفر
                        </span>
                    را نجات دهد.
                </p>
                <div class="progress_bar__container flex items-start justify-around">
                    <div class="progress_bar__item w-1/4 text-blue-800">
                        <figure class="progress_bar__item_icon block relative">
                            <svg viewBox="0 0 78 78" class="c-progress c-progress-10 block m-0-auto">
                                <circle cx="39" cy="39" r="30"
                                        stroke-width="18"
                                        fill="none"
                                        class="c-progress_bar"
                                />
                                <circle cx="39" cy="39" r="30"
                                        stroke-width="1.3"
                                        fill="none"
                                        class="c-progress_body"
                                />
                            </svg>
                        </figure>
                        <p class="progress_bar__item_title font-base-bold">
                            در هر
                            <span class="font-24">
                                    ۱۰
                                </span>
                            دقیقه
                        </p>
                        <p class="progress_bar__item_caption font-xs">
                            یک نفر به لیست انتظار اضافه می‌گردد.
                        </p>
                    </div>
                    <div class="progress_bar__item w-1/4 text-blue-800">
                        <figure class="progress_bar__item_icon block relative">
                            <svg viewBox="0 0 78 78" class="c-progress c-progress-2 block m-0-auto">
                                <circle cx="39" cy="39" r="30"
                                        stroke-width="18"
                                        fill="none"
                                        class="c-progress_bar"
                                />
                                <circle cx="39" cy="39" r="30"
                                        stroke-width="1.3"
                                        fill="none"
                                        class="c-progress_body"
                                />
                            </svg>
                        </figure>
                        <p class="progress_bar__item_title font-base-bold">
                            در هر
                            <span class="font-24">
                                    ۲
                                </span>
                            ساعت
                        </p>
                        <p class="progress_bar__item_caption font-xs">
                            یک بیمار نیازمند به پیوند، جان خود را از دست می‌دهد.
                        </p>
                    </div>
                    <div class="progress_bar__item w-1/4 text-blue-800">
                        <figure class="progress_bar__item_icon block relative">
                            <svg viewBox="0 0 78 78" class="c-progress c-progress-12 block m-0-auto">
                                <circle cx="39" cy="39" r="30"
                                        stroke-width="18"
                                        fill="none"
                                        class="c-progress_bar"
                                />
                                <circle cx="39" cy="39" r="30"
                                        stroke-width="1.3"
                                        fill="none"
                                        class="c-progress_body"
                                />
                            </svg>
                        </figure>
                        <p class="progress_bar__item_title font-base-bold">
                            در هر
                            <span class="font-24">
                                    ۱۲
                                </span>
                            ساعت
                        </p>
                        <p class="progress_bar__item_caption font-xs">
                            یک بیمار موفق به دریافت عضو حیاتی می‌شود و به زندگی بازمی‌گردد.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="events__section">
            <div class="container">
                <div class="section__title flex items-center">
                    <h4 class="font-24 text-blue-800 text-nowrap line-height-1">
                        رویدادها
                    </h4>
                    <span class="flower_line flower_line--blue relative flex items-end justify-end block w-full"></span>
                    <button class="carousel-btn carousel-btn--left flex-shrink-0"></button>
                    <button class="carousel-btn carousel-btn--right flex-shrink-0 m-r-30"></button>
                </div>
                <div class="max-w-full overflow-x-hidden">
                    <div class="carousel__container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a href=""
                                   class="v-cart relative flex flex-col rounded-3 border border-solid bg-white w-full has-shadow">
                                    <figure class="v-cart__cover w-full has-skeleton rounded">
                                        <img src=""
                                             data-src="https://images.unsplash.com/photo-1580408745615-1f0592484c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                             alt=""
                                             class="v-cart__cover_img w-full h-full rounded object-cover"
                                        />
                                    </figure>
                                    <p class="v-cart__title w-full text-blue-800 font-xs-medium">
                                        سومین جشنواره فیلم ۱۸۰ ثانیه‌ای بانک پاسارگاد برگزار شد
                                    </p>
                                    <time class="v-cart__release w-full has_notebook--gray text-gray-200 font-1xs text-left m-t-auto">
                                        ۱۷ آذر ۹۸
                                    </time>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href=""
                                   class="v-cart relative flex flex-col rounded-3 border border-solid bg-white w-full has-shadow">
                                    <figure class="v-cart__cover w-full has-skeleton rounded">
                                        <img src=""
                                             data-src="https://images.unsplash.com/photo-1580408745615-1f0592484c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                             alt=""
                                             class="v-cart__cover_img w-full h-full rounded object-cover"
                                        />
                                    </figure>
                                    <p class="v-cart__title w-full text-blue-800 font-xs-medium">
                                        سومین جشنواره فیلم ۱۸۰ ثانیه‌ای بانک پاسارگاد برگزار شد
                                    </p>
                                    <time class="v-cart__release w-full has_notebook--gray text-gray-200 font-1xs text-left m-t-auto">
                                        ۱۷ آذر ۹۸
                                    </time>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href=""
                                   class="v-cart relative flex flex-col rounded-3 border border-solid bg-white w-full has-shadow">
                                    <figure class="v-cart__cover w-full has-skeleton rounded">
                                        <img src=""
                                             data-src="https://images.unsplash.com/photo-1580356885468-fb9a86a110a4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                             alt=""
                                             class="v-cart__cover_img w-full h-full rounded object-cover"
                                        />
                                    </figure>
                                    <p class="v-cart__title w-full text-blue-800 font-xs-medium">
                                        اعطای جایزه MBE به یک پرستار به دلیل تشویق اقلیت‌ها به اهدای اعضا
                                    </p>
                                    <time class="v-cart__release w-full has_notebook--gray text-gray-200 font-1xs text-left m-t-auto">
                                        ۱۶ آذر ۹۸
                                    </time>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href=""
                                   class="v-cart relative flex flex-col rounded-3 border border-solid bg-white w-full has-shadow">
                                    <figure class="v-cart__cover w-full has-skeleton rounded">
                                        <img src=""
                                             data-src="https://images.unsplash.com/photo-1580401226724-be91c0cbe68e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                             alt=""
                                             class="v-cart__cover_img w-full h-full rounded object-cover rounded object-cover"
                                        />
                                    </figure>
                                    <p class="v-cart__title w-full text-blue-800 font-xs-medium">
                                        نوری رئیس کمیته ورزش انجمن اهدای عضو ایران شد
                                    </p>
                                    <time class="v-cart__release w-full has_notebook--gray text-gray-200 font-1xs text-left m-t-auto">
                                        ۱۲ آذر ۹۸
                                    </time>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block text-left m-t-20">
                    <a href=""
                       class="router-link relative inline-block font-xs-bold">
                        بیشتر
                    </a>
                </div>
            </div>
        </section>
        <section class="news__section relative bg-size-cover bg-no-repeat bg-center"
                 style="background-image: url('https://images.unsplash.com/photo-1520299607509-dcd935f9a839?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1489&q=80')"
        >
            <div class="container relative">
                <div class="flex items-center justify-between m-b-17">
                    <h4 class="text-blue font-24">
                        اخبار جهان
                    </h4>
                    <a href=""
                       class="router-link relative inline-block font-xs-bold">
                        بیشتر
                    </a>
                </div>
                <article class="news__container flex flex-wrap">
                    <a href=""
                       class="news__cart inline-flex relative bg-white border border-solid rounded-3  has-shadow">
                        <figure class="news__cart_cover flex-shrink-0 rounded-1/2 overflow-hidden has-skeleton">
                            <img src=""
                                 data-src="https://images.unsplash.com/photo-1580370397738-92fc675efbfc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                 alt=""
                                 class="block w-full h-full object-cover"
                            />
                        </figure>
                        <div class="news__cart_body w-full inline-flex items-center flex-wrap">
                            <p class="news__cart_caption w-full text-blue-800 font-xs-medium">
                                اعطای جایزه MBE به یک پرستار به دلیل تشویق اقلیت‌ها به اهدای اعضا
                            </p>
                            <p class="news__cart_release w-full has_notebook--gray text-gray-200 font-1xs text-left">
                                ۱۸ آذر ۹۸
                            </p>
                        </div>
                    </a>
                    <a href=""
                       class="news__cart inline-flex relative bg-white border border-solid rounded-3  has-shadow">
                        <figure class="news__cart_cover flex-shrink-0 rounded-1/2 overflow-hidden has-skeleton">
                            <img src=""
                                 data-src="https://images.unsplash.com/photo-1580317092843-52bb0adbed4f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                 alt=""
                                 class="block w-full h-full object-cover"
                            />
                        </figure>
                        <div class="news__cart_body w-full inline-flex items-center flex-wrap">
                            <p class="news__cart_caption w-full text-blue-800 font-xs-medium">
                                برپایی غرفه صدور آنی کارت اهدای عضو در حاشیه اختتامیه پویش ۳۰ - ۶۰
                            </p>
                            <p class="news__cart_release w-full has_notebook--gray text-gray-200 font-1xs text-left">
                                ۱۸ آذر ۹۸
                            </p>
                        </div>
                    </a>
                    <a href=""
                       class="news__cart inline-flex relative bg-white border border-solid rounded-3  has-shadow">
                        <figure class="news__cart_cover flex-shrink-0 rounded-1/2 overflow-hidden has-skeleton">
                            <img src=""
                                 data-src="https://images.unsplash.com/photo-1580368393844-28322c2ff03f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                 alt=""
                                 class="block w-full h-full object-cover"
                            />
                        </figure>
                        <div class="news__cart_body w-full inline-flex items-center flex-wrap">
                            <p class="news__cart_caption w-full text-blue-800 font-xs-medium">
                                رئیس مرکز مدیریت پیوند و درمان بیماری‌های وزارت بهداشت: تحریم‌ها و تاثیر آن بر کیفیت
                                زندگی بیماران نادر، ضد حقوق بشر است
                            </p>
                            <p class="news__cart_release w-full has_notebook--gray text-gray-200 font-1xs text-left">
                                ۱۷ آذر ۹۸
                            </p>
                        </div>
                    </a>
                    <a href=""
                       class="news__cart inline-flex relative bg-white border border-solid rounded-3  has-shadow">
                        <figure class="news__cart_cover flex-shrink-0 rounded-1/2 overflow-hidden has-skeleton">
                            <img src=""
                                 data-src="https://images.unsplash.com/photo-1580347363218-eafca81440b9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                 alt=""
                                 class="block w-full h-full object-cover"
                            />
                        </figure>
                        <div class="news__cart_body w-full inline-flex items-center flex-wrap">
                            <p class="news__cart_caption w-full text-blue-800 font-xs-medium">
                                اعطای جایزه MBE به یک پرستار به دلیل تشویق اقلیت‌ها به اهدای اعضا
                            </p>
                            <p class="news__cart_release w-full has_notebook--gray text-gray-200 font-1xs text-left">
                                ۱۶ آذر ۹۸
                            </p>
                        </div>
                    </a>
                </article>
            </div>
        </section>
        <section class="ehda-news__section bg--sky-blue">
            <div class="container">
                <div class="section__title flex items-center">
                    <h4 class="font-24 text-blue-800 cursor-default text-nowrap line-height-1">
                        اخبار اهدا
                    </h4>
                    <span class="flower_line flower_line--white relative flex items-end justify-end block w-full"></span>
                    <button class="carousel-btn carousel-btn--left flex-shrink-0"></button>
                    <button class="carousel-btn carousel-btn--right flex-shrink-0 m-r-30"></button>
                </div>
                <article class="ehda-news__container">
                    <div class="max-w-full overflow-x-hidden">
                        <div class="carousel__container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="/"
                                       class="cart w-full block relative">
                                        <header class="cart__header relative flex items-end z-1">
                                            <div class="cart__cover relative has-shadow rounded bg-white">
                                                <figure class="block w-full h-full rounded has-skeleton">
                                                    <img src=""
                                                         data-src="https://images.unsplash.com/photo-1580564182117-00cc0ce3587e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                                         alt=""
                                                         class="cart__cover_image w-full h-full block rounded object-cover"
                                                    />
                                                </figure>
                                            </div>
                                            <time class="cart__release has_notebook--gray block text-gray font-xs text-left text-nowrap">
                                                ۲۸ مهر ۹۸
                                            </time>
                                        </header>
                                        <div class="cart__body relative bg-white has-shadow border border-solid rounded m-r-auto">
                                            <p class="cart__title text-blue-800 font-sm-bold">
                                                تجلیل از مدیرعامل انجمن اهدای عضو ایرانیان در دومین همایش ملی ایثار
                                                اجتماعی
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="/"
                                       class="cart w-full block relative">
                                        <header class="cart__header relative flex items-end z-1">
                                            <div class="cart__cover relative has-shadow rounded bg-white">
                                                <figure class="block w-full h-full rounded has-skeleton">
                                                    <img src=""
                                                         data-src="https://images.unsplash.com/photo-1580564182117-00cc0ce3587e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                                         alt=""
                                                         class="cart__cover_image w-full h-full block rounded object-cover"
                                                    />
                                                </figure>
                                            </div>
                                            <time class="cart__release has_notebook--gray block text-gray font-xs text-left text-nowrap">
                                                ۲۸ اردیبهشت ۹۸
                                            </time>
                                        </header>
                                        <div class="cart__body relative bg-white has-shadow border border-solid rounded m-r-auto">
                                            <p class="cart__title text-blue-800 font-sm-bold">
                                                برپایی غرفه صدور آنی کارت اهدای عضو در حاشیه اختتامیه پویش ۳۰ - ۶۰
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="/"
                                       class="cart w-full block relative">
                                        <header class="cart__header relative flex items-end z-1">
                                            <div class="cart__cover relative has-shadow rounded bg-white">
                                                <figure class="block w-full h-full rounded has-skeleton">
                                                    <img src=""
                                                         data-src="https://images.unsplash.com/photo-1580564182117-00cc0ce3587e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                                         alt=""
                                                         class="cart__cover_image w-full h-full block rounded object-cover"
                                                    />
                                                </figure>
                                            </div>
                                            <time class="cart__release has_notebook--gray block text-gray font-xs text-left text-nowrap">
                                                ۲۸ خرداد ۹۸
                                            </time>
                                        </header>
                                        <div class="cart__body relative bg-white has-shadow border border-solid rounded m-r-auto">
                                            <p class="cart__title text-blue-800 font-sm-bold">
                                                اعطای جایزه MBE به یک پرستار به دلیل تشویق اقلیت‌ها به اهدای اعضا
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <div class="block text-left m-t-20">
                    <a href=""
                       class="router-link relative inline-block font-xs-bold">
                        بیشتر
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/vendors~home~news_list~news_show.js')}}" defer></script>
    <script src="{{asset('js/home.js')}}" defer></script>
@endsection