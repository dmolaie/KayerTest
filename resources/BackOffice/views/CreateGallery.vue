<template>
    <div class="c-gallery c-post w-full">
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
                    <div class="w-full border-blue-100-1 rounded m-t-15"
                         v-if="isTextType"
                    >
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
                    <p class="text-rum font-sm font-bold m-b-8 cursor-default">
                        فایل‌های ضمیمه ({{ filesLength }})
                    </p>
                    <template v-if="isAudioType">
                        <upload-cm :dropBox="true" :fieldName="fromDataName"
                                   accept="audio/mp3, audio/wave, audio/wma, audio/mpga, audio/mpeg, audio/mpeg3"
                                   @onChange="onchangeAudioFile" acceptType="mp3 | wave | wma"
                        />
                    </template>
                    <template v-if="isImagesType">
                        <upload-cm :dropBox="true" :fieldName="fromDataName"
                                   @onChange="onchangeImageFile"
                        />
                    </template>
                    <template v-if="isVideoType">
                        <upload-cm :dropBox="true" :fieldName="fromDataName"
                                   @onChange="onchangeVideoFile"
                        />
                    </template>
                    <template v-if="isTextType">
                        <upload-cm :dropBox="true" :fieldName="fromDataName"
                                   accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,.doc,.docx"
                                   @onChange="onchangeTextFile" acceptType="pdf | doc | docx"
                        />
                    </template>
                    <div class="w-full m-t-15">
                        <div class="file w-full flex border border-solid rounded"
                             v-for="(file, index) in form.content"
                             :key="'audio' + index"
                        >
                            <image-cm :src="file.preview" objectFit="cover"
                                      class="file__cover flex-shrink-0 border border-solid rounded-1/2"
                                      className="w-full h-full rounded-inherit"
                            />
                            <div class="file__content flex-1">
                                <label class="file__label block w-full">
                                    <input type="text" name="name" autocomplete="off"
                                           class="file__input input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                                           :class="{ 'direction-ltr': ( currentLang === 'en' ) }" placeholder="عنوان فایل را اینجا وارد کنید" v-model="file.title"
                                    />
                                </label>
                                <label class="file__label block w-full">
                                    <input type="text" name="source" autocomplete="off"
                                           class="file__input input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                                           placeholder="لینک مرجع را اینجا وارد کنید" v-model="file.link"
                                    />
                                </label>
                            </div>
                            <button class="file__button relative flex-shrink-0 border border-solid rounded-1/2 l:transition-bg"
                                    title="حذف" @click.prevent="onClickRemoveUploadedFile( index )"
                            > </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="c-post__panel w-1/3 xl:w-1/4">
                <publish-cm statusLabel="ذخیره‌نشده"
                            :isNotPublished="true"
                >
                    <template #dropdown="{ hiddenDropdown }">
                        <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                @click.prevent="() => {onClickChangeReleaseTimeButton(); hiddenDropdown();}"
                        >
                            تنظیم زمان انتشار
                        </button>
                        <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                @click.prevent="() => {onClickReleaseItemButton(); hiddenDropdown()}"
                        >
                            {{ isAdmin ? 'انتشار' : 'ارسال به سردبیر' }}
                        </button>
                    </template>
                </publish-cm>
                <div class="panel w-full block bg-white border-2 rounded-2 border-solid"
                     v-if="shouldBeShowReleaseDatePicker"
                >
                    <p class="panel__title font-sm font-bold text-blue cursor-default">
                        زمان انتشار
                    </p>
                    <date-picker-cm type="datetime"
                                    displayFormat="dddd jDD jMMMM jYYYY HH:mm" format="unix"
                                    @onChange="onChangePublishDateField" :value="minValuePublishDate"
                                    :key="'publishDate' + datePickerKey" placeholder="زمان انتشار را انتخاب کنید"
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
                <image-panel-cm @onChange="onChangeImageField"
                                ref="imagePanel"
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
                                   @onChange="onChangeDomainsField"
                                   :value="defaultProvinces.name || ''"
                                   label="name" ref="provinces"
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
                 v-if="isPending"
            ></div>
        </transition>
    </div>
</template>

<script>
    import { mapGetters, mapState } from 'vuex';
    import { HasLength, Length } from '@vendor/plugin/helper';
    import { GALLERY_TYPE } from '@services/service/ManageGallery';
    import CreateGalleryService from '@services/service/CreateGallery';
    import UploadService from '@vendor/components/upload';
    import CategoryCm from '@components/Category.vue';
    import DatePickerCm from '@components/DatePicker.vue';
    import ImagePanelCm from '@components/ImagePanel.vue';
    import LocationCm from '@components/LocationPanel.vue';
    import ImageCm from '@vendor/components/image/Index.vue';
    import UploadCm from '@vendor/components/upload/Index.vue';
    import SelectCm from '@vendor/components/select/Index.vue';
    import PublishCm from '@components/CreatePost/PublishPanel.vue';
    import TextEditorCm from '@vendor/components/textEditor/Index.vue';

    let Service = null;

    const DEFAULT_IMAGE = '/images/img_default.jpg';
    const INITIAL_FORM = () => ({
        first_title: '',
        abstract: '',
        description: '',
        content: [],
        category_ids: [],
        images: null,
        slug: '',
        parent_id: '',
        publish_date: '',
    });

    export default {
        name: "CreateGallery",
        data: () => ({
            form: INITIAL_FORM(),
            isPending: true,
            isModuleRegistered: false,
            fromDataName: 'content[]',
            textEditorKey: 0,
            datePickerKey: 0,
            shouldBeShowReleaseDatePicker: false
        }),
        components: {
            PublishCm, LocationCm, CategoryCm, TextEditorCm,
            ImagePanelCm, SelectCm, UploadCm, ImageCm,
            DatePickerCm
        },
        watch: {
            $route() {
                this.setInitialState();
            }
        },
        computed: {
            ...mapGetters({ isAdmin: 'IS_ADMIN' }),
            ...mapState({
                username: ({ UserStore }) => UserStore.username,
                provinces: ({ CreateGalleryStore }) => CreateGalleryStore.provinces,
                categories: ({ CreateGalleryStore }) => CreateGalleryStore.categories,
            }),
            galleryType() {
                return this.$route.params.type
            },
            isAudioType() {
                return this.galleryType === GALLERY_TYPE['voice'].name_en;
            },
            isImagesType() {
                return this.galleryType === GALLERY_TYPE['image'].name_en;
            },
            isVideoType() {
                return this.galleryType === GALLERY_TYPE['video'].name_en;
            },
            isTextType() {
                return this.galleryType === GALLERY_TYPE['text'].name_en;
            },
            getSelectedFiles() {
                return this.form.content;
            },
            filesLength() {
                return Length( this.getSelectedFiles )
            },
            currentLang() {
                return this.$route?.params?.lang
            },
            locationPanelTitle() {
                return !!this.$route.params.parent_id ? 'ویرایش' : 'ایجاد'
            },
            defaultProvinces() {
                return ( HasLength( this.provinces ) ) ? (
                    (Object.values( this.provinces ))[0]
                ) : ({})
            },
            minValuePublishDate() {
                const NOW_TIMESTAMP = new Date().getTime();
                return NOW_TIMESTAMP.toString()
            }
        },
        methods: {
            setDataFromParamsRouter() {
                let { parent_id } = this.$route.params;
                this.$set(this.form, 'parent_id', parent_id || "");
            },
            setInitialState() {
                Object.assign(this.form, INITIAL_FORM.apply( this ));
                this.$refs['categoryCm']?.reset();
                this.$refs['provinces']?.resetValue();
                this.$refs['imagePanel']?.onClickRemoveImageButton();
                this.$nextTick(() => {
                    this.$set(this, 'textEditorKey', this.textEditorKey + 1);
                    this.setDataFromParamsRouter();
                })
            },
            async getImagePreviews( formData ) {
                try {
                    const fReader = await UploadService.imagePreview(formData, this.fromDataName);
                    return fReader[0].image;
                } catch ( exception ) {}
            },
            onchangeAudioFile( formData ) {
                this.onchangeFiles( formData );
            },
            onchangeImageFile( formData ) {
                this.onchangeFiles(formData, true);
            },
            onchangeVideoFile( formData ) {
                this.onchangeFiles(formData, true);
            },
            onchangeTextFile( formData ) {
                this.onchangeFiles( formData );
            },
            async onchangeFiles(formData, is_image = false) {
                const { fromDataName, filesLength } = this;
                const FILE = formData.get( fromDataName ),
                      FILE_PREVIEW = is_image && await this.getImagePreviews( formData );
                this.$set(this.form.content, filesLength, {
                    link: '',
                    title: '',
                    file: FILE,
                    preview: FILE_PREVIEW || DEFAULT_IMAGE
                });
            },
            onClickRemoveUploadedFile( index ) {
                try {
                    this.$delete(this.form.content, index);
                } catch ( exception ) {}
            },
            onClickChangeReleaseTimeButton() {
                this.$set(this.form, 'publish_date', '');
                this.$set(this, 'shouldBeShowReleaseDatePicker', !this.shouldBeShowReleaseDatePicker);
            },
            async onClickReleaseItemButton() {
                try {
                    this.$set(this, 'isPending', true);
                    let result = await Service.createGalleryItem( this.galleryType );
                    this.displayNotification(result, { type: 'success' });
                    this.pushRouter({ name: 'MANAGE_GALLERY', params: { type: this.galleryType } });
                } catch ( exception ) {
                    this.$set(this, 'isPending', false);
                    this.displayNotification(exception, { type: 'error' })
                }
            },
            onChangePublishDateField( unix ) {
                this.$set(this.form, 'publish_date', unix)
            },
            onClickPersianLang() {
                const { parent_id } = this.$route.params;
                if ( parent_id ) {
                    this.pushRouter({
                        name: 'EDIT_GALLERY',
                        params: { type: this.galleryType, lang: 'fa', id: parent_id }
                    });
                } else {
                    this.pushRouter({
                        name: "CREATE_GALLERY",
                        params: { lang: 'fa', type: this.galleryType }
                    })
                }
            },
            onClickEnglishLang() {
                const { parent_id } = this.$route.params;
                if ( parent_id ) {
                    this.pushRouter({
                        name: 'EDIT_GALLERY',
                        params: { type: this.galleryType, lang: 'en', id: parent_id }
                    });
                } else {
                    this.pushRouter({
                        name: "CREATE_GALLERY",
                        params: { lang: 'en', type: this.galleryType }
                    })
                }
            },
            onChangeCategoryField( payload ) {
                this.$set(this.form, 'category_ids', payload);
            },
            onChangeImageField( payload ) {
                this.$set(this.form, 'images', payload)
            },
            onChangeDomainsField({ id }) {
                this.$set( this.form, 'province_id', id );
            },
        },
        created() {
            Service = new CreateGalleryService( this );
            Service.processFetchAsyncData()
                .then(this.$nextTick)
                .then(() => {
                    this.$set(this, 'isPending', false);
                    this.setDataFromParamsRouter();
                })
        },
        beforeDestroy() {
            Service._UnregisterStoreModule();
        }
    }
</script>