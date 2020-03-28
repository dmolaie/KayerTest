@extends('fa.template.master')
@section('content')
    <div class="i-page n-show-page">
        <div class="container">
            <h1 class="i-page__head flex items-center justify-center text-blue font-24 font-bold">
                <span class="i-page__title text-center cursor-default">
                    {{$menusContent->getFirstTitle()}}
                </span>
            </h1>
            <div class="inner-box inner-box--white text-right">
                <div class="n-show__header flex items-stretch md:flex-col">
                    <figure class="n-show__cover flex-shrink-0 rounded max-w-full has-skeleton md:w-full">
                        <img src=""
                             data-src="/{{$menusContent->getAttachmentFiles()[0] ? $menusContent->getAttachmentFiles()[0]['path'] : ''}}"
                             alt=""
                             class="n-show__cover_image w-full h-full block rounded-inherit object-cover"
                        />
                    </figure>
                    <div class="n-show__details relative flex flex-row flex-wrap items-end flex-1">
                        <h1 class="n-show__title w-full text-blue-800 font-base cursor-default">
                            {{$menusContent->getSecondTitle()}}

                        </h1>
                        <time class="n-show__release w-full block color-black text-left font-xs-bold cursor-default">
                            انتشار: ۲۸ دی ۱۳۹۸
                        </time>
                        <span class="i-page__flower_line i-page__flower_line--left flower_line flower_line--blue--200 absolute flex items-end justify-end pointer-event-none m-0"></span>
                    </div>
                </div>
                <div class="n-show__description text-bayoux font-base cursor-default rounded-3 md:font-sm">
                            {{$menusContent->getAbstract()}}
                </div>
                <div class="n-show__caption text-bayoux font-base cursor-default md:font-sm">
                    {!! html_entity_decode($menusContent->getDescription(), ENT_QUOTES, 'UTF-8') !!}
                </div>
                <div class="i-page__footer relative">
                    <div class="flex items-center md:flex-col">
                        <p class="text-bayoux font-sm-bold cursor-default md:m-b-20">
                            انتشار: ۱۱:۲۹ / ۱۸ فروردین ۱۳۹۷
                        </p>
                        <div class="inline-flex items-center l:m-r-auto md:m-b-20">
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
            <h2 class="relative-news__title flex text-blue font-24 md:font-22 text-center">
                <span class="flower_line flower_line--blue--200 relative flex items-end justify-end flex-1 reverse-item m-0"></span>
                <span class="i-page__title">
                     از دست ندهید
                </span>
                <span class="flower_line flower_line--blue--200 relative flex items-end justify-end flex-1 m-0"></span>
            </h2>
            <div class="block w-full relative-news">
                <div class="max-w-full overflow-x-hidden">
                    <div class="carousel__container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a href=""
                                   class="relative-news__cart relative flex flex-col rounded-3 border border-solid bg-white w-full has-shadow">
                                    <figure class="relative-news__cart_cover w-full has-skeleton rounded-3 rounded-bl-none rounded-br-none">
                                        <img src=""
                                             data-src="https://images.unsplash.com/photo-1580408745615-1f0592484c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                             alt=""
                                             class="relative-news__cart_cover_img w-full h-full rounded-inherit object-cover"
                                        />
                                    </figure>
                                    <div class="relative-news__cart_body block w-full">
                                        <p class="relative-news__cart_title w-full text-black-300 font-xs-bold">
                                            حضرت حجت‌الاسلام والمسلمین عابدینی امام جمعه قزوین: نماز جمعه فرصت خوبی برای تبیین فرهنگ اهدای عضو است
                                        </p>
                                        <p class="relative-news__cart_link text-blue font-xs-bold text-left">
                                            بیشتر
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href=""
                                   class="relative-news__cart relative flex flex-col rounded-3 border border-solid bg-white w-full has-shadow">
                                    <figure class="relative-news__cart_cover w-full has-skeleton rounded-3 rounded-bl-none rounded-br-none">
                                        <img src=""
                                             data-src="https://images.unsplash.com/photo-1580408745615-1f0592484c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                             alt=""
                                             class="relative-news__cart_cover_img w-full h-full rounded-inherit object-cover"
                                        />
                                    </figure>
                                    <div class="relative-news__cart_body block w-full">
                                        <p class="relative-news__cart_title w-full text-black-300 font-xs-bold">
                                            حضرت حجت‌الاسلام والمسلمین عابدینی امام جمعه قزوین: نماز جمعه فرصت خوبی برای تبیین فرهنگ اهدای عضو است
                                        </p>
                                        <p class="relative-news__cart_link text-blue font-xs-bold text-left">
                                            بیشتر
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href=""
                                   class="relative-news__cart relative flex flex-col rounded-3 border border-solid bg-white w-full has-shadow">
                                    <figure class="relative-news__cart_cover w-full has-skeleton rounded-3 rounded-bl-none rounded-br-none">
                                        <img src=""
                                             data-src="https://images.unsplash.com/photo-1580408745615-1f0592484c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                             alt=""
                                             class="relative-news__cart_cover_img w-full h-full rounded-inherit object-cover"
                                        />
                                    </figure>
                                    <div class="relative-news__cart_body block w-full">
                                        <p class="relative-news__cart_title w-full text-black-300 font-xs-bold">
                                            حضرت حجت‌الاسلام والمسلمین عابدینی امام جمعه قزوین: نماز جمعه فرصت خوبی برای تبیین فرهنگ اهدای عضو است
                                        </p>
                                        <p class="relative-news__cart_link text-blue font-xs-bold text-left">
                                            بیشتر
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href=""
                                   class="relative-news__cart relative flex flex-col rounded-3 border border-solid bg-white w-full has-shadow">
                                    <figure class="relative-news__cart_cover w-full has-skeleton rounded-3 rounded-bl-none rounded-br-none">
                                        <img src=""
                                             data-src="https://images.unsplash.com/photo-1580408745615-1f0592484c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                             alt=""
                                             class="relative-news__cart_cover_img w-full h-full rounded-inherit object-cover"
                                        />
                                    </figure>
                                    <div class="relative-news__cart_body block w-full">
                                        <p class="relative-news__cart_title w-full text-black-300 font-xs-bold">
                                            حضرت حجت‌الاسلام والمسلمین عابدینی امام جمعه قزوین: نماز جمعه فرصت خوبی برای تبیین فرهنگ اهدای عضو است
                                        </p>
                                        <p class="relative-news__cart_link text-blue font-xs-bold text-left">
                                            بیشتر
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href=""
                                   class="relative-news__cart relative flex flex-col rounded-3 border border-solid bg-white w-full has-shadow">
                                    <figure class="relative-news__cart_cover w-full has-skeleton rounded-3 rounded-bl-none rounded-br-none">
                                        <img src=""
                                             data-src="https://images.unsplash.com/photo-1580408745615-1f0592484c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                             alt=""
                                             class="relative-news__cart_cover_img w-full h-full rounded-inherit object-cover"
                                        />
                                    </figure>
                                    <div class="relative-news__cart_body block w-full">
                                        <p class="relative-news__cart_title w-full text-black-300 font-xs-bold">
                                            حضرت حجت‌الاسلام والمسلمین عابدینی امام جمعه قزوین: نماز جمعه فرصت خوبی برای تبیین فرهنگ اهدای عضو است
                                        </p>
                                        <p class="relative-news__cart_link text-blue font-xs-bold text-left">
                                            بیشتر
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href=""
                                   class="relative-news__cart relative flex flex-col rounded-3 border border-solid bg-white w-full has-shadow">
                                    <figure class="relative-news__cart_cover w-full has-skeleton rounded-3 rounded-bl-none rounded-br-none">
                                        <img src=""
                                             data-src="https://images.unsplash.com/photo-1580408745615-1f0592484c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                             alt=""
                                             class="relative-news__cart_cover_img w-full h-full rounded-inherit object-cover"
                                        />
                                    </figure>
                                    <div class="relative-news__cart_body block w-full">
                                        <p class="relative-news__cart_title w-full text-black-300 font-xs-bold">
                                            حضرت حجت‌الاسلام والمسلمین عابدینی امام جمعه قزوین: نماز جمعه فرصت خوبی برای تبیین فرهنگ اهدای عضو است
                                        </p>
                                        <p class="relative-news__cart_link text-blue font-xs-bold text-left">
                                            بیشتر
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href=""
                                   class="relative-news__cart relative flex flex-col rounded-3 border border-solid bg-white w-full has-shadow">
                                    <figure class="relative-news__cart_cover w-full has-skeleton rounded-3 rounded-bl-none rounded-br-none">
                                        <img src=""
                                             data-src="https://images.unsplash.com/photo-1580408745615-1f0592484c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                             alt=""
                                             class="relative-news__cart_cover_img w-full h-full rounded-inherit object-cover"
                                        />
                                    </figure>
                                    <div class="relative-news__cart_body block w-full">
                                        <p class="relative-news__cart_title w-full text-black-300 font-xs-bold">
                                            حضرت حجت‌الاسلام والمسلمین عابدینی امام جمعه قزوین: نماز جمعه فرصت خوبی برای تبیین فرهنگ اهدای عضو است
                                        </p>
                                        <p class="relative-news__cart_link text-blue font-xs-bold text-left">
                                            بیشتر
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href=""
                                   class="relative-news__cart relative flex flex-col rounded-3 border border-solid bg-white w-full has-shadow">
                                    <figure class="relative-news__cart_cover w-full has-skeleton rounded-3 rounded-bl-none rounded-br-none">
                                        <img src=""
                                             data-src="https://images.unsplash.com/photo-1580408745615-1f0592484c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                             alt=""
                                             class="relative-news__cart_cover_img w-full h-full rounded-inherit object-cover"
                                        />
                                    </figure>
                                    <div class="relative-news__cart_body block w-full">
                                        <p class="relative-news__cart_title w-full text-black-300 font-xs-bold">
                                            حضرت حجت‌الاسلام والمسلمین عابدینی امام جمعه قزوین: نماز جمعه فرصت خوبی برای تبیین فرهنگ اهدای عضو است
                                        </p>
                                        <p class="relative-news__cart_link text-blue font-xs-bold text-left">
                                            بیشتر
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/site/vendors~home~news_list~news_show.js')}}" defer></script>
    <script src="{{asset('js/site/news_show.js')}}" defer></script>
@endsection