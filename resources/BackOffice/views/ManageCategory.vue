<template>
    <div class="m-category m-post">
        <div class="m-post__container w-full bg-white rounded-10">
            <div class="m-post__tabs">
                <div class="inline-flex items-stretch min-w-full">
                    <button class="m-post__tab relative flex-1 font-sm font-bold transition-bg text-nowrap p-0"
                            :class="{ 'm-post__tab--active': isNewsTab }"
                            @click.prevent="onClickNewsTab"
                            v-text="'اخبار'"
                    > </button>
                    <button class="m-post__tab relative flex-1 font-sm font-bold transition-bg text-nowrap p-0"
                            :class="{ 'm-post__tab--active': isEventTab }"
                            @click.prevent="onClickEventsTab"
                            v-text="'رویداد‌ها'"
                    > </button>
                    <button class="m-post__tab relative flex-1 font-sm font-bold transition-bg text-nowrap p-0"
                            :class="{ 'm-post__tab--active': isArticleTab }"
                            @click.prevent="onClickArticleTab"
                            v-text="'صفحات ایستا'"
                    > </button>
                    <button class="m-post__tab relative flex-1 font-sm font-bold transition-bg text-nowrap p-0"
                            :class="{ 'm-post__tab--active': isVoiceGalleryTab }"
                            @click.prevent="onClickVoiceGalleryTab"
                            v-text="'گالری صوتی'"
                    > </button>
                    <button class="m-post__tab relative flex-1 font-sm font-bold transition-bg text-nowrap p-0"
                            :class="{ 'm-post__tab--active': isImageGalleryTab }"
                            @click.prevent="onClickImageGalleryTab"
                            v-text="'گالری تصویری'"
                    > </button>
                    <button class="m-post__tab relative flex-1 font-sm font-bold transition-bg text-nowrap p-0"
                            :class="{ 'm-post__tab--active': isVideoGalleryTab }"
                            @click.prevent="onClickVideoGalleryTab"
                            v-text="'گالری ویدیویی'"
                    > </button>
                    <button class="m-post__tab relative flex-1 font-sm font-bold transition-bg text-nowrap p-0"
                            :class="{ 'm-post__tab--active': isTextGalleryTab }"
                            @click.prevent="onClickTextGalleryTab"
                            v-text="'گالری متنی'"
                    > </button>
                </div>
            </div>
            <div class="m-post__wrapper">
                <div class="m-post__header flex justify-end">
                    <router-link :to="{ name: 'CREATE_CATEGORY' }"
                                 class="m-post__button inline-flex items-center justify-center font-sm font-bold bg-white border border-solid rounded-10 l:transition-bg"
                    >
                        <svg viewBox="0 0 24 24" id="icon--remove">
                            <path d="M20.485 3.511A12.01 12.01 0 1024 12a12.009 12.009 0 00-3.515-8.489zm-1.767 15.21A9.51 9.51 0 1121.5 12a9.508 9.508 0 01-2.782 6.721z" />
                            <path d="M16.987 7.01a1.275 1.275 0 00-1.8 0l-3.177 3.177L8.829 7.01a1.277 1.277 0 00-1.805 1.806l3.176 3.177-3.176 3.178a1.277 1.277 0 001.805 1.806l3.176-3.177 3.177 3.178a1.277 1.277 0 001.8-1.806l-3.176-3.178 3.176-3.177a1.278 1.278 0 00.005-1.807z" />
                        </svg>
                        افزودن به دسته‌بندی‌ ها
                    </router-link>
                </div>
                <div class="m-post__table">
                    <table-cm  :data="items"
                               :isPending="isPending"
                    >
                        <template #head>
                            <div class="table__th"></div>
                            <div class="table__th font-1xs font-bold cursor-default text-center">
                                عکس سربرگ
                            </div>
                            <div class="table__th table__th:l font-1xs font-bold cursor-default">
                                مشخصات
                            </div>
                            <div class="table__th table__th:l font-1xs font-bold cursor-default text-center">
                                زیر دسته
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
                                <div class="table__td inline-flex items-center justify-center">
                                    <image-cm :src="DEFAULT_IMAGE"
                                              :alt="item.name_en"
                                              :lazyLoading="true"
                                              objectFit="cover"
                                              className="table__image w-full h-full rounded-inherit"
                                              class="w-full table__cover border border-solid rounded"
                                    />
                                </div>
                                <div class="table__td table__td:l flex flex-col cursor-default">
                                    <p class="font-xs font-bold m-b-auto"
                                       v-text="item.name_fa"
                                    > </p>
                                    <div class="w-full flex items-stretch m-b-auto">
                                        <span class="m-post__status inline-flex items-center border border-solid rounded bg-white font-1xs"
                                              :class="[ item.is_active ? 'm-post__status--published' : 'm-post__status--reject' ]"
                                              v-text=" item.is_active ? 'فعال' : 'غیرفعال' "
                                        > </span>
                                    </div>
                                </div>
                                <div class="table__td table__td:l inline-flex flex-wrap items-center justify-center">
                                    <span class="text-blue-700 font-xs font-medium cursor-default"
                                          v-text="item.parent_fa || '--'"
                                    > </span>
                                </div>
                                <div class="table__td table__td:l inline-flex flex-wrap items-center justify-center">
                                    <span class="text-blue-700 font-xs font-medium cursor-default"
                                          v-text="item.type"
                                    > </span>
                                </div>
                                <div class="table__td flex-1 inline-flex items-center justify-center">
                                    <div class="relative w-full flex items-center justify-center">
                                        <button class="table__button block text-blue-800 font-1xs font-bold bg-white border border-solid rounded text-center"
                                                v-text="'عملیات'"
                                                :disabled="true"
                                        > </button>
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
    import { mapState } from 'vuex';
    import { HasLength } from '@vendor/plugin/helper';
    import ManageCategoryService, {
        CATEGORIES_TYPE
    } from '@services/service/ManageCategory';
    import TableCm from '@vendor/components/table/Index.vue';
    import ImageCm from '@vendor/components/image/Index.vue';

    const DEFAULT_IMAGE = '/images/img_default.jpg';

    let Service = null;

    export default {
        name: "ManageCategory",
        data: () => ({
            isPending: true,
            paginateKeyCounter: 0,
            isModuleRegistered: false,
            DEFAULT_IMAGE: DEFAULT_IMAGE,
        }),
        components: {
            TableCm, ImageCm
        },
        watch: {
            $route({ query }) {
                this.$set(this, 'isPending', true);
                Service.getCategoriesListFilterBy( query )
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
            ...mapState({
                items: ({ ManageCategory }) => ManageCategory.items,
            }),
            isNewsTab() {
                let { query } = this.$route;
                return ( HasLength(this.$route.query) ) ? (
                    query.type === CATEGORIES_TYPE.news
                ) : true
            },
            isEventTab() {
                let { query } = this.$route;
                return HasLength( query ) && query.type === CATEGORIES_TYPE.event;
            },
            isArticleTab() {
                let { query } = this.$route;
                return HasLength( query ) && query.type === CATEGORIES_TYPE.article;
            },
            isVoiceGalleryTab() {
                let { query } = this.$route;
                return HasLength( query ) && query.type === CATEGORIES_TYPE.voice;
            },
            isImageGalleryTab() {
                let { query } = this.$route;
                return HasLength( query ) && query.type === CATEGORIES_TYPE.image;
            },
            isVideoGalleryTab() {
                let { query } = this.$route;
                return HasLength( query ) && query.type === CATEGORIES_TYPE.video;
            },
            isTextGalleryTab() {
                let { query } = this.$route;
                return HasLength( query ) && query.type === CATEGORIES_TYPE.text;
            },
        },
        methods: {
            switchBetweenTabs( query  = {} ) {
                this.$router.push({
                    query,
                    name: "MANAGE_CATEGORY"
                }).catch(err => {});
                this.$set(this, 'paginateKeyCounter', this.paginateKeyCounter + 1);
            },
            onClickNewsTab() {
                this.switchBetweenTabs({
                    type: CATEGORIES_TYPE.news
                })
            },
            onClickEventsTab() {
                this.switchBetweenTabs({
                    type: CATEGORIES_TYPE.event
                })
            },
            onClickArticleTab() {
                this.switchBetweenTabs({
                    type: CATEGORIES_TYPE.article
                })
            },
            onClickVoiceGalleryTab() {
                this.switchBetweenTabs({
                    type: CATEGORIES_TYPE.voice
                })
            },
            onClickImageGalleryTab() {
                this.switchBetweenTabs({
                    type: CATEGORIES_TYPE.image
                })
            },
            onClickVideoGalleryTab() {
                this.switchBetweenTabs({
                    type: CATEGORIES_TYPE.video
                })
            },
            onClickTextGalleryTab() {
                this.switchBetweenTabs({
                    type: CATEGORIES_TYPE.text
                })
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
            Service = new ManageCategoryService( this );
            Service.processFetchAsyncData()
                .then(this.$nextTick)
                .then(() => {
                    setTimeout(() => {
                        this.$set(this, 'isPending', false)
                    }, 70);
                })
        },
        beforeDestroy() {
            Service._UnregisterStoreModule();
        }
    }
</script>