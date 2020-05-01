import Dropdown, {
    CREATE_OPTION_ELEMENT
} from '@vendor/plugin/dropdown';
import DateService from '@vendor/plugin/date';
import Endpoint from '@endpoints';
import TokenService from '@services/service/Token';
import HTTPService from './service/HttpService';
import LocationPresenter from './presenter/Location';
import {
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
    document.querySelector('.dnt-page__select_edu-level').MountDropdown( WITHOUT_FILTER_CONFIG );

    const DISABLED_SELECT_CLASSNAME = 'disabledSelect';
    const CITY_OF_BIRTH = document.querySelector('.dnt-page__select--birth-city');
    const CURRENT_CITY = document.querySelector('.dnt-page__select--home-city');
    const CITY_OF_EDUCATION = document.querySelector('.dnt-page__select--edu_city');
    const CREATE_OPTION_TAG = (select, payload) => {
        const DATA = [{id: '', name: 'انتخاب کنید...'}, ...payload];
        select.value = '';
        select.innerHTML = DATA.map(item => `<option value="${item.id}">${item.name}</option>`);
        const DROPDOWN_INPUT = select.parentElement.querySelector('.dropdown__input');
        const DROPDOWN_BODY = select.parentElement.querySelector('.dropdown__options');
        DROPDOWN_INPUT.textContent = 'انتخاب کنید...';
        DROPDOWN_BODY.innerHTML = CREATE_OPTION_ELEMENT(select.querySelectorAll('option'), 'font-xs text-bayoux text-right');
        select.parentElement.classList.remove( DISABLED_SELECT_CLASSNAME );
    };
    document.querySelector('.dnt-page__select--birth').MountDropdown({
        hasFilterItem: true,
        filterPlaceholder: 'جستجو...',
        dropdownClass: 'w-full unselected',
        filterClass: 'font-xs text-bayoux',
        optionClass: 'font-xs text-bayoux text-right',
        inputClass: 'input input--blue border border-solid rounded',
        async onSelected(dropdown, { value: province_id }) {
            dropdown.classList.remove('unselected');
            dropdown.parentElement.classList.remove('has-error');
            let response = await HTTPService.getRequest(Endpoint.get(Endpoint.GET_CITY_BY_PROVINCES_ID), { province_id });
            response = new LocationPresenter( response.data );
            CREATE_OPTION_TAG(CITY_OF_BIRTH, response);
        }
    });
    CITY_OF_BIRTH.MountDropdown( FILTER_CONFIG );
    document.querySelector('.dnt-page__select--province').MountDropdown({
        hasFilterItem: true,
        filterPlaceholder: 'جستجو...',
        dropdownClass: 'w-full unselected',
        filterClass: 'font-xs text-bayoux',
        optionClass: 'font-xs text-bayoux text-right',
        inputClass: 'input input--blue border border-solid rounded',
        async onSelected(dropdown, { value: province_id }) {
            dropdown.classList.remove('unselected');
            dropdown.parentElement.classList.remove('has-error');
            let response = await HTTPService.getRequest(Endpoint.get(Endpoint.GET_CITY_BY_PROVINCES_ID), { province_id });
            response = new LocationPresenter( response.data );
            CREATE_OPTION_TAG(CURRENT_CITY, response);
        }
    });
    CURRENT_CITY.MountDropdown( FILTER_CONFIG );
    document.querySelector('.dnt-page__select--edu_province').MountDropdown({
        hasFilterItem: true,
        filterPlaceholder: 'جستجو...',
        dropdownClass: 'w-full unselected',
        filterClass: 'font-xs text-bayoux',
        optionClass: 'font-xs text-bayoux text-right',
        inputClass: 'input input--blue border border-solid rounded',
        async onSelected(dropdown, { value: province_id }) {
            dropdown.classList.remove('unselected');
            dropdown.parentElement.classList.remove('has-error');
            let response = await HTTPService.getRequest(Endpoint.get(Endpoint.GET_CITY_BY_PROVINCES_ID), { province_id });
            response = new LocationPresenter( response.data );
            CREATE_OPTION_TAG(CITY_OF_EDUCATION, response);
        }
    });
    CITY_OF_EDUCATION.MountDropdown( FILTER_CONFIG );
    // document.querySelector('.dnt-page__select--job-province').MountDropdown( FILTER_CONFIG );
    // document.querySelector('.dnt-page__select--job-city').MountDropdown( FILTER_CONFIG );
} catch (e) {}

try {
    let currentStep = 1;

    const INPUT_ERROR_CLASSNAME = 'has-error';
    const INPUT_ERROR_MESSAGE_CLASSNAME = 'error-message';
    const SPINNER_LOADING_CLASSNAME = 'spinner-loading';

    const FORM = document.querySelector('.dnt-page__from');
    const FORM_MESSAGE = document.querySelector('.dnt-page__msg');
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

    const STEP_SECOND_ELEMENT = {
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
        current_city_id: {
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
                this.isValid = true;
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
            isValid: true,
            el: GET_ELEMENT('dnt-page__education_field'),
            get input() {
                return this.el.querySelector('.input')
            },
            get val() {
                return this.input.value;
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
            try {
                FORM_MESSAGE.classList.add('none');
                SUBMIT_BUTTON.classList.add( SPINNER_LOADING_CLASSNAME );
                let payload = {
                    'national_code': ( toEnglishDigits( STEP_FIRST_ELEMENT['national_code'].val ) ),
                };
                await HTTPService.postRequest(Endpoint.get( Endpoint.VALIDATE_USER ), payload);
                currentStep = 2;
                fields.forEach(field => field.input.readOnly = true);
                OPEN_SECOND_STEP();
            } catch ( exception ) {
                let errors = exception?.errors;
                if ( errors ) {
                    Object.entries( errors )
                        .forEach( ([key, val], index) => {
                            let item = STEP_FIRST_ELEMENT[key];
                            if ( !!item ) {
                                HANDEL_ERROR_MESSAGE( item.el, val[0] );
                                if ( index === 0 ) SmoothScroll( item.el.offsetTop );
                            }
                        });
                }
                else {
                    FORM_MESSAGE.textContent = ( exception?.message || 'متاسفانه مشکلی پیش‌آمده است.' );
                    FORM_MESSAGE.classList.remove('text-green');
                    FORM_MESSAGE.classList.remove('none');
                }
            } finally {
                SUBMIT_BUTTON.classList.remove( SPINNER_LOADING_CLASSNAME );
            }
        }
    };

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
            PROVINCE_OF_BIRTH_FIELD = document.querySelector('select[name="birth_province"]').value,
            CITY_OF_BIRTH_FIELD = document.querySelector('select[name="birth_city"]').value,
            PROVINCE_OF_EDUCATION_FIELD = document.querySelector('select[name="edu_province"]').value,
            CITY_OF_EDUCATION_FIELD = document.querySelector('select[name="edu_city"]').value;

        let payload = {
            'national_code': ( toEnglishDigits( STEP_FIRST_ELEMENT['national_code'].val ) ),
            'gender': ( parseInt( GENDER_FIELD ) ),
            'name': ( STEP_FIRST_ELEMENT['name'].val ),
            'last_name': ( STEP_FIRST_ELEMENT['last_name'].val ),
            'father_name': ( STEP_SECOND_ELEMENT['father_name'].val ),
            'identity_number': ( !!STEP_SECOND_ELEMENT['identity_number'].val ? parseInt(toEnglishDigits( STEP_SECOND_ELEMENT['identity_number'].val )) : '' ),
            'province_of_birth': ( !!PROVINCE_OF_BIRTH_FIELD ? parseInt(toEnglishDigits( PROVINCE_OF_BIRTH_FIELD )) : '' ),
            'city_of_birth': ( !!CITY_OF_BIRTH_FIELD ? parseInt(toEnglishDigits( CITY_OF_BIRTH_FIELD )) : '' ),
            'date_of_birth': ( DATE_OF_BIRTH() ),
            'job_title': ( STEP_SECOND_ELEMENT['job_title'].val ),
            'last_education_degree': ( parseInt( STEP_SECOND_ELEMENT['last_education_degree'].val ) ),
            'phone': ( toEnglishDigits( STEP_SECOND_ELEMENT['phone'].val ) ),
            'mobile': ( toEnglishDigits( STEP_SECOND_ELEMENT['mobile'].val ) ),
            'current_province_id': ( parseInt( STEP_SECOND_ELEMENT['current_province_id'].val ) ),
            'current_city_id': ( parseInt( STEP_SECOND_ELEMENT['current_city_id'].val ) ),
            'email': ( toEnglishDigits( STEP_SECOND_ELEMENT['email'].val ) ),
            'education_field': ( toEnglishDigits( STEP_SECOND_ELEMENT['education_field'].val ) ),
            'education_province_id': ( !!PROVINCE_OF_EDUCATION_FIELD ? parseInt( PROVINCE_OF_EDUCATION_FIELD ) : '' ),
            'education_city_id': ( !!CITY_OF_EDUCATION_FIELD ? parseInt( CITY_OF_EDUCATION_FIELD ) : '' ),
            'current_address': ( toEnglishDigits( STEP_SECOND_ELEMENT['current_address'].val ) ),
            'home_postal_code': ( !!STEP_SECOND_ELEMENT['home_postal_code'].val ? parseInt(toEnglishDigits( STEP_SECOND_ELEMENT['home_postal_code'].val )) : '' ),
            'password': ( toEnglishDigits( STEP_SECOND_ELEMENT['password'].val ) ),
            'password_confirmation': ( toEnglishDigits( STEP_SECOND_ELEMENT['password_confirmation'].val ) ),
        };

        Object.keys( payload )
            .forEach( key => {
                if ( !payload[key] && typeof payload[key] === 'string' )
                    delete payload[key]
            });

        return payload;
    };

    const FETCH_SECOND_STEP = async () => {
        try {
            FORM_MESSAGE.classList.add('none');
            SUBMIT_BUTTON.classList.add( SPINNER_LOADING_CLASSNAME );
            let payload = CREATE_REQUEST_PAYLOAD();
            let response = await HTTPService.postRequest(Endpoint.get( Endpoint.REGISTER ), payload);
            const TOKEN_SERVICE = new TokenService( response );
            FORM_MESSAGE.classList.add('text-green');
            FORM_MESSAGE.textContent = response?.message;
            FORM_MESSAGE.classList.remove('none');
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
                        let item = STEP_SECOND_ELEMENT[key] || STEP_FIRST_ELEMENT[key];
                        if ( !!item ) {
                            HANDEL_ERROR_MESSAGE( item.el, val[0] );
                            if ( index === 0 ) SmoothScroll( item.el.offsetTop );
                        }
                    });
            }
            else {
                FORM_MESSAGE.textContent = ( exception?.message || 'متاسفانه مشکلی پیش‌آمده است.' );
                FORM_MESSAGE.classList.remove('text-green');
                FORM_MESSAGE.classList.remove('none');
            }
        }
        finally {
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

    FORM.addEventListener(
        'submit',
        async ( event ) => {
            event.preventDefault();
            ( currentStep === 1 ) ? (
                await HANDEL_FIRST_STEP()
            ) : (
                await HANDEL_SECOND_STEP()
            );
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