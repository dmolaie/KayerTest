import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import ExceptionService from '@services/service/exception';
import BaseService from '@vendor/infrastructure/service/BaseService';
import StatusService from '@services/service/Status';
import ManageGalleryStore, {
    M_GALLERY_SET_DATA, M_GALLERY_UPDATE_DATA
} from '@services/store/ManageGallery';
import { GET_USER_ID } from '@services/store/Login';
import { CopyOf, HasLength } from '@vendor/plugin/helper';
import { CategoryService } from '@services/service/ManageCategory';

const DEFAULT_STATUS = {
    status: StatusService.PUBLISH_STATUS
};

export const GALLERY_TYPE = {
    ['audio']: {
        name_en: 'audio',
        name_fa: 'صوتی',
    },
    ['text']: {
        name_en: 'text',
        name_fa: 'متنی',
    },
    ['image']: {
        name_en: 'image',
        name_fa: 'عکس',
    },
    ['video']: {
        name_en: 'video',
        name_fa: 'ویدیویی',
    }
};

export class GalleryService {
    /**
     * @param type { String }
     * @param queryString { Object }
     */
    static async getGalleryList( type, queryString) {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_GALLERY_LIST, { type }), queryString)
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception )
        }
    }
    /**
     * @param category_type { String }
     */
    static async getGalleryCategories( category_type ) {
        try {
            return await CategoryService.getCategoryListByType( category_type );
        } catch ( exception ) {
            throw exception;
        }
    }
    /**
     * @param type { String }
     * @param requestPayload { FormData }
     */
    static async createGalleryItem(type, requestPayload) {
        try {
            return await HTTPService.uploadRequest(Endpoint.get(Endpoint.CREATE_GALLERY_LIST, { type }), requestPayload)
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }
    /**
     * @param media_id { Number }
     * @param media_type { String }
     * @param status { String }
     */
    static async changeGalleryItemStatus(media_id, media_type, status) {
        try {
            return await HTTPService.postRequest(Endpoint.get(Endpoint.EDIT_STATUS_GALLERY_ITEM, { type: media_type }), {
                media_id, status
            })
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception )
        }
    }
    /**
     * @param media_id { Number }
     * @param media_type { String }
     */
    static async deleteGalleryItem(media_id, media_type) {
        try {
            return await HTTPService.deleteRequest(Endpoint.get(Endpoint.DELETE_GALLERY_ITEM, {
                id: media_id,
                type: media_type
            }))
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception )
        }
    }
    /**
     * @param media_id { String | Number }
     * @param media_type { String }
     */
    static async getGalleryItemDetails( media_id, media_type ) {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_GALLERY_ITEM, {
                id: media_id,
                type: media_type
            }))
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }
}

export default class ManageGalleryService {
    constructor( layout ) {
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
        this._RegisterStoreModule();
    }

    _RegisterStoreModule() {
        try {
            this.$store.registerModule('ManageGallery', ManageGalleryStore);
            this.$vm.$set(this.$vm, 'isModuleRegistered', true);
        } catch (e) {}
    }

    _UnregisterStoreModule() {
        try {
            if ( this.$vm.isModuleRegistered )
                this.$store.unregisterModule('ManageGallery');
        } catch (e) {}
    }

    async getGalleryListFilterBy( querystring = {} ) {
        try {
            const QUERY_STRING = CopyOf( querystring );
            if ( QUERY_STRING['status'] === StatusService.MY_POST_STATUS ) {
                delete QUERY_STRING['status'];
                QUERY_STRING['publisher_id'] = this.$store.getters[GET_USER_ID]
            }
            const TYPE = this.$vm.$route?.params?.type;
            let response = await GalleryService.getGalleryList(TYPE, QUERY_STRING);
            BaseService.commitToStore(this.$store, M_GALLERY_SET_DATA, response);
        } catch ( exception ) {
            throw exception;
        }
    }

    async processFetchAsyncData() {
        try {
            let { query } = this.$vm.$route;
            let QUERY_STRING = HasLength( query ) ? query : DEFAULT_STATUS;
            await this.getGalleryListFilterBy( QUERY_STRING );
        } catch ( exception ) {
            this.$vm.displayNotification(exception, { type: 'error' })
        }
    }

    removeItemFromStore( media_id ) {
        try {
            let newData = CopyOf( Object.values( this.$vm.items ) );
            let findIndex = newData.findIndex( item => item.media_id === media_id );
            console.log('findIndex: ', newData, findIndex, media_id);
            if ( findIndex >= 0 ) newData.splice(findIndex, 1);
            BaseService.commitToStore(this.$store, M_GALLERY_UPDATE_DATA, newData);
        } catch ( exception ) {}
    }

    async changeStatusItems(media_id, media_type, status) {
        try {
            let response = await GalleryService.changeGalleryItemStatus(media_id, media_type, status);
            this.removeItemFromStore( media_id );
            return response.message;
        } catch ( exception ) {
            throw exception;
        }
    }

    async deleteGalleryItem(media_id, media_type) {
        try {
            let response = await GalleryService.deleteGalleryItem(media_id, media_type);
            this.removeItemFromStore( media_id );
            return response.message;
        } catch ( exception ) {
            throw exception;
        }
    }

    async handelSearchAction(searchValue, { query }) {
        try {
            let QUERY_STRING = query;
            (HasLength( searchValue.trim() )) ? (
                QUERY_STRING['first_title'] = searchValue.trim()
            ) : delete QUERY_STRING['first_title'];
            await this.getGalleryListFilterBy( QUERY_STRING );
        } catch ( exception ) {
            throw exception;
        }
    }

    async handleFilterAction(create_date_start, create_date_end, { query }) {
        try {
            let QUERY_STRING = HasLength( query ) ? query : DEFAULT_STATUS;
            (!!create_date_start) ? (
                QUERY_STRING['create_date_start'] = create_date_start
            ) : delete QUERY_STRING['create_date_start'];
            (!!create_date_end) ? (
                QUERY_STRING['create_date_end'] = create_date_end
            ) : delete QUERY_STRING['create_date_end'];
            await this.getGalleryListFilterBy( QUERY_STRING );
        } catch ( exception ) {
            throw exception;
        }
    }

    async handelPagination(page, { query }) {
        try {
            const QUERYSTRING = { page, ...CopyOf( query ) };
            await this.getGalleryListFilterBy( QUERYSTRING )
        } catch ( exception ) {
            throw exception;
        }
    }
}