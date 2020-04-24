import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import ExceptionService from "@services/service/exception";

export class UploadAdapter {
    constructor( loader ) {
        this.loader = loader;
    }

    upload() {
        return this.loader.file
            .then( uploadedFile => {
                return new Promise(( resolve, reject ) => {
                    const REQUEST_PAYLOAD = new FormData();
                    REQUEST_PAYLOAD.append('images[0]', uploadedFile);
                    HTTPService.uploadRequest( Endpoint.get( Endpoint.UPLOAD_IMAGES_ITEM ), REQUEST_PAYLOAD)
                        .then(response => {
                            resolve({
                                default: `/${response.data[0].path}`
                            })
                        })
                        .catch(exception => reject(ExceptionService._GetErrorMessage( exception )));
                });
            })
    }

    abort() {}
}

// **************************

import ClassicEditorBase from '@ckeditor/ckeditor5-editor-classic/src/classiceditor';

import Alignment from '@ckeditor/ckeditor5-alignment/src/alignment.js';
import AutoformatPlugin from '@ckeditor/ckeditor5-autoformat/src/autoformat';
import BlockQuote from '@ckeditor/ckeditor5-block-quote/src/blockquote.js';
import BoldPlugin from '@ckeditor/ckeditor5-basic-styles/src/bold';
import FontBackgroundColor from '@ckeditor/ckeditor5-font/src/fontbackgroundcolor.js';
import FontColor from '@ckeditor/ckeditor5-font/src/fontcolor.js';
import FontSize from '@ckeditor/ckeditor5-font/src/fontsize.js';
import HeadingPlugin from '@ckeditor/ckeditor5-heading/src/heading';
import Highlight from '@ckeditor/ckeditor5-highlight/src/highlight.js';
import HorizontalLine from '@ckeditor/ckeditor5-horizontal-line/src/horizontalline';
import Image from '@ckeditor/ckeditor5-image/src/image.js';
import ImageCaption from '@ckeditor/ckeditor5-image/src/imagecaption.js';
import ImageResize from '@ckeditor/ckeditor5-image/src/imageresize.js';
import ImageStyle from '@ckeditor/ckeditor5-image/src/imagestyle.js';
import ImageToolbar from '@ckeditor/ckeditor5-image/src/imagetoolbar.js';
import ImageUpload from '@ckeditor/ckeditor5-image/src/imageupload.js';
import Indent from '@ckeditor/ckeditor5-indent/src/indent.js';
import IndentBlock from '@ckeditor/ckeditor5-indent/src/indentblock.js';
import ItalicPlugin from '@ckeditor/ckeditor5-basic-styles/src/italic';
import LinkPlugin from '@ckeditor/ckeditor5-link/src/link';
import ListPlugin from '@ckeditor/ckeditor5-list/src/list';
import MediaEmbed from '@ckeditor/ckeditor5-media-embed/src/mediaembed.js';
import PasteFromOffice from '@ckeditor/ckeditor5-paste-from-office/src/pastefromoffice';
import Strikethrough from '@ckeditor/ckeditor5-basic-styles/src/strikethrough.js';
import Table from '@ckeditor/ckeditor5-table/src/table.js';
import TableCellProperties from '@ckeditor/ckeditor5-table/src/tablecellproperties';
import TableToolbar from '@ckeditor/ckeditor5-table/src/tabletoolbar.js';
import TableProperties from '@ckeditor/ckeditor5-table/src/tableproperties';
import Underline from '@ckeditor/ckeditor5-basic-styles/src/underline.js';
import EssentialsPlugin from '@ckeditor/ckeditor5-essentials/src/essentials';
import ParagraphPlugin from '@ckeditor/ckeditor5-paragraph/src/paragraph';


export default class ClassicEditor extends ClassicEditorBase {}

ClassicEditor.builtinPlugins = [
    Alignment,
    AutoformatPlugin,
    BlockQuote,
    BoldPlugin,
    FontBackgroundColor,
    FontColor,
    FontSize,
    Highlight,
    HorizontalLine,
    Image, ImageToolbar, ImageCaption, ImageStyle, ImageResize, ImageUpload,
    Indent, IndentBlock,
    ItalicPlugin,
    LinkPlugin,
    ListPlugin,
    MediaEmbed,
    PasteFromOffice,
    Strikethrough,
    Table, TableCellProperties, TableToolbar, TableProperties,
    EssentialsPlugin,
    HeadingPlugin,
    ParagraphPlugin,
    Underline,
];

ClassicEditor.defaultConfig = {
    alignment: { options: [ 'left', 'right', 'center', 'justify' ] },
    fontSize: { options: [ 9, 11, 13, 'default', 17, 19, 21 ] },
    image: {
        toolbar: [ 'imageTextAlternative', '|', 'imageStyle:full', 'imageStyle:side', '|', 'imageStyle:alignLeft', 'imageStyle:alignCenter', 'imageStyle:alignRight' ],
        styles: [ 'full', 'side', 'alignLeft', 'alignCenter', 'alignRight' ]
    },
    table: { contentToolbar: [ 'tableColumn', 'tableRow', 'mergeTableCells', 'tableProperties', 'tableCellProperties' ] },
    toolbar: [
        'heading', '|',
        'bold', 'italic', 'underline', 'strikethrough', 'fontSize', 'fontColor', 'fontBackgroundColor', 'highlight', 'alignment', '|',
        'link', 'bulletedList', 'numberedList', '|',
        'imageUpload', 'mediaEmbed', 'insertTable', 'blockQuote', 'horizontalLine', '|',
        'outdent', 'indent', '|',
        'undo', 'redo', '|'
    ],
    language: 'fa',
};