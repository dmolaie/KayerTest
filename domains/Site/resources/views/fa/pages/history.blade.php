@extends('fa.template.master')
@section('title', ' | تاریخچه انجمن')
@section('content')
    <div class="i-page history-page">
        <div class="container sm:p-0">
            <h1 class="i-page__head flex items-center justify-center text-blue font-24 font-bold sm:font-lg">
                <span class="i-page__title text-center cursor-default">
                    تاریخچه انجمن
                </span>
            </h1>
            <div class="inner-box inner-box--white">
                <p class="i-page__text md:font-sm text-bayoux font-base text-justify m-b-20 sm:font-base">
                    با توجه به اینکه پیشرفت در برخی ابعاد اهدای عضو و پیوند اعضا در هر کشور توسط سیستم‌های دولتی مانند
                    بیمارستان و مرکز فراهم‌‌آوری و وزارت بهداشت بسیار پرهزینه، زمان‌بر و مشکل بوده و حتی در برخی موارد
                    با توجه به سنگینی بدنه این سیستم‌ها غیرعملی است. در اکثر کشورهای جهان سازمان‌های مردم‌نهاد به کمک
                    دولت آمده و با استفاده از نیروهای متخصص که به راحتی می‌توانند در این انجمن‌ها به کار گرفته شوند
                </p>
                <div class="flex items-start m-b-85 md:flex-col-reverse">
                    <div class="flex-1">
                        <p class="i-page__text md:font-sm text-bayoux font-base text-justify sm:font-base">
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
                                 data-src="{{ secure_asset('images/3W6A0137.jpg') }}"
                                 alt=""
                                 class="history-page__cover block w-full h-full rounded-3 object-cover"
                            />
                        </figure>
                        <figure class="block w-full m-b-10 has-skeleton">
                            <img src=""
                                 data-src="{{ secure_asset('images/اکی-ساختمان.jpg') }}"
                                 alt=""
                                 class="history-page__cover block w-full h-full rounded-3 object-cover"
                            />
                        </figure>
                        <figure class="block w-full has-skeleton">
                            <img src=""
                                 data-src="{{ secure_asset('images/3W6A0155.jpg') }}"
                                 alt=""
                                 class="history-page__cover block w-full h-full rounded-3 object-cover"
                            />
                        </figure>
                    </div>
                </div>
                <div class="counter">
                    <div class="w-full relative m-b-85 counter-increment">
                        <p class="cursor-default flex items-end text-bayoux text-right font-20-bold counter-item md:m-b-20 sm:font-sm">
                            اهداف اصلی:
                        </p>
                        <figure class="history-page__chart block max-w-full m-0-auto xl:w-1/3 l:w-1/2 sm:w-full">
                            <img src="{{ secure_asset( '/images/img_history--1.png' ) }}"
                                 alt="اهداف اصلی"
                                 class="block object-contain md:max-w-100 m-0-auto"
                            />
                        </figure>
                    </div>
                    <div class="w-full relative counter-increment">
                        <p class="cursor-default flex items-end text-bayoux text-right font-20-bold counter-item md:m-b-20 sm:font-sm">
                            اهداف فرعی:
                        </p>
                        <figure class="history-page__chart block max-w-full m-0-auto xl:w-1/3 l:w-1/2 sm:w-full">
                            <img src="{{ secure_asset('/images/img_history--2.png') }}"
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
                        @if(false)
                            <div class="i-page__short inline-flex items-center l:m-r-auto md:m-b-20 sm:flex-col">
                                <span class="text-bayoux font-sm-bold cursor-default">
                                    لینک کوتاه:
                                </span>
                                <div class="clipboard relative cursor-pointer text-blue-800 font-sm border border-solid i-page__box rounded-1/2 m-r-10">
                                    <span class="clipboard__message absolute w-full h-full flex items-center font-xs-bold opacity-0 transition-opacity pointer-event-none user-select-none">
                                        کپی شد
                                    </span>
                                    https://ehda.center/PNWVzX
                                </div>
                            </div>
                        @endif
                        <div class="flex items-center border border-solid i-page__box rounded-1/2 l:m-r-auto user-select-none">
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