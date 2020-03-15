<template>
    <div class="dragArea__form border border-solid rounded">
        <div class="dragArea__form_row flex items-center w-full">
            <span class="modal__label text-blue-800 font-lg font-bold flex-shrink-0">
                نوع منو
            </span>
            <select-cm :options="menuType"
                       placeholder="نوع منو را انتخاب کنید"
                       class="w-full"
                       :value="item.type"
                       @onChange="onChangeMenuTypeField"
            />
        </div>
        <div class="dragArea__form_row flex items-center w-full"
             :class="{
                'dragArea__form--disable': !(item.edit_categories && item.edit_categories.length)
             }"
        >
            <span class="modal__label text-blue-800 font-lg font-bold flex-shrink-0">
                 دسته بندی
            </span>
            <select-cm :options="item.edit_categories || []"
                       placeholder="دسته بندی را انتخاب کنید"
                       class="w-full"
                       @onChange="onChangeCategories"
                       ref="categories"
            />
        </div>
        <div class="dragArea__form_row flex items-center w-full"
             :class="{
                'dragArea__form--disable': !(item.edit_article && item.edit_article.length)
             }"
        >
            <span class="modal__label text-blue-800 font-lg font-bold flex-shrink-0">
                لیست مطالب
            </span>
            <select-cm :options="item.edit_article || []"
                       placeholder="لیست مطالب را انتخاب کنید"
                       class="w-full"
                       @onChange="onChangeArticleList"
                       ref="article"
            />
        </div>
        <div class="dragArea__form_row flex items-center w-full">
            <span class="modal__label text-blue-800 font-lg font-bold flex-shrink-0">
                URL
            </span>
            <input type="text"
                   v-model="item.e_link"
                   class="dragArea__form_input modal__input input input--white text-blue-800 border border-solid rounded font-base font-light flex-1 direction-ltr"
                   placeholder="URL را وارد کنید"
            />
        </div>
        <div class="text-left">
            <button class="c-menu__button c-menu__button--white text-blue-800 font-lg font-bold border border-solid rounded"
                    @click.stop="onClickSaveChangeButton"
                    :class="{'spinner-loading': shouldBeShowSpinnerLoading}"
            >
                ذخیره
            </button>
        </div>
    </div>
</template>

<script>
    import SelectCm from '@vendor/components/select/Index.vue';
    import ManageMenuService from '@services/service/ManageMenu';
    import {
        CategoryPresenter
    } from '@services/presenter/ManageMenu';

    export default {
        name: "Form",
        data: () => ({
            shouldBeShowSpinnerLoading: false
        }),
        props: {
            item: {
                Type: Object,
                required: true
            },
            menuType: {
                type: [Object, Array],
                required: true
            }
        },
        components: {
            SelectCm
        },
        methods: {
            resetValue() {
                try {
                    this.$refs['article'].resetValue();
                    this.$refs['categories'].resetValue();
                    this.$set(this.item, 'edit_categories', []);
                    this.$set(this.item, 'edit_article', []);
                } catch (e) {}
            },
            async onChangeMenuTypeField( { text } ) {
                try {
                    this.$set(this.item, 'edit_menuType', text);
                    this.resetValue();
                    let CategoryName = ManageMenuService.getCategoryName( text );
                    if ( !!CategoryName ) {
                        let response = await ManageMenuService.getCategoryList( CategoryName );
                        this.$set(this.item, 'edit_categories', new CategoryPresenter( response.data ));
                    }
                    if ( !CategoryName && text === 'article' ) {
                        let response = await ManageMenuService.getArticleList();
                        this.$set(this.item, 'edit_article', new CategoryPresenter( response.data.items ))
                    }
                } catch (e) {}
            },
            onChangeCategories({ id }) {
                this.$set(this.item, 'edit_menuable_id', id);
            },
            onChangeArticleList({ id }) {
                this.$set(this.item, 'edit_menuable_id', id);
            },
            onClickSaveChangeButton() {
                try {
                    this.$set(this, 'shouldBeShowSpinnerLoading', true);
                }
                catch (e) {

                }
                finally {
                    this.$set(this, 'shouldBeShowSpinnerLoading', false);
                }
            }
        },
        async mounted() {
            await this.onChangeMenuTypeField({
                text: this.item.type
            })
        }
    }
</script>