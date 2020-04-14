import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';
import ManageLegate, {
    M_LEGATE_SET_DATA,
    M_LEGATE_SET_USER_ROLES,
    M_USER_SET_BASIC_DATA,
    M_MANAGE_USER_ROLE
} from '@services/store/ManageLegate';
import {
    UserInformationPresenter
} from '@services/presenter/ManageLegate';
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
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_USER_BASIC_REGISTER_INFO))
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }

    static async getUserInfoByUserID( user_id = 1 ) {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_USER_INFO_ADMIN), { user_id });
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }

    static async getCitiesByProvinceId( id ) {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_CITY_BY_PROVINCES_ID, { id }));
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }

    static async AddRoleToUser( user_id = 0, role_id = 0 ) {
        try {
            return HTTPService.postRequest(Endpoint.get(Endpoint.ADD_ROLE_TO_USER), { user_id, role_id })
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }

    static async changeUserRoleStatus(user_id = 0, role_id = 0, role_status = '') {
        try {
            return await HTTPService.postRequest(Endpoint.get(Endpoint.CHANGE_USER_ROLE_STATUS), {
                user_id, role_id, role_status,
            })
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
                this.getVolunteersListFilterBy( {...query} ),
            ]);
        } catch ( message ) {
            this.$vm.displayNotification(message, { type: 'error' })
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

    async getDataForUserInfoModal( user_id ) {
        try {
            let response = await Promise.all([
                this.getUserInformationByID( user_id ),
                this.getBasicRegisterInfo()
            ]);
            return response[0]
        } catch (e) {
            throw e
        }
    };

    async getBasicRegisterInfo() {
        try {
            if (!HasLength( this.$store.state['ManageLegateStore']?.education || {} )) {
                let response = await UserService.getBasicRegisterInfo();
                BaseService.commitToStore(this.$store, M_USER_SET_BASIC_DATA, response)
            }
        } catch (e) {
            throw e
        }
    }

    async getUserInformationByID( user_id ) {
        try {
            let response = await UserService.getUserInfoByUserID( user_id );
            return new UserInformationPresenter( response.data );
        } catch ( exception ) {
            throw exception;
        }
    }

    async getUserRoles( user_id ) {
        try {
            let response = await HTTPService.getRequest(Endpoint.get(Endpoint.GET_USER_ROLES, {
                user_id
            }));
            BaseService.commitToStore(this.$store, M_LEGATE_SET_USER_ROLES, response)
        } catch ( exception ) {
            console.log(exception);
            throw ExceptionService._GetErrorMessage( exception );
        }
    }

    async handelUserRoleAction(user_id, role_id, role_status) {
        try {

            let response = await UserService.changeUserRoleStatus(user_id, role_id, role_status)
            console.log('response', response);
            BaseService.commitToStore(this.$store, M_MANAGE_USER_ROLE, response);
            return response.message
            // UserService.changeUserRoleStatus
            // let response = await UserService.AddRoleToUser(user_id, role_id);
            // // console.log(response);
            // // let response = await UserService.removeUserRole(user_id, role_id);
            // // console.log(response);
            // return response.message
        } catch ( exception ) {
            throw exception;
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