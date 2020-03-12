import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';

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
            console.log(Endpoint.get(Endpoint.GET_CATEGORY_LIST));
            let response = await HTTPService.getRequest(Endpoint.get(Endpoint.GET_CATEGORY_LIST), {
                category_type: 'news'
            });
            console.log('response: ', response);
        } catch ( e ) {
            console.log(e);
            // this.$vm.displayNotification( message, {
            //     type: 'error',
            //     duration: 4000
            // })
        }
    }
}