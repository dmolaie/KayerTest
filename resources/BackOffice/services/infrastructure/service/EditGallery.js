import BaseService from '@vendor/infrastructure/service/BaseService';
import { GalleryService } from '@services/service/ManageGallery';
import LocationService from '@services/service/Location';
import EditGalleryStore, {
    E_GALLERY_SET_DATA, E_GALLERY_PROVINCES, E_GALLERY_CATEGORIES
} from '@services/store/EditGallery';

export default class EditGalleryService {
    constructor( layout ) {
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess(this.$store , false);
        this._RegisterStoreModule();
    }

    _RegisterStoreModule() {
        try {
            this.$store.registerModule('EditGallery', EditGalleryStore);
            this.$vm.$set(this.$vm, 'isModuleRegistered', true);
        } catch (e) {}
    }

    _UnregisterStoreModule() {
        try {
            if ( this.$vm.isModuleRegistered )
                this.$store.unregisterModule('EditGallery');
        } catch (e) {}
    }

    async getGalleryItemDetails() {
        try {
            let { type, id } = this.$vm.$route.params;
            let response = await GalleryService.getGalleryItemDetails(id, type);
            BaseService.commitToStore(this.$store, E_GALLERY_SET_DATA, response);
        } catch ( exception ) {
            throw exception;
        }
    }

    async processFetchAsyncData() {
        try {
            let { type } = this.$vm.$route.params;
            let response = await Promise.all([
                this.getGalleryItemDetails(),
                GalleryService.getGalleryCategories( type ),
                LocationService.getUserProvinces()
            ]);
            BaseService.commitToStore(this.$store, E_GALLERY_CATEGORIES, response[1]);
            BaseService.commitToStore(this.$store, E_GALLERY_PROVINCES, response[2]);
        } catch ( exception ) {
            this.$vm.displayNotification(exception, { type: 'error' });
            // this.$vm.pushRouter({ name: 'MANAGE_GALLERY', params: { type: this.$vm.$route?.params?.type } });
        }
    }

    async changeGalleryItemStatus(media_id, media_type, status) {
        try {
            let response = await GalleryService.changeGalleryItemStatus(media_id, media_type, status);
            return response.message;
        } catch ( exception ) {
            throw exception;
        }
    }
}