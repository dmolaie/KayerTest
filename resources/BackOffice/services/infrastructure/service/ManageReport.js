import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';
import ExceptionService from '@services/service/exception';
import ManageReportStore from '@services/store/ManageReport';

export default class ManageReportService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
        this._RegisterStoreModule()
    }

    _RegisterStoreModule() {
        try {
            this.$store.registerModule('ManageReportStore', ManageReportStore);
            this.$vm.$set(this.$vm, 'isModuleRegistered', true);
        } catch (e) {}
    }

    _UnregisterStoreModule() {
        try {
            if ( this.$vm.isModuleRegistered )
                this.$store.unregisterModule('ManageReportStore');
        } catch (e) {}
    }

    // async getUsersReportList() {
    //     try {
    //         return await HTTPService.post(Endpoint.get(Endpoint.GET_USERS_REPORT));
    //     } catch ( exception ) {
    //         throw exception;
    //     }
    // }

    get requestPayload() {
        try {
            let { clientUser, legateUser } = this.$vm;
            const PAYLOAD = {},
                  TYPE = [];
            if ( clientUser.checked ) {
                TYPE.push('client');
                if ( !!clientUser.start_date ) PAYLOAD['register_from_client'] = clientUser.start_date;
                if ( !!clientUser.end_date ) PAYLOAD['register_end_client'] = clientUser.end_date;
                if ( !!clientUser.status ) PAYLOAD['status_client'] = clientUser.status;
            }
            if ( legateUser.checked ) {
                TYPE.push('legate');
                if ( !!legateUser.start_date ) PAYLOAD['register_from_legate'] = legateUser.start_date;
                if ( !!legateUser.start_date ) PAYLOAD['register_end_legate'] = legateUser.start_date;
                if ( !!legateUser.start_date ) PAYLOAD['status_legate'] = legateUser.start_date;
            }
            PAYLOAD['type'] = TYPE;
            return PAYLOAD
        } catch ( exception ) { throw exception; }
    }

    async getUserListFilterBy( page = 1 ) {
        try {
            const REQUEST_PAYLOAD = this.requestPayload;
            let response = await HTTPService.postRequest(Endpoint.get(Endpoint.GET_USERS_REPORT), {
                REQUEST_PAYLOAD
            }, {
                page
            });
            console.log('response: ', response);
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }

    async handelPagination( page ) {
        try {

        } catch ( exception ) {
            throw exception;
        }
    }
}