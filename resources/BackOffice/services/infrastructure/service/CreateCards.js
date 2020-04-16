import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import ExceptionService from '@services/service/exception';
import BaseService from '@vendor/infrastructure/service/BaseService';
import {
    UserService
} from '@services/service/ManageLegate';
import {
    EventService
} from '@services/service/ManageEvent';
import {
    ProvincesPresenter,
} from '@vendor/infrastructure/presenter/MainPresenter';
import {
    EventPresenter
} from '@services/presenter/EditUsers';
import CreateCards, {
    C_CARDS_SET_PROVINCES, C_CARDS_SET_BASIC_INFO, C_CARDS_SET_EVENT_LIST
} from '@services/store/CreateCards';
import {
    NationalCodeValidator
} from './../../../../vendor/plugin/helper';

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

    // ///فیلد کد ملی الزامی است
    // NationalCodeValidator


    async processFetchAsyncData() {
        try {
            let response = await Promise.all([
                UserService.getBasicRegisterInfo(),
                HTTPService.getRequest(Endpoint.get(Endpoint.GET_ALL_PROVINCES)),
                EventService.getEventList()
            ]);
            BaseService.commitToStore(this.$store, C_CARDS_SET_BASIC_INFO, response[0]);
            BaseService.commitToStore(this.$store, C_CARDS_SET_PROVINCES,  response[1]);
            BaseService.commitToStore(this.$store, C_CARDS_SET_EVENT_LIST, response[2]);
        } catch ( exception ) {
            const MESSAGE = ExceptionService._GetErrorMessage( exception );
            this.$vm.displayNotification(MESSAGE, { type: 'error' });
        }
    }

    async getCityByProvincesId( province_id ) {
        try {
            if ( !!province_id ) {
                let response = await HTTPService.getRequest(Endpoint.get(Endpoint.GET_CITY_BY_PROVINCES_ID), {
                    province_id
                });
                return { ...new ProvincesPresenter( response.data ) }
            }
        } catch ( exception ) {
            const EXCEPTION = ExceptionService._GetErrorMessage( exception );
            this.$vm.displayNotification(EXCEPTION, { type: 'error' });
        }
    }

    async handelEventFieldSearch( title ) {
        try {
            const QUERYSTRING = !!title ? { title } : {};
            let response = await EventService.getEventList( QUERYSTRING );
            return new EventPresenter( response?.data?.items || [] );
        } catch ( exception ) { throw exception; }
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