import Vue from 'vue';
import VueRouter from "vue-router";
import App from '@components/App.vue';
import routes from "./services/routes";
// import "core-js/modules/es6.promise";
// import "core-js/modules/es6.array.iterator";

Vue.config.devtools = true;

Vue.use( VueRouter );

const Routes = new VueRouter( routes );

new Vue({
    router: Routes,
    render: context => context( App )
}).$mount('#app');