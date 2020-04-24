<template>
    <div class="c-news c-post w-full">
        <div class="w-full flex items-start">
            <div class="c-post__content l:m-l-25 xl:m-l-35">
                <div class="main inner-box inner-box--white w-full rounded-2 rounded-br-none rounded-bl-none">
                    <label class="block w-full">
                        <input type="text"
                               class="input input--white block w-full border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg"
                               :class="{ 'direction-ltr': ( currentLang === 'en' ) }"
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
                                   :class="{ 'direction-ltr': ( currentLang === 'en' ) }"
                                   placeholder="عنوان دوم را اینجا وارد کنید"
                                   v-model="form.second_title"
                            />
                        </label>
                    </transition>
                    <div class="w-full border-blue-100-1 rounded m-t-15">
                        <text-editor-cm v-model="form.description"
                                        :lang="currentLang"
                                        :key="'text-editor' + textEditorKey"
                        />
                    </div>
                    <div class="c-news__abstract w-full">
                        <p class="text-rum font-sm font-bold m-b-8 cursor-default">
                            چکیده
                        </p>
                        <label class="w-full block">
                            <textarea class="textarea textarea--white w-full block border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg"
                                      :class="{ 'direction-ltr': ( currentLang === 'en' ) }"
                                      v-model="form.abstract"
                            > </textarea>
                        </label>
                    </div>
                </div>
                <div class="main inner-box inner-box--blue w-full rounded-2 rounded-tr-none rounded-tl-none">
                    <div class="w-full">
                        <p class="text-rum font-sm font-bold m-b-8 cursor-default">
                            عکس دوم
                        </p>
                        <div class="flex items-start">
                            <upload-cm @onChange="onChangeSecondImageField"
                                       ref="secondImageFiled"
                            />
                            <button class="c-news__second-image w-1/4 xl:w-1/5 flex-shrink-0 bg-zircon text-blue border-blue-100-1 rounded font-sm font-medium text-center m-l-20 l:hover:bg-white l:transition-bg user-select-none"
                                    @click.prevent="onClickSecondImageButton"
                            >
                                انتخاب عکس
                            </button>
                            <div class="c-post__fake_input relative flex-1 min-height-42 bg-zircon text-blue border-blue-100-1 rounded direction-ltr user-select-none overflow-hidden text-nowrap text-ellipsis">
                                <template v-if="!!images.second.data">
                                    <button class="c-post__remove_button absolute"
                                            @click.stop="onClickRemoveSecondImage"
                                    > </button>
                                    <span v-for="item in images.second.preview"
                                          :key="item.fileName"
                                          v-text="item.fileName"
                                          class="font-sm font-medium text-bayoux"
                                    > </span>
                                </template>
                                <template v-else-if="!!form.secondImage && form.secondImage.fileName">
                                    <button class="c-post__remove_button absolute"
                                            @click.stop="onClickRemoveSelectedSecondImage( form.secondImage.id )"
                                    > </button>
                                    <span v-text="form.secondImage.fileName"
                                          class="font-sm font-medium text-bayoux"
                                    > </span>
                                </template>
                            </div>
                        </div>
                    </div>
                    <div class="c-news__source w-full">
                        <p class="text-rum font-sm font-bold m-b-8 cursor-default">
                            منبع
                        </p>
                        <label class="block w-full">
                            <input type="text"
                                   class="input input--white block w-full border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg direction-ltr"
                                   placeholder="منبع عکس را اینجا وارد کنید"
                                   v-model="form.source_link"
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
                            :statusLabel="form.status || ''"
                            buttonLabel="بروزرسانی"
                >
                    <template #dropdown="{ hiddenDropdown }">
                        <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                @click.prevent="() => {onClickUpdateButton(); hiddenDropdown()}"
                        >
                            بروزرسانی
                        </button>
                        <template v-if="!form.is_published && !form.is_recycle">
                            <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                    @click.prevent="() => {onClickReleaseTimeButton(); hiddenDropdown();}"
                            >
                                تنظیم زمان انتشار
                            </button>
                        </template>
                        <template v-if="form.is_published">
                            <span class="dropdown__divider"> </span>
                            <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                    @click.prevent="() => {onClickUnPublishButton(); hiddenDropdown()}"
                            >
                                لغو انتشار
                            </button>
                        </template>
                        <template v-else>
                            <span class="dropdown__divider"> </span>
                            <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                    @click.prevent="() => {onClickRejectItemButton(); hiddenDropdown()}"
                            >
                                بازگشت به نویسنده (رد)
                            </button>
                        </template>
                    </template>
                </publish-cm>
                <div class="panel w-full block bg-white border-2 rounded-2 border-solid"
                     v-if="shouldBeShowDatePicker"
                >
                    <p class="panel__title font-sm font-bold text-blue cursor-default">
                        زمان انتشار
                    </p>
                    <date-picker-cm displayFormat="jDD jMMMM jYYYY HH:mm"
                                    format="unix" type="datetime" :value="`${form.publish_date * 1e3}`"
                                    :min="DatePickerMinValue" @onChange="onChangePublishDateField"
                                    placeholder="زمان انتشار را انتخاب کنید"
                    />
                </div>
                <location-cm :lang="currentLang"
                             @onPersianLang="onClickPersianLang"
                             @onEnglishLang="onClickEnglishLang"
                             :defaultLabel="LocationPanelTitle"
                />
                <div class="panel w-full block bg-white border-2 rounded-2 border-solid">
                    <p class="panel__title font-sm font-bold text-blue cursor-default">
                        دسته‌بندی
                    </p>
                    <category-cm :list="categories"
                                 :value="selectedCategory"
                                 :lang="currentLang"
                                 ref="categoryCm"
                                 @change="onChangeCategoryField"
                    />
                </div>
                <image-panel-cm @change="onChangeMainImageField"
                                ref="imagePanel"
                                :value="form.mainImage"
                />
                <div class="panel w-full block bg-white border-2 rounded-2 border-solid">
                    <p class="panel__title font-sm font-bold text-blue cursor-default">
                        نامک
                    </p>
                    <label class="block w-full">
                        <input type="text"
                               class="input input--white block w-full border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg direction-rtl"
                               :class="{ 'direction-ltr': ( currentLang === 'en' ) }"
                               placeholder="نامک را اینجا وارد کنید"
                               v-model="form.slug"
                        />
                    </label>
                </div>
                <div class="domains panel relative w-full block bg-white border-2 rounded-2 border-solid">
                    <p class="panel__title font-sm font-bold text-blue cursor-default">
                        متفرقه
                    </p>
                    <p class="panel__title font-sm font-bold text-bayoux cursor-default">
                        دامنه
                    </p>
                    <div class="panel__title">
                        <select-cm :options="provinces"
                                   placeholder="دامنه مورد نظر خود را انتخاب کنید"
                                   @onChange="onUpdateDomainsField"
                                   :value="form.province_name || ''"
                                   label="name" ref="provinces"
                        />
                    </div>
                    <p class="panel__title font-sm font-bold text-bayoux cursor-default m-0">
                        مالک مطلب: {{ form.publisher_name }}
                    </p>
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
    import IconCm from '@components/Icon.vue';
    import EditNewsService from '@services/service/EditNews';
    import TextEditorCm from '@vendor/components/textEditor/Index.vue';
    import ImagePanelCm from '@components/CreatePost/ImagePanel.vue';
    import PublishCm from '@components/CreatePost/PublishPanel.vue';
    import LocationCm from '@components/LocationPanel.vue';
    import UploadService from '@vendor/components/upload';
    import UploadCm from '@vendor/components/upload/Index.vue';
    import SelectCm from '@vendor/components/select/Index.vue';
    import CategoryCm from '@components/Category.vue';
    import DatePickerCm from '@components/DatePicker.vue';
    import {
        CopyOf, HasLength
    } from "@vendor/plugin/helper";
    import {
        IS_ADMIN
    } from '@services/store/Login';

    let Service = null;

    const GET_INITIAL_FORM = () => ({
        news_id: '',
        first_title: '',
        second_title: '',
        abstract: '',
        description: '',
        category: [],
        source_link: '',
        province_id: '',
        province_name: '',
        relation_id: '',
        language: '',
        mainImage: {},
        secondImage: {},
        slug: '',
        publish_date: ''
    });

    const GET_INITIAL_IMAGE = () => ({
        data: null,
        preview: []
    });

    export default {
        name: 'EditNews',
        data: () => ({
            isModuleRegistered: false,
            form: GET_INITIAL_FORM(),
            images: {
                main: GET_INITIAL_IMAGE(),
                second: GET_INITIAL_IMAGE(),
            },
            removedImages: [],
            custom_publish_date: '',
            shouldBeShowSecondTitle: false,
            shouldBeShowDatePicker: false,
            shouldBeShowLoading: true,
            textEditorKey: 0,
        }),
        components: {
            IconCm,
            UploadCm,
            PublishCm,
            LocationCm,
            ImagePanelCm,
            TextEditorCm,
            SelectCm,
            CategoryCm,
            DatePickerCm
        },
        computed: {
            ...mapGetters({
                isAdmin: IS_ADMIN
            }),
            ...mapState({
                categories: ({ EditNewsStore }) => EditNewsStore.categories,
                provinces: ({ EditNewsStore }) => EditNewsStore.provinces,
                detail: ({ EditNewsStore }) => EditNewsStore.detail,
                username: ({ UserStore }) => UserStore.username,
            }),
            currentLang() {
                return this.$route.params.lang
            },
            selectedCategory() {
                return ( !!this.form.category_ids && HasLength( this.form.category_ids ) ) ? (
                    this.form.category_ids
                ) : ([])
            },
            /**
             * @return {string}
             */
            LocationPanelTitle() {
                return (
                    this.form.has_relation ? 'ویرایش' : 'ایجاد'
                )
            },
            DatePickerMinValue() {
                const NOW_TIMESTAMP = new Date().getTime();
                return NOW_TIMESTAMP.toString()
            },
        },
        watch: {
            $route() {
                this.$set(this, 'shouldBeShowLoading', true);
                Service.processFetchAsyncData()
                    .then(this.$nextTick)
                    .then(() => {
                        this.setLanguageFromParamsRouter();
                        this.setDataIntoForm();
                        this.$set(this, 'shouldBeShowLoading', false);
                    });
            }
        },
        methods: {
            onClickToggleSecondTitleButton() {
                this.$set( this.form, 'second_title', '' );
                this.$set( this, 'shouldBeShowSecondTitle', !this.shouldBeShowSecondTitle );
            },
            onClickSecondImageButton() {
                this.$refs['secondImageFiled']?.openFileDialog();
            },
            async onChangeSecondImageField( formData ) {
                try {
                    this.onClickRemoveSecondImage();
                    this.$set(this.images.second, 'data', formData);
                    let getImage = await UploadService.imagePreview( formData );
                    this.$set(this.images.second, 'preview', getImage);
                } catch (e) {}
            },
            onClickRemoveSecondImage() {
                let {
                    secondImage
                } = this.form;

                if ( HasLength( secondImage.fileName ) )
                    this.onClickRemoveSelectedSecondImage( secondImage.id );

                Object.assign(this.images.second, GET_INITIAL_IMAGE.apply( this ));
            },
            onClickRemoveSelectedSecondImage( image_id ) {
                try {
                    this.removedImages.push( image_id );
                    this.$set(this.form, 'secondImage', {});
                } catch (e) {}
            },
            onChangePublishDateField( unix ) {
                this.$set(this, 'custom_publish_date', unix)
            },
            onClickPersianLang() {
                if ( this.form.has_relation ) {
                    this.pushRouter({
                        name: 'EDIT_NEWS',
                        params: {
                            lang: 'fa',
                            id: this.form.relation_id,
                        }
                    });
                } else {
                    this.pushRouter({
                        name: 'CREATE_NEWS',
                        params: {
                            lang: 'fa',
                            onlyFaLang: true,
                            parent_id: this.form.news_id,
                        }
                    });
                }
            },
            onClickEnglishLang() {
                if ( this.form.has_relation ) {
                    this.pushRouter({
                        name: 'EDIT_NEWS',
                        params: {
                            lang: 'en',
                            id: this.form.relation_id,
                        }
                    });
                } else {
                    this.pushRouter({
                        name: 'CREATE_NEWS',
                        params: {
                            lang: 'en',
                            onlyEnLang: true,
                            parent_id: this.form.news_id,
                        }
                    });
                }
            },
            onClickReleaseTimeButton() {
                this.$set(this, 'shouldBeShowDatePicker', !this.shouldBeShowDatePicker);
            },
            async onClickUpdateButton() {
                try {
                    this.$set(this, 'shouldBeShowLoading', !this.shouldBeShowLoading);
                    let formIsValid = Service.checkFormValidation();
                    if ( formIsValid ) await Service.onClickUpdateButton();
                }
                finally {
                    this.$set(this, 'shouldBeShowLoading', !this.shouldBeShowLoading)
                }
            },
            async onClickRejectItemButton() {
                try {
                    this.$set(this, 'shouldBeShowLoading', !this.shouldBeShowLoading);
                    await Service.onClickRejectItemButton( this.form.news_id );
                } finally {
                    this.$set(this, 'shouldBeShowLoading', !this.shouldBeShowLoading);
                }
            },
            async onClickUnPublishButton() {
                try {
                    this.$set(this, 'shouldBeShowLoading', !this.shouldBeShowLoading);
                    await Service.onClickChangeStatusButton( this.form.news_id );
                }
                finally {
                    this.$set(this, 'shouldBeShowLoading', !this.shouldBeShowLoading);
                }
            },
            onChangeMainImageField( payload ) {
                this.onClickRemoveMainImage();
                this.$set( this.images.main, 'data', payload )
            },
            onClickRemoveMainImage() {
                let {
                    mainImage
                } = this.form;

                if ( HasLength( mainImage ) ) {
                    this.removedImages.push( mainImage.id );
                    this.$set(this.form, 'mainImage', {});
                }

                Object.assign(this.images.main, GET_INITIAL_IMAGE.apply( this ));
            },
            onChangeDomainsField( id ) {
                this.$set( this.form, 'province_id', id );
            },
            onUpdateDomainsField({ id }) {
                this.$set( this.form, 'province_id', id );
            },
            setLanguageFromParamsRouter() {
                this.$set(this.form, 'language', this.currentLang);
            },
            onChangeCategoryField( payload ) {
                try {
                    this.$set(this.form, 'category_ids', payload);
                } catch (e) {}
            },
            setDataIntoForm() {
                try {
                    this.$set(this, 'form', CopyOf(this.detail));
                    if ( !!this.form.second_title ) this.$set(this, 'shouldBeShowSecondTitle', true);
                    this.$set(this, 'shouldBeShowDatePicker', !this.form.is_published);
                    this.$nextTick(() => {
                        this.$set(this, 'textEditorKey', this.textEditorKey + 1);
                    })
                } catch (e) {}
            }
        },
        async created() {
            Service = new EditNewsService( this );
            Service.processFetchAsyncData()
                .then(this.$nextTick)
                .then(() => {
                    this.setLanguageFromParamsRouter();
                    this.setDataIntoForm();
                    this.$set(this, 'shouldBeShowLoading', false);
                });
        },
        updated() {
            this.setLanguageFromParamsRouter();
        },
        beforeDestroy() {
            Service._UnregisterStoreModule();
        }
    }
</script>