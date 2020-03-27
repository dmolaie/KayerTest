import {
    FlattenCategories,
    CategoriesPresenter,
} from '@vendor/infrastructure/presenter/MainPresenter';

export const C_ARTICLE_SET_CATEGORY = 'C_ARTICLE_SET_CATEGORY';

const CreateArticle = {
    state: {
        categories: {},
    },
    mutations: {
        [C_ARTICLE_SET_CATEGORY](state, { data }) {
            state.categories = { ...FlattenCategories( new CategoriesPresenter( data ) ) };
        },
    }
};

export default CreateArticle;