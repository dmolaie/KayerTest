import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';
import {
    C_NEWS_SET_CATEGORY,
    C_NEWS_SET_PROVINCES
} from '@services/store/CreateNews';
import {
    CopyOf, HasLength, EncodeHTML
} from "@vendor/plugin/helper";

export default class CreateNewsService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
    }

    async processFetchAsyncData() {
        try {
            await this.getCategoryList();
            await this.getProvincesList();
        } catch (e) {}
    }

    async getCategoryList() {
        try {
            let response = await HTTPService.getRequest(Endpoint.get(Endpoint.GET_CATEGORY_LIST), {
                category_type: 'news'
            });
            BaseService.commitToStore(this.$store, C_NEWS_SET_CATEGORY, response);
        } catch ({ message }) {
            this.$vm.displayNotification( message, {
                type: 'error',
                duration: 4000
            })
        }
    }

    async getProvincesList() {
        try {
            let response = await HTTPService.getRequest(Endpoint.get(Endpoint.GET_ALL_PROVINCES));
            BaseService.commitToStore(this.$store, C_NEWS_SET_PROVINCES, response);
        } catch ({ message }) {
            this.$vm.displayNotification( message, {
                type: 'error',
                duration: 4000
            })
        }
    }

    checkFormValidation() {
        let duplicateFrom = this.$vm.form;
        return !!duplicateFrom['first_title'].trim();
    }

    createRequestBody() {
        try {
            let duplicateFrom = CopyOf( this.$vm.form );
            const formData = new FormData();

            if ( !duplicateFrom['publish_date'] )
                duplicateFrom['publish_date'] = (new Date().getTime() / 1e3);

            if ( !duplicateFrom['province_id'] )
                duplicateFrom['province_id'] = ( this.$vm.provinces[0]?.id || 1 );

            if ( HasLength( duplicateFrom['category_ids'] ) ) {
                duplicateFrom['main_category_id'] = duplicateFrom['category_ids'][0];
                duplicateFrom['category_ids'].forEach(id => {
                    formData.append('category_ids[]', id);
                });
            }

            delete duplicateFrom['category_ids'];

            if ( HasLength( duplicateFrom['description'] ) )
                duplicateFrom['description'] = EncodeHTML( duplicateFrom['description'] );

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
            let payload = this.createRequestBody();
            console.log(payload);
            let response = await HTTPService.uploadRequest(Endpoint.get(Endpoint.CREATE_NEWS_ITEM), payload);
            this.$vm.displayNotification(response.message, {
                type: 'success',
                duration: 4000
            });
            this.$vm.pushRouter( { name: 'MANAGE_NEWS' } );
        }
        catch ( exception ) {
            let errorMessage = exception.message;
            let errors = exception?.errors;
            if (!!errors)
                errorMessage = Object.entries(errors)[0][1][0];
            this.$vm.displayNotification(errorMessage, {
                type: 'error',
                duration: 4000
            })
        }
    }
}