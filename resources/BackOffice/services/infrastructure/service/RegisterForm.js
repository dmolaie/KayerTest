import { EventService } from '@services/service/ManageEvent';
import { EventPresenter } from '@services/presenter/EditUsers';
import DateService from '@vendor/plugin/date';
import LocationService from "@services/service/Location";
import { ProvincesPresenter } from '@vendor/infrastructure/presenter/MainPresenter';
import {
    Length, CopyOf,
    HasLength,
    toEnglishDigits,
    NationalCodeValidator,
    OnlyPersianAlphabet, OnlyNumber,
    PhoneNumberValidator, EmailValidator,
    PostalCodeValidator, isBoolean, isNumeric, isString
} from '@vendor/plugin/helper';
import ExceptionService from '@services/service/exception';
import Vue from 'vue';

const LOCATION = {
    ['national_code']: 'کدملی',
    ['name']: 'نام',
    ['last_name']: 'نام خانوادگی',
    ['gender']: 'جنسیت',
    ['father_name']: 'نام پدر',
    ['identity_number']: 'شماره شناسنامه',
    ['date_of_birth']: 'تاریخ تولد',
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
    ['current_province_id']: 'استان محل سکونت',
    ['current_city_id']: 'شهر محل سکونت',
    ['motivation_for_cooperation']: 'انگیزه‌ی همکاری',
    ['day_of_cooperation']: 'فرصت همکاری',
    ['field_of_activities']: 'زمینه فعالیت',
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
            date_of_birth: '',
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
            know_community_by: '',
            motivation_for_cooperation: '',
            day_of_cooperation: '',
            field_of_activities: [],
            receive_email: false,
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

    /**
     * @param payload { Object }
     */
    static createRequestPayload( payload ) {
        try {
            for (const [key, val] of Object.entries( payload )) {
                if (!isBoolean( val ) && !isNumeric( val )) {
                    if (isString( val )) payload[key] = toEnglishDigits( val );
                    if (!HasLength( val )) delete payload[key];
                }
            }
            return payload
        } catch ( exception ) { throw exception }
    }

    checkFromValidation( object ) {
        try {
            for (const FILED of Object.keys(CopyOf( object ))) {
                const VALUE_OF_FIELD = object[FILED];
                if ( VALUE_OF_FIELD.value &&
                     HasLength( VALUE_OF_FIELD.value )
                   ) throw new Error( VALUE_OF_FIELD.value );
            }
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }

        // try {
        //     for (const FILED of Object.keys(CopyOf( object ))) {
        //         const VALUE_OF_FIELD = object[FILED];
        //         const REQUIRED_ERROR_MESSAGE = this.requiredErrorMessage( LOCATION[FILED] );
        //         if( !HasLength( VALUE_OF_FIELD ) ) {
        //             this.setErrorMassage = { field: FILED, value: REQUIRED_ERROR_MESSAGE };
        //             throw new Error( REQUIRED_ERROR_MESSAGE );
        //         }
        //         if ( HasLength( VALUE_OF_FIELD.value ) ) throw new Error( VALUE_OF_FIELD.value );
        //     }
        // } catch ( exception ) {
        //     throw ExceptionService._GetErrorMessage( exception );
        // }
    }

    /**
     * @param requiredKeys { Array }
     * @param form { Object }
     */
    checkRequiredField( requiredKeys, form ) {
        try {
            requiredKeys.map(field => {
                const VALUE_OF_FIELD = form[field];
                if (isNumeric( VALUE_OF_FIELD ) || isBoolean( VALUE_OF_FIELD )) return field;
                if (void 0 === VALUE_OF_FIELD || !HasLength(VALUE_OF_FIELD)) {
                    const ERROR_MESSAGE = this.requiredErrorMessage( LOCATION[field] );
                     if ( !!this.validationObj[field] ) this.setErrorMassage = { field, value: ERROR_MESSAGE };
                    throw new Error( ERROR_MESSAGE )
                }
                return field;
            })
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
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

    validateNationalCode(field, value) {
        if (HasLength( value )) {
            if (!NationalCodeValidator( value )) {
                this.setErrorMassage = {
                    field, value: this.invalidErrorMessage( LOCATION[field] )
                };
            }
        } else {
            this.setErrorMassage = {
                field, value: this.requiredErrorMessage( LOCATION[field] )
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
            if (!OnlyNumber(toEnglishDigits( value )) || Length( value ) !== 11) return this.setErrorMassage = {
                field, value: this.invalidErrorMessage( LOCATION[field] )
            };
        } else {
            HasLength( value ) && (!OnlyNumber(toEnglishDigits( value )) || Length( value ) !== 11) && (
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
            if (HasLength( value ) && !PostalCodeValidator( value )) return this.setErrorMassage = {
                field, value: this.invalidErrorMessage( LOCATION[field] )
            };
        } else {
            (HasLength( value ) && !PostalCodeValidator( value )) && (
                this.setErrorMassage = {
                    field, value: this.invalidErrorMessage( LOCATION[field] )
                }
            )
        }
    }

    validateDayOfCooperation(field, value) {
        const REGEX = /\b([1-9]|[12][0-9]|3[0])\b/;
        HasLength( value ) && (
            !OnlyNumber( toEnglishDigits( value ) ) ||
            !REGEX.test(toEnglishDigits( value ))
        ) && (
            this.setErrorMassage = {
                field, value: 'فرصت همکاری باید عددی بین ۱ تا ۳۰ باشد.'
            }
        )
    }

    /**
     * @param date { Array }
     * @example ['jy', 'jm', 'jd']
     */
    convertSolarHijriToTimestamp( date) {
        try {
            const [JY, JM, JD] = date;
            if ( !(HasLength(JY) & HasLength(JM) & HasLength(JD)) ) return '';
            return DateService.jalaaliToTimestamp(parseInt(JY), parseInt(JM), parseInt(JD));
        } catch ( exception ) {}
    }
}