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
            location: String,
            mobile: String,
            has_video: Boolean
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

    mobile() {
        return this.data.mobile || ''
    }

    has_video() {
        return !!this.data.file_id;
    }
}

export class CardInformation extends BasePresenter {
    constructor({ data }) {
        super( data );
        this.data = data;

        return this.mapProps({
            full_name: String,
            card_id: String,
            email: String,
            mobile: String,
            national_code: String,
            identity_number: String,
            date_of_birth: String,
            city_of_birth: String,
            phone: String,
            created_at: String,
            updated_at: String,
        })
    }

    full_name() {
        return this.data.name + ' ' + this.data.last_name;
    }

    card_id() {
        return this.data.card_id || ''
    }

    email() {
        return this.data.email || ''
    }

    mobile() {
        return this.data.mobile || ''
    }

    national_code() {
        return this.data.national_code
    }

    identity_number() {
        return this.data.identity_number || ''
    }

    date_of_birth() {
        return DateService.getJalaaliDate( this.data.date_of_birth )
    }

    city_of_birth() {
        return this.data.city_of_birth?.name || this.data.province_of_birth?.name || ""
    }

    phone() {
        return this.data.phone || ''
    }

    current_address() {
        return this.data.current_address || ''
    }

    created_at() {
        return DateService.getLocalString( this.data.created_at )
    }

    updated_at() {
        let { updated_at } = this.data;
        return !!updated_at ? (
            DateService.getLocalString( updated_at )
        ) : ''
    }
}