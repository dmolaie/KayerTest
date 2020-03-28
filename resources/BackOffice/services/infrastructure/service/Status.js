export const PUBLISH_STATUS = 'published';
export const READY_TO_PUBLISH_STATUS = 'ready_to_publish';
export const RECYCLE_STATUS = 'recycle';
export const PENDING_STATUS = 'pending';
export const DELETE_STATUS = 'delete';
export const REJECT_STATUS = 'reject';

export default class StatusService {
    static get PUBLISH_STATUS() {
        return PUBLISH_STATUS
    }

    static get READY_TO_PUBLISH_STATUS() {
        return READY_TO_PUBLISH_STATUS
    }

    static get RECYCLE_STATUS() {
        return RECYCLE_STATUS
    }

    static get PENDING_STATUS() {
        return PENDING_STATUS
    }

    static get DELETE_STATUS() {
        return DELETE_STATUS
    }

    static get REJECT_STATUS() {
        return REJECT_STATUS;
    }
}