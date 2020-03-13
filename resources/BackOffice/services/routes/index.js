import VueRouter from "vue-router";
import Store from './../store';
import {
    GET_USER_HAS_ACCESS,
    GET_IS_USER_LOGGED_IN
} from '@services/store/Login';

const APP_NAME = 'اهدا | ';

export const LOGIN = 'LOGIN';
export const LOGOUT = 'LOGOUT';
export const DASHBOARD = 'DASHBOARD';
export const MANAGE_MENU = 'MANAGE_MENU';
export const MANAGE_NEWS = 'MANAGE_NEWS';
export const CREATE_NEWS = 'CREATE_NEWS';
export const PROFILE = 'PROFILE';
export const NOT_FOUND = 'NOT_FOUND';

export const DASHBOARD_PAGE_TITLE = 'داشبورد';
export const LOGIN_PAGE_TITLE = 'ورود به حساب کاربری';

const GetViews = component => () =>
    import(
        /* webpackChunkName: "[request]" */
        `@views/${component}.vue`
    );

const Routes = new VueRouter({
    mode: "hash",
    base: '/user',
    scrollBehavior: () => ({ y: 0 }),
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
            name: MANAGE_NEWS,
            path: '/manage/news',
            component: GetViews('ManageNews' ),
            meta: {
                title: 'ایجاد خبر',
                breadcrumb: [
                    {
                        route: DASHBOARD,
                        name: 'انجمن اهدای عضو ایرانیان',
                    },
                    {
                        name: 'اخبار'
                    },
                    {
                        name: 'مدیریت'
                    }
                ]
            }
        },
        {
            name: CREATE_NEWS,
            path: '/manage/news/create',
            component: GetViews('CreateNews' ),
            meta: {
                title: 'ایجاد خبر',
                breadcrumb: [
                    {
                        route: DASHBOARD,
                        name: 'انجمن اهدای عضو ایرانیان',
                    },
                    {
                        route: MANAGE_NEWS,
                        name: 'اخبار'
                    },
                    {
                        name: 'افزودن'
                    }
                ]
            }
        },
        {
            name: MANAGE_MENU,
            path: '/manage/menu',
            component: GetViews('ManageMenu' ),
            meta: {
                title: 'مدیریت منو',
                breadcrumb: [
                    {
                        route: DASHBOARD,
                        name: 'انجمن اهدای عضو ایرانیان',
                    },
                    {
                        name: 'مدیریت منو'
                    },
                ]
            }
        },
        {
            name: LOGIN,
            path: '/login',
            component: GetViews( 'Login'),
            meta: {
                guess: true,
                title: LOGIN_PAGE_TITLE
            }
        },
        {
            name: PROFILE,
            path: '/profile',
            component: GetViews( 'Profile'),
            meta: {
                title: 'پروفایل',
                guess: true
            }
        },
        {
            name: LOGOUT,
            path: '/logout',
            component: GetViews( 'Logout'),
            meta: {
                title: 'خروج از حساب کاربری',
                guess: true,
            }
        },
        {
            name: NOT_FOUND,
            path: '/*',
            component: GetViews('NotFound' ),
            meta: {
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
            if ( Store?.getters[GET_USER_HAS_ACCESS] ) {
                next()
            } else {
                ( Store?.getters[GET_IS_USER_LOGGED_IN] ) ? (
                    next({ name: PROFILE })
                ) : (
                    next({ name: LOGIN })
                );
                SetPageTitle( LOGIN_PAGE_TITLE );
            }
        } else {
            if ( Store?.getters[GET_USER_HAS_ACCESS] && to.name === LOGIN ) {
                next({ name: DASHBOARD });
                SetPageTitle( DASHBOARD_PAGE_TITLE );
            } else {
                next()
            }
        }
    }
);

export default Routes;