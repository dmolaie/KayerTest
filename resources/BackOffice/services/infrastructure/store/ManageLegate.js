import ManageLegatePresenter, {
    EducationDegreePresenter,
    FieldOfActivitiesPresenter,
    RolesPresenter,
    UserRolesPresenter,
    SingleLegatePresenter
} from '@services/presenter/ManageLegate';
import {
    UserRolePresenter, UserPermissionPresenter
} from '@vendor/infrastructure/presenter/MainPresenter';

export const M_LEGATE_SET_DATA = 'M_LEGATE_SET_DATA';
export const M_LEGATE_SET_ROLES = 'M_LEGATE_SET_ROLES';
export const M_LEGATE_SET_USER_ROLES = 'M_LEGATE_SET_USER_ROLES';
export const M_USER_SET_BASIC_DATA = 'M_USER_SET_BASIC_DATA';
export const M_MANAGE_USER_ROLE = 'M_MANAGE_USER_ROLE';
export const M_MANAGE_USER_PERMISSION = 'M_MANAGE_USER_PERMISSION';

const ManageLegate = {
    state: {
        items: {},
        roles: {},
        userRole: {},
        pagination: {},
        education: {},
        activities: {},
        permissions: {
            user: {},
            list: {}
        }
    },
    mutations: {
        [M_LEGATE_SET_DATA](state, { data }) {
            state.items = { ...new ManageLegatePresenter( data.items ) };
            state.pagination = {
                ... {
                    current_page: data.current_page || 1,
                    total: data.total || 0,
                }
            }
        },
        [M_USER_SET_BASIC_DATA]: (state, { data: { education_degree, field_of_activities } }) => {
            state.education = { ...new EducationDegreePresenter( education_degree ) };
            state.activities = { ...new FieldOfActivitiesPresenter( field_of_activities ) };
        },
        [M_LEGATE_SET_ROLES](state, { data }) {
            state.roles = { ...new RolesPresenter( data ) };
        },
        [M_LEGATE_SET_USER_ROLES](state, { data }) {
            state.userRole = { ...new UserRolesPresenter( data ) };
        },
        [M_MANAGE_USER_ROLE](state, { data }) {
            const DATA = Object.values( state.items );
            const FIND_ITEM = DATA.find(({ id }) => id === data.id );
            if ( !!FIND_ITEM ) Object.assign(FIND_ITEM, new SingleLegatePresenter( data ));
            state.userRole = { ...new UserRolesPresenter( data.roles ) };
            state.items = { ...DATA };
        },
        [M_MANAGE_USER_PERMISSION](state, { data: { user, list } }) {
            console.log('getUserPermission: ',new UserPermissionPresenter(list));
            state.permissions.list = { ...new UserPermissionPresenter(list) }
        }
    }
};

export default ManageLegate;