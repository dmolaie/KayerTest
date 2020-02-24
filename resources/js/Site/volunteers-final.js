import Dropdown from '@vendor/plugin/dropdown';
import {
    Length,
    HasLength,
    ScrollToEl,
    OnlyNumber,
    EmailValidator,
    OnlyPersianAlphabet,
    NationalCodeValidator,
    PhoneNumberValidator,
} from '@vendor/plugin/helper';
// import {
//     HasLength
// } from "../../vendor/plugin/helper";

try {
    const CONFIG = {
        inputClass: 'input',
        optionClass: 'font-xs text-bayoux text-right',
        dropdownClass: 'w-full unselected',
        onSelected( dropdown ) {
            dropdown.classList.remove('unselected');
            dropdown.parentElement.classList.remove('has-error');
        }
    };

    const WITHOUT_FILTER_CONFIG = {
        ...CONFIG,
        ...{
            inputClass: 'input input--blue border border-solid rounded',
        }
    };

    const FILTER_CONFIG = {
        ...CONFIG,
        ...{
            hasFilterItem: true,
            filterPlaceholder: 'جستجو...',
            filterClass: 'font-xs text-bayoux',
            inputClass: 'input input--blue border border-solid rounded',
        }
    };

    document.querySelector('.vnt-page__select--day').MountDropdown( CONFIG );
    document.querySelector('.vnt-page__select--month').MountDropdown( CONFIG );
    document.querySelector('.vnt-page__select--year').MountDropdown( CONFIG );
    document.querySelector('.vnt-page__select--birth').MountDropdown( FILTER_CONFIG );
    document.querySelector('.vnt-page__select--marital').MountDropdown( WITHOUT_FILTER_CONFIG );
    document.querySelector('.vnt-page__select--edu-level').MountDropdown( WITHOUT_FILTER_CONFIG );
    document.querySelector('.vnt-page__select--edu-city').MountDropdown( FILTER_CONFIG );
    document.querySelector('.vnt-page__select--home-city').MountDropdown( FILTER_CONFIG );
    document.querySelector('.vnt-page__select--work-city').MountDropdown( FILTER_CONFIG );
    document.querySelector('.vnt-page__select--familiarization').MountDropdown( WITHOUT_FILTER_CONFIG );
} catch (e) {}

try {
    const INPUT_ERROR_CLASSNAME = 'has-error';
    const INPUT_ERROR_MESSAGE_CLASSNAME = 'error-message';
    const SPINNER_LOADING_CLASSNAME = 'spinner-loading';

    const FROM_SUBMIT_BUTTON = document.querySelector('.vnt-page__btn');

    const GET_ELEMENT = classname => document.querySelector(`.vnt-page__form .${classname}`);
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
            isValid: true,
            el: GET_ELEMENT('field__name'),
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
            isValid: true,
            el: GET_ELEMENT('field__full-name'),
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
        gender: {
            isValid: false,
            el: GET_ELEMENT('field__gender'),
            get val() {
                return !!HasLength( this.el.querySelectorAll('input[name="gender"]:checked') );
            },
            validate() {
                this.isValid = !!this.val;
                HANDEL_ERROR_MESSAGE( this.el,
                    !this.val ? 'فیلد جنسیت ضروری است.' : ''
                );
            }
        },
        father_name: {
            isValid: false,
            el: GET_ELEMENT('field__father-name'),
            get input() {
                return this.el.querySelector('.input')
            },
            get val() {
                return this.input.value;
            },
            validate() {
                console.log('sad');
                if ( !!this.val ) {
                    if ( OnlyPersianAlphabet( this.val ) ) {
                        this.isValid = true;
                        HANDEL_ERROR_MESSAGE( this.el );
                    } else {
                        this.isValid = false;
                        HANDEL_ERROR_MESSAGE( this.el, `نام پدر را با حروف فارسی وارد نمایید.` );
                    }
                } else {
                    this.isValid = false;
                    HANDEL_ERROR_MESSAGE( this.el, `فیلد نام پدر ضروری است.` );
                }
            }
        },
        birth_certificate: {
            isValid: true,
            el: GET_ELEMENT('field__cert'),
            get input() {
                return this.el.querySelector('.input')
            },
            get val() {
                return this.input.value;
            },
            validate() {
                if ( !!this.val ) {
                    if ( OnlyNumber( this.val ) ) {
                        this.isValid = true;
                        HANDEL_ERROR_MESSAGE( this.el );
                    } else {
                        this.isValid = false;
                        HANDEL_ERROR_MESSAGE( this.el, `فرمت شماره شناسنامه نامعتبر است.` );
                    }
                } else {
                    this.isValid = true;
                    HANDEL_ERROR_MESSAGE( this.el );
                }
            }
        },
        national_code: {
            isValid: true,
            el: GET_ELEMENT('field__national-code'),
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
        home: {
            isValid: false,
            el: GET_ELEMENT('field__marital'),
            get input() {
                return this.el.querySelector('select')
            },
            get val() {
                return this.input.value;
            },
            validate() {
                if ( !!this.val ) {
                    this.isValid = true;
                    HANDEL_ERROR_MESSAGE( this.el );
                } else {
                    this.isValid = false;
                    HANDEL_ERROR_MESSAGE( this.el, `فیلد وضعیت تاهل ضروری است.` );
                }
            }
        },


        password: {
            isValid: false,
            el: GET_ELEMENT('field__password'),
            get input() {
                return this.el.querySelector('.input')
            },
            get val() {
                return this.input.value;
            },
            validate() {
                if ( !!this.val ) {
                    if ( Length( this.val ) >= 8 ) {
                        this.isValid = true;
                        HANDEL_ERROR_MESSAGE( this.el );
                    } else {
                        this.isValid = false;
                        HANDEL_ERROR_MESSAGE( this.el, 'گذرواژه نباید کمتر از 8 کاراکتر باشد.' );
                    }
                } else {
                    this.isValid = false;
                    HANDEL_ERROR_MESSAGE( this.el, `فیلد گذرواژه ضروری است.` );
                }
            }
        },
        repeat_password: {
            isValid: false,
            el: GET_ELEMENT('field__rpt-password'),
            get input() {
                return this.el.querySelector('.input')
            },
            get val() {
                return this.input.value;
            },
            validate() {
                if (!!this.val) {
                    if ( this.val === GET_ELEMENT('field__password input').value ) {
                        this.isValid = true;
                        HANDEL_ERROR_MESSAGE(this.el);
                    } else {
                        this.isValid = false;
                        HANDEL_ERROR_MESSAGE(this.el, 'گذرواژه‌ تطابق ندارد.');
                    }
                } else {
                    this.isValid = false;
                    HANDEL_ERROR_MESSAGE(this.el, `فیلد تکرار گذرواژه ضروری است.`);
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

    for ( let field in FIELD_ELEMENT ) {
        let fieldProperty = FIELD_ELEMENT[field],
            input = fieldProperty['input'];
        if ( !!input ) {
            fieldProperty['input'].addEventListener(
                'focus',
                ( { target } ) => {
                    target.addEventListener('blur', ONBLUR_INPUT_FIELD);
                    target.parentElement.classList.remove( INPUT_ERROR_CLASSNAME );
                }
            )
        }
    }

    const HANDEL_FORM_SUBMIT = () => {
        let fields = Object.values( FIELD_ELEMENT );
        let fieldsIsValid = fields.every(field => {
            if ( !field.isValid ) field.validate();
            if ( !field.isValid ) ScrollToEl( field.el );
            return field.isValid;
        });
        if ( fieldsIsValid ) {
            FROM_SUBMIT_BUTTON.classList.add( SPINNER_LOADING_CLASSNAME );
            setTimeout(() => {
                FROM_SUBMIT_BUTTON.classList.remove( SPINNER_LOADING_CLASSNAME );
            }, 500);
        }
    };

    if ( !!FROM_SUBMIT_BUTTON ) {
        FROM_SUBMIT_BUTTON.addEventListener(
            'click',
            event => {
                event.preventDefault();
                HANDEL_FORM_SUBMIT();
            }
        )
    }
} catch (e) {
    console.log(e);
}