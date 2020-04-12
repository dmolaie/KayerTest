import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import ExceptionService from '@services/service/exception';
import BaseService from '@vendor/infrastructure/service/BaseService';
import {
    GET_USER_ID
} from '@services/store/Login';
import ManageEvent, {
    M_EVENT_SET_DATA
} from '@services/store/ManageEvent';
import {
    CopyOf, HasLength
} from '@vendor/plugin/helper';
import StatusService from '@services/service/Status';

const DEFAULT_STATUS = {
    status: StatusService.PUBLISH_STATUS
};

export class EventService {
    static async getEventList( querystring = {} ) {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_EVENT_LIST), querystring)
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }
    static async getEventCategories() {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_CATEGORY_LIST), {
                category_type: 'event'
            });
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
            const QUERY_STRING = CopyOf( querystring );
            if ( QUERY_STRING['status'] === StatusService.MY_POST_STATUS ) {
                delete QUERY_STRING['status'];
                QUERY_STRING['publisher_id'] = this.$store.getters[GET_USER_ID]
            }
            let response = await EventService.getEventList( QUERY_STRING );
            BaseService.commitToStore(this.$store, M_EVENT_SET_DATA, response);
        } catch ( exception ) {
            throw exception;
        }
    }

    async processFetchAsyncData() {
        try {
            let { query } = this.$vm.$route;
            let QUERY_STRING = HasLength( query ) ? query : DEFAULT_STATUS;
            await this.getEventListFilterBy( QUERY_STRING );
        } catch ( exception ) {
            const MESSAGE = ExceptionService._GetErrorMessage( exception );
            this.$vm.displayNotification(MESSAGE, { type:'error' })
        }
    }

    async HandelSearchAction(searchValue, { query }) {
        try {
            let QUERY_STRING = query;
            (HasLength( searchValue.trim() )) ? (
                QUERY_STRING['title'] = searchValue.trim()
            ) : delete QUERY_STRING['title'];
            await this.getEventListFilterBy( QUERY_STRING );
        } catch ( exception ) {
            throw exception;
        }
    }

    async HandleFilterAction(create_date_start, create_date_end, { query }) {
        try {
            let QUERY_STRING = query;
            (!!create_date_start) ? (
                QUERY_STRING['create_date_start'] = create_date_start
            ) : delete QUERY_STRING['create_date_start'];
            (!!create_date_end) ? (
                QUERY_STRING['create_date_end'] = create_date_end
            ) : delete QUERY_STRING['create_date_end'];
            await this.getEventListFilterBy( QUERY_STRING );
        } catch ( exception ) {
            throw exception;
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