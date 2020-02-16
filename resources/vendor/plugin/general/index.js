import Routes from '@BackOffice/services/routes'

let isInstalled = false;

const General = {
    install( Vue ) {
        if ( isInstalled ) return;
        isInstalled = true;

        Vue.mixin({
            methods: {
                $asset( src ) {
                    return (
                        '/images/' + src
                    )
                },
                goBack() {
                    Routes.go(-1)
                },
                pushRouter( location = { name: '/' } ) {
                    Routes.push( location )
                },
                pushReplace( location = { name: '/' } ) {
                    Routes.replace( location )
                }
            }
        })
    }
};

export default General;