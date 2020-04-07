import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';
import ManageLegate, {
    M_LEGATE_SET_DATA,
    M_LEGATE_SET_USER_ROLES
} from '@services/store/ManageLegate';
import {
    UserInformationPresenter
} from '@services/presenter/ManageLegate';
import StatusService from '@services/service/Status';
import {
    HasLength, CopyOf, Length
} from '@vendor/plugin/helper';
import ExceptionService from '@services/service/exception';
import {
    NationalCodeValidator,
    toEnglishDigits
} from "@vendor/plugin/helper";

export class UserService {
    static async getBasicRegisterInfo() {
        try {
            // return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_USER_BASIC_REGISTER_INFO))
            return 
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }
}

export default class ManageLegateService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
        this._RegisterStoreModule();
    }

    _RegisterStoreModule() {
        try {
            this.$store.registerModule('ManageLegateStore', ManageLegate);
            this.$vm.$set(this.$vm, 'isModuleRegistered', true);
        } catch (e) {}
    }

    _UnregisterStoreModule() {
        try {
            if ( this.$vm.isModuleRegistered )
                this.$store.unregisterModule('ManageLegateStore');
        } catch (e) {}
    }

    async processFetchAsyncData() {
        try {
            let {
                query
            } = this.$vm.$route;
            await Promise.all([
                this.getVolunteersListFilterBy( query ),
                this.getBasicRegisterInfo()
            ]);
        } catch ( message ) {
            this.$vm.displayNotification(message, { type: 'error' })
        }
    }

    async getBasicRegisterInfo() {
        try {
            let response = await UserService.getBasicRegisterInfo();
            console.log(response);
        } catch (e) {
            throw e
        }
    }

    async getVolunteersListFilterBy( querystring = {} ) {
        try {
            let response = await HTTPService.getRequest(Endpoint.get(Endpoint.GET_USER_LIST), querystring);
            BaseService.commitToStore(this.$store, M_LEGATE_SET_DATA, response);
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }

    async HandelSearchAction(searchValue, { query }) {
        try {
            let QUERY_STRING = null;
            if (Length( searchValue.trim() ) >= 3) {
                QUERY_STRING = query;
                if ( NationalCodeValidator( searchValue ) ) {
                    delete QUERY_STRING['name'];
                    QUERY_STRING['national_code'] = toEnglishDigits( searchValue.trim() )
                } else {
                    delete QUERY_STRING['national_code'];
                    QUERY_STRING['name'] = toEnglishDigits( searchValue.trim() )
                }
            } else {
                QUERY_STRING = query;
                delete QUERY_STRING['name'];
                delete QUERY_STRING['national_code'];
            }
            await this.getVolunteersListFilterBy( QUERY_STRING );
        } catch ( exception ) {
            this.$vm.displayNotification(exception, { type: 'error' });
        }
    }

    async HandelPagination(page, { query }) {
        try {
            const REQUEST_BODY = {
                page,
                ...CopyOf( query )
            };
            await this.getVolunteersListFilterBy( REQUEST_BODY )
        } catch ( exception ) {
            this.$vm.displayNotification(exception, { type: 'error' });
        }
    }

    async getUserInformationByID( user_id ) {
        try {
            let response = await HTTPService.getRequest(Endpoint.get(Endpoint.GET_USER_INFO_ADMIN), { user_id });
            return new UserInformationPresenter( response.data );
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }

    async getAllUserRoles() {
        try {
            let response = await HTTPService.getRequest(Endpoint.get(Endpoint.GET_ALL_PROVINCES));
            BaseService.commitToStore(this.$store, M_LEGATE_SET_USER_ROLES, response)
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }
    
    async changePasswordByAdmin(user_id = 0, password = '') {
        try {
            let response = await HTTPService.postRequest(Endpoint.get(Endpoint.EDIT_USER_PASSWORD), {
                user_id, password,
                password_confirmation: password
            });
            return response.message
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }
}