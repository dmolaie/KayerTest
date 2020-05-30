import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import ExceptionService from '@services/service/exception';
import BaseService from '@vendor/infrastructure/service/BaseService';
import AuthenticationService from '@services/service/Authentication';
import { UserService } from '@services/service/ManageLegate';
import { EventService } from '@services/service/ManageEvent';
import CreateCards, {
    C_CARDS_SET_PROVINCES, C_CARDS_SET_BASIC_INFO, C_CARDS_SET_EVENT_LIST, C_CARDS_SET_AUTHENTICATION
} from '@services/store/CreateCards';
import { toEnglishDigits } from '@vendor/plugin/helper';

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
            this.$store.registerModule('CreateCardsStore', CreateCards);
            this.$vm.$set(this.$vm, 'isModuleRegistered', true);
        } catch (e) {}
    }

    _UnregisterStoreModule() {
        try {
            if ( this.$vm.isModuleRegistered )
                this.$store.unregisterModule('CreateCardsStore');
        } catch (e) {}
    }

    async processFetchAsyncData() {
        try {
            let response = await Promise.all([
                UserService.getBasicRegisterInfo(),
                HTTPService.getRequest(Endpoint.get(Endpoint.GET_ALL_PROVINCES)),
                EventService.getEventList(),
                AuthenticationService.getAuthenticationList()
            ]);
            BaseService.commitToStore(this.$store, C_CARDS_SET_BASIC_INFO, response[0]);
            BaseService.commitToStore(this.$store, C_CARDS_SET_PROVINCES,  response[1]);
            BaseService.commitToStore(this.$store, C_CARDS_SET_EVENT_LIST, response[2]);
            BaseService.commitToStore(this.$store, C_CARDS_SET_AUTHENTICATION, response[3]);
        } catch ( exception ) {
            const MESSAGE = ExceptionService._GetErrorMessage( exception );
            this.$vm.displayNotification(MESSAGE, { type: 'error' });
        }
    }

    async validateUserNationalCode( national_code ) {
        try {
            let response = await HTTPService.postRequest(Endpoint.get(Endpoint.VALIDATE_USER), {
                national_code: toEnglishDigits(national_code)
            });
            return response.message;
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }

    async registerDonationCard( payload ) {
        try {
            let response = await HTTPService.postRequest(Endpoint.get(Endpoint.REGISTER_USER_BY_ADMIN), payload);
            return response.message;
        } catch ( exception ) {
            if ( exception?.errors ) {
                Object.entries( exception?.errors )
                    .forEach( ([key, val]) => {
                        if ( this.$vm.validation[key] )
                            this.$vm.setErrorMassage(key, val[0])
                    });
            }
            throw ExceptionService._GetErrorMessage( exception );
        }
    }
}