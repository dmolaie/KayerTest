import { HasLength, Length } from "@vendor/plugin/helper";
import DateService from '@vendor/plugin/date';
import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter';

export default class ShareVideoPresenter extends BasePresenter {
    constructor({ data }) {
        super( data );
        this.data = data;

        if (!!data && HasLength( data )) {
            return this.mapProps({
                user_id: String,
                file_id: String,
                description: String,
                publish_date: String,
            })
        }
        return {};
    }

    user_id() {
        return this.data.user_id;
    }

    file_id() {
        return this.data.file_id;
    }

    description() {
        return this.data.description;
    }

    publish_date() {
        return DateService.getJalaaliDate( this.data.date )
    }
}

export class ArvanVideoPresenter {
    constructor({ data }) {
        this.url = '';
        const { mp4_videos } = data;
        if (!!mp4_videos && HasLength( mp4_videos )) { this.url = mp4_videos[Length( mp4_videos ) - 1]; }
        this.url = data['video_url'];
        return this.url || '';
    }
}