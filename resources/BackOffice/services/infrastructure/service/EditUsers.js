import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';
import ExceptionService from '@services/service/exception';
import { UserService } from '@services/service/ManageLegate';
import EditUser, {
    E_USER_SET_DATA, E_USER_SET_BASIC_DATA,
    E_USER_SET_PROVINCES, E_USER_SET_EVENT
} from '@services/store/EditUsers';
import { ProvincesPresenter, } from '@vendor/infrastructure/presenter/MainPresenter';
import { EventService } from '@services/service/ManageEvent';
import { CopyOf, toEnglishDigits } from "@vendor/plugin/helper";
import { UPDATE_USER, GET_USER_ID }  from '@services/store/Login';
import { EventPresenter } from '@services/presenter/EditUsers';

export default class EditUserService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
        this._RegisterStoreModule();
    }

    _RegisterStoreModule() {
        try {
            this.$store.registerModule('EditUserStore', EditUser);
            this.$vm.$set(this.$vm, 'isModuleRegistered', true);
        } catch (e) {}
    }

    _UnregisterStoreModule() {
        try {
            if ( this.$vm.isModuleRegistered ) this.$store.unregisterModule('EditUserStore');
        } catch (e) {}
    }

    async processFetchAsyncData() {
        try {
            let response = await Promise.all([
                UserService.getUserInfoByUserID( this.$vm.$route.params.id ),
                UserService.getBasicRegisterInfo(),
                HTTPService.getRequest(Endpoint.get(Endpoint.GET_ALL_PROVINCES)),
                EventService.getEventList()
            ]);
            BaseService.commitToStore(this.$store, E_USER_SET_DATA, response[0]);
            BaseService.commitToStore(this.$store, E_USER_SET_BASIC_DATA, response[1]);
            BaseService.commitToStore(this.$store, E_USER_SET_PROVINCES, response[2]);
            BaseService.commitToStore(this.$store, E_USER_SET_EVENT, response[3]);
        } catch ( exception ) {
            const EXCEPTION = ExceptionService._GetErrorMessage( exception );
            this.$vm.displayNotification(EXCEPTION, { type: 'error' });
            this.$vm.pushRouter({ name: 'MANAGE_LEGATE' });
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
        } catch ( exception ) {
            throw exception;
        }
    }

    get _RequestBody() {
        try {
            let form = CopyOf(this.$vm.form);
            delete form['province_of_birth_name'];
            delete form['city_of_birth_name'];
            delete form['current_province_name'];
            delete form['current_city_name'];
            delete form['province_of_work_name'];
            delete form['city_of_work_name'];
            delete form['education_province_name'];
            delete form['education_city_name'];
            delete form['birth'];
            delete form['national_code'];
            delete form['card_id'];
            delete form['has_card'];
            form['gender'] = parseInt(form['gender']);
            ( typeof form['marital_status'] !== 'object' ) ? (
                form['marital_status'] = parseInt(form['marital_status'])
            ) : delete form['marital_status'];

            Object.entries( form )
                .forEach(([key, value]) => {
                    if ( !form[key] && typeof form[key] === 'string' )
                        delete form[key];
                    else if ( typeof form[key] === 'string' )
                        form[key] = toEnglishDigits( value )
                });

            if ( !!form['day_of_cooperation'] )
                form['day_of_cooperation'] = parseInt(form['day_of_cooperation']);

            return form;
        } catch (e) {}
    }

    async SaveEditUserByAdmin() {
        try {
            let REQUEST_BODY = this._RequestBody;
            let response = await HTTPService.postRequest(Endpoint.get(Endpoint.EDIT_USER_BY_ADMIN), REQUEST_BODY);
            if (response?.data?.id === this.$store.getters[GET_USER_ID])
                BaseService.commitToStore(this.$store, UPDATE_USER, response);
            return response.message;
        } catch ( exception ) {
            if ( exception?.errors ) {
                Object.entries( exception?.errors )
                    .forEach( ([key, val]) => {
                        if ( this.$vm.validationErrors[key] )
                            this.$vm.setValidationError(key, val[0])
                    });
            }
            throw ExceptionService._GetErrorMessage( exception );
        }
    }
}