import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter';

export class ManageNewsPresenter {
    constructor({ items }) {

    }
}

export class SingleManageNewsPresenter extends BasePresenter {
    constructor( item ) {
        super( item );
        this.data = item;

        return this.mapProps({
            id: Number,
            first_title: Number,
            province: Number,
            image_paths: Array
        })
    }

}
//
// id: 31
// first_title: "fsdg"
// second_title: null
// abstract: null
// description: null
// category: null
// publish_date: 1584191454
// source_link: null
// status: {fa: "منتشر شده", en: "published"}
// province: {id: 1, name: "tehran test64"}
// publisher: {id: 6, name: "محمد", last_name: "سلیماینان"}
// editor: null
// language: "fa"
// relation_id: null
// image_paths: []