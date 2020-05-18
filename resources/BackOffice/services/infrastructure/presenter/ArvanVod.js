import {
    HasLength, Length
} from '@vendor/plugin/helper';

export default class ArvanVODPresenter {
    constructor({ data }) {
        this.url = '';
        const { mp4_videos } = data;
        if (!!mp4_videos && HasLength( mp4_videos )) { this.url = mp4_videos[Length( mp4_videos ) - 1]; }
        this.url = data['video_url'];
        return this.url || '';
    }
}