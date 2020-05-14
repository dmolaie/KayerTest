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
                            >
                                <input type="text" autocomplete="off"
                                       class="m-login__input block w-full text-rum font-lg font-bold rounded direction-ltr"
                                />
                                <span class="m-login__label absolute font-lg font-bold pointer-event-none user-select-none z-2"
                                      v-text="'کدملی'"
                                > </span>
                                <span class="m-login__error absolute block text-red font-sm font-bold pointer-event-none"
                                > </span>
                            </label>
                            <label class="m-login__wrapper relative block w-full"
                            >
                                <input type="password" autocomplete="off"
                                       class="m-login__input block w-full text-rum font-lg font-bold rounded direction-ltr"
                                />
                                <span class="m-login__label absolute font-lg font-bold pointer-event-none user-select-none z-2"
                                      v-text="'تلفن همراه'"
                                > </span>
                                <span class="m-login__error absolute block text-red font-sm font-bold pointer-event-none"
                                > </span>
                            </label>
                            <button class="m-reset__submit m-login__submit block w-full text-white font-lg font-bold rounded user-select-none"
                                    :class="{ 'spinner-loading': spinnerLoading.firstStep }"
                                    v-text="'ارسال کد بازیابی گذرواژه'"
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
                        <form @submit.prevent="onClick" class="w-full">
                            <label class="m-login__wrapper relative block w-full"
                            >
                                <input type="password" autocomplete="off"
                                       class="m-login__input block w-full text-rum font-lg font-bold rounded direction-ltr"
                                />
                                <span class="m-login__label absolute font-lg font-bold pointer-event-none user-select-none z-2"
                                      v-text="'کد بازیابی'"
                                > </span>
                                <span class="m-login__error absolute block text-red font-sm font-bold pointer-event-none"
                                > </span>
                            </label>
                            <button class="m-reset__submit m-login__submit block w-full text-white font-lg font-bold rounded user-select-none"
                                    :class="{ 'spinner-loading': spinnerLoading.secondStep }"
                                    v-text="'بررسی کد بازیابی گذرواژه'"
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
                            >
                                <input type="text" autocomplete="off"
                                       class="m-login__input block w-full text-rum font-lg font-bold rounded direction-ltr"
                                />
                                <span class="m-login__label absolute font-lg font-bold pointer-event-none user-select-none z-2"
                                      v-text="'گذرواژه جدید'"
                                > </span>
                                <span class="m-login__error absolute block text-red font-sm font-bold pointer-event-none"
                                > </span>
                            </label>
                            <label class="m-login__wrapper relative block w-full"
                            >
                                <input type="password" autocomplete="off"
                                       class="m-login__input block w-full text-rum font-lg font-bold rounded direction-ltr"
                                />
                                <span class="m-login__label absolute font-lg font-bold pointer-event-none user-select-none z-2"
                                      v-text="'تکرار گذرواژه جدید'"
                                > </span>
                                <span class="m-login__error absolute block text-red font-sm font-bold pointer-event-none"
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
            countdownStart() {
                try {
                    let { duration } = this.countdown;
                    const START_DATE = Date.now() + ( duration * 60 * 1e3 ) + 1e3;
                    this.countdown.timer = setInterval(() => {
                        let diff = Math.floor(((START_DATE - Date.now()) / 1e3)),
                            minutes = Math.floor(diff / 60),
                            seconds = Math.floor((diff % 60));
                        this.$set(this.countdown, 'display', `${ZeroPad( minutes )}:${ZeroPad( seconds )}`);
                        if ( diff <= 0 ) {
                            this.$set(this.countdown, 'is_finished', true);
                            clearInterval( this.countdown.timer );
                        }
                    }, 1000);
                } catch ( exception ) {}
            },
            countdownReset() {
                try {
                    clearInterval( this.countdown.timer );
                    this.$set(this, 'countdown', INITIAL_COUNTDOWN.apply( this ));
                    this.countdownStart();
                } catch ( exception ) {}
            },
            async onClickSendingSMSButton() {
                try {
                    this.$set(this.spinnerLoading, 'firstStep', true);
                    await Service.onClickSendingSMSButton();
                    this.changeActiveStep( LAYOUT_MANAGE['ENTER_REGISTER_CODE'] );
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                } finally {
                    this.$set(this.spinnerLoading, 'firstStep', false);
                }
            },
            async onClick() {
                try {
                    this.$set(this.spinnerLoading, 'secondStep', true);
                    await Service.onClick();
                    this.changeActiveStep( LAYOUT_MANAGE['ENTER_NEW_PASSWORD'] );
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                } finally {
                    this.$set(this.spinnerLoading, 'secondStep', false);
                }
            },
            onClickResendButton() {
                try {
                    // this.$set(this.spinnerLoading, 'secondStep', true);
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                } finally {
                    // this.$set(this.spinnerLoading, 'secondStep', false);
                }
            },
            async onClickNewPasswordButton() {
                try {
                    this.$set(this.spinnerLoading, 'thirdStep', true);
                    await Service.onClickNewPasswordButton();
                    this.pushRouter( { name: 'LOGIN' } );
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