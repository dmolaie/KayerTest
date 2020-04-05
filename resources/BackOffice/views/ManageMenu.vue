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
                        <div class="c-menu__draggable block w-full p-20">
                            <menu-list :list="elements"
                                       :menuType="menuTypes"
                                       @input="onInputDragItem"
                                       @change="onChangeDragItem"
                                       @toggleActive="onClickToggleActiveItem"
                                       @removeItem="onClickRemoveItem"
                            />
                        </div>
                    </template>
                    <template v-else>
                        <p class="font-base font-bold text-blue-800 text-center p-20">
                            {{ isPending ? 'در حال دریافت اطلاعات...' : 'آیتمی برای نمایش وجود ندارد' }}
                        </p>
                    </template>
                </div>
            </div>
        </div>
        <modal-cm ref="modal"
                  @close="onCloseModal"
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
                               v-model="form.name"
                        >
                    </label>
                    <div class="modal__row flex items-center w-full">
                        <span class="modal__label text-blue-800 font-lg font-bold flex-shrink-0">
                            نوع منو
                        </span>
                        <select-cm :options="menuTypes"
                                   placeholder="نوع منو را انتخاب کنید"
                                   class="w-full"
                                   @onChange="onChangeMenuType"
                        />
                    </div>
                    <div class="modal__row flex">
                        <div class="modal__col flex items-center w-full"
                             :class="{
                                'modal__col--disable': !categories.length
                             }"
                        >
                            <span class="modal__label text-blue-800 font-lg font-bold flex-shrink-0">
                                 دسته بندی
                            </span>
                            <select-cm :options="categories"
                                       placeholder="دسته بندی را انتخاب کنید"
                                       class="w-full"
                                       @onChange="onChangeCategories"
                                       ref="selectCategories"
                            />
                        </div>
                        <div class="modal__col flex items-center w-full"
                             :class="{
                                'modal__col--disable': !articleList.length
                             }"
                        >
                            <span class="modal__label text-blue-800 font-lg font-bold flex-shrink-0">
                                لیست مطالب
                            </span>
                            <select-cm :options="articleList"
                                       placeholder="لیست مطالب را انتخاب کنید"
                                       @onChange="onChangeArticleList"
                                       class="w-full modal__article"
                                       ref="selectArticle"
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
                               v-model="form.link"
                        >
                    </label>
                </div>
                <button class="modal__submit block text-white font-lg font-bold border border-solid rounded m-0-auto text-center l:transition-bg"
                        :class="{
                            'spinner-loading': shouldBeShowSpinnerLoading
                        }"
                        @click.prevent="onClickCreateNewMenuItem"
                >
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
        <transition name="fade">
            <div class="loading fixed w-full h-full z-50"
                 v-if="isPending"
            ></div>
        </transition>
    </div>
</template>

<script>
    import {
        mapState
    } from "vuex";
    import {
        HasLength, CopyOf
    } from "@vendor/plugin/helper";
    import MenuList from "@components/ManageMenu/MenuList.vue";
    import ModalCm from '@vendor/components/modal/Index.vue';
    import SelectCm from '@vendor/components/select/Index.vue';
    import ManageMenuService from '@services/service/ManageMenu';
    import {
        CategoryPresenter
    } from '@services/presenter/ManageMenu';

    const GET_INITIAL_FORM = () => ({
        name: '',
        link: '',
        type: '',
        menuable_id: '',
        language: 'fa',
    });

    let Service = null;

    export default {
        name: "ManageMenu",
        data: () => ({
            isPending: true,
            selectedItem: {},
            menuItem: {},
            categories: [],
            articleList: [],
            counter: 0,
            form: GET_INITIAL_FORM(),
            categoryList: {},
            shouldBeShowSpinnerLoading: false
        }),
        components: {
            ModalCm, SelectCm,
            MenuList
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
        methods: {
            onInputDragItem( newVal ) {
                this.$set(this, 'elements', newVal);
            },
            async onChangeDragItem( newVal ) {
                await Service.saveMenuPriority( newVal );
            },
            onClickAddNewMenuButton() {
                this.$refs['modal']?.visible();
            },
            onClickCloseModalButton() {
                this.$refs['modal']?.hidden();
                this.resetCreateForm();
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
            resetCreateForm() {
                this.$set(this, 'from', GET_INITIAL_FORM.apply( this ));
                this.$set(this, 'categories', []);
                if ( this.$refs['selectCategories'] )
                    this.$refs['selectCategories'].resetValue();
                if ( this.$refs['selectArticle'] )
                    this.$refs['selectArticle'].resetValue();
                try {
                } catch (e) {}
            },
            onCloseModal() {
                this.resetCreateForm();
            },
            /**
             *  TODO: refactor the method or make this code simpler :||||||
             */
            async onChangeMenuType({ text }) {
                try {
                    this.$set(this.form, 'type', text);
                    let CategoryName = ManageMenuService.getCategoryName( text );
                    this.$refs['selectCategories'].resetValue();
                    this.$refs['selectArticle'].resetValue();
                    this.$set(this, 'categories', []);
                    this.$set(this, 'articleList', []);
                    this.$set(this.form, 'menuable_id', '');
                    if ( !!CategoryName ) {
                        let response = await ManageMenuService.getCategoryList( CategoryName );
                        this.$set(this, 'categories', new CategoryPresenter( response.data ));
                    }
                    if ( !CategoryName && text === 'article' ) {
                        let response = await ManageMenuService.getArticleList();
                        this.$set(this, 'articleList', new CategoryPresenter( response.data.items ))
                    }
                } catch ({ message }) {
                    this.displayNotification( message, {
                        type: 'error',
                        duration: 4000
                    })
                }
            },
            onChangeArticleList({ id }) {
                this.$set(this.form, 'menuable_id', id);
            },
            onChangeCategories({ id }) {
                this.$set(this.form, 'menuable_id', id);
            },
            async onClickCreateNewMenuItem() {
                try {
                    await Service.onClickCreateNewMenuItem( this.form );
                } catch (e) {}
            }
        },
        async created() {
            Service = new ManageMenuService( this );
            Service.processFetchAsyncData()
            .then(this.$nextTick)
            .then(() => {
                this.$set(this, 'isPending', false);
            })
        },
        beforeDestroy() {
            try {
                this.$set(this, 'elements', {});
            } catch (e) {}
        }
    }
</script>