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
import ExceptionService from '@services/service/exception';
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
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_ARTICLE_ITEM, { id }))
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
        } catch ({ message }) {
            this.$vm.displayNotification( message, {
                type: 'error',
                duration: 4000
            });
            this.$vm.pushRouter( { name: 'MANAGE_ARTICLE' } );
        }
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
            this.$vm.displayNotification('وارد کردن اسلاگ صفحه الزامی است.', {
                type: 'error'
            });
            return false;
        }
        return true;
    }

    get createBodyRequest() {
        let duplicateFrom = CopyOf( this.$vm.form );
        const formData = new FormData();

        formData.append('article_id', duplicateFrom['article_id']);
        formData.append('publish_date', (new Date().getTime() / 1e3));
        if ( HasLength( duplicateFrom['description'] ) )
            formData.append('description', duplicateFrom['description']);
        if ( HasLength( duplicateFrom['category_ids'] ) ) {
            formData.append('main_category_id', duplicateFrom['category_ids'][0]);
            duplicateFrom['category_ids'].forEach(id => {
                formData.append('category_ids[]', id);
            });
        }
        formData.append('first_title', duplicateFrom['first_title']);
        if ( !!duplicateFrom['second_title'] )
            formData.append('second_title', duplicateFrom['second_title']);
        if ( !!duplicateFrom['third_title'] )
            formData.append('third_title', duplicateFrom['third_title']);
        if ( !! duplicateFrom['abstract'] )
            formData.append('abstract', duplicateFrom['abstract']);
        if ( !!duplicateFrom['language'] )
            formData.append('language', duplicateFrom['language']);
        if ( !(this.$vm.detail['slug'] === duplicateFrom['slug'].trim()) )
            formData.append('slug', duplicateFrom['slug'].replace(/ /g, '-'));

        if ( !!this.$vm.images.data )
            formData.append('images[]', this.$vm.images.data.get('images'));

        return formData;
    }

    static async deleteImage( image_id ) {
        try {
            await HTTPService.postRequest( Endpoint.get( Endpoint.DELETE_IMAGES_ITEM ), {
                image_id
            })
        } catch (e) {}
    }

    async deleteUnusedImages() {
        try {
            await Promise.all(
                this.$vm.removedImages.map(image_id => EditArticleService.deleteImage( image_id ))
            )
        } catch (e) {}
    }

    async onClickSaveChangeButton() {
        try {
            const BODY_REQUEST = this.createBodyRequest;
            await this.deleteUnusedImages();
            let response = await HTTPService.uploadRequest(Endpoint.get(Endpoint.EDIT_ARTICLE_ITEM), BODY_REQUEST);
            this.$vm.displayNotification(response.message, {
                type: 'success'
            });
            this.$vm.pushRouter( { name: 'MANAGE_ARTICLE' } );
        } catch ( exception ) {
            const ERROR_MESSAGE = ExceptionService._GetErrorMessage( exception );
            this.$vm.displayNotification(ERROR_MESSAGE, {
                type: 'error'
            });
        }
    }

    async onClickChangeStatusArticleToRejectButton( article_id ) {
        try {
            let response = await ArticleService.changeStatusArticleItem(article_id, StatusService.REJECT_STATUS);
            this.$vm.displayNotification(response.message, {
                type: 'success',
            });
            this.$vm.pushRouter( { name: 'MANAGE_ARTICLE' } );
        } catch ({ message }) {
            this.$vm.displayNotification( message, {
                type: 'error',
            });
            throw message;
        }
    }

    async onClickChangeStatusArticleToCancelButton( article_id ) {
        try {
            let response = await ArticleService.changeStatusArticleItem(article_id, StatusService.CANCEL_STATUS);
            this.$vm.displayNotification(response.message, {
                type: 'success',
            });
            this.$vm.pushRouter( { name: 'MANAGE_ARTICLE' } );
        } catch ({ message }) {
            this.$vm.displayNotification( message, {
                type: 'error',
            });
            throw message;
        }
    }
}