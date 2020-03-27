import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';
import {
    M_NEWS_SET_DATA,
    M_NEWS_UPDATE_DATA
} from '@services/store/ManageNews';
import {
    HasLength, CopyOf
} from "@vendor/plugin/helper";
import StatusService from '@services/service/Status';

export const DEFAULT_STATUS = {
    status: StatusService.PUBLISH_STATUS
};

export class NewsService {
    static async getNewsCategories() {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_CATEGORY_LIST), {
                category_type: 'news'
            });
        } catch (e) {
            throw e;
        }
    }

    static async getProvincesList() {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_ALL_PROVINCES));
        } catch (e) {
            throw e;
        }
    }

    static async changeStatusNewsItem(news_id, status) {
        try {
            return await HTTPService.postRequest(Endpoint.get(Endpoint.EDIT_STATUS_NEWS_ITEM), {
                news_id, status
            });
        } catch (e) {
            throw e
        }
    }
}

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

    async deleteNewsItem( id ) {
        try {
            let response = await HTTPService.deleteRequest(Endpoint.get(Endpoint.DELETE_NEWS_ITEM, { id }));
            this.$vm.displayNotification(response.message, {
                type: 'success'
            });
            let data = CopyOf( Object.values( this.$vm.items ) );
            let findIndex = data.findIndex( item => item.id === id );
            if ( findIndex >= 0 )
                data.splice(findIndex, 1);
            BaseService.commitToStore(this.$store, M_NEWS_UPDATE_DATA, data)
        } catch ( exception ) {
            this.$vm.displayNotification(exception.message, {
                type: 'error'
            });
        }
    }

    async changeStatusNewsItem( news_id, status ) {
        try {
            let response = await NewsService.changeStatusNewsItem(news_id, status);
            this.$vm.displayNotification(response.message, {
                type: 'success'
            });
            let data = CopyOf( Object.values( this.$vm.items ) );
            let findIndex = data.findIndex( item => item.id === news_id );
            if ( findIndex >= 0 )
                data.splice(findIndex, 1);
            BaseService.commitToStore(this.$store, M_NEWS_UPDATE_DATA, data)
        } catch ( exception ) {
            this.$vm.displayNotification(exception.message, {
                type: 'error'
            });
        }
    };

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