import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';
import CreateArticle, {
    C_ARTICLE_SET_CATEGORY
} from '@services/store/CreateArticle';
import {
    CopyOf, HasLength, EncodeHTML
} from "@vendor/plugin/helper";
import {
    ArticleService
} from '@services/service/ManageArticle';
import ExceptionService from '@services/service/exception';

export default class CreateArticleService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
        this._RegisterStoreModule();
    }

    _RegisterStoreModule() {
        try {
            this.$store.registerModule('CreateArticleStore', CreateArticle);
            this.$vm.$set(this.$vm, 'isModuleRegistered', true);
        } catch (e) {}
    }

    _UnregisterStoreModule() {
        try {
            if ( this.$vm.isModuleRegistered )
                this.$store.unregisterModule('CreateArticleStore');
        } catch (e) {}
    }

    async processFetchAsyncData() {
        try {
            await this.getCategoryList();
        } catch (e) {}
    }

    async getCategoryList() {
        try {
            let response = await ArticleService.getArticleCategories();
            BaseService.commitToStore(this.$store, C_ARTICLE_SET_CATEGORY, response);
        } catch ({ message }) {
            this.$vm.displayNotification( message, {
                type: 'error',
                duration: 4000
            })
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

    get createRequestBody() {
        try {
            let duplicateFrom = CopyOf( this.$vm.form );
            const formData = new FormData();

            duplicateFrom['publish_date'] = (new Date().getTime() / 1e3);
            console.log(duplicateFrom['category_ids']);
            if ( HasLength( duplicateFrom['category_ids'] ) ) {
                duplicateFrom['main_category_id'] = duplicateFrom['category_ids'][0];
                duplicateFrom['category_ids'].forEach(id => {
                    formData.append('category_ids[]', id);
                });
            }

            duplicateFrom['slug'] = duplicateFrom['slug'].trim().replace(/ /g, '-');


            delete duplicateFrom['category_ids'];

            Object.keys( duplicateFrom )
                .forEach( key => {
                    if (
                        !duplicateFrom[key] &&
                        typeof duplicateFrom[key] === 'string'
                    )
                        delete duplicateFrom[key]
                });

            if ( !!this.$vm.images.data )
                formData.append('images[]', this.$vm.images.data.get('images'));

            for ( let [key, value] of Object.entries( duplicateFrom ) ) {
                formData.append(key, value);
            }
            return formData;
        } catch (e) {
            throw e
        }
    }

    async onClickReleaseButton() {
        try {
            let payload = this.createRequestBody;
            let response = await HTTPService.uploadRequest(Endpoint.get(Endpoint.CREATE_ARTICLE_LIST), payload);
            this.$vm.displayNotification(response.message, {
                type: 'success',
                duration: 4000
            });
            this.$vm.pushRouter( { name: 'MANAGE_ARTICLE' } );
        }
        catch ( exception ) {
            const ERROR_MESSAGE = ExceptionService._GetErrorMessage( exception );
            this.$vm.displayNotification(ERROR_MESSAGE, {
                type: 'error'
            });
        }
    }
}