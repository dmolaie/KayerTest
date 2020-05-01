import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter';
import { HasLength } from "@vendor/plugin/helper";

export default class LocationPresenter {
    constructor( payload ) {
        return !!payload && HasLength( payload ) ? (
            Object.values( payload ).map(item => new SingleLocationPresenter( item ))
        ) : ([])
    }
}

export class SingleLocationPresenter extends BasePresenter {
    constructor( item ) {
        super( item );
        this.item = item;

        return this.mapProps({
            id: Number,
            name: String
        })
    }

    id() {
        return this.item.id
    }

    name() {
        return this.item.name
    }
}