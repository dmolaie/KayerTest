<header class="header bg-white">
    <div class="container">
        <div class="header__brand flex items-center justify-between">
            <a href="/"
               class="header__logo block m-l-auto"
            >
                <img src="/images/ic_ehda-center.png"
                     alt="انجمن اهدای عضو ایرانیان"
                     class="header__logo_image block object-contain"
                />
            </a>
        </div>
    </div>
    <nav class="header__nav">
        <div class="header__nav_container container flex items-center">
            <div class="header__nav_menu relative cursor-pointer text-nowrap text-black font-xs-bold">
                درباره‌ی انجمن
                <div class="header__nav_sub-menu absolute bg-white cursor-default line-height-1 z-10">
                    <a href="{{route('page.ngo-history',config('app.locale'))}}"
                       class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                    >
                        تاریخچه
                    </a>
                    <a href="{{route('page.interactions',config('app.locale'))}}"
                       class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                    >
                        تعاملات
                    </a>
                    <a href="{{route('page.foundations',config('app.locale'))}}"
                       class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                    >
                        ارکان انجمن
                    </a>
                    <a href="{{route('page.mission-and-vision',config('app.locale'))}}"
                       class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                    >
                        ماموریت و چشم انداز
                    </a>
                    <a
                       class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                    >
                        فعالیت ها
                    </a>
                    <a
                       class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                    >
                        گزارش سالانه
                    </a>
                    <a
                       class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                    >
                        تماس با ما
                    </a>
                    <a
                       class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                    >
                        اساسنامه
                    </a>
                    <a
                       class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                    >
                        چارت سازمانی
                    </a>
                </div>
            </div>
            <div class="header__nav_menu relative cursor-pointer text-nowrap text-black font-xs-bold">
                دانستنی ها
                <div class="header__nav_sub-menu absolute flex bg-white cursor-default line-height-1 z-10">
                    <div class="header__nav_sub-menu_col">
                            <span class="header__nav_sub-menu_title block font-sm text-blue-200">
                                اطلاعات عمومی
                            </span>
                        <a
                           class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                        >
                            تاریخچه‌ي اهدا و پیوند
                        </a>
                        <a
                           class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                        >
                            فرآیند مرگ مغزی
                        </a>
                        <a
                           class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                        >
                            مرور بر اهدای عضو
                        </a>
                        <a
                           class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                        >
                            تخصیص عضو
                        </a>
                        <a
                           class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                        >
                            اهدای عضو و مذهب
                        </a>
                        <a
                           class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                        >
                            اهدای عضو در سایر کشورها
                        </a>
                    </div>
                    <div class="header__nav_sub-menu_col">
                            <span class="header__nav_sub-menu_title block font-sm text-blue-200">
                                بیشتر بدانیم
                            </span>
                        <a
                           class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                        >
                            آمار
                        </a>
                        <a
                           class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                        >
                            پرسش‌های متداول
                        </a>
                    </div>
                </div>
            </div>
            <div class="header__nav_menu relative cursor-pointer text-nowrap text-black font-xs-bold">
                اخبار و رویدادها
                <div class="header__nav_sub-menu absolute bg-white cursor-default line-height-1 z-10">
                    <a href="{{route('archive.news-list',config('app.locale'))}}"
                       class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                    >
                        اخبار ایران
                    </a>
                    <a
                       class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                    >
                        رویدادها
                    </a>
                    <a
                       class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                    >
                        در گوشه و کنار جهان
                    </a>
                </div>
            </div>
            <div class="header__nav_menu relative cursor-pointer text-nowrap text-black font-xs-bold">
                هنر اهدا
                <div class="header__nav_sub-menu absolute bg-white cursor-default line-height-1 z-10">
                    <a
                       class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                    >
                        صوتی
                    </a>
                    <a
                       class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                    >
                        تصویری
                    </a>
                    <a
                       class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                    >
                        نوشتاری
                    </a>
                </div>
            </div>
            <div class="header__nav_menu relative cursor-pointer text-nowrap text-black font-xs-bold">
                مشارکت
                <div class="header__nav_sub-menu absolute bg-white cursor-default line-height-1 z-10">
                    <a
                       class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                    >
                        سفیر اهدای عضو
                    </a>
                    <a
                       class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                    >
                        ارسال آثار
                    </a>
                    <a
                       class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                    >
                        حمایت از فرهنگ اهدای عضو
                    </a>
                    <a
                       class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                    >
                        انتشار محصولات فرهنگی
                    </a>
                    <a
                       class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                    >
                        حمایت مالی
                    </a>
                </div>
            </div>
            <div class="header__nav_menu relative cursor-pointer text-nowrap text-black font-xs-bold">
                خدمات تخصصی علمی
                <div class="header__nav_sub-menu absolute flex bg-white cursor-default line-height-1 z-10">
                    <div class="header__nav_sub-menu_col">
                            <span class="header__nav_sub-menu_title block font-sm text-blue-200">
                                آموزش
                            </span>
                        <a
                           class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                        >
                            اطلاع رسانی دوره‌ها
                        </a>
                        <a
                           class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                        >
                            منابع آموزشی
                        </a>
                        <a
                           class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                        >
                            ارتباط با واحد آموزش
                        </a>
                    </div>
                    <div class="header__nav_sub-menu_col">
                            <span class="header__nav_sub-menu_title block font-sm text-blue-200">
                                پژوهش
                            </span>
                        <a
                           class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                        >
                            اطلاع رسانی کنگره ها
                        </a>
                        <a
                           class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                        >
                            منابع پژوهشی
                        </a>

                        <a
                           class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                        >
                            طرح‌های تحقیقاتی
                        </a>
                        <a
                           class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                        >
                            ارتباط با واحد پژوهش
                        </a>
                    </div>
                </div>
            </div>
            <div class="header__nav_menu relative cursor-pointer text-nowrap text-black font-xs-bold">
                مددکاری
                <div class="header__nav_sub-menu absolute bg-white cursor-default line-height-1 z-10">
                    <a href="{{route('page.structure-and-organization',config('app.locale'))}}"
                       class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                    >
                        ساختار و تشکیلات
                    </a>
                    <a
                       class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                    >
                        برنامه‌ی ویژه‌ی خانواده‌ها
                    </a>
                    <a
                       class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                    >
                        مراکز حمایتی همراه
                    </a>
                    <a
                       class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                    >
                        گزارش سالانه
                    </a>
                    <a
                       class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                    >
                        ثبت نام خانواده‌های اهداکننده
                    </a>
                    <a
                       class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap"
                    >
                        ارتباط با واحد مددکاری
                    </a>
                </div>
            </div>
            <div class="header__user header__user--active relative flex items-center m-r-auto">
                <a href="{{route('admin.login')}}"
                   class="flex items-center"
                >
                    <span class="text-green-300 font-sm font-bold text-nowrap">
                     مهسا مسلمی خوش آمدید
                    </span>
                    <span class="block header__nav_btn header__nav_btn--user bg-size-contain"></span>
                </a>
                <div class="header__dropdown absolute bg-white border border-solid rounded-10">
                    <a href=""
                       class="header__dropdown_item w-full block text-blue-800 font-sm font-bold text-nowrap l:hover:color-blue-200"
                    >
                        بخش سفیران اهدای عضو
                    </a>
                    <a href=""
                       class="header__dropdown_item w-full block text-blue-800 font-sm font-bold text-nowrap l:hover:color-blue-200"
                    >
                        خروج
                    </a>
                </div>
            </div>
            <a href="{{route('index',config('app.locale'))}}" class="header__nav_btn header__nav_btn--home"></a>
            <button class="header__nav_btn header__nav_btn--search bg-size-contain"></button>
            <div class="header__nav_lang inline-flex rounded-3 text-center overflow-hidden">
                <a href="{{route('index','en')}}"
                   class="header__nav_lang--en text-uppercase text-black font-xs-bold flex-1 l:transition"
                   lang="en"
                >
                    en
                </a>
                <a href="{{route('index','fa')}}"
                   class="header__nav_lang--fa text-uppercase text-black font-xs-bold flex-1 l:transition"
                   lang="fa"
                >
                    fa
                </a>
            </div>
        </div>
    </nav>
</header>
