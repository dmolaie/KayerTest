import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter';
import {
    ImagesPresenter,
    SelectedCategoriesPresenter
} from '@vendor/infrastructure/presenter/MainPresenter';
import {
    HasLength, Length, DecodeHTML
} from "@vendor/plugin/helper";

export default class ArticleItemPresenter extends BasePresenter {
    constructor({ data }) {
        super( data );
        this.data = data;

        return this.mapProps({
            article_id: Number,
            first_title: String,
            second_title: String,
            third_title: String,
            abstract: String,
            description: String,
            categories: Array,
            category_ids: Array,
            slug: String,
            is_published: Boolean,
            is_pending: Boolean,
            is_accept: Boolean,
            is_reject: Boolean,
            is_ready_to_publish: Boolean,
            is_recycle: Boolean,
            status: String,
            publisher_name: String,
            language: String,
            relation_id: Number,
        })
    }

    article_id() {
        return this.data.id
    }

    first_title() {
        return this.data.first_title
    }

    second_title() {
        return this.data.second_title
    }

    third_title() {
        return this.data.third_title
    }

    abstract() {
        return this.data.abstract
    }

    description() {
        let description = this.data.description;
        return !!description ? DecodeHTML( description ) : '';
    }

    categories() {
        return new SelectedCategoriesPresenter( this.data.categories )
    }

    category_ids() {
        return this.categories().map(({ id }) => id)
    }

    slug() {
        let {
            slug
        } = this.data;

       return !!slug ? slug.replace(/-/g, ' ') : ''
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

    publisher_name() {
        let {
            name, last_name
        } = this.data.publisher;

        return (
            name + ' ' + last_name
        )
    }

    language() {
        return this.data.language
    }

    relation_id() {
        return this.data.relation_id || ''
    }

    image_paths() {
        return new ImagesPresenter( this.data.image_paths )
    }

}