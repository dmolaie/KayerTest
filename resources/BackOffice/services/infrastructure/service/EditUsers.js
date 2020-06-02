import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';
import ExceptionService from '@services/service/exception';
import { UserService } from '@services/service/ManageLegate';
import EditUser, {
    E_USER_SET_DATA, E_USER_SET_BASIC_DATA,
    E_USER_SET_PROVINCES, E_USER_SET_EVENT
} from '@services/store/EditUsers';
import { EventService } from '@services/service/ManageEvent';
import { UPDATE_USER, GET_USER_ID }  from '@services/store/Login';
import ArvanVODPresenter from '@services/presenter/ArvanVod';

export default class EditUserService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
        this._RegisterStoreModule();
    }

    _RegisterStoreModule() {
        try {
            this.$store.registerModule('EditUserStore', EditUser);
            this.$vm.$set(this.$vm, 'isModuleRegistered', true);
        } catch (e) {}
    }

    _UnregisterStoreModule() {
        try {
            if ( this.$vm.isModuleRegistered ) this.$store.unregisterModule('EditUserStore');
        } catch (e) {}
    }

    async processFetchAsyncData() {
        try {
            let response = await Promise.all([
                UserService.getUserInfoByUserID( this.$vm.$route.params.id ),
                UserService.getBasicRegisterInfo(),
                HTTPService.getRequest(Endpoint.get(Endpoint.GET_ALL_PROVINCES)),
                EventService.getEventList()
            ]);
            BaseService.commitToStore(this.$store, E_USER_SET_DATA, response[0]);
            BaseService.commitToStore(this.$store, E_USER_SET_BASIC_DATA, response[1]);
            BaseService.commitToStore(this.$store, E_USER_SET_PROVINCES, response[2]);
            BaseService.commitToStore(this.$store, E_USER_SET_EVENT, response[3]);
        } catch ( exception ) {
            const EXCEPTION = ExceptionService._GetErrorMessage( exception );
            this.$vm.displayNotification(EXCEPTION, { type: 'error' });
            this.$vm.pushRouter({ name: 'MANAGE_LEGATE' });
        }
    }

    async SaveEditUserByAdmin( payload ) {
        try {
            delete payload['birth'];
            delete payload['card_id'];
            delete payload['has_card'];
            delete payload['has_video'];

            let response = await HTTPService.postRequest(Endpoint.get(Endpoint.EDIT_USER_BY_ADMIN), payload);
            if (response?.data?.id === this.$store.getters[GET_USER_ID])
                BaseService.commitToStore(this.$store, UPDATE_USER, response);
            return response.message;
        } catch ( exception ) {
            if ( exception?.errors ) {
                Object.entries( exception?.errors )
                    .forEach( ([key, val]) => {
                        if ( this.$vm.validationErrors[key] )
                            this.$vm.setErrorMassage(key, val[0])
                    });
            }
            throw ExceptionService._GetErrorMessage( exception );
        }
    }

    async openUserVideo( file_id ) {
        try {
            let response = await new Promise((resolve, reject) => {
                const HEADERS = new Headers();
                HEADERS.append('Authorization', ARVAN_VOD);
                HEADERS.append('Accept-Language', "en");
                const INIT_OPTION = {};
                INIT_OPTION.headers = HEADERS;
                INIT_OPTION.method = "GET";

                fetch(`https://napi.arvancloud.com/vod/2.0/videos/${file_id}`, INIT_OPTION)
                    .then(response => {
                        const RESPONSE = response.json();
                        ( response.ok ) ? (
                            resolve( RESPONSE )
                        ) : (
                            reject( RESPONSE )
                        )
                    })
                    .catch(except => reject(except))
            });

            let videoURL = new ArvanVODPresenter( response );
            if ( !videoURL.url && videoURL.is_failed ) {
                this.$vm.displayNotification('پردازش ویدیو با شکست مواجه شده است. لطفا بار دیگر ویدیو را بارگزاری کنید.', {
                    type: 'error',
                });
                return '';
            } else if ( !videoURL.url ) {
                this.$vm.displayNotification('ویدیو در حال پردازش است لطفا در زمان دیگری امتحان کنید.', {
                    type: 'warn',
                });
                return '';
            }
            window.open(videoURL.url, '_blank');
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }
}