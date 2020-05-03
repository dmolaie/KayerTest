import {
    FlattenCategories,
    CategoriesPresenter
} from '@vendor/infrastructure/presenter/MainPresenter';

export const M_CATEGORY_SET_DATA = 'M_CATEGORY_SET_DATA';

const ManageCategory = {
    state: {
        items: {},
    },
    mutations: {
        [M_CATEGORY_SET_DATA](state, { data }) {
            state.items = { ...FlattenCategories( new CategoriesPresenter( data ) ) };
        }
    }
};

export default ManageCategory;