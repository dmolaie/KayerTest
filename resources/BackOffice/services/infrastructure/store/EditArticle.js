import {
    FlattenCategories,
    CategoriesPresenter,
} from '@vendor/infrastructure/presenter/MainPresenter';
import ArticleItemPresenter from '@services/presenter/EditArticle';

export const E_ARTICLE_SET_DATA = 'E_ARTICLE_SET_DATA';
export const E_ARTICLE_SET_CATEGORIES = 'E_ARTICLE_SET_CATEGORIES';

const EditArticle = {
    state: {
        detail: {},
        categories: {}
    },
    mutations: {
        [E_ARTICLE_SET_DATA](state, payload) {
            state.detail = { ... new ArticleItemPresenter( payload ) };
        },
        [E_ARTICLE_SET_CATEGORIES](state, { data }) {
            state.categories = { ...FlattenCategories( new CategoriesPresenter( data ) ) }
        },
    }
};

export default EditArticle;