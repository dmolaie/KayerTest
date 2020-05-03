<template>
    <div class="c-gallery c-post w-full">
        <div class="w-full flex items-start">
            <div class="c-post__content l:m-l-25 xl:m-l-35">
                <div class="main inner-box inner-box--white w-full rounded-2 rounded-br-none rounded-bl-none">
                    <label class="block w-full">
                        <input type="text"
                               class="input input--white block w-full border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg"
                               :class="{ 'direction-ltr': ( form.language === 'en' ) }"
                               placeholder="عنوان را اینجا وارد کنید"
                               v-model="form.first_title"
                        />
                    </label>
                    <div class="w-full border-blue-100-1 rounded m-t-15"
                         v-if="isTextType"
                    >
                        <text-editor-cm v-model="form.description"
                                        :lang="form.language"
                                        :key="'text-editor' + textEditorKey"
                        />
                    </div>
                    <div class="c-news__abstract w-full">
                        <p class="text-rum font-sm font-bold m-b-8 cursor-default">
                            چکیده
                        </p>
                        <label class="w-full block">
                            <textarea class="textarea textarea--white w-full block border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg"
                                      :class="{ 'direction-ltr': ( form.language === 'en' ) }"
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
                                   accept="audio/mp3, audio/wave, audio/wma, audio/mpga"
                                   @onChange="onchangeAudioFile"
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
                                   accept="application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                                   @onChange="onchangeTextFile"
                        />
                    </template>
                    <div class="w-full m-t-15">
                        <div class="file w-full flex border border-solid rounded"
                             v-for="(_, index) in getSelectedFiles"
                             :key="'audio' + index"
                        >
                            <image-cm :src="form.filesDes[index] || DEFAULT_IMAGE" objectFit="cover"
                                      class="file__cover flex-shrink-0 border border-solid rounded-1/2"
                                      className="w-full h-full rounded-inherit"
                            />
                            <div class="file__content flex-1">
                                <label class="file__label block w-full">
                                    <input type="text" name="name" autocomplete="off"
                                           class="file__input input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                                           :class="{ 'direction-ltr': ( form.language === 'en' ) }" placeholder="عنوان فایل را اینجا وارد کنید"
                                    />
                                </label>
                                <label class="file__label block w-full">
                                    <input type="text" name="source" autocomplete="off"
                                           class="file__input input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                                           placeholder="لینک مرجع را اینجا وارد کنید"
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
                <location-cm :lang="form.language"
                             @onPersianLang="onClickPersianLang"
                             @onEnglishLang="onClickEnglishLang"
                             :defaultLabel="locationPanelTitle"
                />
                <div class="panel w-full block bg-white border-2 rounded-2 border-solid">
                    <p class="panel__title font-sm font-bold text-blue cursor-default">
                        دسته‌بندی
                    </p>
                    <category-cm :list="categories"
                                 :value="selectedCategory" :lang="form.language"
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
                               :class="{ 'direction-ltr': ( form.language === 'en' ) }"
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
    import LocationCm from '@components/LocationPanel.vue';
    import ImageCm from '@vendor/components/image/Index.vue';
    import UploadCm from '@vendor/components/upload/Index.vue';
    import SelectCm from '@vendor/components/select/Index.vue';
    import PublishCm from '@components/CreatePost/PublishPanel.vue';
    import TextEditorCm from '@vendor/components/textEditor/Index.vue';

    const INITIAL_FORM = () => ({
        first_title: '',
        abstract: '',
        description: '',
        filesDes: [],
        files: new FormData(),
        category_ids: [],
        images: null,
        slug: '',
        parent_id: '',
        language: '',
    });

    let Service = null;

    export default {
        name: "EditGallery",
        data: () => ({
            form: INITIAL_FORM(),
            fromDataName: 'content[]',
            isPending: true,
            isModuleRegistered: false,
            removedImages: [],
            textEditorKey: 0,
        }),
        components: {
            PublishCm, LocationCm, CategoryCm, TextEditorCm,
            ImagePanelCm, SelectCm, UploadCm, ImageCm
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
            getSelectedFiles() {
                return [];
                // return this.form.files.getAll( this.fromDataName );
            },
            filesLength() {
                return Length( this.getSelectedFiles )
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
        methods: {
            async setDataIntoForm() {
                await new Promise(resolve => {
                    this.$set(this, 'form', CopyOf(this.detail));
                    this.$nextTick(() => {
                        this.$set(this, 'textEditorKey', this.textEditorKey + 1);
                        resolve();
                    })
                })
            },
            async getImagePreviews( formData ) {
                try {
                    const fReader = await UploadService.imagePreview(formData, this.fromDataName);
                    this.form.filesDes.push(fReader[0].image);
                } catch ( exception ) {}
            },
            onchangeAudioFile( formData ) {
                this.onchangeFiles( formData );
            },
            onchangeImageFile( formData ) {
                this.onchangeFiles( formData );
                this.getImagePreviews( formData );
            },
            onchangeVideoFile( formData ) {
                this.onchangeFiles( formData );
                this.getImagePreviews( formData );
            },
            onchangeTextFile( formData ) {
                this.onchangeFiles( formData );
            },
            onchangeFiles( formData ) {
                const { getSelectedFiles, fromDataName } = this;
                const FORM_DATA = new FormData();
                if (!!getSelectedFiles && HasLength( getSelectedFiles ))
                    getSelectedFiles.map(file => FORM_DATA.append(fromDataName, file));
                FORM_DATA.append(fromDataName, formData.get( fromDataName ));
                this.$set(this.form, 'files', FORM_DATA);
            },
            onClickRemoveUploadedFile( index ) {
                try {
                    this.getSelectedFiles.splice(index, 1);
                    const FORM_DATA = new FormData();
                    this.getSelectedFiles.map(file => FORM_DATA.append(this.fromDataName, file));
                    this.$set(this.form, 'files', FORM_DATA);
                    this.form.filesDes.splice(index, 1);
                } catch ( exception ) { }
            },
            async onClickUpdateGalleryButton() {
                try {

                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' });
                }
            },
            async onClickCancelGalleryButton() {
                try {
                    // this.$set(this, 'isPending', true);
                    // let result = Service.changeGalleryItemStatus(media_id, media_type, StatusService.CANCEL_STATUS);
                    // this.displayNotification(result, { type: 'success' });
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' });
                } finally {
                    this.$set(this, 'isPending', false);
                }
            },
            async onClickRejectGalleryButton() {
                try {
                    // this.$set(this, 'isPending', true);
                    // let result = Service.changeGalleryItemStatus(media_id, media_type, StatusService.REJECT_STATUS);
                    // this.displayNotification(result, { type: 'success' });
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' });
                } finally {
                    this.$set(this, 'isPending', false);
                }
            },
            onClickPersianLang() {

            },
            onClickEnglishLang() {

            },
            onChangeCategoryField( payload ) {
                this.$set(this.form, 'category_ids', payload);
            },
            removeSelectedImage() {
                let { image_paths } = this.form;
                if ( HasLength( image_paths ) ) {
                    this.removedImages.push( image_paths.id );
                    this.$set(this.form, 'image_paths', {});
                }
            },
            onChangeImageField( payload ) {
                this.removeSelectedImage();
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
        mounted() {
            this.$nextTick(() => {
                this.displayNotification('این قابلیت در حال حاظر تکمیل نشده است.', { type: 'warn' })
            })
        },
        beforeDestroy() {
            Service._UnregisterStoreModule();
        }
    }
</script>

<!--

[
    'media_id'         => 'required|integer|exists:media,id',
    'first_title'      => 'required|string',
    'category_ids'     => 'array|exists:categories,id',
    'main_category_id' => 'integer|exists:categories,id',
    'publish_date'     => 'required|numeric',
    'slug'             => 'string|unique:media',
    'province_id'      => 'integer|exists:provinces,id',
    'language'         => ['required', Rule::in(config('media.media_language'))],
    'images.'         => 'image|max:500',
    'content.'        => 'mimetypes:application/pdf,application/msword|max:10000',
    'content'          => 'array',
    'description'      => 'string',
    'abstract'         => 'string',
];

-->