import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter';
import {
    HasLength
} from "@vendor/plugin/helper";


export class ManageArticlePresenter {
    constructor( payload ) {
        return ( !!payload && HasLength( payload ) ) ? (
            payload.map(item => new SingleManageArticlePresenter( item ))
        ) : ([])
    }
}

export class SingleManageArticlePresenter extends BasePresenter {
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
            is_ready_to_publish: Boolean,
            is_recycle: Boolean,
            is_accept: Boolean,
            province: Object,
            publisher: Object,
            editor: Object,
            lang: String,
            relation_id: Number,
            image: String,
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
        const CATEGORY = this.data?.categories;

        return ( !!CATEGORY && HasLength( CATEGORY ) ) ? (
            CATEGORY.map(cat => new CategoryItemPresenter( cat ))
        ) : ([])
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
        return (this.data?.language === 'fa') ? 'فارسی' : 'انگلیسی'
    }

    relation_id() {
        return this.data?.relation_id
    }

    image() {
        const IMAGES = this.data?.image_paths;
        return ( !!IMAGES && HasLength( IMAGES ) ) ? (
            (IMAGES.map(image => new ImagePresenter( image )))[0].path
        ) : ('')
    }

}

export class CategoryItemPresenter extends BasePresenter {
    constructor( item ) {
        super( item );
        this.data = item;

        return this.mapProps({
            id: Number,
            en: String,
            fa: String,
            is_main: Boolean
        })
    }

    id() {
        return this.data.id
    }

    en() {
        return this.data.name_en
    }

    fa() {
        return this.data.name_fa
    }

    is_main() {
        return this.data.is_main
    }
}

export class ImagePresenter extends BasePresenter {
    constructor( item ) {
        super( item );
        this.data = item;

        return this.mapProps({
            path: String
        })
    }

    path() {
        return this.data.path || ''
    }
}