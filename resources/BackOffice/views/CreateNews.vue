<template>
    <div class="c-news c-post w-full">
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
                        <text-cm v-model="form.description"
                        />
<!--                        <text-editor-cm @onUpdate="onUpdateTextEditor"-->
<!--                                        ref="textEditor"-->
<!--                        />-->
                    </div>
                    <div class="c-news__abstract w-full">
                        <p class="text-rum font-sm font-bold m-b-8 cursor-default">
                            چکیده
                        </p>
                        <label class="w-full block">
                            <textarea class="textarea textarea--white w-full block border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg"
                                      :class="{
                                           'direction-ltr': ( currentLang === 'en' )
                                      }"
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
                            <div class="c-post__fake_input flex-1 min-height-42 bg-zircon text-blue border-blue-100-1 rounded direction-ltr user-select-none pointer-event-none">
                                <template v-if="!!images.second.data">
                                    <span v-for="item in images.second.preview"
                                          :key="item.fileName"
                                          v-text="item.fileName"
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
                <publish-cm statusLabel="ذخیره‌نشده"
                            :isNotPublished="true"
                            :showDraftButton="true"
                            @onClickDraftButton="onClickDraftButton"
                >
                    <template #dropdown="{ hiddenDropdown }">
                        <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                @click.prevent="() => {onClickReleaseTimeButton(); hiddenDropdown();}"
                        >
                            تنظیم زمان انتشار
                        </button>
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
                <div class="panel w-full block bg-white border-2 rounded-2 border-solid"
                     v-if="shouldBeShowDatePicker"
                >
                    <p class="panel__title font-sm font-bold text-blue cursor-default">
                        زمان انتشار
                    </p>
                    <date-picker-cm type="datetime"
                                    displayFormat="jYYYY/jMM/jDD HH:mm"
                                    format="jYYYY/jMM/jDD HH:mm"
                                    :min="DatePickerMinValue"
                                    @onChange="onChangePublishDateField"
                                    placeholder="زمان انتشار را انتخاب کنید"
                    />
                </div>
                <location-cm :lang="currentLang"
                             @onPersianLang="onClickPersianLang"
                             @onEnglishLang="onClickEnglishLang"
                             :defaultLabel="locationPanelTitle"
                />
                <div class="panel w-full block bg-white border-2 rounded-2 border-solid">
                    <p class="panel__title font-sm font-bold text-blue cursor-default">
                        دسته‌بندی
                    </p>
                    <category-cm :list="categories"
                                 :lang="currentLang"
                                 ref="categoryCm"
                                 @change="onChangeCategoryField"
                    />
                </div>
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
                               :class="{
                                   'direction-ltr': ( currentLang === 'en' )
                               }"
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
                                   @onChange="onChangeDomainsField"
                                   :value="defaultProvinces.name || ''"
                                   label="name"
                        />
                    </div>
                    <p class="panel__title font-sm font-bold text-bayoux cursor-default m-0">
                        مالک مطلب: {{ username }}
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
    import CreateNewsService from '@services/service/CreateNews';
    import TextEditorCm from '@components/TextEditor.vue';
    import ImagePanelCm from '@components/ImagePanel.vue';
    import PublishCm from '@components/CreatePost/PublishPanel.vue';
    import LocationCm from '@components/LocationPanel.vue';
    import UploadService from '@vendor/components/upload';
    import UploadCm from '@vendor/components/upload/Index.vue';
    import DatePickerCm from '@components/DatePicker.vue';
    import CategoryCm from '@components/Category.vue';
    import SelectCm from '@vendor/components/select/Index.vue';
    import TextCm from '@vendor/components/textEditor/Index.vue';
    import {
        Length, toEnglishDigits, HasLength
    } from "@vendor/plugin/helper";
    import {
        IS_ADMIN
    } from '@services/store/Login';

    let Service = null;

    /**
     * @return {{category_ids: [], province_id: number, second_title: string, parent_id: string, description: string, language: string, first_title: string, abstract: string, publish_date: string, source_link: string}}
     */
    const GET_INITIAL_FORM = () => ({
        first_title: '',
        second_title: '',
        abstract: '',
        description: '',
        province_id: '',
        publish_date: '',
        source_link: '',
        parent_id: '',
        language: '',
        category_ids: [],
        slug: ''
    });

    const GET_INITIAL_IMAGE = () => ({
        data: null,
        preview: []
    });

    export default {
        name: 'CreateNews',
        data: () => ({
            form: GET_INITIAL_FORM(),
            images: {
                main: GET_INITIAL_IMAGE(),
                second: GET_INITIAL_IMAGE(),
            },
            shouldBeShowSecondTitle: false,
            shouldBeShowDatePicker: false,
            shouldBeShowLoading: false,
            isModuleRegistered: false,
            disabledEnLang: false,
            disabledFaLang: false,
        }),
        components: {
            IconCm,
            UploadCm,
            PublishCm,
            LocationCm,
            ImagePanelCm,
            TextEditorCm,
            DatePickerCm,
            CategoryCm,
            SelectCm, TextCm
        },
        computed: {
            ...mapGetters({
                isAdmin: IS_ADMIN,
            }),
            ...mapState({
                username: ({ UserStore }) => UserStore.username,
                categories: ({ CreateMenuStore }) => CreateMenuStore.categories,
                provinces: ({ CreateMenuStore }) => CreateMenuStore.provinces
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
                return this.$route.params.lang
            },
            defaultProvinces() {
                return ( HasLength( this.provinces ) ) ? (
                    (Object.values( this.provinces ))[0]
                ) : ({})
            },
            parentID() {
                return !!this.$route.params.parent_id;
            },
            locationPanelTitle() {
                return this.parentID ? 'ویرایش' : 'ایجاد'
            }
        },
        methods: {
            setInitialState() {
                Object.assign(this.form, GET_INITIAL_FORM.apply( this ));
                Object.assign(this.images.main, GET_INITIAL_IMAGE.apply( this ));
                Object.assign(this.images.second, GET_INITIAL_IMAGE.apply( this ));
                this.$refs['textEditor']?.clearContent();
                this.$refs['imagePanel']?.onClickRemoveImageButton();
                this.$refs['categoryCm']?.reset();
            },
            onClickToggleSecondTitleButton() {
                this.$set( this.form, 'second_title', '' );
                this.$set( this, 'shouldBeShowSecondTitle', !this.shouldBeShowSecondTitle );
            },
            onUpdateTextEditor( HTML ) {
                this.$set(this.form, 'description', HTML);
            },
            onClickSecondImageButton() {
                this.$refs['secondImageFiled']?.openFileDialog();
            },
            async onChangeSecondImageField( formData ) {
                try {
                    this.$set(this.images.second, 'data', formData);
                    let getImage = await UploadService.imagePreview( formData );
                    this.$set(this.images.second, 'preview', getImage);
                } catch (e) {}
            },
            onChangePublishDateField( unix ) {
                this.$set(this.form, 'publish_date', unix)
            },
            onClickPersianLang() {
                if ( this.parentID ) {
                    this.pushRouter({
                        name: 'EDIT_NEWS',
                        params: { lang: 'fa', id: this.$route.params.parent_id }
                    });
                } else {
                    this.pushRouter({
                        name: 'CREATE_NEWS',
                        params: { lang: 'fa', }
                    });
                    this.setInitialState();
                }
            },
            onClickEnglishLang() {
                if ( this.parentID ) {
                    this.pushRouter({
                        name: 'EDIT_NEWS',
                        params: { lang: 'en', id: this.$route.params.parent_id, }
                    });
                } else {
                    this.pushRouter({
                        name: 'CREATE_NEWS',
                        params: { lang: 'en', }
                    });
                    this.setInitialState();
                }
            },
            onClickReleaseTimeButton() {
                this.$set(this, 'shouldBeShowDatePicker', !this.shouldBeShowDatePicker);
            },
            async onClickChiefEditorButton() {
                try {
                    this.$set(this, 'shouldBeShowLoading', !this.shouldBeShowLoading);
                    let formIsValid = Service.checkFormValidation();
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
            onChangeDomainsField({ id }) {
                this.$set( this.form, 'province_id', id );
            },
            setLanguageFromParamsRouter() {
                this.$set(this.form, 'language', this.currentLang);
            },
            setDataFromParamsRouter() {
                let {
                    onlyEnLang, onlyFaLang, parent_id
                } = this.$route.params;
                this.$set(this.form, 'parent_id', parent_id || "");
                this.$set(this, 'disabledEnLang', !!onlyFaLang);
                this.$set(this, 'disabledFaLang', !!onlyEnLang);
            },
            onChangeCategoryField( payload ) {
                this.$set(this.form, 'category_ids', payload);
            }
        },
        async created() {
            Service = new CreateNewsService( this );
            await Service.processFetchAsyncData();
        },
        mounted() {
            this.setLanguageFromParamsRouter();
            this.setDataFromParamsRouter();
        },
        updated() {
            this.setLanguageFromParamsRouter();
            this.setDataFromParamsRouter();
        },
        beforeDestroy() {
            Service._UnregisterStoreModule();
        }
    }
</script>