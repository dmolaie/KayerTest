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

        BaseService.ViewPortProcess(this.$store , true);
    }

    async logoutProcess() {
        try {
            const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]');
            let response = await HTTPService.postRequest( Endpoint.get( Endpoint.LOGOUT ), {
                _token: !!CSRF_TOKEN ? CSRF_TOKEN.getAttribute('content') : ''
            });
            TokenService._ClearToken();
            BaseService.commitToStore( this.$store, SET_LOGOUT );
            this.$vm.displayNotification( response.message, {
                type: 'success',
                duration: 4000
            });
            this.$vm.pushReplace({ name: 'LOGIN' })
        } catch ({ message }) {
            this.$vm.displayNotification( message, {
                type: 'error',
                duration: 4000
            })
        }
    }
}