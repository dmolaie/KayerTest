import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter';
import {
    HasLength
} from "@vendor/plugin/helper";

export default class MenuPresenter extends BasePresenter {
    constructor( data ) {
        super( data );

        return (
            ( !!data && HasLength( data ) ) ? (
                data.map( item => new  SingleMenuPresenter( item ) )
            ) : ([])
        );
    }
}

class SingleMenuPresenter extends BasePresenter {
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
            parent: Object,
            children: Array,
            publisher: Object,
            editor: Object,
            language: String,
            publish_date: Number,
            status: Boolean,
            priority: Number
        })
    }

    id() {
        return this.data?.id
    }

    title() {
        return this.data?.title || ''
    }

    name() {
        return this.data?.name || ''
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

    parent() {
        return this.data?.parent
    }

    children() {
        return (
            ( !!this.data?.children && HasLength( this.data?.children ) ) ? (
                new MenuPresenter( this.data.children )
            ) : ([])
        )
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

    status() {
        return this.data?.status
    }

    priority() {
        return this.data?.priority
    }

}