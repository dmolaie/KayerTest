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
                                     :value="form.categories"
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
                <publish-cm :isPublished="form.is_published"
                            :isPending="form.is_pending"
                            :isReject="form.is_reject"
                            :isAccept="form.is_accept"
                            :isCancel="form.is_cancel"
                            :isReadyPublished="form.is_ready_to_publish"
                            buttonLabel="بروزرسانی"
                            :statusLabel="form.status || ''"
                >
                    <template #dropdown="{ hiddenDropdown }">
                        <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                @click.prevent="() => {onClickSaveChangeButton(); hiddenDropdown()}"
                        >
                            بروزرسانی
                        </button>
                        <template v-if="form.is_pending">
                            <span class="dropdown__divider"> </span>
                            <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                    @click.prevent="() => {onClickRejectItemButton(); hiddenDropdown()}"
                            >
                                بازگشت به نویسنده (رد)
                            </button>
                        </template>
                        <template v-else>
                            <span class="dropdown__divider"> </span>
                            <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                    @click.prevent="() => {onClickChangeStatusButton(); hiddenDropdown()}"
                            >
                                لفو انتشار
                            </button>
                        </template>
                    </template>
                </publish-cm>
                <location-cm :lang="currentLang"
                             :disabledEn="true"
                />
                <image-panel-cm @change="onChangeMainImageField"
                                ref="imagePanel"
                                :value="form.image_paths"
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
    import TagsCm from '@components/CreatePost/Tags.vue';
    import IconCm from '@components/Icon.vue';
    import EditArticleService from '@services/service/EditArticle';
    import TextEditorCm from '@components/TextEditor.vue';
    import ImagePanelCm from '@components/CreatePost/ImagePanel.vue';
    import PublishCm from '@components/CreatePost/PublishPanel.vue';
    import LocationCm from '@components/LocationPanel.vue';
    import {
        CopyOf, HasLength
    } from "@vendor/plugin/helper";
    import {
        IS_ADMIN
    } from '@services/store/Login'

    let Service = null;

    const GET_INITIAL_FORM = () => ({
        first_title: '',
        second_title: '',
        third_title: '',
        abstract: '',
        description: '',
        slug: '',
        language: '',
        categories: [],
        category_ids: [],
    });

    const GET_INITIAL_IMAGE = () => ({
        data: null,
        preview: []
    });

    export default {
        name: 'EditArticle',
        data: () => ({
            form: GET_INITIAL_FORM(),
            images: GET_INITIAL_IMAGE(),
            removedImages: [],
            isModuleRegistered: false,
            shouldBeShowLoading: true,
            shouldBeShowSecondTitle: false,
        }),
        components: {
            IconCm,
            PublishCm,
            LocationCm,
            ImagePanelCm,
            TextEditorCm,
            TagsCm
        },
        computed: {
            ...mapGetters({
                isAdmin: IS_ADMIN
            }),
            ...mapState({
                detail: ({ EditArticleStore }) => EditArticleStore.detail,
                categories: ({ EditArticleStore }) => EditArticleStore.categories,
            }),
            currentLang() {
                return this.$route.params.lang || 'fa'
            }
        },
        methods: {
            onClickToggleSecondTitleButton() {
                this.$set( this.form, 'second_title', '' );
                this.$set( this, 'shouldBeShowSecondTitle', !this.shouldBeShowSecondTitle );
            },
            onUpdateTextEditor( HTML ) {
                this.$set(this.form, 'description', HTML);
            },
            async onClickSaveChangeButton() {
                try {
                    this.$set(this, 'shouldBeShowLoading', !this.shouldBeShowLoading);
                    let formIsValid = Service.checkFormValidation();
                    if ( formIsValid )
                        await Service.onClickSaveChangeButton();
                }
                finally {
                    this.$set(this, 'shouldBeShowLoading', !this.shouldBeShowLoading)
                }
            },
            async onClickRejectItemButton() {
                try {
                    this.$set(this, 'shouldBeShowLoading', !this.shouldBeShowLoading);
                    await Service.onClickChangeStatusArticleToRejectButton( this.form.article_id );
                } catch (e) {
                    this.$set(this, 'shouldBeShowLoading', !this.shouldBeShowLoading)
                }
            },
            async onClickChangeStatusButton() {
                try {
                    this.$set(this, 'shouldBeShowLoading', !this.shouldBeShowLoading);
                    await Service.onClickChangeStatusArticleToPendingButton( this.form.article_id );
                } catch (e) {
                    this.$set(this, 'shouldBeShowLoading', !this.shouldBeShowLoading)
                }
            },
            onClickRemoveMainImage() {
                let {
                    image_paths
                } = this.form;

                if ( HasLength( image_paths ) ) {
                    this.removedImages.push( image_paths.id );
                    this.$set(this.form, 'image_paths', {});
                }

                Object.assign(this.images, GET_INITIAL_IMAGE.apply( this ));
            },
            onChangeMainImageField( payload ) {
                this.onClickRemoveMainImage();
                this.$set( this.images, 'data', payload )
            },
            setLanguageFromParamsRouter() {
                this.$set(this.form, 'language', this.currentLang);
            },
            onChangeCategoryField( item ) {
                try {
                    this.form.category_ids = item;
                } catch (e) {}
            },
            setDataIntoForm() {
                try {
                    this.$set(this, 'form', CopyOf(this.detail));
                    this.$refs['textEditor'].setContent( this.form.description );
                    if ( !!this.form.second_title )
                        this.$set(this, 'shouldBeShowSecondTitle', true);
                } catch (e) {}
            }
        },
        async created() {
            Service = new EditArticleService( this );
            Service.processFetchAsyncData()
                .then(this.nextTick)
                .then(() => {
                    this.setLanguageFromParamsRouter();
                    this.setDataIntoForm();
                    this.$set(this, 'shouldBeShowLoading', false);
                });
        },
        beforeDestroy() {
            Service._UnregisterStoreModule();
        }
    }
</script>