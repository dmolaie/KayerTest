import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import ExceptionService from '@services/service/exception';
import BaseService from '@vendor/infrastructure/service/BaseService';
import { GalleryService } from '@services/service/ManageGallery';
import LocationService from '@services/service/Location';
import EditGalleryStore, {
    E_GALLERY_SET_DATA, E_GALLERY_PROVINCES, E_GALLERY_CATEGORIES
} from '@services/store/EditGallery';
import { Length, HasLength, CopyOf, getObjectChange } from "@vendor/plugin/helper";

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
            this.$vm.pushRouter({ name: 'MANAGE_GALLERY', params: { type: this.$vm.$route?.params?.type } });
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

    checkFormValidation() {
        try {
            let { first_title, slug } = this.$vm.form;
            const CREATE_ERROR_MESSAGE = message => new Error( message );
            if ( !first_title ) throw CREATE_ERROR_MESSAGE( 'فیلد عنوان اجباری می‌باشد.' );
            if ( !slug ) throw CREATE_ERROR_MESSAGE( 'نامک عنوان اجباری می‌باشد.' );
        } catch ( exception ) { throw exception; }
    }

    async destroyCoverImage() {
        try {
            const { destroy_image_id } = this.$vm.form;
            if ( !!destroy_image_id && HasLength( destroy_image_id )) {
                await HTTPService.postRequest(Endpoint.get(Endpoint.DELETE_IMAGES_ITEM), {
                    image_id: destroy_image_id[0]
                })
            }
        } catch ( exception ) {}
    }

    async destroyUploadedFile() {
        try {
            const { destroy_file_id } = this.$vm.form;
            if ( !!destroy_file_id && HasLength( destroy_file_id ) ) {
                await Promise.all( destroy_file_id.map(file_id => GalleryService.removeUploadedFile( file_id )) );
                this.$vm.$set(this.$vm.form, 'destroy_file_id', []);
            }
        } catch ( exception ) {}
    }

    get createRequestPayload() {
        try {
            this.checkFormValidation();

            let { form, getSelectedFiles } = this.$vm;
            const FORM_DATA = new FormData();
            const DUPLICATE_FORM = CopyOf( form ),
                  UPLOADED_CONTENT_LENGTH = Length( DUPLICATE_FORM['content_paths'] ),
                  PUBLISH_DATE = DUPLICATE_FORM['is_published'] ? Date.now() / 1e3 : DUPLICATE_FORM['publish_date'];

            FORM_DATA.append('publish_date', PUBLISH_DATE);
            FORM_DATA.append('media_id', DUPLICATE_FORM['media_id']);
            FORM_DATA.append('language', DUPLICATE_FORM['language']);
            FORM_DATA.append('first_title', DUPLICATE_FORM['first_title']);
            FORM_DATA.append('province_id', DUPLICATE_FORM['province_id']);

            if ( !!HasLength( DUPLICATE_FORM['abstract'] ) ) FORM_DATA.append('abstract', DUPLICATE_FORM['abstract']);
            if ( !!HasLength( DUPLICATE_FORM['description'] ) ) FORM_DATA.append('description', DUPLICATE_FORM['description']);
            if ( !!DUPLICATE_FORM['images'] ) FORM_DATA.append('images[]', form['images'].get('images'));
            if (HasLength( DUPLICATE_FORM['category_ids'] )) {
                DUPLICATE_FORM['main_category_id'] = DUPLICATE_FORM['category_ids'][0];
                DUPLICATE_FORM['category_ids'].forEach(id => {
                    FORM_DATA.append('category_ids[]', id);
                });
            }
            if ( this.$vm.detail['slug'] !== DUPLICATE_FORM['slug'].trim() )
                FORM_DATA.append('slug', DUPLICATE_FORM['slug'].trim().replace(/ /g, '-'));

            HasLength( getSelectedFiles ) && getSelectedFiles.forEach((file, index) => {
                let inx = UPLOADED_CONTENT_LENGTH + index;
                FORM_DATA.append(`content[${inx}][file]`, file.file);
                HasLength( file.link ) && FORM_DATA.append(`content[${inx}][link]`, file.link);
                HasLength( file.title ) && FORM_DATA.append(`content[${inx}][title]`, file.title);
            });

            return FORM_DATA;
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception )
        }
    }

    /**
     * @param files { Array }
     */
    async editContentFileRequest( files ) {
        try {
            const PROMISES = files.map(file => GalleryService.editContentFile( file ));
            return Promise.all( PROMISES )
        } catch ( exception ) {
            throw exception;
        }
    }

    async editContentFile() {
        try {
            const NEW_ARRAY = this.$vm.form['content_paths'],
                  NEW_ARRAY_ID = NEW_ARRAY.map(({ file_id }) => file_id);
            const OLD_ARRAY = this.$vm.detail['content_paths'].filter(({ file_id }) => NEW_ARRAY_ID.includes(file_id));
            const CHANGE_ARRAY = getObjectChange(OLD_ARRAY, NEW_ARRAY);

            if (!!CHANGE_ARRAY && HasLength( CHANGE_ARRAY )) {
                await this.editContentFileRequest( CHANGE_ARRAY );
            }
        } catch ( exception ) {
            throw exception;
        }
    }

    async editGalleryItem( media_type ) {
        try {
            const REQUEST_PAYLOAD = this.createRequestPayload;
            await Promise.all([
                await this.destroyCoverImage(),
                await this.destroyUploadedFile(),
                await this.editContentFile()
            ]);
            let response = await GalleryService.editGalleryItem(media_type, REQUEST_PAYLOAD);
            return response.message;
        } catch ( exception ) {
            throw exception;
        }
    }
}