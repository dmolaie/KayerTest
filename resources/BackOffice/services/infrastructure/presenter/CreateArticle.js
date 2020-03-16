import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter';
import {
    HasLength
} from "@vendor/plugin/helper";

export class ArticleCategoryPresenter extends BasePresenter {
    constructor( data ) {
        super( data );

        return (
            ( !!data && HasLength( data ) ) ? (
                data.map( item => new  SingleArticleCategoryPresenter( item ) )
            ) : ([])
        );
    }
}

export class SingleArticleCategoryPresenter extends BasePresenter {
    constructor( item ) {
        super(item);
        this.data = item;

        return this.mapProps({
            is_active: Boolean,
            id: Number,
            name: String,
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

    name() {
        return this.data?.name_fa || this.data?.name_en
    }

    type() {
        return this.data?.type || ''
    }

    children() {
        return (
            ( !!this.data?.children && HasLength( this.data?.children ) ) ? (
                new ArticleCategoryPresenter( this.data?.children )
            ) : ([])
        )
    }

    checked() {
        return this.data?.checked || false;
    }
}