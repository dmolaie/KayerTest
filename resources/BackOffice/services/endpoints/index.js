import {
    HasLength
} from "@vendor/plugin/helper";

let endpoints = {};

const VER_1_0 = 'v1';

const SIGN_IN = "SIGN_IN";
const REGISTER = "REGISTER";
const VALIDATE_USER = "VALIDATE_USER";

endpoints[SIGN_IN] = '/user/login';
endpoints[REGISTER] = `/user/${VER_1_0}/register`;
endpoints[VALIDATE_USER] = `/user/${VER_1_0}/validate_data_user_client`;

export default class Endpoint {
    static get API_DOMAIN() {
        return API_DOMAIN
    }

    static get SIGN_IN() {
        return endpoints[SIGN_IN]
    }

    static get REGISTER() {
        return endpoints[REGISTER];
    }

    static get VALIDATE_USER() {
        return endpoints[VALIDATE_USER];
    }

    static get( endpoint, params = {} ) {
        if ( !!HasLength( params ) ) {
            endpoint = endpoint.split('/').map( pathname => pathname.includes(':') ? params[pathname.slice(1)] : pathname ).join('/')
        }
        return (
            this.API_DOMAIN + endpoint
        )
    }
}