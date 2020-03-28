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

const DEFAULT_STATUS = {
    role_id: 3
};

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
            await this.getVolunteersListFilterBy( DEFAULT_STATUS );
        } catch ({ message }) {
            this.$vm.displayNotification(message, {
                type: 'error'
            })
        }
    }

    async getVolunteersListFilterBy( querystring = {} ) {
        try {
            // console.log(StatusService.RECYCLE_STATUS);
            let response = await HTTPService.getRequest(Endpoint.get(Endpoint.GET_VOLUNTEERS_LIST), querystring);
            BaseService.commitToStore(this.$store, M_LEGATE_SET_DATA, response);
        } catch (e) {
            throw e;
        }
    }

    async HandelSearchAction(searchValue, { query }) {
        try {
            const QUERY_STRING = ( HasLength( query ) ) ? query : DEFAULT_STATUS;
            ( HasLength( searchValue.trim() ) ) ? (
                QUERY_STRING['first_title'] = searchValue.trim()
            ) : (
                delete QUERY_STRING['first_title']
            );
        } catch (e) {}
    }
}