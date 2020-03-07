import Dropdown from '@vendor/plugin/dropdown';
import DateService from '@vendor/plugin/date';
import Endpoint from '@endpoints';
import TokenService from '@services/service/Token';
import HTTPService from './service/HttpService';
import Notification from './service/Notification';
import ProfileEditPresenter from './presenter/ProfileEdit';

import {
    CopyOf,
    Length,
    HasLength,
    SmoothScroll,
    RedirectRoute,
    toEnglishDigits,
    OnlyNumber,
    EmailValidator,
    OnlyPersianAlphabet,
    PostalCodeValidator,
    PhoneNumberValidator,
    NationalCodeValidator,
    InvalidErrorMessage,
    RequiredErrorMessage,
    PersianInvalidErrorMessage,
} from '@vendor/plugin/helper';

try {
    const INPUT_ERROR_CLASSNAME = 'has-error';
    const INPUT_ERROR_MESSAGE_CLASSNAME = 'error-message';
    const SPINNER_LOADING_CLASSNAME = 'spinner-loading';
    const PRE_LOADING_CLASSNAME = 'p-edit__pre-loading';
    const HIDDEN_LOADING_CLASSNAME = 'p-edit__loading--hidden';

    const BODY_CONTENT = document.querySelector('.p-edit');
    const NOTIFICATION_EL = document.querySelector('.notification');
    const LOADING_SECTION = document.querySelector('.p-edit__loading');
    const SUBMIT_BUTTON = document.querySelector('.p-edit__submit--green');

    const GET_ELEMENT = classname => document.querySelector(`.p-edit__box .${classname}`);
    const HANDEL_ERROR_MESSAGE = ( element, text = '' ) => {
        ( !!text ) ? (
            element.classList.add( INPUT_ERROR_CLASSNAME )
        ) : (
            element.classList.remove( INPUT_ERROR_CLASSNAME )
        );
        let el = element.querySelector(`.${INPUT_ERROR_MESSAGE_CLASSNAME}`);
        if ( !!el ) el.innerHTML = text;
    };
    const CREATE_BIRTH_TIMESTAMP = () => {
        let jd = parseInt( document.querySelector('select[name="birth_day"]').value ),
            jm = parseInt( document.querySelector('select[name="birth_month"]').value ),
            jy = parseInt( document.querySelector('select[name="birth_year"]').value );
        return (
            DateService.jalaaliToTimestamp( jy, jm, jd )
        )
    };
    const ONBLUR_INPUT_FIELD = ( { target } ) => {
        let fieldName = target.getAttribute('name'),
            property = FIELD_ELEMENT[fieldName];
        property.validate();
        target.removeEventListener('blur', ONBLUR_INPUT_FIELD);
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
                    );
                } else {
                    this.isValid = false;
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'کد ملی' ) );
                }
            }
        },
        identity_number: {
            isValid: true,
            el: GET_ELEMENT('dnt-page__certificate'),
            get input() {
                return this.el.querySelector('.input')
            },
            get val() {
                return this.input.value;
            },
            validate() {
                if ( !!this.val ) {
                    this.isValid = OnlyNumber( this.val );
                    ( this.isValid ) ? (
                        HANDEL_ERROR_MESSAGE( this.el )
                    ) : (
                        HANDEL_ERROR_MESSAGE( this.el, InvalidErrorMessage( 'شماره شناسنامه' ) )
                    );
                } else {
                    this.isValid = true;
                    HANDEL_ERROR_MESSAGE( this.el );
                }
            }
        },
        gender: {
            isValid: false,
            el: GET_ELEMENT('dnt-page__gender'),
            get hasVal() {
                return !!HasLength( this.el.querySelectorAll('input[name="gender"]:checked') );
            },
            get val() {
                return this.el.querySelector('input[name="gender"]:checked')?.value
            },
            get checkbox() {
                return this.el.querySelectorAll('input[name="gender"]')
            },
            validate() {
                this.isValid = !!this.hasVal;
                HANDEL_ERROR_MESSAGE( this.el,
                    !this.val ? RequiredErrorMessage( 'جنسیت' ) : ''
                );
            }
        },
        father_name: {
            isValid: false,
            el: GET_ELEMENT('dnt-page__parent-name'),
            get input() {
                return this.el.querySelector('.input')
            },
            get val() {
                return this.input.value;
            },
            validate() {
                if ( !!this.val ) {
                    this.isValid = OnlyPersianAlphabet( this.val );
                    ( this.isValid ) ? (
                        HANDEL_ERROR_MESSAGE( this.el )
                    ) : (
                        HANDEL_ERROR_MESSAGE( this.el, PersianInvalidErrorMessage( 'نام پدر' ) )
                    );
                } else {
                    this.isValid = false;
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'نام پدر' ) );
                }
            }
        },
        date_of_birth: {
            isValid: false,
            el: GET_ELEMENT('dnt-page__date_birth'),
            get select() {
                return this.el.querySelectorAll('select')
            },
            get val() {
                return CREATE_BIRTH_TIMESTAMP();
            },
            set setValue( value ) {
                let {
                    jy, jm, jd
                } = value;
                let dayOption = this.el.querySelector(`select[name="birth_day"] option[value="${jd}"]`);
                let monthOption = this.el.querySelector(`select[name="birth_month"] option[value="${jm}"]`);
                let yearOption = this.el.querySelector(`select[name="birth_year"] option[value="${jy}"]`);
                if ( !!dayOption ) dayOption.selected = true;
                if ( !!monthOption ) monthOption.selected = true;
                if ( !!yearOption ) yearOption.selected = true;
            },
            validate() {
                let day = this.el.querySelector('select[name="birth_day"]').value;
                let month = this.el.querySelector('select[name="birth_month"]').value;
                let year = this.el.querySelector('select[name="birth_year"]').value;
                this.isValid = ( !!day && !!month && !!year );
                ( this.isValid ) ? (
                    HANDEL_ERROR_MESSAGE( this.el )
                ) : (
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'تاریخ تولد' ) )
                );
            }
        },
        province_of_birth: {
            isValid: true,
            el: GET_ELEMENT('field__birth_province'),
            get select() {
                return this.el.querySelector('select')
            },
            get val() {
                return this.select.value;
            },
            set setValue( value ) {
                let option = this.select.querySelector(`option[value="${value}"]`);
                if ( !!option ) option.selected = true;
            },
            validate() {
                this.isValid = true;
            }
        },
        city_of_birth: {
            isValid: true,
            el: GET_ELEMENT('field__birth_city'),
            get select() {
                return this.el.querySelector('select')
            },
            get val() {
                return this.select.value;
            },
            set setValue( value ) {
                let option = this.select.querySelector(`option[value="${value}"]`);
                if ( !!option ) option.selected = true;
            },
            validate() {
                this.isValid = true;
            }
        },
        job_title: {
            isValid: true,
            el: GET_ELEMENT('dnt-page__job_title'),
            get input() {
                return this.el.querySelector('.input')
            },
            get val() {
                return this.input.value;
            },
            validate() {
                if ( !!this.val ) {
                    this.isValid = OnlyPersianAlphabet( this.val );
                    ( this.isValid ) ? (
                        HANDEL_ERROR_MESSAGE( this.el )
                    ) : (
                        HANDEL_ERROR_MESSAGE( this.el, PersianInvalidErrorMessage( 'شغل' ) )
                    );
                } else {
                    this.isValid = true;
                    HANDEL_ERROR_MESSAGE( this.el );
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
            isValid: true,
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
                        HANDEL_ERROR_MESSAGE( this.el, InvalidErrorMessage( 'ایمیل' ) );
                    }
                } else {
                    this.isValid = true;
                    HANDEL_ERROR_MESSAGE( this.el );
                }
            }
        },
        current_province_id: {
            isValid: false,
            el: GET_ELEMENT('dnt-page__home-province'),
            get select() {
                return this.el.querySelector('select')
            },
            get val() {
                return this.select.value;
            },
            set setValue( value ) {
                let option = this.select.querySelector(`option[value="${value}"]`);
                if ( !!option ) option.selected = true;
            },
            validate() {
                if ( !!this.val ) {
                    this.isValid = true;
                    HANDEL_ERROR_MESSAGE( this.el );
                } else {
                    this.isValid = false;
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'محل سکونت' ) );
                }
            }
        },
        current_city_id: {
            isValid: false,
            el: GET_ELEMENT('dnt-page__home-city'),
            get select() {
                return this.el.querySelector('select')
            },
            get val() {
                return this.select.value;
            },
            set setValue( value ) {
                let option = this.select.querySelector(`option[value="${value}"]`);
                if ( !!option ) option.selected = true;
            },
            validate() {
                if ( !!this.val ) {
                    this.isValid = true;
                    HANDEL_ERROR_MESSAGE( this.el );
                } else {
                    this.isValid = false;
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'محل سکونت' ) );
                }
            }
        },
        current_address: {
            isValid: true,
            el: GET_ELEMENT('dnt-page__current_address'),
            get input() {
                return this.el.querySelector('.input')
            },
            get val() {
                return this.input.value;
            },
            validate() {
                if ( !!this.val ) {
                    this.isValid = OnlyPersianAlphabet( this.val );
                    ( this.isValid ) ? (
                        HANDEL_ERROR_MESSAGE( this.el )
                    ) : (
                        HANDEL_ERROR_MESSAGE( this.el, PersianInvalidErrorMessage( 'شغل' ) )
                    );
                } else {
                    this.isValid = true;
                    HANDEL_ERROR_MESSAGE( this.el );
                }
            }
        },
        phone: {
            isValid: true,
            el: GET_ELEMENT('dnt-page__tel'),
            get input() {
                return this.el.querySelector('.input')
            },
            get val() {
                return this.input.value;
            },
            validate() {
                if ( !!this.val ) {
                    this.isValid = ( OnlyNumber( this.val ) && Length(this.val) === 11 );
                    ( this.isValid ) ? (
                        HANDEL_ERROR_MESSAGE( this.el )
                    ) : (
                        HANDEL_ERROR_MESSAGE( this.el, InvalidErrorMessage( 'تلفن منزل' ) )
                    );
                } else this.isValid = true;
            }
        },
        home_postal_code: {
            isValid: true,
            el: GET_ELEMENT('dnt-page__postal_code'),
            get input() {
                return this.el.querySelector('.input')
            },
            get val() {
                return this.input.value;
            },
            validate() {
                if ( !!this.val ) {
                    this.isValid = PostalCodeValidator( this.val );
                    ( this.isValid ) ? (
                        HANDEL_ERROR_MESSAGE( this.el )
                    ) : (
                        HANDEL_ERROR_MESSAGE( this.el, InvalidErrorMessage( 'کدپستی منزل' ) )
                    );
                } else this.isValid = true;
            }
        },
        last_education_degree: {
            isValid: false,
            el: GET_ELEMENT('dnt-page__edu-level'),
            get select() {
                return this.el.querySelector('select')
            },
            get val() {
                return this.select.value;
            },
            set setValue( value ) {
                let option = this.select.querySelector(`option[value="${value}"]`);
                if ( !!option ) option.selected = true;
            },
            validate() {
                this.isValid = !!this.val;
                ( this.isValid ) ? (
                    HANDEL_ERROR_MESSAGE( this.el )
                ) : (
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'میزان تحصیلات' ) )
                );
            }
        },
        education_field: {
            isValid: true,
            el: GET_ELEMENT('dnt-page__education_field'),
            get input() {
                return this.el.querySelector('.input')
            },
            get val() {
                return this.input.value;
            },
            validate() {
                if ( !!this.val ) {
                    this.isValid = OnlyPersianAlphabet( this.val );
                    ( this.isValid ) ? (
                        HANDEL_ERROR_MESSAGE( this.el )
                    ) : (
                        HANDEL_ERROR_MESSAGE( this.el, PersianInvalidErrorMessage( 'رشته تحصیلی' ) )
                    );
                } else {
                    this.isValid = true;
                    HANDEL_ERROR_MESSAGE( this.el );
                }
            }
        },
        education_province_id: {
            isValid: true,
            el: GET_ELEMENT('field__edu_province'),
            get select() {
                return this.el.querySelector('select')
            },
            get val() {
                return this.select.value;
            },
            set setValue( value ) {
                let option = this.select.querySelector(`option[value="${value}"]`);
                if ( !!option ) option.selected = true;
            },
            validate() {
                this.isValid = true;
            }
        },
        education_city_id: {
            isValid: true,
            el: GET_ELEMENT('field__edu_city'),
            get select() {
                return this.el.querySelector('select')
            },
            get val() {
                return this.select.value;
            },
            set setValue( value ) {
                let option = this.select.querySelector(`option[value="${value}"]`);
                if ( !!option ) option.selected = true;
            },
            validate() {
                this.isValid = true;
            }
        },
        password: {
            isValid: false,
            el: GET_ELEMENT('dnt-page__password'),
            get input() {
                return this.el.querySelector('.input')
            },
            get val() {
                return this.input.value;
            },
            validate() {
                let password_confirmation = FIELD_ELEMENT['password_confirmation'];
                if ( !!password_confirmation.val ) {
                    this.isValid = ( Length( this.val ) >= 8 );
                    ( Length( this.val ) >= 8 ) ? (
                        HANDEL_ERROR_MESSAGE( this.el )
                    ) : (
                        HANDEL_ERROR_MESSAGE( this.el, 'گذرواژه نباید کمتر از 8 کاراکتر باشد.' )
                    );
                } else this.isValid = true;
            }
        },
        password_confirmation: {
            isValid: false,
            el: GET_ELEMENT('dnt-page__rpt-password'),
            get input() {
                return this.el.querySelector('.input')
            },
            get val() {
                return this.input.value;
            },
            validate() {
                let password = FIELD_ELEMENT['password'];
                if ( !!password.val ) {
                    this.isValid = ( this.val === password.val );
                    ( this.isValid ) ? (
                        HANDEL_ERROR_MESSAGE(this.el)
                    ) : (
                        HANDEL_ERROR_MESSAGE(this.el, 'گذرواژه‌ تطابق ندارد.')
                    );
                } else this.isValid = true;
            }
        },
    };

    const RENDER_DROPDOWN = () => {
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
            const FILTER_CONFIG = {
                ...CONFIG,
                ...{
                    hasFilterItem: true,
                    filterPlaceholder: 'جستجو...',
                    filterClass: 'font-xs text-bayoux',
                    inputClass: 'input input--blue border border-solid rounded',
                }
            };
            const WITHOUT_FILTER_CONFIG = {
                ...CONFIG,
                ...{
                    inputClass: 'input input--blue border border-solid rounded',
                }
            };

            document.querySelector('.dnt-page__select--day').MountDropdown({
                ...CONFIG,
                onSelected( dropdown ) {
                    dropdown.classList.remove('unselected');
                    dropdown.parentElement.parentElement.classList.remove('has-error');
                }
            });
            document.querySelector('.dnt-page__select--month').MountDropdown({
                ...CONFIG,
                onSelected( dropdown ) {
                    dropdown.classList.remove('unselected');
                    dropdown.parentElement.parentElement.classList.remove('has-error');
                }
            });
            document.querySelector('.dnt-page__select--year').MountDropdown({
                ...CONFIG,
                onSelected( dropdown ) {
                    dropdown.classList.remove('unselected');
                    dropdown.parentElement.parentElement.classList.remove('has-error');
                }
            });
            document.querySelector('select[name="birth_province"]').MountDropdown( FILTER_CONFIG );
            document.querySelector('select[name="birth_city"]').MountDropdown( FILTER_CONFIG );
            document.querySelector('select[name="current_province_id"]').MountDropdown( FILTER_CONFIG );
            document.querySelector('select[name="current_city_id"]').MountDropdown( FILTER_CONFIG );
            document.querySelector('select[name="edu_province"]').MountDropdown( FILTER_CONFIG );
            document.querySelector('select[name="edu_city"]').MountDropdown( FILTER_CONFIG );
            document.querySelector('select[name="last_education_degree"]').MountDropdown( WITHOUT_FILTER_CONFIG );
        }
        catch (e) {}
    };

    const SET_INPUT_EVENT = () => {
        for ( let field in FIELD_ELEMENT ) {
            let fieldProperty = FIELD_ELEMENT[field],
                input = fieldProperty['input'],
                checkboxes = fieldProperty['checkbox'];
            if ( !!input ) {
                fieldProperty['input'].addEventListener(
                    'focus',
                    ( { target } ) => {
                        target.addEventListener('blur', ONBLUR_INPUT_FIELD);
                        target.parentElement.classList.remove( INPUT_ERROR_CLASSNAME );
                    }
                )
            } else if ( !!checkboxes ) {
                fieldProperty['checkbox'].forEach(item => {
                    item.addEventListener('change', ONBLUR_INPUT_FIELD);
                })
            }
        }
    };

    const GET_USER_DETAILS = async () => {
        try {
            let response = await HTTPService.getRequest(Endpoint.get( Endpoint.GET_USER_INFORMATION ));
            response = new ProfileEditPresenter( response );
            Object.entries( response )
                .forEach(([key, value]) => {
                    let field = FIELD_ELEMENT[key];
                    if ( !!field ) {
                        if ( !!field.input ) field.input.value = value;
                        else if ( !!field.checkbox ) {
                            let input = field.el.querySelector(`input[value="${value}"]`);
                            if ( !!input ) input.checked = true;
                        }
                        else if ( !!field.select ) field.setValue = value;
                    }
                });

            RENDER_DROPDOWN();
            SET_INPUT_EVENT();

            BODY_CONTENT.classList.remove( PRE_LOADING_CLASSNAME );
            LOADING_SECTION.classList.add( HIDDEN_LOADING_CLASSNAME );
        } catch ( exception ) {
            NOTIFICATION_EL.Notification({
                text: exception?.message,
                type: 'error',
            });
        }
    };
    
    (async () => {
        await GET_USER_DETAILS();
    })();

    const HANDEL_FORM_ACTION = async () => {
        let fields = Object.values( FIELD_ELEMENT );
        let fieldsIsValid = fields.every(field => {
            field.validate();
            if ( !field.isValid ) SmoothScroll( field.el.offsetTop );
            return field.isValid;
        });
        if ( fieldsIsValid ) {
            try {
                SUBMIT_BUTTON.classList.add( SPINNER_LOADING_CLASSNAME );
                let payload = CopyOf( FIELD_ELEMENT );
                payload = Object.entries( payload )
                    .reduce((accumulator, [key,value]) => {
                        if ( !value.val && typeof value.val === 'string' )
                            return accumulator;
                        return Object.assign(accumulator, {
                            [key]: ( value['select'] ||
                                     value['checkbox'] ||
                                     key === "identity_number" ||
                                     key === "home_postal_code"
                                ) ? (
                                    parseFloat(toEnglishDigits( value.val ))
                                ) : (
                                    toEnglishDigits( value.val )
                                )
                        })
                    }, {});

                let response = await HTTPService.postRequest(Endpoint.get( Endpoint.UPDATE_USER_INFORMATION ), payload);
                NOTIFICATION_EL.Notification({
                    text: response?.message,
                    type: 'success',
                });
            }
            catch ( exception ) {
                let errors = exception?.errors;
                if ( errors ) {
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
                    NOTIFICATION_EL.Notification({
                        text: exception?.message,
                        type: 'error',
                    });
                }
            }
            finally {
                SUBMIT_BUTTON.classList.remove( SPINNER_LOADING_CLASSNAME );
            }
        }
    };

    SUBMIT_BUTTON.addEventListener(
        'click',
        async event => {
            event.preventDefault();
            await HANDEL_FORM_ACTION();
        }
    )

} catch (e) {

}