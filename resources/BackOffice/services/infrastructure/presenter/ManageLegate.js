import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter';
import {
    HasLength
} from "@vendor/plugin/helper";
import {
    ImagesPresenter,
    UserRolePresenter
} from '@vendor/infrastructure/presenter/MainPresenter';
import DateService from '@vendor/plugin/date';

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

export class UserInformationPresenter extends BasePresenter {
    constructor( data ) {
        super( data );
        this.item = data;

        return this.mapProps({
            user_id: Number,
            national_code: String,
            gender: Object,
            name: String,
            last_name: String,
            full_name: String,
            father_name: String,
            identity_number: String,
            province_of_birth: Object,
            city_of_birth: Object,
            date_of_birth: Object,
            job_title: String,
            last_education_degree: Number,
            phone: String,
            mobile: String,
            essential_mobile: String,
            current_province: Object,
            current_city: Object,
            email: String,
            marital_status: Object,
            education_field: String,
            education_province: Object,
            education_city: Object,
            home_postal_code: String,
            province_of_work: Object,
            city_of_work: Object,
            address_of_work: String,
            work_phone: String,
            work_postal_code: String,
            day_of_cooperation: Number,
            know_community_by: Number,
            motivation_for_cooperation: String,
            field_of_activities: Array,
            current_address: String,
            roles: Array,
            card_id: String,
            has_card: Boolean,
        })
    }

    user_id() {
        return this.item.id
    }

    national_code() {
        return this.item.national_code
    }

    gender() {
        return ({
            id: this.item.gender,
            name: (!!this.item.gender ? 'خانم' : 'آقا')
        })
    }

    name() {
        return this.item.name
    }

    last_name() {
        return this.item.last_name
    }

    full_name() {
        return (
            this.name() + ' ' + this.last_name()
        )
    }

    father_name() {
        return this.item.father_name
    }

    identity_number() {
        return this.item.identity_number
    }

    province_of_birth() {
        let { province_of_birth } = this.item;
        return (!!province_of_birth && HasLength( province_of_birth )) ? ({
            id: province_of_birth.id || '',
            name: province_of_birth.name || ''
        }) : ({})
    }

    city_of_birth() {
        let { city_of_birth } = this.item;
        return (!!city_of_birth && HasLength( city_of_birth )) ? ({
            id: city_of_birth.id || '',
            name: city_of_birth.name || ''
        }) : ({})
    }

    date_of_birth() {
        return ({
            timestamp: (parseFloat(this.item.date_of_birth) * 1e3),
            fa: DateService.getJalaaliDate( this.item.date_of_birth )
        })
    }

    job_title() {
        return this.item.job_title || ''
    }

    last_education_degree() {
        return this.item.last_education_degree || ''
    }

    phone() {
        return this.item.phone || ''
    }

    mobile() {
        return this.item.mobile || ''
    }

    essential_mobile() {
        return this.item.essential_mobile || ''
    }

    current_province() {
        let { current_province } = this.item;
        return (!!current_province && HasLength( current_province )) ? ({
            id: current_province.id,
            name: current_province.name
        }) : ({})
    }

    current_city() {
        let { current_city } = this.item;
        return (!!current_city && HasLength( current_city )) ? ({
            id: current_city.id,
            name: current_city.name
        }) : ({})
    }

    email() {
        return this.item.email || ''
    }

    marital_status() {
        return ({
            id: this.item.marital_status,
            label: ( !!this.item.marital_status ? 'متاهل' : 'مجرد' )
        })
    }

    education_field() {
        return this.item.education_field || ''
    }

    education_province() {
        let { education_province } = this.item;
        return (!!education_province && HasLength( education_province )) ? ({
            id: education_province.id,
            name: education_province.name
        }) : ({})
    }

    education_city() {
        let { education_city } = this.item;
        return (!!education_city && HasLength( education_city )) ? ({
            id: education_city.id,
            name: education_city.name
        }) : ({})
    }

    home_postal_code() {
        return this.item.home_postal_code || ''
    }

    province_of_work() {
        let { province_of_work } = this.item;
        return (!!province_of_work && HasLength( province_of_work )) ? ({
            id: province_of_work.id,
            name: province_of_work.name
        }) : ({})
    }

    city_of_work() {
        let { city_of_work } = this.item;
        return (!!city_of_work && HasLength( city_of_work )) ? ({
            id: city_of_work.id,
            name: city_of_work.name
        }) : ({})
    }

    address_of_work() {
        return this.item.address_of_work || ''
    }

    work_phone() {
        return this.item.work_phone || ''
    }

    work_postal_code() {
        return this.item.work_postal_code || ''
    }

    day_of_cooperation() {
        return this.item.day_of_cooperation || ''
    }

    know_community_by() {
        return this.item.know_community_by
    }

    motivation_for_cooperation() {
        return this.item.motivation_for_cooperation
    }

    field_of_activities() {
        return this.item.field_of_activities
    }

    current_address() {
        return this.item.current_address || ''
    }

    card_id() {
        return this.item.card_id;
    }

    has_card() {
        return !!this.item.card_id
    }

    roles() {
        return new UserRolePresenter( this.item.roles )
    }
}