import {
    NewsCategoryPresenter,
    ProvincesPresenter
} from '@services/presenter/CreateNews';

export const C_NEWS_SET_CATEGORY = 'C_NEWS_SET_CATEGORY';
export const C_NEWS_SET_PROVINCES = 'C_NEWS_SET_PROVINCES';

const CreateMenu = {
    state: {
        categories: {},
        provinces: {},
    },
    mutations: {
        [C_NEWS_SET_CATEGORY](state, payload) {
            state.categories = { ...new NewsCategoryPresenter( payload.data ) };
        },
        [C_NEWS_SET_PROVINCES](state, payload) {
            state.provinces = { ...new ProvincesPresenter( payload ) };
        }
    }
};

export default CreateMenu;