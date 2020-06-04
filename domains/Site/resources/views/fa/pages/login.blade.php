@extends('fa.template.master')
@section('content')
    <div class="p-login flex items-stretch w-full h-full">
        <div class="p-login__content relative h-full flex items-start justify-center flex-wrap bg-white l:w-5/12 md:w-full">
            <figure class="ehda-logo w-full">
                <img src="{{ asset('/images/ic_ehda-center.png') }}"
                     alt="انجمن اهدای عضو ایرانیان"
                     class="ehda-logo__image block w-full h-full m-0-auto object-contain"
                />
            </figure>
            <form action=""
                  class="c-form w-full text-center"
            >
                <label class="c-form__wrapper block w-full relative text-right has-error">
                    <input type="text"
                           class="c-form__input block w-full height rounded text-cornflower font-20-bold direction-ltr text-left"
                    />
                    <span class="c-form__label absolute text-gra font-lg-bold bg-white pointer-event-none user-select-none z-2">
                        کدملی
                    </span>
                    <span class="c-form__error block text-red font-sm-bold pointer-event-none">
                        کدملی اشتباه است.
                    </span>
                </label>
                <label class="c-form__wrapper block w-full relative text-right">
                    <input type="text"
                           class="c-form__input block w-full height rounded text-cornflower font-20-bold direction-ltr text-left"
                    />
                    <span class="c-form__label absolute text-gra font-lg-bold bg-white pointer-event-none user-select-none z-2">
                        گذرواژه
                    </span>
                    <span class="c-form__error block text-red font-sm-bold pointer-event-none">
                        کدملی اشتباه است.
                    </span>
                </label>
                <button class="c-form__submit block w-full height font-lg-bold text-white rounded bg-sky user-select-none">
                    ورود
                </button>
                <a href=""
                   class="c-form__link inline-block text-blue-100 font-sm-bold transition-color l:hover:color-blue-800">
                    عضو نیستید؟ ثبت‌نام کنید
                </a>
            </form>
        </div>
        <div class="p-login__background flex-1 md:none"></div>
    </div>
@endsection

@section('scripts')
    <script src="{{secure_asset('js/site/login.js')}}" defer></script>
@endsection