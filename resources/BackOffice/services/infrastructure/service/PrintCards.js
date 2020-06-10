import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import ExceptionService from '@services/service/exception';
import BaseService from '@vendor/infrastructure/service/BaseService';
import PrintCardsStore, {
    PRINT_SET_DATA
} from '@services/store/PrintCards';
import { CLIENT } from '@services/service/Roles';
import { Length, toEnglishDigits } from "@vendor/plugin/helper";

export default class PrintCards {
    constructor( layout ) {
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
        this._RegisterStoreModule();
    }

    _RegisterStoreModule() {
        try {
            this.$store.registerModule('PrintCards', PrintCardsStore);
            this.$vm.$set(this.$vm, 'isModuleRegistered', true);
        } catch ( exception ) {}
    }

    _UnregisterStoreModule() {
        try {
            if ( this.$vm.isModuleRegistered )
                this.$store.unregisterModule('PrintCards');
        } catch ( exception ) {}
    }

    async handelSearch( value ) {
        try {
            if (Length( value ) < 3) return;
            let response = await HTTPService.getRequest(Endpoint.get(Endpoint.GET_USER_LIST), {
                national_code: toEnglishDigits( value ),
                role_type: CLIENT
            });
            BaseService.commitToStore(this.$store, PRINT_SET_DATA, response);
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }
}