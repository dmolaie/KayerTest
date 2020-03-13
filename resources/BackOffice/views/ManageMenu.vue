<template>
    <div class="c-menu w-full w-full">
        <div class="c-menu__container w-full inner-box inner-box--white">
            <div class="box box--white w-full">
                <div class="box__header border-2 border-solid"
                ></div>
                <div class="c-menu__box box__body border-2 border-t-0 border-solid">
                    <div class="flex items-center">
                        <h1 class="text-blue-800 font-24 font-bold cursor-default m-l-auto">
                            منوی اصلی
                        </h1>
                        <button class="c-menu__button c-menu__button--lang c-menu__button--faLang font-lg font-bold border border-solid border-l-0 rounded rounded-tl-none rounded-bl-none text-center"
                                :class="{ 'c-menu__button--lang--active': true }"
                        >
                            فارسی
                        </button>
                        <button class="c-menu__button c-menu__button--lang c-menu__button--enLang font-lg font-bold border border-solid border-r-0 rounded rounded-tr-none rounded-br-none text-center">
                            انگلیسی
                        </button>
                        <button class="c-menu__button c-menu__button--white text-blue-800 font-lg font-bold border border-solid rounded"
                                @click.stop="onClickAddNewMenuButton"
                        >
                            اضافه کردن
                        </button>
                    </div>
                    <template v-if="elements && elements.length">
                        <div class="c-menu__draggable block w-full">
                            <menu-draggable ref="menuDraggable"
                                            v-model="elements"
                                            @onClickToggleActiveItem="onClickToggleActiveItem"
                                            @onClickRemoveItem="onClickRemoveItem"
                                            @onToggleChild="onToggleChild"
                            />
                        </div>
                    </template>
                    <template v-else>
                        <p class="font-base font-bold text-blue-800 text-center p-20">
                            آیتمی برای نمایش وجود ندارد
                        </p>
                    </template>
                </div>
            </div>
        </div>
        <modal-cm ref="modal"
        >
            <div class="modal__body w-full bg-white rounded-10">
                <div class="modal__header flex items-center justify-between rounded-inherit">
                    <span class="text-blue-800 font-lg font-bold cursor-default">
                        اضافه کردن منوها
                    </span>
                    <button class="modal__button relative"
                            @click.prevent="onClickCloseModalButton"
                    > </button>
                </div>
                <div class="modal__content">
                    <label class="modal__row flex items-center w-full">
                        <span class="modal__label text-blue-800 font-lg font-bold flex-shrink-0">
                            نام منو
                        </span>
                        <input type="text"
                               class="modal__input input input--white text-blue-800 border border-solid rounded font-base font-light flex-1"
                               placeholder="نام منو را وارد کنید"
                        >
                    </label>
                    <div class="modal__row flex items-center w-full">
                        <span class="modal__label text-blue-800 font-lg font-bold flex-shrink-0">
                            نوع منو
                        </span>
                        <!-- onChange -->
                        <select-cm :options="menuTypes"
                                   placeholder="نوع منو را انتخاب کنید"
                                   class="w-full"
                        />
                    </div>
                    <div class="modal__row flex">
                        <div class="modal__col flex items-center w-full">
                            <span class="modal__label text-blue-800 font-lg font-bold flex-shrink-0">
                                 دسته بندی
                            </span>
                            <select-cm :options="options"
                                       placeholder="دسته بندی را انتخاب کنید"
                                       class="w-full"
                            />
                        </div>
                        <div class="modal__col flex items-center w-full">
                            <span class="modal__label text-blue-800 font-lg font-bold flex-shrink-0">
                                لیست مطالب
                            </span>
                            <select-cm :options="options"
                                       placeholder="لیست مطالب را انتخاب کنید"
                                       class="w-full"
                                       :disabled="true"
                            />
                        </div>
                    </div>
                    <label class="modal__row flex items-center w-full">
                        <span class="modal__label text-blue-800 font-lg font-bold flex-shrink-0">
                            URL
                        </span>
                        <input type="text"
                               class="modal__input input input--white text-blue-800 border border-solid rounded font-base font-light flex-1 direction-ltr"
                               placeholder="URL را وارد کنید"
                        >
                    </label>
                </div>
                <button class="modal__submit block text-white font-lg font-bold border border-solid rounded m-0-auto text-center l:transition-bg">
                    تایید
                </button>
            </div>
        </modal-cm>
        <modal-cm ref="confirm"
                  size="small"
                  :clickOutside="false"
        >
            <div class="confirm modal__body w-full bg-white rounded">
                <p class="confirm__title text-black font-bold cursor-default">
                    آیا از حذف این آیتم مطمئن هستید ؟
                </p>
                <div class="text-left">
                    <button class="confirm__button confirm__button--submit font-sm font-medium rounded text-center l:transition-bg"
                            @click.prevent="onClickConfirmSubmitButton"
                            v-text="'تایید'"
                    > </button>
                    <button class="confirm__button confirm__button--discard text-black font-sm font-medium rounded text-center l:transition-bg"
                            @click.prevent="onClickDiscardSubmitButton"
                            v-text="'لغو'"
                    > </button>
                </div>
            </div>
        </modal-cm>
    </div>
</template>

<script>
    import {
        mapState
    } from "vuex";
    import {
        HasLength, CopyOf
    } from "@vendor/plugin/helper";
    import MenuDraggable from "@components/MenuDraggable";
    import ModalCm from '@vendor/components/modal/Index.vue';
    import SelectCm from '@vendor/components/select/Index.vue';
    import ManageMenuService from '@services/service/ManageMenu';

    let Service = null;

    export default {
        name: "ManageMenu",
        data: () => ({
            options: [
                {
                    text: 'salam',
                    value: '213'
                },
                {
                    text: 'bye',
                    value: '341'
                }
            ],
            selectedItem: {},
            menuItem: {},
            counter: 0,
            anotherProcessIsPending: false
        }),
        components: {
            MenuDraggable, ModalCm, SelectCm
        },
        computed: {
            ...mapState({
                menuTypes: ({ MenuStore }) => MenuStore.menuType
            }),
            elements: {
                get() {
                    return this.$store.state.MenuStore.menuItem;
                },
                async set(value) {
                    this.$store.dispatch('updateElements', value);
                }
            },
        },
        watch: {
            elements: {
                deep: true,
                async handler( value ) {
                    if ( !!this.counter )
                        await Service.saveMenuPriority( value );
                    this.$set(this, 'counter', this.counter + 1)
                }
            }
        },
        methods: {
            onClickAddNewMenuButton() {
                this.$refs['modal']?.visible();
            },
            onClickCloseModalButton() {
                this.$refs['modal']?.hidden();
            },
            async onClickToggleActiveItem( item ) {
                await Service._onClickToggleActiveItem( item )
            },
            onClickRemoveItem( payload ) {
                this.$refs['confirm'].visible();
                Object.assign( this.selectedItem, payload );
            },
            async onClickConfirmSubmitButton() {
                this.$refs['confirm'].hidden();
                await Service._onClickRemoveItem( this.selectedItem );
                this.$set( this, 'selectedItem', {} );
            },
            onClickDiscardSubmitButton() {
                this.$refs['confirm'].hidden();
                this.$set( this, 'selectedItem', {} );
            },
            async onToggleChild() {
                try {
                    Service.processIsPending();
                    new Promise(resolve => {
                        setTimeout(() => resolve(), 60)
                    }).then(() => {
                        Service.processIsPending( false );
                    })
                } catch (e) {

                }
            }
        },
        async created() {
            Service = new ManageMenuService( this );
            await Service.getList();
            // await Service.createArticle();
            await Service.getMenuType();
            // console.log(this.items);
        }
    }
</script>