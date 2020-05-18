@include('fa.template.part-theme.head')
    <div class="p-count bg-blue">
        <header class="p-count__header bg-white">
            <a href="{{ route('index', config('app.locale')) }}" class="block">
                <img src="{{ asset('/images/ic_ehda-center.png') }}"
                     alt="انجمن اهدای عضو ایرانیان"
                     class="p-count__logo block"
                >
            </a>
        </header>
        <main class="w-full">
            <div class="container cursor-default text-center">
                <h1 class="font-base font-bold">
                    تعامل انجمن اهدای عضو ایرانیان با گروه ورزش شبکه سه سیما
                </h1>
                <div class="w-full">
                    <h2 class="p-count__head inline-flex flex-col">
                        <span class="font-20 font-bold">
                            از شروع
                            بازی پرسپولیس ایران - الهلال عربستان:
                            <span class="text-white">
                                ۱,۵۷۴
                            </span>
                        </span>
                    </h2>
                </div>
                <p class="font-sm font-bold">
                    از ابتدای برنامه
                    ۵۰,۳۰۵
                    نفر در کمپین شرکت کرده‌اند.
                </p>
                <div class="p-count__progressBar flex items-start justify-around sm:flex-col-reverse">
                    <div class="p-count__progressBar_item w-1/3 text-blue-800 sm:w-full">
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
                            <span class="l:font-24">
                                ۱۰
                            </span>
                            ثانیه
                        </p>
                    </div>
                    <div class="p-count__progressBar_item w-1/3 text-blue-800 sm:w-full">
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
                            <span class="l:font-24">
                                ۲
                            </span>
                            دقیقه
                        </p>
                    </div>
                    <div class="p-count__progressBar_item w-1/3 text-blue-800 sm:w-full">
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
                            <span class="l:font-24">
                                ۱۲
                            </span>
                            ساعت
                        </p>
                    </div>
                    <div class="p-count__progressBar_item w-1/3 text-blue-800 sm:w-full">
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
                            <span class="l:font-24">
                                ۱۲
                            </span>
                            روز
                        </p>
                    </div>
                </div>
            </div>
        </main>
    </div>