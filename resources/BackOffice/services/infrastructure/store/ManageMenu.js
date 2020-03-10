import MenuPresenter from '@services/presenter/ManageMenu';

export const MENU_SET_DATE = 'MENU_SET_DATE';

const MenuStore = {
    state: {},
    mutations: {
        [MENU_SET_DATE](state, payload) {
            Object.assign(state, new MenuPresenter( payload ));
            console.log(state);
        }
    }
};

export default MenuStore;