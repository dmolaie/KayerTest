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
            id: Number,
            name: String,
            name_en: String,
            name_fa: String,
            type: String,
            children: Array
        })
    }

    id() {
        return this.data?.id
    }

    name() {
        return (
            (this.data?.name_en || ' ')
                .replace(/ /g, '_')
        )
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
}