@extends('fa.template.master')
@section('content')
    <div class="i-page n-show-page">
        <div class="container sm:p-0">
            <h1 class="i-page__head flex items-center justify-center text-blue font-24 font-bold sm:font-lg">
                <span class="i-page__title text-center cursor-default">
                    رویداد
                </span>
            </h1>
            <div class="inner-box inner-box--white text-right">
                <div class="n-show__header flex items-stretch md:flex-col">
                    <figure class="n-show__cover flex-shrink-0 rounded max-w-full has-skeleton md:w-full">
                        <img src=""
                             data-src="/{{$content->getAttachmentFiles() ? current($content->getAttachmentFiles())['path'] : ''}}"
                             alt=""
                             class="n-show__cover_image w-full h-full block rounded-inherit object-cover"
                        />
                    </figure>
                    <div class="n-show__details relative flex flex-row flex-wrap items-end flex-1">
                        <h1 class="n-show__title w-full text-blue-800 font-base cursor-default sm:font-sm sm:m-b-10">
                            {{$content->getTitle()}}
                        </h1>
                        <p class="w-full flex color-black font-sm font-medium cursor-default sm:flex-wrap m-b-10">
                            <span class="font-bold m-l-8">
                                تاریخ رویداد:
                            </span>
                            از
                            {{\Morilog\Jalali\Jalalian::forge(Carbon\Carbon::parse($content->getEventStartDate()),new \DateTimeZone('Asia/Tehran'))->format('%d %B')}}
                            تا
                            {{\Morilog\Jalali\Jalalian::forge(Carbon\Carbon::parse($content->getEventEndDate()),new \DateTimeZone('Asia/Tehran'))->format('%d %B')}}
                            <span class="m-r-auto">
                                {{\Morilog\Jalali\Jalalian::forge(Carbon\Carbon::parse($content->getEventStartDate()),new \DateTimeZone('Asia/Tehran'))->format('H:i')}}
                                -
                                {{\Morilog\Jalali\Jalalian::forge(Carbon\Carbon::parse($content->getEventEndDate()),new \DateTimeZone('Asia/Tehran'))->format('H:i')}}
                            </span>
                        </p>
                        <p class="w-full flex color-black font-sm font-medium cursor-default sm:flex-wrap m-b-auto">
                            <span class="font-bold m-l-8">
                                تاریخ ثبت‌نام:
                            </span>
                            از
                            {{\Morilog\Jalali\Jalalian::forge(Carbon\Carbon::parse($content->getEventStartRegisterDate()),new \DateTimeZone('Asia/Tehran'))->format('%d %B')}}
                            تا
                            {{\Morilog\Jalali\Jalalian::forge(Carbon\Carbon::parse($content->getEventEndRegisterDate()),new \DateTimeZone('Asia/Tehran'))->format('%d %B')}}
                            <span class="m-r-auto">
                                {{\Morilog\Jalali\Jalalian::forge(Carbon\Carbon::parse($content->getEventStartRegisterDate()),new \DateTimeZone('Asia/Tehran'))->format('H:i')}}
                                -
                                {{\Morilog\Jalali\Jalalian::forge(Carbon\Carbon::parse($content->getEventEndRegisterDate()),new \DateTimeZone('Asia/Tehran'))->format('H:i')}}
                            </span>
                        </p>
                        <time class="n-show__release w-full block color-black text-left font-xs-bold cursor-default sm:font-1xs">
                            انتشار: {{\Morilog\Jalali\Jalalian::forge(Carbon\Carbon::parse($content->getPublishDate()))->format(' %d %B %Y')}}
                        </time>
                    </div>
                </div>
                @if(!!$content->getAbstract())
                    <div class="n-show__description text-bayoux font-base cursor-default rounded-3 md:font-sm">
                        {!! html_entity_decode($content->getAbstract(), ENT_QUOTES, 'UTF-8') !!}
                    </div>
                @endif
                <div class="userContent n-show__caption text-bayoux font-base cursor-default md:font-base">
                    {!! html_entity_decode($content->getDescription(), ENT_QUOTES, 'UTF-8') !!}
                </div>
                <div class="i-page__footer relative">
                    <div class="flex items-center md:flex-col">
                        <p class="text-bayoux font-sm-bold cursor-default md:m-b-20">
                            انتشار: {{\Morilog\Jalali\Jalalian::forge(Carbon\Carbon::parse($content->getPublishDate()),new \DateTimeZone('Asia/Tehran'))->format('H:i /  %d %B %Y')}}
                        </p>
                        <div class="i-page__short inline-flex items-center l:m-r-auto md:m-b-20 sm:flex-col">
                            <span class="text-bayoux font-sm-bold cursor-default">
                                لینک کوتاه:
                            </span>
                            <div class="clipboard relative cursor-pointer text-blue-800 font-sm border border-solid i-page__box rounded-1/2 m-r-10">
                                <span class="clipboard__message absolute w-full h-full flex items-center font-xs-bold opacity-0 transition-opacity pointer-event-none user-select-none">
                                    کپی شد
                                </span>
                                {{route('news-short-link',$content->getUuid())}}
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
            <h2 class="relative-news__title i-page__head flex items-center justify-center text-blue font-24 font-bold sm:font-lg">
                <span class="i-page__title text-center cursor-default">
                    از دست ندهید
                </span>
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
                                        <p class="relative-news__cart_title w-full text-black-300 font-xs-bold sm:font-1xs">
                                            حضرت حجت‌الاسلام والمسلمین عابدینی امام جمعه قزوین: نماز جمعه فرصت خوبی برای
                                            تبیین فرهنگ اهدای عضو است
                                        </p>
                                        <p class="relative-news__cart_link text-blue font-xs-bold text-left sm:font-1xs">
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
                                        <p class="relative-news__cart_title w-full text-black-300 font-xs-bold sm:font-1xs">
                                            حضرت حجت‌الاسلام والمسلمین عابدینی امام جمعه قزوین: نماز جمعه فرصت خوبی برای
                                            تبیین فرهنگ اهدای عضو است
                                        </p>
                                        <p class="relative-news__cart_link text-blue font-xs-bold text-left sm:font-1xs">
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
                                        <p class="relative-news__cart_title w-full text-black-300 font-xs-bold sm:font-1xs">
                                            حضرت حجت‌الاسلام والمسلمین عابدینی امام جمعه قزوین: نماز جمعه فرصت خوبی برای
                                            تبیین فرهنگ اهدای عضو است
                                        </p>
                                        <p class="relative-news__cart_link text-blue font-xs-bold text-left sm:font-1xs">
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
                                        <p class="relative-news__cart_title w-full text-black-300 font-xs-bold sm:font-1xs">
                                            حضرت حجت‌الاسلام والمسلمین عابدینی امام جمعه قزوین: نماز جمعه فرصت خوبی برای
                                            تبیین فرهنگ اهدای عضو است
                                        </p>
                                        <p class="relative-news__cart_link text-blue font-xs-bold text-left sm:font-1xs">
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
                                        <p class="relative-news__cart_title w-full text-black-300 font-xs-bold sm:font-1xs">
                                            حضرت حجت‌الاسلام والمسلمین عابدینی امام جمعه قزوین: نماز جمعه فرصت خوبی برای
                                            تبیین فرهنگ اهدای عضو است
                                        </p>
                                        <p class="relative-news__cart_link text-blue font-xs-bold text-left sm:font-1xs">
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
                                        <p class="relative-news__cart_title w-full text-black-300 font-xs-bold sm:font-1xs">
                                            حضرت حجت‌الاسلام والمسلمین عابدینی امام جمعه قزوین: نماز جمعه فرصت خوبی برای
                                            تبیین فرهنگ اهدای عضو است
                                        </p>
                                        <p class="relative-news__cart_link text-blue font-xs-bold text-left sm:font-1xs">
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
                                        <p class="relative-news__cart_title w-full text-black-300 font-xs-bold sm:font-1xs">
                                            حضرت حجت‌الاسلام والمسلمین عابدینی امام جمعه قزوین: نماز جمعه فرصت خوبی برای
                                            تبیین فرهنگ اهدای عضو است
                                        </p>
                                        <p class="relative-news__cart_link text-blue font-xs-bold text-left sm:font-1xs">
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
                                        <p class="relative-news__cart_title w-full text-black-300 font-xs-bold sm:font-1xs">
                                            حضرت حجت‌الاسلام والمسلمین عابدینی امام جمعه قزوین: نماز جمعه فرصت خوبی برای
                                            تبیین فرهنگ اهدای عضو است
                                        </p>
                                        <p class="relative-news__cart_link text-blue font-xs-bold text-left sm:font-1xs">
                                            بیشتر
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel__pagination carousel__pagination--white none sm:flex justify-center"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{secure_asset('js/site/vendors~gallery-audio~gallery-images~home~news_list~news_show.js')}}" defer></script>
    <script src="{{secure_asset('js/site/news_show.js')}}" defer></script>
@endsection