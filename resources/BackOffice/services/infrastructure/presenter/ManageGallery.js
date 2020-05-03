import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter';
import {
    ImagesPresenter,
    SelectedCategoriesPresenter
} from "@vendor/infrastructure/presenter/MainPresenter";
import StatusService from '@services/service/Status';
import { HasLength } from "@vendor/plugin/helper";

const DEFAULT_IMAGE = '/images/img_default.jpg';
const IMAGE_TYPES = /pn|jpg|jpeg/;

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
            media_id: Number,
            first_title: String,
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
            slug: String,
            description: String,
            relation_id: Number,
            has_relation: Boolean,
            content_paths: Array,
            type: String,
        })
    }

    media_id() {
        return this.item.id
    }

    first_title() {
        return this.item.first_title
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
        return new SelectedCategoriesPresenter( this.item.categories );
    }

    category_ids() {
        return (
            new SelectedCategoriesPresenter( this.item.categories )
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
        return this.item.language === 'en'
    }

    slug() {
        return this.item.slug.replace(/-/g, ' ')
    }

    description() {
        return this.item.description
    }

    relation_id() {
        return this.item.relation_id || ''
    }

    has_relation() {
        return !!this.item.relation_id
    }

    content_paths() {
        return new ContentPresenter( this.item.content_paths )
    }

    type() {
        return this.item.type
    }
}

export class ContentPresenter {
    constructor( payload ) {
        return !!payload && HasLength( payload ) ? (
            payload.map(item => new SingleContentPresenter( item ))
        ) : ([])
    }
}

class SingleContentPresenter extends BasePresenter {
    constructor( item ) {
        super( item );
        this.item = item;

        return this.mapProps({
            file_id: Number,
            path: String,
            link: String,
            title: String,
            preview: String,
        })
    }

    file_id() {
        return this.item.id || 0
    }

    path() {
        return "/" + this.item.path;
    }

    link() {
        return this.item.link || ''
    }

    title() {
        return this.item.title || ''
    }

    preview() {
        const { path } = this.item;
        // return !!path && IMAGE_TYPES.test( path ) ? ("/" + path) : DEFAULT_IMAGE;
        return DEFAULT_IMAGE;
    }
}