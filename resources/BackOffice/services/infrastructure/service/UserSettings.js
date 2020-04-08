import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';
import {
    UserService
} from '@services/service/ManageLegate';

export default class UserSettingsService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
    }

    //EDIT_USER_PASSWORD_BY_USER

    async registerDonationCardForUser( user_id, role_id ) {
        try {
            console.log(user_id, role_id);
            // let response = UserService.AddRoleToUser( user_id, role_id );
            // console.log('response: ', response);
        } catch ( exception ) {
            throw exception;
        }
    }
}