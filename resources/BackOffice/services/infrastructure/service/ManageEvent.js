import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import ExceptionService from '@services/service/exception';
import BaseService from '@vendor/infrastructure/service/BaseService';
import ManageEvent, {
    M_EVENT_SET_DATA
} from '@services/store/ManageEvent';
import {
    CopyOf
} from '@vendor/plugin/helper';

export class EventService {
    static async getEventList( querystring = {} ) {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_EVENT_LIST), querystring)
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }
}

export default class ManageEventService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
        this._RegisterStoreModule()
    }

    _RegisterStoreModule() {
        try {
            this.$store.registerModule('ManageEventStore', ManageEvent);
            this.$vm.$set(this.$vm, 'isModuleRegistered', true);
        } catch (e) {}
    }

    _UnregisterStoreModule() {
        try {
            if ( this.$vm.isModuleRegistered )
                this.$store.unregisterModule('ManageEventStore');
        } catch (e) {}
    }

    async getEventListFilterBy( querystring = {} ) {
        try {
            let response = await EventService.getEventList( querystring );
            BaseService.commitToStore(this.$store, M_EVENT_SET_DATA, response);
        } catch ( exception ) {
            throw exception;
        }
    }

    async processFetchAsyncData() {
        try {
            await this.getEventListFilterBy();
        } catch ( exception ) {
            const MESSAGE = ExceptionService._GetErrorMessage( exception );
            this.$vm.displayNotification(MESSAGE, { type:'error' })
        }
    }

    async HandelPagination(page, { query }) {
        try {
            const QUERYSTRING = { page, ...CopyOf( query ) };
            this.getEventListFilterBy( QUERYSTRING )
        } catch ( exception ) {
            throw exception;
        }
    }
}