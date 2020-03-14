@extends('fa.template.master')
@section('content')
    <div class="i-page n-list-page">
        <div class="n-list__header block w-full bg-blue-100">
            <div class="container flex items-center">
                <div class="block flex-1">
                    <div class="n-list__header_title flex items-center">
                        <h4 class="font-30 font-bold text-white text-nowrap line-height-1 cursor-default">
                            اخبار
                        </h4>
                        <span class="flower_line relative flex items-end justify-end block w-full"></span>
                    </div>
                    <p class="n-list__header_sub-title text-white font-20 font-bold cursor-default">
                        اخبار ایران
                    </p>
                </div>
                <figure class="n-list__header_cover flex-shrink-0">
                    <img src="/images/img_news-list.png"
                         alt="اخبار ایران"
                         class="block w-full h-full object-contain"
                    />
                </figure>
            </div>
        </div>
        <div class="block w-full">
            <div class="block w-full overflow-hidden">
                <div class="carousel__container bg-sky-blue">
                    <div class="swiper-wrapper">

                        @foreach($menusContent->getItems() as $item)

                            <div class="swiper-slide">
                                <a href=""
                                   class="s-cart block w-full h-full bg-white"
                                >
                                    <figure class="s-cart__cover relative block w-full has-skeleton">
                                        <img src=""
                                             data-src="https://images.unsplash.com/photo-1581075814634-9c0eaf943453?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                             alt=""
                                             class="s-cart__cover_image block w-full h-full object-cover"
                                        />
                                        <figcaption
                                                class="s-cart__caption absolute w-full flex flex-col justify-between text-white font-bold z-2">
                                            <span class="s-cart__caption_text block w-full font-1xs text-right">
                                                {{$item->getAbstract()}}
                                            </span>
                                            <time class="block w-full font-2xs text-left">
                                                انتشار: ۲۸ دی ۱۳۹۸
                                            </time>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-box inner-box--blue flex items-start text-right">
                <aside class="n-list__aside">
                    <div class="i-page__panel block w-full bg-white border border-solid rounded">
                        <div class="i-page__panel_header w-full">
                            <label class="i-page__panel_label flex items-center w-full border border-solid rounded">
                                <input type="text"
                                       class="i-page__panel_input w-full bg-transparent text-blue-100"
                                       placeholder="جستجو در خبرها"
                                       autocomplete="off"
                                />
                            </label>
                        </div>
                        <div class="i-page__panel_body">
                            <p class="text-blue-800 font-sm-bold m-b-10 cursor-default">
                                دسته بندی اخبار
                            </p>
                            <label class="checkbox-square relative flex items-center w-full cursor-pointer font-xs-bold">
                                <input type="radio"
                                       class="checkbox-square__input"
                                       name="news"
                                />
                                <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"></span>
                                <span class="checkbox-square__label rounded user-select-none">
                                        جدیدترین خبرها
                                    </span>
                            </label>
                            <label class="checkbox-square relative flex items-center w-full cursor-pointer font-xs-bold">
                                <input type="radio"
                                       class="checkbox-square__input"
                                       name="news"
                                />
                                <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"></span>
                                <span class="checkbox-square__label rounded user-select-none">
                                    خبرهای ویژه
                                </span>
                            </label>
                            <label class="checkbox-square relative flex items-center w-full cursor-pointer font-xs-bold">
                                <input type="radio"
                                       class="checkbox-square__input"
                                       name="news"
                                />
                                <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"></span>
                                <span class="checkbox-square__label rounded user-select-none">
                                    مهم‌ترین خبرها
                                </span>
                            </label>
                            <label class="checkbox-square relative flex items-center w-full cursor-pointer font-xs-bold">
                                <input type="radio"
                                       class="checkbox-square__input"
                                       name="news"
                                />
                                <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"></span>
                                <span class="checkbox-square__label rounded user-select-none">
                                    خبرهای داغ
                                </span>
                            </label>
                            <button class="i-page__panel_button relative text-blue-800 font-xs-bold">
                                بیشتر...
                            </button>
                        </div>
                    </div>
                </aside>
                <div class="w-full">
                    @foreach($menusContent->getItems() as $item)
                        <a href="" class="h-cart relative block w-full flex border border-solid rounded bg-white has-shadow">
                        <figure class=" h-cart__cover flex-shrink-0 rounded-inherit rounded-tl-none rounded-bl-none
                           has-skeleton">
                        <img src=""
                             data-src="https://images.unsplash.com/photo-1581084104193-bec602b556a0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                             alt=""
                             class="h-cart__cover_image block w-full h-full rounded-inherit object-cover"/>
                        </figure>
                        <div class="h-cart__details flex-1">
                            <p class="h-cart__title font-sm-bold">
                                {{$item->getAbstract()}}
                            </p>
                            <time class="h-cart__release block w-full font-1xs font-bold text-left">
                                انتشار: ۲۸ دی ۱۳۹۸
                            </time>
                            <p class="h-cart__caption text-blue-800 font-xs">
                                {{$item->getDescription()}}
                            </p>
                        </div>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/site/vendors~home~news_list~news_show.js')}}" defer></script>
    <script src="{{asset('js/site/news_list.js')}}" defer></script>
@endsection
