import {
    Node, Mark, Plugin
} from 'tiptap';
import {
    toggleBlockType,
    updateMark,
    removeMark,
    markInputRule,
    pasteRule
} from 'tiptap-commands';
import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import {
    HasLength
} from "@vendor/plugin/helper";
import {
    ImagesPresenter
} from '@vendor/infrastructure/presenter/MainPresenter';

export class TextEditorService {
    static async uploadImageForTextEditor( formData ) {
        try {
            const REQUEST_BODY = new FormData();
            REQUEST_BODY.append('images[0]', formData.get('images'));
            let response = await HTTPService.uploadRequest( Endpoint.get( Endpoint.UPLOAD_IMAGES_ITEM ), REQUEST_BODY )
            response = new ImagesPresenter( response.data );
            return response[0]
        } catch (e) {
            throw e;
        }
    }
}

function _iterableToArray(iter) {
    if (Symbol.iterator in Object(iter) || Object.prototype.toString.call(iter) === "[object Arguments]") return Array.from(iter);
}

function _arrayWithoutHoles(arr) {
    if (Array.isArray(arr)) {
        for (var i = 0, arr2 = new Array(arr.length); i < arr.length; i++) arr2[i] = arr[i];

        return arr2;
    }
}

function _toConsumableArray(arr) {
    return _arrayWithoutHoles(arr) || _iterableToArray(arr);
}

function getMarkAttrs(state, type) {
    let _state$selection = state.selection,
        from = _state$selection.from,
        to = _state$selection.to;

    let marks = [];

    state.doc.nodesBetween(from, to, function (node) {
        marks = [].concat(_toConsumableArray(marks), _toConsumableArray(node.marks));
    });

    let mark = marks.find(markItem => markItem.type.name === type.name);

    if (mark)
        return mark.attrs;

    return {};
}

export class FontUnderline extends Mark {
    get name() {
        return 'fontUnderline';
    }

    get schema() {
        return {
            attrs: {fontStyle: {default: 'underline'}},
            parseDOM: [{
                tag: 'u',
                getAttrs: value => ({
                    fontStyle: value
                })
            }],
            toDOM: mark => ['u', {style:`font-style: ${mark.attrs.fontStyle}`}, 0],
        };
    }

    commands({type}) {
        return attrs => {
            if ( attrs.fontStyle !== "un-underline" )
                return updateMark(type, attrs);
            return removeMark(type);
        };
    }

    inputRules({type}) {
        return [markInputRule(/(?:\*\*|__)([^*_]+)(?:\*\*|__)$/, type)];
    }
}

export class FontStrike extends Mark {
    get name() {
        return 'fontStrike';
    }

    get schema() {
        return {
            attrs: {fontStyle: {default: 'strike'}},
            parseDOM: [{
                tag: 's',
                getAttrs: value => ({
                    fontStyle: value
                })
            }],
            toDOM: mark => ['s', {style:`font-style: ${mark.attrs.fontStyle}`}, 0],
        };
    }

    commands({type}) {
        return attrs => {
            if ( attrs.fontStyle !== "un-strike" )
                return updateMark(type, attrs);
            return removeMark(type);
        };
    }

    inputRules({type}) {
        return [markInputRule(/(?:\*\*|__)([^*_]+)(?:\*\*|__)$/, type)];
    }
}

export class FontItalic  extends Mark {
    get name() {
        return 'fontItalic';
    }

    get schema() {
        return {
            attrs: {fontStyle: {default: 'italic'}},
            parseDOM: [{
                tag: 'em',
                getAttrs: value => ({
                    fontStyle: value
                })
            }],
            toDOM: mark => ['em', {style:`font-style: ${mark.attrs.fontStyle}`}, 0],
        };
    }

    commands({type}) {
        return attrs => {
            if ( attrs.fontStyle !== "un-italic" )
                return updateMark(type, attrs);
            return removeMark(type);
        };
    }

    inputRules({type}) {
        return [markInputRule(/(?:\*\*|__)([^*_]+)(?:\*\*|__)$/, type)];
    }
}

export class FontBold extends Mark {
    get name() {
        return 'fontBold';
    }

    get schema() {
        return {
            attrs: {fontStyle: {default: 'bold'}},
            parseDOM: [{
                tag: 'strong',
                getAttrs: value => ({
                    fontStyle: value
                })
            }],
            toDOM: mark => ['strong', {style:`font-style: ${mark.attrs.fontStyle}`}, 0],
        };
    }

    commands({type}) {
        return attrs => {
            if ( attrs.fontStyle !== "un-bold" )
                return updateMark(type, attrs);
            return removeMark(type);
        };
    }

    inputRules({type}) {
        return [markInputRule(/(?:\*\*|__)([^*_]+)(?:\*\*|__)$/, type)];
    }
}

export class FontSize extends Mark {
    get name() {
        return 'fontSize';
    }

    get schema() {
        return {
            attrs: {fontSize: {default: '1em'}},
            parseDOM: [{
                style: 'font-size',
                getAttrs: value => ({
                    fontSize: value
                })
            }],
            toDOM: mark => ['span', {style:`font-size: ${mark.attrs.fontSize}`}, 0],
        };
    }

    commands({type}) {
        return attrs => {
            if ((attrs.fontSize) && (attrs.fontSize !== '1em'))
                return updateMark(type, attrs);
            return removeMark(type);
        };
    }

    inputRules({type}) {
        return [markInputRule(/(?:\*\*|__)([^*_]+)(?:\*\*|__)$/, type)];
    }
}

export class Paragraph extends Node {
    get name() {
        return 'paragraph';
    }

    get schema() {
        return {
            content: 'inline*',
            group: 'block',
            parseDOM: [
                { tag: 'div' }
            ],
            toDOM: () => [ 'div', { dir: 'auto'}, 0 ]
        };
    }

    commands({ type, schema }) {
        return (attrs) => toggleBlockType(type, schema.nodes.paragraph, attrs);
    }
}

export class Alignment extends Node {
    get name() {
        return 'alignment';
    }

    get schema() {
        return {
            attrs: {
                textAlign: {
                    default: 'right'
                }
            },
            content: 'inline*',
            group: 'block',
            draggable: false,
            parseDOM: [
                {
                    tag: 'p',
                    getAttrs: (node) => ({
                        textAlign: node.style.textAlign || 'right'
                    })
                }
            ],
            toDOM: (node) => [ 'p', { style: `text-align: ${node.attrs.textAlign}`, dir: 'auto' }, 0 ]
        };
    }

    commands({ type, schema }) {
        return (attrs) => toggleBlockType(type, schema.nodes.alignment, attrs);
    }
}

export class Direction extends Node {
    get name() {
        return 'direction';
    }

    get schema() {
        return {
            attrs: {
                direction: {
                    default: 'rtl'
                }
            },
            content: 'inline*',
            group: 'block',
            draggable: false,
            parseDOM: [
                {
                    tag: 'main',
                    getAttrs: (node) => ({
                        direction: node.style.direction || 'rtl'
                    })
                }
            ],
            toDOM: (node) => [ 'main', { style: `text-align: ${node.attrs.direction}` }, 0 ]
        };
    }

    commands({ type, schema }) {
        return (attrs) => toggleBlockType(type, schema.nodes.direction, attrs);
    }
}
