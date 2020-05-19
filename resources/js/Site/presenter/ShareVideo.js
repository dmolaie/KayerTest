import { HasLength, Length } from "@vendor/plugin/helper";
import DateService from '@vendor/plugin/date';
import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter';

const STATUS = {
    ['complete']: 'complete',
    ['failed']: [
        'initializing_fail', 'downloading_fail', 'get_video_info_fail',
        'converting_fail', 'generating_thumbnail_fail', 'configurating_fail',
        'getsize_fail', 'deleting'
    ],
};

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

export class ArvanVideoPresenter extends BasePresenter {
    constructor({ data }) {
        super( data );
        this.data = data;
        return this.mapProps({
            url: String,
            is_complete: Boolean,
            is_failed: Boolean,
        });
    }

    url() {
        const { mp4_videos, video_url } = this.data;
        if (!!mp4_videos && HasLength( mp4_videos )) {
            return mp4_videos[Length( mp4_videos ) - 1];
        }
        return video_url || ''
    }

    is_complete() {
        return this.data.status === STATUS['complete'];
    }

    is_failed() {
        return STATUS['failed'].includes( this.data.status );
    }
}