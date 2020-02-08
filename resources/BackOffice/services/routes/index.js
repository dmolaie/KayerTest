const PATH_NAME = '/admin';

const GetRoutes = ( path = '' ) => (
    ( !!path ) ? ( PATH_NAME + '/' + path ) : ( PATH_NAME )
);

const GetViews = component => () =>
    import(
        /* webpackChunkName: "[request]" */
        `@components/${component}.vue`
    );

export default {
    mode: 'history',
    routes: [
        {
            name: 'DASHBOARD',
            path: GetRoutes('dashboard'),
            component: GetViews('Dashboard' )
        },
        {
            name: 'LOGIN',
            path: GetRoutes( 'login' ),
            component: GetViews( 'Login')
        },
        {
            name: 'NOT_FOUND',
            path: '/*',
            component: GetViews('NotFound' )
        }
    ]
}
