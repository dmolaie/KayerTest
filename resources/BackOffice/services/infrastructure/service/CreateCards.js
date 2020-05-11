import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import ExceptionService from '@services/service/exception';
import BaseService from '@vendor/infrastructure/service/BaseService';
import DateService from '@vendor/plugin/date';
import AuthenticationService from '@services/service/Authentication';
import { UserService } from '@services/service/ManageLegate';
import { EventService } from '@services/service/ManageEvent';
import { ProvincesPresenter, } from '@vendor/infrastructure/presenter/MainPresenter';
import { EventPresenter } from '@services/presenter/EditUsers';
import CreateCards, {
    C_CARDS_SET_PROVINCES, C_CARDS_SET_BASIC_INFO, C_CARDS_SET_EVENT_LIST, C_CARDS_SET_AUTHENTICATION
} from '@services/store/CreateCards';
import {
    NationalCodeValidator, toEnglishDigits, HasLength, CopyOf
} from '@vendor/plugin/helper';

export default class CreateCardsService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
        this._RegisterStoreModule();
    }

    _RegisterStoreModule() {
        try {
            this.$store.registerModule('CreateCardsStore', CreateCards);
            this.$vm.$set(this.$vm, 'isModuleRegistered', true);
        } catch (e) {}
    }

    _UnregisterStoreModule() {
        try {
            if ( this.$vm.isModuleRegistered )
                this.$store.unregisterModule('CreateCardsStore');
        } catch (e) {}
    }

    async processFetchAsyncData() {
        try {
            let response = await Promise.all([
                UserService.getBasicRegisterInfo(),
                HTTPService.getRequest(Endpoint.get(Endpoint.GET_ALL_PROVINCES)),
                EventService.getEventList(),
                AuthenticationService.getAuthenticationList()
            ]);
            BaseService.commitToStore(this.$store, C_CARDS_SET_BASIC_INFO, response[0]);
            BaseService.commitToStore(this.$store, C_CARDS_SET_PROVINCES,  response[1]);
            BaseService.commitToStore(this.$store, C_CARDS_SET_EVENT_LIST, response[2]);
            BaseService.commitToStore(this.$store, C_CARDS_SET_AUTHENTICATION, response[3]);
        } catch ( exception ) {
            const MESSAGE = ExceptionService._GetErrorMessage( exception );
            this.$vm.displayNotification(MESSAGE, { type: 'error' });
        }
    }

    async getCityByProvincesId( province_id ) {
        try {
            if ( !!province_id ) {
                let response = await HTTPService.getRequest(Endpoint.get(Endpoint.GET_CITY_BY_PROVINCES_ID), {
                    province_id
                });
                return { ...new ProvincesPresenter( response.data ) }
            }
        } catch ( exception ) {
            const EXCEPTION = ExceptionService._GetErrorMessage( exception );
            this.$vm.displayNotification(EXCEPTION, { type: 'error' });
        }
    }

    async handelEventFieldSearch( title ) {
        try {
            const QUERYSTRING = !!title ? { title } : {};
            let response = await EventService.getEventList( QUERYSTRING );
            return new EventPresenter( response?.data?.items || [] );
        } catch ( exception ) { throw exception; }
    }

    nationalCodeValidation() {
        try {
            let { national_code } = this.$vm.form;
            if (HasLength( national_code )) {
                if (!NationalCodeValidator(toEnglishDigits( national_code ))) {
                    this.$vm.setValidationError('national_code', `فرمت کدملی اشتباه است.`);
                    throw new Error('فرمت کدملی اشتباه است.');
                }
            } else {
                this.$vm.setValidationError('national_code', `فیلد کدملی ضروری است.`);
                throw new Error('فیلد کدملی ضروری است.');
            }
        } catch ( exception ) { throw exception }
    }

    async validateUserNationalCode( national_code ) {
        try {
            this.nationalCodeValidation();
            let response = await HTTPService.postRequest(Endpoint.get(Endpoint.VALIDATE_USER), {
                national_code: toEnglishDigits(national_code)
            });
            return response.message;
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }

    jalaaliToTimestamp(jy, jm, jd) {
        return DateService.jalaaliToTimestamp(parseInt(jy), parseInt(jm), parseInt(jd))
    }

    checkFormValidation() {
        try {
            let {
                name, last_name, gender, father_name, mobile, date_of_birth,
                current_province_id, current_city_id, last_education_degree
            } = this.$vm.form;
            const REQUIRED_ERROR_MESSAGE = (field, field_fa, inline = true) => {
                const ERROR_MESSAGE = `فیلد ${field_fa} ضروری است.`;
                if( inline ) this.$vm.setValidationError(field, ERROR_MESSAGE);
                return new Error( ERROR_MESSAGE )
            };

            if (!HasLength( name )) throw REQUIRED_ERROR_MESSAGE('name', 'نام');
            if (!HasLength( last_name )) throw REQUIRED_ERROR_MESSAGE('last_name', 'نام خانوادگی');
            if (!HasLength(`${gender}`)) throw REQUIRED_ERROR_MESSAGE('date_of_birth', 'جنسیت', false);
            if (!HasLength( father_name )) throw REQUIRED_ERROR_MESSAGE('father_name', 'نام پدر');
            if (!HasLength(`${date_of_birth}`)) throw REQUIRED_ERROR_MESSAGE('date_of_birth', 'تاریخ تولد', false);
            if (!HasLength( mobile )) throw REQUIRED_ERROR_MESSAGE('mobile', 'تلفن همراه');
            if (!HasLength(`${current_province_id}`)) throw REQUIRED_ERROR_MESSAGE('current_province_id', 'استان محل سکونت', false);
            if (!HasLength(`${current_city_id}`)) throw REQUIRED_ERROR_MESSAGE('current_city_id', 'شهر محل سکونت', false);
            if (!HasLength(`${last_education_degree}`)) throw REQUIRED_ERROR_MESSAGE('current_city_id', 'میزان تحصیلات', false);
        } catch ( exception ) { throw exception; }
    }

    get createRequestPayload() {
        try {
            let form = CopyOf(this.$vm.form);
            Object.entries( form )
                .forEach(([key, value]) => {
                    if (!form[key] && typeof form[key] === 'string')
                        delete form[key];
                    else if (typeof form[key] === 'string')
                        form[key] = toEnglishDigits( value )
                });
            return form;
        } catch ( exception ) { throw exception; }
    }

    async registerDonationCard() {
        try {
            this.checkFormValidation();
            const REQUEST_PAYLOAD = this.createRequestPayload;
            let response = await HTTPService.postRequest(Endpoint.get(Endpoint.REGISTER_USER_BY_ADMIN), REQUEST_PAYLOAD);
            return response.message;
        } catch ( exception ) {
            if ( exception?.errors ) {
                Object.entries( exception?.errors )
                    .forEach( ([key, val]) => {
                        if ( this.$vm.validation[key] )
                            this.$vm.setValidationError(key, val[0])
                    });
            }
            throw ExceptionService._GetErrorMessage( exception );
        }
    }
}