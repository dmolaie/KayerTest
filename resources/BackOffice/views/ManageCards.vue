<template>
    <div class="m-cards m-legate m-post">
        <div class="m-post__container w-full bg-white rounded-10">
            <div class="m-post__tabs">
                <button class="m-post__tab relative flex-1 font-sm font-bold transition-bg text-nowrap m-post__tab--active">
                    همه
                </button>
            </div>
            <div class="m-post__wrapper">
                <div class="m-post__header flex justify-end">
                    <div class="m-post__button--added relative">
                        <router-link :to="{ name: 'CREATE_EVENT', params: { lang: 'fa' } }"
                                     class="m-post__button inline-flex items-center justify-center font-sm font-bold bg-white border border-solid rounded-10 l:transition-bg"
                        >
                            <svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" id="icon--remove">
                                <path d="M20.485 3.511A12.01 12.01 0 1024 12a12.009 12.009 0 00-3.515-8.489zm-1.767 15.21A9.51 9.51 0 1121.5 12a9.508 9.508 0 01-2.782 6.721z" />
                                <path d="M16.987 7.01a1.275 1.275 0 00-1.8 0l-3.177 3.177L8.829 7.01a1.277 1.277 0 00-1.805 1.806l3.176 3.177-3.176 3.178a1.277 1.277 0 001.805 1.806l3.176-3.177 3.177 3.178a1.277 1.277 0 001.8-1.806l-3.176-3.178 3.176-3.177a1.278 1.278 0 00.005-1.807z" />
                            </svg>
                            افزودن به کارت‌های اهدای عضو
                        </router-link>
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
                               placeholder="جست‌وجو براساس کدملی و نام‌کاربر (حداقل سه کارکتر)..."
                               class="m-post__search_input bg-transparent flex-1 font-base font-bold"
                               v-model="search.value"
                               @input="onInputSearchField"
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
                                               :value="item.event_id"
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
                                    <button class="text-blue-800 font-xs font-bold text-right l:transition-color l:hover:text-blue--200"
                                            v-text="item.full_name"
                                            @click.stop="onClickShowUserInfoModal( item.id )"
                                    > </button>
                                    <div class="w-full flex items-start flex-col">
                                        <span class="m-legate__status m-post__status--published m-post__status inline-flex items-center border border-solid rounded bg-white font-1xs">
                                             دارای کارت اهدا
                                        </span>
                                        <span class="m-legate__status inline-flex items-center border border-solid rounded bg-white text-blue-100 font-1xs"
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
                                    <div class="relative w-full flex items-center justify-center">
                                        <button class="table__button block text-blue-800 font-1xs font-bold bg-white border border-solid rounded text-center"
                                                @click.stop="onClickActionButton( item )"
                                                v-text="'عملیات'"
                                                :disabled="!isAdmin"
                                        > </button>
                                        <dropdown-cm :visibility="item.is_opened"
                                                     :clickOutside="true"
                                                     @onClickOutside="onClickActionButton( item )"
                                                     class="table__dropdown"
                                        >
                                            <template v-if="isAdmin">
                                                <button class="dropdown__item block w-full text-bayoux font-1xs font-medium text-right text-nowrap"
                                                        @click.stop="onClickEditUserButton( item.user_id )"
                                                        v-text="'ویرایش اطلاعات'"
                                                > </button>
                                                <button class="dropdown__item block w-full text-bayoux font-1xs font-medium text-right text-nowrap"
                                                        @click.stop="onClickChangeUserPassword( item )"
                                                        v-text="'تغییر گذرواژه'"
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
        <modal-cm ref="changePassword"
                  @close="onClickCloseChangePasswordModal"
        >
            <div class="confirm modal__body w-full bg-white rounded">
                <div class="modal__header confirm__header flex items-center justify-between rounded-inherit rounded-bl-none rounded-br-none">
                    <span class="text-blue-800 font-base font-bold cursor-default">
                        تغییر گذرواژه
                    </span>
                    <button class="confirm__button relative"
                            @click.prevent="onClickCloseChangePasswordModal"
                    > </button>
                </div>
                <div class="modal__content confirm__content">
                    <form @submit="onClickSubmitChangePasswordModal"
                          class="confirm__container">
                        <label class="confirm__label w-full flex items-center">
                            <span class="confirm__text text-blue-800 font-sm font-bold flex-shrink-0">
                                نام
                            </span>
                            <input type="text"
                                   class="modal__input confirm__input input input--white text-blue-800 border border-solid rounded font-xs font-light flex-1"
                                   placeholder="نام کاربر" readonly="readonly" disabled="disabled"
                                   :value="selectedUser.full_name"
                            >
                        </label>
                        <label class="confirm__label w-full flex items-center">
                            <span class="confirm__text text-blue-800 font-sm font-bold flex-shrink-0">
                                تلفن همراه
                            </span>
                            <input type="text"
                                   class="modal__input confirm__input input input--white text-blue-800 border border-solid rounded font-xs font-light flex-1 direction-ltr"
                                   placeholder="تلفن همراه کاربر" readonly="readonly" disabled="disabled"
                                   :value="selectedUser.mobile"
                            >
                        </label>
                        <label class="confirm__label w-full flex items-center">
                            <span class="confirm__text text-required text-blue-800 font-sm font-bold flex-shrink-0">
                                گذرواژه
                            </span>
                            <input type="password"
                                   class="modal__input confirm__input input input--white text-blue-800 border border-solid rounded font-xs font-light flex-1 direction-ltr"
                                   placeholder="گذرواژه کاربر" autocomplete="off"
                                   v-model="password.value"
                            >
                        </label>
                    </form>
                </div>
                <div class="modal__footer confirm__footer w-full text-left">
                    <button class="confirm__f-button confirm__f-button--submit font-base font-medium rounded text-center l:transition-bg"
                            :class="{ 'spinner-loading': ( password.isPending ) }"
                            @click.prevent="onClickSubmitChangePasswordModal"
                            v-text="'تایید'"
                    > </button>
                    <button class="confirm__f-button confirm__f-button--discard font-base font-medium rounded text-center l:transition-bg"
                            @click.prevent="onClickCloseChangePasswordModal"
                            v-text="'لغو'"
                    > </button>
                </div>
            </div>
        </modal-cm>
    </div>
</template>

<script>
    import {
        mapState, mapGetters
    } from 'vuex';
    import {
        IS_ADMIN
    } from '@services/store/Login';
    import ManageCardsService from '@services/service/ManageCards';
    import ModalCm from '@vendor/components/modal/Index.vue';
    import TableCm from '@vendor/components/table/Index.vue';
    import ImageCm from '@vendor/components/image/Index.vue';
    import DropdownCm from '@vendor/components/dropdown/Index.vue';
    import PaginationCm from '@vendor/components/pagination/Index.vue';

    let Service = null;

    export default {
        name: "ManageCards",
        data: () => ({
            selectedUser: {},
            password: { value: '', isPending: false },
            isPending: true,
            search: { timeout: null, value: '', visibility: false },
            paginateKeyCounter: 0,
            isModuleRegistered: false,
        }),
        components: {
            TableCm, ImageCm, ModalCm,
            DropdownCm, PaginationCm
        },
        computed: {
            ...mapGetters({
                isAdmin: IS_ADMIN
            }),
            ...mapState({
                items: ({ ManageCardsStore }) => ManageCardsStore.items,
                pagination: ({ ManageCardsStore }) => ManageCardsStore.pagination,
            })
        },
        methods: {
            shouldBeShowLoading() {
                this.$set(this, 'isPending', true);
            },
            shouldBeHideLoading() {
                setTimeout(() => {
                    this.$set(this, 'isPending', false);
                }, 70)
            },
            async onClickToggleSearchButton() {
                try {
                    this.$set(this.search, 'value', '');
                    this.$set(this.search, 'visibility', !this.search.visibility);
                    if ( !this.search.visibility ) {
                        this.shouldBeShowLoading();
                        await Service.handelSearchAction('', this.$route);
                        this.shouldBeHideLoading();
                    }
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                }
            },
            onInputSearchField() {
                clearTimeout( this.search.timeout );
                this.search.timeout = setTimeout(async () => {
                    try {
                        this.shouldBeShowLoading();
                        await Service.handelSearchAction(this.search.value, this.$route);
                        this.shouldBeHideLoading();
                        this.$set(this, 'paginateKeyCounter', this.paginateKeyCounter + 1);
                    } catch( exception ) {
                        this.displayNotification(exception, { type: 'error' });
                    }
                    this.$set(this, 'paginateKeyCounter', this.paginateKeyCounter + 1);
                }, 350);
            },
            onClickShowUserInfoModal( user_id ) {

            },
            onClickActionButton( item ) {
                this.$set(item, 'is_opened', !item.is_opened);
            },
            onClickEditUserButton( user_id ) {
                this.pushRouter({ name: 'EDIT_USERS', params: { id: user_id } });
            },
            onClickChangeUserPassword( item ) {
                this.$set(this, 'selectedUser', {
                    user_id: item.user_id,
                    mobile: item.mobile,
                    full_name: item.full_name
                });
                this.onClickActionButton( item );
                this.$refs['changePassword']?.visible();
            },
            async onClickSubmitChangePasswordModal() {
                try {
                    this.$set(this.password, 'isPending', true);
                    let result = await Service.changeUserPassword(this.selectedUser.user_id, this.password.value);
                    this.displayNotification(result, { type: 'success' });
                    this.onClickCloseChangePasswordModal();
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                } finally {
                    this.$set(this.password, 'isPending', false);
                }
            },
            onClickCloseChangePasswordModal() {
                this.$refs['changePassword']?.hidden();
                this.$nextTick(() => {
                    this.$set(this, 'selectedUser', {});
                    this.$set(this.password, 'value', '');
                });
            },
            onChangePagination( page ) {
                try {
                    this.backToTop();
                    this.$set(this, 'isPending', true);
                    Service.handelPagination(page, this.$route)
                        .then(this.$nextTick)
                        .then(() => {
                            setTimeout(() => {
                                this.$set(this, 'isPending', false)
                            }, 70);
                        })
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' });
                }
            }
        },
        created() {
            Service = new ManageCardsService( this );
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