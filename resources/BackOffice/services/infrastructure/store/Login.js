import Cookies from '@vendor/plugin/cookie';
import TokenService, {
    USER_ROLE_ID,
    ADMIN_ROLE_ID
} from '@services/service/Token';
import {
    LoginPresenter,
    UserInformationPresenter
} from '@services/presenter/Login';

export const SET_USER = "LOGIN_SET_USER";
export const SET_LOGOUT = "SET_LOGOUT";
export const GET_USER_HAS_ACCESS = "GET_USER_HAS_ACCESS";
export const GET_IS_USER_LOGGED_IN = "GET_IS_USER_LOGGED_IN";
export const IS_ADMIN = "IS_ADMIN";
export const GET_USER_ID = "GET_USER_ID";
export const UPDATE_USER = 'UPDATE_USER';
export const HAS_USER_INFORMATION = "HAS_USER_INFORMATION";

const GetDefaultState = () => ({
    id: null,
    token: null,
    userId: null,
    roleId: null,
    username: null,
});

const UserStore = {
    state: {
        id: '',
        roleId: '',
        username: '',
        token: TokenService._GetToken || null,
    },
    mutations: {
        [SET_USER]( state, payload ) {
            Object.assign( state, new LoginPresenter( payload ) );
        },
        [SET_LOGOUT] ( state ) {
            Object.assign(state, GetDefaultState());
        },
        [UPDATE_USER](state, { data }) {
            Object.assign(state, {
                ...new UserInformationPresenter( data ),
                token: TokenService._GetToken,
            });
        }
    },
    getters: {
        [GET_USER_HAS_ACCESS]: state => (
            !!state.token &&
            parseInt( state.roleId ) !== USER_ROLE_ID
        ),
        [GET_IS_USER_LOGGED_IN]: state => ( !!state.token ),
        [HAS_USER_INFORMATION]: state => state.id,
        [IS_ADMIN]: () => parseInt( TokenService._GetRoleId ) === ADMIN_ROLE_ID,
        [GET_USER_ID]: state => state.id
    }
};

export default UserStore;