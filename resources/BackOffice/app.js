import Vue from 'vue';
import Vuex from 'vuex';
import VueRouter from "vue-router";
import VueNestable from 'vue-nestable';

import Store from "./services/store";
import Routes from "./services/routes";

import App from '@views/App.vue';
import CKEditor from '@ckeditor/ckeditor5-vue';
import General from '@vendor/plugin/general';
import Breadcrumb from '@vendor/components/breadcrumb';
import Notification from '@vendor/components/notification';

Vue.config.devtools = false;
Vue.config.productionTip = false;

// Vue.use( Vuex );
Vue.use( General );
Vue.use( CKEditor );
Vue.use( VueRouter );
Vue.use( Breadcrumb );
Vue.use( VueNestable );
Vue.use( Notification );

new Vue({
    store: Store,
    router: Routes,
    render: context => context( App )
}).$mount('#app');