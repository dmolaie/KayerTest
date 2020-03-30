import ManageLegatePresenter from '@services/presenter/ManageLegate';

export const M_LEGATE_SET_DATA = 'M_LEGATE_SET_DATA';

const ManageLegate = {
    state: {
        items: {},
        pagination: {}
    },
    mutations: {
        [M_LEGATE_SET_DATA](state, { data }) {
            console.log(new ManageLegatePresenter(data.items));
            state.items = { ...new ManageLegatePresenter( data.items ) };
            state.pagination = {
                ... {
                    current_page: data.current_page || 1,
                    total: data.total || 0,
                }
            }
        }
    }
};

export default ManageLegate;