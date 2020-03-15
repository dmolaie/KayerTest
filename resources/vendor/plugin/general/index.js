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

        // Vue.directive('ripple', {
        //    bind: ( el, { value } ) => {
        //        const BG_COLOR = value || 'rgba(0, 0, 0, 0.35)';
        //        const POSITION_RELATIVE = 'relative';
        //        console.log(el);
        //        el.classList.add( POSITION_RELATIVE );
        //        const makeRippleEffect = event => {
        //            let {
        //                left, top
        //            } = el.getBoundingClientRect(),
        //                width       = el.offsetWidth,
        //                height      = el.offsetHeight,
        //                dx          = event.clientX - left,
        //                dy          = event.clientY - top,
        //                maxX        = Math.max(dx, width - dx),
        //                maxY        = Math.max(dy, height - dy),
        //                style       = window.getComputedStyle(target),
        //                radius      = Math.sqrt((maxX * maxX) + (maxY * maxY)),
        //                border      = (targetBorder > 0 ) ? targetBorder : 0;
        //        }
        //    }
        // });

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