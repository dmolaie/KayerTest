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
                             v-for="(file, index) in form.content_paths"
                             :key="'uploaded' + index"
                        >
                            <image-cm :src="file.preview" objectFit="cover"
                                      class="file__cover flex-shrink-0 border border-solid rounded-1/2"
                                      className="w-full h-full rounded-inherit"
                            />
                            <div class="file__content flex-1">
                                <label class="file__label block w-full">
                                    <input type="text" name="name" autocomplete="off"
                                           class="file__input input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                                           :class="{ 'direction-ltr': ( currentLang === 'en' ) }" placeholder="عنوان فایل را اینجا وارد کنید"
                                           v-model="file.title"
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
                                    title="حذف" @click.prevent="onClickRemoveUploadedFile(file.file_id, index)"
                            > </button>
                        </div>
                        <div class="file w-full flex border border-solid rounded"
                             v-for="(file, index) in form.content"
                             :key="'selected' + index"
                        >
                            <image-cm :src="file.preview" objectFit="cover"
                                      class="file__cover flex-shrink-0 border border-solid rounded-1/2"
                                      className="w-full h-full rounded-inherit"
                            />
                            <div class="file__content flex-1">
                                <label class="file__label block w-full">
                                    <input type="text" name="name" autocomplete="off"
                                           class="file__input input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                                           :class="{ 'direction-ltr': ( currentLang === 'en' ) }" placeholder="عنوان فایل را اینجا وارد کنید"
                                           v-model="file.title"
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
                                    title="حذف" @click.prevent="onClickRemoveSelectedFile( index )"
                            > </button>
                        </div>
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
                                @click.prevent="() => {onClickUpdateGalleryButton(); hiddenDropdown()}"
                        >
                            بروزرسانی
                        </button>
                        <template v-if="!form.is_published && !form.is_recycle">
                            <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                    @click.prevent="() => {onClickChangeReleaseTimeButton(); hiddenDropdown();}"
                            >
                                تنظیم زمان انتشار
                            </button>
                        </template>
                        <template v-if="form.is_published">
                            <span class="dropdown__divider"> </span>
                            <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                    @click.prevent="() => {onClickCancelGalleryButton(); hiddenDropdown()}"
                            >
                                لغو انتشار
                            </button>
                        </template>
                        <template v-else>
                            <span class="dropdown__divider"> </span>
                            <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                    @click.prevent="() => {onClickRejectGalleryButton(); hiddenDropdown()}"
                            >
                                بازگشت به نویسنده (رد)
                            </button>
                        </template>
                    </template>
                </publish-cm>
                <div class="panel w-full block bg-white border-2 rounded-2 border-solid"
                     v-if="shouldBeShowReleaseDatePicker"
                >
                    <p class="panel__title font-sm font-bold text-blue cursor-default">
                        زمان انتشار
                    </p>
                    <date-picker-cm type="datetime"
                                    displayFormat="jDD jMMMM jYYYY HH:mm"
                                    format="unix" :value="`${form.publish_date * 1e3}`"
                                    @onChange="onChangePublishDateField"
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
                                 :value="selectedCategory" :lang="currentLang"
                                 ref="categoryCm" @change="onChangeCategoryField"
                    />
                </div>
                <image-panel-cm @onChange="onChangeImageField"
                                ref="imagePanel" :value="form.image_paths || {}"
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
                 v-if="isPending"
            ></div>
        </transition>
    </div>
</template>

<script>
    import { mapState } from 'vuex';
    import { Length, HasLength, CopyOf } from '@vendor/plugin/helper';
    import EditGalleryService from '@services/service/EditGallery';
    import { GALLERY_TYPE } from '@services/service/ManageGallery';
    import StatusService from '@services/service/Status';
    import UploadService from '@vendor/components/upload';
    import CategoryCm from '@components/Category.vue';
    import ImagePanelCm from '@components/ImagePanel.vue';
    import DatePickerCm from '@components/DatePicker.vue';
    import LocationCm from '@components/LocationPanel.vue';
    import ImageCm from '@vendor/components/image/Index.vue';
    import UploadCm from '@vendor/components/upload/Index.vue';
    import SelectCm from '@vendor/components/select/Index.vue';
    import PublishCm from '@components/CreatePost/PublishPanel.vue';
    import TextEditorCm from '@vendor/components/textEditor/Index.vue';

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

    let Service = null;

    export default {
        name: "EditGallery",
        data: () => ({
            isPending: true,
            datePickerKey: 0,
            textEditorKey: 0,
            form: INITIAL_FORM(),
            fromDataName: 'content[]',
            isModuleRegistered: false,
            shouldBeShowReleaseDatePicker: false,
        }),
        components: {
            PublishCm, LocationCm, CategoryCm, TextEditorCm,
            ImagePanelCm, SelectCm, UploadCm, ImageCm, DatePickerCm
        },
        computed: {
            ...mapState({
                detail: ({ EditGallery }) => EditGallery.detail,
                provinces: ({ EditGallery }) => EditGallery.provinces,
                categories: ({ EditGallery }) => EditGallery.categories,
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
            currentLang() {
                return this.$route.params?.lang
            },
            getSelectedFiles() {
                return this.form.content;
            },
            filesLength() {
                return (
                    Length( this.getSelectedFiles ) + Length( this.form.content_paths )
                )
            },
            locationPanelTitle() {
                return this.form.has_relation ? 'ویرایش' : 'ایجاد'
            },
            selectedCategory() {
                return ( !!this.form.category_ids && HasLength( this.form.category_ids ) ) ? (
                    this.form.category_ids
                ) : ([])
            },
        },
        watch: {
            $route() {
                this.$set(this, 'isPending', true);
                Service.getGalleryItemDetails()
                    .then(this.$nextTick)
                    .then(async () => {
                        await this.setDataIntoForm();
                        this.$set(this, 'isPending', false);
                    })
                    .catch(exception => {
                        this.displayNotification(exception, { type: 'error' });
                        this.pushRouter({ name: 'MANAGE_GALLERY', params: { type: this.galleryType } });
                    })
            }
        },
        methods: {
            async setDataIntoForm() {
                await new Promise(resolve => {
                    Object.assign(this.form, INITIAL_FORM.apply( this ));
                    this.$set(this, 'form', CopyOf(this.detail));
                    this.$set(this.form, 'content', []);
                    this.$set(this.form, 'destroy_file_id', []);
                    this.$set(this.form, 'destroy_image_id', []);
                    this.$set(this, 'shouldBeShowReleaseDatePicker', !this.form.is_published);
                    this.$nextTick(() => {
                        this.$set(this, 'textEditorKey', this.textEditorKey + 1);
                        resolve();
                    })
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
                const { fromDataName } = this;
                const FILE = formData.get( fromDataName ),
                    FILE_PREVIEW = is_image && await this.getImagePreviews( formData );
                this.$set(this.form.content, Length( this.form.content ), {
                    link: '',
                    title: '',
                    file: FILE,
                    preview: FILE_PREVIEW || DEFAULT_IMAGE
                });
            },
            onClickRemoveUploadedFile(file_id, index) {
                try {
                    this.$delete(this.form.content_paths, index);
                    this.$set(this.form.destroy_file_id, Length( this.form.destroy_file_id ), file_id);
                } catch ( exception ) {}
            },
            onClickRemoveSelectedFile( index ) {
                try {
                    this.$delete(this.form.content, index);
                } catch ( exception ) {}
            },
            redirectToGalleryManage() {
                this.pushRouter({ name: 'MANAGE_GALLERY', params: { type: this.form.type } });
            },
            onClickChangeReleaseTimeButton() {
                this.$set(this, 'shouldBeShowReleaseDatePicker', !this.shouldBeShowReleaseDatePicker);
            },
            async onClickUpdateGalleryButton() {
                try {
                    this.$set(this, 'isPending', true);
                    let result = await Service.editGalleryItem( this.form.type );
                    this.displayNotification(result, { type: 'success' });
                    this.redirectToGalleryManage();
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' });
                } finally {
                    this.$set(this, 'isPending', false);
                }
            },
            async onClickCancelGalleryButton() {
                try {
                    const { media_id, type } = this.form;
                    this.$set(this, 'isPending', true);
                    let result = await Service.changeGalleryItemStatus(media_id, type, StatusService.CANCEL_STATUS);
                    this.displayNotification(result, { type: 'success' });
                    this.redirectToGalleryManage();
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' });
                } finally {
                    this.$set(this, 'isPending', false);
                }
            },
            async onClickRejectGalleryButton() {
                try {
                    const { media_id, type } = this.form;
                    this.$set(this, 'isPending', true);
                    let result = await Service.changeGalleryItemStatus(media_id, type, StatusService.REJECT_STATUS);
                    this.displayNotification(result, { type: 'success' });
                    this.redirectToGalleryManage();
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' });
                } finally {
                    this.$set(this, 'isPending', false);
                }
            },
            onChangePublishDateField( unix ) {
                this.$set(this.form, 'publish_date', unix)
            },
            onClickPersianLang() {
                const { type, has_relation, relation_id, media_id } = this.form;
                if ( has_relation ) {
                    this.pushRouter({
                        name: 'EDIT_GALLERY',
                        params: { type, lang: 'fa', id: relation_id }
                    });
                } else {
                    this.pushRouter({
                        name: 'CREATE_GALLERY',
                        params: { type, lang: 'fa', onlyFaLang: true, parent_id: media_id }
                    });
                }
            },
            onClickEnglishLang() {
                const { type, has_relation, relation_id, media_id } = this.form;
                if ( has_relation ) {
                    this.pushRouter({
                        name: 'EDIT_GALLERY',
                        params: { type, lang: 'en', id: relation_id }
                    });
                } else {
                    this.pushRouter({
                        name: 'CREATE_GALLERY',
                        params: { type, lang: 'en', onlyEnLang: true, parent_id: media_id }
                    });
                }
            },
            onChangeCategoryField( payload ) {
                this.$set(this.form, 'category_ids', payload);
            },
            removePreviousImage() {
                let { image_paths } = this.form;
                if ( HasLength( image_paths ) ) {
                    this.$set(this.form.destroy_image_id, 0, image_paths.id);
                    this.$set(this.form, 'image_paths', {});
                }
            },
            onChangeImageField( payload ) {
                this.removePreviousImage();
                this.$set(this.form, 'images', payload)
            },
            onChangeDomainsField({ id }) {
                this.$set( this.form, 'province_id', id );
            },
        },
        created() {
            Service = new EditGalleryService( this );
            Service.processFetchAsyncData()
                .then(this.$nextTick)
                .then(() => {
                    setTimeout(async () => {
                        await this.setDataIntoForm();
                        this.$set(this, 'isPending', false);
                    }, 70)
                })
        },
        beforeDestroy() {
            Service._UnregisterStoreModule();
        }
    }
</script>

<!--

[
    'media_id'         => 'required|integer|exists:media,id', *** --- OK --- ***
    'first_title'      => 'required|string', *** --- OK --- ***
    'category_ids'     => 'array|exists:categories,id', *** --- OK --- ***
    'main_category_id' => 'integer|exists:categories,id', *** --- OK --- ***
    'publish_date'     => 'required|numeric', *** --- OK --- ***
    'slug'             => 'string|unique:media', *** --- OK --- ***
    'province_id'      => 'integer|exists:provinces,id', *** --- OK --- ***
    'language'         => ['required', Rule::in(config('media.media_language'))], *** --- OK --- ***
    'images.'         => 'image|max:500',, *** --- OK --- ***
    'content.'        => 'mimetypes:application/pdf,application/msword|max:10000',, *** --- OK --- ***
    'content'          => 'array',, *** --- OK --- ***
    'description'      => 'string', *** --- OK --- ***
    'abstract'         => 'string', *** --- OK --- ***
];

-->