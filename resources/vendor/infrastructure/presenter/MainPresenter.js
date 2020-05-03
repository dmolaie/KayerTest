import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter';
import {
    HasLength, CopyOf
} from "@vendor/plugin/helper";
import {
    ADMIN, MANAGER, LEGATE, CLIENT,
    ROLE_STATUS, ACTIVE_STATUS, PENDING_STATUS, INACTIVE_STATUS,
    DELETE_STATUS, WAIT_FOR_DOCUMENTS_STATUS, WAIT_FOR_EXAM_STATUS,
} from '@services/service/Roles';

export class ImagesPresenter {
    constructor( images ) {
        return (!!images && HasLength( images )) ? (
            images.map( image => new ImagePresenter( image ) )
        ) : ([])
    }
}

export class ImagePresenter extends BasePresenter {
    constructor( data ) {
        super( data );
        this.data = data;

        return this.mapProps({
            id: Number,
            path: String,
        })
    }

    id() {
        return this.data.image_id
    }

    path() {
        return (
            '/' + this.data.path
        )
    }
}

export class ProvincesPresenter {
    constructor( provinces ) {
        return (!!provinces && HasLength( provinces )) ? (
            Object.values( provinces )
                .map(province => new ProvincePresenter( province ))
        ) : ([])
    }
}

export class ProvincePresenter extends BasePresenter {
    constructor( province ) {
        super( province );
        this.data = province;

        return this.mapProps({
            id: Number,
            name: String,
            slug: String,
        })
    }

    id() {
        return this.data.id
    }

    name() {
        return this.data.name
    }

    slug() {
        return this.data.slug
    }
}

export class SelectedCategoriesPresenter {
    constructor( categories ) {
        return (!!categories && HasLength( categories )) ? (
            categories
                .map(category => new SelectedCategoryPresenter( category ))
                .sort((a, b) => +(b.is_main) - +(a.is_main))
        ) : ([])
    }
}

export class SelectedCategoryPresenter extends BasePresenter {
    constructor( category ) {
        super( category );
        this.data = category;

        return this.mapProps({
            id: Number,
            name_en: String,
            name_fa: String,
            is_main: Boolean,
        })
    }

    id() {
        return this.data.id
    }

    name_en() {
        return this.data.name_en
    }

    name_fa() {
        return this.data.name_fa
    }

    is_main() {
        return this.data.is_main
    }
}

export class CategoriesPresenter {
    constructor( categories ) {
        return ( !!categories && HasLength( categories ) ) ? (
            categories.map(category => new CategoryPresenter( category ))
        ) : ([])
    }
}

export class CategoryPresenter extends BasePresenter {
    constructor( item ) {
        super( item );
        this.data = item;

        return this.mapProps({
            id: Number,
            name_en: String,
            name_fa: String,
            type: String,
            is_active: Boolean,
            children: Array,
            children_ids: Array,
        })
    }

    id() {
        return this.data.id;
    }

    name_en() {
        return this.data.name_en
    }

    name_fa() {
        return this.data.name_fa
    }

    type() {
        return this.data.type
    }

    is_active() {
        return this.data.is_active
    }

    children() {
        return new CategoriesPresenter( this.data.children )
    }

    children_ids() {
        const { children } = this.data;
        return !!children && HasLength( children ) ? (
            children.map(({ id }) => id)
        ) : ([])
    }
}

export const FlattenCategories = ( payload = [], gap = 0, parent_id = 0 ) => {
    return payload.reduce((flatArray, item) => {
        const ITEM = CopyOf( item );
        delete ITEM.children;
        HasLength( item.children ) ? (
            flatArray.push({
                ...ITEM,
                parent_id,
                gap: ( gap * 16 )
            }, ...FlattenCategories( item.children, gap + 1, item.id ) )
        ) : flatArray.push({
            ... ITEM,
            parent_id,
            gap: ( gap * 16 )
        });
        return flatArray;
    }, [])
};

export class UserRolePresenter {
    constructor( payload ) {
        return (!!payload && HasLength(payload)) ? (
            payload.map(item => new RolePresenter( item ))
        ) : ([])
    }
}

export const PERMISSION_FA_KEY = {
    ['news']: 'اخبار',
    ['event']: 'رویدادها',
    ['article']: 'صفحات ایستا',
};

export class RolePresenter extends BasePresenter {
    constructor( data ) {
        super( data );
        this.data = data;

        return this.mapProps({
            id: Number,
            name: String,
            label: String,
            status: String,
            status_fa: String,
            is_active: Boolean,
            is_pending: Boolean,
            is_inactive: Boolean,
            is_deleted: Boolean,
            is_wait_document: Boolean,
            is_wait_exam: Boolean,
            is_admin: Boolean,
            is_manage: Boolean,
            is_legate: Boolean,
            is_client: Boolean,
        })
    }

    id() {
        return this.data?.id || 0
    }

    name() {
        return this.data.name || ''
    }

    label() {
        return this.data.label || ''
    }

    status() {
        return this.data.status
    }

    status_fa() {
        return ROLE_STATUS[this.data.status]?.name || ''
    }

    is_active() {
        return this.data.status === ACTIVE_STATUS
    }

    is_pending() {
        return this.data.status === PENDING_STATUS
    }

    is_inactive() {
        return this.data.status === INACTIVE_STATUS
    }

    is_deleted() {
        return this.data.status === DELETE_STATUS
    }

    is_wait_document() {
        return this.data.status === WAIT_FOR_DOCUMENTS_STATUS
    }

    is_wait_exam() {
        return this.data.status === WAIT_FOR_EXAM_STATUS
    }

    is_admin() {
        return this.data.type === ADMIN
    }

    is_manage() {
        return this.data.type === MANAGER
    }

    is_legate() {
        return this.data.type === LEGATE
    }

    is_client() {
        return this.data.type === CLIENT
    }
}

export class UserPermissionPresenter {
    constructor( data ) {
        return !!data && HasLength( data ) ? (
            Object.entries( data ).reduce((permission, [key, val]) => {
                permission[key] = {
                    name: PERMISSION_FA_KEY[key] || '',
                    items: val.map(item => new SingleUserPermissionPresenter( item )),
                };
                return permission;
            }, {})
        ) : ({})
    }
}

export class SingleUserPermissionPresenter extends BasePresenter {
    constructor( data ) {
        super( data );
        this.item = data;

        return this.mapProps({
            id: Number,
            name_en: String,
            name_fa: String,
        })
    }

    id() {
        return this.item.id
    }

    name_en() {
        return this.item.name || ''
    }

    name_fa() {
        return this.item.label || ''
    }
}