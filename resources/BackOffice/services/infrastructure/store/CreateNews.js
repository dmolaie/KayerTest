import {
    NewsCategoryPresenter
} from '@services/presenter/CreateNews';

export const C_NEWS_SET_CATEGORY = 'C_NEWS_SET_CATEGORY';

const CreateMenu = {
    state: {
        categories: {}
    },
    mutations: {
        [C_NEWS_SET_CATEGORY](state, payload) {
            Object.assign(state.categories, new NewsCategoryPresenter( payload?.data ));
        }
    }
};

export default CreateMenu;