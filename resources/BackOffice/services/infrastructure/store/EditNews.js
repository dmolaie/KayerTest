import {
    NewsItemPresenter,
} from '@services/presenter/EditNews';
import {
    ProvincesPresenter,
    CategoriesPresenter,
} from '@vendor/infrastructure/presenter/MainPresenter';

export const E_NEWS_SET_DATA = 'E_NEWS_SET_DATA';
export const E_NEWS_SET_PROVINCES = 'E_NEWS_SET_PROVINCES';
export const E_NEWS_SET_CATEGORIES = 'E_NEWS_SET_CATEGORIES';

const EditNewsStore = {
    state: {
        detail: {},
        categories: {},
        provinces: {}
    },
    mutations: {
        [E_NEWS_SET_DATA](state, payload) {
            state.detail = { ...new NewsItemPresenter( payload ) };
        },
        [E_NEWS_SET_CATEGORIES](state, { data }) {
            state.categories = { ...new CategoriesPresenter( data ) }
        },
        [E_NEWS_SET_PROVINCES](state, { data }) {
            state.provinces = { ...new ProvincesPresenter( data ) };
        },
    }
};

export default EditNewsStore;