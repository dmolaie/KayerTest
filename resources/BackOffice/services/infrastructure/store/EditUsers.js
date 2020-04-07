import {
    EducationDegreePresenter,
    KnowCommunityByPresenter,
    FieldOfActivitiesPresenter
} from '@services/presenter/ManageLegate';
import {
    ProvincesPresenter,
} from '@vendor/infrastructure/presenter/MainPresenter';
import UserPresenter from '@services/presenter/EditUsers';

export const E_USER_SET_DATA = 'E_USER_SET_DATA';
export const E_USER_SET_BASIC_DATA = 'E_USER_SET_BASIC_DATA';
export const E_USER_SET_PROVINCES = 'E_USER_SET_PROVINCES';

const EditUser = {
    state: {
        user: {},
        education: {},
        activities: {},
        knowCommunity: {},
        provinces: {},
    },
    mutations: {
        [E_USER_SET_DATA]: (state, { data }) => {
            console.log('data: ', data);
            state.user = { ...new UserPresenter( data ) }
        },
        [E_USER_SET_BASIC_DATA]: (state, { data: { education_degree, field_of_activities, know_community_by } }) => {
            state.education = { ...new EducationDegreePresenter( education_degree ) };
            state.activities = { ...new FieldOfActivitiesPresenter( field_of_activities ) };
            state.knowCommunity = { ...new KnowCommunityByPresenter( know_community_by ) };
        },
        [E_USER_SET_PROVINCES](state, { data }) {
            state.provinces = { ...new ProvincesPresenter( data ) };
        }
    }
};

export default EditUser;