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
import RoleService from '@services/service/Roles';
import {
    UPDATE_USER
}  from '@services/store/Login';

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
                HTTPService.getRequest(Endpoint.get(Endpoint.GET_ALL_PROVINCES))
            ]);
            // EventService.getEventList(),
            BaseService.commitToStore(this.$store, E_USER_SET_DATA, response[0]);
            BaseService.commitToStore(this.$store, E_USER_SET_BASIC_DATA, response[1]);
            // BaseService.commitToStore(this.$store, E_USER_SET_EVENT, response[2]);
            BaseService.commitToStore(this.$store, E_USER_SET_PROVINCES, response[2]);
        } catch ( exception ) {
            const EXCEPTION = ExceptionService._GetErrorMessage( exception );
            this.$vm.displayNotification(EXCEPTION, { type: 'error' });
            this.$vm.pushRouter({ name: 'DASHBOARD' });
        }
    }

    async SaveUserProfile( payload ) {
        try {
            delete payload['birth'];
            delete payload['card_id'];
            delete payload['has_card'];
            delete payload['has_video'];
            let response = await HTTPService.postRequest(Endpoint.get(Endpoint.EDIT_USER_BY_ADMIN), payload);
            BaseService.commitToStore(this.$store, UPDATE_USER, response);
            return response.message;
        } catch ( exception ) {
            if ( exception?.errors ) {
                Object.entries( exception?.errors )
                    .forEach( ([key, val]) => {
                        if ( this.$vm.validationErrors[key] )
                            this.$vm.setErrorMassage(key, val[0])
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
            this.$vm.$set(this.$vm.form, 'card_id', response?.data?.card_id);
            this.$vm.$set(this.$vm.form, 'has_card', true);
            this.$vm.displayNotification(response.message, { type: 'success' })
        } catch ( exception ) {
            throw exception;
        } finally {
            this.$vm.$set(this.$vm.cart, 'isPending', false);
        }
    }
}