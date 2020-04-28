<template>
    <div class="m-gallery m-news m-post">
        <div class="m-post__container w-full bg-white rounded-10">
            <div class="m-post__tabs">
                <div class="inline-flex items-stretch min-w-full">
                    <button class="m-post__tab relative flex-1 font-sm font-bold transition-bg text-nowrap p-0"
                            :class="{ 'm-post__tab--active': isPublishedTab }"
                            @click.prevent="onClickPublishTab"
                    >
                        منتشرشده‌ها
                    </button>
                    <button class="m-post__tab relative flex-1 font-sm font-bold transition-bg text-nowrap p-0"
                            :class="{ 'm-post__tab--active': isScheduleTab }"
                            @click.prevent="onClickScheduledTab"
                    >
                        صف انتشار
                    </button>
                    <button class="m-post__tab relative flex-1 font-sm font-bold transition-bg text-nowrap p-0"
                            :class="{ 'm-post__tab--active': isPendingTab }"
                            @click.prevent="onClickPendingTab"

                    >
                        منتظر تأیید
                    </button>
                    <button class="m-post__tab relative flex-1 font-sm font-bold transition-bg text-nowrap p-0"
                            :class="{ 'm-post__tab--active': isCancelTab }"
                            @click.prevent="onClickCancelTab"
                    >
                        لغو شده
                    </button>
                    <button class="m-post__tab relative flex-1 font-sm font-bold transition-bg text-nowrap p-0"
                            :class="{ 'm-post__tab--active': isRejectTab }"
                            @click.prevent="onClickRejectTab"
                    >
                        رد شده
                    </button>
                    <button class="m-post__tab relative flex-1 font-sm font-bold transition-bg text-nowrap p-0"
                            :class="{ 'm-post__tab--active': isRecycleTab }"
                            @click.prevent="onClickRecycleTab"
                    >
                        زباله‌دان
                    </button>
                    <button class="m-post__tab relative flex-1 font-sm font-bold transition-bg text-nowrap p-0"
                            :class="{ 'm-post__tab--active': isDeleteTab }"
                            @click.prevent="onClickDeleteTab"
                    >
                        حذف شده
                    </button>
                    <button class="m-post__tab relative flex-1 font-sm font-bold transition-bg text-nowrap p-0"
                            :class="{ 'm-post__tab--active': isMyPostTab }"
                            @click.prevent="onClickMyPostTab"
                    >
                        نوشته‌های من
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
                        <button class="m-post__button inline-flex items-center justify-center font-sm font-bold bg-white border border-solid rounded-10 l:transition-bg"
                                @click.stop="onClickCreatedNewItemButton"
                        >
                            <svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" id="icon--remove">
                                <path d="M20.485 3.511A12.01 12.01 0 1024 12a12.009 12.009 0 00-3.515-8.489zm-1.767 15.21A9.51 9.51 0 1121.5 12a9.508 9.508 0 01-2.782 6.721z" />
                                <path d="M16.987 7.01a1.275 1.275 0 00-1.8 0l-3.177 3.177L8.829 7.01a1.277 1.277 0 00-1.805 1.806l3.176 3.177-3.176 3.178a1.277 1.277 0 001.805 1.806l3.176-3.177 3.177 3.178a1.277 1.277 0 001.8-1.806l-3.176-3.178 3.176-3.177a1.278 1.278 0 00.005-1.807z" />
                            </svg>
                            افزودن به گالری‌های {{ persianGalleryType }}
                        </button>
                        <dropdown-cm :visibility="shouldBeShowCreatedDropdown"
                                     @onClickOutside="shouldBeShowCreatedDropdown = !shouldBeShowCreatedDropdown"
                                     :clickOutside="true"
                        >
                            <router-link :to="{ name: 'CREATE_GALLERY', params: { type: galleryType, lang: 'fa' } }"
                                         class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                            >
                                زبان فارسی
                            </router-link>
                            <router-link :to="{ name: 'CREATE_GALLERY', params: { type: galleryType, lang: 'en' } }"
                                         class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                            >
                                زبان انگلیسی
                            </router-link>
                        </dropdown-cm>
                    </div>
                    <button class="m-post__button m-post__button--search inline-flex items-center justify-center font-sm font-bold bg-white border border-solid rounded-10 l:transition-bg"
                            @click.prevent="onClickToggleSearchButton"
                    >
                        جست‌وجو
                    </button>
                </div>
                <div class="w-full"
                     v-if="search.visibility"
                >
                    <label class="w-3/4 flex items-stretch m-post__search border border-solid rounded">
                        <span class="m-post__search_label flex-shrink-0 rounded rounded-tl-none rounded-bl-none"
                        > </span>
                        <input type="text"
                               placeholder="جست‌وجو..."
                               class="m-post__search_input bg-transparent flex-1 font-base font-bold"
                               v-model="search.value"
                               @input="onInputSearchField"
                        />
                    </label>
                </div>
                <div class="m-post__filter w-full flex flex-wrap items-start"
                     v-if="filter.visibility"
                >
                    <div class="m-post__filter_col w-1/3">
                        <p class="m-post__filter_title w-full text-blue-800 font-sm font-bold cursor-default">
                            تاریخ شروع:
                        </p>
                        <date-picker-cm type="date" :wrapper-submit="true"
                                        displayFormat="dddd jDD jMMMM jYYYY HH:mm" format="unix"
                                        placeholder="تاریخ شروع را انتخاب کنید"
                                        @onChange="onChangeDateStartField" :initialValue="minValueDatePicker"
                                        :key="'start-date-' +  filter.datePickerKey"
                        />
                    </div>
                    <div class="m-post__filter_col w-1/3">
                        <p class="m-post__filter_title w-full text-blue-800 font-sm font-bold cursor-default">
                            تاریخ پایان:
                        </p>
                        <date-picker-cm type="date" :wrapper-submit="true"
                                        displayFormat="dddd jDD jMMMM jYYYY HH:mm" format="unix"
                                        placeholder="تاریخ پایان را انتخاب کنید"
                                        @onChange="onChangeDateEndField" :disabled="!filter.create_date_start"
                                        :initialValue="minValueDatePicker" :min="`${filter.create_date_start * 1e3 || ''}`"
                                        :key="'end-date-' +  filter.datePickerKey"
                        />
                    </div>
                    <div class="w-full text-left">
                        <button class="m-post__filter_button m-post__filter_button--green font-base font-bold border border-solid rounded"
                                :class="{ 'spinner-loading': filter.submitIsPending }"
                                @click.prevent="onClickSubmitFiltersButton"
                        >
                            اعمال فیلترها
                        </button>
                        <button class="m-post__filter_button m-post__filter_button--white font-base font-bold border border-solid rounded"
                                :class="{ 'spinner-loading': filter.discardIsPending }"
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
                            <div class="table__th table__th:l flex-1 font-1xs font-bold cursor-default text-center">
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
                                 :key="item.media_id"
                                 :class="{ 'table__row--delete pointer-event-none': item.is_delete }"
                            >
                                <div class="table__td inline-flex items-center justify-center">
                                    <label class="cursor-pointer">
                                        <input type="checkbox"
                                               :value="item.media_id"
                                               class="none"
                                        />
                                        <span class="table__checkbox block relative border border-solid rounded-1/2 bg-white"
                                        > </span>
                                    </label>
                                </div>
                                <div class="table__td inline-flex items-center justify-center">
                                    <image-cm :src="item.image_path"
                                              :alt="item.title"
                                              :lazyLoading="true"
                                              objectFit="cover"
                                              className="table__image w-full h-full rounded-inherit"
                                              class="w-full table__cover border border-solid rounded"
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
                                                'm-post__status--recycle': ( item.is_recycle ),
                                                'm-post__status--delete': ( item.is_delete ),
                                                'm-post__status--cancel': ( item.is_cancel ),
                                              }"
                                              v-text="item.status"
                                        > </span>
                                        <span class="m-post__lang inline-flex items-center border border-solid rounded bg-white text-blue-100 font-1xs"
                                              v-text="item.language_fa"
                                        > </span>
                                    </div>
                                    <span class="text-blue-700 font-xs font-medium">
                                         مالک مطلب: {{ item.publisher_name }}
                                    </span>
                                </div>
                                <div class="table__td flex-1 inline-flex items-center justify-center">
                                    <span class="font-xs cursor-default text-center"
                                          v-text="item.province_name"
                                    > </span>
                                </div>
                                <div class="table__td table__td:l inline-flex flex-wrap items-center justify-center">
                                    <div class="w-full text-center"
                                         v-if="!!length( item.categories )"
                                    >
                                        <span v-for="category in item.categories.slice(0, 2)"
                                              :key="'cat-' + category.id"
                                              class="m-post__category inline-block font-1xs text-medium text-blue-100 bg-white border border-solid cursor-default"
                                        >
                                            {{ item.is_persian ? category.name_fa : category.name_en }}
                                        </span>
                                        <template v-if="length( item.categories ) > 2">
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
                                <div class="table__td flex-1 inline-flex items-center justify-center">
                                    <div class="relative w-full flex items-center justify-center">
                                        <button class="table__button block text-blue-800 font-1xs font-bold bg-white border border-solid rounded text-center"
                                             v-text="'عملیات'"
                                             @click.stop="onClickActionButton( item )"
                                             :disabled="!isAdmin || item.is_delete"
                                        > </button>
                                        <dropdown-cm :visibility="item.is_opened"
                                                     @onClickOutside="onClickActionButton( item )"
                                                     :clickOutside="true"
                                                     class="table__dropdown"
                                        >
                                            <template v-if="isAdmin">
                                                <template v-if="item.is_recycle && isAdmin">
                                                    <button class="dropdown__item block w-full text-bayoux font-1xs font-medium text-right text-nowrap"
                                                            v-text="'بازیابی از زباله دان'"
                                                            @click.prevent="onClickPendingActionButton( item.media_id )"
                                                    > </button>
                                                    <button class="dropdown__item block w-full text-bayoux font-1xs font-medium text-right text-nowrap"
                                                            v-text="'حذف رویداد'"
                                                            @click.prevent="onClickDeleteActionButton( item.media_id )"
                                                    > </button>
                                                </template>
                                                <template v-else-if="!item.is_delete">
                                                    <button class="dropdown__item block w-full text-bayoux font-1xs font-medium text-right text-nowrap"
                                                            v-text="'ویرایش'"
                                                            @click.prevent="onClickEditActionButton( item.media_id )"
                                                    > </button>
                                                    <span class="dropdown__divider"> </span>
                                                    <template v-if="isAdmin">
                                                        <button class="dropdown__item block w-full text-bayoux font-1xs font-medium text-right text-nowrap"
                                                                v-text="'بازگشت به نویسنده (رد)'"
                                                                @click.prevent="onClickRejectActionButton( item.media_id )"
                                                                v-if="item.is_pending"
                                                        > </button>
                                                        <button class="dropdown__item block w-full text-bayoux font-1xs font-medium text-right text-nowrap"
                                                                v-text="'انتقال به زباله دان'"
                                                                @click.prevent="onClickRecycleActionButton( item.media_id )"
                                                                v-else
                                                        > </button>
                                                    </template>
                                                </template>
                                            </template>
                                        </dropdown-cm>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </table-cm>
                </div>
                <div class="w-full m-post__pagination"
                     v-if="!!Object.values( items )"
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
        mapState, mapGetters
    } from 'vuex';
    import {
        IS_ADMIN
    } from '@services/store/Login';
    import {
        Length, HasLength
    } from "@vendor/plugin/helper";
    import StatusService from '@services/service/Status';
    import ManageGalleryService, {
        GALLERY_TYPE
    } from "@services/service/ManageGallery";
    import DatePickerCm from '@components/DatePicker.vue';
    import TableCm from '@vendor/components/table/Index.vue';
    import ImageCm from '@vendor/components/image/Index.vue';
    import DropdownCm from '@vendor/components/dropdown/Index.vue';
    import PaginationCm from '@vendor/components/pagination/Index.vue';

    let Service= null;

    export default {
        name: "ManageGallery",
        data: () => ({
            search: {
                value: '',
                timeout: null,
                visibility: false,
            },
            filter: {
                submitIsPending: false,
                discardIsPending: false,
                visibility: false,
                datePickerKey: 0,
                create_date_start: '',
                create_date_end: ''
            },
            isPending: true,
            paginateKeyCounter: 0,
            isModuleRegistered: false,
            shouldBeShowCreatedDropdown: false,
        }),
        components: {
            DatePickerCm, TableCm,
            ImageCm, DropdownCm, PaginationCm
        },
        watch: {
            $route({ query }) {
                let queryString = ( HasLength( query ) ) ? query : ({
                    status: StatusService.PUBLISH_STATUS
                });
                this.$set(this, 'isPending', true);
                this.$set(this.search, 'value', '');
                this.$set(this.search, 'visibility', false);
                this.$set(this.filter, 'visibility', false);
                Service.getGalleryListFilterBy( queryString )
                    .then(this.$nextTick)
                    .then(() => {
                        setTimeout(() => {
                            this.$set(this, 'isPending', false)
                        }, 70);
                    })
                    .catch(exception => { this.displayNotification(exception, { type: 'error' }) })
            }
        },
        computed: {
            ...mapGetters({
                isAdmin: IS_ADMIN
            }),
            ...mapState({
                items: ({ ManageGallery }) => ManageGallery.items,
                pagination: ({ ManageGallery }) => ManageGallery.pagination,
            }),
            galleryType() {
                return this.$route.params?.type;
            },
            persianGalleryType() {
                return GALLERY_TYPE[this.galleryType].name_fa || ''
            },
            isPublishedTab() {
                let { query } = this.$route;
                return ( HasLength(this.$route.query) ) ? (
                    query.status === StatusService.PUBLISH_STATUS
                ) : true
            },
            isScheduleTab() {
                let { query } = this.$route;
                return HasLength( query ) && query.status === StatusService.READY_TO_PUBLISH_STATUS;
            },
            isPendingTab() {
                let { query } = this.$route;
                return HasLength( query ) && query.status === StatusService.PENDING_STATUS;
            },
            isCancelTab() {
                let { query } = this.$route;
                return HasLength( query ) && query.status === StatusService.CANCEL_STATUS;
            },
            isRejectTab() {
                let { query } = this.$route;
                return HasLength( query ) && query.status === StatusService.REJECT_STATUS;
            },
            isRecycleTab() {
                let { query } = this.$route;
                return HasLength( query ) && query.status === StatusService.RECYCLE_STATUS;
            },
            isDeleteTab() {
                let { query } = this.$route;
                return HasLength( query ) && query.status === StatusService.DELETE_STATUS;
            },
            isMyPostTab() {
                let { query } = this.$route;
                return HasLength( query ) && query.status === StatusService.MY_POST_STATUS;
            },
            minValueDatePicker() {
                return ''.concat( Date.now() )
            }
        },
        methods: {
            length( payload ) {
                if ( !payload ) return 0;
                return Length( payload )
            },
            /**
             * @param query { Object }
             */
            switchBetweenTabs( query  = {} ) {
                this.$router.push({
                    query,
                    type: this.galleryType,
                    name: "MANAGE_GALLERY"
                }).catch(err => {});
                this.$set(this, 'paginateKeyCounter', this.paginateKeyCounter + 1);
            },
            onClickPublishTab() {
                this.switchBetweenTabs({
                    status: StatusService.PUBLISH_STATUS
                })
            },
            onClickScheduledTab() {
                this.switchBetweenTabs({
                    status: StatusService.READY_TO_PUBLISH_STATUS
                })
            },
            onClickPendingTab() {
                this.switchBetweenTabs({
                    status: StatusService.PENDING_STATUS
                })
            },
            onClickCancelTab() {
                this.switchBetweenTabs({
                    status: StatusService.CANCEL_STATUS
                })
            },
            onClickRejectTab() {
                this.switchBetweenTabs({
                    status: StatusService.REJECT_STATUS
                })
            },
            onClickRecycleTab() {
                this.switchBetweenTabs({
                    status: StatusService.RECYCLE_STATUS
                })
            },
            onClickDeleteTab() {
                this.switchBetweenTabs({
                    status: StatusService.DELETE_STATUS
                })
            },
            onClickMyPostTab() {
                this.switchBetweenTabs({
                    status: StatusService.MY_POST_STATUS
                })
            },
            onClickCreatedNewItemButton() {
                this.$set(this, 'shouldBeShowCreatedDropdown', !this.shouldBeShowCreatedDropdown);
            },
            onClickToggleFiltersButton() {
                this.$set(this.filter, 'visibility', !this.filter.visibility);
            },
            onClickToggleSearchButton() {
                this.$set(this.search, 'value', '');
                this.$set(this.search, 'visibility', !this.search.visibility);
            },
            onInputSearchField() {
                clearTimeout( this.search.timeout );
                this.search.timeout = setTimeout(async () => {
                    try {
                        await Service.handelSearchAction(this.search.value, this.$route);
                        this.$set(this, 'paginateKeyCounter', this.paginateKeyCounter + 1);
                    } catch ( exception ) {
                        this.displayNotification(exception, { type: 'error' })
                    }
                }, 350)
            },
            onChangeDateStartField( unix ) {
                this.$set(this.filter, 'create_date_start', unix)
            },
            onChangeDateEndField( unix ) {
                this.$set(this.filter, 'create_date_end', unix)
            },
            async onClickSubmitFiltersButton() {
                try {
                    let {
                        create_date_start, create_date_end
                    } = this.filter;
                    this.$set(this.filter, 'submitIsPending', false);
                    await Service.handleFilterAction(create_date_start, create_date_end, this.$route);
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                } finally {
                    this.$set(this.filter, 'submitIsPending', false);
                    this.$set(this, 'paginateKeyCounter', this.paginateKeyCounter + 1);
                }
            },
            async onClickDiscardFiltersButton() {
                try {
                    this.$set(this.filter, 'discardIsPending', false);
                    await Service.handleFilterAction(null, null, this.$route);
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                } finally {
                    this.$set(this.filter, 'discardIsPending', false);
                    this.$set(this, 'paginateKeyCounter', this.paginateKeyCounter + 1);
                    this.$set(this.filter, 'datePickerKey', this.filter.datePickerKey + 1);
                }
            },
            onClickActionButton( item ) {
                this.$set(item, 'is_opened', !item.is_opened)
            },
            async onClickEditActionButton(media_id, language) {
                try {
                    console.log(media_id, language);
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                }
            },
            async onClickPendingActionButton( media_id ) {
                try {
                    let result = await Service.changeStatusItems(media_id, this.galleryType, StatusService.PENDING_STATUS);
                    this.displayNotification(result, { type: 'success' });
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                }
            },
            async onClickRejectActionButton( media_id ) {
                try {
                    let result = await Service.changeStatusItems(media_id, this.galleryType, StatusService.REJECT_STATUS);
                    this.displayNotification(result, { type: 'success' });
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                }
            },
            async onClickRecycleActionButton( media_id ) {
                try {
                    let result = await Service.changeStatusItems(media_id, this.galleryType, StatusService.RECYCLE_STATUS);
                    this.displayNotification(result, { type: 'success' });
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                }
            },
            async onClickDeleteActionButton( media_id ) {
                try {
                    let result = await Service.deleteGalleryItem(media_id, this.galleryType);
                    this.displayNotification(result, { type: 'success' });
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                }
            },
            async onChangePagination( page ) {
                try {
                    this.backToTop();
                    this.$set(this, 'isPending', true);
                    Service.handelPagination(page, this.$route)
                        .then(this.$nextTick)
                        .then(() => {
                            setTimeout(() => {
                                this.$set(this, 'isPending', false)
                            }, 70);
                        });
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                }
            }
        },
        created() {
            Service = new ManageGalleryService( this );
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