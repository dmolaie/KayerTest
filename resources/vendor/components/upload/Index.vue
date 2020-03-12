<template>
    <form class="upload w-0 h-0 overflow-hidden pointer-event-none"
          enctype="multipart/form-data" novalidate
    >
        <input type="file"
               accept="image/png, image/jpg, image/jpeg"
               :multiple="multiple"
               :name="fieldName"
               @change="onChangeInput"
               class="upload__input"
               ref="input"
        >
        <div class="upload_drop-box"
             v-if="showDropBox"
        >
            فایل  رو بنداز
        </div>
    </form>
</template>

<script>
    import {
        HasLength, Length
    } from "@vendor/plugin/helper";

    export default {
        name: "Index",
        data: () => ({
            uploadedFiles: [],
            uploadError: null,
            currentStatus: null,
        }),
        props: {
            multiple: {
                type: Boolean,
                default: false
            },
            fieldName: {
                type: String,
                //default: 'images[]'
                default: 'images'
            },
            showDropBox: {
                type: Boolean,
                default: false
            }
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
             * @param  { event }
             * @return { FormData }  name: fieldName
             */
            onChangeInput({ target: { name, files } }) {
                if ( !HasLength( files ) ) return;

                const FORM_DATA = new FormData();
                Array.from(
                    { length: Length( files ) },
                    ( _, i ) => FORM_DATA.append(name, files[i], files[i].name)
                );

                this.$emit('onChange', FORM_DATA )
            }
        },
    }
</script>
