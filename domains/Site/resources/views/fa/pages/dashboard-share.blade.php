@extends('fa.template.master')
    @section('content')
        <div class="d-share i-page">
            <div class="container">
                <h1 class="i-page__head flex items-center justify-center text-blue font-24 font-bold">
                    <span class="i-page__title text-center cursor-default">
                        ارسال ویدیو
                    </span>
                </h1>
                <div class="d-share__body inner-box inner-box--white">
                    <form enctype="multipart/form-data" novalidate
                          class="w-full block"
                    >
{{--                        <div class="d-share__column w-3/4 sm:w-full m-0-auto">--}}
{{--                            <label class="d-share__drop w-full text-blue-800 flex items-center justify-center font-sm font-medium border border-solid rounded text-center cursor-pointer user-select-none">--}}
{{--                                <input type="file" accept="video/*" name="videos[]"--}}
{{--                                       class="d-share__uploadField none w-0 h-0 overflow-hidden pointer-event-none"--}}
{{--                                >--}}
{{--                                فایل را اینجا رها کنید، یا با کلیک روی این ناحیه آن را انتخاب نمایید.--}}
{{--                            </label>--}}
{{--                        </div>--}}
                        <div class="w-full">
                            <div class="w-3/4 m-auto">
                                <div class="d-share__preview w-full flex items-center font-sm font-medium border border-solid rounded text-center cursor-pointer user-select-none">
                                    <figure class="d-share__previewCover flex-shrink-0 relative border border-solid rounded">
                                        <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1577456769/FEM-sidebar-CSS_ssbe8e.png"
                                             alt=""
                                             class="d-share__previewImage absolute w-full h-full block rounded-inherit object-cover"
                                        />
                                    </figure>
                                    <div class="flex-1 text-right">
                                        <p class="font-sm font-bold">
                                            در حال بارگذاری ویدیو ...
                                        </p>
                                        <p class="font-xs font-bold">
                                            حجم فایل: 5.6Mb
                                        </p>
                                    </div>
                                </div>
                                <label class="w-full block">
                                    <span class="d-share__label block w-full text-bayoux text-required font-sm-bold">
                                        توضیحات
                                    </span>
                                    <textarea placeholder="توضیحات خود را بنویسید..." autocomplete="off"
                                              class="d-share__textarea input input--blue block w-full border border-solid rounded"></textarea>
                                </label>
                            </div>
                        </div>
                        <button class="d-share__submit w-1/3 l:w-1/3 xl:w-1/5 block text-white bg-green font-lg font-bold md:w-full border-green-200-2 rounded text-center l:transition-background l:hover:bg-green-200 sm:font-base">
                            ارسال
                        </button>
                    </form>
                </div>

                <h1 class="d-share__secondTitle i-page__head flex items-center justify-center text-blue font-24 font-bold">
                    <span class="i-page__title text-center cursor-default">
                        مدیریت ویدیو
                    </span>
                </h1>
                <div class="inner-box inner-box--white">
                    <div class="d-share__table w-full rounded text-blue-800">
                        <div class="w-full block">
                            <div class="d-share__thead w-full flex font-1xs font-bold text-center cursor-default">
                                <div class="d-share__cell flex-2 text-right">
                                    نام ویدیو
                                </div>
                                <div class="d-share__cell flex-1">
                                    تاریخ ارسال
                                </div>
                                <div class="d-share__cell flex-1">
                                    تاریخ حذف
                                </div>
                                <div class="d-share__cell flex-1">
                                    وضعیت
                                </div>
                                <div class="d-share__cell d-share__action">
                                    عملیات
                                </div>
                            </div>
                        </div>
                        <div class="d-share__tbody w-full block">
                            <div class="d-share__tr w-full flex font-xs font-bold cursor-default">
                                <div class="d-share__cell flex-2 inline-flex items-center justify-start">
                                    <a href=""
                                       download=""
                                       class="text-blue l:transition-color l:hover:color-blue-200"
                                    >
                                        نام ویدیو
                                    </a>
                                </div>
                                <div class="d-share__cell flex-1 inline-flex items-center justify-center">
                                    ۱۳ فروردین ۱۳۹۶
                                </div>
                                <div class="d-share__cell flex-1 inline-flex items-center justify-center">
                                    ۵ آبان ۱۳۹۸
                                </div>
                                <div class="d-share__cell flex-1 inline-flex items-center justify-center">
                                    <span class="d-share__status d-share__status--accept font-1xs font-medium border border-solid rounded">
                                        ارسال شده
                                    </span>
                                </div>
                                <div class="d-share__cell d-share__action inline-flex items-center justify-center">
                                    <button class="d-share__tButton block text-blue-800 font-1xs font-bold bg-white border border-solid rounded text-center">
                                        حذف ویدیو
                                    </button>
                                </div>
                            </div>
                            <div class="d-share__tr w-full flex font-xs font-bold cursor-default">
                                <div class="d-share__cell flex-2 inline-flex items-center justify-start">
                                    <a href=""
                                       download=""
                                       class="text-blue l:transition-color l:hover:color-blue-200"
                                    >
                                        نام ویدیو
                                    </a>
                                </div>
                                <div class="d-share__cell flex-1 inline-flex items-center justify-center">
                                    ۱۳ فروردین ۱۳۹۶
                                </div>
                                <div class="d-share__cell flex-1 inline-flex items-center justify-center">
                                    ۵ آبان ۱۳۹۸
                                </div>
                                <div class="d-share__cell flex-1 inline-flex items-center justify-center">
                                    <span class="d-share__status d-share__status--delete font-1xs font-medium border border-solid rounded">
                                        حذف شده
                                    </span>
                                </div>
                                <div class="d-share__cell d-share__action inline-flex items-center justify-center">
                                    <button class="d-share__tButton block text-blue-800 font-1xs font-bold bg-white border border-solid rounded text-center">
                                        حذف ویدیو
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="notification fixed pointer-event-none z-20"
            ></div>
            <div class="d-share__confirm fixed w-full h-full flex items-center justify-center z-50 none">
                <div class="d-share__confirmWrapper rounded bg-white">
                    <p class="d-share__confirmTitle text-black font-bold cursor-default">
                        آیا از حذف این آیتم مطمئن هستید ؟
                    </p>
                    <div class="text-left">
                        <button class="d-share__confirmButton d-share__confirmButton--submit font-sm font-medium rounded text-center l:transition-bg">
                            تایید
                        </button>
                        <button class="d-share__confirmButton d-share__confirmButton--discard text-black font-sm font-medium rounded text-center l:transition-bg">
                            لغو
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script src="{{ asset('js/site/dashboard-share.js') }}" defer></script>
    @endsection