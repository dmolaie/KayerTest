import { ProvincesPresenter, } from '@vendor/infrastructure/presenter/MainPresenter';
import { EducationDegreePresenter, } from '@services/presenter/ManageLegate';
import { EventPresenter } from '@services/presenter/EditUsers';
import AuthenticationPresenter from '@services/presenter/Authentication';

export const C_CARDS_SET_PROVINCES = 'C_CARDS_SET_PROVINCES';
export const C_CARDS_SET_BASIC_INFO = 'C_CARDS_SET_BASIC_INFO';
export const C_CARDS_SET_EVENT_LIST = 'C_CARDS_SET_EVENT_LIST';
export const C_CARDS_SET_AUTHENTICATION = 'C_CARDS_SET_AUTHENTICATION';

const CreateCards = {
    state: {
        provinces: {},
        education: {},
        events: {},
        authentication: {},
    },
    mutations: {
        [C_CARDS_SET_PROVINCES](state, { data }) {
            state.provinces = { ...new ProvincesPresenter( data ) };
        },
        [C_CARDS_SET_BASIC_INFO](state, { data: { education_degree } }) {
            state.education = { ...new EducationDegreePresenter( education_degree ) };
        },
        [C_CARDS_SET_EVENT_LIST](state, { data: { items } }) {
            state.events = { ...new EventPresenter( items ) };
        },
        [C_CARDS_SET_AUTHENTICATION](state, { data }) {
            state.authentication = { ...new AuthenticationPresenter( data ) };
        }
    }
};

export default CreateCards;