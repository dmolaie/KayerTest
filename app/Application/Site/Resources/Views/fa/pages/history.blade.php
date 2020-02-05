@extends('fa.template.master')
@section('content')
    <div class="i-page history-page">
        <div class="container">
            <h1 class="flex text-blue font-24 md:font-22 text-center">
                <span class="flower_line flower_line--blue--200 relative flex items-end justify-end flex-1 reverse-item m-0"></span>
                <span class="i-page__title">
                         تاریخچه انجمن
                    </span>
                <span class="flower_line flower_line--blue--200 relative flex items-end justify-end flex-1 m-0"></span>
            </h1>
            <div class="inner-box inner-box--white">
                <p class="i-page__text md:font-sm text-bayoux font-base text-right m-b-20">
                    با توجه به اینکه پیشرفت در برخی ابعاد اهدای عضو و پیوند اعضا در هر کشور توسط سیستم‌های دولتی مانند
                    بیمارستان و مرکز فراهم‌‌آوری و وزارت بهداشت بسیار پرهزینه، زمان‌بر و مشکل بوده و حتی در برخی موارد
                    با توجه به سنگینی بدنه این سیستم‌ها غیرعملی است. در اکثر کشورهای جهان سازمان‌های مردم‌نهاد به کمک
                    دولت آمده و با استفاده از نیروهای متخصص که به راحتی می‌توانند در این انجمن‌ها به کار گرفته شوند
                </p>
                <div class="flex items-start m-b-85 md:flex-col-reverse">
                    <div class="flex-1">
                        <p class="i-page__text md:font-sm text-bayoux font-base text-right">
                            امکان پیشرفت هر چه سریع‌تر اهدای عضو و پیوند اعضا را در آن کشورها فراهم می‌نمایند. در همین
                            راستا در سال 1394 بانیان این انجمن که در زمینه فراهم‌آوری و پیوند اعضا در کشور و حتی در سایر
                            کشورها شناخته شده بودند،
                            <br>
                            لازم به ذکر است شعبه‌های انجمن اهدای عضو ایرانیان یک به یک در استان‌های مختلف کشور در حال
                            راه‌اندازی می‌باشد و تاکنون شعبه همدان، کهگیلویه و بویراحمد، بوشهر و در چهار استان دیگر کشور
                            (تبریز ، دزفول، گیلان و آبادان) نیز در حال طی مراحل اداری لازم برای راه‌اندازی شعبه
                            می‌باشند.
                            <br>
                            گرد هم آمدند تا با در میان گذاشتن توان و تجربه خود راهگشایی باشند برای نجات هر چه بیشتر
                            بیماران نیازمند پیوند در این کشور. با توجه به اهداف انجمن اعضای هیات موسس، هیات مدیره و هیات
                            امنای این انجمن از ترکیبی از متخصصین پزشکی، فرهنگی- هنری و اقتصادی کشور در نظر گرفته شدند و
                            با توجه به چارت سازمانی انجمن سعی کرده شد که نیروهای متخصص در غالب کمیته‌های مختلف انجمن را
                            در مسیرهای درست تخصصی هدایت نمایند.
                            <br><br>
                            لازم به ذکر است شعبه‌های انجمن اهدای عضو ایرانیان یک به یک در استان‌های مختلف کشور در حال
                            راه‌اندازی می‌باشد و تاکنون شعبه همدان، کهگیلویه و بویراحمد، بوشهر و در چهار استان دیگر کشور
                            (تبریز ، دزفول، گیلان و آبادان) نیز در حال طی مراحل اداری لازم برای راه‌اندازی شعبه
                            می‌باشند.
                        </p>
                    </div>
                    <div class="l:w-280 l:m-r-45 md:w-100 md:m-b-20">
                        <figure class="block w-full m-b-10 has-skeleton">
                            <img src=""
                                 data-src="https://images.unsplash.com/photo-1580688503346-8514fcdf6a6b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=400&q=60"
                                 alt=""
                                 class="history-page__cover block w-full h-full rounded-3 object-cover"
                            />
                        </figure>
                        <figure class="block w-full m-b-10 has-skeleton">
                            <img src=""
                                 data-src="https://images.unsplash.com/photo-1580736022600-5544df25a3e3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=400&q=60"
                                 alt=""
                                 class="history-page__cover block w-full h-full rounded-3 object-cover"
                            />
                        </figure>
                        <figure class="block w-full has-skeleton">
                            <img src=""
                                 data-src="https://images.unsplash.com/photo-1562887189-4b6edf71d847?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=400&q=60"
                                 alt=""
                                 class="history-page__cover block w-full h-full rounded-3 object-cover"
                            />
                        </figure>
                    </div>
                </div>
                <div class="counter">
                    <div class="w-full relative m-b-85 counter-increment">
                        <span class="i-page__flower_line i-page__flower_line--left flower_line flower_line--blue--200 absolute flex items-end justify-end pointer-event-none m-0"></span>
                        <p class="cursor-default text-bayoux text-right font-20-bold counter-item md:m-b-20">
                            اهداف اصلی:
                        </p>
                        <figure class="block">
                            <img src="/images/img_history--1.svg"
                                 alt="اهداف اصلی"
                                 class="block object-contain md:max-w-100 m-0-auto"
                            />
                        </figure>
                    </div>
                    <div class="w-full relative counter-increment">
                        <span class="i-page__flower_line i-page__flower_line--right flower_line flower_line--blue--200 absolute flex items-end justify-end reverse-item pointer-event-none m-0"></span>
                        <p class="cursor-default text-bayoux text-right font-20-bold counter-item md:m-b-20">
                            اهداف فرعی:
                        </p>
                        <figure class="block">
                            <img src="/images/img_history--2.svg"
                                 alt="اهداف فرعی"
                                 class="block object-contain md:max-w-100 m-0-auto"
                            />
                        </figure>
                    </div>
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
                            <div class="clipboard relative cursor-pointer text-blue-800 font-sm border border-solid i-page__box rounded-1/2 m-r-10 l:hover:font-weight-bold">
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
        </div>
    </div>
@endsection