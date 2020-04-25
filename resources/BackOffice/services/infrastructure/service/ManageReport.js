import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';
import ExceptionService from '@services/service/exception';
import ManageReportStore, {
    M_REPORT_SET_DATA
} from '@services/store/ManageReport';
import { UserReportPresenter } from '@services/presenter/ManageReport';

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

    async getAllUsersReport() {
        try {
            const REQUEST_PAYLOAD = this.requestPayload;
            let response = await HTTPService.postRequest(Endpoint.get(Endpoint.GET_ALL_USERS_REPORT), REQUEST_PAYLOAD);
            return new UserReportPresenter( response.data )
        } catch ( exception ) {
            throw exception;
        }
    }

    get requestPayload() {
        try {
            let { clientUser, legateUser } = this.$vm;
            const PAYLOAD = {};

            PAYLOAD['type_client'] = clientUser.checked;
            if ( PAYLOAD['type_client'] ) {
                if ( !!clientUser.start_date ) PAYLOAD['register_from_client'] = `${clientUser.start_date}`;
                if ( !!clientUser.end_date ) PAYLOAD['register_end_client'] = `${clientUser.end_date}`;
                if ( !!clientUser.status ) PAYLOAD['status_client'] = `${clientUser.status}`;
            }
            PAYLOAD['type_legate'] = legateUser.checked;
            if ( PAYLOAD['type_legate'] ) {
                if ( !!legateUser.start_date ) PAYLOAD['register_from_legate'] = `${legateUser.start_date}`;
                if ( !!legateUser.end_date ) PAYLOAD['register_end_legate'] = `${legateUser.end_date}`;
                if ( !!legateUser.status ) PAYLOAD['status_legate'] = `${legateUser.status}`;
            }
            return PAYLOAD
        } catch ( exception ) { throw exception; }
    }

    async getUserListFilterBy( page = 1 ) {
        try {
            const REQUEST_PAYLOAD = this.requestPayload;
            let response = await HTTPService.postRequest(Endpoint.get(Endpoint.GET_USERS_REPORT), REQUEST_PAYLOAD, {
                page
            });
            BaseService.commitToStore(this.$store, M_REPORT_SET_DATA, response);
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }

    async handelPagination( page ) {
        try {
            await this.getUserListFilterBy( page )
        } catch ( exception ) {
            throw exception;
        }
    }
}