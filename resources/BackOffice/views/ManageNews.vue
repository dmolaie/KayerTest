<template>
    <div class="m-news m-post">
        <div class="m-post__container w-full bg-white rounded-10">
            <div class="m-post__tabs">
                <div class="inline-flex items-stretch">
                    <button class="m-post__tab relative font-sm font-bold transition-bg text-nowrap"
                            :class="{
                                'm-post__tab--active': true
                            }"
                    >
                        منتشرشده‌ها
                    </button>
                    <button class="m-post__tab relative font-sm font-bold transition-bg text-nowrap">
                        صف انتشار
                    </button>
                    <button class="m-post__tab relative font-sm font-bold transition-bg text-nowrap">
                        منتظر تأیید
                    </button>
                    <button class="m-post__tab relative font-sm font-bold transition-bg text-nowrap">
                        پیش‌نویس‌های من
                    </button>
                    <button class="m-post__tab relative font-sm font-bold transition-bg text-nowrap">
                        زباله‌دان
                    </button>
                    <button class="m-post__tab relative font-sm font-bold transition-bg text-nowrap">
                        جست‌وجو
                    </button>
                </div>
            </div>
            <div class="m-post__wrapper">
                <div class="m-post__header flex">
                    <div class="relative m-r-auto">
                        <button class="m-post__button inline-flex items-center justify-center font-sm font-bold bg-white border border-solid rounded-10"
                                @click.stop="onClickCreatedNewButton"
                        >
                            <svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" id="icon--remove">
                                <path d="M20.485 3.511A12.01 12.01 0 1024 12a12.009 12.009 0 00-3.515-8.489zm-1.767 15.21A9.51 9.51 0 1121.5 12a9.508 9.508 0 01-2.782 6.721z" />
                                <path d="M16.987 7.01a1.275 1.275 0 00-1.8 0l-3.177 3.177L8.829 7.01a1.277 1.277 0 00-1.805 1.806l3.176 3.177-3.176 3.178a1.277 1.277 0 001.805 1.806l3.176-3.177 3.177 3.178a1.277 1.277 0 001.8-1.806l-3.176-3.178 3.176-3.177a1.278 1.278 0 00.005-1.807z" />
                            </svg>
                            افزودن به اخبار
                        </button>
                        <dropdown-cm :visibility="shouldBeShowCreatedNewsDropdown"
                                     @onClickOutside="shouldBeShowCreatedNewsDropdown = !shouldBeShowCreatedNewsDropdown"
                                     :clickOutside="true"
                        >
                            <router-link :to="{ name: 'CREATE_NEWS', params: { lang: 'fa' } }"
                                         class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                            >
                                زبان فارسی
                            </router-link>
                            <router-link :to="{ name: 'CREATE_NEWS', params: { lang: 'en' } }"
                                         class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                            >
                                زبان انگلیسی
                            </router-link>
                        </dropdown-cm>
                    </div>
                </div>
                <div class="m-post__table">
                    <div class="table border border-solid rounded text-blue-800">
                        <div class="table__header flex">
                            <div class="table__th"></div>
                            <div class="table__th font-1xs font-bold cursor-default text-center">
                                عکس سربرگ
                            </div>
                            <div class="table__th table__th:xl font-1xs font-bold cursor-default">
                                مشخصات
                            </div>
                            <div class="table__th flex-1 font-1xs font-bold cursor-default text-center">
                                دامنه
                            </div>
                            <div class="table__th table__th:l font-1xs font-bold cursor-default text-center">
                                دسته‌بندی
                            </div>
                            <div class="table__th flex-1 font-1xs font-bold cursor-default text-center">
                                عملیات
                            </div>
                        </div>
                        <div class="table__header">
                            <div class="table__row flex">
                                <div class="table__td inline-flex items-center justify-center">
                                    <input type="checkbox"
                                    />
                                </div>
                                <div class="table__td">
                                    <figure class="w-full h-full border border-solid rounded">
                                        <img src=""
                                             alt=""
                                             class="w-full h-full rounded-inherit"
                                        />
                                    </figure>
                                </div>
                                <div class="table__td table__td:xl">
                                    <p class="font-xs font-bold cursor-default"
                                       v-text="'رئیس مرکز مدیریت پیوند و درمان بیماری‌های وزارت بهداشت: تحریم‌ها و تاثیر آن بر کیفیت زندگی بیماران نادر، ضد حقوق بشر است'"
                                    > </p>
                                </div>
                                <div class="table__td flex-1">
                                    the
                                </div>
                                <div class="table__td table__td:l">

                                </div>
                                <div class="table__td inline-flex items-center justify-center flex-1">
                                    <button class="table__button text-blue-800 font-1xs font-bold bg-white border border-solid rounded text-center">
                                        عملیات
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ManageNewsService from '@services/service/ManageNews';
    import DropdownCm from '@vendor/components/dropdown/Index.vue';

    let Service = null;

    export default {
        name: "ManageNews",
        data: () => ({
            shouldBeShowCreatedNewsDropdown: false
        }),
        components: {
            DropdownCm
        },
        methods: {
            onClickCreatedNewButton() {
                this.$set(this, 'shouldBeShowCreatedNewsDropdown', !this.shouldBeShowCreatedNewsDropdown)
            },
        },
        async created() {
            Service = new ManageNewsService( this );
            await Service.processFetchAsyncData();
        }
    }
</script>