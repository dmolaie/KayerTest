<template>
    <div class="dragArea__form border border-solid rounded">
        <div class="dragArea__form_row flex items-center w-full">
            <span class="modal__label text-blue-800 font-lg font-bold flex-shrink-0">
                نام منو
            </span>
            <input type="text"
                   v-model="name"
                   class="dragArea__form_input modal__input input input--white text-blue-800 border border-solid rounded font-base font-light flex-1"
                   placeholder="نام منو را وارد کنید"
            />
        </div>
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
            <!-- :value="item.type"-->
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
            <!-- :value="item.type"-->
        </div>
        <div class="dragArea__form_row flex items-center w-full">
            <span class="modal__label text-blue-800 font-lg font-bold flex-shrink-0">
                URL
            </span>
            <input type="text"
                   v-model="e_link"
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
    import {
        CopyOf
    } from '@vendor/plugin/helper'

    export default {
        name: "Form",
        data: () => ({
            shouldBeShowSpinnerLoading: false,
            e_link: '',
            name: '',
        }),
        props: {
            item: {
                Type: Object,
                required: true
            },
            menuType: {
                type: [Object, Array],
                required: true
            },
            parentItem: {
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
                    this.$emit('onToggleChild');
                    this.$set(this.item, 'edit_menuType', text);
                    this.resetValue();
                    let CategoryName = ManageMenuService.getCategoryName( text );
                    if ( !!CategoryName ) {
                        let response = await ManageMenuService.getCategoryList( CategoryName );
                        this.$emit('onToggleChild');
                        this.$set(this.item, 'edit_categories', new CategoryPresenter( response.data ));
                    }
                    if ( !CategoryName && text === 'article' ) {
                        let response = await ManageMenuService.getArticleList();
                        this.$emit('onToggleChild');
                        this.$set(this.item, 'edit_article', new CategoryPresenter( response.data.items ))
                    }
                } catch (e) {}
            },
            onChangeCategories({ id }) {
                this.$emit('onToggleChild');
                this.$set(this.item, 'edit_menuable_id', id);
            },
            onChangeArticleList({ id }) {
                this.$emit('onToggleChild');
                this.$set(this.item, 'edit_menuable_id', id);
            },
            async onClickSaveChangeButton() {
                try {
                    if ( !this.name.trim() ) {
                        this.displayNotification('فیلد نام منو اجباری است.', {
                            type: 'error'
                        });
                        return false;
                    }
                    this.$set(this, 'shouldBeShowSpinnerLoading', true);
                    let findIndex = this.parentItem.findIndex(item => item.id === this.item.id);
                    let {
                        publish_date, language, active
                    } = this.item;
                    let payload = {
                        active: +active,
                        name: this.name,
                        title: this.name,
                        alias: this.name.replace(/ /g, '-'),
                        menu_id: this.item.id,
                        publish_date, language,
                        link: this.e_link,
                        type: ( !!this.item.edit_menuType ? this.item.edit_menuType : this.item.type ),
                        priority: (findIndex + 1),
                    };
                    if ( !!this.item.parent )
                        payload.parent_id = this.item.parent.id;
                    this.$emit('onToggleChild');
                    if ( !!this.item.edit_menuable_id || this.item.menuable_id ) {
                        payload.menuable_id = (!!this.item.edit_menuable_id) ? (this.item.edit_menuable_id) : (this.item.menuable_id);
                        this.$set(this.item, 'menuable_id', payload.menuable_id)
                    }
                    this.$set(this.item, 'name', payload.name);
                    this.$set(this.item, 'type', payload.type);
                    this.$set(this.item, 'link', payload.link);
                    if ( !payload.link.trim() ) {
                        delete payload.link;
                    }
                    try {
                        let response = await ManageMenuService.updateMenuItem( payload );
                        this.displayNotification(response.message, {
                            type: 'success'
                        });
                    } catch (exception) {
                        let errorMessage = exception.message;
                        let errors = exception?.errors;
                        if (!!errors)
                            errorMessage = Object.entries(errors)[0][1][0];
                        this.displayNotification(errorMessage, {
                            type: 'error'
                        });
                    }
                }
                catch (e) {}
                finally {
                    this.$set(this, 'shouldBeShowSpinnerLoading', false);
                }
            }
        },
        async mounted() {
            this.$set(this, 'e_link', this.item.link);
            this.$set(this, 'name', this.item.name);
            await this.onChangeMenuTypeField({
                text: this.item.type
            })
        }
    }
</script>