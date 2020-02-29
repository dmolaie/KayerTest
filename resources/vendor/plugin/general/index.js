import Routes from '@BackOffice/services/routes'

let isInstalled = false;

const General = {
    install( Vue ) {
        if ( isInstalled ) return;
        isInstalled = true;

        Vue.directive('clickOutside', {
            bind: ( el, { value } ) => {
                el.clickOutside = ( { target } ) => {
                    if ( !el.contains( target ) ) value( target )
                };
                document.addEventListener('click', el?.clickOutside);
            },
            unbind: ( el ) => {
                document.removeEventListener('click', el?.clickOutside);
                el.clickOutside = null;
            },
        });

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