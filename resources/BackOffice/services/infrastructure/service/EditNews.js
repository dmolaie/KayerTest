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
import StatusService from '@services/service/Status';
import ExceptionService from '@services/service/exception';

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
                HTTPService.getRequest(Endpoint.get(Endpoint.GET_USER_PROVINCES)),
                EditNewsService.getDetailsOfNewsItem( this.$vm.$route.params.id )
            ]);

            BaseService.commitToStore(this.$store, E_NEWS_SET_CATEGORIES, responses[0]);
            BaseService.commitToStore(this.$store, E_NEWS_SET_PROVINCES, responses[1]);
            BaseService.commitToStore(this.$store, E_NEWS_SET_DATA, responses[2]);
        } catch ({ message }) {
            this.$vm.displayNotification( message, {
                type: 'error',
                duration: 4000
            });
            this.$vm.pushRouter( { name: 'MANAGE_NEWS' } );
        }
    }

    static async getDetailsOfNewsItem( id ) {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_NEWS_ITEM, { id }))
        } catch (e) {
            throw e;
        }
    }

    static async deleteImage( image_id ) {
        try {
            await HTTPService.postRequest( Endpoint.get( Endpoint.DELETE_IMAGES_ITEM ), {
                image_id
            })
        } catch (e) {}
    }

    checkFormValidation() {
        let {
            first_title,
            slug
        } = this.$vm.form;
        if ( !first_title.trim() ) {
            this.$vm.displayNotification('وارد کردن عنوان الزامی است.', {
                type: 'error'
            });
            return false;
        }
        if ( !slug.trim() ) {
            this.$vm.displayNotification('وارد کردن اسلاگ خبر الزامی است.', {
                type: 'error'
            });
            return false;
        }
        return true;
    }

    createUpdateRequestBody() {
        try {
            let duplicateFrom = CopyOf( this.$vm.form );
            const formData = new FormData();
            const NOW_TIMESTAMP = new Date().getTime() / 1e3;

            formData.append('news_id', duplicateFrom['news_id']);
            formData.append('first_title', duplicateFrom['first_title']);
            formData.append('province_id', duplicateFrom['province_id']);
            if ( !!duplicateFrom['second_title'] )
                formData.append('second_title', duplicateFrom['second_title']);
            if ( !!duplicateFrom['abstract'] )
                formData.append('abstract', duplicateFrom['abstract']);
            if ( !!duplicateFrom['description'] )
                formData.append('description', duplicateFrom['description']);
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

            (!this.$vm.form['is_published']) ? (
                formData.append('publish_date', (this.$vm.custom_publish_date || duplicateFrom['publish_date']))
            ) : (
                formData.append('publish_date', NOW_TIMESTAMP)
            );

            if ( !(this.$vm.detail['slug'] === duplicateFrom['slug'].trim()) )
                formData.append('slug', duplicateFrom['slug'].replace(/ /g, '-'));

            if ( !!this.$vm.images.main.data )
                formData.append('images[]', this.$vm.images.main.data.get('images'));
            if ( !!this.$vm.images.second.data )
                formData.append('images[]', this.$vm.images.second.data.get('images'));

            return formData;
        } catch (e) {
            throw e;
        }
    }

    async deleteUnusedImages() {
        try {
            await Promise.all(
                this.$vm.removedImages.map(image_id => EditNewsService.deleteImage( image_id ))
            )
        } catch (e) {}
    }

    async onClickRejectItemButton( news_id ) {
        try {
            let response = await NewsService.changeStatusNewsItem(news_id, StatusService.REJECT_STATUS);
            this.$vm.displayNotification(response.message, {
                type: 'success',
            });
            this.$vm.pushRouter( { name: 'MANAGE_NEWS' } );
        } catch ( exception ) {
            const ERROR_MESSAGE = ExceptionService._GetErrorMessage( exception );
            this.$vm.displayNotification(ERROR_MESSAGE, {
                type: 'error'
            });
        }
    }

    async onClickUpdateButton() {
        try {
            let payload = this.createUpdateRequestBody();
            await this.deleteUnusedImages();
            let response = await HTTPService.uploadRequest(Endpoint.get(Endpoint.EDIT_NEWS_ITEM), payload);
            this.$vm.displayNotification(response.message, {
                type: 'success',
            });
            this.$vm.pushRouter( { name: 'MANAGE_NEWS' } );
        } catch ( exception ) {
            const ERROR_MESSAGE = ExceptionService._GetErrorMessage( exception );
            this.$vm.displayNotification(ERROR_MESSAGE, {
                type: 'error'
            });
        }
    }

    async onClickChangeStatusButton( news_id ) {
        try {
            let response = await NewsService.changeStatusNewsItem(news_id, StatusService.CANCEL_STATUS);
            this.$vm.displayNotification(response.message, {
                type: 'success',
            });
            this.$vm.pushRouter( { name: 'MANAGE_NEWS' } );
        } catch ( exception ) {
            const ERROR_MESSAGE = ExceptionService._GetErrorMessage( exception );
            this.$vm.displayNotification(ERROR_MESSAGE, {
                type: 'error'
            });
        }
    }
}