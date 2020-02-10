import {
    HasLength
} from "@vendor/plugin/helper";

let endpoints = {};

const SIGN_IN = "SIGN_IN";

endpoints[SIGN_IN] = '/';

export default class Endpoint {
    static get API_DOMAIN() {
        return ''
    }

    static get SIGN_IN() {
        return endpoints[SIGN_IN]
    }

    static get( endpoint, params = {} ) {
        if ( !!HasLength( params ) ) {
            endpoint = endpoint.split('/').map( pathname => pathname.includes(':') ? params[pathname.slice(1)] : pathname ).join('/')
        }
        return endpoint
    }
}