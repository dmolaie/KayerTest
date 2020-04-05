import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter';
import {
    HasLength
} from "@vendor/plugin/helper";
import {
    ImagesPresenter,
    SelectedCategoriesPresenter
} from '@vendor/infrastructure/presenter/MainPresenter';

export class ManageArticlePresenter {
    constructor( payload ) {
        return ( !!payload && HasLength( payload ) ) ? (
            payload.map(item => new SingleArticlePresenter( item ))
        ) : ([])
    }
}

export class SingleArticlePresenter extends BasePresenter {
    constructor( item ) {
        super( item );
        this.data = item;

        return this.mapProps({
            id: Number,
            first_title: String,
            second_title: String,
            abstract: String,
            description: String,
            category: Array,
            publish_date: Number,
            source_link: String,
            status: String,
            is_published: Boolean,
            is_pending: Boolean,
            is_reject: Boolean,
            is_delete: Boolean,
            is_cancel: Boolean,
            is_ready_to_publish: Boolean,
            is_recycle: Boolean,
            is_accept: Boolean,
            province: Object,
            publisher: Object,
            editor: Object,
            lang: String,
            lang_fa: String,
            relation_id: Number,
            image: String,
            is_owner: Boolean,
        })
    }

    id() {
        return this.data?.id
    }

    first_title() {
        return this.data?.first_title || ''
    }

    second_title() {
        return this.data?.second_title || ''
    }

    abstract() {
        return this.data?.abstract || ''
    }

    description() {
        return this.data?.description || ''
    }

    category() {
        return new SelectedCategoriesPresenter( this.data.categories );
    }

    publish_date() {
        return this.data?.publish_date
    }

    source_link() {
        return this.data?.source_link || ''
    }

    status() {
        return this.data?.status?.fa || this.data?.status?.en
    }

    is_published() {
        return (
            this.data.status?.en === 'published'
        )
    }

    is_pending() {
        return (
            this.data.status?.en === "pending"
        )
    }

    is_accept() {
        return (
            this.data.status?.en === "accept"
        )
    }

    is_reject() {
        return (
            this.data.status?.en === "reject"
        )
    }

    is_cancel() {
        return (
            this.data.status?.en === "cancel"
        )
    }

    is_delete() {
        return (
            this.data.status?.en === "delete"
        )
    }

    is_ready_to_publish() {
        return (
            this.data.status?.en === "ready_to_publish"
        )
    }

    is_recycle() {
        return (
            this.data.status?.en === "recycle"
        )
    }

    province() {
        return this.data?.province
    }

    publisher() {
        return {
            id: this.data?.id,
            name: this.data?.publisher?.name + ' ' + this.data?.publisher?.last_name
        }
    }

    editor() {
        return this.data?.editor
    }

    lang() {
        return this.data?.language
    }

    lang_fa() {
        return (this.data?.language === 'fa') ? 'فارسی' : 'انگلیسی'
    }

    relation_id() {
        return this.data?.relation_id
    }

    image() {
        let images = new ImagesPresenter( this.data.image_paths );
        return HasLength( images ) ? images[0].path : '';
    }

    is_owner() {
        return this.data.is_created_by_user
    }
}
