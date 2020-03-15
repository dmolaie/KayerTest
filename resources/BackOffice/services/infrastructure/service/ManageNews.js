import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';
import {
    M_NEWS_SET_DATA
} from '@services/store/ManageNews'

export default class ManageNewsService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
    }

    async processFetchAsyncData() {
        try {
            let response = await HTTPService.getRequest(Endpoint.get(Endpoint.GET_NEWS_LIST), {
                page: 3
            });
            BaseService.commitToStore( this.$store, M_NEWS_SET_DATA, response );
        } catch ({ message }) {
            this.$vm.displayNotification(message, {
                type: 'error'
            })
        }
    }
}