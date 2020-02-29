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
    document.querySelector('.dnt-page__select--birth').MountDropdown( FILTER_CONFIG );
    document.querySelector('.dnt-page__select--birth-city').MountDropdown( FILTER_CONFIG );
    document.querySelector('.dnt-page__select--province').MountDropdown( FILTER_CONFIG );
    document.querySelector('.dnt-page__select--home-city').MountDropdown( FILTER_CONFIG );
    document.querySelector('.dnt-page__select--edu_province').MountDropdown( FILTER_CONFIG );
    document.querySelector('.dnt-page__select--edu_city').MountDropdown( FILTER_CONFIG );
    document.querySelector('.dnt-page__select_edu-level').MountDropdown( WITHOUT_FILTER_CONFIG );
    document.querySelector('.dnt-page__select--job-province').MountDropdown( FILTER_CONFIG );
    document.querySelector('.dnt-page__select--job-city').MountDropdown( FILTER_CONFIG );
} catch (e) {}

try {
    let currentStep = 1;

    const INPUT_ERROR_CLASSNAME = 'has-error';
    const INPUT_ERROR_MESSAGE_CLASSNAME = 'error-message';
    const SPINNER_LOADING_CLASSNAME = 'spinner-loading';

    const FORM_MESSAGE = document.querySelector('.form__msg');
    const SECOND_STEP = document.querySelector('.dnt-page__from_step-two');
    const SUBMIT_BUTTON = document.querySelector('.dnt-page__btn--submit');
    const DISCARD_BUTTON = document.querySelector('.dnt-page__btn--cancel');

    const GET_ELEMENT = classname => document.querySelector(`.dnt-page__from .${classname}`);
    const HANDEL_ERROR_MESSAGE = ( element, text = '' ) => {
        ( !!text ) ? (
            element.classList.add( INPUT_ERROR_CLASSNAME )
        ) : (
            element.classList.remove( INPUT_ERROR_CLASSNAME )
        );
        let el = element.querySelector(`.${INPUT_ERROR_MESSAGE_CLASSNAME}`);
        if ( !!el ) el.innerHTML = text;
    };

    const STEP_FIRST_ELEMENT = {
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
                    this.isValid = OnlyPersianAlphabet( this.val );
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
            el: GET_ELEMENT('dnt-page__full-name'),
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
        }
    };
    // ->.
    const STEP_SECOND_ELEMENT = {
        birth_certificate: {
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
        parent_name: {
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
        date_birth: {
            isValid: false,
            el: GET_ELEMENT('dnt-page__date_birth'),
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
        home_province: {
            isValid: false,
            el: GET_ELEMENT('dnt-page__home-province'),
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
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'محل سکونت' ) );
                }
            }
        },
        home_city: {
            isValid: false,
            el: GET_ELEMENT('dnt-page__home-city'),
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
                    HANDEL_ERROR_MESSAGE( this.el, RequiredErrorMessage( 'محل سکونت' ) );
                }
            }
        },
        tel: {
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
        edu_level: {
            isValid: false,
            el: GET_ELEMENT('dnt-page__edu-level'),
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
            el: GET_ELEMENT('dnt-page__rpt-password'),
            get input() {
                return this.el.querySelector('.input')
            },
            get val() {
                return this.input.value;
            },
            validate() {
                if ( !!this.val ) {
                    this.isValid = ( this.val === GET_ELEMENT('dnt-page__password input').value );
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
    };

    const ONBLUR_INPUT_FIELD = ( { target } ) => {
        let fieldName = target.getAttribute('name'),
            property = (currentStep === 1 ? STEP_FIRST_ELEMENT : STEP_SECOND_ELEMENT)[fieldName];
        property.validate();
        target.removeEventListener('blur', ONBLUR_INPUT_FIELD);
    };

    for ( let field in STEP_FIRST_ELEMENT ) {
        let fieldProperty = STEP_FIRST_ELEMENT[field];
        fieldProperty['input'].addEventListener(
            'focus',
            ( { target } ) => {
                target.addEventListener('blur', ONBLUR_INPUT_FIELD);
                target.parentElement.classList.remove( INPUT_ERROR_CLASSNAME );
            }
        )
    }

    const SET_FOCUS_EVENT_SECOND_STEP = () => {
        for ( let field in STEP_SECOND_ELEMENT ) {
            let fieldProperty = STEP_SECOND_ELEMENT[field],
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

    const GO_TO_FIRST_STEP = () => {
        currentStep = 1;
        SECOND_STEP.style.height = '0px';
        SECOND_STEP.querySelectorAll('input')
            .forEach(item => {
                item.disabled = true;
            });
        DISCARD_BUTTON.classList.add('none');
        Object.values( STEP_FIRST_ELEMENT ).forEach(field => field.input.readOnly = false);
    };

    const OPEN_SECOND_STEP = () => {
        SET_FOCUS_EVENT_SECOND_STEP();
        SECOND_STEP.style.height = ( SECOND_STEP.children[0].offsetHeight ) + 'px';
        SECOND_STEP.querySelectorAll('input')
            .forEach(item => {
                item.disabled = false;
            });
        DISCARD_BUTTON.classList.remove('none')
    };
    
    const HANDEL_FIRST_STEP = async () => {
        let fields = Object.values( STEP_FIRST_ELEMENT );
        let isValid = fields.every(field => {
            field.validate();
            if ( !field.isValid ) SmoothScroll( field.el.offsetTop );
            return field.isValid;
        });
        if ( isValid ) {
            SUBMIT_BUTTON.classList.add( SPINNER_LOADING_CLASSNAME );
            try {
                let payload = {
                    'national_code': ( toEnglishDigits( STEP_FIRST_ELEMENT['national_code'].val ) ),
                };
                let response = await HTTPService.postRequest(Endpoint.get( Endpoint.VALIDATE_USER ), payload);
                FORM_MESSAGE.classList.add('none');
                currentStep = 2;
                fields.forEach(field => field.input.readOnly = true);
                OPEN_SECOND_STEP();
            } catch (e) {
                FORM_MESSAGE.classList.remove('none');
                FORM_MESSAGE.textContent = e?.message || 'متاسفانه مشکلی پیش آمده است.';
            } finally {
                SUBMIT_BUTTON.classList.remove( SPINNER_LOADING_CLASSNAME );
            }
        }
    };

    const FETCH_SECOND_STEP = async () => {
        try {
            const DATE_OF_BIRTH = () => {
                let jd = parseInt( document.querySelector('select[name="birth_day"]').value ),
                    jm = parseInt( document.querySelector('select[name="birth_month"]').value ),
                    jy = parseInt( document.querySelector('select[name="birth_year"]').value );
                return (
                    DateService.jalaaliToTimestamp( jy, jm, jd )
                )
            };

            let identity_number = STEP_SECOND_ELEMENT['birth_certificate'].val,
                province_of_birth = document.querySelector('select[name="birth_province"]').value,
                job_title = document.querySelector('input[name="job"]').value,
                city_of_birth = document.querySelector('select[name="birth_city"]').value,
                phone = STEP_SECOND_ELEMENT['tel'].val,
                email = STEP_SECOND_ELEMENT['email'].val,
                current_province_id = document.querySelector('select[name="home_province"]').value,
                current_city_id = document.querySelector('select[name="home_city"]').value,
                education_field = document.querySelector('input[name="edu_field"]').value,
                education_province_id = document.querySelector('select[name="edu_province"]').value,
                education_city_id = document.querySelector('select[name="edu_city"]').value,
                current_address = document.querySelector('input[name="home_address"]').value,
                home_postal_code = STEP_SECOND_ELEMENT['home_postal_code'].val;

            let payload = {
                'national_code': ( toEnglishDigits( STEP_FIRST_ELEMENT['national_code']?.val ) ),
                'gender': ( parseInt(toEnglishDigits( document.querySelector('input[name="gender"]:checked').value )) ),
                'name': ( STEP_FIRST_ELEMENT['name'].val ),
                'last_name': ( STEP_FIRST_ELEMENT['full_name'].val ),
                'father_name': ( STEP_SECOND_ELEMENT['parent_name'].val ),
                'date_of_birth': ( DATE_OF_BIRTH() ),
                'last_education_degree': ( parseInt(toEnglishDigits( STEP_SECOND_ELEMENT['edu_level'].val )) ),
                'mobile': ( toEnglishDigits(STEP_SECOND_ELEMENT['phone'].val) ),
                'password': ( toEnglishDigits(STEP_SECOND_ELEMENT['password'].val) ),
                'password_confirmation': ( toEnglishDigits(STEP_SECOND_ELEMENT['repeat_password'].val) ),
            };

            if ( !!identity_number ) {
                payload['identity_number'] = parseInt(toEnglishDigits( identity_number ))
            }

            if ( !!province_of_birth ) {
                payload['identity_number'] = parseInt(toEnglishDigits(province_of_birth))
            }

            if ( !!identity_number ) {
                payload['identity_number'] = parseInt(toEnglishDigits( identity_number ))
            }

            if ( !!city_of_birth ) {
                payload['city_of_birth'] = parseInt(toEnglishDigits(city_of_birth))
            }

            if ( !!job_title ) {
                payload['job_title'] = job_title
            }

            if ( !!phone ) {
                payload['phone'] = toEnglishDigits( phone )
            }

            if ( !!current_province_id ) {
                payload['current_province_id'] = parseInt(toEnglishDigits( current_province_id ))
            }

            if ( !!current_city_id ) {
                payload['current_city_id'] = parseInt(toEnglishDigits( current_city_id ))
            }

            if ( !!email ) {
                payload['email'] = toEnglishDigits( email )
            }

            if ( !!education_field ) {
                payload['education_field'] = education_field
            }

            if ( !!education_province_id ) {
                payload['education_province_id'] = parseInt(toEnglishDigits( education_province_id ))
            }

            if ( !!education_city_id ) {
                payload['education_city_id'] = parseInt(toEnglishDigits( education_city_id ))
            }

            if ( !!current_address ) {
                payload['current_address'] = toEnglishDigits(current_address)
            }

            if ( !!home_postal_code ) {
                payload['home_postal_code'] = parseInt(toEnglishDigits( home_postal_code ))
            }

            SUBMIT_BUTTON.classList.add( SPINNER_LOADING_CLASSNAME );
            let response = await HTTPService.postRequest(Endpoint.get( Endpoint.REGISTER ), payload);
            const TOKEN_SERVICE = new TokenService( response );
            TOKEN_SERVICE._HandelToken();
        } catch (e) {
            FORM_MESSAGE.classList.remove('none');
            FORM_MESSAGE.textContent = e?.message || 'متاسفانه مشکلی پیش آمده است.';
        } finally {
            SUBMIT_BUTTON.classList.remove( SPINNER_LOADING_CLASSNAME );
        }
    };

    const HANDEL_SECOND_STEP = async () => {
        let fields = Object.values( STEP_SECOND_ELEMENT );
        let isValid = fields.every(field => {
            field.validate();
            if ( !field.isValid ) SmoothScroll( field.el.offsetTop );
            return field.isValid;
        });
        if ( isValid ) {
            await FETCH_SECOND_STEP()
        }
    };

    DISCARD_BUTTON.addEventListener(
        'click',
        event => {
            event.preventDefault();
            GO_TO_FIRST_STEP();
        }
    );

    if ( !!SUBMIT_BUTTON ) {
        SUBMIT_BUTTON.addEventListener(
            'click',
            async ( event ) => {
                event.preventDefault();
                ( currentStep === 1 ) ? (
                    await HANDEL_FIRST_STEP()
                ) : (
                    await HANDEL_SECOND_STEP()
                );
            }
        )
    }

} catch (e) {}