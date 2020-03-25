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

    createUpdateRequestBody() {
        try {
            let duplicateFrom = CopyOf( this.$vm.form );
            const formData = new FormData();

            formData.append('news_id', duplicateFrom['news_id']);
            formData.append('first_title', duplicateFrom['first_title']);
            formData.append('publish_date', (new Date().getTime() / 1e3));
            formData.append('province_id', duplicateFrom['province_id']);
            if ( !!duplicateFrom['second_title'] )
                formData.append('second_title', duplicateFrom['second_title']);
            if ( !!duplicateFrom['abstract'] )
                formData.append('abstract', duplicateFrom['abstract']);
            if ( !!duplicateFrom['description'] )
                formData.append('description', EncodeHTML( duplicateFrom['description'] ));
            if ( !!duplicateFrom['source_link'] )
                formData.append('source_link', duplicateFrom['source_link']);
            if ( !!duplicateFrom['language'] )
                formData.append('language', duplicateFrom['language']);
            if ( HasLength( duplicateFrom['category_ids'] ) ) {
                formData.append('main_category_id', duplicateFrom['category_ids'][0]);
                duplicateFrom['category_ids'].forEach(id => {
                    formData.append('category_ids[]', id);
                });
            }

            return formData;
        } catch (e) {
            throw e;
        }
    }

    async onClickUpdateButton() {
        try {
            let payload = this.createUpdateRequestBody();
            console.log(payload, 'payload');
            let response = await HTTPService.uploadRequest(Endpoint.get(Endpoint.EDIT_NEWS_ITEM), payload)
            this.$vm.displayNotification(response.message, {
                type: 'success',
                duration: 4000
            });
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