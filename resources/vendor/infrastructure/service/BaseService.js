import {
    HasLength
} from "@vendor/plugin/helper";
import {
    HANDEL_FULL_PAGE
} from '@services/store/LayoutState';

export default class BaseService {
    static commitToStore( store, mutation, payload ) {
        ( !!payload ) ? (
            store.commit( mutation, payload )
        ) : (
            store.commit( mutation )
        )
    }

    static ViewPortProcess( store, isFullPage ) {
        BaseService.commitToStore( store, HANDEL_FULL_PAGE, !isFullPage);
    }
}