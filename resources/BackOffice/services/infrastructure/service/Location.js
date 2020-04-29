import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import ExceptionService from '@services/service/exception';

export default class LocationService {
    static async getAllProvinces() {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_ALL_PROVINCES));
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }
    static async getUserProvinces() {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_USER_PROVINCES));
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }
    static async getAllCity() {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_ALL_CITY));
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }
    /**
     * @param province_id { String | Number }
     */
    static async getCityByProvinceId( province_id ) {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_CITY_BY_PROVINCES_ID), { province_id });
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }
}