@extends('fa.template.master')
    @php
        function getVideoUUIDFromPatch( $item ) {
            if ( !$item ) return '';
            $url = parse_url($item['link']);;
            return str_replace('/v/', '', $url['path']);
        }
    @endphp
    @section('content')
        <div class="gao-page i-page">
            <div class="container sm:p-0">
                <h1 class="i-page__head flex items-center justify-center text-blue font-24 font-bold sm:font-lg">
                    <span class="i-page__title text-center cursor-default">
                        گالری‌های ویدیویی
                    </span>
                </h1>
                <div class="gao-page__inner-box inner-box flex items-stretch p-0 md:flex-col">
                    <div class="flex-1">
                        <div class="inner-box inner-box--white p-0 m-t-0 text-right overflow-hidden">
                            <div id="video_player">
                                <img src="{{ secure_asset('/images/video-placeholder.png') }}"
                                     alt="video-placeholder"
                                     class="w-full block"
                                >
                            </div>
                            <div class="gao-page__content cursor-default">
                                <h2 class="i-page__sub-title text-blue font-24 font-bold cursor-default m-b-26 sm:font-sm">
                                    {{ $mediaDetail->getFirstTitle() }}
                                </h2>
                                <p class="gao-page__description text-blue-800 font-base font-medium sm:font-sm">
                                    {{ $mediaDetail->getDescription() }}
                                </p>
                                <div class="flex items-center md:flex-col">
                                    <div class="i-page__short inline-flex items-center l:m-r-auto md:m-b-20 sm:flex-col">
                                        <span class="text-bayoux font-sm-bold cursor-default">
                                            لینک کوتاه:
                                        </span>
                                        <div class="clipboard relative cursor-pointer text-blue-800 font-sm border border-solid i-page__box rounded-1/2 m-r-10">
                                            <span class="clipboard__message absolute w-full h-full flex items-center font-xs-bold opacity-0 transition-opacity pointer-event-none user-select-none">
                                                کپی شد
                                            </span>
                                            {{route('video-short-link',$mediaDetail->getUuid())}}
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
                    @if(count($mediaDetail->getContentFiles()) > 1)
                        <div class="gao-page__aside xxl:w-1/5 xl:w-1/4 w-1/3 md:w-full">
                            <div class="relative inner-box inner-box--white h-full p-0 m-t-0 overflow-auto">
                                <div class="episodes absolute w-full">
                                    @foreach($mediaDetail->getContentFiles() as $index=>$nestedMedia)
                                        <div class="episode relative flex items-center cursor-pointer bg-white l:transition-background {{ !$index ? 'episode--active' : '' }}"
                                         data-id="{{ getVideoUUIDFromPatch( $nestedMedia ) }}"
                                        >
                                            <figure class="episode__cover relative flex-shrink-0 rounded-1/2 has-skeleton pointer-event-none">
                                                <img src=""
                                                     data-src="{{ $nestedMedia['path'] }}"
                                                     alt="{{$mediaDetail->getFirstTitle()}}"
                                                     class="episode__image block absolute w-full h-full rounded-inherit object-cover"
                                                >
                                            </figure>
                                            <span class="episode__caption text-blue-800 text-blue-800 font-sm font-medium pointer-event-none">
                                                {{ $nestedMedia['title'] ? $nestedMedia['title'] : $mediaDetail->getFirstTitle() }}
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script type="text/JavaScript" id="aparat_script"
                src="https://www.aparat.com/embed/{{ getVideoUUIDFromPatch($mediaDetail->getContentFiles()[0]) }}?data[rnddiv]=video_player&data[responsive]=yes">
        </script>
        <script src="{{ secure_asset('js/site/gallery-video.js') }}" defer></script>
    @endsection