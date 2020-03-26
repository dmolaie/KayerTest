import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';
import EditArticle, {
    E_ARTICLE_SET_DATA,
    E_ARTICLE_SET_CATEGORIES,
} from '@services/store/EditArticle';
import {
    ArticleService
} from '@services/service/ManageArticle';
import {
    CopyOf, HasLength, EncodeHTML
} from "@vendor/plugin/helper";
import StatusService from '@services/service/Status';

export default class EditArticleService {
    constructor( layout ) {
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
        this._RegisterStoreModule();
    }

    _RegisterStoreModule() {
        try {
            this.$store.registerModule('EditArticleStore', EditArticle);
            this.$vm.$set(this.$vm, 'isModuleRegistered', true);
        } catch (e) {}
    }

    _UnregisterStoreModule() {
        try {
            if ( this.$vm.isModuleRegistered )
                this.$store.unregisterModule('EditArticleStore');
        } catch (e) {}
    }

    static async getDetailsOfArticleItem( id ) {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_NEWS_ITEM, { id }))
        } catch (e) {
            throw e;
        }
    }

    async processFetchAsyncData() {
        try {
            let response = await Promise.all([
                ArticleService.getArticleCategories(),
                EditArticleService.getDetailsOfArticleItem( this.$vm.$route.params.id )
            ]);

            BaseService.commitToStore(this.$store, E_ARTICLE_SET_CATEGORIES, response[0]);
            BaseService.commitToStore(this.$store, E_ARTICLE_SET_DATA, response[1]);
        } catch (e) {
            console.log((e));
            // { message }
            // this.$vm.displayNotification( message, {
            //     type: 'error',
            //     duration: 4000
            // });
            // this.$vm.pushRouter( { name: 'MANAGE_ARTICLE' } );
        }
    }
}