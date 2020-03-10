import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter';

export default class MenuPresenter extends BasePresenter {
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
}