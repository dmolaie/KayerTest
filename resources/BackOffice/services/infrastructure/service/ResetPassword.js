import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import ExceptionService from '@services/service/exception';
import BaseService from '@vendor/infrastructure/service/BaseService';

export default class ResetPasswordService {
    constructor( layout ) {
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess(this.$store , true);
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