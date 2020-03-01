import Endpoint from '@endpoints';
import HTTPService from './service/HttpService';
import {
    HasLength,
    SmoothScroll,
    RedirectRoute,
    EmailValidator,
    toEnglishDigits,
    OnlyPersianAlphabet,
    NationalCodeValidator,
    PhoneNumberValidator,
    InvalidErrorMessage,
    RequiredErrorMessage,
    PersianInvalidErrorMessage,
} from '@vendor/plugin/helper';

try {
    const INPUT_ERROR_CLASSNAME = 'has-error';
    const INPUT_ERROR_MESSAGE_CLASSNAME = 'error-message';
    const SPINNER_LOADING_CLASSNAME = 'spinner-loading';

    const SUBMIT_BUTTON  = document.querySelector('.dnt-page__btn--submit');
    const FROM_MESSAGE  = document.querySelector('.vol-page__res');
    console.log(FROM_MESSAGE);

    const GET_ELEMENT = classname => document.querySelector(`.vol-page__from .${classname}`);
    const HANDEL_ERROR_MESSAGE = ( element, text = '' ) => {
        ( !!text ) ? (
            element.classList.add( INPUT_ERROR_CLASSNAME )
        ) : (
            element.classList.remove( INPUT_ERROR_CLASSNAME )
        );
        let el = element.querySelector(`.${INPUT_ERROR_MESSAGE_CLASSNAME}`);
        if ( !!el ) el.innerHTML = text;
    };

    const FIELD_ELEMENT = {
        name: {
            isValid: false,
            el: GET_ELEMENT('dnt-page__name'),
            get input() {
                return this.el.querySelector('.input')
            },
            get val() {
                return this.input.value;
            },
            validate() {
                if ( !!this.val ) {
                    this.isValid = OnlyPersianAlphabet(this.val);
                    ( this.isValid ) ? (
                        HANDEL_ERROR_MESSAGE( this.el )
                    ) : (
                        HANDEL_ERROR_MESSAGE( this.el, PersianInvalidErrorMessage( 'نام' ) )
                    );
                } else {
                    this.isValid = false;
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'نام' ) );
                }
            }
        },
        last_name: {
            isValid: false,
            el: GET_ELEMENT('dnt-page__full-name'),
            get input() {
                return this.el.querySelector('.input')
            },
            get val() {
                return this.input.value;
            },
            validate() {
                if ( !!this.val ) {
                    this.isValid = OnlyPersianAlphabet(this.val);
                    ( this.isValid ) ? (
                        HANDEL_ERROR_MESSAGE( this.el )
                    ) : (
                        HANDEL_ERROR_MESSAGE( this.el, PersianInvalidErrorMessage( 'نام خانوادگی' ) )
                    );
                } else {
                    this.isValid = false;
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'نام خانوادگی' ) );
                }
            }
        },
        national_code: {
            isValid: false,
            el: GET_ELEMENT('dnt-page__national-code'),
            get input() {
                return this.el.querySelector('.input')
            },
            get val() {
                return this.input.value;
            },
            validate() {
                if ( !!this.val ) {
                    this.isValid = NationalCodeValidator( this.val );
                    ( this.isValid ) ? (
                        HANDEL_ERROR_MESSAGE( this.el )
                    ) : (
                        HANDEL_ERROR_MESSAGE( this.el, InvalidErrorMessage( 'کد ملی' ) )
                    )
                } else {
                    this.isValid = false;
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'کد ملی' ) );
                }
            }
        },
        mobile: {
            isValid: false,
            el: GET_ELEMENT('dnt-page__phone'),
            get input() {
                return this.el.querySelector('.input')
            },
            get val() {
                return this.input.value;
            },
            validate() {
                if ( !!this.val ) {
                    this.isValid = PhoneNumberValidator( this.val );
                    ( this.isValid ) ? (
                        HANDEL_ERROR_MESSAGE( this.el )
                    ) : (
                        HANDEL_ERROR_MESSAGE( this.el, InvalidErrorMessage( 'تلفن همراه' ) )
                    );
                } else {
                    this.isValid = false;
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'تلفن همراه' ) );
                }
            }
        },
        email: {
            isValid: false,
            el: GET_ELEMENT('dnt-page__email'),
            get input() {
                return this.el.querySelector('.input')
            },
            get val() {
                return this.input.value;
            },
            validate() {
                if ( !!this.val ) {
                    this.isValid = EmailValidator( this.val );
                    ( this.isValid ) ? (
                        HANDEL_ERROR_MESSAGE( this.el )
                    ) : (
                        HANDEL_ERROR_MESSAGE( this.el, InvalidErrorMessage( 'ایمیل' ) )
                    );
                } else {
                    this.isValid = false;
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'ایمیل' ) );
                }
            }
        }
    };

    const ONBLUR_INPUT_FIELD = ( { target } ) => {
        let fieldName = target.getAttribute('name'),
            property = FIELD_ELEMENT[fieldName];
        property.validate();
        target.removeEventListener('blur', ONBLUR_INPUT_FIELD);
    };

    for (let field in FIELD_ELEMENT) {
        let fieldProperty = FIELD_ELEMENT[field];
        fieldProperty['input'].addEventListener(
            'focus',
            ( { target } ) => {
                target.addEventListener('blur', ONBLUR_INPUT_FIELD);
                target.parentElement.classList.remove( INPUT_ERROR_CLASSNAME );
            }
        )
    }

    const CREATE_REQUEST_PAYLOAD = () => {
        return ({
            'national_code': ( toEnglishDigits( FIELD_ELEMENT['national_code'].val ) ),
            'name': ( FIELD_ELEMENT['name'].val ),
            'last_name': ( FIELD_ELEMENT['last_name'].val ),
            'mobile': ( toEnglishDigits( FIELD_ELEMENT['mobile'].val ) ),
            'email': ( toEnglishDigits( FIELD_ELEMENT['email'].val ) ),
        })
    };

    const HANDEL_FORM_ACTION = async () => {
        let fields = Object.values( FIELD_ELEMENT );
        let fieldsIsValid = fields.every(field => {
            field.validate();
            if ( !field.isValid ) SmoothScroll( field.el.offsetTop );
            return field.isValid;
        });
        if ( fieldsIsValid ) {
            try {
                FROM_MESSAGE.classList.add('none');
                SUBMIT_BUTTON.classList.add( SPINNER_LOADING_CLASSNAME );
                let payload = CREATE_REQUEST_PAYLOAD();
                let response = await HTTPService.postRequest(Endpoint.get( Endpoint.VALIDATE_LEGATE ), payload);
                FROM_MESSAGE.classList.add('text-green');
                FROM_MESSAGE.textContent = response?.message;
                FROM_MESSAGE.classList.remove('none');
                setTimeout(() => {
                    RedirectRoute('/')
                }, 350)
            }
            catch ( exception ) {
                let errors = exception?.errors;
                if ( HasLength( errors ) ) {
                    Object.entries( errors )
                        .forEach( ([key, val], index) => {
                            let item = FIELD_ELEMENT[key];
                            if ( !!item ) {
                                HANDEL_ERROR_MESSAGE( item.el, val[0] );
                                if ( index === 0 ) SmoothScroll( item.el.offsetTop );
                            }
                        });
                }
                else {
                    FROM_MESSAGE.textContent = ( exception?.message || 'متاسفانه مشکلی پیش‌آمده است.' );
                    FROM_MESSAGE.classList.remove('text-green');
                    FROM_MESSAGE.classList.remove('none');
                }
            }
            finally {
                SUBMIT_BUTTON.classList.remove( SPINNER_LOADING_CLASSNAME );
            }
        }
    };

    if ( !!SUBMIT_BUTTON ) {
        SUBMIT_BUTTON.addEventListener(
            'click',
            async event => {
                event.preventDefault();
                await HANDEL_FORM_ACTION();
            }
        )
    }
} catch (e) {
}