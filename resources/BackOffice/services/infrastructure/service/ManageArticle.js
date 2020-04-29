import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';
import StatusService from '@services/service/Status';
import {
    M_ARTICLE_SET_DATA,
    M_ARTICLE_UPDATE_DATA
} from '@services/store/ManageArticle';
import { GET_USER_ID } from '@services/store/Login';
import { HasLength, CopyOf } from "@vendor/plugin/helper";
import {
    CategoryService, CATEGORIES_TYPE
} from '@services/service/ManageCategory';

export const DEFAULT_STATUS = {
    status: StatusService.PUBLISH_STATUS
};

export class ArticleService {
    static async getArticleCategories() {
        try {
            return await CategoryService.getCategoryListByType( CATEGORIES_TYPE['event'] );
        } catch (e) {
            throw e;
        }
    }
    /**
     * @param article_id { Number }
     * @param status { String }
     */
    static async changeStatusArticleItem(article_id, status) {
        try {
            return await HTTPService.postRequest(Endpoint.get(Endpoint.EDIT_STATUS_ARTICLE_ITEM), {
                article_id, status
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
        await this._GetArticleListFilterBy( queryString );
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

            await this._GetArticleListFilterBy( QUERY_STRING );
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
            await this._GetArticleListFilterBy( QUERY_STRING );
        } catch (e) {}
        finally {
            // this.$vm.$set(this.$vm, 'isPending', false);
        }
    }

    async deleteArticleItem( id ) {
        try {
            let response = await HTTPService.deleteRequest(Endpoint.get(Endpoint.DELETE_ARTICLE_LIST, { id }));
            this.$vm.displayNotification(response.message, {
                type: 'success'
            });
            let data = CopyOf( Object.values( this.$vm.items ) );
            let findIndex = data.findIndex( item => item.id === id );
            if ( findIndex >= 0 )
                data.splice(findIndex, 1);
            BaseService.commitToStore(this.$store, M_ARTICLE_UPDATE_DATA, data)
        } catch ( exception ) {
            this.$vm.displayNotification(exception.message, {
                type: 'error'
            });
        }
    }

    async changeStatusArticleItem( article_id, status ) {
        try {
            let response = await ArticleService.changeStatusArticleItem(article_id, status);
            this.$vm.displayNotification(response.message, {
                type: 'success'
            });
            let data = CopyOf( Object.values( this.$vm.items ) );
            let findIndex = data.findIndex( item => item.id === article_id );
            if ( findIndex >= 0 )
                data.splice(findIndex, 1);
            BaseService.commitToStore(this.$store, M_ARTICLE_UPDATE_DATA, data)
        } catch ( exception ) {
            this.$vm.displayNotification(exception.message, {
                type: 'error'
            });
        }
    };

    async _GetArticleListFilterBy( query = {} ) {
        try {
            const QUERY_STRING = CopyOf( query );
            if ( QUERY_STRING['status'] === StatusService.MY_POST_STATUS ) {
                delete QUERY_STRING['status'];
                QUERY_STRING['publisher_id'] = this.$store.getters[GET_USER_ID]
            }
            let response = await this.getArticleListFilterBy( QUERY_STRING );
            BaseService.commitToStore( this.$store, M_ARTICLE_SET_DATA, response );
        } catch (e) {}
    }

    async getArticleListFilterBy( query ) {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_ARTICLE_LIST), query);
        } catch ({ message }) {
            this.$vm.displayNotification(message, {
                type: 'error'
            })
        }
    }
}