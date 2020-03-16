import {
    MenuPresenter,
    MenuTypePresenter,
    SingleMenuPresenter
} from '@services/presenter/ManageMenu';

export const MENU_SET_DATA = 'MENU_SET_DATA';
export const MENU_SET_TYPE_DATA = 'MENU_SET_TYPE_DATA';
export const MENU_UPDATE_DATA = 'MENU_UPDATE_DATA';
export const MENU_ADD_ITEM = 'MENU_ADD_ITEM';

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
            console.log(new MenuPresenter(payload.data));
        },
        [MENU_UPDATE_DATA](state, payload) {
            state.menuItem = payload;
        },
        [MENU_SET_TYPE_DATA](state, payload) {
            state.menuType = { ...new MenuTypePresenter( payload ) }
        },
        [MENU_ADD_ITEM](state, payload) {
            state.menuItem.push(
                new SingleMenuPresenter( payload.data )
            );
        }
    }
};

export default MenuStore;