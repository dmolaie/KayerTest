import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';
import {
    MENU_SET_DATE
} from '@services/store/ManageMenu';

const DEFAULT_ERROR_MESSAGE   = 'متاسفانه مشکلی پیش آمده است.';
const DEFAULT_Success_MESSAGE = 'فرآیند با موفقیت انجام شد.';

export default class ManageMenuService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
    }

    displayErrorNotification( message ) {
        this.$vm.displayNotification( message || DEFAULT_ERROR_MESSAGE, {
            type: 'error',
            duration: 4000
        })
    }

    displaySuccessNotification( message ) {
        this.$vm.displayNotification( message || DEFAULT_Success_MESSAGE, {
            type: 'success',
            duration: 4000
        })
    }

    async getList() {
        try {
            let response = await HTTPService.getRequest( Endpoint.get( Endpoint.GET_MENU_LIST ) );
            BaseService.commitToStore( this.$store, MENU_SET_DATE, response );
        }
        catch ( { message } ) {
            this.$vm.displayNotification( message, {
                type: 'error',
                duration: 4000
            })
        }
    }

    async createArticle() {
        try {
            let payload = {
                'first_title': 'دونه دونه دونه',
                'description': 'یشسیسش',
                'category_ids': [4, 3],
                'publish_date': (new Date().getTime() / 1e3),
                'slug': 'salam',
                'province_id': 1,
                'language': 'fa',
            };
            let response = await HTTPService.postRequest( Endpoint.get( Endpoint.CREATE_ARTICLE_LIST ), payload );
            console.log('createArticle: ', response);
        } catch (e) {
            console.log('createArticle: '. e);
        }
    }

    async getMenuType() {
        try {
            let response = await HTTPService.getRequest( Endpoint.get( Endpoint.GET_MENU_TYPE ) );
            // let response = await HTTPService.getRequest( Endpoint.get( Endpoint.GET_ARTICLE_LIST ) );
            console.log('GET_MENU_TYPE: ', response);
        }
        catch ( { message } ) {
            this.$vm.displayNotification( message, {
                type: 'error',
                duration: 4000
            })
        }
    }


    async _onClickRemoveItem( item ) {
        try {
            // let response = await HTTPService.postRequest( Endpoint.get(Endpoint.EDIT_MENU_ITEM),  );
            item.parent.splice(item.index, 1);
            // this.displaySuccessNotification( response?.message );
            this.displaySuccessNotification();
        }
        catch ({ message }) {
            this.displayErrorNotification( message );
        }
    }

    async _onClickToggleActiveItem( item ) {
        try {
            console.log('onjjja', item);
            // let response = await HTTPService.postRequest( Endpoint.get(Endpoint.EDIT_MENU_ITEM),  );
            this.$vm.$set( item, 'active', !item.active );
            // this.displaySuccessNotification( response?.message );
            this.displaySuccessNotification();
        }
        catch ({ message }) {
            this.displayErrorNotification( message );
        }
    }

}


var Ripple = {
    bind: function(el, binding){

        // Default values.
        var props = {
            event: 'mousedown',
            transition: 600
        };

        setProps(Object.keys(binding.modifiers),props);

        el.addEventListener(props.event, function(event) {
            rippler(event, el, binding.value);
        });

        var bg = binding.value || Ripple.color || 'rgba(0, 0, 0, 0.35)';
        var zIndex = Ripple.zIndex || '9999';

        function rippler(event, el) {
            var target = el;
            // Get border to avoid offsetting on ripple container position
            var targetBorder = parseInt((getComputedStyle(target).borderWidth).replace('px', ''));

            // Get necessary variables
            var rect        = target.getBoundingClientRect(),
                left        = rect.left,
                top         = rect.top,
                width       = target.offsetWidth,
                height      = target.offsetHeight,
                dx          = event.clientX - left,
                dy          = event.clientY - top,
                maxX        = Math.max(dx, width - dx),
                maxY        = Math.max(dy, height - dy),
                style       = window.getComputedStyle(target),
                radius      = Math.sqrt((maxX * maxX) + (maxY * maxY)),
                border      = (targetBorder > 0 ) ? targetBorder : 0;

            // Create the ripple and its container
            var ripple = document.createElement("div"),
                rippleContainer = document.createElement("div");
            rippleContainer.className = 'ripple-container';
            ripple.className = 'ripple';

            //Styles for ripple
            ripple.style.marginTop= '0px';
            ripple.style.marginLeft= '0px';
            ripple.style.width= '1px';
            ripple.style.height= '1px';
            ripple.style.transition= 'all ' + props.transition + 'ms cubic-bezier(0.4, 0, 0.2, 1)';
            ripple.style.borderRadius= '50%';
            ripple.style.pointerEvents= 'none';
            ripple.style.position= 'relative';
            ripple.style.zIndex= zIndex;
            ripple.style.backgroundColor  = bg;

            //Styles for rippleContainer
            rippleContainer.style.position= 'absolute';
            rippleContainer.style.left = 0 - border + 'px';
            rippleContainer.style.top = 0 - border + 'px';
            rippleContainer.style.height = '0';
            rippleContainer.style.width = '0';
            rippleContainer.style.pointerEvents = 'none';
            rippleContainer.style.overflow = 'hidden';

            // Store target position to change it after
            var storedTargetPosition =  ((target.style.position).length > 0) ? target.style.position : getComputedStyle(target).position;
            // Change target position to relative to guarantee ripples correct positioning
            if (storedTargetPosition !== 'relative') {
                target.style.position = 'relative';
            }

            rippleContainer.appendChild(ripple);
            target.appendChild(rippleContainer);

            ripple.style.marginLeft   = dx + "px";
            ripple.style.marginTop    = dy + "px";

            // No need to set positioning because ripple should be child of target and to it's relative position.
            // rippleContainer.style.left    = left + (((window.pageXOffset || document.scrollLeft) - (document.clientLeft || 0)) || 0) + "px";
            // rippleContainer.style.top     = top + (((window.pageYOffset || document.scrollTop) - (document.clientTop || 0)) || 0) + "px";
            rippleContainer.style.width   = width + "px";
            rippleContainer.style.height  = height + "px";
            rippleContainer.style.borderTopLeftRadius  = style.borderTopLeftRadius;
            rippleContainer.style.borderTopRightRadius  = style.borderTopRightRadius;
            rippleContainer.style.borderBottomLeftRadius  = style.borderBottomLeftRadius;
            rippleContainer.style.borderBottomRightRadius  = style.borderBottomRightRadius;

            rippleContainer.style.direction = 'ltr';

            setTimeout(function() {
                ripple.style.width  = radius * 2 + "px";
                ripple.style.height = radius * 2 + "px";
                ripple.style.marginLeft   = dx - radius + "px";
                ripple.style.marginTop    = dy - radius + "px";
            }, 0);

            function clearRipple() {
                setTimeout(function() {
                    ripple.style.backgroundColor = "rgba(0, 0, 0, 0)";
                }, 250);

                // Timeout set to get a smooth removal of the ripple
                setTimeout(function() {
                    rippleContainer.parentNode.removeChild(rippleContainer);
                }, 850);

                el.removeEventListener('mouseup', clearRipple, false);

                // After removing event set position to target to it's original one
                // Timeout it's needed to avoid jerky effect of ripple jumping out parent target
                setTimeout(function () {

                    var clearPosition = true;
                    for(var i = 0; i < target.childNodes.length; i++) {
                        if(target.childNodes[i].className === 'ripple-container') {
                            clearPosition = false;
                        }
                    }

                    if(clearPosition) {
                        if(storedTargetPosition !== 'static') {
                            target.style.position = storedTargetPosition;
                        } else {
                            target.style.position = '';
                        }
                    }

                }, props.transition + 250)
            }

            if(event.type === 'mousedown') {
                el.addEventListener('mouseup', clearRipple, false);
            } else {
                clearRipple();
            }
        }
    }
};