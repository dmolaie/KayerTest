import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter';
import {
    ImagesPresenter,
    SelectedCategoriesPresenter
} from '@vendor/infrastructure/presenter/MainPresenter';
import {
    HasLength, Length, DecodeHTML
} from "@vendor/plugin/helper";

export class NewsItemPresenter extends BasePresenter {
    constructor({ data }) {
        super( data );
        this.data = data;

        return this.mapProps({
            news_id: Number,
            first_title: String,
            second_title: String,
            abstract: String,
            description: String,
            category_ids: Array,
            source_link: String,
            is_published: Boolean,
            is_pending: Boolean,
            is_accept: Boolean,
            is_reject: Boolean,
            is_ready_to_publish: Boolean,
            is_recycle: Boolean,
            status: String,
            province_id: Number,
            province_name: String,
            publisher_name: Object,
            is_persian: Boolean,
            is_english: Boolean,
            relation_id: Number,
            images: Array,
            mainImage: Object,
            secondImage: Object,
        })
    }

    news_id() {
        return this.data.id
    }

    first_title() {
        return this.data.first_title
    }

    second_title() {
        return this.data.second_title || ''
    }

    abstract() {
        return this.data.abstract || ''
    }

    description() {
        let description = this.data.description;
        return !!description ? DecodeHTML( description ) : '';
    }

    category_ids() {
        return (
            new SelectedCategoriesPresenter( this.data.category )
                .map(({ id }) => id)
        )
    }

    source_link() {
        return this.data.source_link || ''
    }

    is_published() {
        return this.data.status?.en === "published"
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

    status() {
        return this.data.status.fa || this.data.status.en
    }

    province_id() {
        return this.data.province?.id
    }

    province_name() {
        return this.data.province?.name
    }

    publisher_name() {
        let {
            name, last_name
        } = this.data.publisher;

        return (
            name + ' ' + last_name
        )
    }

    is_persian() {
        return this.data.language === 'fa'
    }

    is_english() {
        return this.data.language === 'en'
    }

    relation_id() {
        return this.data.relation_id
    }

    images() {
        return new ImagesPresenter( this.data.image_paths )
    }

    mainImage() {
        const IMAGES = this.images();
        return (!!IMAGES && HasLength( IMAGES )) ? (
            IMAGES[0]
        ) : ({})
    }

    secondImage() {
        const IMAGES = this.images();
        return (!!IMAGES && HasLength( IMAGES ) && Length( IMAGES ) > 1) ? ({
            ...IMAGES[1],
            fileName: IMAGES[1].path.split('/')[Length( IMAGES[1].path.split('/') ) - 1]
        }) : ({
            fileName: ''
        })
    }

}