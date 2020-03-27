import Routes from '@BackOffice/services/routes';
import {
    RequestAnimation
} from '@vendor/plugin/helper';

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
                        .catch(err => {})
                },
                pushReplace( location = { name: '/' } ) {
                    Routes.replace( location )
                },
                backToTop() {
                    try {
                        const MAIN_CONTAINER = document.querySelector('[role="main"]');
                        if ( !!MAIN_CONTAINER ) {
                            let currentScroll = MAIN_CONTAINER.scrollTop;
                            if ( currentScroll > 0 ) {
                                MAIN_CONTAINER.scrollTo(0, Math.floor(currentScroll - (currentScroll / 8)));
                                ( !!RequestAnimation ) ? RequestAnimation(this.backToTop) : setTimeout(this.backToTop, 100 );
                            }
                        }
                    } catch (e) {}
                }
            }
        })
    }
};

export default General;