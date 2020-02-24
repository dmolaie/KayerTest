import {
    EmailValidator,
    OnlyPersianAlphabet,
    NationalCodeValidator,
    PhoneNumberValidator,
} from '@vendor/plugin/helper';

try {
    const INPUT_ERROR_CLASSNAME = 'has-error';
    const INPUT_ERROR_MESSAGE_CLASSNAME = 'error-message';
    const SPINNER_LOADING_CLASSNAME = 'spinner-loading';

    const SUBMIT_BUTTON  = document.querySelector('.dnt-page__btn--submit');
    const RESPONSE_MESSAGE  = document.querySelector('.vol-page__res');

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
                    if ( OnlyPersianAlphabet( this.val ) ) {
                        this.isValid = true;
                        HANDEL_ERROR_MESSAGE( this.el );
                    } else {
                        this.isValid = false;
                        HANDEL_ERROR_MESSAGE( this.el, `نام را با حروف فارسی وارد نمایید.` );
                    }
                } else {
                    this.isValid = false;
                    HANDEL_ERROR_MESSAGE( this.el, `فیلد نام ضروری است.` );
                }
            }
        },
        full_name: {
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
                    if ( OnlyPersianAlphabet( this.val ) ) {
                        this.isValid = true;
                        HANDEL_ERROR_MESSAGE( this.el );
                    } else {
                        this.isValid = false;
                        HANDEL_ERROR_MESSAGE( this.el, `نام خانوادگی را با حروف فارسی وارد نمایید.` );
                    }
                } else {
                    this.isValid = false;
                    HANDEL_ERROR_MESSAGE( this.el, `فیلد نام خانوادگی ضروری است.` );
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
                    if ( NationalCodeValidator( this.val ) ) {
                        this.isValid = true;
                        HANDEL_ERROR_MESSAGE( this.el );
                    } else {
                        this.isValid = false;
                        HANDEL_ERROR_MESSAGE( this.el, `فرمت کد ملی نامعتبر است.` );
                    }
                } else {
                    this.isValid = false;
                    HANDEL_ERROR_MESSAGE( this.el, `فیلد کد ملی ضروری است.` );
                }
            }
        },
        phone: {
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
                    if ( PhoneNumberValidator( this.val ) ) {
                        this.isValid = true;
                        HANDEL_ERROR_MESSAGE( this.el );
                    } else {
                        this.isValid = false;
                        HANDEL_ERROR_MESSAGE( this.el, 'فرمت تلفن همراه نامعتبر است.' );
                    }
                } else {
                    this.isValid = false;
                    HANDEL_ERROR_MESSAGE( this.el, `فیلد تلفن همراه ضروری است.` );
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
                    if ( EmailValidator( this.val ) ) {
                        this.isValid = true;
                        HANDEL_ERROR_MESSAGE( this.el );
                    } else {
                        this.isValid = false;
                        HANDEL_ERROR_MESSAGE( this.el, `فرمت ایمیل نامعتبر است.` );
                    }
                } else {
                    this.isValid = false;
                    HANDEL_ERROR_MESSAGE( this.el, `فیلد ایمیل ضروری است.` );
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

    const HANDEL_FORM_ACTION = () => {
        let fields = Object.values( FIELD_ELEMENT );
        let fieldsIsValid = fields.every(field => {
            if ( !field.isValid ) field.validate();
            return field.isValid;
        });
        if ( fieldsIsValid ) {
            SUBMIT_BUTTON.classList.add( SPINNER_LOADING_CLASSNAME );
            setTimeout(() => {
                SUBMIT_BUTTON.classList.remove( SPINNER_LOADING_CLASSNAME );
            }, 500);
        }
    };

    if ( !!SUBMIT_BUTTON ) {
        SUBMIT_BUTTON.addEventListener(
            'click',
            event => {
                event.preventDefault();
                HANDEL_FORM_ACTION();
            }
        )
    }
} catch (e) {}