<template>
    <form :class="[ 'upload', { 'upload w-0 h-0 overflow-hidden pointer-event-none': !dropBox} ]"
          enctype="multipart/form-data" novalidate
    >
        <input type="file"
               :accept="accept"
               :multiple="multiple"
               :name="fieldName"
               @change="onChangeInput"
               class="upload__input" ref="input"
               :class="{ 'none w-0 h-0 overflow-hidden pointer-event-none': dropBox}"
        >
        <template v-if="dropBox">
            <div @dragover.prevent
                 @dragenter.prevent="onDragenter"
                 @dragleave="onDragleave"
                 @drop.prevent="onDrop"
                 @click.prevent="openFileDialog"
                 :class="{ 'upload__drop--hover': dragging }"
                 class="upload__drop text-blue-800 font-sm font-medium border border-solid rounded text-center cursor-pointer user-select-none"
            >
                فایل را اینجا رها کنید، یا با کلیک روی این ناحیه آن را انتخاب نمایید.
            </div>
        </template>
    </form>
</template>

<script>
    import {
        HasLength, Length, ArrayRange
    } from "@vendor/plugin/helper";

    export default {
        name: "UploadCm",
        data: () => ({
            uploadedFiles: [],
            uploadError: null,
            currentStatus: null,
            dragging: false,
        }),
        props: {
            /**
             * @example audio/* | video/* | image/*
             */
            accept: {
                type: String,
                default: 'image/png, image/jpg, image/jpeg'
            },
            multiple: {
                type: Boolean,
                default: false
            },
            fieldName: {
                type: String,
                default: 'images'
            },
            dropBox: {
                type: Boolean,
                default: false
            },
        },
        methods: {
            reset() {
                this.$set(this, 'uploadedFiles', []);
                this.$set(this, 'uploadError', null)
            },
            openFileDialog() {
                try {
                    this.$refs['input'].click();
                } catch (e) {}
            },
            /*
             * @return { FormData }  name: fieldName
             */
            emitter(name, files) {
                if ( !HasLength( files ) ) return;
                const FORM_DATA = new FormData();
                const RANGE = ArrayRange(Length( files ));
                RANGE.forEach(i => FORM_DATA.append(name, files[i], files[i].name));
                this.$emit('onChange', FORM_DATA )
            },
            onChangeInput({ target: { name, files } }) {
                this.emitter(name, files);
            },
            onDragenter() {
                this.$set(this, 'dragging', true)
            },
            onDragleave() {
                this.$set(this, 'dragging', false);
            },
            onDrop( event ) {
                const { files } = event.dataTransfer;
                if ( !HasLength( files ) ) return;
                this.$set(this, 'dragging', false);
                ( this.accept.includes( files[0].type ) ) ? (
                    this.emitter(this.fieldName, files)
                ) : this.displayNotification('فرمت فایل انتخابی نامعتبر است.', { type: 'error' });
            }
        },
    }
</script>