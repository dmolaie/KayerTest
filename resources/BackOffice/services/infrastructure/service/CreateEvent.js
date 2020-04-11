import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import ExceptionService from '@services/service/exception';
import BaseService from '@vendor/infrastructure/service/BaseService';
import {
    CopyOf, HasLength, EncodeHTML
} from "@vendor/plugin/helper";
import CreateEvent, {
    C_EVENT_SET_PROVINCES, C_EVENT_SET_CATEGORIES
} from '@services/store/CreateEvent';
import {
    EventService
} from '@services/service/ManageEvent';

export default class CreateEventService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
        this._RegisterStoreModule();
    }

    _RegisterStoreModule() {
        try {
            this.$store.registerModule('CreateEventStore', CreateEvent);
            this.$vm.$set(this.$vm, 'isModuleRegistered', true);
        } catch (e) {}
    }

    _UnregisterStoreModule() {
        try {
            if ( this.$vm.isModuleRegistered )
                this.$store.unregisterModule('CreateEventStore');
        } catch (e) {}
    }

    async provincesList() {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_ALL_PROVINCES));
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception )
        }
    }

    async processFetchAsyncData() {
        try {
            let response = await Promise.all([
                this.provincesList(),
                EventService.getEventCategories()
            ]);
            BaseService.commitToStore(this.$store, C_EVENT_SET_PROVINCES, response[0]);
            BaseService.commitToStore(this.$store, C_EVENT_SET_CATEGORIES, response[1]);
        } catch ( exception ) {
            console.log(exception);
            this.$vm.displayNotification(exception, { type: 'error' });
            //this.$vm.pushRouter( { name: 'MANAGE_EVENT' } );
        }
    }
}