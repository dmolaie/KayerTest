import { EventService } from '@services/service/ManageEvent';
import { EventPresenter } from '@services/presenter/EditUsers';
import LocationService from "@services/service/Location";
import { ProvincesPresenter } from '@vendor/infrastructure/presenter/MainPresenter';
import {
    Length,
    HasLength,
    toEnglishDigits,
    NationalCodeValidator,
    OnlyPersianAlphabet, OnlyNumber,
    PhoneNumberValidator, EmailValidator,
    PostalCodeValidator
} from '@vendor/plugin/helper';
import Vue from 'vue';

const LOCATION = {
    ['name']: 'نام',
    ['last_name']: 'نام خانوادگی',
    ['father_name']: 'نام پدر',
    ['identity_number']: 'شماره شناسنامه',
    ['mobile']: 'تلفن همراه',
    ['essential_mobile']: 'تلفن اضطراری',
    ['email']: 'ایمیل',
    ['current_address']: 'آدرس محل سکونت',
    ['phone']: 'تلفن محل سکونت',
    ['home_postal_code']: 'کد‌پستی محل سکونت',
    ['education_field']: 'رشته تحصیلی',
    ['job_title']: 'شغل',
    ['address_of_work']: 'آدرس محل کار',
    ['work_phone']: 'تلفن محل کار',
    ['work_postal_code']: 'کد‌پستی محل کار',
};

export default class RegisterFormService {
    constructor( object ) {
        this.validationObj = object;
    }

    static get form() {
        return ({
            national_code: '',
            name: '',
            last_name: '',
            gender: '',
            father_name: '',
            identity_number: '',
            date_of_birth_year: '',
            date_of_birth_month: '',
            date_of_birth_day: '',
            province_of_birth: '',
            city_of_birth: '',
            event_id: '',
            mobile: '',
            essential_mobile: '',
            email: '',
            current_province_id: '',
            current_city_id: '',
            current_address: '',
            phone: '',
            home_postal_code: '',
            last_education_degree: '',
            education_field: '',
            education_province_id: '',
            education_city_id: '',
            job_title: '',
            province_of_work: '',
            city_of_work: '',
            address_of_work: '',
            work_phone: '',
            work_postal_code: '',
        })
    }

    static get gender() {
        return ({
            'male': 0,
            'female': 1,
            'other': 2,
        })
    }

    static get day() {
        const DAYS = [];
        for (let i = 1; i <= 31; i ++) {
            DAYS.push({ id: i, name: i })
        }
        return DAYS;
    }

    static get month() {
        return [
            { id: 1,  name: 'فروردین' },
            { id: 2,  name: 'اردیبهشت' },
            { id: 3,  name: 'خرداد' },
            { id: 4,  name: 'تیر' },
            { id: 5,  name: 'مرداد' },
            { id: 6,  name: 'شهریور' },
            { id: 7,  name: 'مهر' },
            { id: 8,  name: 'آبان' },
            { id: 9,  name: 'آذر' },
            { id: 10, name: 'دی' },
            { id: 11, name: 'بهمن' },
            { id: 12, name: 'اسفند' },
        ];
    }

    static get year() {
        const YEARS = [],
              PREFIX = '13';
        for (let i = 30; i < 82; i ++) {
            YEARS.push({
                id: parseFloat(PREFIX + i),
                name: parseFloat(PREFIX + i)
            })
        }
        return YEARS;
    }

    set setErrorMassage({ field, value }) {
        try {
            Vue.set(this.validationObj, field, {
                value, show: !!value
            });
        } catch ( exception ) {
            console.warn('exception: ', exception)
        }
    }

    static async handelEventFieldSearch( title ) {
        try {
            const QUERYSTRING = !!title ? { title } : {};
            let response = await EventService.getEventList( QUERYSTRING );
            return new EventPresenter( response?.data?.items || [] );
        } catch ( exception ) { throw exception; }
    }

    static async getCityByProvincesId( provinces_id ) {
        try {
            let response = {};
            if ( !!provinces_id ) {
                response = await LocationService.getCityByProvinceId( provinces_id );
                response = { ...new ProvincesPresenter( response.data ) }
            }
            return response;
        } catch ( exception ) {}
    }

    requiredErrorMessage( field ) {
        return `فیلد ${field} الزامی است.`
    }

    invalidErrorMessage( field ) {
        return `فرمت فیلد ${field} نامعتبر است.`
    }

    invalidPersianErrorMessage( field ) {
        return `${field} را با حروف فارسی وارد نمایید.`;
    }

    hideErrorMassage( field ) {
        this.setErrorMassage = {
            field, value: ''
        }
    }

    nationalCodeValidator(field, value) {
        const PERSIAN_NAME = 'کدملی';
        if (HasLength( value )) {
            if (!NationalCodeValidator( value )) {
                this.setErrorMassage = {
                    field, value: this.invalidErrorMessage( PERSIAN_NAME )
                };
            }
        } else {
            this.setErrorMassage = {
                field, value: this.requiredErrorMessage( PERSIAN_NAME )
            };
        }
    }

    validatePersianCharacter(field, value, is_required) {
        if ( is_required ) {
            if (!HasLength( value )) return this.setErrorMassage = {
                field, value: this.requiredErrorMessage( LOCATION[field] )
            };
            if (!OnlyPersianAlphabet( value )) return this.setErrorMassage = {
                field, value: this.invalidPersianErrorMessage( LOCATION[field] )
            };
        } else {
            (HasLength( value ) && !OnlyPersianAlphabet( value )) && (
                this.setErrorMassage = {
                    field, value: this.invalidPersianErrorMessage( LOCATION[field] )
                }
            )
        }
    }

    validateOnlyNumber(field, value, is_required) {
        if ( is_required ) {
            if (!HasLength( value )) return this.setErrorMassage = {
                field, value: this.requiredErrorMessage( LOCATION[field] )
            };
            if (!OnlyNumber(toEnglishDigits( value ))) return this.setErrorMassage = {
                field, value: this.invalidErrorMessage( LOCATION[field] )
            };
        } else {
            HasLength( value ) && !OnlyNumber(toEnglishDigits( value )) && (
                this.setErrorMassage = {
                    field, value: this.invalidErrorMessage( LOCATION[field] )
                }
            )
        }
    }

    validateMobileNumber(field, value, is_required) {
        if ( is_required ) {
            if (!HasLength( value )) return this.setErrorMassage = {
                field, value: this.requiredErrorMessage( LOCATION[field] )
            };
            if (!PhoneNumberValidator(toEnglishDigits( value ))) return this.setErrorMassage = {
                field, value: this.invalidErrorMessage( LOCATION[field] )
            };
        } else {
            HasLength( value ) && !PhoneNumberValidator(toEnglishDigits( value )) && (
                this.setErrorMassage = {
                    field, value: this.invalidErrorMessage( LOCATION[field] )
                }
            )
        }
    }

    validateEmail(field, value, is_required) {
        if ( is_required ) {
            if (!HasLength( value )) return this.setErrorMassage = {
                field, value: this.requiredErrorMessage( LOCATION[field] )
            };
            if (!EmailValidator(toEnglishDigits( value ))) return this.setErrorMassage = {
                field, value: this.invalidErrorMessage( LOCATION[field] )
            };
        } else {
            HasLength( value ) && !EmailValidator(toEnglishDigits( value )) && (
                this.setErrorMassage = {
                    field, value: this.invalidErrorMessage( LOCATION[field] )
                }
            )
        }
    }

    validatePhoneNumber(field, value, is_required) {
        if ( is_required ) {
            if (!HasLength( value )) return this.setErrorMassage = {
                field, value: this.requiredErrorMessage( LOCATION[field] )
            };
            if (!OnlyNumber(toEnglishDigits( value )) || Length( field ) !== 11) return this.setErrorMassage = {
                field, value: this.invalidErrorMessage( LOCATION[field] )
            };
        } else {
            HasLength( value ) && (!OnlyNumber(toEnglishDigits( value )) || Length( field ) !== 11) && (
                this.setErrorMassage = {
                    field, value: this.invalidErrorMessage( LOCATION[field] )
                }
            )
        }
    }

    validatePostalCode(field, value, is_required) {
        if ( is_required ) {
            if (!HasLength( value )) return this.setErrorMassage = {
                field, value: this.requiredErrorMessage( LOCATION[field] )
            };
            if (HasLength( field ) && !PostalCodeValidator( field )) return this.setErrorMassage = {
                field, value: this.invalidErrorMessage( LOCATION[field] )
            };
        } else {
            (HasLength( field ) && !PostalCodeValidator( field )) && (
                this.setErrorMassage = {
                    field, value: this.invalidErrorMessage( LOCATION[field] )
                }
            )
        }
    }
}