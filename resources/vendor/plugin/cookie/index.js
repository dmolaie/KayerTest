import {
    HasLength
} from '@vendor/plugin/helper'

const DEFAULT_OPTION = {
    path: '/',
    expires: 3
};

export default class Cookies {
    static encodeCookies( value ) {
        return (
            encodeURIComponent( value ).replace(
                /%(2[346BF]|3[AC-F]|40|5[BDE]|60|7[BCD])/g,
                decodeURIComponent
            )
        )
    }

    static decodeCookies( value ) {
        return (
            value.replace(/(%[\dA-F]{2})+/gi, decodeURIComponent)
        )
    }

    static set( key, value, option ) {
        if ( typeof document === 'undefined' ) return;

        option = {
            ...DEFAULT_OPTION,
            ...option
        };

        let expires = new Date( Date.now() + ( option.expires * 24 * 60 * 60 * 1000 ) );
        option.expires = expires.toUTCString();

        // key = encodeURIComponent( key )
        //         .replace(/%(2[346B]|5E|60|7C)/g, decodeURIComponent)
        //         .replace(/[()]/g, escape);

        key = this.encodeCookies( key );

        let stringifyAttr = '';

        for ( const [key, val] of Object.entries( option ) ) {
            stringifyAttr += `;${key}=${val}`
        }

        document.cookie = (
            key + '=' + value + stringifyAttr
        )
    }

    static get( key ) {
        if ( typeof document === 'undefined' && !!key ) return;

        const CURRENT_COOKIE = this.decodeCookies( document.cookie ).split(';');

        let getItem = CURRENT_COOKIE.filter( item => item.includes( key ) );

        if ( HasLength( getItem ) ) return getItem[0].split('=')[1];
    }

    static delete(name,  path = DEFAULT_OPTION.path ) {
        try {
            document.cookie = `${name}=; path= ${path}; Expires=Thu, 01 Jan 1970 00:00:01 GMT;`;
        } catch (e) {}
    }

    static clearAll( path = DEFAULT_OPTION.path ) {
        const CURRENT_COOKIE = this.decodeCookies( document.cookie ).split(";");

        for (let i = 0; i < CURRENT_COOKIE.length; i++) {
            let cookie = CURRENT_COOKIE[i],
                eqPos = cookie.indexOf("="),
                name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
            document.cookie = name + `=;path= ${path};;expires=Thu, 01 Jan 1970 00:00:00 GMT`;
        }
    }
}