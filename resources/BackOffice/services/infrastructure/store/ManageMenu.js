import MenuPresenter from '@services/presenter/ManageMenu';

export const MENU_SET_DATE = 'MENU_SET_DATE';

const MenuStore = {
    state: {
        menuItem: {}
    },
    mutations: {
        [MENU_SET_DATE](state, payload) {
            Object.assign(state.menuItem, new MenuPresenter( payload?.data ));
        }
    }
};

export default MenuStore;