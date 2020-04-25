import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter';

export default class AuthenticationPresenter extends BasePresenter {
    constructor( data ) {
        super( data );
        this.payload = data;

        return this.mapProps({
            register_by_user: Boolean,
            register_by_admin: Boolean,
            register_by_sms: Boolean,
        })
    }

    register_by_user() {
        return !!this.payload.register_by_user
    }

    register_by_admin() {
        return !!this.payload.register_by_admin
    }

    register_by_sms() {
        return !!this.payload.register_by_sms
    }
}