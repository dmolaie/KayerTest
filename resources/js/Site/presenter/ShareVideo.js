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
        // return this.data.description;
        //
        return DateService.getJalaaliDate( 1589653669.319 )
    }
}

export class ArvanVideoPresenter {
    constructor({ data }) {
        const { mp4_videos } = data;
        if (!!mp4_videos && HasLength( mp4_videos )) {
            return mp4_videos[Length( mp4_videos ) - 1]
        }
        return data['video_url'] || '';
    }
}