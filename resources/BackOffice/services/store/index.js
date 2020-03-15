import Vue from 'vue';
import Vuex from 'vuex';

import UserStore from "@services/store/Login";
import LayoutState from "@services/store/LayoutState";
import MenuStore from "@services/store/ManageMenu";
import CreateMenu from "@services/store/CreateNews";
import ManageNews from "@services/store/ManageNews";

const modules = {
    UserStore,
    LayoutState,
    MenuStore,
    CreateMenu,
    ManageNews
};

Vue.use( Vuex );

const Store = new Vuex.Store({
    modules
});

export default Store;