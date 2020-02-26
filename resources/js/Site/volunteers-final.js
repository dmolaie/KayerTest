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
    PostalCodeValidator,
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

    document.querySelector('.vnt-page__select--day').MountDropdown({
        ...CONFIG,
        onSelected( dropdown ) {
            dropdown.classList.remove('unselected');
            dropdown.parentElement.parentElement.classList.remove('has-error');
        }
    });
    document.querySelector('.vnt-page__select--month').MountDropdown({
        ...CONFIG,
        onSelected( dropdown ) {
            dropdown.classList.remove('unselected');
            dropdown.parentElement.parentElement.classList.remove('has-error');
        }
    });
    document.querySelector('.vnt-page__select--year').MountDropdown({
        ...CONFIG,
        onSelected( dropdown ) {
            dropdown.classList.remove('unselected');
            dropdown.parentElement.parentElement.classList.remove('has-error');
        }
    });
    document.querySelector('.vnt-page__select--birth-province').MountDropdown( FILTER_CONFIG );
    document.querySelector('.vnt-page__select--birth-city').MountDropdown( FILTER_CONFIG );
    document.querySelector('.vnt-page__select--edu-level').MountDropdown( WITHOUT_FILTER_CONFIG );
    document.querySelector('.vnt-page__select--edu-province').MountDropdown( FILTER_CONFIG );
    document.querySelector('.vnt-page__select--edu-city').MountDropdown( FILTER_CONFIG );
    document.querySelector('.vnt-page__select--home-province').MountDropdown( FILTER_CONFIG );
    document.querySelector('.vnt-page__select--home-city').MountDropdown( FILTER_CONFIG );
    document.querySelector('.vnt-page__select--job-province').MountDropdown( FILTER_CONFIG );
    document.querySelector('.vnt-page__select--job-city').MountDropdown( FILTER_CONFIG );
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
            get checkbox() {
                return this.el.querySelectorAll('input[name="gender"]')
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
        date_birth: {
            isValid: false,
            el: GET_ELEMENT('field__date_birth'),
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
        birth_province: {
            isValid: false,
            el: GET_ELEMENT('field__birth_province'),
            get input() {
                return this.el.querySelector('select')
            },
            get val() {
                return this.input.value;
            },
            validate() {
                this.isValid = !!this.val;
                ( this.isValid ) ? (
                    HANDEL_ERROR_MESSAGE( this.el )
                ) : (
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'استان محل سکونت' ) )
                );
            }
        },
        birth_city: {
            isValid: false,
            el: GET_ELEMENT('field__birth_city'),
            get input() {
                return this.el.querySelector('select')
            },
            get val() {
                return this.input.value;
            },
            validate() {
                this.isValid = !!this.val;
                ( this.isValid ) ? (
                    HANDEL_ERROR_MESSAGE( this.el )
                ) : (
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'شهر محل سکونت' ) )
                );
            }
        },
        marital: {
            isValid: false,
            el: GET_ELEMENT('field__marital'),
            get val() {
                return !!HasLength( this.el.querySelectorAll('input[name="marital"]:checked') );
            },
            get checkbox() {
                return this.el.querySelectorAll('input[name="marital"]')
            },
            validate() {
                this.isValid = !!this.val;
                HANDEL_ERROR_MESSAGE( this.el,
                    !this.val ? RequiredErrorMessage( 'وضعیت تاهل' ) : ''
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
        edu_province: {
            isValid: false,
            el: GET_ELEMENT('field__edu-province'),
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
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'استان محل تحصیل' ) )
                );
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
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'شهر محل تحصیل' ) )
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
        home_province: {
            isValid: false,
            el: GET_ELEMENT('field__home-province'),
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
        home_postal_code: {
            isValid: false,
            el: GET_ELEMENT('field__home-postal'),
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
        job_postal_code: {
            isValid: false,
            el: GET_ELEMENT('field__job-postal'),
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
                        HANDEL_ERROR_MESSAGE( this.el, InvalidErrorMessage( 'کدپستی محل کار' ) )
                    );
                } else this.isValid = true;
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
                return (
                    !!this.el ? this.el.querySelector('.input') : ''
                );
            },
            get val() {
                return (
                    !!this.input.value ? this.input.value : null
                )
            },
            validate() {
                if ( !!this.input ) {
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
                } else this.isValid = true;
            }
        },
        repeat_password: {
            isValid: false,
            el: GET_ELEMENT('field__rpt-password'),
            get input() {
                return (
                    !!this.el ? this.el.querySelector('.input') : ''
                );
            },
            get val() {
                return (
                    !!this.input.value ? this.input.value : null
                )
            },
            validate() {
                if ( !!this.input ) {
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
                } else this.isValid = true;
            }
        },
        activity: {
            isValid: false,
            el: GET_ELEMENT('field__activity'),
            get val() {
                return !!HasLength( this.el.querySelectorAll('input[name="activity"]:checked') );
            },
            get checkbox() {
                return this.el.querySelectorAll('input[name="activity"]')
            },
            validate() {
                this.isValid = !!this.val;
                HANDEL_ERROR_MESSAGE( this.el,
                    !this.val ? RequiredErrorMessage( 'زمینه همکاری' ) : ''
                );
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

    const HANDEL_FORM_SUBMIT = ( event ) => {
        let fields = Object.values( FIELD_ELEMENT );
        let fieldsIsValid = fields.every(field => {
            field.validate();
            if ( !field.isValid ) SmoothScroll( field.el.offsetTop );
            return field.isValid;
        });
        ( !fieldsIsValid ) ? (
            event.preventDefault()
        ) : (
            FROM_SUBMIT_BUTTON.classList.add( SPINNER_LOADING_CLASSNAME )
        );
        // if ( fieldsIsValid ) {
        //     FROM_SUBMIT_BUTTON.classList.add( SPINNER_LOADING_CLASSNAME );
        //     setTimeout(() => {
        //         FROM_SUBMIT_BUTTON.classList.remove( SPINNER_LOADING_CLASSNAME );
        //     }, 500);
        // } else {
        //     event.preventDefault();
        // }
    };

    if ( !!FROM_SUBMIT_BUTTON ) {
        FROM_SUBMIT_BUTTON.addEventListener(
            'click',
            event => {
                HANDEL_FORM_SUBMIT( event );
            }
        )
    }
} catch (e) {
    console.log(e);
}