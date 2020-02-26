import Dropdown from '@vendor/plugin/dropdown';
import {
    Length,
    HasLength,
    SmoothScroll,
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
    
    const HANDEL_FIRST_STEP = ( event ) => {
        event.preventDefault();
        let fields = Object.values( STEP_FIRST_ELEMENT );
        let isValid = fields.every(field => {
            field.validate();
            if ( !field.isValid ) SmoothScroll( field.el.offsetTop );
            return field.isValid;
        });
        if ( isValid ) {
            SUBMIT_BUTTON.classList.add( SPINNER_LOADING_CLASSNAME );
            setTimeout(() => {
                currentStep = 2;
                fields.forEach(field => field.input.readOnly = true);
                SUBMIT_BUTTON.classList.remove( SPINNER_LOADING_CLASSNAME );
                OPEN_SECOND_STEP();
            }, 500);
        }
    };

    const HANDEL_SECOND_STEP = ( event ) => {
        let fields = Object.values( STEP_SECOND_ELEMENT );
        let isValid = fields.every(field => {
            field.validate();
            console.log(field.el);
            if ( !field.isValid ) SmoothScroll( field.el.offsetTop );
            return field.isValid;
        });
        if ( !isValid ) {
            event.preventDefault();
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
            event => {
                ( currentStep === 1 ) ? (
                    HANDEL_FIRST_STEP( event )
                ) : (
                    HANDEL_SECOND_STEP( event )
                );
            }
        )
    }

} catch (e) {}