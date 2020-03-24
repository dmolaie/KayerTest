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
                    <div class="c-news__tags w-full"
                         v-if="false"
                    >
                        <p class="text-rum font-sm font-bold m-b-8 cursor-default">
                            افزودن تگ
                        </p>
                        <div class="c-post__tags">
                            <tags-cm :list="tags"
                                     placeholder="افزودن تگ"
                                     itemClassName="text-right"
                                     inputClassName="input input--white block w-full border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg"
                            />
                        </div>
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
                                <template v-if="!!images.second.data || !!form.secondImage">
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
                <publish-cm :published="!!form.is_published"
                            @onClickDraftButton="onClickDraftButton"
                >
                    <template #published="{ hiddenDropdown }">
                        <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                @click.prevent="() => {onClickUpdateButton(); hiddenDropdown()}"
                        >
                            بروزرسانی
                        </button>
                        <span class="dropdown__divider"> </span>
                        <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                @click.prevent="() => {onClickUnPublishButton(); hiddenDropdown()}"
                        >
                            لغو انتشار
                        </button>
                    </template>
                    <template #notPublished="{ hiddenDropdown }">
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
                />
                <div class="panel w-full block bg-white border-2 rounded-2 border-solid">
                    <p class="panel__title font-sm font-bold text-blue cursor-default">
                        دسته‌بندی
                    </p>
                    <category-cm :list="categories"
                                 :lang="currentLang"
                                 ref="categoryCm"
                                 @onChange="onChangeCategoryField"
                    />
                </div>
                <image-panel-cm @onChange="onChangeMainImageField"
                                @onDelete="onDeleteMainImageField"
                                ref="imagePanel"
                                :value="form.mainImage"
                />
                <domains-cm @onChange="onChangeDomainsField"
                            :options="provinces"
                />
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
    import TextEditorCm from '@components/TextEditor.vue';
    import ImagePanelCm from '@components/ImagePanel.vue';
    import DomainsCm from '@components/DomainsPanel.vue';
    import PublishCm from '@components/PublishPanel.vue';
    import LocationCm from '@components/LocationPanel.vue';
    import UploadService from '@vendor/components/upload';
    import UploadCm from '@vendor/components/upload/Index.vue';
    import DatePickerCm from '@components/DatePicker.vue';
    import TagsCm from '@components/Tags.vue';
    import CategoryCm from '@components/Category.vue';

    import {
        CopyOf, toEnglishDigits, Length
    } from "@vendor/plugin/helper";
    import {
        IS_ADMIN
    } from '@services/store/Login'

    let Service = null;

    const GET_INITIAL_FORM = () => ({
        news_id: '',
        first_title: '',
        second_title: '',
        abstract: '',
        description: '',
        category: '',
        source_link: '',
        province: '',
        relation_id: '',
        language: '',
        mainImage: {},
        secondImage: {},
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
            DatePickerCm,
            TagsCm,
            CategoryCm
        },
        computed: {
            ...mapGetters({
                isAdmin: IS_ADMIN
            }),
            ...mapState({
                categories: ({ EditNewsStore }) => EditNewsStore.categories,
                provinces: ({ EditNewsStore }) => EditNewsStore.provinces,
                detail: ({ EditNewsStore }) => EditNewsStore.detail,
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
                this.pushRouter({
                    name: 'CREATE_NEWS',
                    params: {
                        lang: 'fa',
                    }
                });
                this.setInitialState();
            },
            onClickEnglishLang() {
                this.pushRouter({
                    name: 'CREATE_NEWS',
                    params: {
                        lang: 'en',
                    }
                });
                this.setInitialState();
            },
            onClickReleaseTimeButton() {
                this.$set(this, 'shouldBeShowDatePicker', !this.shouldBeShowDatePicker);
            },
            async onClickUpdateButton() {
                await Service.onClickUpdateButton();
            },
            async onClickUnPublishButton() {
                await Service.onClickUnPublishButton();
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
            onDeleteMainImageField( image_id ) {
                console.log(image_id);
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
                    if ( !item.checked ) {
                        this.form.category_ids.push( item.id )
                    } else {
                        let findIndex = this.form.category_ids
                            .findIndex(cat => cat === item.id);
                        this.form.category_ids.splice(findIndex, 1)
                    }
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
            Service = new EditNewsService( this );
            Service.processFetchAsyncData()
                .then(this.$nextTick)
                .then(() => {
                    this.setLanguageFromParamsRouter();
                    this.setParentIDFromParamsRouter();
                    this.setDataIntoForm();
                    console.log(this.form);
                });
        },
        updated() {
            this.setLanguageFromParamsRouter();
            this.setParentIDFromParamsRouter();
        },
        beforeDestroy() {
            Service._UnregisterStoreModule();
        }
    }
</script>

'news_id' => 'required|integer|exists:news,id',
'first_title' => 'required|string',
'second_title' => 'string',
'abstract' => 'string',
'description' => 'string',
'category_ids' => 'array|exists:categories,id',
'main_category_id' => 'integer|exists:categories,id',
'publish_date' => 'required|numeric',
'source_link' => 'url',
'province_id' => 'required|integer|exists:provinces,id',
'language' => ['required', Rule::in(config('news.news_language'))],
'images.*' => 'image'