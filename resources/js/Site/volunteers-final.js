import Dropdown from '@vendor/plugin/dropdown';
import DateService from '@vendor/plugin/date';
import Endpoint from '@endpoints';
import TokenService from '@services/service/Token';
import HTTPService from './service/HttpService';
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
    RedirectRoute
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
    const FROM_MESSAGE = document.querySelector('.vol-page__res');

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
        last_name: {
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
        identity_number: {
            isValid: false,
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
                    this.isValid = false;
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'شماره شناسنامه' ) );
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
        date_of_birth: {
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
        province_of_birth: {
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
        city_of_birth: {
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
        marital_status: {
            isValid: false,
            el: GET_ELEMENT('field__marital'),
            get val() {
                return !!HasLength( this.el.querySelectorAll('input[name="marital_status"]:checked') );
            },
            get checkbox() {
                return this.el.querySelectorAll('input[name="marital_status"]')
            },
            validate() {
                this.isValid = !!this.val;
                HANDEL_ERROR_MESSAGE( this.el,
                    !this.val ? RequiredErrorMessage( 'وضعیت تاهل' ) : ''
                );
            }
        },
        last_education_degree: {
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
        education_field: {
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
        education_province_id: {
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
        education_city_id: {
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
        mobile: {
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
        essential_mobile: {
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
        current_province_id: {
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
        current_city_id: {
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
        current_address: {
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
        phone: {
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
        job_title: {
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
        address_of_work: {
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
        work_phone: {
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
        work_postal_code: {
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
        know_community_by: {
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
        motivation_for_cooperation: {
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
        day_of_cooperation: {
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
        password_confirmation: {
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
        field_of_activities: {
            isValid: false,
            el: GET_ELEMENT('field__activity'),
            get val() {
                return !!HasLength( this.el.querySelectorAll('input[name="field_of_activities"]:checked') );
            },
            get checkbox() {
                return this.el.querySelectorAll('input[name="field_of_activities"]')
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

    const CREATE_REQUEST_PAYLOAD = () => {
        const DATE_OF_BIRTH = () => {
            let jd = parseInt( document.querySelector('select[name="birth_day"]').value ),
                jm = parseInt( document.querySelector('select[name="birth_month"]').value ),
                jy = parseInt( document.querySelector('select[name="birth_year"]').value );
            return (
                DateService.jalaaliToTimestamp( jy, jm, jd )
            )
        };

        const GENDER_FIELD = document.querySelector('input[name="gender"]:checked')?.value,
              MARITAL_FIELD = FIELD_ELEMENT['marital_status'].el.querySelector('input[name="marital_status"]:checked')?.value,
              PROVINCE_OF_JOB_FIELD = document.querySelector('select[name="province_of_work"]')?.value,
              CITY_OF_JOB_FIELD = document.querySelector('select[name="city_of_work"]')?.value,
              ACTIVITIES_FIELD = FIELD_ELEMENT['field_of_activities'].el.querySelectorAll('input[name="field_of_activities"]:checked');

        let payload = {
            'national_code': ( toEnglishDigits( FIELD_ELEMENT['national_code'].val ) ),
            'gender': ( parseInt( GENDER_FIELD ) ),
            'name': ( FIELD_ELEMENT['name'].val ),
            'last_name': ( FIELD_ELEMENT['last_name'].val ),
            'father_name': ( FIELD_ELEMENT['father_name'].val ),
            'identity_number': ( parseInt( toEnglishDigits( FIELD_ELEMENT['identity_number'].val ) ) ),
            'province_of_birth': ( parseInt( FIELD_ELEMENT['province_of_birth'].val ) ),
            'city_of_birth': ( parseInt( FIELD_ELEMENT['city_of_birth'].val ) ),
            'date_of_birth': ( DATE_OF_BIRTH() ),
            'job_title': ( FIELD_ELEMENT['job_title'].val ),
            'last_education_degree': ( parseInt( FIELD_ELEMENT['last_education_degree'].val ) ),
            'mobile': ( toEnglishDigits( FIELD_ELEMENT['mobile'].val ) ),
            'phone': ( toEnglishDigits( FIELD_ELEMENT['phone'].val ) ),
            'essential_mobile': ( toEnglishDigits( FIELD_ELEMENT['essential_mobile'].val ) ),
            'current_province_id': ( parseInt( FIELD_ELEMENT['current_province_id'].val ) ),
            'current_city_id': ( parseInt( FIELD_ELEMENT['current_city_id'].val ) ),
            'email': ( toEnglishDigits( FIELD_ELEMENT['email'].val ) ),
            'marital_status': ( parseInt( MARITAL_FIELD ) ),
            'education_field': ( FIELD_ELEMENT['education_field'].val ),
            'education_province_id': ( parseInt( FIELD_ELEMENT['education_province_id'].val ) ),
            'education_city_id': ( parseInt( FIELD_ELEMENT['education_city_id'].val ) ),
            'current_address': ( toEnglishDigits( FIELD_ELEMENT['current_address'].val ) ),
            'home_postal_code': ( FIELD_ELEMENT['home_postal_code'].val ? parseInt( toEnglishDigits( FIELD_ELEMENT['home_postal_code'].val ) ) : '' ),
            'province_of_work': ( PROVINCE_OF_JOB_FIELD ? parseInt( PROVINCE_OF_JOB_FIELD ) : '' ),
            'city_of_work': ( CITY_OF_JOB_FIELD ? parseInt( CITY_OF_JOB_FIELD ) : '' ),
            'know_community_by': ( parseInt( toEnglishDigits( FIELD_ELEMENT['know_community_by'].val ) ) ),
            'motivation_for_cooperation': ( FIELD_ELEMENT['motivation_for_cooperation'].val ),
            'day_of_cooperation': ( parseInt( toEnglishDigits( FIELD_ELEMENT['day_of_cooperation'].val ) ) ),
            'password': ( toEnglishDigits( FIELD_ELEMENT['password'].val ) ),
            'password_confirmation': ( toEnglishDigits( FIELD_ELEMENT['password_confirmation'].val ) ),
            'address_of_work': ( FIELD_ELEMENT['address_of_work'].val ),
            'work_phone': ( toEnglishDigits( FIELD_ELEMENT['work_phone'].val ) ),
            'work_postal_code': ( FIELD_ELEMENT['work_postal_code'].val ? parseInt( toEnglishDigits( FIELD_ELEMENT['work_postal_code'].val ) ) : '' ),
            'field_of_activities': ( [...ACTIVITIES_FIELD].map( int => int.value ) ),
        };

        Object.keys( payload )
            .forEach( key => {
                if ( !payload[key] && typeof payload[key] === 'string' )
                    delete payload[key]
            });

        return payload;
    };

    const HANDEL_FORM_SUBMIT = async () => {
        let fields = Object.values( FIELD_ELEMENT );
        let fieldsIsValid = fields.every(field => {
            field.validate();
            if ( !field.isValid ) SmoothScroll( field.el.offsetTop );
            return field.isValid;
        });
        if ( fieldsIsValid ) {
            try {
                FROM_MESSAGE.classList.add('none');
                FROM_SUBMIT_BUTTON.classList.add( SPINNER_LOADING_CLASSNAME );
                let payload = CREATE_REQUEST_PAYLOAD();
                let response = await HTTPService.postRequest(Endpoint.get( Endpoint.REGISTER_LEGATE ), payload);
                const TOKEN_SERVICE = new TokenService( response );
                FROM_MESSAGE.classList.add('text-green');
                FROM_MESSAGE.textContent = response?.message;
                FROM_MESSAGE.classList.remove('none');
                setTimeout(() => {
                    const USER_HAS_ACCESS = TOKEN_SERVICE._HandelToken();
                    if ( USER_HAS_ACCESS ) {
                        RedirectRoute('/user');
                    }
                }, 450)
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
                    FROM_MESSAGE.textContent = ( exception?.message || 'متاسفانه مشکلی پیش‌آمده است.' );
                    FROM_MESSAGE.classList.remove('text-green');
                    FROM_MESSAGE.classList.remove('none');
                }
            }
            finally {
                FROM_SUBMIT_BUTTON.classList.remove( SPINNER_LOADING_CLASSNAME );
            }
        }
    };

    if ( !!FROM_SUBMIT_BUTTON ) {
        FROM_SUBMIT_BUTTON.addEventListener(
            'click',
            async event => {
                event.preventDefault();
                await HANDEL_FORM_SUBMIT( event );
            }
        )
    }
} catch (e) {}