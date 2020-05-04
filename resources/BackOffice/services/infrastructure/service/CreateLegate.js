import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import ExceptionService from '@services/service/exception';
import BaseService from '@vendor/infrastructure/service/BaseService';
import LocationService from '@services/service/Location';
import { UserService } from '@services/service/ManageLegate';
import { EventService } from '@services/service/ManageEvent';
import AuthenticationService from '@services/service/Authentication';

import CreateLegateStore, {
    C_LEGATE_SET_PROVINCES,
    C_LEGATE_SET_BASIC_INFO,
    C_LEGATE_SET_EVENT_LIST,
    C_LEGATE_SET_AUTHENTICATION
} from '@services/store/CreateLegate';

export default class CreateLegateService {
    constructor( layout ) {
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
        this._RegisterStoreModule();
    }

    _RegisterStoreModule() {
        try {
            this.$store.registerModule('CreateLegate', CreateLegateStore);
            this.$vm.$set(this.$vm, 'isModuleRegistered', true);
        } catch (e) { }
    }

    _UnregisterStoreModule() {
        try {
            if ( this.$vm.isModuleRegistered )
                this.$store.unregisterModule('CreateLegate');
        } catch (e) {}
    }

    async processFetchAsyncData() {
        try {
            let response = await Promise.all([
                UserService.getBasicRegisterInfo(),
                LocationService.getAllProvinces(),
                EventService.getEventList(),
                AuthenticationService.getAuthenticationList()
            ]);

            BaseService.commitToStore(this.$store, C_LEGATE_SET_BASIC_INFO, response[0]);
            BaseService.commitToStore(this.$store, C_LEGATE_SET_PROVINCES, response[1]);
            BaseService.commitToStore(this.$store, C_LEGATE_SET_EVENT_LIST, response[2]);
            BaseService.commitToStore(this.$store, C_LEGATE_SET_AUTHENTICATION, response[3]);
        } catch ( exception ) {
            this.$vm.displayNotification(exception, { type: 'error' });
            // this.$vm.pushRouter({ name: 'MANAGE_LEGATE', query: { role_type: 'legate' } });
        }
    }

    async nationalCodeInquiry( national_code ) {
        try {
            console.log('national_code: ', national_code);
        } catch ( exception ) {
            throw exception;
        }
    }
}