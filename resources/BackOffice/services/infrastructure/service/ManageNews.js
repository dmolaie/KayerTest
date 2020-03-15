import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';
import {
    M_NEWS_SET_DATA
} from '@services/store/ManageNews';
import {
    HasLength
} from "@vendor/plugin/helper";

export default class ManageNewsService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
    }

    async processFetchAsyncData() {
        let {
            query
        } = this.$vm.$route;
        let queryString = HasLength( query ) ? ( query ) : ({
            status: 'published'
        });
        await this.getNewsListFilterByStatus( queryString );
    }

    async getNewsListFilterByStatus( query = {} ) {
        try {
            let response = await this.getNewsListFilterBy( query );
            BaseService.commitToStore( this.$store, M_NEWS_SET_DATA, response );
        } catch (e) {}
    }

    async getNewsListFilterBy( query ) {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_NEWS_LIST), query);
        } catch ({ message }) {
            this.$vm.displayNotification(message, {
                type: 'error'
            })
        }
    }
}