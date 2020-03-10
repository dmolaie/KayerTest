import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import TokenService from '@services/service/Token';
import BaseService from '@vendor/infrastructure/service/BaseService';

export default class ManageMenuService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
    }

    async getList() {
        try {
            let response = await HTTPService.getRequest( Endpoint.get( Endpoint.GET_MENU_LIST ) );
            console.log(response);
        }
        catch ( { message } ) {
            this.$vm.displayNotification( message, {
                type: 'error',
                duration: 4000
            })
        }
    }


}