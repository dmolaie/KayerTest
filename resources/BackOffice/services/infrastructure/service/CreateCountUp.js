import BaseService from '@vendor/infrastructure/service/BaseService';
import ManageCountUpStore, {
    M_COUNT_UP_SET_DATA, M_COUNT_UP_UPDATE_DATA
} from '@services/store/ManageCountUp';

export default class CreateCountUpService {
    constructor( layout ) {
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
        this._RegisterStoreModule();
    }

    _RegisterStoreModule() {
        try {
            this.$store.registerModule('ManageCountUp', ManageCountUpStore);
            this.$vm.$set(this.$vm, 'isModuleRegistered', true);
        } catch (e) {}
    }

    _UnregisterStoreModule() {
        try {
            if ( this.$vm.isModuleRegistered )
                this.$store.unregisterModule('ManageCountUp');
        } catch (e) {}
    }
}