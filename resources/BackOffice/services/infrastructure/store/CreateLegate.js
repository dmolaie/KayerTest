import { EventPresenter } from '@services/presenter/EditUsers';
import AuthenticationPresenter from '@services/presenter/Authentication';
import { ProvincesPresenter, } from '@vendor/infrastructure/presenter/MainPresenter';
import {
    EducationDegreePresenter,
    KnowCommunityByPresenter,
    FieldOfActivitiesPresenter
} from '@services/presenter/ManageLegate';

export const C_LEGATE_SET_PROVINCES = 'C_LEGATE_SET_PROVINCES';
export const C_LEGATE_SET_BASIC_INFO = 'C_LEGATE_SET_BASIC_INFO';
export const C_LEGATE_SET_EVENT_LIST = 'C_LEGATE_SET_EVENT_LIST';
export const C_LEGATE_SET_AUTHENTICATION = 'C_LEGATE_SET_AUTHENTICATION';

const CreateLegate = {
    state: {
        events: {},
        provinces: {},
        education: {},
        activities: {},
        knowCommunity: {},
        authentication: {},
    },
    mutations: {
        [C_LEGATE_SET_EVENT_LIST](state, { data: { items } }) {
            state.events = { ...new EventPresenter( items ) };
        },
        [C_LEGATE_SET_PROVINCES](state, { data }) {
            state.provinces = { ...new ProvincesPresenter( data ) };
        },
        [C_LEGATE_SET_BASIC_INFO](state, { data: { education_degree, field_of_activities, know_community_by } }) {
            state.education = { ...new EducationDegreePresenter( education_degree ) };
            state.activities = { ...new FieldOfActivitiesPresenter( field_of_activities ) };
            state.knowCommunity = { ...new KnowCommunityByPresenter( know_community_by ) };

        },
        [C_LEGATE_SET_AUTHENTICATION](state, { data }) {
            state.authentication = { ...new AuthenticationPresenter( data ) };
        }
    }
};

export default CreateLegate;