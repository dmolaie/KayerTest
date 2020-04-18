import ManageCardsPresenter from '@services/presenter/ManageCards';

export const M_CARDS_SET_DATA = 'M_CARDS_SET_DATA';

const ManageCards = {
    state: {
        items: {},
        pagination: {},
    },
    mutations: {
        [M_CARDS_SET_DATA](state, { data }) {
            state.items = { ...new ManageCardsPresenter( data.items ) };
            state.pagination = {
                ... {
                    current_page: data.current_page || 1,
                    total: data.total || 0,
                }
            }
        }
    }
};

export default ManageCards;