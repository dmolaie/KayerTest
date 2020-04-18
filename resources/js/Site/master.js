import ImageLazyLoading from "@vendor/plugin/imageLazyLoading";
import CopyToClipboard from "@vendor/plugin/copyToClipboard";
import Dropdown from '@vendor/plugin/dropdown';

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
} catch (e) { }

try {
    const DISPLAY_NONE_CLASS = 'none';
    const OPENED_CLASSNAME = 's-domain--opened';
    const CLOSED_CLASSNAME = 's-domain--closed';
    const SUB_DOMAIN  = document.querySelector('.s-domain');
    const SUB_DOMAIN_BODY  = document.querySelector('.s-domain .s-domain__container');
    const SUB_DOMAIN_BUTTON  = document.querySelector('.header .s-domain__button');
    const SUB_DOMAIN_CLOSE  = document.querySelector('.s-domain .s-domain__close');
    const SUB_DOMAIN_A_TAG  = document.querySelector('.s-domain .s-domain__link');
    const SUB_DOMAIN_SELECT = document.querySelector('.s-domain .s-domain__select');
    const SUB_DOMAIN_LINK   = document.querySelector('.s-domain .s-domain__row--link');

    if( !!SUB_DOMAIN_SELECT ) {
        SUB_DOMAIN_SELECT.MountDropdown({
            hasFilterItem: true,
            filterPlaceholder: 'جستجو...',
            dropdownClass: 'w-full unselected',
            filterClass: 'font-xs text-bayoux',
            optionClass: 'font-xs text-bayoux text-right',
            inputClass: 'input input--blue border border-solid rounded',
            onSelected(dropdown, option) {
                try {
                    dropdown.classList.remove('unselected');
                    SUB_DOMAIN_LINK.classList.remove( DISPLAY_NONE_CLASS );
                    SUB_DOMAIN_A_TAG.href = option.getAttribute('data-url') || '';
                    SUB_DOMAIN_A_TAG.querySelector('.s-domain__link--text').textContent = `شعبه ${option.textContent}`;
                } catch (e) {
                    SUB_DOMAIN_LINK.classList.add( DISPLAY_NONE_CLASS );
                }
            }
        })
    }

    const onClickHiddenModal = event => {
        event.stopPropagation();
        toggleSubDomain.hidden();
    };

    const onClickOutSideOfModal = ({ target }) => {
        if (!SUB_DOMAIN_BODY.contains( target )) toggleSubDomain.hidden();
    };

    const toggleSubDomain = {
        visible() {
            SUB_DOMAIN.classList.remove( DISPLAY_NONE_CLASS );
            SUB_DOMAIN.classList.remove( CLOSED_CLASSNAME );
            SUB_DOMAIN.classList.add(OPENED_CLASSNAME);
            SUB_DOMAIN.addEventListener('click', onClickOutSideOfModal);
            if ( !!SUB_DOMAIN_CLOSE ) SUB_DOMAIN_CLOSE.addEventListener('click', onClickHiddenModal);
        },
        hidden() {
            SUB_DOMAIN.classList.add( CLOSED_CLASSNAME );
            SUB_DOMAIN.removeEventListener('click', onClickOutSideOfModal);
            if ( !!SUB_DOMAIN_CLOSE ) SUB_DOMAIN_CLOSE.removeEventListener('click', onClickHiddenModal);
            setTimeout(() => {
                SUB_DOMAIN.classList.remove( OPENED_CLASSNAME );
                SUB_DOMAIN.classList.add( DISPLAY_NONE_CLASS );
            }, 320)
        }
    };

    if ( !!SUB_DOMAIN_BUTTON ) {
        SUB_DOMAIN_BUTTON.addEventListener(
            'click',
            event => {
                event.stopPropagation();
                toggleSubDomain.visible();
            }
        )
    }
} catch (e) {}