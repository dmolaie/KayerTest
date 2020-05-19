import { HasLength, Length } from '@vendor/plugin/helper';
import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter';

const STATUS = {
    ['complete']: 'complete',
    ['failed']: [
        'initializing_fail', 'downloading_fail', 'get_video_info_fail',
        'converting_fail', 'generating_thumbnail_fail', 'configurating_fail',
        'getsize_fail', 'deleting'
    ],
};

export default class ArvanVODPresenter extends BasePresenter {
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