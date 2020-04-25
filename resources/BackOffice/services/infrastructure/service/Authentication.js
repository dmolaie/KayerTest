import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import ExceptionService from '@services/service/exception';

export default class AuthenticationService {
    static async getAuthenticationList() {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_AUTHENTICATION_LIST));
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }
}