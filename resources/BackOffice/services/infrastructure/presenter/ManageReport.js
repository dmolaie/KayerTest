import DateService from '@vendor/plugin/date';
import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter';
import { HasLength } from '@vendor/plugin/helper';

export default class ManageReportPresenter {
    constructor( data ) {
        return !!data && HasLength( data ) ? (
            data.map(item => new SingleReportPresenter( item ))
        ) : ([])
    }
}

export class SingleReportPresenter extends BasePresenter {
    constructor( data ) {
        super( data );
        this.data = data;

        return this.mapProps({
            full_name: String,
            mobile: String,
            email: String,
            birth_of_day: String,
            national_code: String,
        })
    }

    full_name() {
        return this.data.name + ' ' + this.data.last_name;
    }

    mobile() {
        return this.data.mobile || ''
    }

    email() {
        return this.data.email || ''
    }

    birth_of_day() {
        return DateService.getJalaaliDate( this.data.date_of_birth )
    }

    national_code() {
        return this.data.national_code
    }
}

export class UserReportPresenter {
    constructor( data ) {
        return !!data && HasLength( data ) ? (
            data.map(item => new SingleUserReportPresenter( item ))
        ) : ([])
    }
}

export class SingleUserReportPresenter extends BasePresenter {
    constructor( data ) {
        super( data );
        this.data = data;

        return this.mapProps({
            national_code: String,
            name: String,
            last_name: String,
            date_of_birth: String,
            mobile: String,
            email: String,
        })
    }

    name() {
        return this.data.name
    }

    last_name() {
        return this.data.last_name
    }

    national_code() {
        return '&#8203;' + this.data.national_code
    }

    date_of_birth() {
        return DateService.getJalaaliDate( this.data.date_of_birth )
    }

    mobile() {
        return '&#8203;' + this.data.mobile || ''
    }

    email() {
        return this.data.email || ''
    }
}