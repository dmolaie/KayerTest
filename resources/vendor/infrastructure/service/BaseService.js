import {
    HasLength
} from "@vendor/plugin/helper";

export default class BaseService {
    static commitToStore( store, mutation, payload ) {
        ( !!payload && HasLength( payload ) ) ? (
            store.commit( mutation, payload )
        ) : (
            store.commit( mutation )
        )
    }
}