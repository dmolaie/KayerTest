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
                        <div class="d-share__row d-share__inputs w-full block overflow-hidden"
                             id="uploadArea"
                        >
                            <div class="d-share__column w-3/4 sm:w-full m-0-auto">
                                <label class="d-share__drop w-full text-blue-800 flex items-center justify-center font-sm font-medium border border-solid rounded text-center cursor-pointer user-select-none">
                                    <input type="file" accept="video/*" name="videos[]"
                                           class="d-share__uploadField none w-0 h-0 overflow-hidden pointer-event-none"
                                    >
                                    فایل را اینجا رها کنید، یا با کلیک روی این ناحیه آن را انتخاب نمایید.
                                </label>
                            </div>
                        </div>
                        <div class="d-share__row d-share__details w-full h-0 block overflow-hidden">
                            <div class="w-full">
                                <div class="w-3/4 m-auto">
                                    <div class="d-share__preview w-full flex items-center font-sm font-medium border border-solid rounded text-center cursor-pointer user-select-none">
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
                                            <p class="d-share__size font-xs font-bold text-left"></p>
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
                                    دریافت ویدیو
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
                        <div class="d-share__tbody w-full block"></div>
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
        <script src="{{ asset('js/site/vendors~dashboard-share~donation-card~edit-profile~gallery~volunteers~volunteers-final.js') }}" defer></script>
        <script src="{{ asset('js/site/vendors~dashboard-share.js') }}" defer></script>
        <script src="{{ asset('js/site/dashboard-share.js') }}" defer></script>
    @endsection