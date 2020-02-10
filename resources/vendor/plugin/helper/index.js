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