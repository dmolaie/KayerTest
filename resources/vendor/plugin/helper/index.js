export const ChildIndex = child => {
    let index = 0;
    while ( ( child = child.previousElementSibling ) )
        index++;
    return index;
};

export const Flatten = ( array = [] ) => {
    return (
        array.reduce((_, item) =>
                Array.isArray( item ) ? Flatten( item ) : item
            , [])
    )
};

export const Length = payload => {
    if ( Array.isArray( payload ) ) return payload.length;
    if ( typeof payload === "object" ) return Object.keys( payload ).length;
    if ( typeof payload === "number" ) return ( payload + "" ).length;
    return payload.length;
};

export const HasLength = payload => !!Length( payload );

export const GetNumberInString = string => {
    return (
        parseInt( string.match(/\d+/)[0] )
    )
};

export const toEnglishDigits = string => {
    return string.replace(/[۰-۹]/g, chr => {
        let persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        return persian.indexOf(chr);
    });
};

export const NationalCodeValidator = payload => {
    let input = toEnglishDigits( payload );
    if (!/^\d{10}$/.test(input)) return false;
    const check = +input[9];
    const sum =
        Array(9)
            .fill(0)
            .map((_, i) => +input[i] * (10 - i))
            .reduce((x, y) => x + y) % 11;
    return (sum < 2 && check === sum) || (sum >= 2 && check + sum === 11)
};

export const PostalCodeValidator = payload => {
    const REGEX = /\b(?!(\d)\1{3})[13-9]{4}[1346-9][013-9]{5}\b/;
    return REGEX.test( toEnglishDigits( payload ) );
};

export const OnlyPersianAlphabet = string => {
    const REGEX = /^[\u0600-\u06FF\u0698\u067E\u0686\u06AF\u0020]+$/;
    return REGEX.test( string );
};

export const PhoneNumberValidator = tel => {
    const REGEX = /^09([0-9]{2})-?[0-9]{3}-?[0-9]{4}/;
    return REGEX.test( toEnglishDigits( tel ) ) && (
        tel.length === 11
    );
};

export const EmailValidator = email => {
    const REGEX = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return REGEX.test( email )
};

export const OnlyNumber = string => {
    const REGEX = /^[0-9]+$/;
    return REGEX.test( toEnglishDigits( string ) )
};

export const RedirectRoute = route => {
    try {
        window.location.replace( route );
    } catch (e) {}
};

export const Debounce = ( callback, delay ) => {
    let timer = null;
    return function () {
        clearTimeout( timer );
        timer = setTimeout(() => callback.call( null, ...arguments ), delay)
    }
};

export const RequestAnimation = (
    window.requestAnimationFrame ||
    window.webkitRequestAnimationFrame ||
    window.mozRequestAnimationFrame
);

export const SmoothScroll = offsetTop => {
    try {
        let currentScroll = document.documentElement.scrollTop || document.body.scrollTop;
        if (currentScroll > offsetTop) {
            window.scrollTo (0,currentScroll - ( currentScroll / 12 ));
            ( !!RequestAnimation ) ? (
                RequestAnimation(() => {
                    SmoothScroll( offsetTop )
                })
            ) : (
                setTimeout(() => {
                    SmoothScroll( offsetTop )
                }, 100 )
            )
        } else {
            window.scrollTo (0,  ( offsetTop - 40 ) );
        }
    } catch (e) {}
};

export const CopyOf = payload => (
    JSON.parse(JSON.stringify( payload ))
);

export const RequiredErrorMessage = field => `فیلد ${field} ضروری است.`;
export const InvalidErrorMessage  = field => `فرمت ${field} نامعتبر است.`;
export const PersianInvalidErrorMessage  = field => `${field} را با حروف فارسی وارد نمایید.`;