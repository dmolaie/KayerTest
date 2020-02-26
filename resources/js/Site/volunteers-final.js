import Dropdown from '@vendor/plugin/dropdown';
import {
    Length,
    HasLength,
    SmoothScroll,
    toEnglishDigits,
    InvalidErrorMessage,
    RequiredErrorMessage,
    PersianInvalidErrorMessage,
    OnlyNumber,
    EmailValidator,
    OnlyPersianAlphabet,
    PhoneNumberValidator,
    NationalCodeValidator,
} from '@vendor/plugin/helper';

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
            isValid: false,
            el: GET_ELEMENT('field__name'),
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
        full_name: {
            isValid: false,
            el: GET_ELEMENT('field__full-name'),
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
        gender: {
            isValid: false,
            el: GET_ELEMENT('field__gender'),
            get val() {
                return !!HasLength( this.el.querySelectorAll('input[name="gender"]:checked') );
            },
            validate() {
                this.isValid = !!this.val;
                HANDEL_ERROR_MESSAGE( this.el,
                    !this.val ? RequiredErrorMessage( 'جنسیت' ) : ''
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
        national_code: {
            isValid: false,
            el: GET_ELEMENT('field__national-code'),
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

        marital: {
            isValid: false,
            el: GET_ELEMENT('field__marital'),
            get input() {
                return this.el.querySelector('select')
            },
            get val() {
                return this.input.value;
            },
            validate() {
                this.isValid = !!this.val;
                ( !!this.val ) ? (
                    HANDEL_ERROR_MESSAGE( this.el )
                ) : (
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'وضعیت تاهل' ) )
                );
            }
        },
        edu_level: {
            isValid: false,
            el: GET_ELEMENT('field__edu-level'),
            get input() {
                return this.el.querySelector('select')
            },
            get val() {
                return this.input.value;
            },
            validate() {
                this.isValid = !!this.val;
                ( !!this.val ) ? (
                    HANDEL_ERROR_MESSAGE( this.el )
                ) : (
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'میزان تحصیلات' ) )
                );
            }
        },
        edu_field: {
            isValid: false,
            el: GET_ELEMENT('field__edu-field'),
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
                        HANDEL_ERROR_MESSAGE( this.el, PersianInvalidErrorMessage( 'رشته‌ی تحصیلی' ) )
                    );
                } else {
                    this.isValid = false;
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'رشته‌ی تحصیلی' ) );
                }
            }
        },
        edu_city: {
            isValid: false,
            el: GET_ELEMENT('field__edu-city'),
            get input() {
                return this.el.querySelector('select')
            },
            get val() {
                return this.input.value;
            },
            validate() {
                this.isValid = !!this.val;
                ( !!this.val ) ? (
                    HANDEL_ERROR_MESSAGE( this.el )
                ) : (
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'محل تحصیل' ) )
                );
            }
        },
        email: {
            isValid: false,
            el: GET_ELEMENT('field__email'),
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
        },
        phone: {
            isValid: false,
            el: GET_ELEMENT('field__phone'),
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
        tel_emergency: {
            isValid: false,
            el: GET_ELEMENT('field__tel-emergency'),
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
                        HANDEL_ERROR_MESSAGE( this.el, InvalidErrorMessage( 'تلفن اضطراری' ) )
                    );
                } else {
                    this.isValid = false;
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'تلفن اضطراری' ) );
                }
            }
        },
        home_city: {
            isValid: false,
            el: GET_ELEMENT('field__home-city'),
            get input() {
                return this.el.querySelector('select')
            },
            get val() {
                return this.input.value;
            },
            validate() {
                this.isValid = !!this.val;
                ( !!this.val ) ? (
                    HANDEL_ERROR_MESSAGE( this.el )
                ) : (
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'محل سکونت' ) )
                );
            }
        },
        home_address: {
            isValid: false,
            el: GET_ELEMENT('field__home-address'),
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
                        HANDEL_ERROR_MESSAGE( this.el, PersianInvalidErrorMessage( 'نشانی منزل' ) )
                    );
                } else {
                    this.isValid = false;
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'نشانی منزل' ) );
                }
            }
        },
        home_tel: {
            isValid: true,
            el: GET_ELEMENT('field__home-tel'),
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
                } else {
                    this.isValid = false;
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'تلفن منزل' ) );
                }
            }
        },
        job: {
            isValid: false,
            el: GET_ELEMENT('field__job'),
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
                    this.isValid = false;
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'شغل' ) );
                }
            }
        },
        job_address: {
            isValid: true,
            el: GET_ELEMENT('field__job-address'),
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
                        HANDEL_ERROR_MESSAGE( this.el, PersianInvalidErrorMessage( 'نشانی محل کار' ) )
                    );
                } else {
                    this.isValid = true;
                    HANDEL_ERROR_MESSAGE( this.el );
                }
            }
        },
        job_tel: {
            isValid: true,
            el: GET_ELEMENT('field__job-tel'),
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
                        HANDEL_ERROR_MESSAGE( this.el, InvalidErrorMessage( 'تلفن محل کار' ) )
                    );
                } else {
                    this.isValid = true;
                    HANDEL_ERROR_MESSAGE( this.el );
                }
            }
        },
        familiarization: {
            isValid: false,
            el: GET_ELEMENT('field__familiarization'),
            get input() {
                return this.el.querySelector('select')
            },
            get val() {
                return this.input.value;
            },
            validate() {
                this.isValid = !!this.val;
                ( !!this.val ) ? (
                    HANDEL_ERROR_MESSAGE( this.el )
                ) : (
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'نحوه آشنایی' ) )
                );
            }
        },
        motivation: {
            isValid: false,
            el: GET_ELEMENT('field__motivation'),
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
                        HANDEL_ERROR_MESSAGE( this.el, PersianInvalidErrorMessage( 'انگیزه‌ی همکاری' ) )
                    );
                } else {
                    this.isValid = false;
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'انگیزه‌ی همکاری' ) );
                }
            }
        },
        alloc_time: {
            isValid: false,
            el: GET_ELEMENT('field__alloc-time'),
            get input() {
                return this.el.querySelector('.input')
            },
            get val() {
                return this.input.value;
            },
            validate() {
                if ( !!this.val ) {
                    this.isValid = ( 1 <= toEnglishDigits(this.val) && toEnglishDigits(this.val) <= 30 );
                    ( this.isValid ) ? (
                        HANDEL_ERROR_MESSAGE( this.el )
                    ) : (
                        HANDEL_ERROR_MESSAGE( this.el, `فرصت همکاری باید عددی بین ۱ تا ۳۰ باشد.` )
                    );
                } else {
                    this.isValid = false;
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'فرصت همکاری' ) );
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
                    this.isValid = ( Length( this.val ) >= 8 );
                    ( Length( this.val ) >= 8 ) ? (
                        HANDEL_ERROR_MESSAGE( this.el )
                    ) : (
                        HANDEL_ERROR_MESSAGE( this.el, 'گذرواژه نباید کمتر از 8 کاراکتر باشد.' )
                    );
                } else {
                    this.isValid = false;
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'گذرواژه' ) );
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
                    this.isValid = ( this.val === GET_ELEMENT('field__password input').value );
                    ( this.isValid ) ? (
                        HANDEL_ERROR_MESSAGE(this.el)
                    ) : (
                        HANDEL_ERROR_MESSAGE(this.el, 'گذرواژه‌ تطابق ندارد.')
                    );
                } else {
                    this.isValid = false;
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'تکرار گذرواژه' ) );
                }
            }
        },
        activity: {
            isValid: false,
            el: GET_ELEMENT('field__activity'),
            get val() {
                return !!HasLength( this.el.querySelectorAll('input[name="activity"]:checked') );
            },
            validate() {
                this.isValid = !!this.val;
                HANDEL_ERROR_MESSAGE( this.el,
                    !this.val ? RequiredErrorMessage( 'زمینه همکاری' ) : ''
                );
            }
        }
    };
    //month
    // ---> date birth, onchange gender activity
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
            field.validate();
            if ( !field.isValid ) SmoothScroll( field.el.offsetTop );
            return field.isValid;
        });
        console.log(fieldsIsValid);
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
} catch (e) {}