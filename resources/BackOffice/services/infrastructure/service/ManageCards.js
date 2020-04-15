import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import ExceptionService from '@services/service/exception';
import BaseService from '@vendor/infrastructure/service/BaseService';
import ManageCardsStore, {
    M_CARDS_SET_DATA
} from '@services/store/ManageCards';
import {
    CLIENT
} from '@services/service/Roles';
import {
    CopyOf, NationalCodeValidator, Length, toEnglishDigits
} from '@vendor/plugin/helper';

export default class ManageCardsService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
        this._RegisterStoreModule();
    }

    _RegisterStoreModule() {
        try {
            this.$store.registerModule('ManageCardsStore', ManageCardsStore);
            this.$vm.$set(this.$vm, 'isModuleRegistered', true);
        } catch (e) {}
    }

    _UnregisterStoreModule() {
        try {
            if ( this.$vm.isModuleRegistered )
                this.$store.unregisterModule('ManageCardsStore');
        } catch (e) {}
    }

    async getClientUserList( querystring = {} ) {
        try {
            let response = await HTTPService.getRequest(Endpoint.get(Endpoint.GET_USER_LIST), {
                ...querystring,
                role_type: CLIENT
            });
            BaseService.commitToStore(this.$store, M_CARDS_SET_DATA, response);
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }

    async processFetchAsyncData() {
        try {
            await this.getClientUserList();
        } catch ( exception ) {
            this.$vm.displayNotification(exception, { type: 'error' })
        }
    }

    async handelSearchAction(search, { query }) {
        try {
            const QUERYSTRING = query;
            if (Length(search.trim()) >= 3) {
                if (NationalCodeValidator( search )) {
                    delete QUERYSTRING['name'];
                    QUERYSTRING['national_code'] = toEnglishDigits( search.trim() )
                } else {
                    delete QUERYSTRING['national_code'];
                    QUERYSTRING['name'] = toEnglishDigits( search.trim() )
                }
            } else {
                delete QUERYSTRING['name'];
                delete QUERYSTRING['national_code'];
            }
            await this.getClientUserList( QUERYSTRING );
        } catch ( exception ) {
            throw exception;
        }
    }

    async handelPagination(page, { query }) {
        try {
            const QUERYSTRING = {page, ...CopyOf(query)};
            await this.getClientUserList( QUERYSTRING );
        } catch ( exception ) {
            throw exception;
        }
    }
}