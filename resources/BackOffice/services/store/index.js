import Vue from 'vue';
import Vuex from 'vuex';

import UserStore from "@services/store/Login";
import LayoutState from "@services/store/LayoutState";

const modules = {
    UserStore,
    LayoutState
};

Vue.use( Vuex );

const Store = new Vuex.Store({
    modules
});

export default Store;