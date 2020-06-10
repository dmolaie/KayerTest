import ManageCardsPresenter from '@services/presenter/ManageCards';

export const PRINT_SET_DATA = "PRINT_SET_DATA";

const PrintCardsStore = {
    state: {
        items: {}
    },
    mutations: {
        [PRINT_SET_DATA](state, { data: { items } }) {
            state.items = { ...new ManageCardsPresenter( items ) }
        }
    }
};

export default PrintCardsStore;