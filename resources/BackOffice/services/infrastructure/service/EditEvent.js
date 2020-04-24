import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import ExceptionService from '@services/service/exception';
import BaseService from '@vendor/infrastructure/service/BaseService';
import CreateEventService from '@services/service/CreateEvent';
import {
    CopyOf, HasLength, EncodeHTML
} from "@vendor/plugin/helper";
import EditEventStore, {
    E_EVENT_SET_DATA, E_EVENT_SET_PROVINCES, E_EVENT_SET_CATEGORIES
} from '@services/store/EditEvent';
import {
    EventService
} from '@services/service/ManageEvent';

export const INITIAL_FORM = () => ({
    event_id: '',
    title: '',
    description: '',
    abstract: '',
    event_start_date: '',
    event_end_date: '',
    event_start_register_date: '',
    event_end_register_date: '',
    source_link_text: '',
    source_link_image: '',
    source_link_video: '',
    location: '',
    publish_date: '',
    language: '',
    category_ids: [],
    images: null,
    slug: '',
    province_id: '',
});

export default class EditEventService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess(this.$store , false);
        this._RegisterStoreModule();
    }

    _RegisterStoreModule() {
        try {
            this.$store.registerModule('EditEventStore', EditEventStore);
            this.$vm.$set(this.$vm, 'isModuleRegistered', true);
        } catch (e) {}
    }

    _UnregisterStoreModule() {
        try {
            if ( this.$vm.isModuleRegistered )
                this.$store.unregisterModule('EditEventStore');
        } catch (e) {}
    }

    async getEventDetailsById( event_id ) {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_EVENT_ITEM, { id: event_id }))
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception )
        }
    }

    async provincesList() {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_USER_PROVINCES));
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception )
        }
    }

    async processFetchAsyncData() {
        try {
            let response = await Promise.all([
                this.getEventDetailsById( this.$vm.$route.params.id ),
                this.provincesList(),
                EventService.getEventCategories()
            ]);

            BaseService.commitToStore(this.$store, E_EVENT_SET_DATA, response[0]);
            BaseService.commitToStore(this.$store, E_EVENT_SET_PROVINCES, response[1]);
            BaseService.commitToStore(this.$store, E_EVENT_SET_CATEGORIES, response[2]);
        } catch ( exception ) {
            this.$vm.displayNotification(exception, { type: 'error' });
            this.$vm.pushRouter( { name: 'MANAGE_EVENT' } );
        }
    }

    async getRelationDetails() {
        try {
            let response = await this.getEventDetailsById( this.$vm.$route.params.id );
            BaseService.commitToStore(this.$store, E_EVENT_SET_DATA, response);
        } catch ( exception ) {
            throw exception;
        }
    }

    async changeEventStatus(event_id, status) {
        try {
            let response = await EventService.changeEventStatus(event_id, status);
            return response.message
        } catch ( exception ) {
            throw exception;
        }
    }

    async destroyImage( image_id ) {
        try {
            await HTTPService.postRequest(Endpoint.get(Endpoint.DELETE_IMAGES_ITEM), {
                image_id
            })
        } catch (e) {}
    }

    async deleteUnusedImages() {
        try {
            await Promise.all(
                this.$vm.removedImages.map(image_id => this.destroyImage( image_id ))
            )
        } catch (e) {}
    }

    get createRequestPayload() {
        try {
            let duplicateFrom = {};
            const formData = new FormData();
            const NOW_TIMESTAMP = new Date().getTime() / 1e3;

            Object.keys(INITIAL_FORM())
                .forEach(key => {
                    duplicateFrom[key] = this.$vm.form[key]
                });
            duplicateFrom = CopyOf( duplicateFrom );
            if ( !!this.$vm.form.images ) formData.append('images[]', this.$vm.form.images.get('images'));
            if (HasLength( duplicateFrom['category_ids'] )) {
                duplicateFrom['main_category_id'] = duplicateFrom['category_ids'][0];
                duplicateFrom['category_ids'].forEach(id => {
                    formData.append('category_ids[]', id);
                });
            }
            if ( this.$vm.detail['slug'] !== duplicateFrom['slug'].trim() )
                formData.append('slug', duplicateFrom['slug'].replace(/ /g, '-'));
            delete duplicateFrom['slug'];
            delete duplicateFrom['category_ids'];
            delete duplicateFrom['images'];

            (this.$vm.form['is_ready_to_publish']) ? (
                formData.append('publish_date', (this.$vm.custom_publish_date || duplicateFrom['publish_date']))
            ) : (
                formData.append('publish_date', (this.$vm.custom_publish_date || NOW_TIMESTAMP))
            );
            delete duplicateFrom['publish_date'];
            for ( let [key, val] of Object.entries( duplicateFrom ) ) {
                if (!(!duplicateFrom[key] && typeof duplicateFrom[key] === 'string'))
                formData.append(key, val);
            }

            return formData
        } catch (e) { }
    }

    async editEventItem() {
        try {
            CreateEventService.checkFormValidation( this.$vm.form );
            const REQUEST_PAYLOAD = this.createRequestPayload;
            await this.deleteUnusedImages();
            let response = await HTTPService.uploadRequest(Endpoint.get(Endpoint.EDIT_EVENT_ITEM), REQUEST_PAYLOAD);
            return response.message;
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception )
        }
    }
}