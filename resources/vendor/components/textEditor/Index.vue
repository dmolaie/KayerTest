<template>
    <div class="text-editor w-full direction-ltr">
        <ckeditor :editor="editor"
                  :config="editorConfig"
                  :value="value"
                  @input="$emit('input', $event)"
                  @ready="onEditorReady"
        > </ckeditor>
    </div>
</template>

<script>
    import ClassicEditor, {
        UploadAdapter
    } from '@services/service/TextEditorService';

    export default {
        name: "TextEditor",
        data() {
            return {
                editor: ClassicEditor,
                editorModel: null,
                editorConfig: {
                    extraPlugins: [ this.imageUploaderService ],
                    language: {
                        ui: 'fa',
                        content: this.lang
                    }
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
                        return new UploadAdapter( loader );
                    };
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                }
            },
            onEditorReady( payload ) {
                this.$set(this, 'editorModel', payload.model);
                this.insertParagraphAfterBlockEl();
            },
            insertParagraphAfterBlockEl() {
                try {
                    this.editorModel.document.registerPostFixer(() => {
                        const changes = this.editorModel.document.differ.getChanges();
                        this.editorModel.change(writer => {
                            for (const entry of changes) {
                                if (
                                    entry.type === "insert" &&
                                    ["image", "table", "blockQuote", "media"].includes(entry.name)
                                ) {
                                    const insertedElement = entry.position.nodeAfter;
                                    if (!insertedElement.nextSibling) {
                                        writer.insertElement("paragraph", insertedElement, "after");
                                        return true;
                                    }
                                }
                            }
                        });
                    });
                } catch (e) {}
            }
        },
    }
</script>
