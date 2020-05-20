<template>
    <div class="m-countUp m-post">
        <div class="m-post__container w-full bg-white rounded-10">
            <div class="m-post__tabs">
                <div class="inline-flex items-stretch min-w-full">
                    <div class="m-post__tab relative flex-1 font-sm font-bold transition-bg text-nowrap p-0">
                        <button class="m-post__tab relative flex-1 font-sm font-bold transition-bg text-nowrap"
                        >
                            منتشرشده‌ها
                        </button>
                    </div>
                </div>
            </div>
            <div class="m-post__wrapper">
                <div class="m-post__header flex">
                    <router-link class="m-post__button inline-flex items-center justify-center font-sm font-bold bg-white border border-solid rounded-10 m-r-auto l:transition-bg"
                                 :to="{ name: 'CREATE_COUNT_UP', params: { lang: 'fa' } }"
                    >
                        <svg viewBox="0 0 24 24">
                            <path d="M20.485 3.511A12.01 12.01 0 1024 12a12.009 12.009 0 00-3.515-8.489zm-1.767 15.21A9.51 9.51 0 1121.5 12a9.508 9.508 0 01-2.782 6.721z" />
                            <path d="M16.987 7.01a1.275 1.275 0 00-1.8 0l-3.177 3.177L8.829 7.01a1.277 1.277 0 00-1.805 1.806l3.176 3.177-3.176 3.178a1.277 1.277 0 001.805 1.806l3.176-3.177 3.177 3.178a1.277 1.277 0 001.8-1.806l-3.176-3.178 3.176-3.177a1.278 1.278 0 00.005-1.807z" />
                        </svg>
                        ایجاد شمارنده
                    </router-link>
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

                        </template>
                    </table-cm>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapState, mapGetters } from "vuex";
    import { IS_ADMIN } from '@services/store/Login';
    import TableCm from '@vendor/components/table/Index.vue';
    import ImageCm from '@vendor/components/image/Index.vue';
    import DropdownCm from '@vendor/components/dropdown/Index.vue';
    import PaginationCm from '@vendor/components/pagination/Index.vue';
    import ManageCountUpService from '@services/service/ManageCountUp';

    let Service = null;

    export default {
        name: "ManageCountUp",
        data: () => ({
            isPending: false,
            isModuleRegistered: false
        }),
        computed: {
            ...mapGetters({
                isAdmin: IS_ADMIN
            }),
            ...mapState({
                items: ({ ManageCountUp }) => ManageCountUp.items,
                pagination: ({ ManageCountUp }) => ManageCountUp.pagination,
            }),
        },
        components: {
            TableCm, ImageCm, DropdownCm, PaginationCm
        },
        created() {
            Service = new ManageCountUpService( this );
        },
        beforeDestroy() {
            Service._UnregisterStoreModule();
        }
    }
</script>