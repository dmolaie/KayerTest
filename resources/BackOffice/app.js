import Vue from 'vue';
import VueRouter from "vue-router";
import routes from "./services/routes";
import App from '@components/App.vue';
import Notification from '@vendor/components/notification';

Vue.config.devtools = true;

Vue.use( VueRouter );
Vue.use( Notification );

const Routes = new VueRouter( routes );

new Vue({
    router: Routes,
    render: context => context( App )
}).$mount('#app');