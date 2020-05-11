import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter';
import DateService from '@vendor/plugin/date';

export default class ProfileEditPresenter extends BasePresenter {
    constructor( { data } ) {
        super( data );
        this.payload = data;

        return (
            this.mapProps({
                national_code: String,
                gender: Number,
                name: String,
                last_name: String,
                father_name: String,
                identity_number: String,
                province_of_birth: Number,
                city_of_birth: Number,
                date_of_birth: Object,
                job_title: String,
                last_education_degree: Number,
                phone: String,
                mobile: String,
                current_province_id: Number,
                current_city_id: Number,
                email: String,
                education_field: String,
                education_province_id: String,
                education_city_id: String,
                home_postal_code: String,
                current_address: String,
            })
        )
    }

    national_code() {
        return this.payload?.national_code || ''
    }

    gender() {
        return this.payload?.gender
    }

    name() {
        return this.payload?.name || ''
    }

    last_name() {
        return this.payload?.last_name || ''
    }

    father_name() {
        return this.payload?.father_name || ''
    }

    identity_number() {
        return this.payload?.identity_number || ''
    }

    province_of_birth() {
        return this.payload?.province_of_birth?.id || ""
    }

    city_of_birth() {
        return this.payload?.city_of_birth?.id || ""
    }

    date_of_birth() {
        let timestamp = this.payload?.date_of_birth;
        if ( !!timestamp ) {
            let dateObj = new Date(parseFloat(timestamp) * 1e3),
                gd = dateObj.getUTCDate(),
                gy = dateObj.getUTCFullYear(),
                gm = dateObj.getUTCMonth() + 1;

            return DateService.toJalaali(gy, gm, gd)
        }
    }

    job_title() {
        return this.payload?.job_title || ''
    }

    last_education_degree() {
        return this.payload?.last_education_degree ?? ''
    }

    phone() {
        return this.payload?.phone || ''
    }

    mobile() {
        return this.payload?.mobile || ''
    }

    current_province_id() {
        return this.payload?.current_province?.id || ""
    }

    current_city_id() {
        return this.payload?.current_city?.id || ""
    }

    email() {
        return this.payload?.email || ''
    }

    education_field() {
        return this.payload?.education_field || '';
    }

    education_province_id() {
        return this.payload?.education_province?.id || ""
    }

    education_city_id() {
        return this.payload?.education_city?.id || ""
    }

    home_postal_code() {
        return this.payload?.home_postal_code || ''
    }

    current_address() {
        return this.payload?.current_address || ''
    }

}