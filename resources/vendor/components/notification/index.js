import NotificationCm from './Index.vue';
import {
    EventBus,
    defaultOption
} from "./service";

let isInstalled = false;

const Notification = {
    install( Vue ) {
        if ( isInstalled ) return;
        isInstalled = true;

        Vue.component( 'NotificationCm', NotificationCm );
        Vue.prototype.displayNotification = ( text = '', option = {} ) => {
            EventBus.$emit(
                'displayNotification', {
                    text,
                    option: { ...defaultOption, ...option }
                }
            );
        }
    }
};

export default Notification;