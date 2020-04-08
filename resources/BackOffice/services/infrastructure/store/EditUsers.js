import {
    EducationDegreePresenter,
    KnowCommunityByPresenter,
    FieldOfActivitiesPresenter
} from '@services/presenter/ManageLegate';
import {
    ProvincesPresenter,
} from '@vendor/infrastructure/presenter/MainPresenter';
import UserPresenter, {
    EventPresenter
} from '@services/presenter/EditUsers';

export const E_USER_SET_DATA = 'E_USER_SET_DATA';
export const E_USER_SET_BASIC_DATA = 'E_USER_SET_BASIC_DATA';
export const E_USER_SET_PROVINCES = 'E_USER_SET_PROVINCES';
export const E_USER_SET_EVENT = 'E_USER_SET_EVENT';

const EditUser = {
    state: {
        user: {},
        education: {},
        activities: {},
        knowCommunity: {},
        provinces: {},
        event: {},
    },
    mutations: {
        [E_USER_SET_DATA]: (state, { data }) => {
            state.user = { ...new UserPresenter( data ) }
        },
        [E_USER_SET_BASIC_DATA]: (state, { data: { education_degree, field_of_activities, know_community_by } }) => {
            state.education = { ...new EducationDegreePresenter( education_degree ) };
            state.activities = { ...new FieldOfActivitiesPresenter( field_of_activities ) };
            state.knowCommunity = { ...new KnowCommunityByPresenter( know_community_by ) };
        },
        [E_USER_SET_PROVINCES](state, { data }) {
            state.provinces = { ...new ProvincesPresenter( data ) };
        },
        [E_USER_SET_EVENT](state, { data }) {
            state.event = { ...new EventPresenter( data.items ) }
        }
    }
};

export default EditUser;