@extends('fa.template.master')
    @section('content')
        <div class="faq-page i-page">
            <div class="container">
                <h1 class="i-page__head flex items-center justify-center text-blue font-24 font-bold">
                    <span class="i-page__title text-center cursor-default">
                        سوالات متداول
                    </span>
                </h1>
                <div class="inner-box inner-box--white p-0">
                    <form acltion=""
                          class="form w-full block bg-blue rounded-inherit rounded-br-none rounded-bl-none"
                    >
                        <label class="form__label w-full flex items-center border border-solid rounded-6">
                            <input type="text"
                                   class="form__input flex-1 text-white bg-transparent font-lg font-bold"
                                   placeholder="جستجو"
                            />
                        </label>
                    </form>
                    <div class="faq-page__container">
                        <p class="text-blue font-24 font-bold cursor-default text-right m-b-25">
                            سوالات عمومی
                        </p>
                        <div class="faq-page__item">
                            <button class="faq-page__header relative w-full flex items-center justify-between font-20 font-bold border border-solid rounded-6 text-right"
                            >
                                در صورت عدم حضور فرد دارنده کارت در ایران آیا انتقال وی به کشور صورت می گیرد؟
                                <span class="faq-page__plus relative flex-shrink-0 pointer-event-none"
                                ></span>
                            </button>
                            <div class="faq-page__body h-0 overflow-hidden">
                                <div class="faq-page__content font-lg rounded-6 rounded-tl-none rounded-tr-none cursor-default">
                                    بله ؛ در هر زمان که از داشتن کارت منصرف شوید می توانید از طریق سایت، تقاضای خود را لغو کنید. هر چند با در نظر داشتن نیاز به رضایت خانواده برای اهدا تنها با اعلام خواسته خود به خانواده خویش نیز میتوانید انصراف خود را از اهدا اعلام کنید.
                                    برای لغو کارت اهدای عضو خود، می توانید کد ملی، نام و نام خانوادگی، تاریخ تولد و علت درخواست خود را به آدرس ایمیل card@ehda.center ارسال کنید.
                                </div>
                            </div>
                        </div>
                        <div class="faq-page__item">
                            <button class="faq-page__header relative w-full flex items-center justify-between font-20 font-bold border border-solid rounded-6 text-right"
                            >
                                آیا باطل کردن کارت اهدای عضو بعد از تکمیل فرم امکان پذیر می باشد؟
                                <span class="faq-page__plus relative flex-shrink-0 pointer-event-none"
                                ></span>
                            </button>
                            <div class="faq-page__body h-0 overflow-hidden">
                                <div class="faq-page__content font-lg rounded-6 rounded-tl-none rounded-tr-none cursor-default">
                                    بله ؛ در هر زمان که از داشتن کارت منصرف شوید می توانید از طریق سایت، تقاضای خود را لغو کنید. هر چند با در نظر داشتن نیاز به رضایت خانواده برای اهدا تنها با اعلام خواسته خود به خانواده خویش نیز میتوانید انصراف خود را از اهدا اعلام کنید.
                                    <br>
                                    برای لغو کارت اهدای عضو خود، می توانید کد ملی، نام و نام خانوادگی، تاریخ تولد و علت درخواست خود را به آدرس ایمیل card@ehda.center ارسال کنید.
                                </div>
                            </div>
                        </div>
                        <div class="faq-page__item">
                            <button class="faq-page__header relative w-full flex items-center justify-between font-20 font-bold border border-solid rounded-6 text-right"
                            >
                                با در نظر گرفتن لزوم رضایت خانواده برای اهدای عضو دلیل دریافت کارت چیست؟
                                <span class="faq-page__plus relative flex-shrink-0 pointer-event-none"
                                ></span>
                            </button>
                            <div class="faq-page__body h-0 overflow-hidden">
                                <div class="faq-page__content font-lg rounded-6 rounded-tl-none rounded-tr-none cursor-default">
                                    کارت اهدای عضو نشان دهنده آرزوی قلبی فرد در مورد اهدای اعضای بدن خویش می باشد و همین امر می تواند با نشان دادن خواسته فرد به خانواده، تصمیم گیری را برای آن ها در آن موقعیت حساس آسان تر نماید و ضمنا این کارت می تواند جنبه فرهنگ سازی نیز داشته باشد. نشان داده شده که در صورت بروز حادثه خانواده در آن لحظه می خواهند خواسته های عزیزشان برآورده شود و حتی در صورت عدم تمایل خود اگر بدانند که آرزوی عزیزشان این بوده همان را برآورده می کنند.
                                </div>
                            </div>
                        </div>
                        <div class="faq-page__item">
                            <button class="faq-page__header relative w-full flex items-center justify-between font-20 font-bold border border-solid rounded-6 text-right"
                            >
                                آیا خانواده های  فرد اهدا کننده و فرد گیرنده عضو پیوندی یکدیگر را ملاقات خواهند کرد ؟
                                <span class="faq-page__plus relative flex-shrink-0 pointer-event-none"
                                ></span>
                            </button>
                            <div class="faq-page__body h-0 overflow-hidden">
                                <div class="faq-page__content font-lg rounded-6 rounded-tl-none rounded-tr-none cursor-default">
                                    خیر، هویت طرفین به دلائلی که چند نمونه از آن در ذیل قید شده ، محرمانه خواهد ماند، البته تعدادی از خانواده ها تمایل خواهند داشت که از طریق نامه های بی نام و نشان (با همکاری مرکز اهدای عضو) با هم مکاتبه داشته باشند:
                                    <br>
                                    الف) به ندرت دیده شده برخی از اعضای خانواده ی اهدا کننده، پس از مدتی از خانواده ی گیرنده ی عضو، در خواست مادی دارند.
                                    <br>
                                    ب) گاهی اوقات بیمار پیوند شده ، پیوند را رد می کند و زنده نمی ماند و چون بیمار گیرنده در حکم فرزند جدید خانواده ی اهدا کننده می باشد ، مثل این است که  گویی این خانواده، دو بار فرزندشان را از دست داده اند.
                                    <br>
                                    پ) گاهی اوقات خانواده ی اهدا کننده توقع دارند که گیرنده نیز از نظر شرعیات و شیوه ی زندگی ، کاملاً مانند زنده یاد فرد مرگ مغزی باشد ، که این برای گیرنده و خانواده اش مشکلاتی را ایجاد می کند .
                                    <br>
                                    ت) بعضاً خانواده های اهدا کننده تمایل دارند به کرات ( برخی اوقات روزانه ) ، گیرنده را ملاقات کنند تا خاطرات عزیز از دست رفته شان را زنده کنند ، که این نیز باعث ایجاد مزاحمت و اختلال در روند زندگی گیرنده خواهد شد.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script src="{{asset('js/site/faq.js')}}" defer></script>
    @endsection