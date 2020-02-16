import VueRouter from "vue-router";
import Store from './../store';
import {
    GET_USER_HAS_ACCESS
} from '@services/store/Login';

const APP_NAME = 'اهدا | ';

export const LOGIN = 'LOGIN';
export const LOGOUT = 'LOGOUT';
export const DASHBOARD = 'DASHBOARD';
export const NOT_FOUND = 'NOT_FOUND';

export const DASHBOARD_PAGE_TITLE = 'داشبورد';
export const LOGIN_PAGE_TITLE = 'ورود به حساب کاربری';

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
            meta: {
                title: 'داشبورد',
            }
        },
        {
            name: LOGIN,
            path: '/login',
            component: GetViews( 'Login'),
            meta: {
                title: LOGIN_PAGE_TITLE,
                guess: true
            }
        },
        {
            name: LOGOUT,
            path: '/logout',
            component: GetViews( 'Logout'),
            meta: {
                guess: true,
                title: 'خروج از حساب کاربری',
            }
        },
        {
            name: NOT_FOUND,
            path: '/*',
            component: GetViews('NotFound' ),
            meta: {
                guess: true,
                title: 'صفحه مورد نظر پیدا نشد',
            }
        }
    ]
});

const SetPageTitle = title => {
    try {
        document.title = !!title ? ( APP_NAME + title ) : APP_NAME;
    } catch (e) {}
};

Routes.beforeEach(
    (to, from, next) => {
        let routeTitle = to.meta?.title,
            isGuessRoute = to.meta?.guess;

        SetPageTitle( routeTitle );

        if ( !isGuessRoute ) {
            if ( Store?.getters['GET_USER_HAS_ACCESS'] ) {
                next()
            } else {
                next({ name: LOGIN });
                SetPageTitle( LOGIN_PAGE_TITLE );
            }
        } else {
            if ( Store?.getters['GET_USER_HAS_ACCESS'] && to.name === LOGIN ) {
                next({ name: DASHBOARD });
                SetPageTitle( DASHBOARD_PAGE_TITLE );
            } else {
                next()
            }
        }
    }
);

export default Routes;