import Cookies from '@vendor/plugin/cookie';
import TokenService, {
    USER_ROLE_ID,
    ADMIN_ROLE_ID
} from '@services/service/Token';
import {
    LoginPresenter,
} from '@services/presenter/Login';

export const SET_USER = "LOGIN_SET_USER";
export const SET_LOGOUT = "SET_LOGOUT";
export const GET_USER_HAS_ACCESS = "GET_USER_HAS_ACCESS";
export const GET_IS_USER_LOGGED_IN = "GET_IS_USER_LOGGED_IN";
export const IS_ADMIN = "IS_ADMIN";
export const GET_USER_ID = "GET_USER_ID";

const GetDefaultState = () => ({
    token: null,
    userId: null,
    roleId: null,
    username: null,
});

const UserStore = {
    state: {
        token: TokenService._GetToken || null,
        userId: TokenService._GetUserId || null,
        roleId: TokenService._GetRoleId || null,
        username: TokenService._GetUsername || null,
    },
    mutations: {
        [SET_USER]( state, payload ) {
            Object.assign( state, new LoginPresenter( payload ) );
        },
        [SET_LOGOUT] ( state ) {
            Object.assign(state, GetDefaultState());
        }
    },
    getters: {
        GET_USER_HAS_ACCESS: state => (
            !!state.token &&
            parseInt( state.roleId ) !== USER_ROLE_ID
        ),
        GET_IS_USER_LOGGED_IN: state => ( !!state.token ),
        [IS_ADMIN]: () => parseInt( TokenService._GetRoleId ) === ADMIN_ROLE_ID,
        [GET_USER_ID]: state => state.userId
    }
};

export default UserStore;