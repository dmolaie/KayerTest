import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';
import ExceptionService from '@services/service/exception';
import {
    UserService
} from '@services/service/ManageLegate';
import EditUser, {
    E_USER_SET_DATA, E_USER_SET_BASIC_DATA,
    E_USER_SET_PROVINCES
} from '@services/store/EditUsers';
import {
    ProvincesPresenter,
} from '@vendor/infrastructure/presenter/MainPresenter';


export default class EditUserService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
        this._RegisterStoreModule();
    }

    _RegisterStoreModule() {
        try {
            this.$store.registerModule('EditUserStore', EditUser);
            this.$vm.$set(this.$vm, 'isModuleRegistered', true);
        } catch (e) {}
    }

    _UnregisterStoreModule() {
        try {
            if ( this.$vm.isModuleRegistered ) this.$store.unregisterModule('EditUserStore');
        } catch (e) {}
    }

    async processFetchAsyncData() {
        try {
            let response = await Promise.all([
                UserService.getUserInfoByUserID( this.$vm.$route.params.id ),
                UserService.getBasicRegisterInfo(),
                HTTPService.getRequest(Endpoint.get(Endpoint.GET_ALL_PROVINCES))
            ]);
            BaseService.commitToStore(this.$store, E_USER_SET_DATA, response[0]);
            BaseService.commitToStore(this.$store, E_USER_SET_BASIC_DATA, response[1]);
            BaseService.commitToStore(this.$store, E_USER_SET_PROVINCES, response[2]);
        } catch ( exception ) {
            const EXCEPTION = ExceptionService._GetErrorMessage( exception );
            this.$vm.displayNotification(EXCEPTION, { type: 'error' });
        }
    }

    async getCityByProvincesId( province_id ) {
        try {
            let response = await HTTPService.getRequest(Endpoint.get(Endpoint.GET_CITY_BY_PROVINCES_ID), {
                province_id
            });
            return { ...new ProvincesPresenter( response.data ) }
        } catch ( exception ) {
            const EXCEPTION = ExceptionService._GetErrorMessage( exception );
            this.$vm.displayNotification(EXCEPTION, { type: 'error' });
        }
    }

}