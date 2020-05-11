import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter';
import { HasLength } from "@vendor/plugin/helper";

export default class CategoryPresenter {
    constructor( payload ) {
        return (!!payload && HasLength( payload )) ? (
            payload.map(item => new SingleCategoryPresenter( item ))
        ) : []
    }
}

export class SingleCategoryPresenter extends BasePresenter {
    constructor( data ) {
        super( data );
        this.data = data;

        return this.mapProps({
            id: Number,
            slug: String,
            name_fa: String,
            name_en: String,
        })
    }

    id() {
        return this.data.id
    }

    slug() {
        return this.data.slug
    }

    name_fa() {
        return this.data.name_fa
    }

    name_en() {
        return this.data.name_en
    }
}
