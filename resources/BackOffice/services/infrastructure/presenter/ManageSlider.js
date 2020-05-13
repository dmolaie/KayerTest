import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter';
import { ImagesPresenter } from "@vendor/infrastructure/presenter/MainPresenter";
import StatusService from '@services/service/Status';
import { HasLength } from "@vendor/plugin/helper";

export default class ManageSliderPresenter {
    constructor( payload ) {
        return !!payload && HasLength( payload ) ? (
            payload.map(item => new SingleSliderPresenter( item ))
        ) : ([])
    }
}

export class SingleSliderPresenter extends BasePresenter {
    constructor( item ) {
        super( item );
        this.item = item;

        return this.mapProps({
            slider_id: Number,
            first_title: String,
            status: String,
            is_published: Boolean,
            is_pending: Boolean,
            is_accept: Boolean,
            is_reject: Boolean,
            is_ready_to_publish: Boolean,
            is_recycle: Boolean,
            is_cancel: Boolean,
            is_delete: Boolean,
            language: String,
            language_fa: String,
            is_persian: Boolean,
            is_english: Boolean,
            province_name: String,
            publisher_id: Number,
            publisher_name: String,
            image_path: String
        })
    }

    slider_id() {
        return this.item.id
    }

    first_title() {
        return this.item.first_title
    }

    status() {
        return this.item.status?.fa || this.item.status?.en
    }

    is_published() {
        return this.item.status?.en === StatusService.PUBLISH_STATUS
    }

    is_pending() {
        return this.item.status?.en === StatusService.PENDING_STATUS
    }

    is_accept() {
        return this.item.status?.en === StatusService.ACTIVE_STATUS
    }

    is_reject() {
        return this.item.status?.en === StatusService.REJECT_STATUS
    }

    is_ready_to_publish() {
        return this.item.status?.en === StatusService.READY_TO_PUBLISH_STATUS
    }

    is_recycle() {
        return this.item.status?.en === StatusService.RECYCLE_STATUS
    }

    is_cancel() {
        return this.item.status?.en === StatusService.CANCEL_STATUS
    }

    is_delete() {
        return this.item.status?.en === StatusService.DELETE_STATUS
    }

    province_name() {
        return this.item.province?.name || ''
    }

    publisher_id() {
        return this.item.publisher?.id || ''
    }

    publisher_name() {
        return this.item.publisher?.name + " " + this.item.publisher?.last_name || ''
    }

    image_path() {
        let images = new ImagesPresenter( this.item.image_paths );
        return HasLength( images ) ? images[0].path : '';
    }
}