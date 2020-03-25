import {
    LoginPresenter,
} from '@services/presenter/Login';
import Cookies from '@vendor/plugin/cookie';
import {
    RedirectRoute
} from '@vendor/plugin/helper'

const TOKEN_COOKIE_KEY = 'JWT-Token';
const USERNAME_COOKIE_KEY = 'a19140228cd';
const ROLE_COOKIE_KEY = 'c9df3cbe73a';

export const ADMIN_ROLE_ID   = 1;
export const MANAGER_ROLE_ID = 2;
export const LEGATE_ROLE_ID  = 3;
export const USER_ROLE_ID    = 4;

export default class TokenService {
    constructor( data ) {
        this.payload = new LoginPresenter( data );
    }

    get _CheckRole() {
        return this.payload?.roleId !== USER_ROLE_ID
    }

    _SetUsername() {
        Cookies.set( USERNAME_COOKIE_KEY, this.payload?.username );
    }

    static get _GetUsername() {
        return Cookies.get( USERNAME_COOKIE_KEY );
    }

    _SetRoleId() {
        Cookies.set( ROLE_COOKIE_KEY, this.payload?.roleId );
    }

    static get _GetRoleId() {
        return Cookies.get( ROLE_COOKIE_KEY );
    }

    _SetToken() {
        Cookies.set( TOKEN_COOKIE_KEY, this.payload?.token );
    }

    static get _GetToken() {
        return Cookies.get( TOKEN_COOKIE_KEY );
    }

    _SetData() {
        this._SetToken();
        this._SetRoleId();
        this._SetUsername();
    }

    static _ClearToken() {
        Cookies.delete( TOKEN_COOKIE_KEY );
        Cookies.delete( ROLE_COOKIE_KEY );
        Cookies.delete( USERNAME_COOKIE_KEY );
    }

    redirectToWebsite() {
        try {
            let domain = window.location.origin;
            RedirectRoute( '/fa/page/client-profile' );
        } catch ( e ) {}
    }

    _HandelToken() {
        this._SetData();

        if ( this._CheckRole ) return true;

        this.redirectToWebsite();
        return false;
    }
}