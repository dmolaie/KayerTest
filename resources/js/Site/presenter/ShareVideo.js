import { HasLength } from "@vendor/plugin/helper";
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
                link: String,
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

    link() {
        return this.data.link;
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