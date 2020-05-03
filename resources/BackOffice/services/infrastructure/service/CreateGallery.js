import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import ExceptionService from '@services/service/exception';
import BaseService from '@vendor/infrastructure/service/BaseService';
import { GalleryService } from '@services/service/ManageGallery';
import CreateGalleryStore, {
    C_GALLERY_SET_PROVINCE, C_GALLERY_SET_CATEGORIES
} from '@services/store/CreateGallery';
import {
    CopyOf,
    HasLength
} from "@vendor/plugin/helper";

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
            let response = await Promise.all([
                this.getUserProvince(),
                GalleryService.getGalleryCategories( this.$vm.$route?.params?.type ),
            ]);
            BaseService.commitToStore(this.$store, C_GALLERY_SET_PROVINCE, response[0]);
            BaseService.commitToStore(this.$store, C_GALLERY_SET_CATEGORIES, response[1]);
        } catch ( exception ) {
            this.$vm.displayNotification(exception, { type: 'error' });
            this.$vm.pushRouter({ name: 'MANAGE_GALLERY', params: { type: this.$vm.$route?.params?.type } });
        }
    }

    checkFormValidation() {
        try {
            let { first_title, slug } = this.$vm.form;
            const CREATE_ERROR_MESSAGE = message => new Error( message );
            if ( !first_title ) throw CREATE_ERROR_MESSAGE( 'فیلد عنوان اجباری می‌باشد.' );
            if ( !slug ) throw CREATE_ERROR_MESSAGE( 'نامک عنوان اجباری می‌باشد.' );
        } catch ( exception ) { throw exception; }
    }

    get createRequestPayload() {
        try {
            this.checkFormValidation();
            let { form, getSelectedFiles } = this.$vm;
            const DUPLICATE_FORM = CopyOf( form ),
                  FORM_DATA = new FormData(),
                  PUBLISH_DATE = Date.now() / 1e3,
                  LANGUAGE = this.$vm.$route?.params?.lang,
                  SLUG = DUPLICATE_FORM['slug'].trim().replace(/ /g, '-'),
                  PROVINCE_ID = DUPLICATE_FORM['province_id'] || this.$vm.defaultProvinces.id;

            FORM_DATA.append('slug', SLUG);
            FORM_DATA.append('language', LANGUAGE);
            FORM_DATA.append('province_id', PROVINCE_ID);
            FORM_DATA.append('publish_date', PUBLISH_DATE);
            FORM_DATA.append('first_title', DUPLICATE_FORM['first_title']);

            if ( !!HasLength( DUPLICATE_FORM['abstract'] ) ) FORM_DATA.append('abstract', DUPLICATE_FORM['abstract']);
            if ( !!HasLength( DUPLICATE_FORM['description'] ) ) FORM_DATA.append('description', DUPLICATE_FORM['description']);
            if (HasLength( DUPLICATE_FORM['category_ids'] )) {
                DUPLICATE_FORM['main_category_id'] = DUPLICATE_FORM['category_ids'][0];
                DUPLICATE_FORM['category_ids'].forEach(id => {
                    FORM_DATA.append('category_ids[]', id);
                });
            }
            if ( !!DUPLICATE_FORM['parent_id'] ) FORM_DATA.append('parent_id', DUPLICATE_FORM['parent_id']);
            if ( !!DUPLICATE_FORM['images'] ) FORM_DATA.append('images[]', form['images'].get('images'));
            HasLength( getSelectedFiles ) && getSelectedFiles.forEach((file, index) => {
                FORM_DATA.append(`content[${index}][file]`, file.file);
                HasLength( file.link ) && FORM_DATA.append(`content[${index}][link]`, file.link);
                HasLength( file.title ) && FORM_DATA.append(`content[${index}][title]`, file.title);
            });
            return FORM_DATA;
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }

    async createGalleryItem( type ) {
        try {
            const REQUEST_PAYLOAD = this.createRequestPayload;
            let response = await GalleryService.createGalleryItem(type, REQUEST_PAYLOAD);
            return response.message;
        } catch ( exception ) {
            throw exception;
        }
    }
}