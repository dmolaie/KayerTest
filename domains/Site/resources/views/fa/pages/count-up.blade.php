@include('fa.template.part-theme.head')
    <div class="p-count bg-green-200">
        <header class="p-count__header bg-white">
            <a href="{{ route('index', config('app.locale')) }}" class="block">
                <img src="{{ secure_asset('/images/ic_ehda-center.png') }}"
                     alt="انجمن اهدای عضو ایرانیان"
                     class="p-count__logo block"
                >
            </a>
        </header>
        <main class="p-count__main w-full h-full">
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
            <div class="p-count__social fixed flex flex-col">
                <a href="https://www.instagram.com/ehdacenter.ir"
                   class="p-count__media"
                >
                    <svg viewBox="0 0 24 24" class="p-count__icon block"
                    >
                        <linearGradient id="SVGID_1_" gradientTransform="matrix(0 -1.982 -1.844 0 -132.522 -51.077)" gradientUnits="userSpaceOnUse" x1="-37.106" x2="-26.555" y1="-72.705" y2="-84.047">
                            <stop offset="0" stop-color="#fd5"/>
                            <stop offset=".5" stop-color="#ff543e"/>
                            <stop offset="1" stop-color="#c837ab"/>
                        </linearGradient>
                        <path d="m1.5 1.633c-1.886 1.959-1.5 4.04-1.5 10.362 0 5.25-.916 10.513 3.878 11.752 1.497.385 14.761.385 16.256-.002 1.996-.515 3.62-2.134 3.842-4.957.031-.394.031-13.185-.001-13.587-.236-3.007-2.087-4.74-4.526-5.091-.559-.081-.671-.105-3.539-.11-10.173.005-12.403-.448-14.41 1.633z" fill="url(#SVGID_1_)"/>
                        <path d="m11.998 3.139c-3.631 0-7.079-.323-8.396 3.057-.544 1.396-.465 3.209-.465 5.805 0 2.278-.073 4.419.465 5.804 1.314 3.382 4.79 3.058 8.394 3.058 3.477 0 7.062.362 8.395-3.058.545-1.41.465-3.196.465-5.804 0-3.462.191-5.697-1.488-7.375-1.7-1.7-3.999-1.487-7.374-1.487zm-.794 1.597c7.574-.012 8.538-.854 8.006 10.843-.189 4.137-3.339 3.683-7.211 3.683-7.06 0-7.263-.202-7.263-7.265 0-7.145.56-7.257 6.468-7.263zm5.524 1.471c-.587 0-1.063.476-1.063 1.063s.476 1.063 1.063 1.063 1.063-.476 1.063-1.063-.476-1.063-1.063-1.063zm-4.73 1.243c-2.513 0-4.55 2.038-4.55 4.551s2.037 4.55 4.55 4.55 4.549-2.037 4.549-4.55-2.036-4.551-4.549-4.551zm0 1.597c3.905 0 3.91 5.908 0 5.908-3.904 0-3.91-5.908 0-5.908z" fill="#fff"/>
                    </svg>
                </a>
                <a href="https://t.me/ehdacenter_ir"
                   class="p-count__media"
                >
                    <svg viewBox="0 0 24 24" class="p-count__icon block"
                    >
                        <path fill="#1c93d1" d="m12 24c6.629 0 12-5.371 12-12s-5.371-12-12-12-12 5.371-12 12 5.371 12 12 12zm-6.509-12.26 11.57-4.461c.537-.194 1.006.131.832.943l.001-.001-1.97 9.281c-.146.658-.537.818-1.084.508l-3-2.211-1.447 1.394c-.16.16-.295.295-.605.295l.213-3.053 5.56-5.023c.242-.213-.054-.333-.373-.121l-6.871 4.326-2.962-.924c-.643-.204-.657-.643.136-.953z"></path>
                    </svg>
                </a>
                <a href="https://twitter.com/ehdacenter_ir"
                   class="p-count__media"
                >
                    <svg viewBox="0 0 30 30" class="p-count__icon block"
                    >
                        <path fill="#2baae1" d="M15 0c8.284 0 15 6.716 15 15 0 8.284-6.716 15-15 15-8.284 0-15-6.716-15-15C0 6.716 6.716 0 15 0zm1.924 10.393c-1.29.477-2.106 1.706-2.013 3.051l.031.519-.516-.064c-1.878-.243-3.519-1.07-4.912-2.457l-.681-.689-.176.509c-.371 1.133-.134 2.33.64 3.135.413.445.32.509-.392.244-.248-.085-.464-.148-.485-.117-.072.075.175 1.038.371 1.42.269.53.816 1.048 1.414 1.356l.506.243-.599.01c-.577 0-.598.011-.536.234.206.688 1.021 1.42 1.93 1.737l.64.223-.558.339a5.738 5.738 0 0 1-2.766.783c-.464.01-.846.053-.846.085 0 .106 1.26.7 1.992.932 2.198.689 4.81.392 6.77-.784 1.393-.836 2.786-2.5 3.437-4.11.35-.858.701-2.425.701-3.177 0-.488.031-.551.61-1.134.34-.339.66-.71.722-.815.103-.202.093-.202-.434-.021-.877.317-1 .275-.567-.202.32-.339.701-.953.701-1.133 0-.032-.154.021-.33.116-.186.106-.598.265-.908.36l-.557.18-.506-.349c-.279-.19-.67-.402-.877-.466-.527-.148-1.332-.127-1.806.042z"></path>
                    </svg>
                </a>
                <a href="https://www.aparat.com/ehda"
                   class="p-count__media"
                >
                    <svg viewBox="0 0 838.49 830.34" class="p-count__icon block"
                    >
                        <path fill="#ee475b" d="M782.64,415.15c0,162.93-111.56,306.79-269.86,348A375.5,375.5,0,0,1,388.55,774c-156.4-12-290-127.41-324.19-279.84C22,305,137.64,116.09,325.7,67.19c131.2-34.12,267.89,5,360.32,103.73,48.54,51.86,79.31,113,91.06,183.16,3.37,20.13,4.6,40.62,6.81,60.94Zm-520,8.61c-55.66-.76-102.42,44.77-103.82,100C157.45,577,199.13,627.75,261,629c56.5,1.15,104.28-44.62,105.15-99.83C367,470.8,321.63,424.56,262.63,423.76Zm313-17.18c55.94.7,103-45,103.67-100.54a103.13,103.13,0,0,0-102-104.81c-56.46-.88-104.52,45-105.13,100.45C471.46,359.83,516.86,405.84,575.62,406.58ZM523,678.6c57.48-.1,103.61-45.94,103.44-102.8S579.93,473.22,522.58,473.23c-56.81,0-103.48,46.6-103.43,103.24C419.19,632.67,466,678.69,523,678.6ZM315.3,151.73c-57.42,0-103.56,45.8-103.51,102.74.05,56.71,46.47,102.61,103.8,102.63,56.82,0,103.46-46.46,103.51-103.17C419.15,197.82,372.34,151.73,315.3,151.73ZM417,463.21c25.37,0,46-20.28,46.1-45.27a45.87,45.87,0,0,0-45.62-45.8c-25.54-.09-46.4,20.38-46.41,45.57C371.09,442.69,391.78,463.18,417,463.21Z"></path>
                        <path fill="#1e1b1c" d="M658.87,102.78c15.51,4.06,29.63,7.59,43.65,11.47,18.69,5.17,38,8.92,55.83,16.29,44.28,18.32,70.23,52.38,78.49,99.48a116.28,116.28,0,0,1-2.62,50.47c-7.51,28-14.94,56.08-22.91,84.27C795.37,257.65,744.56,170.88,658.87,102.78Z"></path>
                        <path fill="#1e1b1c" d="M475.22,805c106.35-17.49,192-68.14,258.61-152.25a8.22,8.22,0,0,1,.15,2.08c-7.63,28.34-14.1,57.06-23.2,84.92-16,48.89-50.4,78.06-100.68,88.43-24.1,5-47.5.84-70.78-5.85-20.23-5.81-40.71-10.79-61.07-16.15C477.55,806,476.88,805.63,475.22,805Z"></path>
                        <path fill="#1e1b1c" d="M360.06,24.32Q207.53,48.76,106.92,166.08c1.06-4.09,2.08-8.19,3.2-12.26,6.34-23,11.11-46.62,19.37-68.93,17-45.89,50.9-73,98.78-82.74,23.43-4.74,46.23-1,68.89,5.32C316.79,13,336.58,18,356.29,23.18,357.56,23.52,358.8,23.94,360.06,24.32Z"></path>
                        <path fill="#1e1b1c" d="M169.29,724.92q-26.13-6.87-52.26-13.75c-17-4.47-34.27-8.16-49.77-17C29.4,672.52,7.13,640.28,1,597c-3-21.42,1.06-42,7-62.41,5.1-17.68,9.53-35.56,14.27-53.35a22.64,22.64,0,0,1,1.22-2.64C41.53,579.35,90.68,660.76,169.29,724.92Z"></path>
                    </svg>
                </a>
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

        const countUpTimer2 = start_date => {
            const CURRENT_DATE = new Date().getTime();
            const START_DATE = new Date(start_date * 1e3);
            var distance = CURRENT_DATE - START_DATE.getTime();

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        };

        const countUpTimer = ( start_data ) => {
            const DISTANCE = Date.now() - start_data;
            const SECONDS_PER_HOUR = 60 * 60 * 1e3;

            console.log(new Date(start_data).getHours(), (new Date(Date.now())).getHours());

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
            console.log(HOURS, 'HOURS');
            setValueIntoElement(
                HOURS_ELEMENT,
                parseInt((HOURS).toFixed(2).split('.')[1]) / 100,
                HOURS > 1 ? Math.ceil( HOURS ) : Math.floor( HOURS ),
            );

            setValueIntoElement(
                DAYS_ELEMENT,
                ((HOURS * 1e2) / 24) / 1e2,
                DAYS,
            );

            // console.log('MINUTES: ', MINUTES, 'SECONDS: ', SECONDS);
            // DAYS_ELEMENT.textContent    = Math.floor( DAYS );
            // HOURS_ELEMENT.textContent   = Math.floor( HOURS );
            // MINUTES_ELEMENT.textContent = MINUTES;
        };
        // let start = 1576477800 * 1000;
        let start = Date.now();
        countUpTimer( start );
        setInterval(() => {
            countUpTimer( start );
        }, 1e3)
    </script>