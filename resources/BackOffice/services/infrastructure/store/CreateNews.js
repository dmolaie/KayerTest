import {
    FlattenCategories,
    ProvincesPresenter,
    CategoriesPresenter
} from '@vendor/infrastructure/presenter/MainPresenter';

export const C_NEWS_SET_CATEGORY = 'C_NEWS_SET_CATEGORY';
export const C_NEWS_SET_PROVINCES = 'C_NEWS_SET_PROVINCES';

const CreateMenu = {
    state: {
        categories: {},
        provinces: {},
    },
    mutations: {
        [C_NEWS_SET_CATEGORY](state, { data }) {
            state.categories = { ...FlattenCategories( new CategoriesPresenter( data ) ) }
        },
        [C_NEWS_SET_PROVINCES](state, { data }) {
            state.provinces = { ...new ProvincesPresenter( data ) };
        }
    },
};

export default CreateMenu;