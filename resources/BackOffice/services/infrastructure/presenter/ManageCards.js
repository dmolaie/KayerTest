import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter';
import DateService from '@vendor/plugin/date';
import {
    HasLength
} from "@vendor/plugin/helper";

const DEFAULT_AVATAR = '/images/img_avatar-default.jpg';

export default class ManageCardsPresenter {
    constructor( payload ) {
        return !!payload && HasLength( payload ) ? (
            payload.map(item => new SingleManageCardsPresenter( item ))
        ) : ([])
    }
}

export class SingleManageCardsPresenter extends BasePresenter {
    constructor( data ) {
        super( data );
        this.data = data;

        return this.mapProps({
            user_id: Number,
            card_id: String,
            avatar: String,
            name: String,
            last_name: String,
            full_name: String,
            created_at: String,
            location: String
        })
    }

    user_id() {
        return this.data.id;
    }

    card_id() {
        return this.data.card_id;
    }

    avatar() {
        return DEFAULT_AVATAR;
    }

    name() {
        return this.data.name;
    }

    last_name() {
        return this.data.last_name
    }
    full_name() {
        return this.data.name + ' ' + this.data.last_name;
    }

    location() {
        return this.data.current_province?.name + '/' + this.data.current_city?.name
    }

    created_at() {
        return DateService.timeSince(this.data.created_at * 1e3)
    }
}