import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';
import {
    C_NEWS_SET_CATEGORY
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

    checkFormValidation() {
        let duplicateFrom = this.$vm.form;
        return !!duplicateFrom['first_title'].trim();
    }

    createRequestBody() {
        try {
            let duplicateFrom = CopyOf( this.$vm.form );
            const formData = new FormData();
            // if ( !duplicateFrom['publish_date'] )
            //     duplicateFrom['publish_date'] = (new Date().getTime() / 1e3);
            // if ( HasLength( duplicateFrom['category_id'] ) )
            //     duplicateFrom['main_category_id'] = duplicateFrom['category_id'][0];
            // if ( HasLength( duplicateFrom['description'] ) )
            //     duplicateFrom['description'] = EncodeHTML( duplicateFrom['description'] );
            // if ( !!this.$vm.images.main.data ) {
            //     formData.append('images', this.$vm.images.main.data.get('images'));
            //     duplicateFrom['images'] = formData;
            // }
            // if ( !!this.$vm.images.second.data ) {
            //     formData.append('images', this.$vm.images.second.data.get('images'));
            //     duplicateFrom['images'] = formData;
            // }
            // if ( !HasLength(duplicateFrom['category_id']) )
            //     delete duplicateFrom['category_id'];
            formData.append('publish_date', (new Date().getTime() / 1e3));
            formData.append('first_title', duplicateFrom['first_title']);
            console.log(this.$vm.images.main.data.get('images'), 'd');
            formData.append('images[]', this.$vm.images.main.data.get('images'));
            formData.append('province_id', 1);
            formData.append('language', 'fa');
            // Object.keys( duplicateFrom )
            //     .forEach( key => {
            //         if (
            //             !duplicateFrom[key] &&
            //             typeof duplicateFrom[key] === 'string'
            //         )
            //             delete duplicateFrom[key]
            //     });

            return formData;
        } catch (e) {
            throw e
        }
    }

    async onClickReleaseButton() {
        try {
            let payload = this.createRequestBody();
            console.log(payload);
            // let response = await HTTPService.uploadRequest(Endpoint.get(Endpoint.CREATE_NEWS_ITEM), payload);
            // this.$vm.displayNotification(response.message, {
            //     type: 'success',
            //     duration: 4000
            // });
            // this.$vm.pushRouter( { name: 'MANAGE_NEWS' } );
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