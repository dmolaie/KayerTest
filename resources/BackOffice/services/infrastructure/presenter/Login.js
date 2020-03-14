import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter'

export class LoginPresenter extends BasePresenter {
    constructor( { data } ) {
        super( data );
        this.payload = data;

        return (
            this.mapProps({
                token: String,
                roleId: Number,
                roleName: String,
                username: String
            })
        )
    }

    token() {
        return this.payload?.token ?? ''
    }

    roleId() {
        return this.payload?.role?.id ?? ''
    }

    roleName() {
        return this.payload?.role?.name ?? ''
    }

    username() {
        return this.payload?.name ?? ''
    }

}

export class LoginNotificationPresenter extends BasePresenter {
    constructor( data ) {
        super( data );
        this.payload = data;

        return (
            this.mapProps({
                name: String,
                message: String,
                welcomeMessage: String,
            })
        )
    }

    name() {
        return this.payload?.data?.name ?? ''
    }

    message() {
        return this.payload?.message ?? ''
    }

    welcomeMessage() {
        return this.message()
    }
}