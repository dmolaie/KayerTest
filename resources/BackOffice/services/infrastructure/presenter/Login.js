import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter'

export class LoginPresenter extends BasePresenter {
    constructor( { data } ) {
        super( data );
        this.payload = data;

        return (
            this.mapProps({
                id: Number,
                token: String,
                roleId: Number,
                roleName: String,
                username: String
            })
        )
    }

    id() {
        return this.payload?.id ?? 0
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

export class UserInformationPresenter extends BasePresenter {
    constructor( data ) {
        super( data );
        this.payload = data;

        return (
            this.mapProps({
                id: Number,
                roleId: Number,
                roleName: String,
                username: String
            })
        )
    }

    id() {
        return this.payload.id;
    }

    username() {
        return this.payload.name;
    }

    roleId() {
        return this.payload?.roles[0]?.id
    }

    roleName() {
        return this.payload?.roles[0]?.type
    }
}