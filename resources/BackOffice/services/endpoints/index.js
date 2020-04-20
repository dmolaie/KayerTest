import {
    HasLength
} from "@vendor/plugin/helper";

let endpoints = {};

const VER_1_0 = 'v1';

const SIGN_IN = "SIGN_IN";
const LOGOUT = "LOGOUT";
const REGISTER = "REGISTER";
const REGISTER_LEGATE = "REGISTER_LEGATE";
const VALIDATE_USER = "VALIDATE_USER";
const VALIDATE_LEGATE = "VALIDATE_LEGATE";
const GET_USER_INFORMATION = "GET_USER_INFORMATION";
const UPDATE_USER_INFORMATION = "UPDATE_USER_INFORMATION";
const GET_USER_LIST = "GET_USER_LIST";
const GET_USER_INFO_ADMIN = "GET_USER_INFO_ADMIN";
const EDIT_USER_PASSWORD = "EDIT_USER_PASSWORD";
const EDIT_USER_PASSWORD_BY_USER = "EDIT_USER_PASSWORD_BY_USER";
const GET_USER_BASIC_PROFILE_INFO = "GET_USER_BASIC_PROFILE_INFO";
const GET_USER_BASIC_REGISTER_INFO = "GET_USER_BASIC_REGISTER_INFO";
const GET_USER_ROLES = "GET_USER_ROLES";
const GET_ALL_USER = "GET_ALL_USER";
const GET_PERMISSION_USER = "GET_PERMISSION_USER";
const GET_USERS_REPORT = "GET_USERS_REPORT";
const GET_ALL_USERS_REPORT = "GET_ALL_USERS_REPORT";
const ASSIGN_PERMISSION_USER = "ASSIGN_PERMISSION_USER";
const EDIT_USER_BY_ADMIN = "EDIT_USER_BY_ADMIN";
const ADD_ROLE_TO_USER = "ADD_ROLE_TO_USER";
const CHANGE_USER_ROLE_STATUS = "CHANGE_USER_ROLE_STATUS";
const REGISTER_USER_BY_ADMIN = "REGISTER_USER_BY_ADMIN";
const GET_MENU_LIST = "GET_MENU_LIST";
const GET_MENU_TYPE = "GET_MENU_TYPE";
const CREATE_MENU_LIST = "CREATE_MENU_LIST";
const EDIT_MENU_ITEM = "EDIT_MENU_ITEM";
const REMOVE_MENU_ITEM = "REMOVE_MENU_ITEM";
const SAVE_MENU_LIST = "SAVE_MENU_LIST";
const GET_ARTICLE_LIST = "GET_ARTICLE_LIST";
const GET_ARTICLE_ITEM = "GET_ARTICLE_ITEM";
const CREATE_ARTICLE_LIST = "CREATE_ARTICLE_LIST";
const EDIT_ARTICLE_ITEM = "EDIT_ARTICLE_ITEM";
const EDIT_STATUS_ARTICLE_ITEM = "EDIT_STATUS_ARTICLE_ITEM";
const DELETE_ARTICLE_LIST = "DELETE_ARTICLE_LIST";
const GET_CATEGORY_LIST = "GET_CATEGORY_LIST";
const CREATE_CATEGORY_ITEM = "CREATE_CATEGORY_ITEM";
const GET_NEWS_LIST = "GET_NEWS_LIST";
const GET_NEWS_ITEM = "GET_NEWS_ITEM";
const CREATE_NEWS_ITEM = "CREATE_NEWS_ITEM";
const EDIT_NEWS_ITEM = "EDIT_NEWS_ITEM";
const EDIT_STATUS_NEWS_ITEM = "EDIT_STATUS_NEWS_ITEM";
const DELETE_NEWS_ITEM = "DELETE_NEWS_ITEM";
const GET_EVENT_LIST = "GET_EVENT_LIST";
const GET_EVENT_ITEM = "GET_EVENT_ITEM";
const CREATE_EVENT_LIST = "CREATE_EVENT_LIST";
const EDIT_EVENT_ITEM = "EDIT_EVENT_ITEM";
const EDIT_STATUS_EVENT_ITEM = "EDIT_STATUS_EVENT_ITEM";
const DELETE_EVENT_ITEM = "DELETE_EVENT_ITEM";
const GET_ALL_PROVINCES = "GET_ALL_PROVINCES";
const GET_ALL_CITY = "GET_ALL_CITY";
const GET_CITY_BY_PROVINCES_ID = "GET_CITY_BY_PROVINCES_ID";
const UPLOAD_IMAGES_ITEM = "UPLOAD_IMAGES_ITEM";
const DELETE_IMAGES_ITEM = "DELETE_IMAGES_ITEM";

endpoints[SIGN_IN] = '/user/login';
endpoints[LOGOUT] = '/user/logout';
endpoints[REGISTER] = `/user/${VER_1_0}/register`;
endpoints[REGISTER_LEGATE] = `/user/${VER_1_0}/register-legate`;
endpoints[VALIDATE_USER] = `/user/${VER_1_0}/validate_data_user_client`;
endpoints[VALIDATE_LEGATE] = `/user/${VER_1_0}/validate_data_user_legate`;
endpoints[GET_USER_INFORMATION] = `/user/${VER_1_0}/full-info`;
endpoints[UPDATE_USER_INFORMATION] = `/user/${VER_1_0}/update-info`;
endpoints[GET_USER_LIST] = `/user/${VER_1_0}/admin/user-search`;
endpoints[GET_USER_INFO_ADMIN] = `/user/${VER_1_0}/admin/user-info-for-admin`;
endpoints[EDIT_USER_PASSWORD] = `/user/${VER_1_0}/admin/change-password-by-admin`;
endpoints[EDIT_USER_PASSWORD_BY_USER] = `/user/${VER_1_0}/admin/change-admin-password`;
endpoints[GET_USER_BASIC_PROFILE_INFO] = `/user/${VER_1_0}/admin/user-base-profile-info`;
endpoints[GET_USER_BASIC_REGISTER_INFO] = `/user/${VER_1_0}/user-basic-register-info`;
endpoints[GET_USER_ROLES] = `/user/${VER_1_0}/admin/user-roles/:user_id`;
// endpoints[GET_USER_ROLES] = `/role/${VER_1_0}/admin/legate-roles/:user_id`;
endpoints[GET_ALL_USER] = `/role/${VER_1_0}/admin/all-roles`;
endpoints[GET_PERMISSION_USER] = `/role/${VER_1_0}/admin/get-permission-user`;
endpoints[GET_USERS_REPORT] = `/user/${VER_1_0}/admin/user-report`;
endpoints[GET_ALL_USERS_REPORT] = `/user/${VER_1_0}/admin/all-user-report`;
endpoints[ASSIGN_PERMISSION_USER] = `/role/${VER_1_0}/admin/assign-permission-user`;
endpoints[EDIT_USER_BY_ADMIN] = `/user/${VER_1_0}/admin/edit-user-by-admin`;
endpoints[ADD_ROLE_TO_USER] = `/user/${VER_1_0}/admin/add-role-to-user`;
endpoints[CHANGE_USER_ROLE_STATUS] = `/user/${VER_1_0}/admin/change-user-role-status`;
endpoints[REGISTER_USER_BY_ADMIN] = `/user/${VER_1_0}/admin/register-user-by-admin`;

endpoints[GET_MENU_LIST] = `/menu/${VER_1_0}/admin/list`;
endpoints[GET_MENU_TYPE] = `/menu/${VER_1_0}/admin/types`;
endpoints[CREATE_MENU_LIST] = `/menu/${VER_1_0}/admin/create`;
endpoints[EDIT_MENU_ITEM] = `/menu/${VER_1_0}/admin/edit`;
endpoints[REMOVE_MENU_ITEM] = `/menu/${VER_1_0}/admin/delete`;
endpoints[SAVE_MENU_LIST] = `/menu/${VER_1_0}/admin/save-priority`;

endpoints[GET_ARTICLE_LIST] = `/article/${VER_1_0}/admin/list`;
endpoints[GET_ARTICLE_ITEM] = `/article/${VER_1_0}/admin/detail/:id`;
endpoints[CREATE_ARTICLE_LIST] = `/article/${VER_1_0}/admin/create`;
endpoints[EDIT_ARTICLE_ITEM] = `/article/${VER_1_0}/admin/edit`;
endpoints[EDIT_STATUS_ARTICLE_ITEM] = `/article/${VER_1_0}/admin/change-status`;
endpoints[DELETE_ARTICLE_LIST] = `/article/${VER_1_0}/admin/delete/:id`;

endpoints[GET_CATEGORY_LIST] = `/category/${VER_1_0}/admin/get_category_by_type`;
endpoints[CREATE_CATEGORY_ITEM] = `/category/${VER_1_0}/admin/create`;

endpoints[GET_NEWS_LIST] = `/news/${VER_1_0}/admin/list`;
endpoints[GET_NEWS_ITEM] = `/news/${VER_1_0}/admin/detail/:id`;
endpoints[CREATE_NEWS_ITEM] = `/news/${VER_1_0}/admin/create`;
endpoints[EDIT_NEWS_ITEM] = `/news/${VER_1_0}/admin/edit`;
endpoints[EDIT_STATUS_NEWS_ITEM] = `/news/${VER_1_0}/admin/change-status`;
endpoints[DELETE_NEWS_ITEM] = `/news/${VER_1_0}/admin/delete/:id`;

endpoints[GET_EVENT_LIST] = `/event/${VER_1_0}/admin/list`;
endpoints[GET_EVENT_ITEM] = `/event/${VER_1_0}/admin/detail/:id`;
endpoints[CREATE_EVENT_LIST] = `/event/${VER_1_0}/admin/create`;
endpoints[EDIT_EVENT_ITEM] = `/event/${VER_1_0}/admin/edit`;
endpoints[EDIT_STATUS_EVENT_ITEM] = `/event/${VER_1_0}/admin/change-status`;
endpoints[DELETE_EVENT_ITEM] = `/event/${VER_1_0}/admin/delete`;

endpoints[GET_ALL_PROVINCES] = `/location/${VER_1_0}/all-provinces`;
endpoints[GET_ALL_CITY] = `/location/${VER_1_0}/all-cities`;
endpoints[GET_CITY_BY_PROVINCES_ID] = `/location/${VER_1_0}/get-cities-by-province-id`;
endpoints[UPLOAD_IMAGES_ITEM] = `/attachment/attach_image`;
endpoints[DELETE_IMAGES_ITEM] = `/attachment/destroy_image`;

export default class Endpoint {
    static get API_DOMAIN() {
        return API_DOMAIN
    }

    static get SIGN_IN() {
        return endpoints[SIGN_IN]
    }

    static get LOGOUT() {
        return endpoints[LOGOUT];
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

    static get GET_USER_LIST() {
        return endpoints[GET_USER_LIST]
    }

    static get GET_USER_INFO_ADMIN() {
        return endpoints[GET_USER_INFO_ADMIN]
    }

    static get EDIT_USER_PASSWORD() {
        return endpoints[EDIT_USER_PASSWORD]
    }

    static get EDIT_USER_PASSWORD_BY_USER() {
        return endpoints[EDIT_USER_PASSWORD_BY_USER]
    }

    static get GET_USER_BASIC_PROFILE_INFO() {
        return endpoints[GET_USER_BASIC_PROFILE_INFO]
    }

    static get GET_USER_BASIC_REGISTER_INFO() {
        return endpoints[GET_USER_BASIC_REGISTER_INFO]
    }

    static get GET_USER_ROLES() {
        return endpoints[GET_USER_ROLES]
    }

    static get GET_ALL_USER() {
        return endpoints[GET_ALL_USER]
    }

    static get GET_PERMISSION_USER() {
        return endpoints[GET_PERMISSION_USER]
    }

    static get GET_USERS_REPORT() {
        return endpoints[GET_USERS_REPORT]
    }

    static get GET_ALL_USERS_REPORT() {
        return endpoints[GET_ALL_USERS_REPORT]
    }

    static get ASSIGN_PERMISSION_USER() {
        return endpoints[ASSIGN_PERMISSION_USER]
    }

    static get EDIT_USER_BY_ADMIN() {
        return endpoints[EDIT_USER_BY_ADMIN]
    }

    static get ADD_ROLE_TO_USER() {
        return endpoints[ADD_ROLE_TO_USER]
    }

    static get CHANGE_USER_ROLE_STATUS() {
        return endpoints[CHANGE_USER_ROLE_STATUS]
    }

    static get REGISTER_USER_BY_ADMIN() {
        return endpoints[REGISTER_USER_BY_ADMIN]
    }

    static get GET_MENU_LIST() {
        return endpoints[GET_MENU_LIST];
    }

    static get CREATE_MENU_LIST() {
        return endpoints[CREATE_MENU_LIST];
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

    static get GET_ARTICLE_ITEM() {
        return endpoints[GET_ARTICLE_ITEM];
    }

    static get DELETE_ARTICLE_LIST() {
        return endpoints[DELETE_ARTICLE_LIST];
    }

    static get CREATE_ARTICLE_LIST() {
        return endpoints[CREATE_ARTICLE_LIST];
    }

    static get EDIT_ARTICLE_ITEM() {
        return endpoints[EDIT_ARTICLE_ITEM];
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

    static get GET_NEWS_ITEM() {
        return endpoints[GET_NEWS_ITEM];
    }

    static get EDIT_NEWS_ITEM() {
        return endpoints[EDIT_NEWS_ITEM]
    }

    static get DELETE_NEWS_ITEM() {
        return endpoints[DELETE_NEWS_ITEM]
    }

    static get GET_EVENT_LIST() {
        return endpoints[GET_EVENT_LIST]
    }

    static get GET_EVENT_ITEM() {
        return endpoints[GET_EVENT_ITEM]
    }

    static get CREATE_EVENT_LIST() {
        return endpoints[CREATE_EVENT_LIST]
    }

    static get EDIT_EVENT_ITEM() {
        return endpoints[EDIT_EVENT_ITEM]
    }

    static get EDIT_STATUS_EVENT_ITEM() {
        return endpoints[EDIT_STATUS_EVENT_ITEM]
    }

    static get DELETE_EVENT_ITEM() {
        return endpoints[DELETE_EVENT_ITEM]
    }

    static get EDIT_STATUS_NEWS_ITEM() {
        return endpoints[EDIT_STATUS_NEWS_ITEM]
    }

    static get CREATE_CATEGORY_ITEM() {
        return endpoints[CREATE_CATEGORY_ITEM]
    }

    static get GET_ALL_PROVINCES() {
        return endpoints[GET_ALL_PROVINCES]
    }

    static get GET_ALL_CITY() {
        return endpoints[GET_ALL_CITY]
    }

    static get GET_CITY_BY_PROVINCES_ID() {
        return endpoints[GET_CITY_BY_PROVINCES_ID]
    }

    static get EDIT_STATUS_ARTICLE_ITEM() {
        return endpoints[EDIT_STATUS_ARTICLE_ITEM]
    }

    static get UPLOAD_IMAGES_ITEM() {
        return endpoints[UPLOAD_IMAGES_ITEM]
    }

    static get DELETE_IMAGES_ITEM() {
        return endpoints[DELETE_IMAGES_ITEM]
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