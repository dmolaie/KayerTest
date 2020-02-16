import {
    SET_LOGOUT
} from '@services/store/Login';
import TokenService from '@services/service/Token';
import BaseService from "@vendor/infrastructure/service/BaseService";
import awaitAsyncGenerator from "@babel/runtime/helpers/esm/awaitAsyncGenerator";

export default class LogoutService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;
    }

    logoutProcess() {
        try {
            TokenService._ClearToken();
            BaseService.commitToStore( this.$store, SET_LOGOUT );
            this.$vm.pushReplace({ name: 'LOGIN' })
        } catch (e) {}
    }
}