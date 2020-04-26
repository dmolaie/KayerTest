import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter';
import {
    ImagesPresenter,
    SelectedCategoriesPresenter
} from "@vendor/infrastructure/presenter/MainPresenter";
import StatusService from '@services/service/Status';
import { HasLength } from "@vendor/plugin/helper";

export default class ManageGalleryPresenter {
    constructor( payload ) {
        return !!payload && HasLength( payload ) ? (
            payload.map(item => new SingleGalleryPresenter( item ))
        ) : ([])
    }
}

export class SingleGalleryPresenter extends BasePresenter {
    constructor( data ) {
        super( data );
        this.item = data;

        return this.mapProps({
            gallery_id: Number,
            title: String,
            abstract: String,
            image_path: String,
            image_paths: Object,
            province_id: Number,
            province_name: String,
            publisher_name: String,
            publisher_id: Number,
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
            category_ids: Array,
            categories: Array,
        })
    }

    gallery_id() {
        return this.item.gallery_id
    }

    title() {
        return this.item.title
    }

    abstract() {
        return this.item.abstract || ''
    }

    image_path() {
        let images = new ImagesPresenter( this.item.image_paths );
        return HasLength( images ) ? images[0].path : '';
    }

    image_paths() {
        let images = new ImagesPresenter( this.item.image_paths );
        return HasLength( images ) ? images[0] : {}
    }

    province_id() {
        return this.item.province?.id
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

    categories() {
        return new SelectedCategoriesPresenter( this.item.category );
    }

    category_ids() {
        return (
            new SelectedCategoriesPresenter( this.item.category )
                .map(({ id }) => id)
        )
    }

    language() {
        return this.item.language
    }

    language_fa() {
        return this.item.language === 'fa' ? 'فارسی' : 'انگلیسی'
    }

    is_persian() {
        return this.item.language === 'fa'
    }

    is_english() {
        return this.item.language === 'fa'
    }
}