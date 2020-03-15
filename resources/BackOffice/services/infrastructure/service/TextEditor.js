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

export class FontSize extends Mark {
    get name() {
        return 'fontSize';
    }

    get schema() {
        return {
            attrs: {fontSize: {default: '1em'}},
            parseDOM: [{
                style: 'font-size',
                getAttrs: value => value.indexOf('em') !== -1 ? {fontSize:value} : '',
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
                { tag: 'p' }
            ],
            toDOM: () => [ 'p', { dir: 'auto'}, 0 ]
        };
    }

    commands({ type, schema }) {
        return (attrs) => toggleBlockType(type, schema.nodes.paragraph, attrs);
    }
}

export class Alignment extends Mark {
    get name() {
        return 'alignment'
    }

    get schema() {
        return {
            attrs: {
                textAlign: {
                    default: 'right'
                }
            },
            parseDOM: [{
                style: 'text-align',
                getAttrs: value => value.style && value.style.textAlign || 'rtl',
            }],
            toDOM: mark => ['div', {style:`text-align: ${mark.attrs.textAlign}`}, 0],
        };
    }

    commands({type}) {
        return attrs => {
            if (attrs.textAlign)
                return updateMark(type, attrs);
            return removeMark(type);
        };
    }

    inputRules({type}) {
        return [markInputRule(/(?:\*\*|__)([^*_]+)(?:\*\*|__)$/, type)];
    }
}

export class Direction extends Mark {
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
            parseDOM: [{
                style: 'direction',
                getAttrs: value => value.style && value.style.direction || 'rtl',
            }],
            toDOM: mark => ['div', {style:`direction: ${mark.attrs.direction}`}, 0],
        };
    }

    commands({type}) {
        return attrs => {
            if (attrs.direction)
                return updateMark(type, attrs);
            return removeMark(type);
        };
    }

    inputRules({type}) {
        return [markInputRule(/(?:\*\*|__)([^*_]+)(?:\*\*|__)$/, type)];
    }
}

