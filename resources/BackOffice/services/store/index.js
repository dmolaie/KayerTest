import Vue from 'vue';
import Vuex from 'vuex';

import UserStore from "@services/store/Login";
import LayoutState from "@services/store/LayoutState";
import MenuStore from "@services/store/ManageMenu";
import CreateMenu from "@services/store/CreateNews";
import ManageNews from "@services/store/ManageNews";
import CreateArticle from "@services/store/CreateArticle";
import ManageArticle from "@services/store/ManageArticle";

const modules = {
    UserStore,
    LayoutState,
    MenuStore,
    CreateMenu,
    ManageNews,
    CreateArticle,
    ManageArticle,
};

Vue.use( Vuex );

const Store = new Vuex.Store({
    modules
});

export default Store;