<template>
    <div class="m-legate m-post">
        <div class="m-post__container w-full bg-white rounded-10">
            <div class="m-post__tabs">
                <div class="inline-flex items-stretch">
                    <button class="m-post__tab relative font-sm font-bold transition-bg text-nowrap"
                            :class="{ 'm-post__tab--active': true }"
                            v-text="'همه'"
                    > </button>
                    <button class="m-post__tab relative font-sm font-bold transition-bg text-nowrap"
                            v-text="'زباله‌دان'"
                    > </button>
                </div>
            </div>
            <div class="m-post__wrapper">
                <div class="m-post__header flex"
                >
                    <button class="m-post__button m-post__button--search inline-flex items-center justify-center font-sm font-bold bg-white border border-solid rounded-10 l:transition-bg m-r-auto"
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
                               placeholder="جست‌وجو براساس کدملی و نام‌کاربر..."
                               class="m-post__search_input bg-transparent flex-1 font-base font-bold"
                               v-model="filter.search"
                               @input="oninputSearchField"
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
                                نمایه
                            </div>
                            <div class="table__th table__td:l font-1xs font-bold cursor-default text-center">
                                نام
                            </div>
                            <div class="table__th table__td:l font-1xs font-bold cursor-default text-center">
                                شغل و تحصیلات
                            </div>
                            <div class="table__th table__th:l font-1xs font-bold cursor-default text-center">
                                نقش کاربری
                            </div>
                            <div class="table__th flex-1 font-1xs font-bold cursor-default text-center">
                                عملیات
                            </div>
                        </template>
                        <template #body="{ data }">
                            <div class="table__row flex"
                                 v-for="(item, index) in data"
                                 :key="'table-' + index"
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
                                    <image-cm :src="item.avatar"
                                              :alt="item.name"
                                              :lazyLoading="true"
                                              objectFit="cover"
                                              className="table__image w-full h-full rounded-50"
                                              class="table__cover border border-solid rounded-50"
                                    />
                                </div>
                                <div class="table__td table__td:l flex flex-col cursor-default">
                                    <p class="font-xs font-bold m-b-auto"
                                       v-text="item.full_name"
                                    > </p>
                                    <div class="w-full flex items-start flex-col">
                                        <span class="m-legate__status m-post__status inline-flex items-center border border-solid rounded bg-white font-1xs"
                                              :class="[ item.has_cart ? 'm-post__status--published' : 'm-post__status--recycle m-legate__status--recycle' ]"
                                        >
                                            {{ item.has_cart ? 'دارای' : 'بدون' }}
                                             کارت اهدا
                                        </span>
                                        <span class="m-legate__status inline-flex items-center border border-solid rounded bg-white text-blue-100 font-1xs"
                                              v-if="item.has_cart"
                                              v-text="'شناسه کارت: ' + item.card_id"
                                        > </span>
                                    </div>
                                </div>
                                <div class="table__td table__td:l">
                                    <span class="block font-xs cursor-default text-right"
                                          v-text="item.location"
                                    > </span>
                                </div>
                                <div class="table__td table__td:l">
                                    <div class="flex flex-wrap items-start cursor-default"
                                    >
                                        <span class="m-legate__status m-post__status inline-flex items-center border border-solid rounded bg-white font-1xs m-0"
                                              v-for="(role, i) in item.roles"
                                              :key="'status-' + i"
                                              :class="{
                                                  'm-post__status--accept': role.is_active,
                                                  'm-post__status--pending': role.is_pending,
                                                  'm-post__status--reject': role.is_inactive,
                                              }"
                                        >
                                            سفیر {{ item.province_name }}: {{ role.status_fa }}
                                        </span>
                                        <div class="w-full">
                                            <button class="m-legate__t-button table__button block text-blue-800 font-1xs font-bold bg-white border border-solid rounded text-center"

                                                    v-text="'مدیریت نقش‌ها'"
                                            > </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="table__td flex-1">
                                    <div class="relative w-full flex items-center justify-center">
                                        <button class="table__button block text-blue-800 font-1xs font-bold bg-white border border-solid rounded text-center"
                                                @click.stop="onClickActionButton( item )"
                                                v-text="'عملیات'"
                                        > </button>
                                        <dropdown-cm :visibility="item.is_opened"
                                                     :clickOutside="true"
                                                     @onClickOutside="onClickActionButton( item )"
                                                     class="table__dropdown"
                                        >
                                            <button class="dropdown__item block w-full text-bayoux font-1xs font-medium text-right text-nowrap"
                                                    v-text="'ویرایش اطلاعات'"
                                            > </button>
                                            <button class="dropdown__item block w-full text-bayoux font-1xs font-medium text-right text-nowrap"
                                                    v-text="'تغییر گذرواژه'"
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
    import ManageLegateService from '@services/service/ManageLegate';
    import TableCm from '@vendor/components/table/Index.vue';
    import ImageCm from '@vendor/components/image/Index.vue';
    import DropdownCm from '@vendor/components/dropdown/Index.vue';
    import PaginationCm from '@vendor/components/pagination/Index.vue';
    import StatusService from '@services/service/Status';

    let Service = null;

    export default {
        name: "ManageLegate",
        data: () => ({
            searchTimeout: null,
            filter: {
                search: ''
            },
            isPending: true,
            paginateKeyCounter: false,
            isModuleRegistered: false,
            shouldBeShowSearchField: false,
        }),
        components: {
            DropdownCm, TableCm,
            ImageCm, PaginationCm
        },
        computed: {
            ...mapState({
                items: ({ ManageLegateStore }) => ManageLegateStore.items
            })
        },
        methods: {
            onClickToggleSearchButton() {
                this.$set(this.filter, 'search', '');
                this.$set(this, 'shouldBeShowSearchField', !this.shouldBeShowSearchField);
            },
            async oninputSearchField() {
                try {
                    clearTimeout( this.searchTimeout );
                    this.searchTimeout = null;
                    this.searchTimeout = await setTimeout(async () => {
                        await Service.HandelSearchAction( this.filter.search, this.$route );
                        this.$set(this, 'paginateKeyCounter', this.paginateKeyCounter + 1);
                    }, 330)
                } catch (e) {}
            },
            onClickActionButton( item ) {
                this.$set(item, 'is_opened', !item.is_opened)
            }
        },
        created() {
            Service = new ManageLegateService( this );
        },
        mounted() {
            Service.processFetchAsyncData()
                .then(this.$nextTick)
                .then(() => {
                    setTimeout(() => {
                        this.$set(this, 'isPending', false);
                    }, 70);
                });
        },
        beforeDestroy() {
            Service._UnregisterStoreModule();
        }
    }
</script>