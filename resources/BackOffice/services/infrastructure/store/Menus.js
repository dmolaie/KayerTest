import MenusPresenter from '@services/presenter/Menus';

export const MENUS_SET_DATA = 'MENUS_SET_DATA';

const MenusStore = {
    state: {
        items: {}
    },
    mutations: {
        [MENUS_SET_DATA](state, { data }) {
            state.items = { ...new MenusPresenter( data ) }
        }
    }
};

export default MenusStore;