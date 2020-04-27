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
    static async getGalleryList( queryString = {} ) {
        try {
            // return await HTTPService.getRequest('', queryString)
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception )
        }
    }

    static async getGalleryCategories( type = '' ) {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_CATEGORY_LIST), {
                category_type: type
            });
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }

    static async changeGalleryItemStatus(gallery_id, status) {
        try {
            // return await ''
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception )
        }
    }

    static async deleteGalleryItem( gallery_id ) {
        try {
            //gallery_id
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception )
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
            // let response = await GalleryService.getGalleryList( QUERY_STRING );
            // BaseService.commitToStore(this.$store, M_GALLERY_SET_DATA, response);
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

    removeItemFromStore( gallery_id ) {
        try {
            let newData = CopyOf( Object.values( this.$vm.items ) );
            let findIndex = newData.findIndex( item => item.gallery_id === gallery_id );
            if ( findIndex >= 0 ) newData.splice(findIndex, 1);
            BaseService.commitToStore(this.$store, M_GALLERY_UPDATE_DATA, newData);
        } catch ( exception ) {}
    }

    async changeStatusItems(gallery_id, status) {
        try {
            let response = await GalleryService.changeGalleryItemStatus(gallery_id, status);
            this.removeItemFromStore( gallery_id );
            return response.message;
        } catch ( exception ) {
            throw exception;
        }
    }

    async deleteGalleryItem( gallery_id ) {
        try {
            let response = await GalleryService.deleteGalleryItem( gallery_id );
            this.removeItemFromStore( gallery_id );
            return response.message;
        } catch ( exception ) {
            throw exception;
        }
    }

    async handelSearchAction(searchValue, { query }) {
        try {
            let QUERY_STRING = query;
            (HasLength( searchValue.trim() )) ? (
                QUERY_STRING['title'] = searchValue.trim()
            ) : delete QUERY_STRING['title'];
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