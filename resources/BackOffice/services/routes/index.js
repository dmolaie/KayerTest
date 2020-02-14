import VueRouter from "vue-router";

export const LOGIN = 'LOGIN';
export const DASHBOARD = 'DASHBOARD';
export const NOT_FOUND = 'NOT_FOUND';

const GetViews = component => () =>
    import(
        /* webpackChunkName: "[request]" */
        `@components/${component}.vue`
    );

const Routes = new VueRouter({
    mode: "hash",
    base: '/admin',
    routes: [
        {
            name: DASHBOARD,
            path: '/',
            component: GetViews('Dashboard' ),
            metaTags: {
                title: 'داشبورد',
            }
        },
        {
            name: LOGIN,
            path: '/login',
            component: GetViews( 'Login'),
            metaTags: {
                title: 'ورود به حساب کاربری',
                requiresAuth: false
            }
        },
        {
            name: NOT_FOUND,
            path: '/*',
            component: GetViews('NotFound' ),
            metaTags: {
                title: 'صفحه مورد نظر پیدا نشد',
                requiresAuth: false
            }
        }
    ]
});
// permission
export default Routes;