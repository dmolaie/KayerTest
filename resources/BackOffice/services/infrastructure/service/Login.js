import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import {
    LoginPresenter,
    LoginNotificationPresenter
} from '@services/presenter/Login';
import {
    Length,
    NationalCodeValidator,
    toEnglishDigits
} from '@vendor/plugin/helper';

export default class LoginService {
    constructor( layout ) {
        this.$vm = layout;
    }

    async SignInRequest( payload ) {
        try {
            this.$vm.$set( this.$vm, 'shouldBeShowSpinnerLoading', true );
            // let response = await HTTPService.postRequest( Endpoint.get( Endpoint.SIGN_IN ), payload );
            let response = {
                "data": {
                    "name": "dariush",
                    "national_code": 4940040641,
                    "role": {
                        "name": "super-admin",
                        "id": 1
                    },
                    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIzIiwianRpIjoiNDc0ZmY0ZGIzMTMxMDE3ZjkzYzk5N2E4MTk1MjU4NTEyMDcwMzE2MDU2NjRiOWYwYzUwMjMyN2RiOGEzNDYyNGExN2E4ZGVkZWNiNzJiNzAiLCJpYXQiOjE1ODEzMzY1NDcsIm5iZiI6MTU4MTMzNjU0NywiZXhwIjoxNjEyOTU4OTQ3LCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.nP0QmHUNI2ZDkBiR5cW9FwXB6iumhJXRj5pvYkF1k5UX2947hv85AwFkuDehmoW7GXMBtMuBAEc2dLF6tQdzwx4irbI5H9NttSuRNTcgtpn38NfhWjsmvnMjt1hX7ZDDwOmuNYkG7tiWnGWY-CS2w5IPUT9DcL29G7QaqzE2-uVrAFbwAs9VlcJVsUKMgAPMSg_jiCIc8twEWeEEWcLanSN-Pail_P_R0phkl-VfKvrniHqtly9H0r11xKEeb-LWBRoKo7LAhFNOWpI-uOwQcB0lvEIdqJRjGWKqzYryK6wgvHqlrOffSSNm-4fhBLnPsTzawqG8q4Dr6NN9wkUT6v5Zy3-FUAKHijCF3ccekZsJPQKVxzMIucVBWAis1DpioCSqthceLx-gJ6NOwOy_pA6aSQxLnuGosPHfrZ0mH_pnMtbtZROfzt0weCrKi1eUlGdq9-FrccLTFBjWy7AH1K30yDegNwwYUFs6I78pH0277fVs36HD3VGbDoMN3v7IeqiyVmvWiawkCR56wDFtxyJiuBuELKARHvE9JP4dFeUA1hpMRlyuerFDuRvgEYqJFcLyQHsmreQ6LDbelO8bWHVBbkFtxDio-TiabOyiRmI4RUVeK0YvvkDoFxOu1ttUgVFpbxdwtZvbaaGruGe7rUFINV9tXM2eutPYdkY4d-0"
                },
                "status_code": 200,
                "message": "ورود با موفقیت انجام شد."
            };

            console.log(new LoginPresenter(response));

            response = new LoginNotificationPresenter( response );

            this.$vm.displayNotification( response['welcomeMessage'], {
                type: 'success',
                duration: 4000
            });
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