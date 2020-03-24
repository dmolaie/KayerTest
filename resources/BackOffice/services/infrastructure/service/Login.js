import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import TokenService from '@services/service/Token';
import {
    LoginNotificationPresenter
} from '@services/presenter/Login';
import {
    SET_USER
} from '@services/store/Login';
import BaseService from '@vendor/infrastructure/service/BaseService'

import {
    Length,
    NationalCodeValidator,
    toEnglishDigits
} from '@vendor/plugin/helper';

export default class LoginService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;
    }

    processViewPort() {
        BaseService.ViewPortProcess(this.$store , true);
    }

    async SignInRequest( payload ) {
        try {
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

                this.$vm.pushRouter( { name: 'DASHBOARD' } );
            }
        } catch ( { message } ) {
            this.$vm.displayNotification( message, {
                type: 'error',
                duration: 4000
            })
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

    async _onClickSubmitButton( payload ) {
        try {
            this.nationalCodeValidation();
            this.passwordValidation();
            let isValid = Object.values( payload ).every( item => item.valid );
            if ( !isValid ) return false;
            let data = {
                national_code: toEnglishDigits( this.$vm.form.username.value ),
                password: toEnglishDigits( this.$vm.form.password.value )
            };
            await this.SignInRequest( data );
        } catch (e) {
            //
        }
    }
}