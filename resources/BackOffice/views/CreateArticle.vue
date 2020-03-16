<template>
    <div class="c-news c-article c-post w-full">
        <div class="w-full flex items-start">
            <div class="c-post__content l:m-l-25 xl:m-l-35">
                <div class="main inner-box inner-box--white w-full rounded-2 rounded-br-none rounded-bl-none">
                    <label class="block w-full">
                        <input type="text"
                               class="input input--white block w-full border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg"
                               :class="{
                                    'direction-ltr': ( currentLang === 'en' )
                               }"
                               placeholder="عنوان را اینجا وارد کنید"
                               v-model="form.first_title"
                        />
                    </label>
                    <button class="c-post__second-title block font-sm text-blue-100 text-decoration-underline cursor-pointer l:transition-color l:hover:text-blue--200"
                            @click.prevent="onClickToggleSecondTitleButton"
                            v-text="shouldBeShowSecondTitle ? 'مخفی کردن عنوان دوم' : 'افزودن عنوان دوم' "
                    > </button>
                    <transition>
                        <label class="block w-full"
                               v-show="shouldBeShowSecondTitle"
                        >
                            <input type="text"
                                   class="input input--white block w-full border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg"
                                   :class="{
                                        'direction-ltr': ( currentLang === 'en' )
                                   }"
                                   placeholder="عنوان دوم را اینجا وارد کنید"
                                   v-model="form.second_title"
                            />
                        </label>
                    </transition>
                    <div class="w-full border-blue-100-1 rounded m-t-15">
                        <text-editor-cm @onUpdate="onUpdateTextEditor"
                                        ref="textEditor"
                        />
                    </div>
                    <div class="c-news__abstract w-full">
                        <p class="text-rum font-sm font-bold m-b-8 cursor-default">
                            چکیده
                        </p>
                        <label class="w-full block">
                            <textarea class="textarea textarea--white w-full block border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg"
                                      v-model="form.abstract"
                            > </textarea>
                        </label>
                    </div>
                </div>
                <div class="main inner-box inner-box--blue w-full rounded-2 rounded-tr-none rounded-tl-none">
                    <div class="c-news__source w-full" style="margin-top: 0">
                        <p class="text-rum font-sm font-bold m-b-8 cursor-default">
                            عنوان دسته‌بندی
                        </p>
                        <div class="block w-full c-article__tags">
                            <tags-cm :list="categories"
                                     placeholder="عنوان دسته‌بندی"
                                     itemClassName="text-right"
                                     tagWrapperClassName="input bg-white block w-full border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg"
                                     @onChange="onChangeCategoryField"
                                     inputClassName="input--white"
                            />
                        </div>
                    </div>
                    <div class="c-news__source w-full">
                        <p class="text-rum font-sm font-bold m-b-8 cursor-default">
                            عنوان سوم
                        </p>
                        <label class="block w-full">
                            <input type="text"
                                   class="input input--white block w-full border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg direction-rtl"
                                   placeholder="عنوان سوم را اینجا وارد کنید"
                                   v-model="form.third_title"
                            />
                        </label>
                    </div>
                </div>
            </div>
            <div class="c-post__panel w-1/3 xl:w-1/4">
                <publish-cm :published="false"
                            @onClickDraftButton="onClickDraftButton"
                >
                    <template #published="{ hiddenDropdown }">
                        <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right">
                            لغو انتشار
                        </button>
                    </template>
                    <template #notPublished="{ hiddenDropdown }">
                        <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                @click.prevent="() => {onClickChiefEditorButton(); hiddenDropdown()}"
                        >
                            {{ isAdmin ? 'انتشار' : 'ارسال به سردبیر' }}
                        </button>
                        <span class="dropdown__divider"> </span>
                        <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                @click.prevent="() => {onClickRemoveButton(); hiddenDropdown()}"
                        >
                            انتقال به زباله‌دان
                        </button>
                    </template>
                </publish-cm>
                <location-cm :lang="currentLang"
                             disabled="en"
                />
                <image-panel-cm @onChange="onChangeMainImageField"
                                ref="imagePanel"
                />
                <div class="panel w-full block bg-white border-2 rounded-2 border-solid">
                    <p class="panel__title font-sm font-bold text-blue cursor-default">
                        نامک
                    </p>
                    <label class="block w-full">
                        <input type="text"
                               class="input input--white block w-full border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg direction-rtl"
                               placeholder="نامک را اینجا وارد کنید"
                               v-model="form.slug"
                        />
                    </label>
                </div>
            </div>
        </div>
        <transition name="fade">
            <div class="loading fixed w-full h-full z-10"
                 v-if="shouldBeShowLoading"
            ></div>
        </transition>
    </div>
</template>

<script>

    import {
        mapGetters, mapState
    } from 'vuex';
    import TagsCm from '@components/Tags.vue';
    import IconCm from '@components/Icon.vue';
    import CreateArticleService from '@services/service/CreateArticle';
    import TextEditorCm from '@components/TextEditor.vue';
    import ImagePanelCm from '@components/ImagePanel.vue';
    import DomainsCm from '@components/DomainsPanel.vue';
    import PublishCm from '@components/PublishPanel.vue';
    import LocationCm from '@components/LocationPanel.vue';
    import UploadService from '@vendor/components/upload';
    import UploadCm from '@vendor/components/upload/Index.vue';
    import CategoryCm from '@components/Category.vue';

    import {
        Length, toEnglishDigits
    } from "@vendor/plugin/helper";
    import {
        IS_ADMIN
    } from '@services/store/Login'

    let Service = null;

    // third_title slug

    const GET_INITIAL_FORM = () => ({
        first_title: '',
        second_title: '',
        third_title: '',
        abstract: '',
        description: '',
        slug: '',
        language: '',
        category_ids: [],
    });

    const GET_INITIAL_IMAGE = () => ({
        data: null,
        preview: []
    });
        //CREATE_ARTICLE_LIST
    export default {
        name: 'CreateArticle',
        data: () => ({
            form: GET_INITIAL_FORM(),
            images: {
                main: GET_INITIAL_IMAGE(),
                second: GET_INITIAL_IMAGE(),
            },
            domainsPanel: {
                isPending: true,
            },
            shouldBeShowSecondTitle: false,
            shouldBeShowDatePicker: false,
            shouldBeShowLoading: false,
        }),
        components: {
            IconCm,
            UploadCm,
            DomainsCm,
            PublishCm,
            LocationCm,
            ImagePanelCm,
            TextEditorCm,
            CategoryCm,
            TagsCm
        },
        computed: {
            ...mapGetters({
                isAdmin: IS_ADMIN
            }),
            ...mapState({
                categories: ({ CreateArticle }) => CreateArticle.categories,
            }),
            /**
             * @return {number | string}
             */
            DatePickerMinValue() {
                try {
                    const DATE = new Date(),
                        LOCALE_DATE = DATE.toLocaleString('fa');
                    return (
                        toEnglishDigits(
                            LOCALE_DATE
                                .replace('،', ' ')
                                .slice(0, Length( LOCALE_DATE ) - 3)
                        )
                    )
                } catch (e) {
                    return ''
                }
            },
            currentLang() {
                return this.$route.params.lang || 'fa'
            }
        },
        methods: {
            setInitialState() {
                Object.assign(this.form, GET_INITIAL_FORM.apply( this ));
                Object.assign(this.images.main, GET_INITIAL_IMAGE.apply( this ));
                Object.assign(this.images.second, GET_INITIAL_IMAGE.apply( this ));
                this.$refs['textEditor']?.clearContent();
                this.$refs['imagePanel']?.onClickRemoveImageButton();
                this.$refs['categoryCm'].$forceUpdate();
            },
            onClickToggleSecondTitleButton() {
                this.$set( this.form, 'second_title', '' );
                this.$set( this, 'shouldBeShowSecondTitle', !this.shouldBeShowSecondTitle );
            },
            onUpdateTextEditor( HTML ) {
                this.$set(this.form, 'description', HTML);
            },
            onClickReleaseTimeButton() {
                this.$set(this, 'shouldBeShowDatePicker', !this.shouldBeShowDatePicker);
            },
            formIsValid() {
                let formIsValid = Service.checkFormValidation();
                if ( !formIsValid )
                    this.displayNotification('وارد کردن عنوان الزامی است.', {
                        type: 'error'
                    });
                return formIsValid
            },
            async onClickChiefEditorButton() {
                try {
                    this.$set(this, 'shouldBeShowLoading', !this.shouldBeShowLoading);
                    let formIsValid = this.formIsValid();
                    if ( formIsValid ) {
                        await Service.onClickReleaseButton();
                    }
                } catch (e) {}
                finally {
                    this.$set(this, 'shouldBeShowLoading', !this.shouldBeShowLoading)
                }
            },
            onClickDraftButton() {
                this.displayNotification('این قابلیت در حال حاظر فعال نمیباشد.', {
                    type: 'error'
                });
            },
            onClickRemoveButton() {
                this.displayNotification('این قابلیت در حال حاظر فعال نمیباشد.', {
                    type: 'error'
                });
            },
            onChangeMainImageField( payload ) {
                this.$set( this.images.main, 'data', payload )
            },
            onChangeDomainsField( id ) {
                this.$set( this.form, 'province_id', id );
            },
            setLanguageFromParamsRouter() {
                this.$set(this.form, 'language', this.currentLang);
            },
            setParentIDFromParamsRouter() {
                this.$set(this.form, 'parent_id', (
                    this.$route.params.parent_id || ""
                ));
            },
            onChangeCategoryField( item ) {
                try {
                    this.form.category_ids = item;
                } catch (e) {}
            }
        },
        async created() {
            Service = new CreateArticleService( this );
            await Service.processFetchAsyncData();
        },
        mounted() {
            this.setLanguageFromParamsRouter();
            this.setParentIDFromParamsRouter();
        },
        updated() {
            this.setLanguageFromParamsRouter();
            this.setParentIDFromParamsRouter();
        }
    }
</script>