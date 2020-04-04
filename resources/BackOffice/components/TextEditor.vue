<template>
    <div class="editor direction-ltr">
        <icons-cm />
        <editor-menu-bar :editor="editor"
                         v-slot="{ commands, getMarkAttrs, isActive }"
        >
            <div class="menubar flex flex-wrap">
                <button class="menubar__button"
                        :class="{ 'is-active': isActive.link() }"
                        @click="onClickLinkButton(getMarkAttrs('link'))"
                        :title="isActive.link() ? 'ویرایش لینک' : 'اضافه لینک'"
                >
                    <icon-cm name="link" />
                </button>
                <template v-if="isActive.link()">
                    <button class="menubar__button is-active"
                            title="حذف لینک"
                            @click="onClickConfirmSubmitButton(commands.link)"
                    >
                        <icon-cm name="link" />
                    </button>
                </template>
                <button class="menubar__button"
                        @click="onClickImageButton"
                        title="اضافه کردن تصویر"
                >
                    <icon-cm name="image" />
                </button>
                <button class="menubar__button"
                        :class="{ 'is-active': isActive.bold() }"
                        @click="commands.bold"
                        title="بولد"
                >
                    <icon-cm name="bold" />
                </button>
                <button class="menubar__button"
                        :class="{ 'is-active': isActive.italic() }"
                        @click="commands.italic"
                        title="ایتالیک"
                >
                    <icon-cm name="italic" />
                </button>
                <button class="menubar__button"
                        :class="{ 'is-active': isActive.strike() }"
                        @click="commands.strike"
                        title="خط خورده"
                >
                    <icon-cm name="strike" />
                </button>
                <button class="menubar__button"
                        :class="{ 'is-active': isActive.underline() }"
                        @click="commands.underline"
                        title="خط زیر"
                >
                    <icon-cm name="underline" />
                </button>
                <button class="menubar__button"
                        :class="{ 'is-active': isActive.paragraph() }"
                        @click="commands.paragraph"
                        title="پاراگراف"
                >
                    <icon-cm name="paragraph" />
                </button>
                <template v-if="false">
                    <button class="menubar__button"
                            :class="{ 'is-active': isActive.heading({ level: 1 }) }"
                            @click="commands.heading({ level: 1 })"
                    >
                        H1
                    </button>
                    <button class="menubar__button"
                            :class="{ 'is-active': isActive.heading({ level: 2 }) }"
                            @click="commands.heading({ level: 2 })"
                    >
                        H2
                    </button>
                    <button class="menubar__button"
                            :class="{ 'is-active': isActive.heading({ level: 3 }) }"
                            @click="commands.heading({ level: 3 })"
                    >
                        H3
                    </button>
                </template>
                <div class="menubar__button menubar__button--xl relative cursor-pointer"
                     @click.stop="onClickFontSizeButton"
                >
                    {{ !!getMarkAttrs('fontSize').fontSize ? getMarkAttrs('fontSize').fontSize : 'اندازه فونت' }}
                    <dropdown-cm :visibility="shouldBeShowFontSizeDropdown">
                        <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                @click.stop='() => {commands.fontSize({fontSize:"8pt"}); shouldBeShowFontSizeDropdown = false}'
                        >
                            8pt
                        </button>
                        <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                @click.stop='() => {commands.fontSize({fontSize:"10px"}); shouldBeShowFontSizeDropdown = false}'
                        >
                            10pt
                        </button>
                        <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                @click.stop='() => {commands.fontSize({fontSize:"12pt"}); shouldBeShowFontSizeDropdown = false}'
                        >
                            12pt
                        </button>
                        <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                @click.stop='() => {commands.fontSize({fontSize:"14pt"}); shouldBeShowFontSizeDropdown = false}'
                        >
                            14pt
                        </button>
                        <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                @click.stop='() => {commands.fontSize({fontSize:"18pt"}); shouldBeShowFontSizeDropdown = false}'
                        >
                            18pt
                        </button>
                        <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                @click.stop='() => {commands.fontSize({fontSize:"24pt"}); shouldBeShowFontSizeDropdown = false}'
                        >
                            24pt
                        </button>
                        <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                @click.stop='() => {commands.fontSize({fontSize:"36pt"}); shouldBeShowFontSizeDropdown = false}'
                        >
                            36pt
                        </button>
                    </dropdown-cm>
                </div>
                <button class="menubar__button"
                        :class="{ 'is-active': isActive.bullet_list() }"
                        @click="commands.bullet_list"
                        title="لیست"
                >
                    <icon-cm name="ul" />
                </button>
                <button class="menubar__button"
                        :class="{ 'is-active': isActive.ordered_list() }"
                        @click="commands.ordered_list"
                        title="لیست ترتیبی"
                >
                    <icon-cm name="ol" />
                </button>
                <button class="menubar__button"
                        :class="{ 'is-active': isActive.blockquote() }"
                        @click="commands.blockquote"
                        title="نقل قول"
                >
                    <icon-cm name="quote" />
                </button>
                <button class="menubar__button"
                        @click="commands.horizontal_rule"
                        title="خط"
                >
                    <icon-cm name="hr" />
                </button>
                <button class="menubar__button"
                        @click="commands.undo"
                        title="بازگشت"
                >
                    <icon-cm name="undo" />
                </button>
                <button class="menubar__button"
                        @click="commands.redo"
                        title="انجام دوباره"
                >
                    <icon-cm name="redo" />
                </button>
                <button class="menubar__button"
                        :class="{ 'is-active': isActive.alignment({ textAlign: 'justify' }) }"
                        @click="commands.alignment({ textAlign: 'justify' })"
                        title="مساوی از طرفین"
                >
                    j
<!--                    <icon-cm name="justify" />-->
                </button>
                <button class="menubar__button"
                        :class="{ 'is-active': isActive.alignment({ textAlign: 'right' }) }"
                        @click="commands.alignment({ textAlign: 'right' })"
                        title="راست چین"
                >
                    r
<!--                    <icon-cm name="right" />-->
                </button>
                <button class="menubar__button"
                        :class="{ 'is-active': isActive.alignment({ textAlign: 'center' }) }"
                        @click="commands.alignment({ textAlign: 'center' })"
                        title="وسط چین"
                >
                    C
<!--                    <icon-cm name="center" />-->
                </button>
                <button class="menubar__button"
                        :class="{ 'is-active': isActive.alignment({ textAlign: 'left' }) }"
                        @click="commands.alignment({ textAlign: 'left' })"
                        title="چپ چین"
                >
                    l
<!--                    <icon-cm name="left" />-->
                </button>
                <button class="menubar__button"
                        @click="commands.createTable({rowsCount: 3, colsCount: 3, withHeaderRow: false })"
                        title="جدول"
                >
                    <icon-cm name="table" />
                </button>
                <template v-if="isActive.table()">
                    <button class="menubar__button"
                            @click="commands.deleteTable"
                            title="حذف جدول"
                    >
                        <icon-cm name="delete_table" />
                    </button>
                    <button class="menubar__button"
                            @click="commands.addColumnBefore"
                            title="اضافه کردن ستون در سمت چپ"
                    >
                        <icon-cm name="add_col_after" />
                    </button>
                    <button class="menubar__button"
                            title="اضافه کردن ستون در سمت راست"
                            @click="commands.addColumnAfter"
                    >
                        <icon-cm name="add_col_before" />
                    </button>
                    <button class="menubar__button"
                            @click="commands.deleteColumn"
                            title="حذف ستون"
                    >
                        <icon-cm name="delete_col" />
                    </button>
                    <button class="menubar__button"
                            @click="commands.addRowBefore"
                            title="اضافه کردن سطر جدید قبل از این سطر"
                    >
                        <icon-cm name="add_row_after" />
                    </button>
                    <button class="menubar__button"
                            @click="commands.addRowAfter"
                            title="اضافه کردن سطر جدید بعد از این سطر"
                    >
                        <icon-cm name="add_row_before" />
                    </button>
                    <button class="menubar__button"
                            @click="commands.deleteRow"
                            title="حذف سطر"
                    >
                        <icon-cm name="delete_row" />
                    </button>
                    <button class="menubar__button"
                            @click="commands.toggleCellMerge"
                            title="مرج کردن خانه ها"
                    >
                        <icon-cm name="combine_cells" />
                    </button>
                </template>
                <template v-if="false">
                    <button class="menubar__button"
                            :class="{ 'is-active': isActive.direction({ direction: 'rtl' }) }"
                            @click="commands.direction({ direction: 'rtl' })"
                            title="راست به چپ"
                    >
                        rtl
                    </button>
                    <button class="menubar__button"
                            :class="{ 'is-active': isActive.direction({ direction: 'ltr' }) }"
                            @click="commands.direction({ direction: 'ltr' })"
                            title="چپ به راست"
                    >
                        ltr
                    </button>
                </template>

                <modal-cm ref="imageConfirm"
                          size="small"
                          :clickOutside="false"
                >
                    <div class="confirm confirm--image modal__body w-full bg-white rounded direction-rtl">
                        <p class="confirm__title text-black font-bold cursor-default">
                            اضافه کردن تصویر
                        </p>
                        <div class="confirm__tabs inline-flex items-stretch min-w-full">
                            <button class="m-post__tab relative font-sm font-bold transition-bg text-nowrap"
                                    :class="{ 'm-post__tab--active': imageModal.shouldBeShowUploadTab }"
                                    @click.stop="onClickImageModalTabs( true )"
                            >
                                آپلود از سیستم
                            </button>
                            <button class="m-post__tab relative font-sm font-bold transition-bg text-nowrap"
                                    :class="{ 'm-post__tab--active': !( imageModal.shouldBeShowUploadTab ) }"
                                    @click.stop="onClickImageModalTabs( false )"
                            >
                                آپلود از آدرس
                            </button>
                        </div>
                        <template v-if="imageModal.shouldBeShowUploadTab" >
                            <upload-cm @onChange="onChangeImageField"
                                       ref="uploadImage"
                            />
                            <button class="image-p__submit confirm__button--image block w-3/4 text-white font-sm font-bold bg-blue-100 border-blue-1 rounded text-center l:transition-bg l:hover:bg-blue m-0-auto user-select-none"
                                    @click.prevent="onClickOpenFileDialogButton"
                            >
                                انتخاب عکس
                            </button>
                            <div class="confirm__file-name block w-3/4 relative font-sm font-medium text-bayoux min-height-42 bg-zircon border-blue-100-1 rounded direction-ltr user-select-none overflow-hidden text-nowrap text-ellipsis"
                                 v-if="!!imageModal.filename"
                                 v-text="imageModal.filename"
                            > </div>
                        </template>
                        <template v-else>
                            <form class="confirm__form w-full block"
                                  @submit.prevent="onClickImageModalConfirmSubmit(commands.image)">
                                <label class="confirm__label flex items-stretch w-full border border-solid rounded direction-ltr">
                                    <span class="confirm__icon flex-shrink-0 inline-flex items-center justify-center">
                                        <icon-cm name="link" />
                                    </span>
                                    <input type="text"
                                           v-model="imageModal.src"
                                           placeholder="https://"
                                           @keydown.esc="onClickImageModalDiscardButton"
                                           class="confirm__input flex font-base font-medium flex-1 rounded-inherit"
                                           autocomplete="off"
                                    />
                                </label>
                            </form>
                        </template>
                        <div class="text-left">
                            <button class="confirm__button confirm__button--submit font-sm font-medium rounded text-center l:transition-bg"
                                    :class="{ 'spinner-loading': (imageModal.isPending) }"
                                    @click.prevent="onClickImageModalConfirmSubmit(commands.image)"
                                    v-text="'تایید'"
                            > </button>
                            <button class="confirm__button confirm__button--discard text-black font-sm font-medium rounded text-center l:transition-bg"
                                    @click.prevent="onClickImageModalDiscardButton"
                                    v-text="'لغو'"
                            > </button>
                        </div>
                    </div>
                </modal-cm>
                <modal-cm ref="confirm"
                          size="small"
                          :clickOutside="false"
                >
                    <div class="confirm modal__body w-full bg-white rounded direction-rtl">
                        <p class="confirm__title text-black font-bold cursor-default">
                            اضافه کردن لینک
                        </p>
                        <form class="confirm__form w-full block"
                              @submit.prevent="onClickConfirmSubmitButton(commands.link)">
                            <label class="confirm__label flex items-stretch w-full border border-solid rounded direction-ltr">
                                <span class="confirm__icon flex-shrink-0 inline-flex items-center justify-center">
                                    <icon-cm name="link" />
                                </span>
                                <input type="text"
                                       v-model="linkUrl"
                                       placeholder="https://"
                                       ref="linkInput"
                                       @keydown.esc="onClickDiscardSubmitButton"
                                       class="confirm__input flex font-base font-medium flex-1 rounded-inherit"
                                       autocomplete="off"
                                />
                            </label>
                        </form>
                        <div class="text-left">
                            <button class="confirm__button confirm__button--submit font-sm font-medium rounded text-center l:transition-bg"
                                    @click.prevent="onClickConfirmSubmitButton(commands.link)"
                                    v-text="'تایید'"
                            > </button>
                            <button class="confirm__button confirm__button--discard text-black font-sm font-medium rounded text-center l:transition-bg"
                                    @click.prevent="onClickDiscardSubmitButton"
                                    v-text="'لغو'"
                            > </button>
                        </div>
                    </div>
                </modal-cm>
            </div>
        </editor-menu-bar>
        <editor-content class="editor__content" :editor="editor" />
    </div>
</template>

<script>
    import {
        Editor,
        EditorContent,
        EditorMenuBar,
    } from 'tiptap';

    import {
        Blockquote,
        CodeBlock,
        HardBreak,
        Heading,
        HorizontalRule,
        OrderedList,
        BulletList,
        ListItem,
        TodoItem,
        TodoList,
        Bold,
        Italic,
        Strike,
        Underline,
        History,
        Table,
        TableHeader,
        TableCell,
        TableRow,
        Link,
        Image
    } from 'tiptap-extensions';

    import {
        Paragraph,
        Alignment,
        Direction,
        FontSize,
        TextEditorService
    } from '@services/service/TextEditor';

    import {
        HasLength
    } from "@vendor/plugin/helper";

    import IconCm from '@components/Icon.vue';
    import IconsCm from '@components/Icons.vue';
    import ModalCm from '@vendor/components/modal/Index.vue';
    import UploadService from '@vendor/components/upload';
    import UploadCm from '@vendor/components/upload/Index.vue';
    import DropdownCm from '@vendor/components/dropdown/Index.vue';

    export default {
        name: "TextEditor",
        data() {
            return {
                editor: new Editor({
                    extensions: [
                        new Blockquote(),
                        new BulletList(),
                        new CodeBlock(),
                        new HardBreak(),
                        new Heading({levels: [1, 2, 3]}),
                        new HorizontalRule(),
                        new ListItem(),
                        new OrderedList(),
                        new TodoItem(),
                        new TodoList(),
                        new Link(),
                        new Bold(),
                        new Italic(),
                        new Strike(),
                        new Underline(),
                        new History(),
                        new Table({
                            resizable: true,
                        }),
                        new TableHeader(),
                        new TableCell(),
                        new TableRow(),
                        new Paragraph(),
                        new Alignment(),
                        new Direction(),
                        new FontSize(),
                        new Image(),
                    ],
                    content: '',
                    onUpdate: ({getHTML}) => {
                        const state = getHTML();
                        this.$emit('onUpdate', state );
                    }
                }),
                linkUrl: null,
                imageModal: {
                    src: null,
                    data: null,
                    filename: null,
                    isPending: false,
                    shouldBeShowUploadTab: true
                },
                shouldBeShowFontSizeDropdown: false
            }
        },
        props: {
            content: {
                type: String,
                default: ''
            }
        },
        components: {
            EditorMenuBar, EditorContent,
            IconCm, IconsCm, ModalCm, DropdownCm, UploadCm
        },
        methods: {
            setContent( content = '' ) {
                this.editor.setContent( content )
            },
            clearContent() {
                this.editor.clearContent()
            },
            onClickLinkButton({ href }) {
                this.$refs.confirm.visible();
                this.$set(this, 'linkUrl', href);
                this.$nextTick(() => {
                    this.$refs.linkInput.focus()
                })
            },
            onClickConfirmSubmitButton( command ) {
                command({ href: this.linkUrl });
                this.onClickDiscardSubmitButton();
            },
            onClickDiscardSubmitButton() {
                this.$refs['confirm']?.hidden();
                this.$set(this, 'linkUrl', null);
            },
            async onChangeImageField( formData ) {
                try {
                    const IMAGE = await UploadService.imagePreview( formData );
                    if ( !!IMAGE ) {
                        let {image, fileName} = IMAGE[0];
                        this.$set(this.imageModal, 'src', image);
                        this.$set(this.imageModal, 'data', formData);
                        this.$set(this.imageModal, 'filename', fileName);
                    }
                } catch (e) {}
            },
            onClickImageModalTabs( status ) {
                this.$set(this.imageModal, 'shouldBeShowUploadTab', status)
            },
            onClickOpenFileDialogButton() {
                this.$refs['uploadImage']?.openFileDialog();
            },
            onClickImageButton() {
                this.$refs['imageConfirm']?.visible();
            },
            async uploadImageEditor() {
                try {
                    this.$set(this.imageModal, 'isPending', true);
                    let {
                        data
                    } = this.imageModal;
                    if ( !!data ) {
                        let response = await TextEditorService.uploadImageForTextEditor( data );
                        console.log('response: ', response);
                    }
                } catch ({ message }) {
                    this.displayNotification( message, {
                        type: 'error'
                    })
                } finally {
                    this.$set(this.imageModal, 'isPending', false);
                }
            },
            async onClickImageModalConfirmSubmit( command ) {
                let {
                    src,
                } = this.imageModal;
                if ( !!src && !!src.trim() ) {
                    await this.uploadImageEditor();
                    command({ src });
                    this.onClickImageModalDiscardButton();
                }
            },
            onClickImageModalDiscardButton() {
                this.$refs['imageConfirm']?.hidden();
                this.$set(this.imageModal, 'src', null);
                this.$set(this.imageModal, 'data', null);
                this.$set(this.imageModal, 'filename', null);
                this.$set(this.imageModal, 'shouldBeShowUploadTab', true);
            },
            onClickFontSizeButton() {
                this.$set(this, 'shouldBeShowFontSizeDropdown', !this.shouldBeShowFontSizeDropdown)
            },
        },
        mounted() {
            try {
                if ( HasLength( this.content ) )
                    this.editor.setContent( this.content, true);
            } catch ( e ) {}
        },
        beforeDestroy() {
            this.editor.destroy();
        },
    }
</script>