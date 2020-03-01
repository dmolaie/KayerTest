<template>
    <main class="h-full">
        <div class="p-login flex items-stretch w-full h-full">
            <div class="p-login__content relative h-full flex items-start justify-center flex-wrap bg-white l:w-5/12 md:w-full">
                <a href="/"
                   class="ehda-logo block w-full">
                    <img src="/images/ic_ehda-center.png"
                         alt="انجمن اهدای عضو ایرانیان"
                         class="ehda-logo__image block w-full h-full m-0-auto object-contain"
                    />
                </a>
                <div class="c-form w-full text-center">
                    <label class="c-form__wrapper block w-full relative text-right"
                           :class="{
                                'c-form__wrapper--active': (!!form.username.value),
                                'has-error': (!!form.username.errorMessage)
                           }"
                    >
                        <input type="text"
                               @blur="onBlurUsernameField( form.username.value )"
                               v-model="form.username.value"
                               class="c-form__input block w-full height rounded text-cornflower font-20 font-bold direction-ltr text-left"
                        />
                        <span class="c-form__label absolute text-gra font-lg font-bold bg-white pointer-event-none user-select-none z-2">
                            کدملی
                        </span>
                        <span class="c-form__error block text-red font-sm font-bold pointer-event-none">
                            {{ form.username.errorMessage }}
                        </span>
                    </label>
                    <label class="c-form__wrapper block w-full relative text-right"
                           :class="{
                                'c-form__wrapper--active': (!!form.password.value),
                                'has-error': (!!form.password.errorMessage)
                           }"
                    >
                        <input type="password"
                               @blur="onBlurPasswordField( form.password.value )"
                               v-model="form.password.value"
                               class="c-form__input block w-full height rounded text-cornflower font-20 font-bold direction-ltr text-left"
                        />
                        <span class="c-form__label absolute text-gra font-lg font-bold bg-white pointer-event-none user-select-none z-2">
                            گذرواژه
                        </span>
                        <span class="c-form__error block text-red font-sm font-bold pointer-event-none">
                            {{ form.password.errorMessage }}
                        </span>
                    </label>
                    <button class="c-form__submit block w-full height font-lg font-bold text-white rounded bg-sky user-select-none"
                            :class="{ 'spinner-loading': shouldBeShowSpinnerLoading }"
                            @click.prevent="onClickSubmitButton"
                    >
                        ورود
                    </button>
                </div>
            </div>
            <div class="p-login__background flex-1 h-full md:none"></div>
        </div>
    </main>
</template>

<script>
    import LoginService from '@services/service/Login';
    import {
        Length
    } from '@vendor/plugin/helper';

    let Service = null;

    export default {
        name: "Login",
        data: () => ({
            form: {
                username: {
                    value: '',
                    valid: false,
                    errorMessage: ''
                },
                password: {
                    value: '',
                    valid: false,
                    errorMessage: ''
                }
            },
            shouldBeShowSpinnerLoading: false,
        }),
        methods: {
            onBlurUsernameField() {
                Service.nationalCodeValidation();
            },
            onBlurPasswordField() {
                Service.passwordValidation();
            },
            async onClickSubmitButton() {
                await Service._onClickSubmitButton( this.form );
            }
        },
        mounted() {
            Service = new LoginService( this );
            Service.processViewPort();
        }
    }
</script>