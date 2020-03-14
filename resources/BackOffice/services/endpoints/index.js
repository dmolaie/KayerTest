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
const GET_MENU_TYPE = "GET_MENU_TYPE";
const REMOVE_MENU_ITEM = "REMOVE_MENU_ITEM";
const SAVE_MENU_LIST = "SAVE_MENU_LIST";
const GET_ARTICLE_LIST = "GET_ARTICLE_LIST";
const CREATE_ARTICLE_LIST = "CREATE_ARTICLE_LIST";
const EDIT_MENU_ITEM = "EDIT_MENU_ITEM";
const GET_CATEGORY_LIST = "GET_CATEGORY_LIST";
const GET_NEWS_LIST = "GET_NEWS_LIST";
const CREATE_NEWS_ITEM = "CREATE_NEWS_ITEM";
const CREATE_CATEGORY_ITEM = "CREATE_CATEGORY_ITEM";
const GET_ALL_PROVINCES = "GET_ALL_PROVINCES";
const LOGOUT = "LOGOUT";


endpoints[SIGN_IN] = '/user/login';
endpoints[REGISTER] = `/user/${VER_1_0}/register`;
endpoints[REGISTER_LEGATE] = `/user/${VER_1_0}/register-legate`;
endpoints[VALIDATE_USER] = `/user/${VER_1_0}/validate_data_user_client`;
endpoints[VALIDATE_LEGATE] = `/user/${VER_1_0}/validate_data_user_legate`;
endpoints[GET_USER_INFORMATION] = `/user/${VER_1_0}/full-info`;
endpoints[UPDATE_USER_INFORMATION] = `/user/${VER_1_0}/update-info`;
endpoints[GET_MENU_LIST] = `/menu/${VER_1_0}/admin/list`;
endpoints[EDIT_MENU_ITEM] = `/menu/${VER_1_0}/admin/edit`;
endpoints[REMOVE_MENU_ITEM] = `/menu/${VER_1_0}/admin/delete`;
endpoints[SAVE_MENU_LIST] = `/menu/${VER_1_0}/admin/save-priority`;
endpoints[GET_MENU_TYPE] = `/menu/${VER_1_0}/admin/types`;
endpoints[CREATE_ARTICLE_LIST] = `/article/${VER_1_0}/admin/create`;
endpoints[GET_ARTICLE_LIST] = `/article/${VER_1_0}/admin/list`;
endpoints[GET_CATEGORY_LIST] = `/category/${VER_1_0}/admin/get_category_by_type`;
endpoints[GET_NEWS_LIST] = `/news/${VER_1_0}/admin/list`;
endpoints[CREATE_NEWS_ITEM] = `/news/${VER_1_0}/admin/create`;
endpoints[CREATE_CATEGORY_ITEM] = `/category/${VER_1_0}/admin/create`;
endpoints[GET_ALL_PROVINCES] = `/location/${VER_1_0}/all-provinces`;
endpoints[LOGOUT] = '/user/logout';

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

    static get EDIT_MENU_ITEM () {
        return endpoints[EDIT_MENU_ITEM];
    }

    static get GET_MENU_TYPE() {
        return endpoints[GET_MENU_TYPE];
    }

    static get GET_ARTICLE_LIST() {
        return endpoints[GET_ARTICLE_LIST];
    }

    static get CREATE_ARTICLE_LIST() {
        return endpoints[CREATE_ARTICLE_LIST];
    }

    static get GET_CATEGORY_LIST() {
        return endpoints[GET_CATEGORY_LIST]
    }

    static get GET_NEWS_LIST() {
        return endpoints[GET_NEWS_LIST]
    }

    static get SAVE_MENU_LIST() {
        return endpoints[SAVE_MENU_LIST]
    }

    static get REMOVE_MENU_ITEM() {
        return endpoints[REMOVE_MENU_ITEM]
    }

    static get CREATE_NEWS_ITEM() {
        return endpoints[CREATE_NEWS_ITEM]
    }

    static get CREATE_CATEGORY_ITEM() {
        return endpoints[CREATE_CATEGORY_ITEM]
    }

    static get GET_ALL_PROVINCES() {
        return endpoints[GET_ALL_PROVINCES]
    }

    static get( endpoint, params = {} ) {
        if ( !!HasLength( params ) ) {
            endpoint = endpoint.split('/').map( pathname => pathname.includes(':') ? params[pathname.slice(1)] : pathname ).join('/')
        }
        return (
            this.API_DOMAIN + endpoint
        )
    }

    static get LOGOUT() {
        return endpoints[LOGOUT];
    }
}