import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';
import ExceptionService from '@services/service/exception';
import {
    UserService
} from '@services/service/ManageLegate';
import EditUser, {
    E_USER_SET_DATA, E_USER_SET_BASIC_DATA,
    E_USER_SET_PROVINCES, E_USER_SET_EVENT
} from '@services/store/EditUsers';
import {
    ProvincesPresenter,
} from '@vendor/infrastructure/presenter/MainPresenter';
import {
    EventService
} from '@services/service/ManageEvent';
import {
    HasLength, Length, toEnglishDigits, CopyOf
} from "@vendor/plugin/helper";
import RoleService from '@services/service/Roles'
import {GET_USER_ID} from "../store/Login";

export default class UserSettingsService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
        this._RegisterStoreModule();
    }

    _RegisterStoreModule() {
        try {
            this.$store.registerModule('UserSettingStore', EditUser);
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
                UserService.getUserInfoByUserID( this.$store.getters.GET_USER_ID ),
                UserService.getBasicRegisterInfo(),
                EventService.getEventList(),
                HTTPService.getRequest(Endpoint.get(Endpoint.GET_ALL_PROVINCES))
            ]);
            BaseService.commitToStore(this.$store, E_USER_SET_DATA, response[0]);
            BaseService.commitToStore(this.$store, E_USER_SET_BASIC_DATA, response[1]);
            BaseService.commitToStore(this.$store, E_USER_SET_EVENT, response[2]);
            BaseService.commitToStore(this.$store, E_USER_SET_PROVINCES, response[3]);
        } catch ( exception ) {
            const EXCEPTION = ExceptionService._GetErrorMessage( exception );
            this.$vm.displayNotification(EXCEPTION, { type: 'error' });
            this.$vm.pushRouter({ name: 'DASHBOARD' });
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

    get _RequestPayload() {
        try {
            let form = CopyOf(this.$vm.form);
            delete form['card_id'];
            delete form['has_card'];
            delete form['education_province_name'];
            delete form['education_city_name'];
            delete form['province_of_birth_name'];
            delete form['city_of_birth_name'];
            delete form['current_province_name'];
            delete form['current_city_name'];
            delete form['province_of_work_name'];
            delete form['city_of_work_name'];
            form['gender'] = parseInt(form['gender']);
            ( typeof form['marital_status'] !== 'object' ) ? (
                form['marital_status'] = parseInt(form['marital_status'])
            ) : delete form['marital_status'];
            delete form['birth'];
            delete form['national_code'];

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

    async SaveUserProfile() {
        try {
            let REQUEST_BODY = this._RequestPayload;
            let response = await HTTPService.postRequest(Endpoint.get(Endpoint.EDIT_USER_BY_ADMIN), REQUEST_BODY);
            return response.message
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

    async changeUserPassword({ current_password, password, password_confirmation }) {
        try {
            const ERROR_MESSAGE = field => new Error(`فیلد ${field} باید حداقل هشت کاراکتر داشته باشد.`);
            if (!HasLength( current_password ) && Length( current_password ) < 8) throw ERROR_MESSAGE('گذرواژه فعلی');
            if (!HasLength( password ) && Length( password ) < 8) throw ERROR_MESSAGE('گذرواژه‌ی جدید');
            if (!HasLength( password_confirmation ) && Length( password_confirmation ) < 8) throw ERROR_MESSAGE('تکرار گذرواژه');
            if (password !== password_confirmation) throw new Error('فیلد گذرواژه‌ی جدید و تکرار گذرواژه با یکدیگر تطابق ندارد.');
            let response = await HTTPService.postRequest(Endpoint.get(Endpoint.EDIT_USER_PASSWORD_BY_USER), {
                current_password: toEnglishDigits( current_password ),
                password: toEnglishDigits( password ),
                password_confirmation: toEnglishDigits( password_confirmation ),
            }, {}, true);
            return response.message;
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }

    async registerDonationCardForUser( user_id ) {
        try {
            this.$vm.$set(this.$vm.cart, 'isPending', true);
            let response = await UserService.AddRoleToUser( user_id, RoleService.CLIENT_ID );
            this.$vm.$set(this.$vm.form, 'has_card', true);
            this.$vm.displayNotification(response.message, { type: 'success' })
        } catch ( exception ) {
            throw exception;
        } finally {
            this.$vm.$set(this.$vm.cart, 'isPending', false);
        }
    }
}