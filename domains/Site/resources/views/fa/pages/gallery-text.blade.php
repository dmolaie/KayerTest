@extends('fa.template.master')
    @section('content')
        <div class="gat-page i-page">
            <div class="container sm:p-0">
                <h1 class="i-page__head flex items-center justify-center text-blue font-24 font-bold sm:font-lg">
                    <span class="i-page__title text-center cursor-default">
                        گالری‌های متنی
                    </span>
                </h1>
                <div class="gai-page__box inner-box inner-box--white p-0 text-right">
                    <div class="gai-page__header text-white font-24 font-bold bg-blue rounded-inherit rounded-br-none rounded-bl-none text-center cursor-default sm:font-lg">
                        {{$mediaDetail->getFirstTitle()}}
                    </div>
                    <div class="gat-page__content">
                        <div class="userContent text-bayoux font-base cursor-default md:font-base text-justify">
                            {!! html_entity_decode($mediaDetail->getDescription(), ENT_QUOTES, 'UTF-8') !!}
                        </div>
                        <div class="flex flex-wrap items-start justify-center m-t-30">
                            @foreach($mediaDetail->getContentFiles() as $mediaInfo)
                                <a href="" target="_blank" download=""
                                   class="gat-page__download flex items-center justify-center text-blue-200 font-base font-bold rounded cursor-pointer l:transition-background sm:w-full"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="-53 1 511 511.99906"
                                         class="block object-contain"
                                    >
                                        <path d="M 276.410156 3.957031 C 274.0625 1.484375 270.84375 0 267.507812 0 L 67.777344 0 C 30.921875 0 0.5 30.300781 0.5 67.152344 L 0.5 444.84375 C 0.5 481.699219 30.921875 512 67.777344 512 L 338.863281 512 C 375.71875 512 406.140625 481.699219 406.140625 444.84375 L 406.140625 144.941406 C 406.140625 141.726562 404.65625 138.636719 402.554688 136.285156 Z M 279.996094 43.65625 L 364.464844 132.328125 L 309.554688 132.328125 C 293.230469 132.328125 279.996094 119.21875 279.996094 102.894531 Z M 338.863281 487.265625 L 67.777344 487.265625 C 44.652344 487.265625 25.234375 468.097656 25.234375 444.84375 L 25.234375 67.152344 C 25.234375 44.027344 44.527344 24.734375 67.777344 24.734375 L 255.261719 24.734375 L 255.261719 102.894531 C 255.261719 132.945312 279.503906 157.0625 309.554688 157.0625 L 381.40625 157.0625 L 381.40625 444.84375 C 381.40625 468.097656 362.113281 487.265625 338.863281 487.265625 Z M 338.863281 487.265625"/>
                                        <path d="M 305.101562 401.933594 L 101.539062 401.933594 C 94.738281 401.933594 89.171875 407.496094 89.171875 414.300781 C 89.171875 421.101562 94.738281 426.667969 101.539062 426.667969 L 305.226562 426.667969 C 312.027344 426.667969 317.59375 421.101562 317.59375 414.300781 C 317.59375 407.496094 312.027344 401.933594 305.101562 401.933594 Z M 305.101562 401.933594 "/>
                                        <path d="M 194.292969 357.535156 C 196.644531 360.007812 199.859375 361.492188 203.320312 361.492188 C 206.785156 361.492188 210 360.007812 212.347656 357.535156 L 284.820312 279.746094 C 289.519531 274.796875 289.148438 266.882812 284.203125 262.308594 C 279.253906 257.609375 271.339844 257.976562 266.765625 262.925781 L 215.6875 317.710938 L 215.6875 182.664062 C 215.6875 175.859375 210.121094 170.296875 203.320312 170.296875 C 196.519531 170.296875 190.953125 175.859375 190.953125 182.664062 L 190.953125 317.710938 L 140 262.925781 C 135.300781 257.980469 127.507812 257.609375 122.5625 262.308594 C 117.617188 267.007812 117.246094 274.800781 121.945312 279.746094 Z M 194.292969 357.535156 "/>
                                    </svg>
                                    دانلود فایل
                                </a>

                            @endforeach
                        </div>
                        <div class="gat-page__short i-page__short w-full flex items-center justify-end sm:flex-col sm:justify-center">
                            <span class="text-bayoux font-sm-bold cursor-default">
                                لینک کوتاه:
                            </span>
                            <div class="clipboard relative cursor-pointer text-blue-800 font-sm border border-solid i-page__box rounded-1/2 m-r-10">
                            <span class="clipboard__message absolute w-full h-full flex items-center font-xs-bold opacity-0 transition-opacity pointer-event-none user-select-none">
                                کپی شد
                            </span>
                                {{route('text-short-link',$mediaDetail->getUuid())}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection