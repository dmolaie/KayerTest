import DateService from '@vendor/plugin/date';
import { HasLength } from "@vendor/plugin/helper";
import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter';
import { ImagesPresenter } from "@vendor/infrastructure/presenter/MainPresenter";

const DEFAULT_IMAGE = '/images/img_default.jpg';
const GALLERY_TYPE = {
    'voice': 'audio',
    'image': 'images',
    'text': 'text',
    'video': 'video',
};

export default class GalleyPresenter {
    constructor( payload ) {
        return (!!payload && HasLength(payload)) ? (
            payload.map(item => new SingleGalleyPresenter( item ))
        ) : []
    }
}

export class SingleGalleyPresenter extends BasePresenter {
    constructor( data ) {
        super( data );
        this.data = data;

        return this.mapProps({
            href: String,
            slug: String,
            title: String,
            is_text: Boolean,
            is_image: Boolean,
            is_voice: Boolean,
            is_video: Boolean,
            image_path: String,
            publish_date: String,
        })
    }

    href() {
        return (`
            /${this.data.language}/page/gallery/${GALLERY_TYPE[this.data.type]}/${this.data.slug}
        `).trim()
    }

    slug() {
        return this.data.slug ?? '';
    }

    title() {
        return this.data.first_title ?? '';
    }

    image_path() {
        let images = new ImagesPresenter( this.data.image_paths );
        return HasLength( images ) ? images[0].path : DEFAULT_IMAGE;
    }

    publish_date() {
        return DateService.getJalaaliDate( this.data.publish_date )
    }

    is_image() {
        return this.data.type === GALLERY_TYPE['image'];
    }

    is_voice() {
        return this.data.type === 'voice';
    }

    is_video() {
        return this.data.type === GALLERY_TYPE['text'];
    }

    is_text() {
        return this.data.type === GALLERY_TYPE['video'];
    }
}