import BaseService from '@vendor/infrastructure/service/BaseService';

export default class NotFoundService extends BaseService{
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;
    }

    processViewPort() {
        BaseService.ViewPortProcess( this.$store , true );
    }
}