import Vue from 'vue';
import Vuex from 'vuex';

import UserStore from "@services/store/Login";
import LayoutState from "@services/store/LayoutState";
import MenuStore from "@services/store/ManageMenu";
import ManageNews from "@services/store/ManageNews";
import ManageArticle from "@services/store/ManageArticle";
import MenusStore from "@services/store/Menus";

const modules = {
    UserStore,
    LayoutState,
    MenuStore,
    ManageNews,
    ManageArticle,
    MenusStore,
};

Vue.use( Vuex );

const Store = new Vuex.Store({
    modules
});

export default Store;