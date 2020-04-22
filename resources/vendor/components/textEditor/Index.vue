<template>
    <div class="w-full direction-ltr">
        <ckeditor :editor="editor"
                  :config="editorConfig"
                  :value="value"
                  @input="$emit('input', $event)"
        > </ckeditor>
    </div>
</template>

<script>
    import ClassicEditor, {
        UploadAdapter
    } from './../../../BackOffice/services/infrastructure/service/TextEditorService';
    export default {
        name: "TextEditor",
        data() {
            return {
                editor: ClassicEditor,
                editorConfig: {
                    extraPlugins: [ this.imageUploaderService ],
                    language: this.lang,
                }
            }
        },
        props: {
            lang: {
                type: String,
                default: 'fa'
            },
            value: {
                type: String,
                default: ''
            },
        },
        methods: {
            imageUploaderService( editor ) {
                try {
                    editor.plugins.get('FileRepository').createUploadAdapter = ( loader ) => {
                        console.log(loader);
                        return new UploadAdapter( loader );
                    };
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                }
            }
        },
        mounted() {
            // console.log(ClassicEditor.defaultConfig)
        }
    }
</script>