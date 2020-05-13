import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';
import ExceptionService from '@services/service/exception';

export default class ManageSliderService {
    constructor( layout ) {
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
        this._RegisterStoreModule()
    }

    _RegisterStoreModule() {
        try {
            // this.$store.registerModule('ManageReportStore', ManageReportStore);
            // this.$vm.$set(this.$vm, 'isModuleRegistered', true);
        } catch (e) {}
    }

    _UnregisterStoreModule() {
        try {
            // if ( this.$vm.isModuleRegistered )
            //     this.$store.unregisterModule('ManageReportStore');
        } catch (e) {}
    }
}