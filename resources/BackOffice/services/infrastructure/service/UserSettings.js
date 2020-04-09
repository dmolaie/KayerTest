import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';
import ExceptionService from '@services/service/exception';
import {
    UserService
} from '@services/service/ManageLegate';
import {
    HasLength, Length
} from "@vendor/plugin/helper";

export default class UserSettingsService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
    }

    async changeUserPassword({ current_password, password, password_confirmation }) {
        try {
            const ERROR_MESSAGE = field => new Error(`فیلد ${field} باید حداقل هشت کاراکتر داشته باشد.`);
            if (!HasLength( current_password ) && Length( current_password ) < 8) throw ERROR_MESSAGE('گذرواژه فعلی');
            if (!HasLength( password ) && Length( password ) < 8) throw ERROR_MESSAGE('گذرواژه‌ی جدید');
            if (!HasLength( password_confirmation ) && Length( password_confirmation ) < 8) throw ERROR_MESSAGE('تکرار گذرواژه');
            if (password !== password_confirmation) throw new Error('فیلد گذرواژه‌ی جدید و تکرار گذرواژه با یکدیگر تطابق ندارد.');
            // let response = await HTTPService.postRequest(Endpoint.get(Endpoint.EDIT_USER_PASSWORD_BY_USER), {
            //     current_password, password, password_confirmation
            // });
            // return response.message;
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }

    async registerDonationCardForUser( user_id, role_id ) {
        try {
            console.log(user_id, role_id);
            // let response = UserService.AddRoleToUser( user_id, role_id );
            // console.log('response: ', response);
        } catch ( exception ) {
            throw exception;
        }
    }
}