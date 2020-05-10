import {
    HasLength
} from '@vendor/plugin/helper';
import TokenService from '@services/service/Token';

const getXsrfCookies = () => {
    try {
        let nameEQ = 'XSRF-TOKEN' + "=";
        let ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    } catch (e) {
        return null
    }
};

export default class HTTPService {

    static headers() {
        return new Headers({
            'Accept': 'application/json',
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

        // const XSRF_TOKEN = getXsrfCookies();
        // if ( !!XSRF_TOKEN )
        //     headers.append('X-XSRF-TOKEN', XSRF_TOKEN);

        requestInit.mode = 'cors';
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

    /**
     * @param route { String }
     * @param payload { FormData }
     * @param onUploadProgress { Function }
     */
    static async uploadRequest(route, payload, onUploadProgress) {
        try {
            return await new Promise((resolve, reject) => {
                const TOKEN = TokenService._GetToken;
                const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]');

                let request = new XMLHttpRequest();
                request.open('POST', route, true);
                request.setRequestHeader('Accept', 'application/json');
                !!TOKEN && request.setRequestHeader('Authorization', `Bearer ${TOKEN}`);
                !!CSRF_TOKEN && request.setRequestHeader('X-CSRF-TOKEN', CSRF_TOKEN.getAttribute('content'));

                request.onreadystatechange = function handelLoaded() {
                    if (!request || request.readyState !== 4) return;

                    resolve({
                        data: request.response,
                        status: request.status,
                        statusText: request.statusText,
                        request: request
                    });

                    request = null;
                    // request = {
                    //     data: request.response,
                    //     status: request.status,
                    //     statusText: request.statusText,
                    //     request: request
                    // };
                    // // settle(resolve, reject, response);
                    // request = null;
                };

                request.onabort = function handleAbort() {
                    if ( !request ) return;
                    // reject(createError('Request aborted', config, 'ECONNABORTED', request));
                    reject();
                    request = null;
                };

                request.onerror = function handleError( exception ) {
                    reject( exception );
                    request = null;
                    // reject(createError('Network Error', config, null, request));
                };

                if ( onUploadProgress instanceof Function ) {
                    request.upload.addEventListener('progress', onUploadProgress);
                }
            }).catch(exception => {
                console.log('exception: ', exception);
            })
        } catch ( exception ) {}
    }
}