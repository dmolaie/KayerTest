import Dropdown from '@vendor/plugin/dropdown';
import {
    Length,
    OnlyNumber,
    OnlyPersianAlphabet,
    NationalCodeValidator,
    PhoneNumberValidator,
    EmailValidator
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

    const FILTER_CONFIG = Object.assign({}, CONFIG, {
        hasFilterItem: true,
        filterPlaceholder: 'جستجو...',
        filterClass: 'font-xs text-bayoux',
        inputClass: 'input input--blue border border-solid rounded',
    });

    document.querySelector('.dnt-page__select--day').MountDropdown( CONFIG );
    document.querySelector('.dnt-page__select--month').MountDropdown( CONFIG );
    document.querySelector('.dnt-page__select--year').MountDropdown( CONFIG );
    document.querySelector('.dnt-page__select--birth').MountDropdown( FILTER_CONFIG );
    document.querySelector('.dnt-page__select--city').MountDropdown( FILTER_CONFIG );
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
        }
    };

    const STEP_SECOND_ELEMENT = {
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
                    if ( OnlyNumber( this.val ) && Length(this.val) === 11 ) {
                        this.isValid = true;
                        HANDEL_ERROR_MESSAGE( this.el );
                    } else {
                        this.isValid = false;
                        HANDEL_ERROR_MESSAGE( this.el, `فرمت تلفن منزل نامعتبر است.` );
                    }
                } else {
                    this.isValid = true;
                    HANDEL_ERROR_MESSAGE( this.el );
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
                        HANDEL_ERROR_MESSAGE( this.el, `فرمت ایمیل نامعتبر است.` );
                    }
                } else {
                    this.isValid = true;
                    HANDEL_ERROR_MESSAGE( this.el );
                }
            }
        },
        home: {
            isValid: false,
            el: GET_ELEMENT('dnt-page__home'),
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
                    HANDEL_ERROR_MESSAGE( this.el, `فیلد محل سکونت ضروری است.` );
                }
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
            el: GET_ELEMENT('dnt-page__rpt-password'),
            get input() {
                return this.el.querySelector('.input')
            },
            get val() {
                return this.input.value;
            },
            validate() {
                if ( !!this.val ) {
                    if ( this.val === GET_ELEMENT('dnt-page__password input').value ) {
                        this.isValid = true;
                        HANDEL_ERROR_MESSAGE( this.el );
                    } else {
                        this.isValid = false;
                        HANDEL_ERROR_MESSAGE( this.el, 'گذرواژه‌ تطابق ندارد.' );
                    }
                } else {
                    this.isValid = false;
                    HANDEL_ERROR_MESSAGE( this.el, `فیلد تکرار گذرواژه ضروری است.` );
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
            let fieldProperty = STEP_SECOND_ELEMENT[field];
            fieldProperty['input'].addEventListener(
                'focus',
                ( { target } ) => {
                    target.addEventListener('blur', ONBLUR_INPUT_FIELD);
                    target.parentElement.classList.remove( INPUT_ERROR_CLASSNAME );
                }
            )
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
        Object.values( STEP_FIRST_ELEMENT ).forEach(field => field.input.disabled = false);
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
            if ( !field.isValid ) field.validate();
            return field.isValid;
        });
        if ( isValid ) {
            SUBMIT_BUTTON.classList.add( SPINNER_LOADING_CLASSNAME );
            setTimeout(() => {
                currentStep = 2;
                fields.forEach(field => field.input.disabled = true);
                SUBMIT_BUTTON.classList.remove( SPINNER_LOADING_CLASSNAME );
                OPEN_SECOND_STEP();
            }, 500);
        }
    };

    const HANDEL_SECOND_STEP = ( event ) => {
        let fields = Object.values( STEP_SECOND_ELEMENT );
        let isValid = fields.every(field => {
            if ( !field.isValid ) field.validate();
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