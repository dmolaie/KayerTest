<template>
    <div class="m-news m-post">
        <div class="m-post__container w-full bg-white rounded-10">
            <div class="m-post__tabs">
                <div class="inline-flex items-stretch">
                    <button class="m-post__tab relative font-sm font-bold transition-bg text-nowrap"
                            :class="{ 'm-post__tab--active': is_publishedTab }"
                            @click.prevent="onClickPublishItemTab"
                    >
                        منتشرشده‌ها
                    </button>
                    <button class="m-post__tab relative font-sm font-bold transition-bg text-nowrap"
                            :class="{ 'm-post__tab--active': is_scheduleTab }"
                            @click.prevent="onClickScheduledItemTab"
                    >
                        صف انتشار
                    </button>
                    <button class="m-post__tab relative font-sm font-bold transition-bg text-nowrap"
                            :class="{ 'm-post__tab--active': is_pendingTab }"
                            @click.prevent="onClickDeletePendingItemTab"

                    >
                        منتظر تأیید
                    </button>
                    <button class="m-post__tab relative font-sm font-bold transition-bg text-nowrap"
                            v-if="false"
                    >
                        پیش‌نویس‌های من
                    </button>
                    <button class="m-post__tab relative font-sm font-bold transition-bg text-nowrap"
                            :class="{ 'm-post__tab--active': is_recycleTab }"
                            @click.prevent="onClickDeleteRecycleItemTab"
                    >
                        زباله‌دان
                    </button>
                </div>
            </div>
            <div class="m-post__wrapper">
                <div class="m-post__header flex">
                    <button class="m-post__button m-post__button--filter inline-flex items-center justify-center font-sm font-bold bg-white border border-solid rounded-10 m-r-auto l:transition-bg">
                        فیلتر ها
                    </button>
                    <div class="m-post__button--added relative">
                        <button class="m-post__button inline-flex items-center justify-center font-sm font-bold bg-white border border-solid rounded-10 l:transition-bg"
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
                    <button class="m-post__button m-post__button--search inline-flex items-center justify-center font-sm font-bold bg-white border border-solid rounded-10 l:transition-bg">
                        جست‌وجو
                    </button>
                </div>
                <div class="m-post__filter w-full flex flex-wrap items-start"
                     v-if="false"
                >
                    <div class="m-post__filter_col w-1/3">
                        <p class="m-post__filter_title w-full text-blue-800 font-sm font-bold cursor-default">
                            تاریخ شروع:
                        </p>
                        <date-picker-cm placeholder="تاریخ شروع را انتخاب کنید"
                        />
                    </div>
                    <div class="m-post__filter_col w-1/3">
                        <p class="m-post__filter_title w-full text-blue-800 font-sm font-bold cursor-default">
                            تاریخ پایان:
                        </p>
                        <date-picker-cm placeholder="تاریخ پایان را انتخاب کنید"
                        />
                    </div>
                    <div class="w-full text-left">
                        <button class="m-post__filter_button m-post__filter_button--green font-base font-bold border border-solid rounded">
                            اعمال فیلترها
                        </button>
                        <button class="m-post__filter_button m-post__filter_button--white font-base font-bold border border-solid rounded">
                            حذف فیلترها
                        </button>
                    </div>
                </div>
                <div class="w-full"
                     v-if="true"
                >
                    <label class="w-3/4 flex items-stretch m-post__search border border-solid rounded">
                        <span class="m-post__search_label flex-shrink-0 rounded rounded-tl-none rounded-bl-none"
                        > </span>
                        <input type="text"
                               placeholder="جست‌وجو..."
                               class="m-post__search_input bg-transparent flex-1 font-base font-bold"
                        />
                    </label>
                </div>
                <div class="m-post__table">
                    <table-cm :data="items"
                              :isPending="isPending"
                    >
                        <template #head>
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
                        </template>
                        <template #body="{ data }">
                            <div class="table__row flex"
                                 v-for="item in data"
                                 :key="item.id"
                            >
                                <div class="table__td inline-flex items-center justify-center">
                                    <label class="cursor-pointer">
                                        <input type="checkbox"
                                               :value="item.id"
                                               class="none"
                                        />
                                        <span class="table__checkbox block relative border border-solid rounded-1/2 bg-white"
                                        > </span>
                                    </label>
                                </div>
                                <div class="table__td">
                                    <image-cm :src="item.image"
                                              :alt="item.first_title"
                                              :lazyLoading="true"
                                              objectFit="cover"
                                              className="table__image w-full h-full rounded-inherit"
                                              class="table__cover border border-solid rounded"
                                    />
                                </div>
                                <div class="table__td table__td:xl flex flex-col cursor-default">
                                    <p class="font-xs font-bold m-b-auto"
                                       v-text="item.first_title"
                                    > </p>
                                    <div class="w-full flex items-stretch">
                                        <span class="m-post__status inline-flex items-center border border-solid rounded bg-white font-1xs"
                                              :class="{
                                                'm-post__status--published': ( item.is_published ),
                                                'm-post__status--pending': ( item.is_pending ),
                                                'm-post__status--reject': ( item.is_reject ),
                                                'm-post__status--accept': ( item.is_accept )
                                              }"
                                              v-text="item.status"
                                        > </span>
                                        <span class="m-post__lang inline-flex items-center border border-solid rounded bg-white text-blue-100 font-1xs"
                                              v-text="item.lang"
                                        > </span>
                                    </div>
                                    <span class="text-blue-700 font-xs font-medium">
                                         مالک مطلب: {{ item.publisher.name }}
                                    </span>
                                </div>
                                <div class="table__td flex-1 inline-flex items-center justify-center">
                                    <span class="font-xs cursor-default text-center"
                                          v-text="item.province && item.province.name"
                                    > </span>
                                </div>
                                <div class="table__td table__td:l inline-flex flex-wrap items-center justify-start">
                                    <div class="w-full"
                                         v-if="item.category.length"
                                    >
                                        <span v-for="category in item.category.slice(0, 2)"
                                              :key="'cat-' + category.id"
                                              class="m-post__category inline-block font-1xs text-medium text-blue-100 bg-white border border-solid cursor-default"
                                        >
                                            {{ item.lang === 'fa' ? category.fa : category.en }}
                                        </span>
                                        <template v-if="item.category.length > 2">
                                            <span class="m-post__category--more text-blue-100 font-lg font-bold line-height-1 cursor-default">
                                                …
                                            </span>
                                        </template>
                                    </div>
                                    <template v-else>
                                        <span class="font-1xs font-medium text-center cursor-default">
                                            دسته‌بندی انتخاب نشده است.
                                        </span>
                                    </template>
                                </div>
                                <div class="table__td inline-flex items-center justify-center flex-1">
                                    <div class="relative w-full flex items-center justify-center">
                                        <button class="table__button block text-blue-800 font-1xs font-bold bg-white border border-solid rounded text-center"
                                                v-text="'عملیات'"
                                                @click.stop="onClickActionButton( item )"
                                        > </button>
                                        <dropdown-cm :visibility="item.is_opened"
                                                     @onClickOutside="onClickActionButton( item )"
                                                     :clickOutside="true"
                                                     class="table__dropdown"
                                        >
                                            <button class="dropdown__item block w-full text-bayoux font-1xs font-medium text-right text-nowrap"
                                                    v-text="'حذف خبر'"
                                            > </button>
                                        </dropdown-cm>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </table-cm>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {
        mapState
    } from 'vuex';
    import {
        HasLength
    } from "@vendor/plugin/helper";
    import ManageNewsService from '@services/service/ManageNews';
    import DatePickerCm from '@components/DatePicker.vue';
    import TableCm from '@vendor/components/table/Index.vue';
    import ImageCm from '@vendor/components/image/Index.vue';
    import DropdownCm from '@vendor/components/dropdown/Index.vue';

    const PUBLISH_STATUS = 'published';
    const READY_TO_PUBLISH_STATUS = 'ready_to_publish';
    const RECYCLE_STATUS = 'recycle';
    const PENDING_STATUS = 'pending';

        ///change-status
    let Service = null;

    export default {
        name: "ManageNews",
        data: () => ({
            isPending: true,
            shouldBeShowCreatedNewsDropdown: false
        }),
        components: {
            DropdownCm, TableCm, ImageCm,
            DatePickerCm
        },
        computed: {
            ...mapState({
                items: ({ ManageNews }) => ManageNews.items
            }),
            is_publishedTab() {
                let { query } = this.$route;
                return ( HasLength(this.$route.query) ) ? (
                    query.status === PUBLISH_STATUS
                ) : true
            },
            is_scheduleTab() {
                let { query } = this.$route;
                return ( HasLength(this.$route.query) ) ? (
                    query.status === READY_TO_PUBLISH_STATUS
                ) : false
            },
            is_recycleTab() {
                let { query } = this.$route;
                return ( HasLength(this.$route.query) ) ? (
                    query.status === RECYCLE_STATUS
                ) : false
            },
            is_pendingTab() {
                let { query } = this.$route;
                return ( HasLength(this.$route.query) ) ? (
                    query.status === PENDING_STATUS
                ) : false
            }
        },
        watch: {
            $route({ query }) {
                let queryString = ( HasLength( query ) ) ? query : ({
                    status: PUBLISH_STATUS
                });
                Service.getNewsListFilterByStatus( queryString )
                    .then(this.$nextTick)
                    .then(() => {
                        setTimeout(() => {
                            this.$set(this, 'isPending', false)
                        }, 70);
                    });
            }
        },
        // beforeRouteUpdate (to, from, next) {
        //     // console.log('injjj');
        //     // this.$forceUpdate();
        //     next();
        // },
        methods: {
            /**
             * @param query { Object }
             */
            switchBetweenTabs( query  = {} ) {
                this.$router.push(
                    {
                        name: "MANAGE_NEWS",
                        query
                    }).catch(err => {})
            },
            onClickCreatedNewButton() {
                this.$set(this, 'shouldBeShowCreatedNewsDropdown', !this.shouldBeShowCreatedNewsDropdown)
            },
            onClickActionButton( item ) {
                this.$set(item, 'is_opened', !item.is_opened)
            },
            onClickPublishItemTab() {
                this.switchBetweenTabs({
                    status: PUBLISH_STATUS
                })
            },
            onClickScheduledItemTab() {
                this.switchBetweenTabs({
                    status: READY_TO_PUBLISH_STATUS
                })
            },
            onClickDeletePendingItemTab() {
                this.switchBetweenTabs({
                    status: PENDING_STATUS
                })
            },
            onClickDeleteRecycleItemTab() {
                this.switchBetweenTabs({
                    status: RECYCLE_STATUS
                })
            },
        },
        created() {
            Service = new ManageNewsService( this );
        },
        mounted() {
            Service.processFetchAsyncData()
                .then(this.$nextTick)
                .then(() => {
                    setTimeout(() => {
                        this.$set(this, 'isPending', false)
                    }, 70);
                });
        }
    }
</script>