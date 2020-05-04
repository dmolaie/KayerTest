import {
    FlattenCategories,
    CategoriesPresenter
} from '@vendor/infrastructure/presenter/MainPresenter';

export const C_CATEGORY_SET_DATA = "C_CATEGORY_SET_DATA";

const CreateCategory = {
    state: {
        items: {},
    },
    mutations: {
        [C_CATEGORY_SET_DATA](state, { data }) {
            state.items = { ...FlattenCategories( new CategoriesPresenter( data ) ) };
        }
    }
};

export default CreateCategory;