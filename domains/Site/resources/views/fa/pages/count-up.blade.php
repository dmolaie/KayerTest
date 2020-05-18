@include('fa.template.part-theme.head')
    <div class="p-count bg-green-200">
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
                <h1 class="font-lg font-bold">
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
                <p class="font-base font-bold">
                    از ابتدای برنامه
                    <span  class="text-white">
                        ۵۰,۳۰۵
                    </span>
                    نفر در کمپین شرکت کرده‌اند.
                </p>
                <div class="p-count__progressBar flex items-start justify-center sm:flex-col-reverse">
                    <div class="p-count__progressBar_item xl:w-1/6 w-1/5 text-blue-800 sm:w-full"
                         id="seconds"
                    >
                        <figure class="p-count__progressBar_icon block relative">
                            <svg viewBox="0 0 78 78" class="c-progress c-progress-10 block m-0-auto">
                                <circle cx="39" cy="39" r="30"
                                        stroke-width="18"
                                        fill="none"
                                        class="c-progress__bar"
                                />
                                <circle cx="39" cy="39" r="30"
                                        stroke-width="1.3"
                                        fill="none"
                                        class="c-progress__body"
                                />
                            </svg>
                        </figure>
                        <p class="p-count__progressBar_title font-base-bold sm:font-1xs">
                            <span class="c-progress__value l:font-24"
                            > </span>
                            ثانیه
                        </p>
                    </div>
                    <div class="p-count__progressBar_item xl:w-1/6 w-1/5 text-blue-800 sm:w-full"
                         id="minutes"
                    >
                        <figure class="p-count__progressBar_icon block relative">
                            <svg viewBox="0 0 78 78" class="c-progress c-progress-2 block m-0-auto">
                                <circle cx="39" cy="39" r="30"
                                        stroke-width="18"
                                        fill="none"
                                        class="c-progress__bar"
                                />
                                <circle cx="39" cy="39" r="30"
                                        stroke-width="1.3"
                                        fill="none"
                                        class="c-progress__body"
                                />
                            </svg>
                        </figure>
                        <p class="p-count__progressBar_title font-base-bold sm:font-1xs">
                            <span class="c-progress__value l:font-24"
                            > </span>
                            دقیقه
                        </p>
                    </div>
                    <div class="p-count__progressBar_item xl:w-1/6 w-1/5 text-blue-800 sm:w-full"
                         id="hours"
                    >
                        <figure class="p-count__progressBar_icon block relative">
                            <svg viewBox="0 0 78 78" class="c-progress c-progress-12 block m-0-auto">
                                <circle cx="39" cy="39" r="30"
                                        stroke-width="18"
                                        fill="none"
                                        class="c-progress__bar"
                                />
                                <circle cx="39" cy="39" r="30"
                                        stroke-width="1.3"
                                        fill="none"
                                        class="c-progress__body"
                                />
                            </svg>
                        </figure>
                        <p class="p-count__progressBar_title font-base-bold sm:font-1xs">
                            <span class="c-progress__value l:font-24"
                            > </span>
                            ساعت
                        </p>
                    </div>
                    <div class="p-count__progressBar_item xl:w-1/6 w-1/5 text-blue-800 sm:w-full"
                         id="days"
                    >
                        <figure class="p-count__progressBar_icon block relative">
                            <svg viewBox="0 0 78 78" class="c-progress c-progress-12 block m-0-auto">
                                <circle cx="39" cy="39" r="30"
                                        stroke-width="18"
                                        fill="none"
                                        class="c-progress__bar"
                                />
                                <circle cx="39" cy="39" r="30"
                                        stroke-width="1.3"
                                        fill="none"
                                        class="c-progress__body"
                                />
                            </svg>
                        </figure>
                        <p class="p-count__progressBar_title font-base-bold sm:font-1xs">
                            <span class="c-progress__value l:font-24"
                            > </span>
                            روز
                        </p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        const CLASS_PREFIX = 'c-progress';
        const DAYS_ELEMENT = document.getElementById('days');
        const HOURS_ELEMENT = document.getElementById('hours');
        const MINUTES_ELEMENT = document.getElementById('minutes');
        const SECONDS_ELEMENT = document.getElementById('seconds');

        const CalculateProgressValue = value => (
            (2 * Math.PI * 30) * (1 - value)
        );

        const setValueIntoElement = (element, value, text) => {
            try {
                let svgElement = element.querySelector(`.${CLASS_PREFIX}__bar`);
                svgElement.style.transitionDuration = `${ !!value ? '.7s' : 0 }`;
                svgElement.style.strokeDashoffset = CalculateProgressValue( value );
                let textElement = element.querySelector(`.${CLASS_PREFIX}__value`);
                textElement.textContent = text;
            } catch ( exception ) {}
        };

        const countUpTimer = ( start_data ) => {
            const DISTANCE = Date.now() - start_data;
            const SECONDS_PER_HOUR = 60 * 60 * 1e3;

            const DAYS    = Math.floor(DISTANCE / (SECONDS_PER_HOUR * 24));
            const HOURS   = (DISTANCE % (SECONDS_PER_HOUR * 24)) / SECONDS_PER_HOUR;
            const MINUTES = Math.floor((DISTANCE % SECONDS_PER_HOUR) / (60 * 1e3));
            const SECONDS = Math.floor((DISTANCE % (60 * 1e3)) / 1e3);

            setValueIntoElement(
                SECONDS_ELEMENT,
                SECONDS >= 59 ? 1 : (SECONDS / 60),
                SECONDS,
            );

            setValueIntoElement(
                MINUTES_ELEMENT,
                MINUTES >= 59 ? 1 : (MINUTES / 60),
                MINUTES,
            );

            setValueIntoElement(
                HOURS_ELEMENT,
                1,
                Math.floor( HOURS ),
            );

            setValueIntoElement(
                DAYS_ELEMENT,
                1,
                DAYS,
            );

            console.log('DAYS: ', DAYS);
            // console.log('MINUTES: ', MINUTES, 'SECONDS: ', SECONDS);
            // DAYS_ELEMENT.textContent    = Math.floor( DAYS );
            // HOURS_ELEMENT.textContent   = Math.floor( HOURS );
            // MINUTES_ELEMENT.textContent = MINUTES;
        };
        countUpTimer( 1388565000000 );
        setInterval(() => {
            countUpTimer( 1576909800 * 1e3 );
        }, 1e3)
    </script>