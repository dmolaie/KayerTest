export const M_NEWS_SET_DATA = 'M_NEWS_SET_DATA';
import {
    ManageNewsPresenter
} from '@services/presenter/ManageNews'

const ManageNewsStore = {
    state: {
        items: {},
        pagination: {}
    },
    mutations: {
        [M_NEWS_SET_DATA](state, payload) {
            state.items = { ...new ManageNewsPresenter( payload.data.items ) };

            state.pagination = {
                ... {
                    current_page: payload.data.current_page || 1,
                    total: payload.data.total || 0,
                }
            }
        }
    }
};

export default ManageNewsStore;