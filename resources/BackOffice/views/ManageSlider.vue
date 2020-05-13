<template>
    <div class="m-slider m-post">
        <div class="m-post__container w-full bg-white rounded-10">
            <div class="m-post__tabs">
                <div class="inline-flex items-stretch min-w-full">
                    <button class="m-post__tab m-post__tab--active relative font-sm font-bold transition-bg text-nowrap">
                        منتشرشده‌ها
                    </button>
                </div>
            </div>
            <div class="m-post__wrapper">
                <div class="m-post__header flex">
                    <div class="relative m-r-auto">
                        <router-link class="m-post__button inline-flex items-center justify-center font-sm font-bold bg-white border border-solid rounded-10 l:transition-bg"
                                     :to="{ name: 'CREATE_SLIDER' }"
                        >
                            <svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" id="icon--remove">
                                <path d="M20.485 3.511A12.01 12.01 0 1024 12a12.009 12.009 0 00-3.515-8.489zm-1.767 15.21A9.51 9.51 0 1121.5 12a9.508 9.508 0 01-2.782 6.721z" />
                                <path d="M16.987 7.01a1.275 1.275 0 00-1.8 0l-3.177 3.177L8.829 7.01a1.277 1.277 0 00-1.805 1.806l3.176 3.177-3.176 3.178a1.277 1.277 0 001.805 1.806l3.176-3.177 3.177 3.178a1.277 1.277 0 001.8-1.806l-3.176-3.178 3.176-3.177a1.278 1.278 0 00.005-1.807z" />
                            </svg>
                            ایجاد اسلاید
                        </router-link>
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
                                 :key="item.slider_id"
                                 :class="{ 'table__row--delete pointer-event-none': item.is_delete }"
                            >
                                <div class="table__td inline-flex items-center justify-center">
                                    <label class="cursor-pointer">
                                        <input type="checkbox"
                                               :value="item.slider_id"
                                               class="none"
                                        />
                                        <span class="table__checkbox block relative border border-solid rounded-1/2 bg-white"
                                        > </span>
                                    </label>
                                </div>
                                <div class="table__td inline-flex items-center justify-center">
                                    <image-cm :src="item.image_path"
                                              :alt="item.first_title"
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
                                <div class="table__td flex-1 inline-flex items-center justify-center">
                                    <div class="relative w-full flex items-center justify-center">
                                        <button class="table__button block text-blue-800 font-1xs font-bold bg-white border border-solid rounded text-center"
                                                v-text="'عملیات'"
                                                @click.stop="onClickActionButton( item )"
                                                :disabled="!isAdmin"
                                        > </button>
                                        <dropdown-cm :visibility="item.is_opened"
                                                     @onClickOutside="onClickActionButton( item )"
                                                     :clickOutside="true"
                                                     class="table__dropdown"
                                        >
                                            <template v-if="isAdmin">
                                                <button class="dropdown__item block w-full text-bayoux font-1xs font-medium text-right text-nowrap"
                                                        v-text="'حذف اسلایدر'"
                                                        @click.prevent="onClickDeleteActionButton( item.slider_id )"
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
    import { mapState, mapGetters } from 'vuex';
    import { IS_ADMIN } from '@services/store/Login';
    import ManageSliderService from '@services/service/ManageSlider';
    import TableCm from '@vendor/components/table/Index.vue';
    import ImageCm from '@vendor/components/image/Index.vue';
    import DropdownCm from '@vendor/components/dropdown/Index.vue';
    import PaginationCm from '@vendor/components/pagination/Index.vue';

    let Service = null;

    export default {
        name: "ManageSlider",
        data: () => ({
            isPending: true,
            paginateKeyCounter: 0,
            isModuleRegistered: false,
        }),
        components: {
            TableCm, ImageCm, DropdownCm, PaginationCm
        },
        computed: {
            ...mapGetters({
                isAdmin: IS_ADMIN
            }),
            ...mapState({
                items: ({ ManageSliderStore }) => ManageSliderStore.items,
                pagination: ({ ManageSliderStore }) => ManageSliderStore.pagination,
            }),
        },
        methods: {
            onClickActionButton( item ) {
                this.$set(item, 'is_opened', !item.is_opened)
            },
            async onClickDeleteActionButton( slider_id ) {
                try {
                    try {
                        let result = await Service.deleteSliderItem( slider_id );
                        this.displayNotification(result, { type: 'success' });
                    } catch ( exception ) {
                        this.displayNotification(exception, { type: 'error' })
                    }
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
            Service = new ManageSliderService( this );
            Service.processFetchAsyncData()
                .then(this.$nextTick)
                .then(() => {
                    setTimeout(() => {
                        this.$set(this, 'isPending', false)
                    }, 70);
                });
        },
        beforeDestroy() {
            Service._UnregisterStoreModule();
        }
    }
</script>