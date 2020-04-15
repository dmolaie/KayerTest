import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import ExceptionService from '@services/service/exception';
import BaseService from '@vendor/infrastructure/service/BaseService';

export default class CreateCardsService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
        this._RegisterStoreModule();
    }

    _RegisterStoreModule() {
        try {
            // this.$store.registerModule('CreateEventStore', CreateEvent);
            // this.$vm.$set(this.$vm, 'isModuleRegistered', true);
        } catch (e) {}
    }

    _UnregisterStoreModule() {
        try {
            if ( this.$vm.isModuleRegistered )
                this.$store.unregisterModule('CreateEventStore');
        } catch (e) {}
    }

    async checkNationalCodeValidation( national_code ) {
        try {
            let response = await HTTPService.postRequest(Endpoint.get(Endpoint.VALIDATE_USER), {
                national_code
            });
            return response.message;
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }
}