import {
    HasLength
} from '@vendor/plugin/helper';
import Routes, {
    LOGIN
} from "@routes";
import TokenService from '@services/service/Token';

const DEFAULT_ERROR_MESSAGE = 'متاسفانه مشکلی پیش آمده است.';
const UNAUTHORIZED_ERROR_MESSAGE = 'ابتدا به حساب کاربری خود وارد شوید.';

export default class HTTPService {

    static headers() {
        // return new Headers({
        //     // 'Accept': 'application/json',
        //     // 'Accept-Type': 'application/json',
        //     'Access-Control-Allow-Origin': '*',
        //     // 'Content-Type': 'application/json',
        //     // 'Content-Type': 'application/x-www-form-urlencoded',
        //     // 'Content-Type':'multipart/form-data'
        // });
        return new Headers({
            'Accept': 'application/json',
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Credentials': 'true',
            'Content-Type': 'application/json;charset=utf-8',
        });
    }

    static uploadHeaders() {
        return new Headers({
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Credentials': 'true',
        });
    }


    static onUnauthorizedUser( exception ) {
        if ( Routes?.currentRoute?.name !== 'LOGIN' ) Routes.push( { name: LOGIN } );

        throw ({
            status: ( exception?.status_code ?? 401 ),
            message: ( exception?.message ?? UNAUTHORIZED_ERROR_MESSAGE )
        })
    }

    static onBeforeRequest( requestInit, is_file ) {
        const TOKEN = TokenService._GetToken;

        // let headers = this.headers();
        let headers = ( !is_file ) ? (
            this.headers()
        ) : ( this.uploadHeaders() );

        if ( !!TOKEN ) {
            headers.append('Authorization', `Bearer ${TOKEN}`);
        }

        const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]');

        if ( !!CSRF_TOKEN )
            headers.append('X-CSRF-TOKEN', CSRF_TOKEN.getAttribute('content'));

        requestInit.headers = headers;
        return requestInit;
    }

    static async onRequestFailed( exception ) {
        try {
            const EXCEPTION = await exception;

            if ( EXCEPTION?.status_code === 401 || EXCEPTION?.status_code === 403 )
                this.onUnauthorizedUser( EXCEPTION );
            else throw ({
                status: ( EXCEPTION?.status_code ?? '' ),
                errors: ( EXCEPTION?.errors || null ),
                message: ( EXCEPTION?.message ?? DEFAULT_ERROR_MESSAGE )
            });

        } catch ( except ) {
            throw except;
        }
    }

    static Request( requestInfo = '' , requestInit = {}, is_file = false ) {
        return new Promise(
            ( resolve, reject ) => {
                let init = this.onBeforeRequest( requestInit, is_file );
                fetch( requestInfo, init )
                    .then( response =>
                        ( response.ok ) ? (
                            resolve( response.json() )
                        ) : (
                            reject( response.json() )
                        )
                    )
                    .catch( except => reject( except ) )
            }
        )
        .then( response => response )
        .catch( async exception => await this.onRequestFailed( exception ) )
    }

    static _QueryString( route, obj ) {
        let queryString = [];

        for ( const [key, val] of Object.entries( obj ) ) {
            queryString.push( `${key}=${val}` )
        }

        return (
            route += ( route.includes('?') ? '&' : '?' ) + queryString.join('&')
        )
    }

    static async getRequest( route, query= {} ) {
        if ( HasLength( query ) )
            route = this._QueryString( route, query );

        let init = {
            method: 'GET',
        };

        return await this.Request( route, init );
    }

    static async uploadRequest( route, payload = {}, query= {} ) {
        if ( HasLength( query ) )
            route = this._QueryString( route, query );

        let init = {
            method: 'POST',
        };

        init.body = payload;

        return await this.Request( route, init, true );
    }

    static async postRequest( route, payload = {}, query= {} ) {
        if ( HasLength( query ) )
            route = this._QueryString( route, query );

        let init = {
            method: 'POST',
        };

        init.body = JSON.stringify( payload );
        // console.log(payload);
        // if ( HasLength( payload ) )
        // init.body = payload;

        return await this.Request( route, init );
    }

    static async putRequest( route, payload = {}, query= {} ) {
        if ( HasLength( query ) )
            route = this._QueryString( route, query );

        let init = {
            method: 'PUT',
        };

        if ( HasLength( payload ) )
            init.body = JSON.stringify( payload );

        return await this.Request( route, init );
    }

    static async deleteRequest( route, payload = {}, query= {} ) {
        if ( HasLength( query ) )
            route = this._QueryString( route, query );

        let init = {
            method: 'DELETE',
        };

        if ( HasLength( payload ) )
            init.body = JSON.stringify( payload );

        return await this.Request( route, init );
    }
}