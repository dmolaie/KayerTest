import {
    MenuPresenter,
    MenuTypePresenter
} from '@services/presenter/ManageMenu';

export const MENU_SET_DATA = 'MENU_SET_DATA';
export const MENU_SET_TYPE_DATA = 'MENU_SET_TYPE_DATA';
export const MENU_UPDATE_DATA = 'MENU_UPDATE_DATA';

const MenuStore = {
    state: {
        menuItem: {},
        menuType: {}
    },
    actions: {
        updateElements: async ({commit}, payload) => {
            commit(MENU_UPDATE_DATA, payload);
        }
    },
    mutations: {
        [MENU_SET_DATA](state, payload) {
            state.menuItem = new MenuPresenter( payload.data );
        },
        [MENU_UPDATE_DATA](state, payload) {
            state.menuItem = payload;
        },
        [MENU_SET_TYPE_DATA](state, payload) {
            state.menuType = { ...new MenuTypePresenter( payload ) }
        }
    }
};

export default MenuStore;