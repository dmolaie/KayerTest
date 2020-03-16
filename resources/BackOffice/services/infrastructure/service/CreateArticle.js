import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';
import {
    C_ARTICLE_SET_CATEGORY
} from '@services/store/CreateArticle';
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
        } catch (e) {}
    }

    async getCategoryList() {
        try {
            let response = await HTTPService.getRequest(Endpoint.get(Endpoint.GET_CATEGORY_LIST), {
                category_type: 'article'
            });
            BaseService.commitToStore(this.$store, C_ARTICLE_SET_CATEGORY, response);
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

            duplicateFrom['publish_date'] = (new Date().getTime() / 1e3);

            if ( HasLength( duplicateFrom['description'] ) )
                duplicateFrom['description'] = EncodeHTML( duplicateFrom['description'] );

            if ( HasLength( duplicateFrom['category_ids'] ) ) {
                duplicateFrom['main_category_id'] = duplicateFrom['category_ids'][0].id;
                duplicateFrom['category_ids'].forEach(({ id }) => {
                    formData.append('category_ids[]', id);
                });
            }

            if ( HasLength( duplicateFrom['slug'] ) )
                duplicateFrom['slug'] = duplicateFrom['slug'].replace(/ /g, '-');


            delete duplicateFrom['category_ids'];

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
            let response = await HTTPService.uploadRequest(Endpoint.get(Endpoint.CREATE_ARTICLE_LIST), payload);
            this.$vm.displayNotification(response.message, {
                type: 'success',
                duration: 4000
            });
            this.$vm.pushRouter( { name: 'MANAGE_ARTICLE' } );
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