@extends('fa.template.master')
@section('content')
    <div class="vol-page dnt-page i-page">
        <div class="container">
            <h1 class="i-page__head flex items-center justify-center text-blue font-24 font-bold">
                    <span class="i-page__title text-center cursor-default">
                        سفیران اهدای عضو
                    </span>
            </h1>
            <div class="p-t-35 w-full flex items-start">
                @if(!auth()->check() && !in_array(config('role.roles.legate.name'),auth()->user()->roles->pluck('name')->toArray()))
                    <aside class="w-1/3 xl:w-1/4 flex-shrink-0 m-end-30">
                        <div class="dnt-page__panel border border-solid rounded-2">
                            <div class="dnt-page__panel_header bg-blue-100 font-lg font-bold text-white rounded-inherit rounded-bl-none rounded-br-none text-center cursor-default">
                                اطلاعات فردی
                            </div>
                            <form method="post"
                                  class="vol-page__from dnt-page__from dnt-page__panel_body bg-white rounded-inherit rounded-tr-none rounded-tl-none"
                            >
                                <p class="text-blue font-base font-bold m-b-4 cursor-default">
                                    اطلاعات فردی
                                </p>
                                <div class="dnt-page__input w-full block">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold">
                                        نام
                                    </span>
                                    <label class="dnt-page__name w-full block">
                                        <input type="text"
                                               placeholder="حروف فارسی"
                                               class="input input--blue block w-full border border-solid rounded"
                                               autocomplete="off" required="required"
                                               name="name"
                                               value=""
                                        />
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </label>
                                </div>
                                <div class="dnt-page__input w-full block">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold">
                                        نام خانوادگی
                                    </span>
                                    <label class="dnt-page__full-name w-full block">
                                        <input type="text"
                                               placeholder="حروف فارسی"
                                               class="input input--blue block w-full border border-solid rounded"
                                               autocomplete="off" required="required"
                                               name="last_name"
                                        />
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </label>
                                </div>
                                <label class="dnt-page__input w-full block">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold">
                                        کد ملی
                                    </span>
                                    <label class="dnt-page__national-code w-full block">
                                        <input type="text"
                                               placeholder="۱۰ رقم بدون خط تیره"
                                               class="input input--blue block w-full border border-solid rounded direction-ltr"
                                               autocomplete="off" required="required"
                                               name="national_code"
                                        />
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </label>
                                </label>
                                <div class="dnt-page__input w-full block">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold">
                                        تلفن همراه
                                    </span>
                                    <label class="dnt-page__phone w-full block">
                                        <input type="text"
                                               placeholder="تلفن همراه ۱۱ رقمی خود را وارد نمایید"
                                               class="input input--blue block w-full border border-solid rounded direction-ltr"
                                               autocomplete="off" required="required"
                                               name="mobile"
                                        />
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </label>
                                </div>
                                <div class="dnt-page__input w-full block">
                                    <span class="dnt-page__label block w-full text-bayoux text-required font-sm-bold">
                                        ایمیل
                                    </span>
                                    <label class="dnt-page__email w-full block">
                                        <input type="text"
                                               placeholder="حروف انگلیسی"
                                               class="input input--blue block w-full border border-solid rounded direction-ltr"
                                               autocomplete="off" required="required"
                                               name="email"
                                        />
                                        <span class="error-message absolute w-full text-red font-sm-bold pointer-event-none"></span>
                                    </label>
                                </div>
                                <p class="vol-page__res none text-red flex flex-wrap font-sm font-bold cursor-default m-t-8"
                                ></p>
                                <button class="dnt-page__btn dnt-page__btn--submit block w-full text-white font-lg font-bold bg-green border-green-200-2 rounded l:transition-bg l:hover:bg-green-200">
                                    ارسال اطلاعات
                                </button>
                            </form>
                        </div>
                    </aside>
                @elseif(auth()->check() && in_array(config('role.roles.legate.name'),auth()->user()->roles->pluck('name')->toArray()))
                    <aside class="w-1/3 xl:w-1/4 flex-shrink-0 m-end-30">
                        <div class="dnt-page__panel border border-solid rounded-2">
                            <p>شما پروفایل دارید و هم‌اکنون سفیر اهدای عضو هستید.</p>
                            <a href="{{route('admin.login',config('app.locale'))}}"
                               class="dnt-page__btn dnt-page__btn--submit block w-1/2 text-white font-lg font-bold bg-blue border-blue-200-2 rounded l:transition-bg l:hover:bg-blue-200">
                                ورود به بخش سفیران اهدا عضو
                            </a>
                        </div>
                    </aside>
                @elseif(auth()->check() && !in_array(config('role.roles.legate.name'),auth()->user()->roles->pluck('name')->toArray()))
                    <aside class="w-1/3 xl:w-1/4 flex-shrink-0 m-end-30">
                        <div class="dnt-page__panel border border-solid rounded-2">
                            <p>شما پروفایل دارید و برای ثبت نام در بخش سفیران به پروفایل خود مراجعه کنید.</p>
                            <a href="#"
                               class="dnt-page__btn dnt-page__btn--submit block w-1/2 text-white font-lg font-bold bg-blue border-blue-200-2 rounded l:transition-bg l:hover:bg-blue-200">
                                ورود به بخش ثبت نام سفیران اهدا عضو
                            </a>
                        </div>
                    </aside>
                @endif
                <div class="flex-1">
                    <div class="dnt-page__box inner-box inner-box--white">
                        <h2 class="i-page__sub-title text-blue-800 font-24 font-bold cursor-default m-b-20">
                            طرح سفیران اهدای عضو
                        </h2>
                        <div class="dnt-page__caption text-bayoux cursor-default font-base">
                            <p>
                                یکی از مهمترین ارکان فرهنگ‌سازی اهدای عضو در تمام نقاط دنیا، نیروهای داوطلب مردمی
                                می‌باشند که با هر شغل و سمتی که دارند بخشی از اوقات فراغت خود را با همراهی با انجمن وقف
                                ارتقای فرهنگ مقدس و معنوی اهدای عضو می‌نمایند.
                            </p>
                            <p>
                                طرح سفیران اهدای عضو نیز نخستین بار در ایران در سال ۱۳۸۴ توسط سرکار خانم دکتر نجفی‌زاده
                                و جناب آقای دکتر مسعود شیعه‌مرتضی برنامه‌ریزی و اجرا شده و در سال‌های بعد توسط جناب آقای
                                دکتر قبادی طی چند مرحله ارتقا داده شد.
                            </p>
                            <p class=" w-full relative">
                                    <span class="w-full block font-bold m-t-15">
                                        اهم فعالیت سفیران اهدای عضو، در زمینه های زیر است:
                                    </span>
                            </p>
                            <ul class="i-page__list w-full">
                                <li class="i-page__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                    فعالیت درغرفه‌های اهدای عضو
                                </li>
                                <li class="i-page__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                    کمک به برگزاری همایش‌ها، نمایشگاه‌ها، مراسم و...
                                </li>
                                <li class="i-page__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                    تولید آثار نمایشی (سینما، تئاتر، انیمیشن، موسیقی، ساخت تیزر، نماهنگ، مستند، فیلم
                                    کوتاه، فیلم بلند و... )
                                </li>
                                <li class="i-page__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                    کمک در واحد سمعی و بصری و روابط عمومی
                                </li>
                                <li class="i-page__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                    یراد سخنرانی در مجامع عمومی
                                </li>
                                <li class="i-page__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                    فعالیت‌های مرتبط با آموزش
                                </li>
                                <li class="i-page__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                    فعالیت‌های مرتبط با پژوهش و آمار
                                </li>
                                <li class="i-page__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                    فعالیت‌های ادبی ( شعر، داستان، جمله کوتاه و... )
                                </li>
                                <li class="i-page__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                    فعالیت‌های مرتبط با زبان انگلیسی ( ترجمه ، ترجمه همزمان، زبان شناسی و... )
                                </li>
                                <li class="i-page__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                    فعالیت‌های انفورماتیک و رایانه‌ای
                                </li>
                                <li class="i-page__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                    فعالیت‌های اجرایی
                                </li>
                                <li class="i-page__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                    امور بین‌الملل (کمک به برگزاری همایش‌ها، کنگره‌ها و... در سایر کشورها، تعاملات
                                    فرهنگی، آموزشی، پژوهشی و ...)
                                </li>
                            </ul>
                            <figure class="relative block w-full">
                                <img src="{{ asset('/images/image/1525859074_VE4BGhL0yGFOFbpiIuNmmRldpD0AXp_original.jpg') }}"
                                     alt="انجمن اهدای عضو ایرانیان"
                                     class="block max-w-full rounded"
                                />
                            </figure>
                            <p>
                                <br>
                                فعالیت سفیران اهدای عضو در کنار پزشکان و متخصصین این رشته، موجب گردیده آمار رضایت به
                                اهدای عضو در طول ۱۰ سال، از ۵ درصد به ۷۰ درصد ارتقا یابد.
                            </p>
                            <p class="font-bold m-t-8">
                                در حال حاضر افرادی که تمایل به فعالیت در طرح سفیران دارند باید مراحل ذیل را بگذرانند:
                            </p>
                            <p>
                                پس از تکمیل و ارسال اطلاعات در اولین جلسه توجیهی سفیران که معمولاً هر ۳ ماه برگزار
                                می‌گردد از فرد داوطلب درخواست می‌گردد تا در جلسه توجیهی حضوری که برای سفیران اهدای عضو
                                تشکیل می‌شود حضور به هم رسانند. در این جلسه سفیران با اهدای عضو و ابعاد آن و انجمن اهدای
                                عضو ایرانیان و فعالیت‌های آن بیشتر آشنا شده و پس از آشنایی زمینه همکاری خود را مشخص‌تر
                                می‌نمایند.
                            </p>
                            <ul class="i-page__list w-full">
                                <li class="i-page__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                    ورود به قسمت "سفیران" از بخش "خواستن" در سامانه
                                    <a href="/"
                                       class="text-blue-100 font-sm font-bold l:transition-color l:hover:color-blue-200 p-0-5"
                                    >
                                        www.ehda.center
                                    </a>
                                </li>
                                <li class="i-page__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                    ورود اطلاعات اولیه
                                </li>
                                <li class="i-page__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                    مطالعه کتابچه آموزشی
                                </li>
                                <li class="i-page__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                    تکمیل فرم ثبت نام
                                </li>
                                <li class="i-page__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                    تعیین گستره فعالیت‌های مورد نظر بر اساس قابلیت‌ها و زمانی را که می‌توانند به این
                                    فعالیت اختصاص دهند.
                                </li>
                            </ul>
                            <p class="relative font-bold m-b-8">
                                از جمله فعالیت‌های سفیران می‌توان از عضویت در گروه سفیران سخنران نام برد که در این مورد
                                بیشتر توضیح داده خواهد شد:
                            </p>
                            <p>
                                در این گروه سفیرانی که مایل به ایراد سخنرانی در زمینه اهدای عضو در سازمان‌ها، نهادها و
                                مجامع مختلف هستند داوطلب شده و در صورتی که در مصاحبه ورودی که توسط استاد شاهین فرهنگ
                                روانشناس و سخنران به نام کشور و مسئول پروژه سفیران سخنران انجمن صورت می‌گیرد پذیرفته
                                شوند در گروه سفیران سخنران توسط ایشان و مدیران انجمن تحت آموزش قرار گرفته و بر حسب
                                امتیاز کسب شده در پایان دوره در مجامع متناسب تحت نظر متخصصین انجمن سخنرانی خواهند داشت.
                                <br>
                                لازم به ذکر است تعداد بسیار زیادی از هنرمندان و ورزشکاران به نام کشور نیز سفیر اهدای عضو
                                می‌باشند و به صورت‌های مختلف برای ارتقای فرهنگ مقدس اهدای عضو در جامعه با انجمن همراهی
                                می‌کنند.
                            </p>
                            <figure class="vol-page__cover relative block w-full rounded has-skeleton">
                                <img src=""
                                     data-src="{{ asset('/images/image/1538917229_0WYrM8AxrBpAxYU0erl9gAOQFytAHH_original.jpg') }}"
                                     alt="انجمن اهدای عضو ایرانیان"
                                     class="block w-full h-full rounded-inherit object-cover"
                                />
                            </figure>
                            <figure class="vol-page__cover relative block w-full rounded has-skeleton">
                                <img src=""
                                     data-src="{{ asset('/images/image/1538917218_lqGCrXfNcXAuhg7ekYoH2P4MJvGfvn_original.jpg') }}"
                                     alt="انجمن اهدای عضو ایرانیان"
                                     class="block w-full h-full rounded-inherit object-cover"
                                />
                            </figure>
                            <figure class="vol-page__cover relative block w-full rounded has-skeleton">
                                <img src=""
                                     data-src="{{ asset('/images/image/1538916742_loMd8Ksgy9nYZQcMZ5AocNzpsBLC7S_original.jpg') }}"
                                     alt="انجمن اهدای عضو ایرانیان"
                                     class="block w-full h-full rounded-inherit object-cover"
                                />
                            </figure>
                            <figure class="vol-page__cover relative block w-full rounded has-skeleton">
                                <img src=""
                                     data-src="{{ asset('/images/image/1538917344_Vx7a43YGHKMJI24GB3oqLTh5C9fd12_original.jpg') }}"
                                     alt="انجمن اهدای عضو ایرانیان"
                                     class="block w-full h-full rounded-inherit object-cover"
                                />
                            </figure>
                            <figure class="vol-page__cover relative block w-full rounded has-skeleton">
                                <img src=""
                                     data-src="{{ asset('/images/image/1539005175_KM4hwZrmuuOCToXbVo89hf0RxIRryF_original.jpg') }}"
                                     alt="انجمن اهدای عضو ایرانیان"
                                     class="block w-full h-full rounded-inherit object-cover"
                                />
                            </figure>
                            <figure class="vol-page__cover relative block w-full rounded has-skeleton">
                                <img src=""
                                     data-src="{{ asset('/images/image/1539005175_ehMQEBzQAzU4Dt9sZmOAHYKIOFw8Uk_original.jpg') }}"
                                     alt="انجمن اهدای عضو ایرانیان"
                                     class="block w-full h-full rounded-inherit object-cover"
                                />
                            </figure>
                            <figure class="vol-page__cover relative block w-full rounded has-skeleton">
                                <img src=""
                                     data-src="{{ asset('/images/image/1539005124_qpADNEDWfUuCd6aPREc4WP5O0ZfGP0_original.jpg') }}"
                                     alt="انجمن اهدای عضو ایرانیان"
                                     class="block w-full h-full rounded-inherit object-cover"
                                />
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/site/vendors~donation-card~edit-profile~volunteers~volunteers-final.js')}}" defer></script>
    <script src="{{asset('js/site/donation-card~edit-profile~volunteers~volunteers-final.js')}}" defer></script>
    <script src="{{asset('js/site/volunteers.js')}}" defer></script>
@endsection