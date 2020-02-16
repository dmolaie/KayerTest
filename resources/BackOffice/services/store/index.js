import Vue from 'vue';
import Vuex from 'vuex';

import UserStore from "@services/store/Login";

const modules = {
    UserStore
};

Vue.use( Vuex );

const Store = new Vuex.Store({
    modules
});

export default Store;