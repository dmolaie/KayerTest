import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import ExceptionService from '@services/service/exception';
import BaseService from '@vendor/infrastructure/service/BaseService';
import {
    CopyOf, HasLength, EncodeHTML
} from "@vendor/plugin/helper";
import CreateEvent, {
    C_EVENT_SET_PROVINCES, C_EVENT_SET_CATEGORIES
} from '@services/store/CreateEvent';
import {
    EventService
} from '@services/service/ManageEvent';

export default class CreateEventService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
        this._RegisterStoreModule();
    }

    _RegisterStoreModule() {
        try {
            this.$store.registerModule('CreateEventStore', CreateEvent);
            this.$vm.$set(this.$vm, 'isModuleRegistered', true);
        } catch (e) {}
    }

    _UnregisterStoreModule() {
        try {
            if ( this.$vm.isModuleRegistered )
                this.$store.unregisterModule('CreateEventStore');
        } catch (e) {}
    }

    async provincesList() {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_ALL_PROVINCES));
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception )
        }
    }

    async processFetchAsyncData() {
        try {
            let response = await Promise.all([
                this.provincesList(),
                EventService.getEventCategories()
            ]);
            BaseService.commitToStore(this.$store, C_EVENT_SET_PROVINCES, response[0]);
            BaseService.commitToStore(this.$store, C_EVENT_SET_CATEGORIES, response[1]);
        } catch ( exception ) {
            this.$vm.displayNotification(exception, { type: 'error' });
            this.$vm.pushRouter( { name: 'MANAGE_EVENT' } );
        }
    }

    static checkFormValidation( form ) {
        try {
            const ERROR_MESSAGE = (field = '') => new Error(`فیلد ${field} اجباری می‌باشد.`);
            let {
                title, slug,
                event_start_date, event_end_date,
                event_start_register_date, event_end_register_date
            } = form;

            if (!title && !HasLength( title.trim() ) ) throw ERROR_MESSAGE('عنوان');
            if (!slug && !HasLength( slug.trim() ) ) throw ERROR_MESSAGE('نامک');
            if (!event_start_date ) throw ERROR_MESSAGE('زمان آغاز رویداد');
            if (!event_end_date ) throw ERROR_MESSAGE('زمان پایان رویداد');
            if (!event_start_register_date ) throw ERROR_MESSAGE('زمان آغاز ثبت‌نام');
            if (!event_end_register_date ) throw ERROR_MESSAGE('زمان پایان ثبت‌نام');
        } catch ( exception ) { throw exception; }
    };

    get createRequestPayload() {
        try {
            let duplicateFrom = CopyOf( this.$vm.form );
            const formData = new FormData();

            duplicateFrom['publish_date'] =  duplicateFrom['publish_date'] || (new Date().getTime() / 1e3);
            duplicateFrom['province_id']  = duplicateFrom['province_id'] || this.$vm.defaultProvinces.id;
            if (HasLength( duplicateFrom['category_ids'] )) {
                duplicateFrom['main_category_id'] = duplicateFrom['category_ids'][0];
                duplicateFrom['category_ids'].forEach(id => {
                    formData.append('category_ids[]', id);
                });
            }
            delete duplicateFrom['category_ids'];
            if (HasLength( duplicateFrom['description'] )) duplicateFrom['description'] = EncodeHTML(duplicateFrom['description']);
            duplicateFrom['slug'] = duplicateFrom['slug'].trim().replace(/ /g, '-');
            Object.keys( duplicateFrom )
                .forEach( key => {
                    if (
                        !duplicateFrom[key] &&
                        typeof duplicateFrom[key] === 'string'
                       ) delete duplicateFrom[key]
                });
            if ( !!this.$vm.form.images ) formData.append('images[]', this.$vm.form.images.get('images'));
            delete duplicateFrom['images'];

            for ( let [key, val] of Object.entries( duplicateFrom ) ) {
                formData.append(key, val);
            }

            return formData;
        } catch (e) {}
    }

    async onClickReleaseEventButton() {
        try {
            CreateEventService.checkFormValidation( this.$vm.form );
            const REQUEST_PAYLOAD = this.createRequestPayload;
            let response = await HTTPService.uploadRequest(Endpoint.get(Endpoint.CREATE_EVENT_LIST), REQUEST_PAYLOAD);
            return response?.message
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception )
        }
    }
}