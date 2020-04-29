import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import ExceptionService from '@services/service/exception';
import BaseService from '@vendor/infrastructure/service/BaseService';
import { HasLength } from '@vendor/plugin/helper';
import ManageCategoryStore, {
    M_CATEGORY_SET_DATA
} from '@services/store/ManageCategory';

export const CATEGORIES_TYPE = {
    ['news']: 'news',
    ['text']: 'text',
    ['image']: 'image',
    ['video']: 'video',
    ['voice']: 'voice',
    ['event']: 'event',
    ['article']: 'article',
};

const DEFAULT_STATUS = {
    type: CATEGORIES_TYPE.news
};

export class CategoryService {
    /**
     * @param category_type
     */
    static async getCategoryListByType( category_type ) {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_CATEGORY_LIST), { category_type });
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }
}

export default class ManageCategoryService {
    constructor( layout ) {
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess(this.$store , false);
        this._RegisterStoreModule();
    }

    _RegisterStoreModule() {
        try {
            this.$store.registerModule('ManageCategory', ManageCategoryStore);
            this.$vm.$set(this.$vm, 'isModuleRegistered', true);
        } catch (e) {}
    }

    _UnregisterStoreModule() {
        try {
            if ( this.$vm.isModuleRegistered )
                this.$store.unregisterModule('ManageCategory');
        } catch (e) {}
    }

    async getCategoriesListFilterBy( queryString ) {
        try {
            let response = await CategoryService.getCategoryListByType( queryString.type );
            BaseService.commitToStore(this.$store, M_CATEGORY_SET_DATA, response)
        } catch ( exception ) {
            throw exception;
        }
    }

    async processFetchAsyncData() {
        try {
            let { query } = this.$vm.$route;
            let QUERY_STRING = HasLength( query ) ? query : DEFAULT_STATUS;
            await this.getCategoriesListFilterBy( QUERY_STRING );
        } catch ( exception ) {
            this.$vm.displayNotification(exception, { type: 'error' })
        }
    }
}