import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';
import CreateMenu, {
    C_NEWS_SET_CATEGORY,
    C_NEWS_SET_PROVINCES
} from '@services/store/CreateNews';
import {
    NewsService
} from '@services/service/ManageNews';
import {
    CopyOf, HasLength, EncodeHTML
} from "@vendor/plugin/helper";
import ExceptionService from '@services/service/exception';

export default class CreateNewsService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
        this._RegisterStoreModule();
    }

    _RegisterStoreModule() {
        try {
            this.$store.registerModule('CreateMenuStore', CreateMenu);
            this.$vm.$set(this.$vm, 'isModuleRegistered', true);
        } catch (e) {}
    }

    _UnregisterStoreModule() {
        try {
            if ( this.$vm.isModuleRegistered )
                this.$store.unregisterModule('CreateMenuStore');
        } catch (e) {}
    }

    async processFetchAsyncData() {
        try {
            let response = await Promise.all([
                NewsService.getNewsCategories(),
                HTTPService.getRequest(Endpoint.get(Endpoint.GET_USER_PROVINCES))
            ]);

            BaseService.commitToStore(this.$store, C_NEWS_SET_CATEGORY, response[0]);
            BaseService.commitToStore(this.$store, C_NEWS_SET_PROVINCES, response[1]);
        }
        catch ({ message }) {
            this.$vm.displayNotification( message, {
                type: 'error',
                duration: 4000
            });
            this.$vm.pushRouter( { name: 'MANAGE_NEWS' } );
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
            this.$vm.displayNotification('وارد کردن اسلاگ خبر الزامی است.', {
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

            if ( !duplicateFrom['publish_date'] )
                duplicateFrom['publish_date'] = (new Date().getTime() / 1e3);

            duplicateFrom['province_id'] = ( duplicateFrom['province_id'] || this.$vm.defaultProvinces.id );

            if ( HasLength( duplicateFrom['category_ids'] ) ) {
                duplicateFrom['main_category_id'] = duplicateFrom['category_ids'][0];
                duplicateFrom['category_ids'].forEach(id => {
                    formData.append('category_ids[]', id);
                });
            }

            delete duplicateFrom['category_ids'];

            duplicateFrom['slug'] = duplicateFrom['slug'].trim().replace(/ /g, '-');

            Object.keys( duplicateFrom )
                .forEach( key => {
                    if (
                        !duplicateFrom[key] &&
                        typeof duplicateFrom[key] === 'string'
                    )
                        delete duplicateFrom[key]
                });

            if ( !!this.$vm.images.main.data )
                formData.append('images[]', this.$vm.images.main.data.get('images'));
            if ( !!this.$vm.images.second.data )
                formData.append('images[]', this.$vm.images.second.data.get('images'));

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
            let REQUEST_BODY = this.createRequestBody;
            let response = await HTTPService.uploadRequest(Endpoint.get(Endpoint.CREATE_NEWS_ITEM), REQUEST_BODY);
            this.$vm.displayNotification(response.message, {
                type: 'success',
                duration: 4000
            });
            this.$vm.pushRouter( { name: 'MANAGE_NEWS' } );
        }
        catch ( exception ) {
            const ERROR_MESSAGE = ExceptionService._GetErrorMessage( exception );
            this.$vm.displayNotification(ERROR_MESSAGE, {
                type: 'error'
            });
        }
    }
}