import {
    FlattenCategories,
    ProvincesPresenter,
    CategoriesPresenter
} from '@vendor/infrastructure/presenter/MainPresenter';

export const C_EVENT_SET_PROVINCES = 'C_EVENT_SET_PROVINCES';
export const C_EVENT_SET_CATEGORIES = 'C_EVENT_SET_CATEGORIES';

const CreateEvent = {
    state: {
        provinces: {},
        categories: {},
    },
    mutations: {
        [C_EVENT_SET_PROVINCES](state, { data }) {
            state.provinces = { ...new ProvincesPresenter( data ) };
        },
        [C_EVENT_SET_CATEGORIES](state, { data }) {
            state.categories = { ...FlattenCategories( new CategoriesPresenter( data ) ) }
        }
    }
};

export default CreateEvent;