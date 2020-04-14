import ManageLegatePresenter, {
    EducationDegreePresenter,
    FieldOfActivitiesPresenter,
    RolesPresenter,
    UserRolesPresenter
} from '@services/presenter/ManageLegate';
import {
    UserRolePresenter
} from '@vendor/infrastructure/presenter/MainPresenter';

export const M_LEGATE_SET_DATA = 'M_LEGATE_SET_DATA';
export const M_LEGATE_SET_USER_ROLES = 'M_LEGATE_SET_USER_ROLES';
export const M_USER_SET_BASIC_DATA = 'M_USER_SET_BASIC_DATA';
export const M_MANAGE_USER_ROLE = 'M_MANAGE_USER_ROLE';

const ManageLegate = {
    state: {
        items: {},
        roles: {},
        userRole: {},
        pagination: {},
        education: {},
        activities: {}
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
        [M_LEGATE_SET_USER_ROLES](state, {data: { user_role_ids, roles }}) {
            let rrr = [
                {id: 8, type: "legate", status: "active"},
                {id: 9, type: "legate", status: "active"},
                {id: 10,type: "legate", status: "active"},
                {id: 7, type: "legate", status: "active"},
                {id: 6, type: "legate", status: "active"},
                {id: 5, type: "legate", status: "deleted"},
            ];
            // console.log(new UserRolesPresenter(rrr));
            state.userRole = { ...new UserRolesPresenter( rrr ) };
            state.roles = { ...new RolesPresenter( roles ) };
        },
        [M_MANAGE_USER_ROLE](state, { data: { id: user_id, roles} }) {
            const USER_ROLES = new UserRolePresenter( roles );
            state.roles.user_role = [...USER_ROLES.map(({ id }) => id)];
            const DATA = Object.values( state.items );
            const FIND_ITEM = DATA.find(({ id }) => id === user_id);
            if ( !!FIND_ITEM ) FIND_ITEM.roles = [...USER_ROLES];
            state.items = { ...DATA };
            // console.log(state.roles.user_role);
        }
    }
};

export default ManageLegate;