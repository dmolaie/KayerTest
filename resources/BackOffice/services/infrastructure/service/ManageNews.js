import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';

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
                page: 1
            });
            console.log('response', response);
        } catch (e) {
            console.log(e);
        }
    }
}