@extends('fa.template.master')
@section('title', ' | رویدادها')
@section('content')
    <div class="i-page n-list-page">
        <div class="n-list__header block w-full bg-blue-100">
            <div class="container flex items-center">
                <div class="block flex-1">
                    <div class="n-list__header_title flex items-center">
                        <h4 class="font-30 font-bold text-white text-nowrap line-height-1 cursor-default md:font-22">
                            رویداد
                        </h4>
                        <span class="flower_line relative flex items-end justify-end block w-full"></span>
                    </div>
                    <p class="n-list__header_sub-title text-white font-20 font-bold cursor-default md:font-base">
                        {{$events ? current(current($events)->getCategory())['name_fa'] : ''}}
                    </p>
                </div>
                <figure class="n-list__header_cover flex-shrink-0">
                    <img src="{{ secure_asset('/images/img__events-cover.png') }}"
                         alt="رویداد"
                         class="block w-full h-full object-contain"
                    />
                </figure>
            </div>
        </div>
        <div class="block w-full">
            <div class="block w-full overflow-hidden">
                <div class="carousel__container bg-sky-blue">
                    <div class="swiper-wrapper">
                        @foreach($events as $item)
                            <div class="swiper-slide">
                                <a href="{{route('archive.showDetailEvents',[config('app.locale'),$item->getSlug()])}}"
                                   class="s-cart block w-full h-full bg-white">
                                    <figure class="s-cart__cover relative block w-full has-skeleton">
                                        <img src=""
                                             data-src="/{{$item->getAttachmentFiles() ? current($item->getAttachmentFiles())['path'] : ''}}"
                                             alt=""
                                             class="s-cart__cover_image block w-full h-full object-cover"
                                        />
                                        <figcaption
                                                class="s-cart__caption absolute w-full flex flex-col justify-between text-white font-bold z-2">
                                            <span class="s-cart__caption_text block w-full font-1xs text-right">
                                                {!! html_entity_decode($item->getTitle(), ENT_QUOTES, 'UTF-8') !!}
                                            </span>
                                            <time class="block w-full font-2xs text-left">
                                                انتشار: {{\Morilog\Jalali\Jalalian::forge(Carbon\Carbon::parse($item->getPublishDate()))->format(' %d %B %Y')}}
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
        <div class="container md:p-0">
            <div class="inner-box inner-box--blue flex items-start text-right md:flex-col">
                <aside class="n-list__aside md:w-full">
                    <div class="i-page__panel block w-full bg-white border border-solid rounded">
                        <div class="i-page__panel_header w-full md:border-0">
                            <label class="i-page__panel_label flex items-center w-full border border-solid rounded">
                                <input type="text"
                                       class="i-page__panel_input w-full bg-transparent text-blue-100"
                                       placeholder="جستجو در رویدادها"
                                       autocomplete="off"
                                />
                            </label>
                        </div>
                        <div class="i-page__panel_body md:none">
                            <p class="text-blue-800 font-sm-bold m-b-10 cursor-default">
                                دسته بندی ایونت
                            </p>
                            @foreach($categories as $category)
                                <label class="checkbox-square relative flex items-center cursor-pointer font-xs-bold"
                                       style="margin-right: {{$category['gap']}}px"
                                >
                                    <input type="radio"
                                           class="checkbox-square__input"
                                           name="news"
                                    />
                                    <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"></span>
                                    <span class="checkbox-square__label rounded user-select-none">
                                         {{ $category['name_fa'] }}
                                    </span>
                                </label>
                            @endforeach
                            {{-- <button class="i-page__panel_button relative text-blue-800 font-xs-bold">
                                بیشتر...
                            </button> --}}
                        </div>
                    </div>
                </aside>
                <div class="w-full">
                    @foreach($events as $item)
                        <a href="{{route('archive.showDetailEvents',[config('app.locale'),$item->getSlug()])}}"
                           class="h-cart relative block w-full flex border border-solid rounded bg-white has-shadow md:flex-col">
                            <figure class=" h-cart__cover flex-shrink-0 rounded-inherit rounded-tl-none rounded-bl-none has-skeleton">
                                <img src=""
                                     data-src="/{{$item->getAttachmentFiles() ? current($item->getAttachmentFiles())['path'] : ''}}"
                                     alt=""
                                     class="h-cart__cover_image block w-full h-full rounded-inherit object-cover"/>
                            </figure>
                            <div class="h-cart__details flex-1">
                                <p class="h-cart__title font-sm-bold">
                                    {!! html_entity_decode($item->getTitle(), ENT_QUOTES, 'UTF-8') !!}
                                </p>
                                <time class="h-cart__release block w-full font-1xs font-bold text-left">
                                    انتشار: {{\Morilog\Jalali\Jalalian::forge(Carbon\Carbon::parse($item->getPublishDate()))->format(' %d %B %Y')}}
                                </time>
                                <p class="h-cart__caption text-blue-800 font-xs text-justify">
                                    {!! html_entity_decode($item->getAbstract(), ENT_QUOTES, 'UTF-8') !!}
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
    <script src="{{secure_asset('js/site/vendors~gallery-audio~gallery-images~home~news_list~news_show.js')}}" defer></script>
    <script src="{{secure_asset('js/site/news_list.js')}}" defer></script>
@endsection
