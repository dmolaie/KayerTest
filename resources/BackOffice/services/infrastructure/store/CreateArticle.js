import {
    ArticleCategoryPresenter,
} from '@services/presenter/CreateArticle';

export const C_ARTICLE_SET_CATEGORY = 'C_ARTICLE_SET_CATEGORY';

const CreateArticle = {
    state: {
        categories: [],
    },
    mutations: {
        [C_ARTICLE_SET_CATEGORY](state, payload) {
            state.categories = new ArticleCategoryPresenter( payload.data );
        },
    }
};

export default CreateArticle;