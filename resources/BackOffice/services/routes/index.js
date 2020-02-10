const PATH_NAME = '';

// const GetRoutes = ( path = '' ) => (
//     // ( !!path ) ? ( PATH_NAME + '/' + path ) : ( PATH_NAME )
//     '/' + path
// );

const GetViews = component => () =>
    import(
        /* webpackChunkName: "[request]" */
        `@components/${component}.vue`
    );

export default {
    mode: "hash",
    base: '/admin/panel',
    routes: [
        {
            name: 'DASHBOARD',
            path: '/dashboard',
            component: GetViews('Dashboard' )
        },
        {
            name: 'LOGIN',
            path: '/login',
            component: GetViews( 'Login')
        },
        {
            name: 'NOT_FOUND',
            path: '/*',
            component: GetViews('NotFound' )
        }
    ]
}
