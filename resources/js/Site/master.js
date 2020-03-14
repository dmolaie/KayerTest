import ImageLazyLoading from "@vendor/plugin/imageLazyLoading";
import CopyToClipboard from "@vendor/plugin/copyToClipboard";

try {
    const ACTIVE_DROPDOWN_USER_MENU = 'show';
    const DROPDOWN_USER_MENU_CONTAINER = document.querySelector('.header__user--active');
    const DROPDOWN_USER_MENU = document.querySelector('.header__user--active .header__user_link');

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