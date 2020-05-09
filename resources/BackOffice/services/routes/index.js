import VueRouter from "vue-router";
import Store from './../store';
import {
    UPDATE_USER,
    GET_USER_HAS_ACCESS,
    GET_IS_USER_LOGGED_IN,
} from '@services/store/Login';
import { GALLERY_TYPE } from '@services/service/ManageGallery';
import Endpoint from "@endpoints";
import TokenService from '@services/service/Token';
import HTTPService from "@vendor/plugin/httpService";

const APP_NAME = 'اهدا | ';

export const LOGIN = 'LOGIN';
export const LOGOUT = 'LOGOUT';
export const DASHBOARD = 'DASHBOARD';
export const MANAGE_EVENT = 'MANAGE_EVENT';
export const CREATE_EVENT = 'CREATE_EVENT';
export const EDIT_EVENT   = 'EDIT_EVENT';
export const MANAGE_MENU = 'MANAGE_MENU';
export const MANAGE_NEWS = 'MANAGE_NEWS';
export const CREATE_NEWS = 'CREATE_NEWS';
export const EDIT_NEWS   = 'EDIT_NEWS';
export const MANAGE_ARTICLE = 'MANAGE_ARTICLE';
export const CREATE_ARTICLE = 'CREATE_ARTICLE';
export const EDIT_ARTICLE   = 'EDIT_ARTICLE';
export const MANAGE_LEGATE = 'MANAGE_LEGATE';
export const CREATE_LEGATE = 'CREATE_LEGATE';
export const EDIT_USERS = 'EDIT_USERS';
export const PROFILE = 'PROFILE';
export const MANAGE_CARDS = 'MANAGE_CARDS';
export const CREATE_CARDS = 'CREATE_CARDS';
export const USER_SETTING = 'USER_SETTING';
export const MANAGE_REPORT = 'MANAGE_REPORT';
export const MANAGE_GALLERY = 'MANAGE_GALLERY';
export const CREATE_GALLERY = 'CREATE_GALLERY';
export const EDIT_GALLERY = 'EDIT_GALLERY';
export const MANAGE_CATEGORY = 'MANAGE_CATEGORY';
export const CREATE_CATEGORY = 'CREATE_CATEGORY';
export const NOT_FOUND = 'NOT_FOUND';

export const DASHBOARD_PAGE_TITLE = 'داشبورد';
export const LOGIN_PAGE_TITLE = 'ورود به حساب کاربری';

const GetViews = component => () =>
    import(/* webpackChunkName: "[request]" */ `@views/${component}.vue`);

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
            name: LOGIN,
            path: '/login',
            component: GetViews( 'Login'),
            meta: {
                guess: true,
                title: LOGIN_PAGE_TITLE
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
            name: USER_SETTING,
            path: '/account',
            component: GetViews('UserSettings'),
            meta: {
                title: 'تنظیمات حساب',
                breadcrumb: [
                    {
                        route: DASHBOARD,
                        name: 'انجمن اهدای عضو ایرانیان',
                    },
                    {
                        name: 'تنظیمات حساب'
                    },
                ]
            }
        },
        {
            name: MANAGE_NEWS,
            path: '/manage/news',
            component: GetViews('ManageNews' ),
            meta: {
                title: 'اخبار',
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
            path: '/manage/news/:lang(fa|en)/create/:parent_id(\\d+)?',
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
            name: EDIT_NEWS,
            path: '/manage/news/:lang(fa|en)/edit/:id(\\d+)',
            component: GetViews('EditNews' ),
            meta: {
                title: 'ویرایش اخبار',
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
                        name: 'ویرایش'
                    }
                ]
            },
        },
        {
            name: MANAGE_EVENT,
            path: '/manage/event',
            component: GetViews('ManageEvent' ),
            meta: {
                title: 'رویدادها',
                breadcrumb: [
                    {
                        route: DASHBOARD,
                        name: 'انجمن اهدای عضو ایرانیان',
                    },
                    {
                        name: 'رویدادها'
                    },
                    {
                        name: 'مدیریت'
                    }
                ]
            }
        },
        {
            name: CREATE_EVENT,
            path: '/manage/event/:lang(fa|en)/create/:parent_id(\\d+)?',
            component: GetViews('CreateEvent' ),
            meta: {
                title: 'ایجاد رویداد',
                breadcrumb: [
                    {
                        route: DASHBOARD,
                        name: 'انجمن اهدای عضو ایرانیان',
                    },
                    {
                        route: MANAGE_EVENT,
                        name: 'رویدادها',
                    },
                    {
                        name: 'ایجاد'
                    }
                ]
            }
        },
        {
            name: EDIT_EVENT,
            path: '/manage/event/:lang(fa|en)/edit/:id(\\d+)',
            component: GetViews('EditEvent' ),
            meta: {
                title: 'ویرایش رویداد',
                breadcrumb: [
                    {
                        route: DASHBOARD,
                        name: 'انجمن اهدای عضو ایرانیان',
                    },
                    {
                        route: MANAGE_EVENT,
                        name: 'رویدادها',
                    },
                    {
                        name: 'ویرایش'
                    }
                ]
            }
        },
        {
            name: MANAGE_ARTICLE,
            path: '/manage/statics',
            component: GetViews('ManageArticle' ),
            meta: {
                title: 'صفحات ایستا',
                breadcrumb: [
                    {
                        route: DASHBOARD,
                        name: 'انجمن اهدای عضو ایرانیان',
                    },
                    {
                        name: 'صفحات ایستا'
                    },
                    {
                        name: 'مدیریت'
                    }
                ]
            }
        },
        {
            name: CREATE_ARTICLE,
            path: '/manage/statics/:lang(fa)/create',
            component: GetViews('CreateArticle' ),
            meta: {
                title: 'افزودن صفحه ایستا',
                breadcrumb: [
                    {
                        route: DASHBOARD,
                        name: 'انجمن اهدای عضو ایرانیان',
                    },
                    {
                        route: MANAGE_ARTICLE,
                        name: 'صفحات ایستا'
                    },
                    {
                        name: 'افزودن'
                    }
                ]
            }
        },
        {
            name: EDIT_ARTICLE,
            path: '/manage/statics/:lang(fa)/edit/:id(\\d+)',
            component: GetViews('EditArticle' ),
            meta: {
                title: 'ویرایش صفحه ایستا',
                breadcrumb: [
                    {
                        route: DASHBOARD,
                        name: 'انجمن اهدای عضو ایرانیان',
                    },
                    {
                        route: MANAGE_ARTICLE,
                        name: 'صفحات ایستا'
                    },
                    {
                        name: 'ویرایش'
                    }
                ]
            }
        },
        {
            name: MANAGE_GALLERY,
            path: `/manage/gallery/:type(${Object.keys( GALLERY_TYPE ).join('|')})`,
            component: GetViews('ManageGallery' ),
            meta: {
                title: 'گالری',
                breadcrumb: [
                    {
                        route: DASHBOARD,
                        name: 'انجمن اهدای عضو ایرانیان',
                    },
                    {
                        name: route => `گالری‌های ${GALLERY_TYPE[route.params.type].name_fa}`,
                    },
                    {
                        name: 'مدیریت'
                    },
                ]
            }
        },
        {
            name: CREATE_GALLERY,
            path: `/manage/gallery/:type(${Object.keys( GALLERY_TYPE ).join('|')})/:lang(fa|en)/create/:parent_id(\\d+)?`,
            component: GetViews('CreateGallery' ),
            meta: {
                title: 'افزودن به گالری',
                breadcrumb: [
                    {
                        route: DASHBOARD,
                        name: 'انجمن اهدای عضو ایرانیان',
                    },
                    {
                        name: route => `گالری‌های ${GALLERY_TYPE[route.params.type].name_fa}`,
                    },
                    {
                        name: 'افزودن'
                    },
                ]
            }
        },
        {
            name: EDIT_GALLERY,
            path: `/manage/gallery/:type(${Object.keys(GALLERY_TYPE).join('|')})/:lang(fa|en)/edit/:id(\\d+)`,
            component: GetViews('EditGallery' ),
            meta: {
                title: 'ویرایش گالری',
                breadcrumb: [
                    {
                        route: DASHBOARD,
                        name: 'انجمن اهدای عضو ایرانیان',
                    },
                    {
                        name: route => `گالری‌های ${GALLERY_TYPE[route.params.type].name_fa}`,
                    },
                    {
                        name: 'ویرایش'
                    }
                ]
            },
        },
        {
            name: MANAGE_LEGATE,
            path: '/manage/volunteers',
            component: GetViews('ManageLegate' ),
            meta: {
                title: 'کاربران',
                breadcrumb: [
                    {
                        route: DASHBOARD,
                        name: 'انجمن اهدای عضو ایرانیان',
                    },
                    {
                        name: 'کاربران'
                    },
                    {
                        name: 'همه'
                    },
                ]
            }
        },
        {
            name: CREATE_LEGATE,
            path: '/manage/volunteers/create',
            component: GetViews('CreateLegate' ),
            meta: {
                title: 'افزودن سفیران اهدای عضو',
                breadcrumb: [
                    {
                        route: DASHBOARD,
                        name: 'انجمن اهدای عضو ایرانیان',
                    },
                    {
                        route: MANAGE_LEGATE,
                        name: 'سفیران اهدای عضو',
                    },
                    {
                        name: 'افزودن'
                    },
                ]
            }
        },
        {
            name: EDIT_USERS,
            path: '/manage/users/edit/:id(\\d+)',
            component: GetViews('EditUsers'),
            meta: {
                title: 'ویرایش کاربران',
                breadcrumb: [
                    {
                        route: DASHBOARD,
                        name: 'انجمن اهدای عضو ایرانیان',
                    },
                    {
                        route: MANAGE_LEGATE,
                        name: 'کاربران'
                    },
                    {
                        name: 'ویرایش'
                    },
                ]
            }
        },
        {
            name: MANAGE_CARDS,
            path: '/manage/cards',
            component: GetViews( 'ManageCards' ),
            meta: {
                title: 'کارت‌های اهدای عضو',
                breadcrumb: [
                    {
                        route: DASHBOARD,
                        name: 'انجمن اهدای عضو ایرانیان',
                    },
                    {
                        name: 'کارت‌های اهدای عضو'
                    },
                    {
                        name: 'همه'
                    },
                ]
            }
        },
        {
            name: CREATE_CARDS,
            path: '/manage/cards/create',
            component: GetViews( 'CreateCards' ),
            meta: {
                title: 'افزودن کارت تازه',
                breadcrumb: [
                    {
                        route: DASHBOARD,
                        name: 'انجمن اهدای عضو ایرانیان',
                    },
                    {
                        route: MANAGE_CARDS,
                        name: 'کارت‌های اهدای عضو'
                    },
                    {
                        name: 'افزودن کارت تازه'
                    },
                ]
            }
        },
        {
            name: MANAGE_REPORT,
            path: '/manage/report',
            component: GetViews('ManageReport'),
            meta: {
                title: 'گزارش گیری',
                breadcrumb: [
                    {
                        route: DASHBOARD,
                        name: 'انجمن اهدای عضو ایرانیان',
                    },
                    {
                        name: 'گزارش گیری'
                    },
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
            name: MANAGE_CATEGORY,
            path: '/manage/category',
            component: GetViews('ManageCategory' ),
            meta: {
                title: 'مدیریت دسته‌بندی',
                breadcrumb: [
                    {
                        route: DASHBOARD,
                        name: 'انجمن اهدای عضو ایرانیان',
                    },
                    {
                        name: 'دسته‌بندی ها'
                    },
                    {
                        name: 'همه'
                    },
                ]
            }
        },
        {
            name: CREATE_CATEGORY,
            path: '/manage/category/create',
            component: GetViews('CreateCategory' ),
            meta: {
                title: 'ایجاد دسته‌بندی',
                breadcrumb: [
                    {
                        route: DASHBOARD,
                        name: 'انجمن اهدای عضو ایرانیان',
                    },
                    {
                        name: 'دسته‌بندی ها',
                        route: MANAGE_CATEGORY
                    },
                    {
                        name: 'افزودن'
                    },
                ]
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

const backToTop = () => {
    try {
        const MAIN_CONTAINER = document.querySelector('[role="main"]');
        if ( !!MAIN_CONTAINER ) MAIN_CONTAINER.scrollTo(0, 0);
    } catch (e) {}
};

const getUserProfile = async () => {
    try {
        if ( !Store?.getters['HAS_USER_INFORMATION'] &&
             !!TokenService._GetToken &&
             Routes?.history?.pending?.name !== 'LOGOUT' ) {
            let response = await Promise.all([
                await HTTPService.getRequest(Endpoint.get(Endpoint.GET_USER_BASIC_PROFILE_INFO), {}, true),
                await HTTPService.getRequest(Endpoint.get(Endpoint.GET_USER_MENU), {}, true),
            ]);
            Store.commit(UPDATE_USER, response[0]);
            Store.commit('MENUS_SET_DATA', response[1]);
        }
    } catch ( exception ) {
        Routes.push( { name: 'LOGOUT' } )
            .catch(err => {});
    }
};

Routes.beforeEach(async (to, from, next) => {
    Store.commit('PROGRESS_BAR', true);
    await getUserProfile();
    let routeTitle = to.meta?.title,
        isGuessRoute = to.meta?.guess;
    backToTop();
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
});

Routes.afterEach(() => {
    Store.commit('PROGRESS_BAR', false)
});

export default Routes;