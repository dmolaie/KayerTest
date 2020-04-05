import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';
import ManageLegate, {
    M_LEGATE_SET_DATA,
} from '@services/store/ManageLegate';
import StatusService from '@services/service/Status';
import {
    HasLength
} from '@vendor/plugin/helper';
import ExceptionService from '@services/service/exception';

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
            await this.getVolunteersListFilterBy();
        } catch ({ message }) {
            this.$vm.displayNotification(message, {
                type: 'error'
            })
        }
    }

    async getVolunteersListFilterBy( querystring = {} ) {
        try {
            // console.log(StatusService.RECYCLE_STATUS);
            let response = await HTTPService.getRequest(Endpoint.get(Endpoint.GET_USER_LIST), querystring);
            BaseService.commitToStore(this.$store, M_LEGATE_SET_DATA, response);
        } catch (e) {
            throw e;
        }
    }

    async HandelSearchAction(searchValue, { query }) {
        try {
            // const QUERY_STRING = query;
            // ( HasLength( searchValue.trim() ) ) ? (
            //     QUERY_STRING['national_code'] = searchValue.trim()
            // ) : (
            //     delete QUERY_STRING['national_code']
            // );
            // console.log('QUERY_STRING', QUERY_STRING);
            // await this.getVolunteersListFilterBy( QUERY_STRING );
        } catch (e) {}
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