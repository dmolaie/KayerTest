import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';
import {
    C_NEWS_SET_CATEGORY
} from '@services/store/CreateNews';

export default class CreateNewsService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
    }

    async processFetchAsyncData() {
        try {
            await this.getCategoryList();
        } catch (e) {}
    }

    async getCategoryList() {
        try {
            let response = await HTTPService.getRequest(Endpoint.get(Endpoint.GET_CATEGORY_LIST), {
                category_type: 'news'
            });
            BaseService.commitToStore(this.$store, C_NEWS_SET_CATEGORY, response);
        } catch ({ message }) {
            this.$vm.displayNotification( message, {
                type: 'error',
                duration: 4000
            })
        }
    }
}