import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import ExceptionService from '@services/service/exception';
import BaseService from '@vendor/infrastructure/service/BaseService';
import {
    GET_USER_ID
} from '@services/store/Login';
import ManageEvent, {
    M_EVENT_SET_DATA, M_EVENT_UPDATE_DATA
} from '@services/store/ManageEvent';
import {
    CopyOf, HasLength
} from '@vendor/plugin/helper';
import StatusService from '@services/service/Status';
import { CategoryService, CATEGORIES_TYPE } from '@services/service/ManageCategory';

const DEFAULT_STATUS = {
    status: StatusService.PUBLISH_STATUS
};

export class EventService {
    /**
     * @param querystring { Object }
     */
    static async getEventList( querystring = {} ) {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_EVENT_LIST), querystring)
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }
    static async getEventCategories() {
        try {
            return await CategoryService.getCategoryListByType( CATEGORIES_TYPE['event'] );
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }
    /**
     * @param event_id { Number }
     * @param status { String }
     */
    static async changeEventStatus(event_id, status) {
        try {
            return await HTTPService.postRequest(Endpoint.get(Endpoint.EDIT_STATUS_EVENT_ITEM), {
                event_id, status
            });
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }

    /**
     * @param event_id { Number }
     */
    static async deleteEventItem( event_id ) {
        try {
            return await HTTPService.postRequest(Endpoint.get(Endpoint.DELETE_EVENT_ITEM), {
                event_id
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
            if ( QUERY_STRING['status'] === void 0 ) {
                QUERY_STRING['status'] = StatusService.PUBLISH_STATUS;
            } else if ( QUERY_STRING['status'] === StatusService.MY_POST_STATUS ) {
                delete QUERY_STRING['status'];
                QUERY_STRING['publisher_id'] = this.$store.getters[GET_USER_ID]
            }
            console.log('QUERY_STRING', QUERY_STRING);
            let response = await EventService.getEventList( QUERY_STRING );
            BaseService.commitToStore(this.$store, M_EVENT_SET_DATA, response);
        } catch ( exception ) {
            throw exception;
        }
    }

    async processFetchAsyncData() {
        try {
            let { query } = this.$vm.$route;
            await this.getEventListFilterBy({
                status: query['status'] || StatusService.PUBLISH_STATUS
            });
        } catch ( exception ) {
            const MESSAGE = ExceptionService._GetErrorMessage( exception );
            this.$vm.displayNotification(MESSAGE, { type:'error' })
        }
    }

    async HandelSearchAction(searchValue, { query }) {
        try {
            (HasLength( searchValue.trim() )) ? (
                query['title'] = searchValue.trim()
            ) : delete query['title'];
            await this.getEventListFilterBy( query );
        } catch ( exception ) {
            throw exception;
        }
    }

    async HandleFilterAction(create_date_start, create_date_end, { query }) {
        try {
            (!!create_date_start) ? (
                query['create_date_start'] = create_date_start
            ) : delete query['create_date_start'];
            (!!create_date_end) ? (
                query['create_date_end'] = create_date_end
            ) : delete query['create_date_end'];
            await this.getEventListFilterBy( query );
        } catch ( exception ) {
            throw exception;
        }
    }

    removeItemFromStore( event_id ) {
        try {
            let newData = CopyOf( Object.values( this.$vm.items ) );
            let findIndex = newData.findIndex( item => item.event_id === event_id );
            if ( findIndex >= 0 ) newData.splice(findIndex, 1);
            BaseService.commitToStore(this.$store, M_EVENT_UPDATE_DATA, newData);
        } catch ( exception ) {}
    }

    async changeEventStatus(event_id, status) {
        try {
            let response = await EventService.changeEventStatus(event_id, status);
            this.removeItemFromStore( event_id );
            return response.message;
        } catch ( exception ) {
            throw exception;
        }
    }

    async deleteEventItem( event_id ) {
        try {
            let response = await EventService.deleteEventItem(event_id, status);
            this.removeItemFromStore( event_id );
            return response.message;
        } catch ( exception ) {
            throw exception;
        }
    }

    async HandelPagination(page, { query }) {
        try {
            const QUERYSTRING = { page, ...CopyOf( query ) };
            await this.getEventListFilterBy( QUERYSTRING )
        } catch ( exception ) {
            throw exception;
        }
    }
}