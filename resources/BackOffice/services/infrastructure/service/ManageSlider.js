import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';
import ExceptionService from '@services/service/exception';
import ManageSliderStore, {
    M_SLIDER_SET_DATA, M_SLIDER_UPDATE_DATA
} from '@services/store/ManageSlider';
import { CopyOf } from '@vendor/plugin/helper';

export class SliderService {
    /**
     * @param queryString { Object }
     */
    static async getSliderList( queryString ) {
        try {
            return await HTTPService.getRequest(Endpoint.get( Endpoint.GET_SLIDER_LIST ), queryString)
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception )
        }
    }
    /**
     * @param payload { FormData }
     */
    static async createSlider( payload ) {
        try {
            return await HTTPService.uploadRequest(Endpoint.get(Endpoint.CREATE_SLIDER_LIST), payload)
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception )
        }
    }
    /**
     * @param slider_id { Number }
     */
    static async deleteSliderItem( slider_id ) {
        try {
            return await HTTPService.deleteRequest(Endpoint.get(Endpoint.DELETE_GALLERY_ITEM, {
                id: slider_id,
            }))
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception )
        }
    }
}


export default class ManageSliderService {
    constructor( layout ) {
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
        this._RegisterStoreModule()
    }

    _RegisterStoreModule() {
        try {
            this.$store.registerModule('ManageSliderStore', ManageSliderStore);
            this.$vm.$set(this.$vm, 'isModuleRegistered', true);
        } catch (e) {}
    }

    _UnregisterStoreModule() {
        try {
            if ( this.$vm.isModuleRegistered )
                this.$store.unregisterModule('ManageSliderStore');
        } catch (e) {}
    }

    async processFetchAsyncData() {
        try {
            let response = await SliderService.getSliderList({});
            BaseService.commitToStore(this.$store, M_SLIDER_SET_DATA, response);
        } catch ( exception ) {
            this.$vm.displayNotification(exception, { type: 'error' })
        }
    }

    removeItemFromStore( slider_id ) {
        try {
            let newData = CopyOf( Object.values( this.$vm.items ) );
            let findIndex = newData.findIndex( item => item.slider_id === slider_id );
            if ( findIndex >= 0 ) newData.splice(findIndex, 1);
            BaseService.commitToStore(this.$store, M_SLIDER_UPDATE_DATA, newData);
        } catch ( exception ) {}
    }

    async deleteSliderItem( slider_id ) {
        try {
            let response = await SliderService.deleteSliderItem( slider_id );
            this.removeItemFromStore( slider_id );
            return response.message;
        } catch ( exception ) {
            this.$vm.displayNotification(exception, { type: 'error' })
        }
    }
}