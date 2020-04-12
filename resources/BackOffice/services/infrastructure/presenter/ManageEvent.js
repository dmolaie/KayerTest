import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter';
import {
    HasLength, DecodeHTML
} from "@vendor/plugin/helper";
import {
    ImagesPresenter,
    SelectedCategoriesPresenter
} from '@vendor/infrastructure/presenter/MainPresenter';
import DateService from '@vendor/plugin/date';

export default class ManageEventPresenter {
    constructor( data ) {
        return (!!data && HasLength(data)) ? (
            data.map(item => new SingleEventPresenter( item ))
        ) : ([])
    }
}

export class SingleEventPresenter extends BasePresenter {
    constructor( data ) {
        super( data );
        this.item = data;

        return this.mapProps({
            id: Number,
            event_id: Number,
            title: String,
            abstract: String,
            description: String,
            category_ids: Array,
            category: Array,
            publish_date: Number,
            event_start_date: Number,
            event_start_date_fa: String,
            event_end_date: Number,
            event_end_date_fa: String,
            event_start_register_date: Number,
            event_start_register_date_fa: String,
            event_end_register_date: Number,
            event_end_register_date_fa: String,
            source_link_text: String,
            source_link_image: String,
            source_link_video: String,
            location: String,
            status: String,
            is_published: Boolean,
            is_pending: Boolean,
            is_accept: Boolean,
            is_reject: Boolean,
            is_ready_to_publish: Boolean,
            is_recycle: Boolean,
            is_cancel: Boolean,
            is_delete: Boolean,
            province_id: Number,
            province_name: String,
            publisher_id: Number,
            publisher_name: String,
            language: String,
            language_fa: String,
            is_persian: Boolean,
            is_english: Boolean,
            relation_id: Number,
            has_relation: Boolean,
            image: String,
            image_paths: Object,
            slug: String,
        })
    }

    id() {
        return this.item.id
    }

    event_id() {
        return this.item.id
    }

    title() {
        return this.item.title
    }

    abstract() {
        return this.item.abstract || ''
    }

    description() {
        let { description } = this.item;
        return !!description ? DecodeHTML( description ) : '';
    }

    category_ids() {
        return (
            new SelectedCategoriesPresenter( this.item.category )
                .map(({ id }) => id)
        )
    }

    category() {
        return new SelectedCategoriesPresenter( this.item.category );
    }

    publish_date() {
        return this.item.publish_date
    }

    event_start_date() {
        return this.item.event_start_date
    }

    event_start_date_fa() {
        return DateService.getJalaaliDate( this.item.event_start_date )
    }

    event_end_date() {
        return this.item.event_start_date
    }

    event_end_date_fa() {
        return DateService.getJalaaliDate( this.item.event_end_date )
    }

    event_start_register_date() {
        return this.item.event_start_register_date
    }

    event_start_register_date_fa() {
        return DateService.getJalaaliDate( this.item.event_start_register_date )
    }

    event_end_register_date() {
        return this.item.event_end_register_date
    }

    event_end_register_date_fa() {
        return DateService.getJalaaliDate( this.item.event_end_register_date )
    }


    source_link_text() {
        return this.item.source_link_test || this.item.source_link_text || ''
    }

    source_link_image() {
        return this.item.source_link_image || ''
    }

    source_link_video() {
        return this.item.source_link_video || ''
    }

    status() {
        return this.item.status?.fa || this.item.status?.en
    }

    is_published() {
        return this.item.status?.en === "published"
    }

    is_pending() {
        return this.item.status?.en === "pending"
    }

    is_accept() {
        return this.item.status?.en === "accept"
    }

    is_reject() {
        return this.item.status?.en === "reject"
    }

    is_ready_to_publish() {
        return this.item.status?.en === "ready_to_publish"
    }

    is_recycle() {
        return this.item.status?.en === "recycle"
    }

    is_cancel() {
        return this.item.status?.en === "cancel"
    }

    is_delete() {
        return this.item.status?.en === "delete"
    }

    location() {
        return this.item.location || ''
    }

    province_id() {
        return this.item.province?.id
    }

    province_name() {
        return this.item.province?.name
    }

    publisher_id() {
        return this.item.publisher?.id || '';
    }

    publisher_name() {
        return (this.item.publisher?.name + '' + this.item.publisher?.last_name) || '';
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

    relation_id() {
        return this.item.relation_id || 0
    }

    has_relation() {
        return !!this.item.relation_id
    }

    image() {
        let images = new ImagesPresenter( this.item.image_paths );
        return HasLength( images ) ? images[0].path : '';
    }

    image_paths() {
        let images = new ImagesPresenter( this.item.image_paths );
        return HasLength( images ) ? images[0] : {}
    }

    slug() {
        let { slug } = this.item;
        return !!slug ? slug.replace(/-/g, ' ') : ''
    }
}