import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter';
import {
    HasLength
} from "@vendor/plugin/helper";
import DateService from '@vendor/plugin/date';

export default class UserPresenter extends BasePresenter {
    constructor( data ) {
        super( data );
        this.item = data;

        return this.mapProps({
            user_id: Number,
            name: String,
            last_name: String,
            gender: Number,
            marital_status: Number,
            father_name: String,
            identity_number: String,
            national_code: String,
            email: String,
            mobile: String,
            essential_mobile: String,
            current_address: String,
            phone: String,
            home_postal_code: String,
            last_education_degree: Number,
            education_field: String,
            job_title: String,
            address_of_work: String,
            work_phone: String,
            work_postal_code: String,
            know_community_by: String,
            motivation_for_cooperation: String,
            day_of_cooperation: Number,
            field_of_activities: Array,
            receive_email: Boolean,
            province_of_birth: Number,
            province_of_birth_name: String,
            city_of_birth: Number,
            city_of_birth_name: String,
            current_province_id: Number,
            current_province_name: String,
            current_city_id: Number,
            current_city_name: String,
            education_province_id: Number,
            education_province_name: String,
            education_city_id: Number,
            education_city_name: String,
            province_of_work: Number,
            province_of_work_name: String,
            city_of_work: Number,
            city_of_work_name: String,
            date_of_birth: String,
            birth: Object,
            event_id: Object,
        })
    }

    date_of_birth() {
        return this.item.date_of_birth * 1e3
    }

    birth() {
        if ( !!this.item.date_of_birth ) {
            const DATE = DateService.getJalaaliDate(this.item.date_of_birth).split(' ');
            return {
                day: DATE[0],
                month: DATE[1],
                year: DATE[2],
            }
        }
        return {day: '', month: '', year: ''}
    }

    province_of_work() {
        return this.item.province_of_work?.id ?? ''
    }

    province_of_work_name() {
        return this.item.province_of_work?.name ?? ''
    }

    city_of_work() {
        return this.item.city_of_work?.id ?? ''
    }

    city_of_work_name() {
        return this.item.city_of_work?.name ?? ''
    }

    education_province_id() {
        return this.item.education_province?.id ?? ''
    }

    education_province_name() {
        return this.item.education_province?.name ?? ''
    }

    education_city_id() {
        return this.item.education_city?.id ?? ''
    }

    education_city_name() {
        return this.item.education_city?.name ?? ''
    }

    current_province_id() {
        return this.item.current_province?.id ?? ''
    }

    current_province_name() {
        return this.item.current_province?.name ?? ''
    }

    current_city_id() {
        return this.item.current_city?.id ?? ''
    }

    current_city_name() {
        return this.item.current_city?.name ?? ''
    }

    province_of_birth() {
        return this.item.province_of_birth?.id ?? ''
    }

    province_of_birth_name() {
        return this.item.province_of_birth?.name ?? ''
    }

    city_of_birth() {
        return this.item.city_of_birth?.id ?? ''
    }

    city_of_birth_name() {
        return this.item.city_of_birth?.name ?? ''
    }

    name() {
        return this.item.name
    }

    last_name() {
        return this.item.last_name ?? ''
    }

    gender() {
        return this.item.gender
    }

    marital_status() {
        return this.item.marital_status
    }

    father_name() {
        return this.item.father_name ?? ''
    }

    identity_number() {
        return this.item.identity_number ?? ''
    }

    national_code() {
        return this.item.national_code ?? ''
    }

    email() {
        return this.item.email ?? ''
    }

    mobile() {
        return this.item.mobile ?? ''
    }

    essential_mobile() {
        return this.item.essential_mobile ?? ''
    }

    current_address() {
        return this.item.current_address ?? ''
    }

    phone() {
        return this.item.phone ?? ''
    }

    home_postal_code() {
        return this.item.home_postal_code ?? ''
    }

    last_education_degree() {
        return this.item.last_education_degree ?? ''
    }

    education_field() {
        return this.item.education_field ?? ''
    }

    user_id() {
        return this.item.id
    }

    job_title() {
        return this.item.job_title
    }

    address_of_work() {
        return this.item.address_of_work ?? ''
    }

    work_phone() {
        return this.item.work_phone ?? ''
    }

    work_postal_code() {
        return this.item.work_postal_code ?? ''
    }

    know_community_by() {
        return this.item.know_community_by ?? ''
    }

    motivation_for_cooperation() {
        return this.item.motivation_for_cooperation ?? ''
    }

    day_of_cooperation() {
        return this.item.day_of_cooperation ?? ''
    }

    field_of_activities() {
        return this.item.field_of_activities
    }

    receive_email() {
        return this.item.receive_email
    }

    event_id() {
        return this.item.event_id ?? ''
    }
}

export class EventPresenter {
    constructor( data ) {
        return (!!data && HasLength(data)) ? (
            data.map(item => new SingleEventPresenter( item ))
        ) : ([])
    }
}

class SingleEventPresenter extends BasePresenter {
    constructor( item ) {
        super( item );
        this.data = item;

        return this.mapProps({
            id: Number,
            name: String
        })
    }

    id() {
        return this.data.id
    }

    name() {
        return this.data.title
    }
}