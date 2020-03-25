<template>
    <div class="image-p panel w-full block bg-white border-2 rounded-2 border-solid">
        <div class="panel__title font-sm font-bold text-blue cursor-default">
            تصویر شاخص
        </div>
        <upload-cm @onChange="onChangeImageField"
                   ref="uploadCm"
        />
        <button class="image-p__submit block w-3/4 text-white font-sm font-bold bg-blue-100 border-blue-1 rounded text-center l:transition-bg l:hover:bg-blue m-0-auto user-select-none"
                @click.prevent="onClickOpenFileDialogButton"
        >
            انتخاب عکس
        </button>
        <transition name="fade">
            <div class="image-p__preview"
                 v-if="!!selectedImage.fileName"
            >
                <image-cm
                        class="image-p__image w-full block rounded"
                        :src="selectedImage.image"
                        className="w-full h-full block rounded-inherit"
                />
                <button class="block m-0-auto text-red font-sm font-bold user-select-none"
                        v-text="'تخلیه‌ی عکس'"
                        @click.prevent="onClickRemoveImageButton"
                > </button>
            </div>
        </transition>
    </div>
</template>

<script>
    import ImageCm from '@vendor/components/image/Index.vue';
    import UploadService from '@vendor/components/upload';
    import UploadCm from '@vendor/components/upload/Index.vue';
    import {
        HasLength, CopyOf
    } from "@vendor/plugin/helper";

    export default {
        name: "ImagePanel",
        data: () => ({
            selectedImage: {}
        }),
        components: {
            ImageCm, UploadCm
        },
        props: {
            value: {
                type: Object,
                default: () => ({})
            }
        },
        watch: {
            value( newVal ) {
                if ( HasLength( newVal ) )
                    this.$set(this, 'selectedImage', {
                        fileName: newVal.id,
                        image: newVal.path,
                        id: newVal.id
                    });
            }
        },
        methods: {
            onClickOpenFileDialogButton() {
                this.$refs['uploadCm']?.openFileDialog();
            },
            onClickRemoveImageButton() {
                this.$emit('change', null);
                this.$set(this, 'selectedImage', {});
            },
            async onChangeImageField( formData ) {
                try {
                    this.$emit('change', formData);
                    let getImage = await UploadService.imagePreview( formData );
                    this.$set(this, 'selectedImage', getImage[0]);
                } catch (e) {}
            }
        }
    }
</script>