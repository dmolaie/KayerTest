export const M_ARTICLE_SET_DATA = 'M_ARTICLE_SET_DATA';
export const M_ARTICLE_UPDATE_DATA = 'M_ARTICLE_UPDATE_DATA';
import {
    ManageArticlePresenter
} from '@services/presenter/ManageArticle'

const ManageArticle = {
    state: {
        items: {},
        pagination: {}
    },
    mutations: {
        [M_ARTICLE_SET_DATA](state, payload) {
            state.items = { ...new ManageArticlePresenter( payload.data.items ) };

            state.pagination = {
                ... {
                    current_page: payload.data.current_page || 1,
                    total: payload.data.total || 0,
                }
            }
        },
        [M_ARTICLE_UPDATE_DATA](state, payload) {
            state.items = { ...[] };
            state.items = { ...payload };
        }
    }
};

export default ManageArticle;