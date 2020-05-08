@extends('fa.template.master')
@section('content')
    <div class="p-home flex flex-col">
        <div class="block w-full">
            <figure class="block w-full">
                <img src="{{ secure_asset('/images/slider/image_slider--1.jpg') }}"
                     alt="انجمن اهدای عضو ایرانیان"
                     class="block w-full"
                />
            </figure>
        </div>
        <div class="link flex justify-center">
            <a href="{{route('page.donation-card',config('app.locale'))}}"
               class="link__item link__item--green font-lg font-bold text-white text-center l:transition-background md:font-xs"
            >
                کارت اهدای عضو
            </a>
            <a href="{{route('page.volunteers',config('app.locale'))}}"
               class="relative link__item link__item--blue font-lg font-bold text-white text-center l:transition-background md:font-xs"
            >
                سفیر اهدای عضو
            </a>
        </div>
        <section class="relative heartbeat__section overflow-hidden">
            <h1 class="relative font-22 text-center user-select-none z-2 sm:font-1xs">
                <span class="text-blue">
                    در حال حاضر حدود ۲۶۰۰۰ نفر در انتظار پیوند هستند.
                </span>
            </h1>
            <canvas class="heartbeat__canvas absolute"></canvas>
        </section>
        <section class="static__section">
            <div class="container text-center cursor-default">
                <h4 class="section__title font-lg text-blue-800 md:font-base sm:font-xs">
                    برای نجات
                    <span class="l:font-22 text-blue">
                        زندگی
                    </span>
                    لحظه‌ها مهم است…
                </h4>
                <figure class="section__image flex items-center justify-center">
                    <img src="{{ secure_asset('/images/ic_person--blue.svg') }}"
                         alt="/"
                         class="ic_person"
                    />
                    <span class="blue_symbol text-blue">
                        =
                    </span>
                    <img src="{{ secure_asset('/images/ic_person--gray.svg') }}"
                         alt="/"
                         class="ic_person"
                    />
                    <img src="{{ secure_asset('/images/ic_person--gray.svg') }}"
                         alt="/"
                         class="ic_person"
                    />
                    <img src="{{ secure_asset('/images/ic_person--gray.svg') }}"
                         alt="/"
                         class="ic_person"
                    />
                    <img src="{{ secure_asset('/images/ic_person--gray.svg') }}"
                         alt="/"
                         class="ic_person"
                    />
                    <img src="{{ secure_asset('/images/ic_person--gray.svg') }}"
                         alt="/"
                         class="ic_person"
                    />
                    <img src="{{ secure_asset('/images/ic_person--gray.svg') }}"
                         alt="/"
                         class="ic_person"
                    />
                    <img src="{{ secure_asset('/images/ic_person--gray.svg') }}"
                         alt="/"
                         class="ic_person"
                    />
                    <img src="{{ secure_asset('/images/ic_person--gray.svg') }}"
                         alt="/"
                         class="ic_person"
                    />
                </figure>
                <p class="text-green-300 font-base-bold md:font-sm sm:font-xs">
                    هر فرد مرگ مغزی می‌تواند جان
                    <span class="l:font-24">
                        ۸ نفر
                    </span>
                    را نجات دهد.
                </p>
                <div class="progress_bar__container flex items-start justify-around sm:flex-col-reverse">
                    <div class="progress_bar__item w-1/4 text-blue-800 sm:w-full">
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
                        <p class="progress_bar__item_title font-base-bold sm:font-1xs">
                            در هر
                            <span class="l:font-24">
                                ۱۰
                            </span>
                            دقیقه
                        </p>
                        <p class="progress_bar__item_caption font-xs sm:font-1xs">
                            یک نفر به لیست انتظار اضافه می‌گردد.
                        </p>
                    </div>
                    <div class="progress_bar__item w-1/4 text-blue-800 sm:w-full">
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
                        <p class="progress_bar__item_title font-base-bold sm:font-1xs">
                            در هر
                            <span class="l:font-24">
                                ۲
                            </span>
                            ساعت
                        </p>
                        <p class="progress_bar__item_caption font-xs sm:font-xs sm:font-1xs">
                            یک بیمار نیازمند به پیوند، جان خود را از دست می‌دهد.
                        </p>
                    </div>
                    <div class="progress_bar__item w-1/4 text-blue-800 sm:w-full">
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
                        <p class="progress_bar__item_title font-base-bold sm:font-1xs">
                            در هر
                            <span class="l:font-24">
                                ۱۲
                            </span>
                            ساعت
                        </p>
                        <p class="progress_bar__item_caption font-xs sm:font-1xs">
                            یک بیمار موفق به دریافت عضو حیاتی می‌شود و به زندگی بازمی‌گردد.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="info__section">
            <div class="container sm:p-0">
                <div class="section__title flex items-end sm:p-0-20">
                    <h4 class="i-page__sub-title font-24 text-blue-800 cursor-default text-nowrap line-height-1 sm:font-sm">
                        دانستنی‌های اهدا
                    </h4>
                    <span class="p-home__line p-home__line--blue flex items-end justify-end block w-full sm:none"></span>
                    <button class="carousel-btn carousel-btn--left flex-shrink-0 sm:none"></button>
                    <button class="carousel-btn carousel-btn--right flex-shrink-0 m-r-30 sm:none"></button>
                    <a href=""
                       class="router-link relative none font-xs-bold sm:block sm:m-r-auto sm:m-b-2">
                        بیشتر
                    </a>
                </div>
                <div class="max-w-full overflow-x-hidden">
                    <div class="carousel__container">
                        <div class="swiper-wrapper">
                            @foreach($knowledgeArticles as $knowledgeArticle)
                                <div class="swiper-slide">
                                    <a href=""
                                       class="info__cart relative block rounded-3 border border-solid bg-white w-full has-shadow">
                                        <figure class="info__cart_image block w-full m-0-auto">
                                            <img src="{{ secure_asset('images/information/تاریخچه‌ی اهدا و پیوند.svg') }}"
                                                 alt="تاریخچه‌ی اهدا و پیوند"
                                                 class="block w-full h-full rounded object-contain"
                                            />
                                        </figure>
                                        <p class="info__cart_title w-full text-blue-800 font-xs font-bold text-center sm:font-1xs">
                                            {{$knowledgeArticle->getFirstTitle()}}
                                        </p>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="carousel__pagination carousel__pagination--blue none sm:flex justify-center"></div>
                    </div>
                </div>
                <div class="block text-left m-t-20 sm:none">
                    <a href=""
                       class="router-link relative inline-block font-xs-bold">
                        بیشتر
                    </a>
                </div>
            </div>
        </section>
        <section class="events__section bg--sky-blue">
            <div class="container sm:p-0">
                <div class="section__title flex items-end sm:p-0-20">
                    <h4 class="i-page__sub-title font-24 text-blue-800 text-nowrap line-height-1 cursor-default sm:font-sm">
                        رویدادهای ویژه اهدا
                    </h4>
                    <span class="p-home__line p-home__line--blue-200 flex items-end justify-end block w-full sm:none"></span>
                    <button class="carousel-btn carousel-btn--left flex-shrink-0 sm:none"></button>
                    <button class="carousel-btn carousel-btn--right flex-shrink-0 m-r-30 sm:none"></button>
                    <a href=""
                       class="router-link relative none font-xs-bold sm:block sm:m-r-auto sm:m-b-2">
                        بیشتر
                    </a>
                </div>
                <div class="max-w-full overflow-x-hidden">
                    <div class="carousel__container">
                        <div class="swiper-wrapper">
                            @foreach($event as $item)
                                <div class="swiper-slide">
                                    <a href="{{route('archive.showDetailEvents',[config('app.locale'),$item->getSlug()])}}"
                                       class="v-cart relative flex flex-col rounded-3 border border-solid bg-white w-full has-shadow">
                                        <figure class="v-cart__cover w-full has-skeleton rounded">
                                            <img src=""
                                                 data-src="{{$item->getAttachmentFiles() ? current($item->getAttachmentFiles())['path'] : ''}}"
                                                 alt=""
                                                 class="v-cart__cover_img w-full h-full rounded object-cover"
                                            />
                                        </figure>
                                        <p class="v-cart__title w-full text-blue-800 font-xs-medium sm:font-1xs">
                                            {{$item->getTitle()}}
                                        </p>
                                        <time class="v-cart__release w-full has_notebook--gray text-gray-200 font-1xs text-left m-t-auto">
                                            {{\Morilog\Jalali\Jalalian::forge(Carbon\Carbon::parse($item->getPublishDate()))->format(' %d %B %Y')}}
                                        </time>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="carousel__pagination carousel__pagination--white none sm:flex justify-center"></div>
                    </div>
                </div>
                <div class="block text-left m-t-20 sm:none">
                    <a href=""
                       class="router-link relative inline-block font-xs-bold">
                        بیشتر
                    </a>
                </div>
            </div>
        </section>
        <section class="ehda-news__section">
            <div class="container sm:p-0">
                <div class="section__title flex items-end sm:p-0-20">
                    <h4 class="i-page__sub-title font-24 text-blue-800 cursor-default text-nowrap line-height-1 sm:font-sm">
                        اخبار اهدا
                    </h4>
                    <span class="p-home__line p-home__line--blue flex items-end justify-end block w-full sm:none"></span>
                    <button class="carousel-btn carousel-btn--left flex-shrink-0 sm:none"></button>
                    <button class="carousel-btn carousel-btn--right flex-shrink-0 m-r-30 sm:none"></button>
                    <a href=""
                       class="router-link relative none font-xs-bold  sm:block sm:m-r-auto sm:m-b-2">
                        بیشتر
                    </a>
                </div>
                <article class="ehda-news__container">
                    <div class="max-w-full overflow-x-hidden">
                        <div class="carousel__container">
                            <div class="swiper-wrapper">
                                @foreach($news as $item)
                                    <div class="swiper-slide">
                                        <a href="{{route('archive.showDetailNews',[config('app.locale'),$item->getSlug()])}}"
                                           class="cart w-full block relative sm:flex">
                                            <header class="cart__header relative flex items-end z-1">
                                                <div class="cart__cover relative has-shadow rounded bg-white sm:w-full sm:h-full">
                                                    <figure class="block w-full h-full rounded has-skeleton sm:rounded-0">
                                                        <img src=""
                                                             data-src="{{$item->getAttachmentFiles() ? current($item->getAttachmentFiles())['path'] : ''}}"
                                                             alt=""
                                                             class="cart__cover_image w-full h-full block rounded-inherit object-cover"
                                                        />
                                                    </figure>
                                                </div>
                                                <time class="cart__release has_notebook--gray block text-gray font-xs text-left text-nowrap sm:none">
                                                    {{\Morilog\Jalali\Jalalian::forge(Carbon\Carbon::parse($item->getPublishDate()))->format(' %d %B %Y')}}
                                                </time>
                                            </header>
                                            <div class="cart__body relative bg-white has-shadow border border-solid rounded m-r-auto sm:border-0 sm:rounded-0">
                                                <p class="cart__title text-blue-800 font-sm-bold">
                                                    {{$item->getFirstTitle()}}
                                                </p>
                                                <time class="cart__m-release has_notebook--gray block text-gray font-xs text-left text-nowrap none sm:block text-left">
                                                    {{\Morilog\Jalali\Jalalian::forge(Carbon\Carbon::parse($item->getPublishDate()))->format(' %d %B %Y')}}
                                                </time>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="carousel__pagination carousel__pagination--blue none sm:flex justify-center"></div>
                        </div>
                    </div>
                </article>
                <div class="block text-left m-t-20 sm:none">
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
    <script src="{{ secure_asset('js/site/vendors~gallery-audio~gallery-images~home~news_list~news_show.js') }}" defer></script>
    <script src="{{ secure_asset('js/site/home.js') }}" defer></script>
@endsection