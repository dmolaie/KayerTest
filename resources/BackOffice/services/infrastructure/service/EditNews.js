import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';
import EditNewsStore, {
    E_NEWS_SET_DATA,
    E_NEWS_SET_PROVINCES,
    E_NEWS_SET_CATEGORIES
} from '@services/store/EditNews';
import {
    NewsService
} from '@services/service/ManageNews';
import {
    CopyOf, HasLength, EncodeHTML
} from "@vendor/plugin/helper";
//DELETE_IMAGES_ITEM
export default class EditNewsService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
        this._RegisterStoreModule();
    }

    _RegisterStoreModule() {
        try {
            this.$store.registerModule('EditNewsStore', EditNewsStore);
            this.$vm.$set(this.$vm, 'isModuleRegistered', true);
        } catch (e) {}
    }

    _UnregisterStoreModule() {
        try {
            if ( this.$vm.isModuleRegistered )
                this.$store.unregisterModule('EditNewsStore');
        } catch (e) {}
    }

    async processFetchAsyncData() {
        try {
            let responses = await Promise.all([
                NewsService.getNewsCategories(),
                NewsService.getProvincesList(),
                EditNewsService.getDetailsOfNewsItem( this.$vm.$route.params.id )
            ]);

            BaseService.commitToStore(this.$store, E_NEWS_SET_CATEGORIES, responses[0]);
            BaseService.commitToStore(this.$store, E_NEWS_SET_PROVINCES, responses[1]);
            BaseService.commitToStore(this.$store, E_NEWS_SET_DATA, responses[2]);
        } catch ({ message }) {
            this.$vm.displayNotification( message, {
                type: 'error',
                duration: 4000
            })
        }
    }

    static async getDetailsOfNewsItem( id ) {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_NEWS_ITEM, { id }))
        } catch (e) {
            throw e;
        }
    }

    async onClickUpdateButton() {
        try {
            // let response = await HTTPService.postRequest(Endpoint.get(Endpoint.EDIT_NEWS_ITEM));
        } catch ({ message }) {
            this.$vm.displayNotification( message, {
                type: 'error',
                duration: 4000
            })
        }
    }

    async onClickUnPublishButton() {
        try {

        } catch ({ message }) {
            this.$vm.displayNotification( message, {
                type: 'error',
                duration: 4000
            })
        }
    }
}