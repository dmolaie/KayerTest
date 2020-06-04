@extends('fa.template.master')
    @section('content')
        <div class="d-share i-page">
            <div class="container sm:p-0">
                <h1 class="i-page__head flex items-center justify-center text-blue font-24 font-bold sm:font-lg">
                    <span class="i-page__title text-center cursor-default">
                        ارسال ویدیو
                    </span>
                </h1>
                <div class="d-share__body inner-box inner-box--white">
                    <div class="d-share__alert w-3/4 sm:w-full cursor-default">
                        <div class="text-bayoux font-base font-bold text-justify sm:font-sm sm:font-medium">
                            همیار گرامی,
                            <br/>
                            برای ارسال ویدیو,  حداکثر 30 ثانیه از خود ویدیو تهیه کنید و در قالب یکی از فرمت های زیر ارسال نمایید .
                            <br/>
                            MP4, AVI , M4V
                            <br/>
                            در صورت تمایل میتوانید ویدیو قبلی را حذف و ویدیوی جدیدی ارسال نمایید .
                        </div>
                    </div>
                    <form enctype="multipart/form-data" novalidate
                          class="w-full block"
                    >
                        <div class="d-share__row d-share__inputs w-full block overflow-hidden"
                             id="uploadArea"
                        >
                            <div class="d-share__column w-3/4 sm:w-full m-0-auto">
                                <label class="d-share__drop w-full text-blue-800 flex items-center justify-center font-sm font-medium border border-solid rounded text-center cursor-pointer user-select-none sm:font-xs">
                                    <input type="file" accept="video/*" name="videos[]"
                                           class="d-share__uploadField none w-0 h-0 overflow-hidden pointer-event-none"
                                    >
                                    فایل را اینجا رها کنید، یا با کلیک روی این ناحیه آن را انتخاب نمایید.
                                </label>
                            </div>
                        </div>
                        <div class="d-share__row d-share__details w-full h-0 block overflow-hidden">
                            <div class="w-full">
                                <div class="w-3/4 m-auto sm:w-full">
                                    <div class="d-share__preview w-full flex items-center font-sm font-medium border border-solid rounded text-center cursor-default user-select-none">
                                        <figure class="d-share__previewCover flex-shrink-0 relative border border-solid rounded">
                                            <img src="" alt="ارسال ویدیو"
                                                 class="d-share__previewImage absolute w-full h-full block rounded-inherit object-cover"
                                            />
                                        </figure>
                                        <div class="flex-1 text-right">
                                            <p class="d-share__sts font-sm font-bold"></p>
                                            <div class="d-share__progressbar w-full relative border border-solid overflow-hidden"
                                                 style="--progress: 0%"
                                            ></div>
                                            <div class="flex items-center justify-between">
                                                <p class="d-share__size font-xs font-bold text-left"></p>
                                                <button class="d-share__cancel text-red font-xs font-bold none">
                                                    لغو بارگذاری ویدیو
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="w-full block">
                                        <span class="d-share__label block w-full text-bayoux font-sm-bold">
                                            توضیحات
                                        </span>
                                        <textarea placeholder="توضیحات خود را بنویسید..." autocomplete="off"
                                                  class="d-share__textarea input input--blue block w-full border border-solid rounded"></textarea>
                                    </label>
                                </div>
                                <button class="d-share__submit w-1/3 l:w-1/3 xl:w-1/5 block text-white bg-green font-lg font-bold md:w-full border-green-200-2 rounded text-center l:transition-background l:hover:bg-green-200 sm:font-base">
                                    ارسال
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <h2 class="d-share__secondTitle i-page__head flex items-center justify-center text-blue font-24 font-bold sm:font-lg">
                    <span class="i-page__title text-center cursor-default">
                        مدیریت ویدیو
                    </span>
                </h2>
                <div class="d-share__wrapper inner-box inner-box--white">
                    <div class="d-share__table w-full rounded text-blue-800 sm:flex">
                        <div class="w-full block sm:w-1/2">
                            <div class="d-share__thead w-full flex font-1xs font-bold text-center cursor-default sm:h-full sm:flex-col">
                                <div class="d-share__cell flex-2 text-right">
                                    مشاهده ویدیو
                                </div>
                                <div class="d-share__cell flex-2">
                                    تاریخ ارسال
                                </div>
                                <div class="d-share__cell flex-1">
                                    وضعیت
                                </div>
                                <div class="d-share__cell d-share__action">
                                    عملیات
                                </div>
                            </div>
                        </div>
                        <div class="d-share__tbody w-full block sm:w-1/2"></div>
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
        <div class="d-share__loading z-5 spinner-loading"></div>
    @endsection

    @section('scripts')
        <script src="{{secure_asset('js/site/vendors~dashboard-share~donation-card~edit-profile~gallery~volunteers~volunteers-final.js') }}" defer></script>
        <script src="{{secure_asset('js/site/vendors~dashboard-share.js') }}" defer></script>
        <script src="{{secure_asset('js/site/dashboard-share.js?v=c298c7f8233d') }}" defer></script>
    @endsection