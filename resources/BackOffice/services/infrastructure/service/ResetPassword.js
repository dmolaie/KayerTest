import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import ExceptionService from '@services/service/exception';
import BaseService from '@vendor/infrastructure/service/BaseService';
import {
    HasLength, OnlyNumber,
    NationalCodeValidator, Length,
    PhoneNumberValidator, toEnglishDigits
} from "@vendor/plugin/helper";

const PASSWORD_MIN_LENGTH = 8;
const LOCATION = {
    ['national_code']: 'کدملی',
    ['mobile']: 'تلفن همراه',
    ['code']: 'کدبازیابی',
    ['password']: 'گذرواژه',
    ['password_confirmation']: 'تکرار گذرواژه',
};

export default class ResetPasswordService {
    constructor( layout ) {
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess(this.$store , true);
    }
    /**
     * @param field { String }
     */
    static requiredErrorMessage( field ) {
        return `فیلد ${field} الزامی است.`
    }
    /**
     * @param field { String }
     */
    static invalidErrorMessage( field ) {
        return `فرمت فیلد ${field} نامعتبر است.`
    }
    /**
     * @param payload { Object }
     */
    nationalCodeValidator( payload ) {
        try {
            const FIELD = LOCATION['national_code'];
            if (HasLength( payload.value )) {
                if (!NationalCodeValidator( payload.value )) {
                    this.$vm.$set(payload, 'error', ResetPasswordService.invalidErrorMessage( FIELD ));
                } else {
                    this.$vm.$set(payload, 'error', '');
                }
            } else {
                this.$vm.$set(payload, 'error', ResetPasswordService.requiredErrorMessage( FIELD ));
            }
        } catch ( exception ) {}
    }

    phoneNumberValidator( payload ) {
        try {
            const FIELD = LOCATION['mobile'];
            if (HasLength( payload.value )) {
                if (!PhoneNumberValidator(toEnglishDigits( payload.value ))) {
                    this.$vm.$set(payload, 'error', ResetPasswordService.invalidErrorMessage( FIELD ));
                } else {
                    this.$vm.$set(payload, 'error', '');
                }
            } else {
                this.$vm.$set(payload, 'error', ResetPasswordService.requiredErrorMessage( FIELD ));
            }
        } catch ( exception ) {}
    }

    registerCodeValidator( payload ) {
        try {
            const FIELD = LOCATION['code'];
            if (HasLength( payload.value )) {
                if (!OnlyNumber(toEnglishDigits( payload.value ))) {
                    this.$vm.$set(payload, 'error', ResetPasswordService.invalidErrorMessage( FIELD ));
                } else {
                    this.$vm.$set(payload, 'error', '');
                }
            } else {
                this.$vm.$set(payload, 'error', ResetPasswordService.requiredErrorMessage( FIELD ));
            }
        } catch (  exception ) {}
    }

    passwordValidator( payload ) {
        try {
            const FIELD = LOCATION['password'];
            if (HasLength( payload.value )) {
                if (Length( payload.value ) < PASSWORD_MIN_LENGTH) {
                    this.$vm.$set(payload, 'error', 'گذرواژه نباید کمتر از 8 کاراکتر باشد.');
                } else {
                    this.$vm.$set(payload, 'error', '');
                }
            } else {
                this.$vm.$set(payload, 'error', ResetPasswordService.requiredErrorMessage( FIELD ));
            }
        } catch (  exception ) {}
    }

    passwordConfirmationValidator(payload, password) {
        try {
            const FIELD = LOCATION['password_confirmation'];
            if (HasLength( payload.value )) {
                if (Length( payload.value ) < PASSWORD_MIN_LENGTH) {
                    this.$vm.$set(payload, 'error', 'گذرواژه نباید کمتر از 8 کاراکتر باشد.');
                } else if (payload.value !== password) {
                    this.$vm.$set(payload, 'error', 'گذرواژه‌ تطابق ندارد.');
                } else {
                    this.$vm.$set(payload, 'error', '');
                }
            } else {
                this.$vm.$set(payload, 'error', ResetPasswordService.requiredErrorMessage( FIELD ));
            }
        } catch (  exception ) {}
    }

    async onClickSendingSMSButton() {
        try {
            await new Promise(resolve => {
                setTimeout(() => {
                    resolve()
                }, 1000)
            })
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception )
        }
    }

    async onClick() {
        try {
            await new Promise(resolve => {
                setTimeout(() => {
                    resolve()
                }, 1000)
            })
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception )
        }
    }

    async onClickNewPasswordButton() {
        try {
            await new Promise(resolve => {
                setTimeout(() => {
                    resolve()
                }, 1000)
            })
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception )
        }
    }
}