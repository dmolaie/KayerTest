import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import ExceptionService from '@services/service/exception';
import BaseService from '@vendor/infrastructure/service/BaseService';
import {
    HasLength, OnlyNumber,
    NationalCodeValidator, Length,
    PhoneNumberValidator, toEnglishDigits,
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

    async onClickSendingSMSButton({ national_code, mobile }) {
        try {
            await HTTPService.getRequest(Endpoint.get(Endpoint.RESET_PASSWORD_GET_TOKEN), {
                mobile: toEnglishDigits( mobile ),
                national_code: toEnglishDigits( national_code )
            }, true);
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }

    async onClickRegisterToken({ token, national_code, mobile }) {
        try {
            await HTTPService.postRequest(Endpoint.get(Endpoint.RESET_PASSWORD_VALIDATE_TOKEN), {
                token: toEnglishDigits( token ),
                mobile: toEnglishDigits( mobile ),
                national_code: toEnglishDigits( national_code )
            }, {}, true);
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }

    async onClickNewPasswordButton({ token, national_code, mobile, password, password_confirmation }) {
        try {
            let response = await HTTPService.postRequest(Endpoint.get(Endpoint.RESET_PASSWORD_NEW_PASSWORD), {
                token: toEnglishDigits( token ),
                mobile: toEnglishDigits( mobile ),
                national_code: toEnglishDigits( national_code ),
                password: toEnglishDigits( password ),
                password_confirmation: toEnglishDigits( password_confirmation )
            }, {}, true);
            return response.message || "تغییر گذرواژه با موفقیت انجام شد.";
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }
}