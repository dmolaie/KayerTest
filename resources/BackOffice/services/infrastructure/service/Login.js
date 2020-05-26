import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import TokenService from '@services/service/Token';
import BaseService from '@vendor/infrastructure/service/BaseService';
import ExceptionService from '@services/service/exception';
import { SET_USER } from '@services/store/Login';
import {
    LoginNotificationPresenter,
    CaptchaPresenter
} from '@services/presenter/Login';
import {
    Length,
    HasLength,
    NationalCodeValidator,
    toEnglishDigits
} from '@vendor/plugin/helper';

const USER_EXCEPTION = "شما با کاربر دیگری وارد شده اید.لطفا ابتدا خارج شوید و سپس وارد شوید.";

export default class LoginService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess(this.$store , true);
    }

    async processFetchCaptcha() {
        try {
            let response = await HTTPService.getRequest(Endpoint.get(Endpoint.CAPTCHA));
            return new CaptchaPresenter( response )
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }

    async SignInRequest( payload ) {
        try {
            if ( !!TokenService._GetToken ) {
                throw new Error( USER_EXCEPTION );
            }
            const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]');
            this.$vm.$set( this.$vm, 'shouldBeShowSpinnerLoading', true );
            let response = await HTTPService.postRequest( Endpoint.get( Endpoint.SIGN_IN ), {
                ...payload,
                _token: !!CSRF_TOKEN ? CSRF_TOKEN.getAttribute('content') : ''
            });

            const TOKEN_SERVICE = new TokenService( response );
            const USER_HAS_ACCESS = TOKEN_SERVICE._HandelToken();

            if ( USER_HAS_ACCESS ) {
                BaseService.commitToStore( this.$store, SET_USER, response );
                response = new LoginNotificationPresenter( response );
                this.$vm.displayNotification( response['welcomeMessage'], {
                    type: 'success',
                    duration: 4000
                });
                let menus = await HTTPService.getRequest(Endpoint.get(Endpoint.GET_USER_MENU));
                BaseService.commitToStore(this.$store, 'MENUS_SET_DATA', menus);
                this.$vm.pushRouter( { name: 'DASHBOARD' } );
            }
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        } finally {
            this.$vm.$set( this.$vm, 'shouldBeShowSpinnerLoading', false )
        }
    }

    setErrorMessage( field, message ) {
        this.$vm.$set( field, 'valid', !message );
        this.$vm.$set( field, 'errorMessage', message );
    }

    nationalCodeValidation() {
        let { username: usernameField } = this.$vm.form;
        if ( !!usernameField.value.trim() ) {
            ( NationalCodeValidator( usernameField.value ) ) ? (
                this.setErrorMessage( usernameField, '' )
            ) : (
                this.setErrorMessage( usernameField, 'فرمت کدملی نامعتبر است.' )
            )
        } else
            this.setErrorMessage( usernameField, 'فیلد کدملی اجباری است.' );
    }

    passwordValidation() {
        let { password: passwordField } = this.$vm.form;
        if ( !!passwordField.value.trim() ) {
            ( Length( passwordField.value.trim() ) > 4 ) ? (
                this.setErrorMessage( passwordField, '' )
            ) : (
                this.setErrorMessage( passwordField, 'فرمت گذرواژه نامعتبر است.' )
            )
        } else
            this.setErrorMessage( passwordField, 'فیلد گذرواژه اجباری است.' );
    }

    captchaValidation() {
        let { captcha } = this.$vm.form;
        (!!captcha.value && HasLength( captcha.value.trim() )) ? (
            this.setErrorMessage(captcha, '')
        ) : (
            this.setErrorMessage(captcha, 'فیلد تصویر امنیتی اجباری است.')
        )
    }

    async _onClickSubmitButton( payload ) {
        try {
            this.nationalCodeValidation();
            this.passwordValidation();
            this.captchaValidation();
            let isValid = Object.values( payload ).every( item => item.valid );
            if ( !isValid ) return false;
            let data = {
                key: this.$vm.form.captcha.key,
                captcha: toEnglishDigits( this.$vm.form.captcha.value ),
                password: toEnglishDigits( this.$vm.form.password.value ),
                national_code: toEnglishDigits( this.$vm.form.username.value ),
            };
            await this.SignInRequest( data );
        } catch ( exception ) {
            throw exception;
        }
    }
}