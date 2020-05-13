import { HasLength } from "@vendor/plugin/helper";
import LocationService from '@services/service/Location';
import ExceptionService from "@services/service/exception";
import { SliderService } from '@services/service/ManageSlider';
import BaseService from '@vendor/infrastructure/service/BaseService';
import CreateSlider, {
    C_SLIDER_SET_PROVINCES
} from '@services/store/CreateSlider';

export default class CreateSliderService {
    constructor( layout ) {
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
        this._RegisterStoreModule()
    }

    _RegisterStoreModule() {
        try {
            this.$store.registerModule('CreateSlider', CreateSlider);
            this.$vm.$set(this.$vm, 'isModuleRegistered', true);
        } catch (e) {}
    }

    _UnregisterStoreModule() {
        try {
            if ( this.$vm.isModuleRegistered )
                this.$store.unregisterModule('CreateSlider');
        } catch (e) {}
    }

    async processFetchAsyncData() {
        try {
            let response = await LocationService.getUserProvinces();
            BaseService.commitToStore(this.$store, C_SLIDER_SET_PROVINCES, response);
        } catch ( exception ) {
            this.$vm.displayNotification(exception, { type: 'error' });
            this.$vm.pushRouter({ name: 'MANAGE_SLIDER' });
        }
    }

    checkFormValidation() {
        try {
            let { first_title, images } = this.$vm.form;
            console.log('images', images);
            const CREATE_ERROR_MESSAGE = message => new Error( message );
            if ( !HasLength( first_title ) ) throw CREATE_ERROR_MESSAGE( 'فیلد عنوان اجباری می‌باشد.' );
            if ( !HasLength( images ) ) throw CREATE_ERROR_MESSAGE( 'فیلد تصویر اجباری می‌باشد.' );
        } catch ( exception ) { throw exception; }
    }

    get createRequestPayload() {
        try {
            this.checkFormValidation();
            let { form } = this.$vm;
            const FORM_DATA = new FormData(),
                  PUBLISH_DATE = Date.now() / 1e3,
                  PROVINCE_ID = form['province_id'] || this.$vm.defaultProvinces.id;

            FORM_DATA.append('province_id', PROVINCE_ID);
            FORM_DATA.append('language', form['language']);
            FORM_DATA.append('publish_date', PUBLISH_DATE);
            FORM_DATA.append('first_title', form['first_title']);
            FORM_DATA.append('images[]', form['images'][0]['file']);

            return FORM_DATA;
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }

    async createSlider() {
        try {
            const REQUEST_PAYLOAD = this.createRequestPayload;
            let response = await SliderService.createSlider( REQUEST_PAYLOAD );
            return response.message
        } catch ( exception ) {
            throw exception;
        }
    }
}