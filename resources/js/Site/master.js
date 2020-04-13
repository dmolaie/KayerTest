import ImageLazyLoading from "@vendor/plugin/imageLazyLoading";
import CopyToClipboard from "@vendor/plugin/copyToClipboard";
import set from "@babel/runtime/helpers/esm/set";

try {
    const NONE_CLASSNAME = 'none';
    const M_MENU_ACTIVE_CLASS = 'm-header--open';
    const M_MENU_LINKS_ACTIVE_CLASS = 'm-header__mLink--active';
    const M_MENU_WRAPPER = document.querySelector('.header.m-header');
    const M_MENU_BUTTON  = document.querySelector('.m-header .m-header__menu');
    const M_MENU_LINKS   = document.querySelectorAll('.m-header .m-header__mLink--hasChild');
    const M_MENU_LINKS_WRAPPER = document.querySelector('.m-header .m-header__nav');
    const M_MENU_MIDDLE = document.querySelector('.m-header .m-header__middle');

    const M_MENU = {
        visible() {
            M_MENU_WRAPPER.classList.add( M_MENU_ACTIVE_CLASS );
            M_MENU_MIDDLE.classList.remove( NONE_CLASSNAME );
        },
        hidden() {
            M_MENU_LINK.hiddenActiveItem();
            M_MENU_WRAPPER.classList.remove( M_MENU_ACTIVE_CLASS );
            M_MENU_MIDDLE.classList.add( NONE_CLASSNAME );
        }
    };

    if ( !!M_MENU_BUTTON ) {
        M_MENU_BUTTON.addEventListener(
            'click',
            event => {
                event.preventDefault();
                M_MENU_WRAPPER.classList.contains( M_MENU_ACTIVE_CLASS ) ? (
                    M_MENU.hidden()
                ) : (
                    M_MENU.visible()
                )
            }
        )
    }

    const M_MENU_LINK = {
        hiddenActiveItem() {
            try {
                let activeItem = M_MENU_LINKS_WRAPPER.querySelector('.' + M_MENU_LINKS_ACTIVE_CLASS);
                if ( !!activeItem ) this.hidden( activeItem );
            } catch (e) {}
        },
        visible( item ) {
            try {
                this.hiddenActiveItem();
                let nextEl = item.nextElementSibling;
                nextEl.style.height = `${nextEl.firstElementChild.offsetHeight}px`;
                item.classList.add( M_MENU_LINKS_ACTIVE_CLASS );
            } catch (e) {}
        },
        hidden( item ) {
            try {
                item.nextElementSibling.style = null;
                item.classList.remove( M_MENU_LINKS_ACTIVE_CLASS )
                // item
            } catch (e) {}
        }
    };

    if ( !!M_MENU_LINKS ) {
        M_MENU_LINKS.forEach(item => {
            item.addEventListener(
                'click',
                event => {
                    event.preventDefault();
                    let target = event.target || event.srcElement;
                    target.classList.contains( M_MENU_LINKS_ACTIVE_CLASS ) ? (
                        M_MENU_LINK.hidden( target )
                    ) : (
                        M_MENU_LINK.visible( target )
                    )
                }
            )
        })
    }

} catch (e) {}

try {
    const ACTIVE_DROPDOWN_USER_MENU = 'show';
    const DROPDOWN_USER_MENU_CONTAINER = document.querySelector('.header__user--active');
    const DROPDOWN_USER_MENU = document.querySelector('.header__user--active .header__user_link');
    const DROPDOWN_USER_MENU_LINK = document.querySelector('.header__user--active .header__nav_btn--user');

    const onClickOutsideUserDropdown = ({ target }) => {
        if ( !DROPDOWN_USER_MENU.contains( target ) )
            TOGGLE_DROPDOWN_USER_MENU.hidden();
    };

    const TOGGLE_DROPDOWN_USER_MENU = {
        visible() {
            DROPDOWN_USER_MENU_CONTAINER.classList.add( ACTIVE_DROPDOWN_USER_MENU );
            document.addEventListener('click', onClickOutsideUserDropdown);
        },
        hidden() {
            DROPDOWN_USER_MENU_CONTAINER.classList.remove( ACTIVE_DROPDOWN_USER_MENU );
            document.removeEventListener('click', onClickOutsideUserDropdown);
        }
    };

    if ( !!DROPDOWN_USER_MENU ) {
        DROPDOWN_USER_MENU.href = "javascript:void(0)";
        DROPDOWN_USER_MENU.addEventListener(
            'click',
            () => {
                (!DROPDOWN_USER_MENU_CONTAINER.classList.contains( ACTIVE_DROPDOWN_USER_MENU )) ? (
                    TOGGLE_DROPDOWN_USER_MENU.visible()
                ) : (
                    TOGGLE_DROPDOWN_USER_MENU.hidden()
                )
            }
        )
    }
    if ( !!DROPDOWN_USER_MENU_LINK ) {
        DROPDOWN_USER_MENU_LINK.href = "javascript:void(0)";
        DROPDOWN_USER_MENU_LINK.addEventListener(
            'click',
            event => {
                event.stopPropagation();
                (!DROPDOWN_USER_MENU_CONTAINER.classList.contains( ACTIVE_DROPDOWN_USER_MENU )) ? (
                    TOGGLE_DROPDOWN_USER_MENU.visible()
                ) : (
                    TOGGLE_DROPDOWN_USER_MENU.hidden()
                )
            }
        )
    }
} catch (e) {}

try {
    document.addEventListener(
        'DOMContentLoaded',
        () => {
            const LazyImages = document.querySelectorAll('.has-skeleton');
            if ( !!LazyImages ) ImageLazyLoading( LazyImages );

            const Clipboard = document.querySelector('.clipboard');
            if ( !!Clipboard ) {
                Clipboard.addEventListener(
                    'click',
                    () => {
                        CopyToClipboard( Clipboard );
                        let messageEl = Clipboard.querySelector('.clipboard__message');
                        if ( !!messageEl ) {
                            messageEl.classList.add('opacity-1');
                            setTimeout(() => {
                                messageEl.classList.remove('opacity-1');
                            }, 1200)
                        }
                    }
                )
            }
        }
    );
} catch (e) {
    //
}