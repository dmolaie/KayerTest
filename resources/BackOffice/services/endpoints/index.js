import {
    HasLength
} from "@vendor/plugin/helper";

let endpoints = {};

const VER_1_0 = 'v1';

const SIGN_IN = "SIGN_IN";
const REGISTER = "REGISTER";
const REGISTER_LEGATE = "REGISTER_LEGATE";
const VALIDATE_USER = "VALIDATE_USER";
const VALIDATE_LEGATE = "VALIDATE_LEGATE";
const GET_USER_INFORMATION = "GET_USER_INFORMATION";
const UPDATE_USER_INFORMATION = "UPDATE_USER_INFORMATION";
const GET_MENU_LIST = "GET_MENU_LIST";

endpoints[SIGN_IN] = '/user/login';
endpoints[REGISTER] = `/user/${VER_1_0}/register`;
endpoints[REGISTER_LEGATE] = `/user/${VER_1_0}/register-legate`;
endpoints[VALIDATE_USER] = `/user/${VER_1_0}/validate_data_user_client`;
endpoints[VALIDATE_LEGATE] = `/user/${VER_1_0}/validate_data_user_legate`;
endpoints[GET_USER_INFORMATION] = `/user/${VER_1_0}/full-info`;
endpoints[UPDATE_USER_INFORMATION] = `/user/${VER_1_0}/update-info`;
endpoints[GET_MENU_LIST] = `/menu/${VER_1_0}/admin/list`;

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

    static get REGISTER_LEGATE() {
        return endpoints[REGISTER_LEGATE];
    }

    static get VALIDATE_LEGATE() {
        return endpoints[VALIDATE_LEGATE];
    }

    static get GET_USER_INFORMATION() {
        return endpoints[GET_USER_INFORMATION];
    }

    static get UPDATE_USER_INFORMATION() {
        return endpoints[UPDATE_USER_INFORMATION];
    }

    static get GET_MENU_LIST() {
        return endpoints[GET_MENU_LIST];
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