export const ADMIN_ID   = 1;
export const MANAGER_ID = 2;
export const LEGATE_ID  = 3;
export const CLIENT_ID  = 4;
export const ADMIN = 'admin';
export const MANAGER = 'manager';
export const LEGATE = 'legate';
export const CLIENT = 'client';

export default class RoleService {
    static get ADMIN() {
        return ADMIN
    }

    static get ADMIN_ID() {
        return ADMIN_ID
    }

    static get MANAGER() {
        return MANAGER
    }

    static get MANAGER_ID() {
        return MANAGER_ID
    }

    static get LEGATE() {
        return LEGATE;
    }

    static get LEGATE_ID() {
        return LEGATE_ID
    }

    static get CLIENT() {
        return CLIENT
    }

    static get CLIENT_ID() {
        return CLIENT_ID
    }
}

export const ACTIVE_STATUS = 'active';
export const PENDING_STATUS = 'pending';
export const INACTIVE_STATUS = 'inactive';
export const DELETE_STATUS = 'deleted';
export const WAIT_FOR_DOCUMENTS_STATUS = 'wait_for_documents';
export const WAIT_FOR_EXAM_STATUS = 'wait_for_exam';

export class UserRoleStatusService {
    static get ACTIVE_STATUS() {
        return ACTIVE_STATUS;
    }

    static get PENDING_STATUS() {
        return PENDING_STATUS;
    }

    static get INACTIVE_STATUS() {
        return INACTIVE_STATUS;
    }

    static get DELETE_STATUS() {
        return DELETE_STATUS;
    }

    static get WAIT_FOR_DOCUMENTS_STATUS() {
        return WAIT_FOR_DOCUMENTS_STATUS;
    }

    static get WAIT_FOR_EXAM_STATUS() {
        return WAIT_FOR_EXAM_STATUS;
    }
}

export const ACTIVE_ROLE_STATUS = {
    ['active']: {
        name: 'فعال',
        id: ACTIVE_STATUS
    },
    ['wait_for_documents']: {
        name: 'در انتظار تکمیل مدارک',
        id: WAIT_FOR_DOCUMENTS_STATUS
    },
    ['wait_for_exam']: {
        name: 'در انتظار آزمون',
        id: WAIT_FOR_EXAM_STATUS
    },
    ['pending']: {
        name: 'منتظر تأیید',
        id: PENDING_STATUS
    },
};

export const ROLE_STATUS = {
    ...ACTIVE_ROLE_STATUS,
    ['inactive']: {
        name: 'مسدود',
        id: INACTIVE_STATUS
    },
    ['deleted']: {
        name: 'حذف',
        id: DELETE_STATUS
    },
};

export const ACTIVE_CLIENT_ROLE_STATUS = {
    ['active']: {
        name: 'فعال',
        id: ACTIVE_STATUS
    },
};

export const CLIENT_ROLE_STATUS = {
    ...ACTIVE_CLIENT_ROLE_STATUS,
    ['inactive']: {
        name: 'مسدود',
        id: INACTIVE_STATUS
    },
};