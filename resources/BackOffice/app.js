import Vue from 'vue';
import Vuex from 'vuex';
import VueRouter from "vue-router";

import Store from "./services/store";
import Routes from "./services/routes";

import App from '@components/App.vue';
import General from '@vendor/plugin/general';
import Notification from '@vendor/components/notification';

Vue.config.devtools = false;
Vue.config.productionTip = false;

// Vue.use( Vuex );
Vue.use( General );
Vue.use( VueRouter );
Vue.use( Notification );

new Vue({
    store: Store,
    router: Routes,
    render: context => context( App )
}).$mount('#app');