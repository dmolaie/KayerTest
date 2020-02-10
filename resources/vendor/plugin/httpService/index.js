import {
    HasLength
} from '@vendor/plugin/helper';

export default class HTTPService {

    static QueryString( obj ) {
        let queryString = [];
        for ( const [key, val] of Object.entries( obj ) ) {
            queryString.push( `${key}=${val}` )
        }
        return queryString.join('&')
    }

    static GetHeaders() {
        return new Headers({
            'Access-Control-Allow-Origin': '*',
            'Content-Type': 'application/json; charset=UTF-8'
        });
    }

    static async getRequest( path, query= {} ) {
        if ( HasLength( query ) )
            path += ( path.includes('?') ? '&' : '?' ) + this.QueryString( query );

        return await new Promise(
            ( resolve, reject ) => {
                fetch(path, {
                    method: 'GET',
                    headers: this.GetHeaders(),
                    mode: 'cors'
                })
                    .then( response => response.json() )
                    .then( payload => resolve( payload ) )
                    .catch( except => reject( except ) )
            }
        )
    }

    static async postRequest( path, payload = {}, query= {} ) {
        if ( HasLength( query ) )
            path += ( path.includes('?') ? '&' : '?' ) + this.QueryString( query );

        return await new Promise(
            ( resolve, reject ) => {
                fetch(path, {
                    method: 'POST',
                    headers: this.GetHeaders(),
                    mode: 'cors',
                    body: JSON.stringify( payload )
                })
                    .then( response => response.json() )
                    .then( payload => resolve( payload ) )
                    .catch( except => reject( except ) )
            }
        )
    }

    static async putRequest( path, payload = {}, query= {} ) {
        if ( HasLength( query ) )
            path += ( path.includes('?') ? '&' : '?' ) + this.QueryString( query );

        return await new Promise(
            ( resolve, reject ) => {
                fetch(path, {
                    method: 'PUT',
                    headers: this.GetHeaders(),
                    mode: 'cors',
                    body: JSON.stringify( payload )
                })
                    .then( response => response.json() )
                    .then( payload => resolve( payload ) )
                    .catch( except => reject( except ) )
            }
        )
    }

    static async deleteRequest( path, payload = {}, query= {} ) {
        if ( HasLength( query ) )
            path += ( path.includes('?') ? '&' : '?' ) + this.QueryString( query );

        let init = {
            method: 'DELETE',
            headers: this.GetHeaders(),
            mode: 'cors',
        };

        if ( HasLength( payload ) )
            init.body = JSON.stringify( payload );

        return await new Promise(
            ( resolve, reject ) => {
                fetch(path, init)
                    .then( response => response.json() )
                    .then( payload => resolve( payload ) )
                    .catch( except => reject( except ) )
            }
        )
    }

}