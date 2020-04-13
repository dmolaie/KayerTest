import {
    SingleEventPresenter
} from '@services/presenter/ManageEvent';
import {
    FlattenCategories,
    ProvincesPresenter,
    CategoriesPresenter
} from '@vendor/infrastructure/presenter/MainPresenter';

export const E_EVENT_SET_DATA = 'E_EVENT_SET_DATA';
export const E_EVENT_SET_PROVINCES = 'E_EVENT_SET_PROVINCES';
export const E_EVENT_SET_CATEGORIES = 'E_EVENT_SET_CATEGORIES';

const EditEvent = {
    state: {
        detail: {},
        provinces: {},
        categories: {},
    },
    mutations: {
        [E_EVENT_SET_DATA](state, { data }) {
            state.detail = { ...new SingleEventPresenter( data ) };
        },
        [E_EVENT_SET_PROVINCES](state, { data }) {
            state.provinces = { ...new ProvincesPresenter( data ) };
        },
        [E_EVENT_SET_CATEGORIES](state, { data }) {
            state.categories = { ...FlattenCategories( new CategoriesPresenter( data ) ) }
        },
    }
};

export default EditEvent;