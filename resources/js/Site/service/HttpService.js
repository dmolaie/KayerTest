import {
    HasLength
} from '@vendor/plugin/helper';
import TokenService from '@services/service/Token';

export default class HTTPService {

    static headers() {
        return new Headers({
            'Accept': 'application/json',
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Credentials': 'true',
            'Content-Type': 'application/json;charset=utf-8',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
        });
    }

    static onBeforeRequest( requestInit ) {
        const TOKEN = TokenService._GetToken;
        let headers = this.headers();

        if ( !!TOKEN ) {
            headers.append('Authorization', `Bearer ${TOKEN}`);
        }

        requestInit.headers = headers;
        return requestInit;
    }

    static Request( requestInfo = '' , requestInit = {} ) {
        return new Promise(
            ( resolve, reject ) => {
                let init = this.onBeforeRequest( requestInit );
                fetch( requestInfo, init )
                    .then( response => {
                            ( response.ok ) ? (
                                resolve( response.json() )
                            ) : (
                                reject( response.json() )
                            )
                        }
                    )
                    .catch( except => reject( except ))
            }
        )
        .then( response => response )
        .catch( async exception => {
            throw await exception;
        })
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