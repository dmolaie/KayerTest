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

export const GetNumberInString = string => {
    return (
        parseInt( string.match(/\d+/)[0] )
    )
};