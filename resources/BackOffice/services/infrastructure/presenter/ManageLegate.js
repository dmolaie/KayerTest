import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter';
import {
    HasLength
} from "@vendor/plugin/helper";
import {
    ImagesPresenter,
    UserRolePresenter
} from '@vendor/infrastructure/presenter/MainPresenter';

const DEFAULT_AVATAR = '/images/img_avatar-default.jpg';

export default class ManageLegatePresenter {
    constructor( payload ) {
        return (!!payload && HasLength( payload )) ? (
            payload.map(item => new SingleLegatePresenter( item ))
        ) : ([])
    }
}

export class SingleLegatePresenter extends BasePresenter {
    constructor( item ) {
        super( item );
        this.data = item;

        return this.mapProps({
            avatar: String,
            id: Number,
            name: String,
            last_name: String,
            full_name: String,
            card_id: String,
            has_cart: Boolean,
            national_code: String,
            identity_number: String,
            roles: Array,
            city_name: String,
            province_id: Number,
            province_name: String,
            location: String,
            job_title: String,
            mobile: String,
        })
    }

    avatar() {
        return DEFAULT_AVATAR
    }

    id() {
        return this.data.id
    }

    name() {
        return this.data.name
    }

    last_name() {
        return this.data.last_name
    }

    full_name() {
        return (
            this.name() + ' ' + this.last_name()
        )
    }

    card_id() {
        return this.data.card_id
    }

    has_cart() {
        return !!this.data.card_id
    }

    national_code() {
        return this.data.national_code
    }

    identity_number() {
        return this.data.identity_number || ""
    }

    roles() {
        return new UserRolePresenter( this.data.roles )
    }

    city_id() {
        return this.data.current_city?.id || 0
    }

    city_name() {
        return this.data.current_city?.name || ''
    }

    province_id() {
        return this.data.current_province?.id || 0
    }

    province_name() {
        return this.data.current_province?.name || ''
    }

    location() {
        return (
            (!!this.province_name() ? (
                this.province_name() + ' / '
            ) : '') + this.city_name()
        )
    }

    job_title() {
        return this.data['job-title'] || ''
    }

    mobile() {
        return this.data.mobile || '09013040663'
    }
}
