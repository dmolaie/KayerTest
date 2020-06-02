<template>
    <main class="h-full">
        <div class="m-login flex items-stretch w-full h-full">
            <div class="m-login__panel relative h-full md:w-full">
                <div class="m-login__content w-full h-full flex items-start justify-center flex-wrap">
                    <a href="/"
                       class="m-login__logo w-full">
                        <img src="/images/ic_ehda-center.png"
                             alt="انجمن اهدای عضو ایرانیان"
                             class="block w-full h-full m-0-auto object-contain"
                        />
                    </a>
                    <form @submit.stop="onClickSubmitButton" class="w-full">
                        <label class="m-login__wrapper relative block w-full"
                               :class="{
                                   'm-login__wrapper--active': !!form.username.value,
                                   'm-login__wrapper--hasError': !!form.username.errorMessage,
                               }"
                        >
                            <input type="text" autocomplete="off"
                                   @blur="onBlurUsernameField( form.username.value )"
                                   v-model="form.username.value"
                                   class="m-login__input block w-full text-rum font-lg font-bold rounded direction-ltr"
                            />
                            <span class="m-login__label absolute font-lg font-bold pointer-event-none user-select-none z-2"
                                  v-text="'کدملی'"
                            > </span>
                            <span class="m-login__error absolute block text-red font-sm font-bold pointer-event-none"
                                  v-text="form.username.errorMessage"
                            > </span>
                        </label>
                        <label class="m-login__wrapper relative block w-full"
                               :class="{
                                   'm-login__wrapper--active': !!form.password.value,
                                   'm-login__wrapper--hasError': !!form.password.errorMessage,
                               }"
                        >
                            <input type="password" autocomplete="off"
                                   @blur="onBlurPasswordField( form.password.value )"
                                   v-model="form.password.value"
                                   class="m-login__input block w-full text-rum font-lg font-bold rounded direction-ltr"
                            />
                            <span class="m-login__label absolute font-lg font-bold pointer-event-none user-select-none z-2"
                                  v-text="'گذرواژه'"
                            > </span>
                            <span class="m-login__error absolute block text-red font-sm font-bold pointer-event-none"
                                  v-text="form.password.errorMessage"
                            > </span>
                        </label>
                        <label class="m-login__wrapper relative block w-full"
                               :class="{
                                   'm-login__wrapper--active': !!form.captcha.value,
                                   'm-login__wrapper--hasError': !!form.captcha.errorMessage,
                               }"
                        >
                            <input type="text" autocomplete="off"
                                   @blur="onBlurCaptchaField"
                                   v-model="form.captcha.value"
                                   class="m-login__input block w-full text-rum font-lg font-bold rounded direction-ltr"
                            />
                            <span class="m-login__label absolute font-lg font-bold pointer-event-none user-select-none z-2"
                                  v-text="'تصویر امنیتی'"
                            > </span>
                            <span class="m-login__error absolute block text-red font-sm font-bold pointer-event-none"
                                  v-text="form.captcha.errorMessage"
                            > </span>
                        </label>
                        <div class="m-login__captcha flex items-center justify-center">
                            <figure class="m-login__captchaImage border border-solid rounded-1/2"
                                    :class="{ 'has-skeleton': !form.captcha.key }"
                            >
                                <img :src="form.captcha.image"
                                     alt="تصویر امنیتی"
                                     class="block w-full h-full object-contain rounded-inherit"
                                >
                            </figure>
                            <div class="m-login__captchaRefresh cursor-pointer"
                                 :class="{ 'm-login__captchaRefresh--loading': shouldBeShowCaptchaLoading }"
                                 @click.prevent="onClickRefreshCaptcha"
                            >
                                <svg viewBox="0 0 512 512"
                                     class="w-full h-full object-contain"
                                >
                                    <path d="M463.702,162.655L442.491,14.164c-1.744-12.174-16.707-17.233-25.459-8.481l-30.894,30.894
                                             C346.411,12.612,301.309,0,254.932,0C115.464,0,3.491,109.16,0.005,248.511c-0.19,7.617,5.347,14.15,12.876,15.234l59.941,8.569
                                             c8.936,1.304,17.249-5.712,17.125-15.058C88.704,165.286,162.986,90,254.932,90c22.265,0,44.267,4.526,64.6,13.183l-29.78,29.78
                                             c-8.697,8.697-3.761,23.706,8.481,25.459l148.491,21.211C456.508,181.108,465.105,172.599,463.702,162.655z"
                                    />
                                    <path d="M499.117,249.412l-59.897-8.555c-7.738-0.98-17.124,5.651-17.124,16.143c0,90.981-74.019,165-165,165
                                             c-22.148,0-44.048-4.482-64.306-13.052l28.828-28.828c8.697-8.697,3.761-23.706-8.481-25.459L64.646,333.435
                                             c-9.753-1.393-18.39,6.971-16.978,16.978l21.21,148.492c1.746,12.187,16.696,17.212,25.459,8.481l31.641-31.626
                                             C165.514,499.505,210.587,512,257.096,512c138.794,0,250.752-108.618,254.897-247.28
                                             C512.213,257.088,506.676,250.496,499.117,249.412z"
                                    />
                                </svg>
                            </div>
                        </div>
                        <button class="m-login__submit block w-full text-white font-lg font-bold rounded user-select-none"
                                :class="{ 'spinner-loading': shouldBeShowSpinnerLoading }"
                                @click.prevent="onClickSubmitButton"
                                v-text="'ورود'"
                        > </button>
                        <div class="w-full text-center">
                            <router-link :to="{ name: 'RESET_PASSWORD' }"
                                         class="m-login_forget inline-block font-base font-bold"
                            >
                                بازیابی گذرواژه
                            </router-link>
                        </div>
                    </form>
                </div>
            </div>
            <div class="m-login__aside flex-1 h-full md:none"></div>
        </div>
    </main>
</template>

<script>
    import LoginService from '@services/service/Login';
    let Service = null;

    export default {
        name: "Login",
        data: () => ({
            form: {
                username: { value: '', valid: false, errorMessage: '' },
                password: { value: '', valid: false, errorMessage: '' },
                captcha: { image: '', key: '', value: '', valid: false, errorMessage: '' }
            },
            shouldBeShowCaptchaLoading: false,
            shouldBeShowSpinnerLoading: false,
        }),
        methods: {
            onBlurUsernameField() {
                Service.nationalCodeValidation();
            },
            onBlurPasswordField() {
                Service.passwordValidation();
            },
            onBlurCaptchaField() {
                Service.captchaValidation();
            },
            async onClickRefreshCaptcha() {
                try {
                    this.$set(this, 'shouldBeShowCaptchaLoading', true);
                    await this.processFetchCaptcha();
                    this.$set(this, 'shouldBeShowCaptchaLoading', false);
                } catch ( exception ) {}
            },
            async processFetchCaptcha() {
                try {
                    let response = await Service.processFetchCaptcha();
                    this.$set(this.form.captcha, 'key', response.key);
                    this.$set(this.form.captcha, 'image', response.image);
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' });
                }
            },
            async onClickSubmitButton() {
                try {
                    await Service._onClickSubmitButton( this.form );
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' });
                    this.$set(this.form.captcha, 'value', '');
                    await this.onClickRefreshCaptcha();
                }
            }
        },
        async created() {
            Service = new LoginService( this );
            await this.processFetchCaptcha();
        },
    }
</script>