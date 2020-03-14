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

            if ( !duplicateFrom['publish_date'] )
                duplicateFrom['publish_date'] = (new Date().getTime() / 1e3);
            if ( HasLength( duplicateFrom['category_id'] ) )
                duplicateFrom['main_category_id'] = duplicateFrom['category_id'][0];
            if ( HasLength( duplicateFrom['description'] ) )
                duplicateFrom['description'] = EncodeHTML( duplicateFrom['description'] );

            return duplicateFrom;
        } catch (e) {
            throw e
        }
    }

    async onClickReleaseButton() {
        try {
            let payload = this.createRequestBody();
            console.log(payload);
            // CREATE_NEWS_ITEM
        }
        catch ({ message }) {
            this.$vm.displayNotification( message, {
                type: 'error',
                duration: 4000
            })
        }
    }
}