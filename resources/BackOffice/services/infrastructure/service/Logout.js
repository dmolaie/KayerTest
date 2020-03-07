import {
    SET_LOGOUT
} from '@services/store/Login';
import TokenService from '@services/service/Token';
import BaseService from "@vendor/infrastructure/service/BaseService";
import HTTPService from '@vendor/plugin/httpService';
import Endpoint from '@endpoints';

export default class LogoutService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;
    }

    viewPortProcess() {
        BaseService.ViewPortProcess(this.$store , true);
    }

    async logoutProcess() {
        try {
            TokenService._ClearToken();
            BaseService.commitToStore( this.$store, SET_LOGOUT );
            await HTTPService.postRequest( Endpoint.get( Endpoint.LOGOUT ));
            this.$vm.pushReplace({ name: 'LOGIN' })
        } catch (e) {}
    }
}