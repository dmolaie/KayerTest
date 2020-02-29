import BaseService from '@vendor/infrastructure/service/BaseService';

export default class CreateNewsService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;
    }

    processViewPort() {
        console.log(this.$store);
        BaseService.ViewPortProcess( this.$store , false );
    }
}