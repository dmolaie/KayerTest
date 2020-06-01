<template>
    <div class="h-full">
        <div class="m-reset m-login flex items-stretch w-full h-full">
            <div class="m-login__panel relative h-full md:w-full">
                <div class="m-login__content w-full h-full flex items-start justify-center flex-wrap">
                    <a href="/"
                       class="m-login__logo w-full">
                        <img src="/images/ic_ehda-center.png"
                             alt="انجمن اهدای عضو ایرانیان"
                             class="block w-full h-full m-0-auto object-contain"
                        />
                    </a>
                    <template v-if="isActiveStep( LAYOUT_MANAGE['ENTER_PHONE_NUMBER'] )">
                        <form @submit.prevent="onClickSendingSMSButton" class="w-full">
                            <label class="m-login__wrapper relative block w-full"
                                   :class="{
                                       'm-login__wrapper--active': !!form.national_code.value,
                                       'm-login__wrapper--hasError': !!form.national_code.error,
                                   }"
                            >
                                <input type="text" autocomplete="off" name="national_code" v-model="form.national_code.value"
                                       class="m-login__input block w-full text-rum font-lg font-bold rounded direction-ltr"
                                       @blur="validateNationalCode"
                                />
                                <span class="m-login__label absolute font-lg font-bold pointer-event-none user-select-none z-2"
                                      v-text="'کدملی'"
                                > </span>
                                <span class="m-login__error absolute block text-red font-sm font-bold pointer-event-none"
                                      v-text="form.national_code.error"
                                > </span>
                            </label>
                            <label class="m-login__wrapper relative block w-full"
                                   :class="{
                                       'm-login__wrapper--active': !!form.mobile.value,
                                       'm-login__wrapper--hasError': !!form.mobile.error,
                                   }"
                            >
                                <input type="text" autocomplete="off" name="phone_number" v-model="form.mobile.value"
                                       class="m-login__input block w-full text-rum font-lg font-bold rounded direction-ltr"
                                       @blur="validatePhoneNumber"
                                />
                                <span class="m-login__label absolute font-lg font-bold pointer-event-none user-select-none z-2"
                                      v-text="'تلفن همراه'"
                                > </span>
                                <span class="m-login__error absolute block text-red font-sm font-bold pointer-event-none"
                                      v-text="form.mobile.error"
                                > </span>
                            </label>
                            <button class="m-reset__submit m-login__submit block w-full text-white font-lg font-bold rounded user-select-none"
                                    :class="{ 'spinner-loading': spinnerLoading.firstStep }"
                                    v-text="'ارسال کدبازیابی گذرواژه'"
                            > </button>
                            <div class="m-reset__link text-center">
                                <router-link :to="{ name: 'LOGIN' }"
                                             class="inline-block font-sm font-bold text-blue-100 l:transition-color l:hover:text-blue--200"
                                >
                                    بازگشت به صفحه ورود
                                </router-link>
                            </div>
                        </form>
                    </template>
                    <template v-if="isActiveStep( LAYOUT_MANAGE['ENTER_REGISTER_CODE'] )">
                        <form @submit.prevent="onClickRegisterToken" class="w-full">
                            <label class="m-login__wrapper relative block w-full"
                                   :class="{
                                       'm-login__wrapper--active': !!form.code.value,
                                       'm-login__wrapper--hasError': !!form.code.error,
                                   }"
                            >
                                <input type="text" autocomplete="off" name="code" v-model="form.code.value"
                                       class="m-login__input block w-full text-rum font-lg font-bold rounded direction-ltr"
                                       @blur="validateRegisterCode"
                                />
                                <span class="m-login__label absolute font-lg font-bold pointer-event-none user-select-none z-2"
                                      v-text="'کدبازیابی'"
                                > </span>
                                <span class="m-login__error absolute block text-red font-sm font-bold pointer-event-none"
                                      v-text="form.code.error"
                                > </span>
                            </label>
                            <button class="m-reset__submit m-login__submit block w-full text-white font-lg font-bold rounded user-select-none"
                                    :class="{ 'spinner-loading': spinnerLoading.secondStep }"
                                    v-text="'بررسی کدبازیابی گذرواژه'"
                            > </button>
                            <div class="m-reset__timer m-reset__link font-sm font-bold text-center cursor-default">
                                <template v-if="!countdown.is_finished">
                                    <p class="text-gray">
                                        لطفا تا ارسال پیامک کمی صبر کنید..
                                    </p>
                                    <p class="text-blue-100"
                                       v-text="countdown.display"
                                    > </p>
                                </template>
                                <template v-else>
                                    <button @click.prevent="onClickResendButton"
                                            class="block font-sm font-bold text-blue-100 m-0-auto l:transition-color l:hover:text-blue--200"
                                    >
                                        ارسال مجدد پیامک
                                    </button>
                                </template>
                            </div>
                        </form>
                    </template>
                    <template v-if="isActiveStep( LAYOUT_MANAGE['ENTER_NEW_PASSWORD'] )">
                        <form @submit.prevent="onClickNewPasswordButton" class="w-full">
                            <label class="m-login__wrapper relative block w-full"
                                   :class="{
                                       'm-login__wrapper--active': !!form.password.value,
                                       'm-login__wrapper--hasError': !!form.password.error,
                                   }"
                            >
                                <input type="password" autocomplete="off" name="password" v-model="form.password.value"
                                       class="m-login__input block w-full text-rum font-lg font-bold rounded direction-ltr"
                                       @blur="validatePassword"
                                />
                                <span class="m-login__label absolute font-lg font-bold pointer-event-none user-select-none z-2"
                                      v-text="'گذرواژه جدید'"
                                > </span>
                                <span class="m-login__error absolute block text-red font-sm font-bold pointer-event-none"
                                      v-text="form.password.error"
                                > </span>
                            </label>
                            <label class="m-login__wrapper relative block w-full"
                                   :class="{
                                       'm-login__wrapper--active': !!form.password_confirmation.value,
                                       'm-login__wrapper--hasError': !!form.password_confirmation.error,
                                   }"
                            >
                                <input type="password" autocomplete="off" name="password_confirmation" v-model="form.password_confirmation.value"
                                       class="m-login__input block w-full text-rum font-lg font-bold rounded direction-ltr"
                                       @blur="validatePasswordConfirmation"
                                />
                                <span class="m-login__label absolute font-lg font-bold pointer-event-none user-select-none z-2"
                                      v-text="'تکرار گذرواژه جدید'"
                                > </span>
                                <span class="m-login__error absolute block text-red font-sm font-bold pointer-event-none"
                                      v-text="form.password_confirmation.error"
                                > </span>
                            </label>
                            <button class="m-reset__submit m-login__submit block w-full text-white font-lg font-bold rounded user-select-none"
                                    :class="{ 'spinner-loading': spinnerLoading.thirdStep }"
                                    v-text="'ذخیره'"
                            > </button>
                        </form>
                    </template>
                </div>
            </div>
            <div class="m-login__aside flex-1 h-full md:none"></div>
        </div>
    </div>
</template>

<script>
    import { ZeroPad } from '@vendor/plugin/helper';
    import ResetPasswordService from '@services/service/ResetPassword'

    const LAYOUT_MANAGE = {
        ['ENTER_PHONE_NUMBER']: 'ENTER_PHONE_NUMBER',
        ['ENTER_REGISTER_CODE']: 'ENTER_REGISTER_CODE',
        ['ENTER_NEW_PASSWORD']: 'ENTER_NEW_PASSWORD',
    };

    const INITIAL_COUNTDOWN = () => ({
        duration: 2,
        display: '',
        timer: null,
        is_finished: false,
    });

    let Service = null;

    export default {
        name: "ResetPassword",
        data: () => ({
            form: {
                national_code: { value: '', error: '' },
                mobile: { value: '', error: '' },
                code: { value: '', error: '' },
                password: { value: '', error: '' },
                password_confirmation: { value: '', error: '' },
            },
            countdown: INITIAL_COUNTDOWN(),
            LAYOUT_MANAGE,
            LAYOUT_STATE: LAYOUT_MANAGE.ENTER_PHONE_NUMBER,
            spinnerLoading: { firstStep: false, secondStep: false, thirdStep: false }
        }),
        methods: {
            isActiveStep( STEP ) {
                return this.LAYOUT_STATE === STEP
            },
            changeActiveStep( STEP ) {
                this.$set(this, 'LAYOUT_STATE', STEP)
            },
            validateNationalCode() {
                try {
                    Service.nationalCodeValidator(
                        this.form.national_code
                    );
                } catch ( exception ) {}
            },
            validatePhoneNumber() {
                try {
                    Service.phoneNumberValidator(
                        this.form.mobile
                    );
                } catch ( exception ) {}
            },
            checkValidationFirstStep() {
                try {
                    this.validateNationalCode();
                    this.validatePhoneNumber();
                    return ([
                        !this.form.national_code.error,
                        !this.form.mobile.error
                    ].every(error => error))
                } catch (e) {}
            },
            async onClickSendingSMSButton() {
                try {
                    if ( this.checkValidationFirstStep() ) {
                        this.$set(this.spinnerLoading, 'firstStep', true);
                        const { national_code, mobile } = this.form;
                        await Service.onClickSendingSMSButton({
                            mobile: mobile.value,
                            national_code: national_code.value,
                        });
                        // this.displayNotification(result, { type: 'success' });
                        this.changeActiveStep( LAYOUT_MANAGE['ENTER_REGISTER_CODE'] );
                        this.countdownStart();
                    }
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                } finally {
                    this.$set(this.spinnerLoading, 'firstStep', false);
                }
            },
            countdownStart() {
                try {
                    let { duration } = this.countdown;
                    const START_DATE = Date.now() + ( duration * 60 * 1e3 ) + 1e3;
                    this.countdown.timer = setInterval(() => {
                        let diff = Math.floor(((START_DATE - Date.now()) / 1e3)),
                            minutes = Math.floor(diff / 60),
                            seconds = Math.floor((diff % 60));
                        this.$set(this.countdown, 'display', `${ZeroPad( minutes )}:${ZeroPad( seconds )}`);
                        ( diff <= 0 ) && this.countdownStop();
                    }, 1000);
                } catch ( exception ) {}
            },
            countdownStop() {
                try {
                    this.$set(this.countdown, 'is_finished', true);
                    clearInterval( this.countdown.timer );
                } catch ( exception ) {}
            },
            countdownReset() {
                try {
                    clearInterval( this.countdown.timer );
                    this.$set(this, 'countdown', INITIAL_COUNTDOWN.apply( this ));
                    this.countdownStart();
                } catch ( exception ) {}
            },
            validateRegisterCode() {
                try {
                    Service.registerCodeValidator(
                        this.form.code
                    );
                } catch ( exception ) {}
            },
            checkValidationSecondStep() {
                try {
                    this.validateRegisterCode();
                    return ([
                        !this.form.code.error,
                    ].every(error => error))
                } catch (e) {}
            },
            async onClickRegisterToken() {
                try {
                    if ( this.checkValidationSecondStep() ) {
                        this.$set(this.spinnerLoading, 'secondStep', true);
                        const { national_code, mobile, code } = this.form;
                        await Service.onClickRegisterToken({
                            token: code.value,
                            mobile: mobile.value,
                            national_code: national_code.value,
                        });
                        // this.displayNotification(result, { type: 'success' });
                        this.changeActiveStep( LAYOUT_MANAGE['ENTER_NEW_PASSWORD'] );
                    }
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                } finally {
                    this.$set(this.spinnerLoading, 'secondStep', false);
                }
            },
            async onClickResendButton() {
                try {
                    this.$set(this.spinnerLoading, 'firstStep', true);
                    const { national_code, mobile } = this.form;
                    await Service.onClickSendingSMSButton({
                        mobile: mobile.value,
                        national_code: national_code.value,
                    });
                    // this.displayNotification(result, { type: 'success' });
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                }
            },
            validatePassword() {
                try {
                    Service.passwordValidator(
                        this.form.password
                    );
                } catch ( exception ) {}
            },
            validatePasswordConfirmation() {
                try {
                    Service.passwordConfirmationValidator(
                        this.form.password_confirmation,
                        this.form.password.value
                    );
                } catch ( exception ) {}
            },
            checkValidationThirdStep() {
                try {
                    this.validatePassword();
                    this.validatePasswordConfirmation();
                    return ([
                        !this.form.password.error,
                        !this.form.password_confirmation.error
                    ].every(error => error))
                } catch ( exception ) {}
            },
            async onClickNewPasswordButton() {
                try {
                    if ( this.checkValidationThirdStep() ) {
                        this.$set(this.spinnerLoading, 'thirdStep', true);
                        const {
                            national_code,
                            mobile, code,
                            password, password_confirmation
                        } = this.form;
                        let result = await Service.onClickNewPasswordButton({
                            token: code.value,
                            mobile: mobile.value,
                            national_code: national_code.value,
                            password: password.value,
                            password_confirmation: password_confirmation.value
                        });
                        this.displayNotification(result, { type: 'success' });
                        this.pushRouter( { name: 'LOGIN' } );
                    }
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                } finally {
                    this.$set(this.spinnerLoading, 'thirdStep', false);
                }
            }
        },
        created() {
            Service = new ResetPasswordService( this );
        },
        mounted() {
        }
    }
</script>