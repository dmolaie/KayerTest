<template>
    <div class="m-post">
        <div class="m-post__container w-full bg-white rounded-10">
            <div class="m-post__wrapper">
                <br />
                <div class="w-full">
                    <label class="w-3/4 flex items-stretch m-post__search border border-solid rounded">
                        <span class="m-post__search_label flex-shrink-0 rounded rounded-tl-none rounded-bl-none"
                        > </span>
                        <input type="text"
                               placeholder="جست‌وجو..."
                               v-model.trim="searchValue" autocomplete="off"
                               @input="onInputSearchField"
                               class="m-post__search_input bg-transparent flex-1 font-base font-bold"
                        />
                    </label>
                </div>
                <div class="m-post__table"
                     v-if="hasLength( searchValue )"
                >
                    <table-cm :data="items"
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
                                ثبت نام
                            </div>
                            <div class="table__th table__th:l font-1xs font-bold cursor-default text-center">
                                محل سکونت
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
                                               :value="item.user_id"
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
                                    <p class="text-blue-800 font-xs font-bold text-right"
                                            v-text="item.full_name"
                                    > </p>
                                    <div class="w-full flex flex-wrap items-end">
                                        <span class="m-legate__status m-post__status--published m-post__status inline-flex items-center border border-solid rounded bg-white font-1xs m-b-0">
                                            دارای کارت اهدا
                                        </span>
                                        <span class="m-legate__status m-post__status inline-flex items-center border border-solid rounded bg-white text-blue-100 font-1xs m-b-0"
                                              v-text="'شناسه کارت: ' + item.card_id"
                                        > </span>
                                    </div>
                                </div>
                                <div class="table__td table__th:l flex items-center justify-center">
                                    <span class="font-xs cursor-default"
                                          v-text="item.created_at"
                                    > </span>
                                </div>
                                <div class="table__td table__th:l flex items-center justify-center">
                                    <span class="m-legate__location font-xs cursor-default"
                                          v-text="item.location"
                                    > </span>
                                </div>
                                <div class="table__td flex-1 inline-flex items-center justify-center">
                                    <a :href="createLink( item.uuid )"
                                       class="text-blue-100 font-xs font-bold l:transition-color l:hover:text-blue--200"
                                       target="_blank"
                                    >
                                        چاپ کارت
                                    </a>
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
    import { HasLength } from "@vendor/plugin/helper";
    import PrintCardsService from '@services/service/PrintCards';
    import TableCm from '@vendor/components/table/Index.vue';
    import ImageCm from '@vendor/components/image/Index.vue';

    let Service = null;

    export default {
        name: "PrintCards",
        data: () => ({
            timeout: null,
            searchValue: '',
            isPending: false,
            isModuleRegistered: false,
        }),
        components: {
            TableCm, ImageCm
        },
        computed: mapState({
            items: ({ PrintCards }) => PrintCards.items
        }),
        methods: {
            hasLength( data ) {
                return HasLength( data );
            },
            createLink( uuid ) {
                try {
                    return `/cart/print/${uuid}`;
                } catch ( exception ) {}
            },
            async onInputSearchField() {
                clearTimeout( this.timeout );
                this.timeout = setTimeout(async () => {
                    try {
                        await Service.handelSearch( this.searchValue );
                    } catch ( exception ) {
                        this.displayNotification(exception, {
                            type: 'error'
                        })
                    }
                }, 1500)
            }
        },
        created() {
            Service = new PrintCardsService( this );
        },
    }
</script>