import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import TokenService from '@services/service/Token';

export default class ManageMenuService {
    constructor( ) {

    }

    async getList() {
        try {
            console.log('asd');
            let response = await HTTPService.getRequest( Endpoint.get( Endpoint.GET_MENU_LIST ) );
            console.log(response);
        } catch (e) {
            console.log(e);
        }
    }


}