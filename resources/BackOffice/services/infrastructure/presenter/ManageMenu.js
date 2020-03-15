import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter';
import {
    HasLength
} from "@vendor/plugin/helper";

export class MenuPresenter extends BasePresenter {
    constructor( data ) {
        super( data );

        return (
            ( !!data && HasLength( data ) ) ? (
                data.map( item => new  SingleMenuPresenter( item ) )
            ) : ([])
        );
    }
}

export class SingleMenuPresenter extends BasePresenter {
    constructor( item ) {
        super( item );
        this.data = item;

        return this.mapProps({
            id: Number,
            title: String,
            name: String,
            alias: String,
            type: String,
            link: String,
            e_link: String,
            parent: Object,
            children: Array,
            publisher: Object,
            editor: Object,
            language: String,
            publish_date: Number,
            active: Boolean,
            priority: Number,
            is_opened: Boolean,
            menuable_id: Number
        })
    }

    id() {
        return this.data?.id
    }

    title() {
        return this.data?.title || ''
    }

    name() {
        return this.data?.title || ''
    }

    alias() {
        return this.data?.alias || ''
    }

    type() {
        return this.data?.type || ''
    }

    link() {
        return this.data?.link || ''
    }

    e_link() {
        return this.data?.link || ''
    }

    parent() {
        return this.data?.parent
    }

    children() {
        return new MenuPresenter( this.data.children )
    }

    publisher() {
        return (
            ( this.data?.publisher ) ? ({
                id: this.data?.publisher?.id,
                name: this.data?.publisher?.name || this.data?.publisher?.last_name
            }) : null
        )
    }

    editor() {
        return this.data?.editor
    }

    language() {
        return this.data?.language
    }

    publish_date() {
        return ( this.data?.publish_date * 1e3 )
    }

    active() {
        return !!this.data?.status
    }

    priority() {
        return this.data?.priority
    }

    is_opened() {
        return false
    }

    menuable_id() {
        return this.data?.menuable_id || ''
    }

}

export class MenuTypePresenter {
    constructor({ data }) {

        return [].concat(data).map((item, index) => ({
            id: index,
            text: item
        }))
    }
}

export class CategoryPresenter {
    constructor( data ) {

        return (
             ( !!data && HasLength( data ) ) ? (
                 data.map(item => new CategoryItemPresenter( item ))
             ) : ([])
        )
    }
}

export class CategoryItemPresenter extends BasePresenter {
    constructor( item ) {
        super( item );
        this.data = item;

        return this.mapProps({
            id: Number,
            text: String,
            type: String
        })
    }

    id() {
        return this.data.id
    }

    text() {
        return this.data.name_fa || this.data.first_title
    }

    type() {
        return this.data.type
    }
}

export const SavePriorityPresenter = payload => {
    return payload.reduce((presenter, {id, children}, i) => {
        presenter[i] = {
            id,
            children: HasLength( children ) ? SavePriorityPresenter( children ) : []
        };
        return presenter
    }, {})
};