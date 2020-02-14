import {
    HasLength
} from '@vendor/plugin/helper';

import Routes, {
    DASHBOARD
} from "@routes";

const DEFAULT_ERROR_MESSAGE = 'متاسفانه مشکلی پیش آمده است.';
const UNAUTHORIZED_ERROR_MESSAGE = 'ابتدا به حساب کاربری خود وارد شوید.';

export default class HTTPService {

    static headers() {
        return new Headers({
            'Accept': 'application/json',
            'Accept-Type': 'application/json',
            'Access-Control-Allow-Origin': '*',
            'Content-Type': 'application/json',
        });
    }

    static onUnauthorizedUser() {
        Routes.push( { name: DASHBOARD } );
        throw ({
            status: 401,
            message: UNAUTHORIZED_ERROR_MESSAGE
        })
    }

    static onBeforeRequest( requestInit ) {
        // ["Authorization"] = `Bearer ${TokenService.getToken()}`
        requestInit.mode = 'cors';
        requestInit.headers = this.headers();
        return requestInit;
    }

    static async onRequestFailed( exception ) {
        try {

            const EXCEPTION = await exception;

            if ( EXCEPTION?.status_code === 401 || EXCEPTION?.status_code === 403 )
                this.onUnauthorizedUser();
            else throw ({
                status: ( EXCEPTION?.status_code ?? '' ),
                message: ( EXCEPTION?.message ?? DEFAULT_ERROR_MESSAGE )
            });

        } catch ( except ) {
            throw except;
        }
    }

    static Request( requestInfo = '' , requestInit = {} ) {
        return new Promise(
            ( resolve, reject ) => {
                let init = this.onBeforeRequest( requestInit );
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
            route += ( path.includes('?') ? '&' : '?' ) + queryString.join('&')
        )
    }

    static async getRequest( route, payload = {}, query= {} ) {
        if ( HasLength( query ) )
            route = this._QueryString( route, query );

        let init = {
            method: 'GET',
        };

        if ( HasLength( payload ) )
            init.body = JSON.stringify( payload );

        return await this.Request( route, init );
    }

    static async postRequest( route, payload = {}, query= {} ) {
        if ( HasLength( query ) )
            route = this._QueryString( route, query );

        let init = {
            method: 'POST',
        };

        if ( HasLength( payload ) )
            init.body = JSON.stringify( payload );

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