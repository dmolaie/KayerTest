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
                    <button class="m-post__button m-post__button--filter inline-flex items-center justify-center font-sm font-bold bg-white border border-solid rounded-10 m-r-auto l:transition-bg"
                            @click.prevent="onClickToggleFiltersButton"
                    >
                        فیلتر ها
                    </button>
                    <div class="m-post__button--added relative">
                        <router-link class="m-post__button inline-flex items-center justify-center font-sm font-bold bg-white border border-solid rounded-10 l:transition-bg"
                                     :to="{ name: 'CREATE_ARTICLE', params: { lang: 'fa' } }"
                        >
                            <svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" id="icon--remove">
                                <path d="M20.485 3.511A12.01 12.01 0 1024 12a12.009 12.009 0 00-3.515-8.489zm-1.767 15.21A9.51 9.51 0 1121.5 12a9.508 9.508 0 01-2.782 6.721z" />
                                <path d="M16.987 7.01a1.275 1.275 0 00-1.8 0l-3.177 3.177L8.829 7.01a1.277 1.277 0 00-1.805 1.806l3.176 3.177-3.176 3.178a1.277 1.277 0 001.805 1.806l3.176-3.177 3.177 3.178a1.277 1.277 0 001.8-1.806l-3.176-3.178 3.176-3.177a1.278 1.278 0 00.005-1.807z" />
                            </svg>
                            ایجاد صفحه ایستا
                        </router-link>
                    </div>
                    <button class="m-post__button m-post__button--search inline-flex items-center justify-center font-sm font-bold bg-white border border-solid rounded-10 l:transition-bg"
                            @click.prevent="onClickToggleSearchButton"
                    >
                        جست‌وجو
                    </button>
                </div>
                <div class="w-full"
                     v-if="shouldBeShowSearchField"
                >
                    <label class="w-3/4 flex items-stretch m-post__search border border-solid rounded">
                        <span class="m-post__search_label flex-shrink-0 rounded rounded-tl-none rounded-bl-none"
                        > </span>
                        <input type="text"
                               placeholder="جست‌وجو..."
                               class="m-post__search_input bg-transparent flex-1 font-base font-bold"
                               v-model="searchField"
                               @input="oninputSearchField"
                        />
                    </label>
                </div>
                <div class="m-post__filter w-full flex flex-wrap items-start"
                     v-if="shouldBeShowFilterFields"
                >
                    <div class="m-post__filter_col w-1/3">
                        <p class="m-post__filter_title w-full text-blue-800 font-sm font-bold cursor-default">
                            تاریخ شروع:
                        </p>
                        <date-picker-cm placeholder="تاریخ شروع را انتخاب کنید"
                                        :wrapper-submit="true"
                                        :key="'start-date-' + keyCounter"
                                        @onChange="onChangeDateStartField"
                        />
                    </div>
                    <div class="m-post__filter_col w-1/3">
                        <p class="m-post__filter_title w-full text-blue-800 font-sm font-bold cursor-default">
                            تاریخ پایان:
                        </p>
                        <date-picker-cm placeholder="تاریخ پایان را انتخاب کنید"
                                        :wrapper-submit="true"
                                        :key="'end-date-' + keyCounter"
                                        @onChange="onChangeDateEndField"
                                        :disabled="!filter.create_date_start"
                                        :min="datePickerMinValue"
                        />
                    </div>
                    <div class="w-full text-left">
                        <button class="m-post__filter_button m-post__filter_button--green font-base font-bold border border-solid rounded"
                                :class="{ 'spinner-loading': ShouldBeShowSpinnerLoadingSubmitFilter }"
                                @click.prevent="onClickSubmitFiltersButton"
                        >
                            اعمال فیلترها
                        </button>
                        <button class="m-post__filter_button m-post__filter_button--white font-base font-bold border border-solid rounded"
                                :class="{ 'spinner-loading': ShouldBeShowSpinnerLoadingDiscardFilter }"
                                @click.prevent="onClickDiscardFiltersButton"
                        >
                            حذف فیلترها
                        </button>
                    </div>
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
                                                'm-post__status--ready-published': ( item.is_ready_to_publish ),
                                                'm-post__status--pending': ( item.is_pending ),
                                                'm-post__status--reject': ( item.is_reject ),
                                                'm-post__status--accept': ( item.is_accept ),
                                                'm-post__status--recycle': ( item.is_recycle )
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
                                            <template v-if="item.is_recycle">
                                                <button class="dropdown__item block w-full text-bayoux font-1xs font-medium text-right text-nowrap"
                                                        v-text="'بازیابی از زباله دان'"
                                                        @click.prevent="onClickPendingActionButton( item.id )"
                                                > </button>
                                                <button class="dropdown__item block w-full text-bayoux font-1xs font-medium text-right text-nowrap"
                                                        v-text="'حذف خبر'"
                                                        @click.prevent="onClickDeleteActionButton( item.id )"
                                                > </button>
                                            </template>
                                            <template v-else>
                                                <button class="dropdown__item block w-full text-bayoux font-1xs font-medium text-right text-nowrap"
                                                        v-text="'انتقال به زباله دان'"
                                                        @click.prevent="onClickRecycleActionButton( item.id )"
                                                > </button>
                                            </template>
                                        </dropdown-cm>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </table-cm>
                </div>
                <div class="w-full m-post__pagination"
                    v-if="!!Object.values(items)"
                >
                    <pagination-cm :isPending="isPending"
                                   @input="onChangePagination"
                                   :currentPage="pagination.current_page"
                                   :total="pagination.total || 0"
                                   :key="'paginate-' + paginateKeyCounter"
                    />
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
        Length, HasLength, toEnglishDigits
    } from "@vendor/plugin/helper";
    import ManageArticleService from '@services/service/ManageArticle';
    import DatePickerCm from '@components/DatePicker.vue';
    import TableCm from '@vendor/components/table/Index.vue';
    import ImageCm from '@vendor/components/image/Index.vue';
    import DropdownCm from '@vendor/components/dropdown/Index.vue';
    import PaginationCm from '@vendor/components/pagination/Index.vue';

    const PUBLISH_STATUS = 'published';
    const READY_TO_PUBLISH_STATUS = 'ready_to_publish';
    const RECYCLE_STATUS = 'recycle';
    const PENDING_STATUS = 'pending';
    const DELETE_STATUS = 'delete';

        ///change-status
    let Service = null;

    export default {
        name: "ManageNews",
        data: () => ({
            paginateKeyCounter: 0,
            keyCounter: 0,
            timeout: 330,
            timeoutID: null,
            filter: {
                create_date_start: '',
                create_date_end: '',
            },
            shouldBeShowFilterFields: false,
            searchField: '',
            shouldBeShowSearchField: false,
            isPending: true,
            shouldBeShowCreatedNewsDropdown: false,
            ShouldBeShowSpinnerLoadingSubmitFilter: false,
            ShouldBeShowSpinnerLoadingDiscardFilter: false
        }),
        components: {
            DropdownCm, TableCm, ImageCm,
            DatePickerCm, PaginationCm
        },
        computed: {
            ...mapState({
                items: ({ ManageArticle }) => ManageArticle.items,
                pagination: ({ ManageArticle }) => ManageArticle.pagination
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
            },
            datePickerMinValue() {
                try {
                    if ( !!this.filter.create_date_start ) {
                        const DATE = new Date( this.filter.create_date_start * 1e3 ),
                            LOCALE_DATE = DATE.toLocaleString('fa');
                        return toEnglishDigits(
                                LOCALE_DATE
                                    .replace('،', ' ')
                                    .slice(0, Length( LOCALE_DATE ) - 3)
                            )
                    } return '';
                } catch (e) {
                    return ''
                }
            },
        },
        watch: {
            $route({ query }) {
                let queryString = ( HasLength( query ) ) ? query : ({
                    status: PUBLISH_STATUS
                });
                this.$set(this, 'isPending', true);
                this.hideSearchSection();
                this.hideFiltersSection();
                Service._GetNewsListFilterBy( queryString )
                    .then(this.$nextTick)
                    .then(() => {
                        setTimeout(() => {
                            this.$set(this, 'isPending', false)
                        }, 70);
                    });
            }
        },
        methods: {
            /**
             * @param query { Object }
             */
            switchBetweenTabs( query  = {} ) {
                this.$router.push(
                    {
                        name: "MANAGE_ARTICLE",
                        query
                    }).catch(err => {})
            },
            hideSearchSection() {
                this.$set(this, 'searchField', '');
                this.$set(this, 'shouldBeShowSearchField', false);
            },
            hideFiltersSection() {
                this.$set(this.filter, 'create_date_end', '');
                this.$set(this.filter, 'create_date_start', '');
                this.$set(this, 'shouldBeShowFilterFields', false);
            },
            onClickToggleFiltersButton() {
                // this.hideSearchSection();
                this.$set(this, 'shouldBeShowFilterFields', !this.shouldBeShowFilterFields);
            },
            onClickToggleSearchButton() {
                // this.hideFiltersSection();
                this.$set(this, 'searchField', '');
                this.$set(this, 'shouldBeShowSearchField', !this.shouldBeShowSearchField);
            },
            onChangeDateStartField( unix ) {
                this.$set(this.filter, 'create_date_start', unix)
            },
            onChangeDateEndField( unix ) {
                this.$set(this.filter, 'create_date_end', unix)
            },
            async onClickSubmitFiltersButton() {
                try {
                    this.$set(this, 'ShouldBeShowSpinnerLoadingSubmitFilter', true);
                    await Service.HandleFilterAction( this.filter, this.$route );
                }
                finally {
                    this.$set(this, 'paginateKeyCounter', this.paginateKeyCounter + 1);
                    this.$set(this, 'ShouldBeShowSpinnerLoadingSubmitFilter', false);
                }
            },
            async onClickDiscardFiltersButton() {
                try {
                    this.$set(this, 'ShouldBeShowSpinnerLoadingDiscardFilter', true);
                    this.$set(this, 'keyCounter', this.keyCounter + 1);
                    this.$set(this.filter, 'create_date_end', '');
                    this.$set(this.filter, 'create_date_start', '');
                    await Service.HandleFilterAction( this.filter, this.$route )
                }
                finally {
                    this.$set(this, 'ShouldBeShowSpinnerLoadingDiscardFilter', false);
                    this.$set(this, 'paginateKeyCounter', this.paginateKeyCounter + 1);
                }
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
            async oninputSearchField() {
                try {
                    clearTimeout( this.timeoutID );
                    this.timeoutID = null;
                    this.timeoutID = await setTimeout(async () => {
                        await Service.HandelSearchAction( this.searchField, this.$route );
                        this.$set(this, 'paginateKeyCounter', this.paginateKeyCounter + 1);
                    }, this.timeout)
                } catch (e) {}
            },
            /**
             * TODO: :D --> general
             */
            backToTop() {
                try {
                    let MainContainer = document.querySelector('[role="main"]');
                    if ( !!MainContainer ) {
                        let currentScroll = MainContainer.scrollTop;
                        if (currentScroll > 0) {
                            window.requestAnimationFrame( this.backToTop );
                            MainContainer.scrollTo(0, Math.floor(currentScroll - (currentScroll / 8)))
                        }
                    }
                } catch (e) {
                    console.log(e);
                }
            },
            onChangePagination( page ) {
                try {
                    let { query } = this.$route;
                    let queryString = {};
                    queryString['status'] = ( HasLength( query ) ) ? query.status : PUBLISH_STATUS;
                    queryString['page'] = page;
                    this.$set(this, 'isPending', true);

                    if ( this.shouldBeShowSearchField &&
                         HasLength( this.searchField.trim() )
                       ) queryString['first_title'] = this.searchField.trim();

                    if ( this.shouldBeShowFilterFields &&
                        !!this.filter.create_date_start
                    ) queryString['create_date_start'] = this.filter.create_date_start;

                    if ( this.shouldBeShowFilterFields &&
                        !!this.filter.create_date_end
                    ) queryString['create_date_end'] = this.filter.create_date_end;
                    this.backToTop();
                    Service._GetNewsListFilterBy( queryString )
                        .then(this.$nextTick)
                        .then(() => {
                            setTimeout(() => {
                                this.$set(this, 'isPending', false)
                            }, 70);
                        });
                } catch (e) {}
            },
            async onClickRecycleActionButton( news_id ) {
                try {
                    await Service.changeStatusNewsItem( news_id, RECYCLE_STATUS );
                } catch (e) {}
            },
            async onClickPendingActionButton( news_id ) {
                await Service.changeStatusNewsItem( news_id, PENDING_STATUS );
            },
            async onClickDeleteActionButton( news_id ) {
                await Service.deleteNewsItem( news_id );
            }
        },
        created() {
            Service = new ManageArticleService( this );
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