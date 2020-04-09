import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import ExceptionService from '@services/service/exception';

export class EventService {
    static async getEventList( querystring = {} ) {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_EVENT_LIST), querystring)
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }
}