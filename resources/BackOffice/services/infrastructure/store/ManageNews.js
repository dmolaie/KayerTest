export const M_NEWS_SET_DATA = 'M_NEWS_SET_DATA';
import {
    ManageNewsPresenter
} from '@services/presenter/ManageNews'

const ManageNewsStore = {
    state: {
        items: {}
    },
    mutations: {
        [M_NEWS_SET_DATA](state, payload) {
            state.items = { ...new ManageNewsPresenter( payload.data.items ) };
        }
    }
};

export default ManageNewsStore;