<template>
    <div class="c-slider c-post w-full">
        <div class="w-full flex items-start">
            <div class="c-post__content l:m-l-25 xl:m-l-35">
                <div class="main inner-box inner-box--white w-full rounded-2 rounded-br-none rounded-bl-none">
                    <label class="block w-full">
                        <input type="text"
                               class="input input--white block w-full border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg"
                               placeholder="عنوان را اینجا وارد کنید"
                               v-model="form.first_title"
                        />
                    </label>
                </div>
                <div class="main inner-box inner-box--blue w-full rounded-2 rounded-tr-none rounded-tl-none">
                    <upload-cm :dropBox="true" @onChange="onchangeImageFile"
                    />
                    <div class="w-full m-t-15">
                        <div class="file w-full flex border border-solid rounded"
                             v-for="(file, index) in form.images"
                             :key="'slider' + index"
                        >
                            <image-cm :src="file.preview" objectFit="cover"
                                      class="file__cover flex-shrink-0 border border-solid rounded-1/2"
                                      className="w-full h-full rounded-inherit"
                            />
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
                                @click.prevent="() => {onClickReleaseItemButton(); hiddenDropdown()}"
                        >
                            انتشار
                        </button>
                    </template>
                </publish-cm>
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
    import { mapState } from "vuex";
    import { HasLength } from '@vendor/plugin/helper'
    import UploadService from '@vendor/components/upload';
    import ImageCm from '@vendor/components/image/Index.vue';
    import SelectCm from '@vendor/components/select/Index.vue';
    import UploadCm from '@vendor/components/upload/Index.vue';
    import PublishCm from '@components/CreatePost/PublishPanel.vue';
    import CreateSliderService from '@services/service/CreateSlider';

    let Service = null;

    const INITIAL_FORM = () => ({
        first_title: '',
        province_id: '',
        language: 'fa',
        images: []
    });

    export default {
        name: "CreateSlider",
        data: () => ({
            isPending: false,
            form: INITIAL_FORM(),
            isModuleRegistered: false,
        }),
        computed: {
            ...mapState({
                username: ({ UserStore }) => UserStore.username,
                provinces: ({ CreateSlider }) => CreateSlider.provinces,
            }),
            defaultProvinces() {
                return ( HasLength( this.provinces ) ) ? (
                    (Object.values( this.provinces ))[0]
                ) : ({})
            },
        },
        components: { SelectCm, PublishCm, UploadCm, ImageCm },
        methods: {
            async getImagePreviews( formData ) {
                try {
                    const fReader = await UploadService.imagePreview( formData );
                    return fReader[0].image;
                } catch ( exception ) {}
            },
            async onchangeImageFile( formData ) {
                try {
                    const FILE = formData.get('images');
                    const FILE_PREVIEW = await this.getImagePreviews( formData );
                    this.$set(this.form, 'images', [{
                        file: FILE,
                        preview: FILE_PREVIEW
                    }]);
                } catch (e) {}
            },
            onChangeDomainsField({ id }) {
                this.$set( this.form, 'province_id', id );
            },
            async onClickReleaseItemButton() {
                try {
                    this.$set(this, 'isPending', true);
                    let result = await Service.createSlider();
                    this.displayNotification(result, { type: 'success' });
                    this.pushRouter({ name: 'MANAGE_SLIDER' });
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' });
                } finally {
                    this.$set(this, 'isPending', false);
                }
            }
        },
        created() {
            Service = new CreateSliderService( this );
            Service.processFetchAsyncData()
                .then(this.$nextTick)
                .then(() => {
                    setTimeout(() => {
                        this.$set(this, 'isPending', false)
                    }, 70);
                });
        }
    }
</script>