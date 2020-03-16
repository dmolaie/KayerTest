import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter';
import {
    HasLength
} from "@vendor/plugin/helper";

export class NewsCategoryPresenter extends BasePresenter {
    constructor( data ) {
        super( data );

        return (
            ( !!data && HasLength( data ) ) ? (
                data.map( item => new  SingleNewsCategoryPresenter( item ) )
            ) : ([])
        );
    }
}

export class SingleNewsCategoryPresenter extends BasePresenter {
    constructor( item ) {
        super(item);
        this.data = item;

        return this.mapProps({
            is_active: Boolean,
            id: Number,
            name_en: String,
            name_fa: String,
            type: String,
            children: Array,
            checked: Boolean,
        })
    }

    is_active() {
        return this.data?.is_active
    }

    id() {
        return this.data?.id
    }

    name_en() {
        return this.data?.name_en || ''
    }

    name_fa() {
        return this.data?.name_fa || ''
    }

    type() {
        return this.data?.type || ''
    }

    children() {
        return (
            ( !!this.data?.children && HasLength( this.data?.children ) ) ? (
                new NewsCategoryPresenter( this.data?.children )
            ) : ([])
        )
    }

    checked() {
        return this.data?.checked || false;
    }
}

export class ProvincesPresenter {
    constructor({ data }) {
        this.data = data;

        return (
            Object.values( data )
                .map(item => new SingleProvincesPresenter( item ))
        )
    }
}

export class SingleProvincesPresenter extends BasePresenter {
    constructor( item ) {
        super( item );
        this.data = item;

        return this.mapProps({
            value: Number,
            text: String
        })
    }

    value() {
        return this.data.id
    }

    text() {
        return this.data?.name || this.data.slug
    }
}