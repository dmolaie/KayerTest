import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import ExceptionService from '@services/service/exception';
import BaseService from '@vendor/infrastructure/service/BaseService';
import { GalleryService } from '@services/service/ManageGallery';
import CreateGalleryStore, {
    C_GALLERY_SET_PROVINCE, C_GALLERY_SET_CATEGORIES
} from '@services/store/CreateGallery';

export default class CreateGalleryService {
    constructor( layout ) {
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
        this._RegisterStoreModule();
    }

    _RegisterStoreModule() {
        try {
            this.$store.registerModule('CreateGalleryStore', CreateGalleryStore);
            this.$vm.$set(this.$vm, 'isModuleRegistered', true);
        } catch (e) {}
    }

    _UnregisterStoreModule() {
        try {
            if ( this.$vm.isModuleRegistered )
                this.$store.unregisterModule('CreateGalleryStore');
        } catch (e) {}
    }

    async getUserProvince() {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_USER_PROVINCES));
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception )
        }
    }

    async processFetchAsyncData() {
        try {
            console.log(this.$vm.$route?.params?.type, '$router');
            let response = await Promise.all([
                this.getUserProvince(),
                GalleryService.getGalleryCategories('news'),
            ]);

            BaseService.commitToStore(this.$store, C_GALLERY_SET_PROVINCE, response[0]);
            BaseService.commitToStore(this.$store, C_GALLERY_SET_CATEGORIES, response[1]);
        } catch ( exception ) {
            console.log(exception);
            this.$vm.displayNotification(exception, { type: 'error' })
        }
    }

}