import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';
import {
    M_NEWS_SET_DATA
} from '@services/store/ManageNews';
import {
    HasLength
} from "@vendor/plugin/helper";

export const DEFAULT_STATUS = {
    status: 'published'
};

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
        let queryString = HasLength( query ) ? query : DEFAULT_STATUS;
        await this._GetNewsListFilterBy( queryString );
    }

    async HandleFilterAction( { create_date_start, create_date_end}, { query } ) {
        try {
            const QUERY_STRING = ( HasLength( query ) ) ? query : DEFAULT_STATUS;
            ( !!create_date_start ) ? (
                QUERY_STRING['create_date_start'] = create_date_start
            ) : (
                delete QUERY_STRING['create_date_start']
            );
            ( !!create_date_end ) ? (
                QUERY_STRING['create_date_end'] = create_date_end
            ) : (
                delete QUERY_STRING['create_date_end']
            );

            await this._GetNewsListFilterBy( QUERY_STRING );
        } catch (e) {}
    }

    async HandelSearchAction( searchValue, { query } ) {
        try {
            const QUERY_STRING = ( HasLength( query ) ) ? query : DEFAULT_STATUS;
            ( HasLength( searchValue.trim() ) ) ? (
                QUERY_STRING['first_title'] = searchValue.trim()
            ) : (
                delete QUERY_STRING['first_title']
            );
            await this._GetNewsListFilterBy( QUERY_STRING );
        } catch (e) {}
        finally {
            // this.$vm.$set(this.$vm, 'isPending', false);
        }
    }

    async _GetNewsListFilterBy( query = {} ) {
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