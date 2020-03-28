export default class ExceptionService {
    static _GetErrorMessage( exception ) {
        try {
            const ERRORS_ARRAY = exception.errors;
            if ( !ERRORS_ARRAY ) return exception.message;
            return Object.entries( ERRORS_ARRAY )[0][1][0];
        } catch (e) {}
    }
}