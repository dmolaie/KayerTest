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
            category: Array,
            source_link: String,
            is_published: Boolean,
            province: Object,
            publisher: Object,
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

    category() {
        return (
            new SelectedCategoriesPresenter( this.data.category )
                .map(({ id }) => id)
        )
    }

    source_link() {
        return this.data.source_link || ''
    }

    is_published() {
        return this.data.status.en === "published"
    }

    province() {
        let province = this.data.province;
        return ( !!province && HasLength( province ) ) ? ({
            id: province.id,
            name: province.name
        }) : ({
            id: '',
            name: ''
        })
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
        return (!!IMAGES && HasLength( IMAGES ) && Length( IMAGES ) > 1) ? (
            IMAGES[1]
        ) : ({})
    }

}