import Vue from 'vue';
import Vuex from 'vuex';

import UserStore from "@services/store/Login";
import LayoutState from "@services/store/LayoutState";
import MenuStore from "@services/store/ManageMenu";

const modules = {
    UserStore,
    LayoutState,
    MenuStore
};

Vue.use( Vuex );

const Store = new Vuex.Store({
    modules
});

export default Store;